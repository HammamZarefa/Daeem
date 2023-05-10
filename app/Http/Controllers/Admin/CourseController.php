<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Instructor\StoreCourseRequest;
use App\Models\Category;
use App\Models\Course;
use App\Models\Course_language;
use App\Models\Course_lecture;
use App\Models\Course_lecture_views;
use App\Models\Course_lesson;
use App\Models\CourseInstructor;
use App\Models\CourseUploadRule;
use App\Models\Difficulty_level;
use App\Models\Enrollment;
use App\Models\GmeetSetting;
use App\Models\Instructor;
use App\Models\LearnKeyPoint;
use App\Models\LiveClass;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Program_session;
use App\Models\Setting;
use App\Models\Student;
use App\Models\Subcategory;
use App\Models\Tag;
use App\Models\User;
use App\Tools\Repositories\Crud;
use App\Traits\General;
use App\Traits\ImageSaveTrait;
use App\Traits\SendNotification;
use Hamcrest\Core\AllOf;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use JoisarJignesh\Bigbluebutton\Facades\Bigbluebutton;

class CourseController extends Controller
{
    use General, ImageSaveTrait, SendNotification;

    protected $model, $lectureModel, $lessonModel,$programSessionModel;

    public function __construct(Course $course, Course_lesson $course_lesson, Course_lecture $course_lecture,Program_session $program_session)
    {
        $this->model = new Crud($course);
        $this->lectureModel = new Crud($course_lecture);
        $this->lessonModel = new Crud($course_lesson);
        $this->programSessionModel = new Crud($program_session);
    }

    public function index()
    {
        if (!Auth::user()->can('all_course')) {
            abort('403');
        } // end permission checking

        $data['title'] = 'All Courses';
        $data['courses'] = $this->model->getOrderById('DESC', 25);
        return view('admin.course.index', $data);
    }

    public function programmes()
    {
        if (!Auth::user()->can('all_programmes')) {
            abort('403');
        } // end permission checking

        $data['title'] = 'All Training Programmes';
        $data['courses'] = Course::where('course_type', 3)->paginate(25);;

        return view('admin.program.index', $data);
    }

    public function create()
    {
        if (!Auth::user()->can('add_course')) {
            abort('403');
        } // end permission checking

        $data['title'] = 'Create Course';
        $data['categories'] = Category::active()->orderBy('name', 'asc')->select('id', 'name')->get();
        $data['tags'] = Tag::orderBy('name', 'asc')->select('id', 'name')->get();
        $data['course_languages'] = Course_language::orderBy('name', 'asc')->select('id', 'name')->get();
        $data['difficulty_levels'] = Difficulty_level::orderBy('name', 'asc')->select('id', 'name')->get();
        if (old('category_id')) {
            $data['subcategories'] = Subcategory::where('category_id', old('category_id'))->select('id', 'name')->orderBy('name', 'asc')->get();
        } else {
            $data['subcategories'] = [];
        }

        $selected_tags = [];

        if (old('tag')) {
            $selected_tags = old('tag');
        } else {
            $selected_tags = [];
        }

        $data['selected_tags'] = $selected_tags;
        $data['instructors'] = Instructor::approved()->orderBy('id', 'desc')->get();
        return view('admin.course.create', $data);
    }

    public function store(StoreCourseRequest $request)
    {
        if (Course::where('slug', Str::slug($request->title))->count() > 0)
        {
            $slug = Str::slug($request->title) . '-'. rand(100000, 999999);
        } else {
            $slug = Str::slug($request->title);
        }

        $data = [
            'title' => $request->title,
            'course_type' => $request->course_type,
            'subtitle' => $request->subtitle,
            'slug' => $slug,
            'status' => 4,
            'instructor_id' =>$request->coach,
            'description' => $request->description
        ];


        $data['is_subscription_enable']= 0;

        if(get_option('subscription_mode')){
            $data['is_subscription_enable'] = $request->is_subscription_enable;
        }

        if($data['is_subscription_enable']){
            $count = Course::where('user_id', auth()->id())->count();
            if(!hasLimitSaaS(PACKAGE_RULE_SUBSCRIPTION_COURSE, PACKAGE_TYPE_SAAS_INSTRUCTOR, $count)){
                $this->showToastrMessage('error', __('Your Subscription Enable Course Create limit has been finish.'));
                return redirect()->back();
            }
        }

        $course = $this->model->create($data);
        if ($request['key_points']) {
            if (count(@$request['key_points']) > 0) {
                foreach ($request['key_points'] as $item) {
                    if (@$item['name']) {
                        $key_point = new LearnKeyPoint();
                        $key_point->course_id = $course->id;
                        $key_point->name = @$item['name'];
                        $key_point->save();
                    }
                }
            }
        }
        return redirect(route('admin.course.edit', [$course->uuid, 'step=category']));
    }

