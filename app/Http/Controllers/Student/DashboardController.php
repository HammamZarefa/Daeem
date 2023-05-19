<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\ProfileRequest;
use App\Models\AffiliateRequest;
use App\Models\Bank;
use App\Models\Bundle;
use App\Models\BundleCourse;
use App\Models\CartManagement;
use App\Models\City;
use App\Models\CoachingType;
use App\Models\Country;
use App\Models\Course;
use App\Models\CourseInstructor;
use App\Models\Enrollment;
use App\Models\Instructor;
use App\Models\InstructorFeature;
use App\Models\InstructorProcedure;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Organization;
use App\Models\Product;
use App\Models\State;
use App\Models\Student;
use App\Models\User;
use App\Tools\Repositories\Crud;
use App\Traits\General;
use App\Traits\ImageSaveTrait;
use App\Traits\SendNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class DashboardController extends Controller
{

    use  ImageSaveTrait, General, SendNotification;

    protected $studentModel;
    protected $organizationModel;
    protected $instructorModel;

    public function __construct(Student $student, Instructor $instructor, Organization $organization)
    {
        $this->studentModel = new Crud($student);
        $this->instructorModel = new Crud($instructor);
        $this->organizationModel = new Crud($organization);
    }


    public function dashboard()
    {
        return redirect(route('student.profile'));
    }

    public function profile()
    {
        $data['pageTitle'] = "Profile";
        $data['user'] = auth::user();
        $data['student'] = $data['user']->student;
        return view('frontend.student.settings.profile', $data);
    }

    public function address()
    {
        $data['pageTitle'] = "Address";
        $data['user'] = auth::user();
        $data['student'] = $data['user']->student;
        $data['countries'] = Country::orderBy('country_name', 'asc')->get();
        if (old('country_id')) {
            $data['states'] = State::where('country_id', old('country_id'))->orderBy('name', 'asc')->get();
        }
        if (old('state_id')) {
            $data['cities'] = City::where('state_id', old('state_id'))->orderBy('name', 'asc')->get();
        }
        return view('frontend.student.settings.address', $data);
    }

    public function address_update(Request $request, $uuid)
    {
        $request->validate([
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'postal_code' => 'required',
            'address' => 'required',
            'lat' => 'required',
            'long' => 'required',
        ]);

        $student = $this->studentModel->getRecordByUuid($uuid);
        $user = User::find($student->user_id);
        $user->lat = $request->lat;
        $user->long = $request->long;
        $user->save();

        $data = [
            'country_id' => $request->country_id,
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
            'postal_code' => $request->postal_code,
            'address' => $request->address,
        ];

        $this->studentModel->updateByUuid($data, $uuid);
        $this->showToastrMessage('success', __('Successfully Updated!'));
        return redirect()->back();
    }

    public function changePassword()
    {
        $data['pageTitle'] = "Change Password";
        $data['user'] = auth::user();

        return view('frontend.student.settings.change-password', $data);
    }

    public function changePasswordUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = User::find(Auth::id());

        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            $this->showToastrMessage('success', __('Password changed successfully'));
            return redirect()->back();
        } else {
            $this->showToastrMessage('error', __('Your old password does not match.'));
            return redirect()->back();
        }
    }


    public function becomeAnInstructor()
    {
        if (auth()->user()->role == USER_ROLE_INSTRUCTOR) {
            $this->showToastrMessage('error', __('You are already an instructor!'));
            return redirect()->back();
        } elseif (auth()->user()->role == USER_ROLE_ORGANIZATION) {
            $this->showToastrMessage('error', __('You are already an organization!'));
            return redirect()->back();
        }

        $data['pageTitle'] = 'Become an Instructor';
        $data['instructorFeatures'] = InstructorFeature::take(3)->get();
        $data['instructorProcedures'] = InstructorProcedure::all();
        $data['total_students'] = Student::count();
        $data['total_enrollments'] = Enrollment::count();
        $data['total_instructors'] = Instructor::count();
        $data['countries'] = Country::all();
        $data['all_coaching_types'] = CoachingType::all();

        return view('frontend.student.settings.become-an-instructor', $data);
    }

    public function becomeAnOrganization()
    {
        if (auth()->user()->role == USER_ROLE_INSTRUCTOR) {
            $this->showToastrMessage('error', __('You are already an instructor!'));
            return redirect()->back();
        } elseif (auth()->user()->role == USER_ROLE_ORGANIZATION) {
            $this->showToastrMessage('error', __('You are already an organization!'));
            return redirect()->back();
        }

        $data['pageTitle'] = 'Become an Organization';
        $data['instructorFeatures'] = InstructorFeature::take(3)->get();
        $data['instructorProcedures'] = InstructorProcedure::all();
        $data['total_students'] = Student::count();
        $data['total_enrollments'] = Enrollment::count();
        $data['total_instructors'] = Instructor::count();
        $data['countries'] = Country::all();
        $data['all_coaching_types'] = CoachingType::all();

        return view('frontend.student.settings.become-an-organization', $data);
    }

    public function saveInstructorInfo(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'coachingTypes' => 'required|array',
            'last_name' => 'required',
            'email' => 'required',
            'nationality' => 'required',
            'gender' => 'required',
            'country_id' => 'required',
            'professional_title' => 'required',
            'about_me' => 'required',
            'cv_file' => 'required|max:5000|mimes:pdf',
        ],
            [
                'required' => 'The :attribute field is required.',
            ]);

        $authUser = Auth::user();


        $object = Instructor::where('user_id', $authUser->id)->get();
        $student = Student::where('user_id', $authUser->id)->first();


        if ($object->count() > 0) {
            $this->showToastrMessage('success', __('Request already send'));
            return redirect(route('student.dashboard'));
        } else {


            $slugCount = Instructor::where('slug', getSlug($authUser->name))->count();


            if ($slugCount) {
                $slug = getSlug($authUser->name) . '-' . rand(100000, 999999);
            } else {
                $slug = getSlug($authUser->name);
            }

            $cv_file_data = $this->uploadFileWithDetails('user', $request->cv_file);
            if (!$cv_file_data['is_uploaded']) {
                $this->showToastrMessage('error', __('Something went wrong! Failed to upload file'));
                return redirect()->back();
            }
            $data = [
                'user_id' => Auth::user()->id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'nationality' => $request->nationality,
                'gender' => $request->gender,
                'country_id' => $request->country_id,
                'professional_title' => $request->professional_title,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'about_me' => $request->about_me,
                'slug' => $slug,
                'cv_file' => $cv_file_data['path'],
                'cv_filename' => $cv_file_data['original_filename'],
            ];

            $instructor = $this->instructorModel->create($data);
            $instructor->coachingTypes()->sync($request->coachingTypes);
            $student->gender = $request->gender;
            $student->save();
            $text = __("New organization request");
            $target_url = route('organizations.pending');


            $this->send($text, 1, $target_url, null);

            $this->showToastrMessage('success', __('Request successfully send'));
            return redirect(route('student.dashboard'));
        }


    }

    public function saveOrganizationInfo(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'organization_name' => 'required',
            'organization_email' => 'required',
            'agent_email' => 'required',
            'country_id' => 'required',
            'work_field' => 'required',
            'about_me' => 'required',
        ],
            [
                'required' => 'The :attribute field is required.',
            ]);

        $authUser = Auth::user();

        $object = Organization::where('user_id', $authUser->id)->get();
        if ($object->count() > 0) {
            $this->showToastrMessage('success', __('Request already send'));
            return redirect(route('student.dashboard'));
        } else {

            $slugCount = Organization::where('slug', getSlug($authUser->name))->count();
        }

        if ($slugCount) {
            $slug = getSlug($authUser->name) . '-' . rand(100000, 999999);
        } else {
            $slug = getSlug($authUser->name);
        }

        $data = [
            'user_id' => Auth::user()->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'organization_name' => $request->organization_name,
            'organization_email' => $request->organization_email,
            'agent_email' => $request->agent_email,
            'professional_title' => $request->work_field,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'about_me' => $request->about_me,
            'slug' => $slug,
        ];

        $this->organizationModel->create($data);
        $text = __("New instructor request");
        $target_url = route('instructor.pending');


        $this->send($text, 1, $target_url, null);

        $this->showToastrMessage('success', __('Request successfully send'));
        return redirect(route('student.dashboard'));


    }

    public function payForCoachRequest($uuid)
    {
        $instructor = $this->instructorModel->getRecordByUuid($uuid);
        $user = $instructor->user;
        $price = get_option('become_instructor_coast');
        DB::beginTransaction();
        try {
            $cartManagement = CartManagement::where('user_id', $user->id)
                ->where('course_id', null)
                ->where('product_id', null)
                ->where('consultation_slot_id', null)
                ->where('bundle_id', null)
                ->where('bundle_course_ids', null)
                ->where('promotion_id', null)
                ->first();
            if ($cartManagement) {
                $response['msg'] = __("You've already request to be a coach!");
                $response['status'] = 402;
                DB::rollBack();
                return response()->json($response);
            }
            $cart = new CartManagement();
            $cart->user_id = Auth::user()->id;
            $cart->main_price = $price;
            $cart->price = $price;

            $cart->save();

            $response['quantity'] = CartManagement::whereUserId(Auth::user()->id)->count();
            $response['msg'] = __("Added to cart");
            $response['msgInfoChange'] = __("Added to cart");
            $response['status'] = 200;
            //End:: Cart Management
            DB::commit();
            return redirect(route('student.checkoutForBecomeCoach'));
            return response()->json($response);
        } catch (\Exception $e) {
            DB::rollBack();
            $response['msg'] = __("Something is wrong! Try again.");
            $response['status'] = 402;
            return response()->json($response);
        }
    }

    public function payForOrganizationRequest($uuid)
    {
        $organization = $this->organizationModel->getRecordByUuid($uuid);
        $user = $organization->user;
        $price = get_option('become_organization_coast');
        DB::beginTransaction();
        try {
            $cartManagement = CartManagement::where('user_id', $user->id)
                ->where('course_id', null)
                ->where('product_id', null)
                ->where('consultation_slot_id', null)
                ->where('bundle_id', null)
                ->where('bundle_course_ids', null)
                ->where('promotion_id', null)
                ->first();
            if ($cartManagement) {
                $response['msg'] = __("You've already request to be a organization!");
                $response['status'] = 402;
                DB::rollBack();
                return response()->json($response);
            }
            $cart = new CartManagement();
            $cart->user_id = Auth::user()->id;
            $cart->main_price = $price;
            $cart->price = $price;

            $cart->save();

            $response['quantity'] = CartManagement::whereUserId(Auth::user()->id)->count();
            $response['msg'] = __("Added to cart");
            $response['msgInfoChange'] = __("Added to cart");
            $response['status'] = 200;
            //End:: Cart Management
            DB::commit();
            return redirect(route('student.checkoutForBecomeOrganization'));
            return response()->json($response);
        } catch (\Exception $e) {
            DB::rollBack();
            $response['msg'] = __("Something is wrong! Try again.");
            $response['status'] = 402;
            return response()->json($response);
        }
    }

    public function checkoutForBecomeCoach()
    {
        $data['pageTitle'] = "Checkout";
        $data['model'] = 'coach';
        $data['carts'] = CartManagement::whereUserId(@Auth::id())
            ->where('course_id', null)
            ->where('product_id', null)
            ->where('consultation_slot_id', null)
            ->where('bundle_id', null)
            ->where('bundle_course_ids', null)
            ->where('promotion_id', null)->get();
        $data['student'] = auth::user()->student;
        $data['countries'] = Country::orderBy('country_name', 'asc')->get();
        $data['banks'] = Bank::orderBy('name', 'asc')->where('status', 1)->get();

        if (old('country_id')) {
            $data['states'] = State::where('country_id', old('country_id'))->orderBy('name', 'asc')->get();
        }

        if (old('state_id')) {
            $data['cities'] = City::where('state_id', old('state_id'))->orderBy('name', 'asc')->get();
        }

        $razorpay_grand_total_with_conversion_rate = ($data['carts']->sum('price') + get_platform_charge($data['carts']->sum('price'))) * (get_option('razorpay_conversion_rate') ? get_option('razorpay_conversion_rate') : 0);
        $data['razorpay_grand_total_with_conversion_rate'] = (float)preg_replace("/[^0-9.]+/", "", number_format($razorpay_grand_total_with_conversion_rate, 2));

        $paystack_grand_total_with_conversion_rate = ($data['carts']->sum('price') + get_platform_charge($data['carts']->sum('price'))) * (get_option('paystack_conversion_rate') ? get_option('paystack_conversion_rate') : 0);
        $data['paystack_grand_total_with_conversion_rate'] = (float)preg_replace("/[^0-9.]+/", "", number_format($paystack_grand_total_with_conversion_rate, 2));

        $sslcommerz_grand_total_with_conversion_rate = ($data['carts']->sum('price') + get_platform_charge($data['carts']->sum('price'))) * (get_option('sslcommerz_conversion_rate') ? get_option('sslcommerz_conversion_rate') : 0);
        $data['sslcommerz_grand_total_with_conversion_rate'] = (float)preg_replace("/[^0-9.]+/", "", number_format($sslcommerz_grand_total_with_conversion_rate, 2));

        return view('frontend.student.cart.checkoutForBecomeCoach', $data);
    }

    public function checkoutForBecomeOrganization()
    {
        $data['pageTitle'] = "Checkout";
        $data['model'] = 'organization';
        $data['carts'] = CartManagement::whereUserId(@Auth::id())
            ->where('course_id', null)
            ->where('product_id', null)
            ->where('consultation_slot_id', null)
            ->where('bundle_id', null)
            ->where('bundle_course_ids', null)
            ->where('promotion_id', null)->get();
        $data['student'] = auth::user()->student;
        $data['countries'] = Country::orderBy('country_name', 'asc')->get();
        $data['banks'] = Bank::orderBy('name', 'asc')->where('status', 1)->get();

        if (old('country_id')) {
            $data['states'] = State::where('country_id', old('country_id'))->orderBy('name', 'asc')->get();
        }

        if (old('state_id')) {
            $data['cities'] = City::where('state_id', old('state_id'))->orderBy('name', 'asc')->get();
        }

        $razorpay_grand_total_with_conversion_rate = ($data['carts']->sum('price') + get_platform_charge($data['carts']->sum('price'))) * (get_option('razorpay_conversion_rate') ? get_option('razorpay_conversion_rate') : 0);
        $data['razorpay_grand_total_with_conversion_rate'] = (float)preg_replace("/[^0-9.]+/", "", number_format($razorpay_grand_total_with_conversion_rate, 2));

        $paystack_grand_total_with_conversion_rate = ($data['carts']->sum('price') + get_platform_charge($data['carts']->sum('price'))) * (get_option('paystack_conversion_rate') ? get_option('paystack_conversion_rate') : 0);
        $data['paystack_grand_total_with_conversion_rate'] = (float)preg_replace("/[^0-9.]+/", "", number_format($paystack_grand_total_with_conversion_rate, 2));

        $sslcommerz_grand_total_with_conversion_rate = ($data['carts']->sum('price') + get_platform_charge($data['carts']->sum('price'))) * (get_option('sslcommerz_conversion_rate') ? get_option('sslcommerz_conversion_rate') : 0);
        $data['sslcommerz_grand_total_with_conversion_rate'] = (float)preg_replace("/[^0-9.]+/", "", number_format($sslcommerz_grand_total_with_conversion_rate, 2));

        return view('frontend.student.cart.checkoutForBecomeCoach', $data);
    }

    public function oldSaveInstructorInfo(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'account_type' => 'required',
            'last_name' => 'required',
            'professional_title' => 'required',
            'about_me' => 'required',
            'cv_file' => 'required|max:5000|mimes:pdf',
        ],
            [
                'required' => 'The :attribute field is required.',
            ]);

        $authUser = Auth::user();

        if ($request->account_type == USER_ROLE_ORGANIZATION) {
            $object = Organization::where('user_id', $authUser->id)->get();
        } else {
            $object = Instructor::where('user_id', $authUser->id)->get();
        }

        if ($object->count() > 0) {
            $this->showToastrMessage('success', __('Request already send'));
            return redirect(route('student.dashboard'));
        } else {

            if ($request->account_type == USER_ROLE_ORGANIZATION) {
                $slugCount = Organization::where('slug', getSlug($authUser->name))->count();
            } else {
                $slugCount = Instructor::where('slug', getSlug($authUser->name))->count();
            }

            if ($slugCount) {
                $slug = getSlug($authUser->name) . '-' . rand(100000, 999999);
            } else {
                $slug = getSlug($authUser->name);
            }

            $cv_file_data = $this->uploadFileWithDetails('user', $request->cv_file);
            if (!$cv_file_data['is_uploaded']) {
                $this->showToastrMessage('error', __('Something went wrong! Failed to upload file'));
                return redirect()->back();
            }
            $data = [
                'user_id' => Auth::user()->id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'professional_title' => $request->professional_title,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'about_me' => $request->about_me,
                'slug' => $slug,
                'cv_file' => $cv_file_data['path'],
                'cv_filename' => $cv_file_data['original_filename'],
            ];

            if ($request->account_type == USER_ROLE_ORGANIZATION) {
                $this->organizationModel->create($data);
                $text = __("New instructor request");
                $target_url = route('instructor.pending');
            } else {
                $this->instructorModel->create($data);
                $text = __("New organization request");
                $target_url = route('organizations.pending');
            }

            $this->send($text, 1, $target_url, null);

            $this->showToastrMessage('success', __('Request successfully send'));
            return redirect(route('student.dashboard'));
        }


    }

    public function saveProfile(ProfileRequest $request, $uuid)
    {
        $student = $this->studentModel->getRecordByUuid($uuid);

        $user = User::find($student->user_id);
        if (User::where('id', '!=', $user->id)->where('email', $request->email)->count() > 0) {
            $this->showToastrMessage('warning', __('Email already exist'));
            return redirect()->back();
        } else {
            $user->email = $request->email;
        }
        if ($request->image) {
            $this->deleteFile($user->image); // delete file from server

            $image = $this->saveImage('user', $request->image, null, 'null'); // new file upload into server

        } else {
            $image = $user->image;
        }

        $user->name = $request->first_name . ' ' . $request->last_name;
        $user->image = $image;
        $user->save();

        $student_data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'about_me' => $request->about_me,
            'gender' => $request->gender
        ];

        $student = $this->studentModel->updateByUuid($student_data, $uuid); // update category

        $this->showToastrMessage('success', __('Successfully save'));
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

}
