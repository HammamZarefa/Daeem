<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\SendSmsNotification;
use App\Mail\PayForBecomeCoachMail;
use App\Mail\PayForBecomeOrganizationMail;
use App\Models\City;
use App\Models\Country;
use App\Models\Course;
use App\Models\Course_lecture;
use App\Models\Course_lecture_views;
use App\Models\Course_lesson;
use App\Models\Order_item;
use App\Models\Organization;
use App\Models\Package;
use App\Models\State;
use App\Models\Student as ModelsStudent;
use App\Models\User;
use App\Models\UserPackage;
use App\Traits\General;
use App\Traits\ImageSaveTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class OrganizationController extends Controller
{
    use General, ImageSaveTrait;

    public function index()
    {
        if (!auth()->user()->can('all_organization')) {
            abort('403');
        } // end permission checking

        $data['title'] = __('All Organization');
        $data['organizations'] = Organization::orderBy('id', 'DESC')->paginate(25);
        return view('admin.organizations.index', $data);
    }

    public function view($uuid)
    {
        $data['title'] = __('Organization Profile');
        $data['organization'] = Organization::where('uuid', $uuid)->first();
        $userCourseIds = Course::whereUserId($data['organization']->user->id)->pluck('id')->toArray();
        if (count($userCourseIds) > 0) {
            $orderItems = Order_item::whereIn('course_id', $userCourseIds)
                ->whereYear("created_at", now()->year)->whereMonth("created_at", now()->month)
                ->whereHas('order', function ($q) {
                    $q->where('payment_status', 'paid');
                });
            $data['total_earning'] = $orderItems->sum('owner_balance');
        }

        return view('admin.organizations.view', $data);
    }

    public function pending()
    {
        if (!auth()->user()->can('pending_organization')) {
            abort('403');
        } // end permission checking

        $data['title'] = __('Pending for Review');
        $data['organizations'] = Organization::pending()->orderBy('id', 'desc')->paginate(25);
        return view('admin.organizations.pending', $data);
    }

    public function approved()
    {
        if (!auth()->user()->can('approved_organization')) {
            abort('403');
        } // end permission checking

        $data['title'] = __('Approved Organizations');
        $data['organizations'] = Organization::approved()->orderBy('id', 'desc')->paginate(25);
        return view('admin.organizations.approved', $data);
    }

    public function blocked()
    {
        if (!auth()->user()->can('approved_organization')) {
            abort('403');
        } // end permission checking

        $data['title'] = __('Blocked Organizations');
        $data['organizations'] = Organization::blocked()->orderBy('id', 'desc')->paginate(25);
        return view('admin.organizations.blocked', $data);
    }

    public function create()
    {
        $data['title'] = __('Add Organization');
        $data['countries'] = Country::orderBy('country_name', 'asc')->get();

        if (old('country_id')) {
            $data['states'] = State::where('country_id', old('country_id'))->orderBy('name', 'asc')->get();
        }

        if (old('state_id')) {
            $data['cities'] = City::where('state_id', old('state_id'))->orderBy('name', 'asc')->get();
        }

        return view('admin.organizations.add', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
            'professional_title' => 'required',
            'area_code' => 'required',
            'phone_number' => 'bail|numeric|digits_between:10,14|unique:users,mobile_number',
            'address' => 'required',
            'gender' => 'required',
            'about_me' => 'required',
            'image' => 'file|max:1024'
        ]);

        try {
            DB::beginTransaction();
            $user = new User();
            $user->name = $request->first_name . ' ' . $request->last_name;
            $user->email = $request->email;
            $user->email_verified_at = now();
            $user->area_code =  str_replace("+", "", $request->area_code);
            $user->mobile_number = $request->phone_number;
            $user->phone_number = $user->area_code . $request->phone_number;
            $user->password = Hash::make($request->password);
            $user->role = USER_ROLE_ORGANIZATION;
            $user->image =  $request->image ? $this->saveImage('user', $request->image, null, null) :   null;
            $user->save();

            $student_data = [
                'user_id' => $user->id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'address' => $request->address,
                'phone_number' => $user->phone_number,
                'country_id' => $request->country_id,
                'state_id' => $request->state_id,
                'city_id' => $request->city_id,
                'gender' => $request->gender,
                'about_me' => $request->about_me,
                'postal_code' => $request->postal_code,
            ];

            ModelsStudent::create($student_data);

            if (Organization::where('slug', getSlug($user->name))->count() > 0) {
                $slug = getSlug($user->name) . '-' . rand(100000, 999999);
            } else {
                $slug = getSlug($user->name);
            }

            $organization_data = [
                'user_id' => $user->id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'address' => $request->address,
                'professional_title' => $request->professional_title,
                'phone_number' => $user->phone_number,
                'slug' => $slug,
                'status' => 1,
                'country_id' => $request->country_id,
                'state_id' => $request->state_id,
                'city_id' => $request->city_id,
                'gender' => $request->gender,
                'about_me' => $request->about_me,
                'postal_code' => $request->postal_code,
                'social_link' => json_encode($request->social_link),
            ];

            Organization::create($organization_data);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
        $this->showToastrMessage('success', __('Organization created successfully'));
        return redirect()->route('organizations.index');
    }

    public function edit($uuid)
    {
        $data['title'] = __('Edit Organization');
        $data['organization'] = Organization::where('uuid', $uuid)->first();
        $data['user'] = User::findOrfail($data['organization']->user_id);

        $data['countries'] = Country::orderBy('country_name', 'asc')->get();

        if (old('country_id')) {
            $data['states'] = State::where('country_id', old('country_id'))->orderBy('name', 'asc')->get();
        }

        if (old('state_id')) {
            $data['cities'] = City::where('state_id', old('state_id'))->orderBy('name', 'asc')->get();
        }

        return view('admin.organizations.edit', $data);
    }

    public function update(Request $request, $uuid)
    {
        $organization = Organization::where('uuid', $uuid)->first();
        $request->validate([
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $organization->user_id],
            'professional_title' => 'required',
            'area_code' => 'required',
            'phone_number' => 'bail|numeric|digits_between:10,14|unique:users,mobile_number,' . $organization->user_id,
            'address' => 'required',
            'gender' => 'required',
            'about_me' => 'required',
            'image' => 'file|max:1024'
        ]);


        $user = User::findOrfail($organization->user_id);
        if (User::where('id', '!=', $organization->user_id)->where('email', $request->email)->count() > 0) {
            $this->showToastrMessage('warning', __('Email already exist'));
            return redirect()->back();
        }

        $user->name = $request->first_name . ' ' . $request->last_name;
        $user->email = $request->email;
        $user->area_code =  str_replace("+", "", $request->area_code);
        $user->mobile_number = $request->phone_number;
        $user->phone_number = $user->area_code . $request->phone_number;
        if ($request->password) {
            $request->validate([
                'password' => 'required|string|min:6'
            ]);
            $user->password = Hash::make($request->password);
        }
        $user->image =  $request->image ? $this->saveImage('user', $request->image, null, null) :   $user->image;
        $user->save();

        if (Organization::where('slug', getSlug($user->name))->count() > 0) {
            $slug = getSlug($user->name) . '-' . rand(100000, 999999);
        } else {
            $slug = getSlug($user->name);
        }

        $organizationData = [
            'user_id' => $user->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'professional_title' => $request->professional_title,
            'phone_number' => $user->phone_number,
            'slug' => $slug,
            'country_id' => $request->country_id,
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
            'gender' => $request->gender,
            'about_me' => $request->about_me,
            'postal_code' => $request->postal_code,
            'social_link' => json_encode($request->social_link),
        ];

        Organization::where('uuid', $uuid)->update($organizationData);

        $this->showToastrMessage('success', __('Updated Successfully'));
        return redirect()->route('organizations.index');
    }

    public function delete($uuid)
    {
        if (!auth()->user()->can('manage_organization')) {
            abort('403');
        } // end permission checking

        $organization = Organization::where('uuid', $uuid)->first();
        $user = User::findOrfail($organization->user_id);

        if ($organization && $user) {
            //Start:: Course Delete
            $courses = Course::whereUserId($user->id)->get();
            foreach ($courses as $course) {
                //start:: Course lesson delete
                $lessons = Course_lesson::where('course_id', $course->id)->get();
                if (count($lessons) > 0) {
                    foreach ($lessons as $lesson) {
                        //start:: lecture delete
                        $lectures = Course_lecture::where('lesson_id', $lesson->id)->get();
                        if (count($lectures) > 0) {
                            foreach ($lectures as $lecture) {
                                $lecture = Course_lecture::find($lecture->id);
                                if ($lecture) {
                                    $this->deleteFile($lecture->file_path); // delete file from server

                                    if ($lecture->type == 'vimeo') {
                                        if ($lecture->url_path) {
                                            $this->deleteVimeoVideoFile($lecture->url_path);
                                        }
                                    }

                                    Course_lecture_views::where('course_lecture_id', $lecture->id)->get()->map(function ($q) {
                                        $q->delete();
                                    });

                                    Course_lecture::find($lecture->id)->delete(); // delete lecture record
                                }
                            }
                        }
                        //end:: delete lesson record
                        Course_lesson::find($lesson->id)->delete();
                    }
                }
                //end

                $this->deleteFile($course->image);
                $this->deleteVideoFile($course->video);
                $course->delete();
            }
            //End:: Course Delete
        }

        Organization::where('uuid', $uuid)->delete($uuid);

        $user->role = USER_ROLE_ORGANIZATION;
        $user->save();

        $this->showToastrMessage('success', __('Organization Deleted Successfully'));
        return redirect()->back();
    }

    public function getStateByCountry($country_id)
    {
        return State::where('country_id', $country_id)->orderBy('name', 'asc')->get()->toJson();
    }

    public function getCityByState($state_id)
    {
        return City::where('state_id', $state_id)->orderBy('name', 'asc')->get()->toJson();
    }

    public function changeOrganizationStatus(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'status' => 'required|in:' . STATUS_PENDING . ', ' . STATUS_APPROVED . ',' . STATUS_REJECTED,
        ]);

        $organization = Organization::findOrFail($request->id);
        if (is_null($organization)) {
            return response()->json(['message' => __('Organization Not Found!'), 'status' => false]);
        }
        $organization->status = $request->status;
        if ($request->status == STATUS_APPROVED)
        {
            $organization->status = 4;
            $user = $organization->user;
            if(!UserPackage::where('user_id', $user->id)->first()){
                //set default package
                $package = Package::where('is_default', 1)->where('package_type', PACKAGE_TYPE_SAAS_ORGANIZATION)->firstOrFail();
                $userPackageData['user_id'] = $user->id;
                $userPackageData['is_default'] = 1;
                $userPackageData['package_id'] = $package->id;
                $userPackageData['subscription_type'] = SUBSCRIPTION_TYPE_YEARLY;
                $userPackageData['student'] = $package->student;
                $userPackageData['instructor'] = $package->instructor;
                $userPackageData['course'] = $package->course;
                $userPackageData['consultancy'] = $package->consultancy;
                $userPackageData['subscription_course'] = $package->subscription_course;
                $userPackageData['bundle_course'] = $package->bundle_course;
                $userPackageData['product'] = $package->product;
                $userPackageData['admin_commission'] = $package->admin_commission;
                $userPackageData['payment_id'] = NULL;
                $userPackageData['enroll_date'] = now();
                $userPackageData['expired_date'] = Carbon::now()->addYear();
                UserPackage::create($userPackageData);
            }

            $user->role = USER_ROLE_ORGANIZATION;
            $user->save();

            setBadge($user->id);
            $organization->save();
            $this->sendPayForBecomeOrganizationEmail($organization->uuid);
            return response()->json(['message' => __('Organization status has been updated'), 'status' => true]);
        }else{
            $organization->save();
            return response()->json(['message' => __('Organization status has been updated'), 'status' => true]);
        }




    }

    public function sendPayForBecomeOrganizationEmail($uuid)
    {
        $organization = Organization::where('uuid', $uuid)->first();
        if ($organization)
        {

            try {
                Mail::to($organization->organization_email)->send(new PayForBecomeOrganizationMail($organization));
                if (get_option('SMS_NOTIFICATION_ACTIVE') == "yes"){
                    $o_phone = $organization->phone_number;
                    $phone = trim($o_phone,"+");
                    $sendSmsNotification = new SendSmsNotification();
                    $msg = __('Thank you for Send Request to be a organization in Daeem') . " ".__('Click here to go to pay page') .route('student.payForCoachRequest',$instructor->uuid);
                    $sendSmsNotification->send($phone,$msg);
                }
            } catch (\Exception $exception) {
                toastrMessage('error', 'Something is wrong. Try after few minutes!');
                return redirect()->back();
            }

            Session::put('email', $organization->organization_email);

            $this->showToastrMessage('success', __('Pay Instruction sent To Instructor email. Please check.'));
            return redirect()->back();
        }

        $this->showToastrMessage('error', __('Instructor Email is incorrect!'));
        return redirect()->back();
    }
}