    public function edit($uuid)
    {
        $data['navCourseUploadActiveClass'] = 'active';
        $data['title'] = 'Upload Course';
        $data['rules'] = CourseUploadRule::all();
        $data['course'] = Course::where('courses.uuid', $uuid)->whereNull('organization_id')->firstOrFail();
        $user_id = auth()->id();

        if(!$data['course']->user_id == $user_id){

            $courseInstructor = $data['course']->course_instructors()->where('instructor_id', $user_id)->where('status', STATUS_ACCEPTED)->first();
            if(!$courseInstructor){
                $this->showToastrMessage('error', __('You don\'t have permission to edit this'));
                return redirect()->back();
            }
        }

        $data['keyPoints'] = LearnKeyPoint::whereCourseId($data['course']->id)->get();
        if (\request('step') == 'category') {
            $data['categories'] = Category::active()->orderBy('name', 'asc')->select('id', 'name')->get();
            $data['tags'] = Tag::orderBy('name', 'asc')->select('id', 'name')->get();
            $data['course_languages'] = Course_language::orderBy('name', 'asc')->select('id', 'name')->get();
            $data['difficulty_levels'] = Difficulty_level::orderBy('name', 'asc')->select('id', 'name')->get();
            if (old('category_id')) {
                $data['subcategories'] = Subcategory::where('category_id', old('category_id'))->select('id', 'name')->orderBy('name', 'asc')->get();
            } elseif ($data['course']->category_id) {
                $data['subcategories'] = Subcategory::where('category_id', $data['course']->category_id)->select('id', 'name')->orderBy('name', 'asc')->get();
            } else {
                $data['subcategories'] = [];
            }

            $selected_tags = [];

            if (old('tag')) {
                $selected_tags = old('tag');
            } elseif ($data['course']->tags->count() > 0) {
                foreach ($data['course']->tags as $tag) {
                    $selected_tags[] = $tag->id;
                }
            } else {
                $selected_tags = [];
            }

            $data['selected_tags'] = $selected_tags;

            return view('admin.course.edit-category', $data);
        } elseif (\request('step') == 'lesson') {
            if ($data['course']->course_type == COURSE_TYPE_GENERAL) {
                return view('admin.course.lesson', $data);
            } else {
                return view('admin.course.scorm_upload', $data);
            }
        } elseif (\request('step') == 'instructors') {
            if ($data['course']->user_id != auth()->id() && auth()->user()->is_admin() != true) {
                return view('admin.course.submit-lesson', $data);
            }

            $data['instructors'] = User::where('role', USER_ROLE_INSTRUCTOR)->where('id', '!=', $data['course']->user_id)->where('id', '!=', auth()->id())->select('id', 'name')->get();
            return view('admin.course.instructors', $data);
        } elseif (\request('step') == 'submit') {
            $uuid = $data['course']->uuid;
            $course = $data['course'];
            $user_id = auth()->id();
            $user = User::find($user_id);
            if ($user->role != 1) {
                if (!$course->user_id == $user_id) {
                    $courseInstructor = $course->course_instructors()->where('instructor_id', $user_id)->where('status', STATUS_ACCEPTED)->first();
                    if (!$courseInstructor) {
                        $this->showToastrMessage('error', __('You don\'t have permission to edit this'));
                        return redirect()->back();
                    }
                }
            }


            if ($course->status == 1) {

                if ($course->user_id != auth()->id()) {
                    //TODO: notify from here to multi instructor;
                    $text = __("You have selected as co-instructor");
                    $target_url = route('instructor.multi_instructor');
                    $courseInstructors = $course->course_instructors->where('status', STATUS_PENDING)->where('instructor_id', '!=', $course->user_id);

                    foreach ($courseInstructors as $courseInstructor) {
                        $this->send($text, 2, $target_url, $courseInstructor->instructor->user_id);
                    }
                }
            } else {
                if ($user->role != 1) {
                    $course->status = 2;
                } else {
                    $course->status = 1;
                }
            }
            $course->save();
            return redirect(route('admin.course.index'));
        } else {
            return view('admin.course.edit', $data);
        }
    }

    public function updateOverview(StoreCourseRequest $request, $uuid)
    {
        $data['navCourseUploadActiveClass'] = 'active';
        $course = Course::where('courses.uuid', $uuid)->first();
        $user_id = auth()->id();

        if(!$course->user_id == $user_id){

            $courseInstructor = $course->course_instructors()->where('instructor_id', $user_id)->where('status', STATUS_ACCEPTED)->first();
            if(!$courseInstructor){
                $this->showToastrMessage('error', __('You don\'t have permission to edit this'));
                return redirect()->back();
            }
        }

        if (Course::where('slug', getSlug($request->title))->where('id', '!=', $course->id)->count() > 0)
        {
            $slug = getSlug($request->title) . '-'. rand(100000, 999999);
        } else {
            $slug = getSlug($request->title);
        }

        $data = [
            'title' => $request->title,
            'course_type' => $request->course_type,
            'subtitle' => $request->subtitle,
            'slug' => $slug,
            'description' => $request->description
        ];

        $data['is_subscription_enable'] = 0;

        if(get_option('subscription_mode')){
            $data['is_subscription_enable'] = $request->is_subscription_enable;
        }

        if($data['is_subscription_enable']){
            if($course->status == STATUS_APPROVED){
                $count = CourseInstructor::join('courses', 'courses.id', '=', 'course_instructor.course_id')->where('is_subscription_enable', STATUS_ACCEPTED)->where('course_instructor.instructor_id', auth()->id())->groupBy('course_id')->count();
            }
            else{
                $count = Course::where('user_id', auth()->id())->count();
            }
            if(!hasLimitSaaS(PACKAGE_RULE_SUBSCRIPTION_COURSE, PACKAGE_TYPE_SAAS_INSTRUCTOR, $count)){
                $this->showToastrMessage('error', __('Your Subscription Enable Course Create limit has been finish.'));
                return redirect()->back();
            }
        }

        $this->model->updateByUuid($data, $uuid); // update category

        $now = now();
        if ($request['key_points']) {
            if (count(@$request['key_points']) > 0) {
                foreach ($request['key_points'] as $item) {
                    if (@$item['name']) {
                        if (@$item['id']) {
                            $key_point = LearnKeyPoint::find($item['id']);
                        } else {
                            $key_point = new LearnKeyPoint();
                        }
                        $key_point->course_id = $course->id;
                        $key_point->name = @$item['name'];
                        $key_point->updated_at = $now;
                        $key_point->save();
                    }
                }
            }
        }

        LearnKeyPoint::where('course_id', $course->id)->where('updated_at', '!=', $now)->get()->map(function ($q) {
            $q->delete();
        });

        if ($course->status != 0) {
            $text = __("Course overview has been updated");
            $target_url = route('admin.course.index');
            $this->send($text, 1, $target_url, null);
        }

        return redirect(route('admin.course.edit', [$course->uuid, 'step=category']));
    }

    public function updateCategory(Request $request, $uuid)
    {
        $course = Course::where('courses.uuid', $uuid)->first();
        $user_id = auth()->id();

        if(!$course->user_id == $user_id){

            $courseInstructor = $course->course_instructors()->where('instructor_id', $user_id)->where('status', STATUS_ACCEPTED)->first();
            if(!$courseInstructor){
                $this->showToastrMessage('error', __('You don\'t have permission to edit this'));
                return redirect()->back();
            }
        }

        if ($request->image) {
//            $request->validate([
//                'image' => 'dimensions:min_width=575,min_height=450,max_width=575,max_height=450'
//            ]);
            $this->deleteFile($course->image); // delete file from server
            $image = $this->saveImage('course', $request->image, null, null); // new file upload into server
        } else {
            $image = $course->image;
        }

        if ($request->video) {
            $this->deleteVideoFile($course->video); // delete file from server
            $file_details = $this->uploadFileWithDetails('course', $request->video);
            if (!$file_details['is_uploaded']) {
                $this->showToastrMessage('error', __('Something went wrong! Failed to upload file'));
                return redirect()->back();
            }
            $video = $file_details['path'];
        } else {
            $video = $course->video;
        }

        $data = [
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'price' => $request->price,
            'old_price' => $request->old_price,
            'drip_content' => $request->drip_content,
            'access_period' => ($request->access_period || $request->access_period < 0) ? NULL : $request->access_period,
            'course_language_id' => $request->course_language_id,
            'difficulty_level_id' => $request->difficulty_level_id,
            'learner_accessibility' => $request->learner_accessibility,
            'image' => $image ?? null,
            'video' => $video ?? null,
            'intro_video_check' => $request->intro_video_check,
            'youtube_video_id' => $request->youtube_video_id ?? null,
        ];

        $this->model->updateByUuid($data, $uuid); // update category

        if ($request->tag) {
            $course->tags()->sync($request->tag);
        }

        if ($course->status != 0) {
            $text = __("Course category has been updated");
            $target_url = route('admin.course.index');
            $this->send($text, 1, $target_url, null);
        }


        return redirect(route('admin.course.edit', [$course->uuid, 'step=lesson']));
    }

    public function createProgram()
    {
        if (!Auth::user()->can('add_program')) {
            abort('403');
        } // end permission checking

        $data['title'] = 'Create Training Program';
        $data['categories'] = Category::active()->orderBy('name', 'asc')->select('id', 'name')->get();
        $data['tags'] = Tag::orderBy('name', 'asc')->select('id', 'name')->get();
        $data['course_languages'] = Course_language::orderBy('name', 'asc')->select('id', 'name')->get();
        $data['difficulty_levels'] = Difficulty_level::orderBy('name', 'asc')->select('id', 'name')->get();
        if (old('category_id')) {
            $data['subcategories'] = Subcategory::where('category_id', old('category_id'))->select('id', 'name')->orderBy('name', 'asc')->get();
        } else {
            $data['subcategories'] = [];
        }

        $selected_tags = [];

        if (old('tag')) {
            $selected_tags = old('tag');
        } else {
            $selected_tags = [];
        }

        $data['selected_tags'] = $selected_tags;
        return view('admin.program.create', $data);
    }

    public function storeProgram(StoreCourseRequest $request)
    {
        if (Course::where('slug', Str::slug($request->title))->count() > 0) {
            $slug = Str::slug($request->title) . '-' . rand(100000, 999999);
        } else {
            $slug = Str::slug($request->title);
        }

        $data = [
            'title' => $request->title,
            'course_type' => $request->course_type,
            'subtitle' => $request->subtitle,
            'slug' => $slug,
            'status' => 4,
            'description' => $request->description
        ];

        $data['is_subscription_enable'] = 0;

        if (get_option('subscription_mode')) {
            $data['is_subscription_enable'] = $request->is_subscription_enable;
        }

        if ($data['is_subscription_enable']) {
            $count = Course::where('user_id', auth()->id())->count();
            if (!hasLimitSaaS(PACKAGE_RULE_SUBSCRIPTION_COURSE, PACKAGE_TYPE_SAAS_INSTRUCTOR, $count)) {
                $this->showToastrMessage('error', __('Your Subscription Enable Course Create limit has been finish.'));
                return redirect()->back();
            }
        }

        $course = $this->model->create($data);

        if ($request['key_points']) {
            if (count(@$request['key_points']) > 0) {
                foreach ($request['key_points'] as $item) {
                    if (@$item['name']) {
                        $key_point = new LearnKeyPoint();
                        $key_point->course_id = $course->id;
                        $key_point->name = @$item['name'];
                        $key_point->save();
                    }
                }
            }
        }

        $uuid = $course->uuid;

        $user_id = auth()->id();


        if (!$course->user_id == $user_id) {

            $courseInstructor = $course->course_instructors()->where('instructor_id', $user_id)->where('status', STATUS_ACCEPTED)->first();
            if (!$courseInstructor) {
                $this->showToastrMessage('error', __('You don\'t have permission to edit this'));
                return redirect()->back();
            }
        }
//        if ($request->image) {
//            $request->validate([
//                'image' => 'dimensions:min_width=575,min_height=450,max_width=575,max_height=450'
//            ]);
//            dd('dgjskdjgisd');
//            $image = $this->saveImage('course', $request->image, null, null); // new file upload into server
//        } else {
//            $image = $course->image;
//        }
//        if ($request->video) {
//            $this->deleteVideoFile($course->video); // delete file from server
//            $file_details = $this->uploadFileWithDetails('course', $request->video);
//            if (!$file_details['is_uploaded']) {
//                $this->showToastrMessage('error', __('Something went wrong! Failed to upload file'));
//                return redirect()->back();
//            }
//            $video = $file_details['path'];
//        } else {
//            $video = $course->video;
//        }
        $data = [
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'price' => $request->price,
            'old_price' => $request->old_price,
            'drip_content' => $request->drip_content,
            'access_period' => ($request->access_period || $request->access_period < 0) ? NULL : $request->access_period,
            'course_language_id' => $request->course_language_id,
            'difficulty_level_id' => $request->difficulty_level_id,
            'learner_accessibility' => $request->learner_accessibility,
            'image' => $image ?? null,
            'video' => $video ?? null,
            'intro_video_check' => $request->intro_video_check,
            'youtube_video_id' => $request->youtube_video_id ?? null,
        ];

        $this->model->updateByUuid($data, $uuid); // update category
//        dd($request->tag);
        if ($request->tag) {
            $course->tags()->sync($request->tag);
        }

        if ($course->status != 0) {
            $text = __("Course category has been updated");
            $target_url = route('admin.course.index');
            $this->send($text, 1, $target_url, null);
        }


        return redirect(route('admin.program.edit', [$course->uuid, 'step=lesson']));
    }

    public function editProgram($uuid)
    {

        $data['navCourseUploadActiveClass'] = 'active';
        $data['title'] = 'Upload Course';
        $data['rules'] = CourseUploadRule::all();
        $data['course'] = Course::where('courses.uuid', $uuid)->whereNull('organization_id')->firstOrFail();
        $user_id = auth()->id();

        if (!$data['course']->user_id == $user_id) {

            $courseInstructor = $data['course']->course_instructors()->where('instructor_id', $user_id)->where('status', STATUS_ACCEPTED)->first();
            if (!$courseInstructor) {
                $this->showToastrMessage('error', __('You don\'t have permission to edit this'));
                return redirect()->back();
            }
        }

        $data['keyPoints'] = LearnKeyPoint::whereCourseId($data['course']->id)->get();

        if (\request('step') == 'category') {
            $data['categories'] = Category::active()->orderBy('name', 'asc')->select('id', 'name')->get();
            $data['tags'] = Tag::orderBy('name', 'asc')->select('id', 'name')->get();
            $data['course_languages'] = Course_language::orderBy('name', 'asc')->select('id', 'name')->get();
            $data['difficulty_levels'] = Difficulty_level::orderBy('name', 'asc')->select('id', 'name')->get();
            if (old('category_id')) {
                $data['subcategories'] = Subcategory::where('category_id', old('category_id'))->select('id', 'name')->orderBy('name', 'asc')->get();
            } elseif ($data['course']->category_id) {
                $data['subcategories'] = Subcategory::where('category_id', $data['course']->category_id)->select('id', 'name')->orderBy('name', 'asc')->get();
            } else {
                $data['subcategories'] = [];
            }

            $selected_tags = [];

            if (old('tag')) {
                $selected_tags = old('tag');
            } elseif ($data['course']->tags->count() > 0) {
                foreach ($data['course']->tags as $tag) {
                    $selected_tags[] = $tag->id;
                }
            } else {
                $selected_tags = [];
            }

            $data['selected_tags'] = $selected_tags;

            return view('admin.program.edit-category', $data);
        }
        elseif (\request('step') == 'lesson') {
            if ($data['course']->course_type == COURSE_TYPE_GENERAL) {
                return view('admin.program.lesson', $data);
            } elseif ($data['course']->course_type == COURSE_TYPE_SCORM) {
                return view('admin.program.scorm_upload', $data);
            } else {
                $data['title'] = 'Program Sessions List';
                $data['navLiveClassActiveClass'] = 'active';

                $data['navUpcomingActive'] = 'active';
                $data['tabUpcomingActive'] = 'show active';

                $data['course'] = $this->model->getRecordByUuid($uuid);

                $now = now();

                $data['upcoming_live_classes'] = Program_session::whereCourseId($data['course']->id)->whereUserId(\Illuminate\Support\Facades\Auth::user()->id)
                    ->where('date', '>=', $now)
                    ->latest()->paginate(15, '*', 'upcoming');

                $data['past_live_classes'] = Program_session::whereCourseId($data['course']->id)->whereUserId(Auth::user()->id)
                    ->where('date', '<=', $now)
                    ->latest()->paginate(15, '*', 'past');


                return view('admin.program.program_lesson', $data);
            }
        }
        elseif (\request('step') == 'instructors') {
            if ($data['course']->user_id != auth()->id()) {
                return view('admin.program.submit-lesson', $data);
            }

            $data['instructors'] = User::where('role', USER_ROLE_ADMIN)->where('id', '!=', $data['course']->user_id)->where('id', '!=', auth()->id())->select('id', 'name')->get();
            return view('admin.program.instructors', $data);
        }
        elseif (\request('step') == 'submit') {
            return view('admin.program.submit-lesson', $data);
        }elseif (\request('step') == 'changeStatus'){
            return view('admin.program.change_status', $data);
        } else {
            return view('admin.program.edit', $data);
        }
    }

    public function updateProgramCategory(Request $request, $uuid)
    {
        $course = Course::where('courses.uuid', $uuid)->first();
        $user_id = auth()->id();

        if (!$course->user_id == $user_id) {

            $courseInstructor = $course->course_instructors()->where('instructor_id', $user_id)->where('status', STATUS_ACCEPTED)->first();
            if (!$courseInstructor) {
                $this->showToastrMessage('error', __('You don\'t have permission to edit this'));
                return redirect()->back();
            }
        }

        if ($request->image) {
            $request->validate([
                'image' => 'dimensions:min_width=575,min_height=450,max_width=575,max_height=450'
            ]);
            $this->deleteFile($course->image); // delete file from server
            $image = $this->saveImage('course', $request->image, null, null); // new file upload into server
        } else {
            $image = $course->image;
        }

        if ($request->video) {
            $this->deleteVideoFile($course->video); // delete file from server
            $file_details = $this->uploadFileWithDetails('course', $request->video);
            if (!$file_details['is_uploaded']) {
                $this->showToastrMessage('error', __('Something went wrong! Failed to upload file'));
                return redirect()->back();
            }
            $video = $file_details['path'];
        } else {
            $video = $course->video;
        }

        $data = [
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'price' => $request->price,
            'old_price' => $request->old_price,
            'drip_content' => $request->drip_content,
            'access_period' => ($request->access_period || $request->access_period < 0) ? NULL : $request->access_period,
            'course_language_id' => $request->course_language_id,
            'difficulty_level_id' => $request->difficulty_level_id,
            'learner_accessibility' => $request->learner_accessibility,
            'image' => $image ?? null,
            'video' => $video ?? null,
            'intro_video_check' => $request->intro_video_check,
            'youtube_video_id' => $request->youtube_video_id ?? null,
        ];

        $this->model->updateByUuid($data, $uuid); // update category

        if ($request->tag) {
            $course->tags()->sync($request->tag);
        }

        if ($course->status != 0) {
            $text = __("Course category has been updated");
            $target_url = route('admin.program.index');
            $this->send($text, 1, $target_url, null);
        }


        return redirect(route('admin.program.edit', [$course->uuid, 'step=lesson']));
    }

    public function updateProgramOverview(Request $request, $uuid)
    {
        $data['navCourseUploadActiveClass'] = 'active';
        $course = Course::where('courses.uuid', $uuid)->first();
        $user_id = auth()->id();

        if(!$course->user_id == $user_id){

            $courseInstructor = $course->course_instructors()->where('instructor_id', $user_id)->where('status', STATUS_ACCEPTED)->first();
            if(!$courseInstructor){
                $this->showToastrMessage('error', __('You don\'t have permission to edit this'));
                return redirect()->back();
            }
        }

        if (Course::where('slug', getSlug($request->title))->where('id', '!=', $course->id)->count() > 0)
        {
            $slug = getSlug($request->title) . '-'. rand(100000, 999999);
        } else {
            $slug = getSlug($request->title);
        }

        $data = [
            'title' => $request->title,
//            'course_type' => 3,
            'subtitle' => $request->subtitle,
            'slug' => $slug,
            'description' => $request->description
        ];

        $data['is_subscription_enable'] = 0;

        if(get_option('subscription_mode')){
            $data['is_subscription_enable'] = $request->is_subscription_enable;
        }

        if($data['is_subscription_enable']){
            if($course->status == STATUS_APPROVED){
                $count = CourseInstructor::join('courses', 'courses.id', '=', 'course_instructor.course_id')->where('is_subscription_enable', STATUS_ACCEPTED)->where('course_instructor.instructor_id', auth()->id())->groupBy('course_id')->count();
            }
            else{
                $count = Course::where('user_id', auth()->id())->count();
            }
            if(!hasLimitSaaS(PACKAGE_RULE_SUBSCRIPTION_COURSE, PACKAGE_TYPE_SAAS_INSTRUCTOR, $count)){
                $this->showToastrMessage('error', __('Your Subscription Enable Course Create limit has been finish.'));
                return redirect()->back();
            }
        }

        $this->model->updateByUuid($data, $uuid); // update category

        $now = now();
        if ($request['key_points']) {
            if (count(@$request['key_points']) > 0) {
                foreach ($request['key_points'] as $item) {
                    if (@$item['name']) {
                        if (@$item['id']) {
                            $key_point = LearnKeyPoint::find($item['id']);
                        } else {
                            $key_point = new LearnKeyPoint();
                        }
                        $key_point->course_id = $course->id;
                        $key_point->name = @$item['name'];
                        $key_point->updated_at = $now;
                        $key_point->save();
                    }
                }
            }
        }

        LearnKeyPoint::where('course_id', $course->id)->where('updated_at', '!=', $now)->get()->map(function ($q) {
            $q->delete();
        });

        if ($course->status != 0) {
            $text = __("Course overview has been updated");
            $target_url = route('admin.program.index');
            $this->send($text, 1, $target_url, null);
        }

        return redirect(route('admin.program.edit', [$course->uuid, 'step=category']));
    }

    public function updateProgramStatus(Request $request, $uuid)
    {
        $data['navCourseUploadActiveClass'] = 'active';
        $course = Course::where('courses.uuid', $uuid)->first();
        $user_id = auth()->id();

        if(!$course->user_id == $user_id){

            $courseInstructor = $course->course_instructors()->where('instructor_id', $user_id)->where('status', STATUS_ACCEPTED)->first();
            if(!$courseInstructor){
                $this->showToastrMessage('error', __('You don\'t have permission to edit this'));
                return redirect()->back();
            }
        }

        $data = [
            'status' => $request->status,
        ];
        $this->model->updateByUuid($data, $uuid); // update category

        $text = __("Course Status has been updated");
        $target_url = route('admin.program.index');
        $this->send($text, 1, $target_url, null);

        return redirect(route('admin.program.index'));
    }

    public function storeCourseInstructor(Request $request, $uuid)
    {

        $course = Course::whereUuid($uuid)->firstOrFail();
        if ($course->user_id == auth()->id() || auth()->user()->is_admin()) {

            $request->validate([
                'share.*' => 'bail|required|min:0|max:100'
            ]);
            $data = $request->all();
            $courseInstructorIds = [];
            if($request->instructor_id){

                $totalShare = array_sum($request->share);
                if ($totalShare > 100) {
                    $this->showToastrMessage('error', 'The total percentage should not be grater than 100');
                    return back()->withInput();
                }

                foreach ($data['instructor_id'] as $id => $instructor) {
                    $courseInstructor = CourseInstructor::updateOrCreate([
                        'instructor_id' => $id,
                        'course_id' => $course->id,
                    ], [
                        'instructor_id' => $id,
                        'course_id' => $course->id,
                        'share' => $data['share'][$id],
                    ]);

                    array_push($courseInstructorIds, $courseInstructor->id);
                }
            }
            else{
                $totalShare = 0;
            }

            $courseInstructor = CourseInstructor::updateOrCreate([
                'instructor_id' => $course->user_id,
                'course_id' => $course->id,
            ], [
                'instructor_id' => $course->user_id,
                'course_id' => $course->id,
                'share' => (100 - $totalShare),
                'status' => STATUS_ACCEPTED
            ]);


            array_push($courseInstructorIds, $courseInstructor->id);

            CourseInstructor::whereNotIn('id', $courseInstructorIds)->where('course_id', $course->id)->delete();

            return redirect(route('admin.course.edit', [$course->uuid, 'step=submit']));
        }
    }

    public function storeInstructor(Request $request, $uuid)
    {
        $course = Course::where('user_id', auth()->id())->whereUuid($uuid)->firstOrFail();

        if ($course->user_id == auth()->id()) {
            $request->validate([
                'share.*' => 'bail|required|min:0|max:100'
            ]);

            $data = $request->all();
            $courseInstructorIds = [];
            if ($request->instructor_id) {

                $totalShare = array_sum($request->share);
                if ($totalShare > 100) {
                    $this->showToastrMessage('error', 'The total percentage should not be grater than 100');
                    return back()->withInput();
                }

                foreach ($data['instructor_id'] as $id => $instructor) {
                    $courseInstructor = CourseInstructor::updateOrCreate([
                        'instructor_id' => $id,
                        'course_id' => $course->id,
                    ], [
                        'instructor_id' => $id,
                        'course_id' => $course->id,
                        'share' => $data['share'][$id],
                    ]);

                    array_push($courseInstructorIds, $courseInstructor->id);
                }
            } else {
                $totalShare = 0;
            }

            $courseInstructor = CourseInstructor::updateOrCreate([
                'instructor_id' => $course->user_id,
                'course_id' => $course->id,
            ], [
                'instructor_id' => $course->user_id,
                'course_id' => $course->id,
                'share' => (100 - $totalShare),
                'status' => STATUS_ACCEPTED
            ]);


            array_push($courseInstructorIds, $courseInstructor->id);

            CourseInstructor::whereNotIn('id', $courseInstructorIds)->where('course_id', $course->id)->delete();

            return redirect(route('admin.program.edit', [$course->uuid, 'step=submit']));
        }
    }

    public function createProgramSession($course_uuid)
    {
        $data['title'] = 'Live Class Create';
        $data['navLiveClassActiveClass'] = 'active';
        $data['instructors'] = Instructor::approved()->orderBy('id', 'desc')->get();

        $data['course'] = $this->model->getRecordByUuid($course_uuid);
        $data['gmeet'] = GmeetSetting::whereUserId(\Illuminate\Support\Facades\Auth::id())->where('status', GMEET_AUTHORIZE)->first();
        return view('admin.program.create-session', $data);
    }

    public function storeProgramSession(Request $request, $course_uuid)
    {
        $request->validate([
            'class_topic' => 'required|max:255',
            'date' => 'required',
            'coach' => 'required',
            'session_type' => 'required',
            'duration' => 'required',
            'moderator_pw' => 'nullable|min:6',
            'attendee_pw' => 'nullable|min:6',
        ]);
        try {
            DB::beginTransaction();
            $course = $this->model->getRecordByUuid($course_uuid);
            $class = new Program_session();
            $class->course_id = $course->id;
            $class->instructor_id = $request->coach;
            $class->session_type = $request->session_type;
            $class->description = $request->desc;
            $class->class_topic = $request->class_topic;
            $class->date = $request->date;
            $class->duration = $request->duration;
            if ($request->meeting_host_name == 'gmeet'){
                $class->start_url = $request->gmeet_link;
            }else{
                $class->start_url = $request->start_url;
            }

            $class->join_url = $request->join_url;
            $class->meeting_host_name = $request->meeting_host_name;
            $class->meeting_id = $request->meeting_host_name == 'jitsi' ? $request->jitsi_meeting_id : $class->id . rand();
            $class->moderator_pw = $request->moderator_pw;
            $class->attendee_pw = $request->attendee_pw;
            $class->save();

            /** ====== Start:: BigBlueButton create meeting ===== */
//            if ($class->meeting_host_name == 'bbb') {
//                Bigbluebutton::create([
//                    'meetingID' => $class->meeting_id,
//                    'meetingName' => $class->class_topic,
//                    'attendeePW' => $request->moderator_pw,
//                    'moderatorPW' => $request->attendee_pw
//                ]);
//            }
            /** ====== End:: BigBlueButton create meeting ===== */

            /** ====== Start:: Gmeet create meeting ===== */
//            if ($class->meeting_host_name == 'gmeet') {
//                $endDate = \Carbon\Carbon::parse($class->date)->addMinutes($class->duration);
//                $link = GmeetSetting::createMeeting($class->class_topic, $class->date, $endDate);
//                $class->join_url = $link;
//                $class->save();
//            }
            /** ====== End:: Gmeet create meeting ===== */


            /** ====== send notification to student ===== */
            $students = Enrollment::where('course_id', $course->id)->select('user_id')->get();
            foreach ($students as $student) {
                $text = __("New Live Class Added");
                $target_url = route('student.my-course.show', $course->slug);
                $this->send($text, 3, $target_url, $student->user_id);
            }
            /** ====== send notification to student ===== */

            DB::commit();
            $this->showToastrMessage('success', 'Live Class Created Successfully');
            return redirect()->route('admin.program.edit', [$course->uuid, 'step=lesson']);
        } catch (Exception $e) {
            DB::rollBack();
            $this->showToastrMessage('error', 'Please check your credentials');
            return redirect()->back()->withInput();
        }
    }

    public function editProgramSession($session_uuid)
    {
        $data['title'] = 'Edit Program Session';
        $data['navLiveClassActiveClass'] = 'active';
        $data['instructors'] = Instructor::approved()->orderBy('id', 'desc')->get();
        $data['session'] = $this->programSessionModel->getRecordByUuid($session_uuid);
        $data['course'] = $data['session']->course;
        $data['gmeet'] = GmeetSetting::whereUserId(\Illuminate\Support\Facades\Auth::id())->where('status', GMEET_AUTHORIZE)->first();
        return view('admin.program.edit-session', $data);
    }

    public function updateProgramSession(Request $request, $session_uuid)
    {
        $request->validate([
            'class_topic' => 'required|max:255',
            'date' => 'required',
            'coach' => 'required',
            'session_type' => 'required',
            'duration' => 'required',
            'moderator_pw' => 'nullable|min:6',
            'attendee_pw' => 'nullable|min:6',
        ]);
        try {
            DB::beginTransaction();
            $class = $this->programSessionModel->getRecordByUuid($session_uuid);
            $course = $class->course;
            $class->course_id = $course->id;
            $class->instructor_id = $request->coach;
            $class->session_type = $request->session_type;
            $class->description = $request->desc;
            $class->class_topic = $request->class_topic;
            $class->date = $request->date;
            $class->duration = $request->duration;
            $class->start_url = $request->start_url;
            $class->join_url = $request->join_url;
            $class->meeting_host_name = $request->meeting_host_name;
            $class->meeting_id = $request->meeting_host_name == 'jitsi' ? $request->jitsi_meeting_id : $class->id . rand();
            $class->moderator_pw = $request->moderator_pw;
            $class->attendee_pw = $request->attendee_pw;
            $class->save();

            /** ====== Start:: BigBlueButton create meeting ===== */
            if ($class->meeting_host_name == 'bbb') {
                Bigbluebutton::create([
                    'meetingID' => $class->meeting_id,
                    'meetingName' => $class->class_topic,
                    'attendeePW' => $request->moderator_pw,
                    'moderatorPW' => $request->attendee_pw
                ]);
            }
            /** ====== End:: BigBlueButton create meeting ===== */

            /** ====== Start:: Gmeet create meeting ===== */
            if ($class->meeting_host_name == 'gmeet') {
                $endDate = \Carbon\Carbon::parse($class->date)->addMinutes($class->duration);
                $link = GmeetSetting::createMeeting($class->class_topic, $class->date, $endDate);
                $class->join_url = $link;
                $class->save();
            }
            /** ====== End:: Gmeet create meeting ===== */


            /** ====== send notification to student ===== */
            $students = Enrollment::where('course_id', $course->id)->select('user_id')->get();
            foreach ($students as $student) {
                $text = __("New Live Class Added");
                $target_url = route('student.my-course.show', $course->slug);
                $this->send($text, 3, $target_url, $student->user_id);
            }
            /** ====== send notification to student ===== */

            DB::commit();
            $this->showToastrMessage('success', 'Live Class Created Successfully');
            return redirect()->route('admin.program.edit', [$course->uuid, 'step=lesson']);
        } catch (Exception $e) {
            DB::rollBack();
            $this->showToastrMessage('error', 'Please check your credentials');
            return redirect()->back()->withInput();
        }
    }

    public function deleteProgramSession($uuid){
        $this->programSessionModel->deleteByUuid($uuid);
        $this->showToastrMessage('error', __('Deleted Successfully'));
        return redirect()->back()->with('success');
    }

    public function uploadFinished($uuid)
    {
        $course = Course::where('courses.uuid', $uuid)->first();
        $user_id = auth()->id();
        $user = User::find($user_id);
        if ($user->role != 1) {
            if (!$course->user_id == $user_id) {
                $courseInstructor = $course->course_instructors()->where('instructor_id', $user_id)->where('status', STATUS_ACCEPTED)->first();
                if (!$courseInstructor) {
                    $this->showToastrMessage('error', __('You don\'t have permission to edit this'));
                    return redirect()->back();
                }
            }
        }


        if ($course->status == 1) {

            if ($course->user_id != auth()->id()) {
                //TODO: notify from here to multi instructor;
                $text = __("You have selected as co-instructor");
                $target_url = route('instructor.multi_instructor');
                $courseInstructors = $course->course_instructors->where('status', STATUS_PENDING)->where('instructor_id', '!=', $course->user_id);

                foreach ($courseInstructors as $courseInstructor) {
                    $this->send($text, 2, $target_url, $courseInstructor->instructor->user_id);
                }
            }
        } else {
            if ($user->role != 1) {
                $course->status = 2;
            } else {
                $course->status = 1;
            }
        }
        $course->save();
        return redirect(route('admin.program.index'));
    }

    public function viewProgram ($uuid)
    {
        $data['title'] = "Program Details";
        $data['course'] = $this->model->getRecordByUuid($uuid);

        return view('admin.program.view', $data);
    }

    public function view($uuid)
    {
        $data['title'] = "Course Details";
        $data['course'] = $this->model->getRecordByUuid($uuid);

        return view('admin.course.view', $data);
    }

    public function approved()
    {
        if (!Auth::user()->can('approved_course')) {
            abort('403');
        } // end permission checking

        $data['title'] = 'Approved Courses';
        $data['courses'] = Course::where('status', 1)->paginate(25);
        return view('admin.course.approved', $data);
    }

    public function reviewPending()
    {
        if (!Auth::user()->can('pending_course')) {
            abort('403');
        } // end permission checking

        $data['title'] = 'Review Pending Courses';
        $data['courses'] = Course::where('status', 2)->paginate(25);
        return view('admin.course.review-pending', $data);
    }

    public function hold()
    {
        if (!Auth::user()->can('hold_course')) {
            abort('403');
        } // end permission checking

        $data['title'] = 'Hold Courses';
        $data['courses'] = Course::where('status', 3)->paginate(25);
        return view('admin.course.hold', $data);
    }

    public function statusChange($uuid, $status)
    {
        $course = $this->model->getRecordByUuid($uuid);
        $course->status = $status;
        $course->save();

        if ($status == 1) {
            setBadge($course->user_id);
            $text = __("Course has been approved");
            $target_url = route('course-details', $course->slug);
            $this->send($text, 2, $target_url, $course->user_id);

            /** ====== send notification to student ===== */
            $students = Student::where('user_id', '!=', $course->user_id)->select('user_id')->get();
            foreach ($students as $student) {
                $text = __("New course has been published");
                $target_url = route('course-details', $course->slug);
                $this->send($text, 3, $target_url, $student->user_id);
            }
            /** ====== send notification to student ===== */
        }

        if ($status == 3) {
            $text = __("Course has been hold");
            $target_url = route('instructor.course');
            $this->send($text, 2, $target_url, $course->user_id);
        }


        $this->showToastrMessage('success', __('Status has been changed'));
        return redirect()->back();

    }

    public function delete($uuid)
    {
        $course = $this->model->getRecordByUuid($uuid);
        $order_item = Order_item::whereCourseId($course->id)->first();

        if ($order_item) {
            $this->showToastrMessage('error', __('You can not deleted. Because already student purchased this course!'));
            return redirect()->back();
        }
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

                            $this->lectureModel->delete($lecture->id); // delete record
                        }
                    }
                }
                //end:: lecture delete
                $this->lessonModel->delete($lesson->id);
            }
        }
        //end: lesson delete

        $this->deleteFile($course->image);
        $this->deleteVideoFile($course->video);
        $course->delete();
        $this->showToastrMessage('success', __('Course has been deleted.'));
        return redirect()->back();
    }

    public function courseUploadRuleIndex()
    {
        $data['title'] = 'Courses Upload Rules';
        $data['courseRules'] = CourseUploadRule::all();
        return view('admin.course.upload-rules', $data);
    }

    public function courseUploadRuleStore(Request $request)
    {
        $courseUploadRuleTitle = $request->courseUploadRuleTitle;
        if ($courseUploadRuleTitle) {
            $inputs = Arr::except($request->all(), ['_token']);
            $keys = [];

            foreach ($inputs as $k => $v) {
                $keys[$k] = $k;
            }

            foreach ($inputs as $key => $value) {
                $option = Setting::firstOrCreate(['option_key' => $key]);
                $option->option_value = $value;
                $option->save();
            }
        }


        $now = now();
        if ($request['course_upload_rules']) {

            if (count(@$request['course_upload_rules']) > 0) {
                foreach ($request['course_upload_rules'] as $course_upload_rules) {
                    if (@$course_upload_rules['description']) {
                        if (@$course_upload_rules['id']) {
                            $rule = CourseUploadRule::find($course_upload_rules['id']);
                        } else {
                            $rule = new CourseUploadRule();
                        }
                        $rule->description = @$course_upload_rules['description'];
                        $rule->updated_at = $now;
                        $rule->save();
                    }
                }
            }
        }

        CourseUploadRule::where('updated_at', '!=', $now)->get()->map(function ($q) {
            $q->delete();
        });

        $this->showToastrMessage('success', __('Updated Successful'));
        return redirect()->back();
    }

    public function courseEnroll()
    {
        $data['title'] = 'Course Enroll';
        $data['users'] = User::where('role', '!=', 1)->get();
        $data['courses'] = Course::all();

        return view('admin.course.enroll-student', $data);
    }

    public function courseEnrollStore(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'course_id' => 'required',
        ]);

        if ($request->course_id) {
            $courseOrderExits = Enrollment::where(['user_id' => $request->user_id, 'course_id' => $request->course_id, 'status' => ACCESS_PERIOD_ACTIVE])->whereDate('end_date', '>=', now())->first();

            if ($courseOrderExits) {
                $order = Order::find($courseOrderExits->order_id);
                if ($order) {
                    if ($order->payment_status == 'due') {
                        Order_item::whereOrderId($courseOrderExits->order_id)->get()->map(function ($q) {
                            $q->delete();
                        });
                        $order->delete();
                    } else {
                        $this->showToastrMessage('error', __("Student has already purchased the course!"));
                        return redirect()->back();
                    }
                }
            }
        }

        $ownCourseCheck = CourseInstructor::where('course_id', $request->course_id)->where('instructor_id', $request->user_id)->delete();

        if ($ownCourseCheck) {
            $this->showToastrMessage('error', __("He is a owner of the course. Can't purchase this course!"));
            return redirect()->back();
        }
        $course = Course::find($request->course_id);
        $order = new Order();
        $order->user_id = $request->user_id;
        $order->order_number = rand(100000, 999999);
        $order->payment_status = 'free';
        $order->created_by_type = 2;
        $order->save();

        $order_item = new Order_item();
        $order_item->order_id = $order->id;
        $order_item->user_id = $request->user_id;
        $order_item->course_id = $request->course_id;
        $order_item->owner_user_id = $course->user_id ?? null;
        $order_item->unit_price = 0;
        $order_item->admin_commission = 0;
        $order_item->owner_balance = 0;
        $order_item->sell_commission = 0;
        $order_item->save();


        set_instructor_ranking_level($course->user_id);

        /** ====== Send notification =========*/
        $text = __("New student enrolled");
        $target_url = route('instructor.all-student');
        foreach ($order->items as $item) {
            if ($item->course) {
                $this->send($text, 2, $target_url, $item->course->user_id);
            }

            setEnrollment($item);
        }

        $text = __("Course has been sold");
        $this->send($text, 1, null, null);

        $text = __("New course enrolled by Admin");
        $target_url = route('student.my-learning');
        $this->send($text, 3, $target_url, $request->user_id);

        /** ====== Send notification =========*/

        $this->showToastrMessage('success', __('Student enroll in course'));
        return redirect()->back();
    }
}
