<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Assignment;
use App\Models\AssignmentSubmit;
use App\Models\BookingHistory;
use App\Models\Certificate;
use App\Models\Certificate_by_instructor;
use App\Models\Course;
use App\Models\Course_lecture;
use App\Models\Course_lecture_views;
use App\Models\Discussion;
use App\Models\Enrollment;
use App\Models\Exam;
use App\Models\LiveClass;
use App\Models\NoticeBoard;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Program_session;
use App\Models\ProgramSessionReview;
use App\Models\Question;
use App\Models\Question_option;
use App\Models\Review;
use App\Models\Student_certificate;
use App\Models\Take_exam;
use App\Traits\General;
use App\Traits\ImageSaveTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use JoisarJignesh\Bigbluebutton\Facades\Bigbluebutton;
use PDF;
use Illuminate\Support\Str;
use Peopleaps\Scorm\Model\ScormModel;

class MyCourseController extends Controller
{
    use ImageSaveTrait, General;

    public function myLearningCourseList(Request $request)
    {
        $data['pageTitle'] = 'My Learning Courses';
        $data['enrollments'] = Enrollment::where('enrollments.user_id', auth()->id())->select('enrollments.*', 'order_items.unit_price')->join('orders', 'orders.id', '=', 'enrollments.order_id')->join('order_items', 'order_items.order_id', '=', 'orders.id')->where('enrollments.status', ACCESS_PERIOD_ACTIVE)->groupBy('enrollments.id');

        if ($request->ajax()) {
            $sortByID = $request->sortByID; // 1=newest, 2=Oldest
            if ($sortByID) {
                if ($sortByID == 1) {

                    $data['enrollments'] = $data['enrollments']->latest()->paginate();
                }

                if ($sortByID == 2) {
                    $data['enrollments'] = $data['enrollments']->paginate();
                }
            }

            return view('frontend.student.course.render-courses-list', $data);
        }

        $data['enrollments'] = $data['enrollments']->latest()->paginate();

        return view('frontend.student.course.courses-list', $data);
    }

    public function myLearningProgramList(Request $request)
    {
        $data['pageTitle'] = 'My Training Program';
        $data['enrollments'] = Enrollment::where('enrollments.user_id', auth()->id())->select('enrollments.*', 'order_items.unit_price')->join('orders', 'orders.id', '=', 'enrollments.order_id')->join('order_items', 'order_items.order_id', '=', 'orders.id')->where('enrollments.status', ACCESS_PERIOD_ACTIVE)->groupBy('enrollments.id');

        if ($request->ajax()) {
            $sortByID = $request->sortByID; // 1=newest, 2=Oldest
            if ($sortByID) {
                if ($sortByID == 1) {

                    $data['enrollments'] = $data['enrollments']->latest()->paginate();
                }

                if ($sortByID == 2) {
                    $data['enrollments'] = $data['enrollments']->paginate();
                }
            }

            return view('frontend.student.program.render-courses-list', $data);
        }

        $data['enrollments'] = $data['enrollments']->latest()->paginate();

        return view('frontend.student.program.courses-list', $data);
    }

    public function organizationCourses(Request $request)
    {
        $data['pageTitle'] = 'Organizational Courses';

        $data['courses'] = Course::query()
        ->where('user_id', auth()->user()->student->organization->user_id)
        ->whereNotNull('organization_id')
        ->paginate(10);
        return view('frontend.student.course.organizational-courses-list', $data);
    }

    public function myConsultationList(Request $request)
    {
        $data['pageTitle'] = 'My Consultation Courses';

        $allUserOrder = Order::where('user_id', auth()->id());
        $paidOrderIds = $allUserOrder->where('payment_status', 'paid')->pluck('id')->toArray();

        $allUserOrder = Order::where('user_id', auth()->id());
        $freeOrderIds = $allUserOrder->where('payment_status', 'free')->pluck('id')->toArray();

        $orderIds = array_merge($paidOrderIds, $freeOrderIds);

        $data['orderItems'] = Order_item::whereIn('order_id', $orderIds);

        if ($request->ajax()) {
            $sortByID = $request->sortByID; // 1=newest, 2=Oldest
            if ($sortByID) {
                if ($sortByID == 1) {
                    $bookingOrderIds = BookingHistory::whereIn('order_id', $orderIds)->where('status', 1)->pluck('order_item_id')->toArray();
                    $data['orderItems'] =  Order_item::whereIn('id', $bookingOrderIds)->paginate();
                } elseif ($sortByID == 2) {
                    $bookingOrderIds = BookingHistory::whereIn('order_id', $orderIds)->where('status', 2)->pluck('order_item_id')->toArray();

                    $data['orderItems'] =  Order_item::whereIn('id', $bookingOrderIds)->paginate();
                } elseif ($sortByID == 3) {
                    $bookingOrderIds = BookingHistory::whereIn('order_id', $orderIds)->where('status', 3)->pluck('order_item_id')->toArray();
                    $data['orderItems'] =  Order_item::whereIn('id', $bookingOrderIds)->paginate();
                } else {
                    $bookingOrderIds = BookingHistory::whereIn('order_id', $orderIds)->where('status', 0)->pluck('order_item_id')->toArray();
                    $data['orderItems'] =  Order_item::whereIn('id', $bookingOrderIds)->paginate();
                }
            }

            return view('frontend.student.consultation.render-consultation-list', $data);
        }

        $data['orderItems'] = $data['orderItems']->latest()->paginate();

        return view('frontend.student.consultation.consultation-list', $data);
    }

    public function downloadInvoice($item_id)
    {
        $item = Order_item::find($item_id);

        $invoice_name = 'invoice' . '.pdf';
        // make sure email invoice is checked.
//        $customPaper = array(0, 0, 612, 792);
//        $pdf = PDF::loadView('frontend.student.course.invoice', ['item' => $item])->setPaper($customPaper, 'portrait');
        //$pdf->save(public_path() . '/uploads/receipt/' . $invoice_name);
        // return $pdf->stream($invoice_name);
            return view('frontend.student.course.invoice', ['item' => $item]);

//        return $pdf->download($invoice_name);
    }

    public function myCourseCompleteDuration(Request $request, $course_id)
    {
        $enrollment = Enrollment::where('course_id', $course_id)->where('user_id', auth()->id())->whereDate('end_date', '>=', now())->first();
        $scorm = ScormModel::where('course_id', $course_id)->select('duration_in_second')->first();
        if ($enrollment && $enrollment->completed_time < $scorm->duration_in_second) {
            $enrollment->completed_time += $request->duration;
            $enrollment->completed_time = ($enrollment->completed_time > $scorm->duration_in_second) ? $scorm->duration_in_second : $enrollment->completed_time;
            $enrollment->save();

            /** === make pdf certificate ===== */
            $this->makePdfCertificate($course_id, $enrollment->id);
            /** ------- end save certificate ----------- */
        }
    }

    public function myCourseShow(Request $request, $slug, $action_type = null, $quiz_uuid = null, $answer_id = null)
    {
        $data['pageTitle'] = "Course Details";
        $data['course'] = Course::whereSlug($slug)->firstOrfail();
        $data['course_lecture_views'] = Course_lecture_views::where('course_id', $data['course']->id)->where('user_id', auth()->id())->get();
        $data['enrollment'] = Enrollment::where(['course_id' => $data['course']->id, 'user_id' => auth()->id(), 'status' => ACCESS_PERIOD_ACTIVE])->whereDate('end_date', '>=', now())->first();

        // End:: Checking enrolled or not

        $data['total_enrolled_students'] = Enrollment::where('course_id', $data['course']->id)->count();
        $data['enrolled_students'] = Enrollment::where('course_id', $data['course']->id)->take(4)->get();

        //Start:: Assignment
        $data['assignments'] = Assignment::where('course_id', $data['course']->id)->get();
        //End:: Assignment
        //Start:: Notice
        $data['notices'] = NoticeBoard::whereCourseId($data['course']->id)->latest()->get();
        //End:: Notice

        //Start:: Live Class
        $now = now();

        $data['upcoming_live_classes'] = LiveClass::whereCourseId($data['course']->id)
            ->where('date', '>=', $now)
            ->latest()->get();

        $data['past_live_classes'] = LiveClass::whereCourseId($data['course']->id)
            ->where('date', '<=', $now)
            ->latest()->get();
        //End:: Live Class

        //Start:: Review
        $data['reviews'] = Review::whereCourseId($data['course']->id)->latest()->paginate(3);
        $data['loadMoreShowButtonReviews'] = Review::whereCourseId($data['course']->id)->paginate(4);
        $data['five_star_count'] = Review::whereCourseId($data['course']->id)->whereRating(5)->count();
        $data['four_star_count'] = Review::whereCourseId($data['course']->id)->whereRating(4)->count();
        $data['three_star_count'] = Review::whereCourseId($data['course']->id)->whereRating(3)->count();
        $data['two_star_count'] = Review::whereCourseId($data['course']->id)->whereRating(2)->count();
        $data['first_star_count'] = Review::whereCourseId($data['course']->id)->whereRating(1)->count();

        $data['total_reviews'] = (5 * $data['five_star_count']) + (4 * $data['four_star_count']) + (3 * $data['three_star_count']) +
            (2 * $data['two_star_count']) + (1 * $data['first_star_count']);
        $data['total_user_review'] = $data['five_star_count'] + $data['four_star_count'] + $data['three_star_count'] + $data['two_star_count'] + $data['first_star_count'];
        if ($data['total_user_review'] > 0) {
            $data['average_rating'] = $data['total_reviews'] / $data['total_user_review'];
        } else {
            $data['average_rating'] = 0;
        }

        $total_reviews = Review::whereCourseId($data['course']->id)->count();

        if ($total_reviews > 0) {
            $data['five_star_percentage'] = ($data['five_star_count'] / $total_reviews) * 100;

            $data['four_star_percentage'] = 100 * ($data['four_star_count'] / $total_reviews);
            $data['three_star_percentage'] = 100 * ($data['three_star_count'] / $total_reviews);
            $data['two_star_percentage'] = 100 * ($data['two_star_count'] / $total_reviews);
            $data['first_star_percentage'] = 100 * ($data['first_star_count'] / $total_reviews);
        } else {
            $data['five_star_percentage'] = 0;
            $data['four_star_percentage'] = 0;
            $data['three_star_percentage'] = 0;
            $data['two_star_percentage'] = 0;
            $data['first_star_percentage'] = 0;
        }

        //End:: Review
        $data['discussions'] = Discussion::whereCourseId($data['course']->id)->whereNull('parent_id')->active()->get();

        if (!is_null($action_type) && !is_null($quiz_uuid)) {
            $data['exam'] = Exam::whereUuid($quiz_uuid)->first();

            if ($action_type == 'start-quiz') {

                if (Take_exam::whereUserId(auth()->user()->id)->whereExamId($data['exam']->id)->count() == 0) {
                    $take_exam = new Take_exam();
                    $take_exam->exam_id = $data['exam']->id;
                    $take_exam->save();
                }

                $data['take_exam'] = Take_exam::whereUserId(auth()->user()->id)->whereExamId($data['exam']->id)->orderBy('id', 'DESC')->first();

                $question_ids = Answer::whereUserId(auth()->user()->id)->whereExamId($data['exam']->id)->pluck('question_id')->toArray();
                $data['question'] = Question::whereExamId($data['exam']->id)->whereNotIn('id', $question_ids)->first();
                $data['number_of_answer'] = Answer::whereUserId(auth()->user()->id)->whereExamId($data['exam']->id)->count();


                $now = Carbon::now();
                $expend_second = $now->diffInSeconds($data['take_exam']->created_at);

                if (Carbon::parse($data['exam']->duration * 60)->subSecond($expend_second)->format('H:i:s') > Carbon::parse($data['exam']->duration * 60)->format('H:i:s')) {
                    return redirect(route('student.my-course.show', [$data['course']->slug, 'quiz-result', $data['exam']->uuid]));
                }
            }


            if ($action_type == 'leaderboard') {
                $data['top5_take_exams'] = Take_exam::whereExamId($data['exam']->id)->orderBy('number_of_correct_answer', 'DESC')->take(5)->get();
                $data['take_exams'] = Take_exam::whereExamId($data['exam']->id)->orderBy('number_of_correct_answer', 'DESC')->skip(5)->take(500)->get();
            }
        }

        if (!is_null($answer_id)) {
            $data['answer'] = Answer::find($answer_id);
        }

        $data['action_type'] = $action_type;
        $data['quiz_uuid'] = $quiz_uuid;
        $data['answer_id'] = $answer_id;

        /** ------- save certificate ----------- */

        if ($request->get('lecture_uuid')) {
            $lecture = Course_lecture::where('uuid', $request->get('lecture_uuid'))->firstOrFail();
            $isFirst = count($data['course_lecture_views']) ? false : true;
            if(!checkStudentCourseIsLock( $data['course_lecture_views'], $data['course'], $lecture, $data['enrollment'], $isFirst)){
                $nextLecture = $this->getNextId($data['course_lecture_views'], $data['course'],  $lecture, $data['enrollment']);
                if ($nextLecture) {
                    $data['nextLectureUuid'] = $nextLecture->uuid;
                } else {
                    $data['nextLectureUuid'] = null;
                }

                if ($lecture->type == 'video') {
                    $data['video_src'] = $lecture->file_path;
                } elseif ($lecture->type == 'youtube') {
                    $data['youtube_video_src'] = $lecture->url_path;
                } elseif ($lecture->type == 'vimeo') {
                    $data['vimeo_video_src'] = $lecture->url_path;
                } elseif ($lecture->type == 'text') {
                    $lecture = Course_lecture::find($lecture->id);
                    if ($lecture) {
                        if (Course_lecture_views::where('user_id', auth()->id())->where('course_id', $lecture->course_id)->where('course_lecture_id', $lecture->id)->count() == 0) {
                            $course_lecture_views = new Course_lecture_views();
                            $course_lecture_views->course_id = $lecture->course_id;
                            $course_lecture_views->course_lecture_id = $lecture->id;
                            $course_lecture_views->save();
                        }
                    }

                    $data['text_src'] = $lecture->text;
                    $this->makePdfCertificate($lecture->course_id, $data['enrollment']->id);
                } elseif ($lecture->type == 'image') {
                    $lecture = Course_lecture::find($lecture->id);
                    if ($lecture) {
                        if (Course_lecture_views::where('user_id', auth()->id())->where('course_id', $lecture->course_id)->where('course_lecture_id', $lecture->id)->count() == 0) {
                            $course_lecture_views = new Course_lecture_views();
                            $course_lecture_views->course_id = $lecture->course_id;
                            $course_lecture_views->course_lecture_id = $lecture->id;
                            $course_lecture_views->save();
                        }
                    }

                    $data['image_src'] = $lecture->image;
                    $this->makePdfCertificate($lecture->course_id, $data['enrollment']->id);
                } elseif ($lecture->type == 'pdf') {
                    $lecture = Course_lecture::find($lecture->id);
                    if ($lecture) {
                        if (Course_lecture_views::where('user_id', auth()->id())->where('course_id', $lecture->course_id)->where('course_lecture_id', $lecture->id)->count() == 0) {
                            $course_lecture_views = new Course_lecture_views();
                            $course_lecture_views->course_id = $lecture->course_id;
                            $course_lecture_views->course_lecture_id = $lecture->id;
                            $course_lecture_views->save();
                        }
                    }

                    $data['pdf_src'] = $lecture->pdf;
                    $this->makePdfCertificate($lecture->course_id, $data['enrollment']->id);
                    // return redirect(getImageFile($pdf_src));
                } elseif ($lecture->type == 'slide_document') {
                    $lecture = Course_lecture::find($lecture->id);
                    if ($lecture) {
                        if (Course_lecture_views::where('user_id', auth()->id())->where('course_id', $lecture->course_id)->where('course_lecture_id', $lecture->id)->count() == 0) {
                            $course_lecture_views = new Course_lecture_views();
                            $course_lecture_views->course_id = $lecture->course_id;
                            $course_lecture_views->course_lecture_id = $lecture->id;
                            $course_lecture_views->save();
                        }
                    }

                    $data['slide_document_src'] = $lecture->slide_document;
                    $this->makePdfCertificate($lecture->course_id, $data['enrollment']->id);
                } elseif ($lecture->type == 'audio') {
                    $data['audio_src'] = $lecture->audio;
                }

                $data['lecture_type'] = $lecture->type;
                $data['lesson_id_check'] = @$lecture->lesson->id;
                $data['lecture_id_check'] = $lecture->id;
                $data['navLessonActive'] = 'on';
                $data['subNavLectureActiveClass'] = 'show';
            }
        }

        return view('frontend.student.course.course-details', $data);
    }

    public function myProgramShow(Request $request, $slug, $action_type = null, $quiz_uuid = null, $answer_id = null)
    {
        $data['pageTitle'] = "Program Details";
        $data['course'] = Course::whereSlug($slug)->firstOrfail();
        $data['enrollment'] = Enrollment::where(['course_id' => $data['course']->id, 'user_id' => auth()->id(), 'status' => ACCESS_PERIOD_ACTIVE])->whereDate('end_date', '>=', now())->first();

        // End:: Checking enrolled or not

        $data['total_enrolled_students'] = Enrollment::where('course_id', $data['course']->id)->count();
        $data['enrolled_students'] = Enrollment::where('course_id', $data['course']->id)->take(4)->get();

        //Start:: Assignment
        $data['assignments'] = Assignment::where('course_id', $data['course']->id)->get();
        //End:: Assignment
        //Start:: Notice
        $data['notices'] = NoticeBoard::whereCourseId($data['course']->id)->latest()->get();
        //End:: Notice

        //Start:: Live Class
        $now = now();

        $data['upcoming_live_classes'] = Program_session::whereCourseId($data['course']->id)
            ->where('date', '>=', $now)
            ->latest()->get();

        $data['past_live_classes'] = Program_session::whereCourseId($data['course']->id)
            ->where('date', '<=', $now)
            ->latest()->get();
        //End:: Live Class

        //Start:: Review
        $data['reviews'] = Review::whereCourseId($data['course']->id)->latest()->paginate(3);
        $data['loadMoreShowButtonReviews'] = Review::whereCourseId($data['course']->id)->paginate(4);
        $data['five_star_count'] = Review::whereCourseId($data['course']->id)->whereRating(5)->count();
        $data['four_star_count'] = Review::whereCourseId($data['course']->id)->whereRating(4)->count();
        $data['three_star_count'] = Review::whereCourseId($data['course']->id)->whereRating(3)->count();
        $data['two_star_count'] = Review::whereCourseId($data['course']->id)->whereRating(2)->count();
        $data['first_star_count'] = Review::whereCourseId($data['course']->id)->whereRating(1)->count();

        $data['total_reviews'] = (5 * $data['five_star_count']) + (4 * $data['four_star_count']) + (3 * $data['three_star_count']) +
            (2 * $data['two_star_count']) + (1 * $data['first_star_count']);
        $data['total_user_review'] = $data['five_star_count'] + $data['four_star_count'] + $data['three_star_count'] + $data['two_star_count'] + $data['first_star_count'];
        if ($data['total_user_review'] > 0) {
            $data['average_rating'] = $data['total_reviews'] / $data['total_user_review'];
        } else {
            $data['average_rating'] = 0;
        }

        $total_reviews = Review::whereCourseId($data['course']->id)->count();

        if ($total_reviews > 0) {
            $data['five_star_percentage'] = ($data['five_star_count'] / $total_reviews) * 100;

            $data['four_star_percentage'] = 100 * ($data['four_star_count'] / $total_reviews);
            $data['three_star_percentage'] = 100 * ($data['three_star_count'] / $total_reviews);
            $data['two_star_percentage'] = 100 * ($data['two_star_count'] / $total_reviews);
            $data['first_star_percentage'] = 100 * ($data['first_star_count'] / $total_reviews);
        } else {
            $data['five_star_percentage'] = 0;
            $data['four_star_percentage'] = 0;
            $data['three_star_percentage'] = 0;
            $data['two_star_percentage'] = 0;
            $data['first_star_percentage'] = 0;
        }

        //End:: Review
        $data['discussions'] = Discussion::whereCourseId($data['course']->id)->whereNull('parent_id')->active()->get();

        if (!is_null($action_type) && !is_null($quiz_uuid)) {
            $data['exam'] = Exam::whereUuid($quiz_uuid)->first();

            if ($action_type == 'start-quiz') {

                if (Take_exam::whereUserId(auth()->user()->id)->whereExamId($data['exam']->id)->count() == 0) {
                    $take_exam = new Take_exam();
                    $take_exam->exam_id = $data['exam']->id;
                    $take_exam->save();
                }

                $data['take_exam'] = Take_exam::whereUserId(auth()->user()->id)->whereExamId($data['exam']->id)->orderBy('id', 'DESC')->first();

                $question_ids = Answer::whereUserId(auth()->user()->id)->whereExamId($data['exam']->id)->pluck('question_id')->toArray();
                $data['question'] = Question::whereExamId($data['exam']->id)->whereNotIn('id', $question_ids)->first();
                $data['number_of_answer'] = Answer::whereUserId(auth()->user()->id)->whereExamId($data['exam']->id)->count();


                $now = Carbon::now();
                $expend_second = $now->diffInSeconds($data['take_exam']->created_at);

                if (Carbon::parse($data['exam']->duration * 60)->subSecond($expend_second)->format('H:i:s') > Carbon::parse($data['exam']->duration * 60)->format('H:i:s')) {
                    return redirect(route('student.my-course.show', [$data['course']->slug, 'quiz-result', $data['exam']->uuid]));
                }
            }


            if ($action_type == 'leaderboard') {
                $data['top5_take_exams'] = Take_exam::whereExamId($data['exam']->id)->orderBy('number_of_correct_answer', 'DESC')->take(5)->get();
                $data['take_exams'] = Take_exam::whereExamId($data['exam']->id)->orderBy('number_of_correct_answer', 'DESC')->skip(5)->take(500)->get();
            }
        }

        if (!is_null($answer_id)) {
            $data['answer'] = Answer::find($answer_id);
        }

        $data['action_type'] = $action_type;
        $data['quiz_uuid'] = $quiz_uuid;
        $data['answer_id'] = $answer_id;

        /** ------- save certificate ----------- */

//        if ($request->get('lecture_uuid')) {
//            $lecture = Course_lecture::where('uuid', $request->get('lecture_uuid'))->firstOrFail();
//            $isFirst = count($data['course_lecture_views']) ? false : true;
//            if(!checkStudentCourseIsLock( $data['course_lecture_views'], $data['course'], $lecture, $data['enrollment'], $isFirst)){
//                $nextLecture = $this->getNextId($data['course_lecture_views'], $data['course'],  $lecture, $data['enrollment']);
//                if ($nextLecture) {
//                    $data['nextLectureUuid'] = $nextLecture->uuid;
//                } else {
//                    $data['nextLectureUuid'] = null;
//                }
//
//                if ($lecture->type == 'video') {
//                    $data['video_src'] = $lecture->file_path;
//                } elseif ($lecture->type == 'youtube') {
//                    $data['youtube_video_src'] = $lecture->url_path;
//                } elseif ($lecture->type == 'vimeo') {
//                    $data['vimeo_video_src'] = $lecture->url_path;
//                } elseif ($lecture->type == 'text') {
//                    $lecture = Course_lecture::find($lecture->id);
//                    if ($lecture) {
//                        if (Course_lecture_views::where('user_id', auth()->id())->where('course_id', $lecture->course_id)->where('course_lecture_id', $lecture->id)->count() == 0) {
//                            $course_lecture_views = new Course_lecture_views();
//                            $course_lecture_views->course_id = $lecture->course_id;
//                            $course_lecture_views->course_lecture_id = $lecture->id;
//                            $course_lecture_views->save();
//                        }
//                    }
//
//                    $data['text_src'] = $lecture->text;
//                    $this->makePdfCertificate($lecture->course_id, $data['enrollment']->id);
//                } elseif ($lecture->type == 'image') {
//                    $lecture = Course_lecture::find($lecture->id);
//                    if ($lecture) {
//                        if (Course_lecture_views::where('user_id', auth()->id())->where('course_id', $lecture->course_id)->where('course_lecture_id', $lecture->id)->count() == 0) {
//                            $course_lecture_views = new Course_lecture_views();
//                            $course_lecture_views->course_id = $lecture->course_id;
//                            $course_lecture_views->course_lecture_id = $lecture->id;
//                            $course_lecture_views->save();
//                        }
//                    }
//
//                    $data['image_src'] = $lecture->image;
//                    $this->makePdfCertificate($lecture->course_id, $data['enrollment']->id);
//                } elseif ($lecture->type == 'pdf') {
//                    $lecture = Course_lecture::find($lecture->id);
//                    if ($lecture) {
//                        if (Course_lecture_views::where('user_id', auth()->id())->where('course_id', $lecture->course_id)->where('course_lecture_id', $lecture->id)->count() == 0) {
//                            $course_lecture_views = new Course_lecture_views();
//                            $course_lecture_views->course_id = $lecture->course_id;
//                            $course_lecture_views->course_lecture_id = $lecture->id;
//                            $course_lecture_views->save();
//                        }
//                    }
//
//                    $data['pdf_src'] = $lecture->pdf;
//                    $this->makePdfCertificate($lecture->course_id, $data['enrollment']->id);
//                    // return redirect(getImageFile($pdf_src));
//                } elseif ($lecture->type == 'slide_document') {
//                    $lecture = Course_lecture::find($lecture->id);
//                    if ($lecture) {
//                        if (Course_lecture_views::where('user_id', auth()->id())->where('course_id', $lecture->course_id)->where('course_lecture_id', $lecture->id)->count() == 0) {
//                            $course_lecture_views = new Course_lecture_views();
//                            $course_lecture_views->course_id = $lecture->course_id;
//                            $course_lecture_views->course_lecture_id = $lecture->id;
//                            $course_lecture_views->save();
//                        }
//                    }
//
//                    $data['slide_document_src'] = $lecture->slide_document;
//                    $this->makePdfCertificate($lecture->course_id, $data['enrollment']->id);
//                } elseif ($lecture->type == 'audio') {
//                    $data['audio_src'] = $lecture->audio;
//                }
//
//                $data['lecture_type'] = $lecture->type;
//                $data['lesson_id_check'] = @$lecture->lesson->id;
//                $data['lecture_id_check'] = $lecture->id;
//                $data['navLessonActive'] = 'on';
//                $data['subNavLectureActiveClass'] = 'show';
//            }
//        }
        return view('frontend.student.program.program-details', $data);
    }

    public function getNextId($course_lecture_views, $course, $old_lecture, $enrollment)
    {
        $lecture = Course_lecture::where('lesson_id', $old_lecture->lesson_id)->where('id', '>', $old_lecture->id)->select('uuid', 'id', 'pre_ids', 'lesson_id')->first();
        $return = NULL;
        if ($lecture) {
            $return = $lecture;
        }

        return $return;
    }

    public function assignmentList(Request $request)
    {
        $data['assignments'] = Assignment::where('course_id', $request->course_id)->get();
        return view('frontend.student.course.partial.assignment.partial-assignment-list', $data);
    }

    public function assignmentDetails(Request $request)
    {
        $data['assignment'] = Assignment::whereCourseId($request->course_id)->whereId($request->assignment_id)->first();
        $data['assignmentSubmit'] = AssignmentSubmit::whereUserId(auth()->id())->whereCourseId($request->course_id)->whereAssignmentId($request->assignment_id)->first();
        return view('frontend.student.course.partial.assignment.partial-assignment-details', $data);
    }

    public function assignmentResult(Request $request)
    {
        $data['assignment'] = Assignment::whereCourseId($request->course_id)->whereId($request->assignment_id)->first();
        $data['assignmentSubmit'] = AssignmentSubmit::whereUserId(auth()->id())->whereCourseId($request->course_id)->whereAssignmentId($request->assignment_id)->first();
        return view('frontend.student.course.partial.assignment.partial-assignment-result', $data);
    }

    public function assignmentSubmit(Request $request)
    {
        $data['course_id'] = $request->course_id;
        $data['assignment'] = Assignment::whereCourseId($request->course_id)->whereId($request->assignment_id)->first();
        $data['assignmentSubmit'] = AssignmentSubmit::whereUserId(auth()->id())->whereCourseId($request->course_id)->whereAssignmentId($request->assignment_id)->first();

        return view('frontend.student.course.partial.assignment.partial-assignment-submit', $data);
    }

    public function assignmentSubmitStore(Request $request, $course_id, $assignment_id)
    {
        $validation = Validator::make($request->all(), [
            "file" => "mimes:pdf,zip"
        ]);

        if ($validation->fails()) {
            return response()->json([
                'messages' => $validation->errors()->all(),
            ]);
        }


        if ($request->hasFile('file')) {
            $assignmentSubmit = AssignmentSubmit::whereUserId(auth()->id())->whereCourseId($course_id)->whereAssignmentId($assignment_id)->first();

            if (!$assignmentSubmit) {
                $assignmentSubmit = new AssignmentSubmit();
            } else {
                $this->deleteFile($assignmentSubmit->file);
            }

            $assignmentSubmit->course_id = $course_id;
            $assignmentSubmit->assignment_id = $assignment_id;

            $file_details = $this->uploadFileWithDetails('assignment_submit', $request->file);
            if (!$file_details['is_uploaded']) {
                return response()->json([
                    'message' => 'Something went wrong! Failed to upload file',
                    'status' => '404'
                ]);
            }
            $assignmentSubmit->file = $file_details['path'];
            $assignmentSubmit->original_filename = $file_details['original_filename'];
            $assignmentSubmit->save();
        }


        $data['assignment'] = Assignment::whereCourseId($course_id)->whereId($assignment_id)->first();
        $data['assignmentSubmit'] = AssignmentSubmit::whereUserId(auth()->id())->whereCourseId($course_id)->whereAssignmentId($assignment_id)->first();

        return view('frontend.student.course.partial.assignment.partial-assignment-details', $data);
    }

    public function saveExamAnswer(Request $request, $course_uuid, $question_uuid, $take_exam_id)
    {
        $course = Course::whereUuid($course_uuid)->firstOrfail();
        $question = Question::whereUuid($question_uuid)->firstOrfail();
        $option = Question_option::whereUuid($request->selected_option_uuid)->firstOrfail();

        $answer = new Answer();
        $answer->exam_id = $question->exam_id;
        $answer->question_id = $question->id;
        $answer->question_option_id = $option->id;
        $answer->take_exam_id = $take_exam_id;
        $answer->is_correct = $option->is_correct_answer;
        $answer->save();

        if ($option->is_correct_answer == 'yes') {
            $take_exam = Take_exam::find($take_exam_id);
            $take_exam->number_of_correct_answer = $take_exam->number_of_correct_answer + 1;
            $take_exam->save();
        }

        $question_ids = Answer::whereUserId(auth()->user()->id)->whereExamId($question->exam_id)->pluck('question_id')->toArray();

        if (Question::whereExamId($question->exam_id)->whereNotIn('id', $question_ids)->count() > 0) {
            return redirect(route('student.my-course.show', [$course->slug, 'start-quiz', $question->exam->uuid, $answer->id]));
        } else {
            return redirect(route('student.my-course.show', [$course->slug, 'quiz-result', $question->exam->uuid]));
        }
    }

    public function reviewCreate(Request $request)
    {
        $review_exists_user = Review::whereUserId(auth()->id())->whereCourseId($request->course_id)->first();
        if ($review_exists_user) {
            return response()->json([
                'status' => 302,
                'msg' => 'Already you have reviewed. Thank you.'
            ]);
        }

        $request->validate([
            'course_id' => 'required',
            'rating' => 'required',
            'comment' => 'required',
        ]);

        $review = new Review();
        $review->user_id = Auth::user()->id;
        $review->course_id = $request->course_id;
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->save();

        // Review Calculation and Update

        $data['five_star_count'] = Review::whereCourseId($request->course_id)->whereRating(5)->count();
        $data['four_star_count'] = Review::whereCourseId($request->course_id)->whereRating(4)->count();
        $data['three_star_count'] = Review::whereCourseId($request->course_id)->whereRating(3)->count();
        $data['two_star_count'] = Review::whereCourseId($request->course_id)->whereRating(2)->count();
        $data['first_star_count'] = Review::whereCourseId($request->course_id)->whereRating(1)->count();

        $data['total_reviews'] = (5 * $data['five_star_count']) + (4 * $data['four_star_count']) + (3 * $data['three_star_count']) +
            (2 * $data['two_star_count']) + (1 * $data['first_star_count']);
        $data['total_user_review'] = $data['five_star_count'] + $data['four_star_count'] + $data['three_star_count'] + $data['two_star_count'] + $data['first_star_count'];

        if ($data['total_user_review'] > 0) {
            $average_rating = $data['total_reviews'] / $data['total_user_review'];
        } else {
            $average_rating = 0;
        }

        $course = Course::findOrFail($request->course_id);
        $course->average_rating = number_format($average_rating, 1);
        $course->save();

        // End:: Review Calculation and Update

        return response()->json([
            'status' => 200,
            'msg' => 'Review Created Successful.'
        ]);
    }

    public function sessionReviewCreate(Request $request)
    {
//        dd($request);
        $review_exists_user = ProgramSessionReview::whereUserId(auth()->id())->whereProgramSessionId($request->program_session_id)->first();

        if ($review_exists_user) {
            return response()->json([
                'status' => 302,
                'msg' => 'Already you have reviewed. Thank you.'
            ]);
        }

        $request->validate([
            'program_session_id' => 'required',
            'rating' => 'required',
            'comment' => 'required',
        ]);

        $review = new ProgramSessionReview();
        $review->user_id = Auth::user()->id;
        $review->program_session_id = $request->program_session_id;
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->save();

        // Review Calculation and Update

        $data['session_five_star_count'] = ProgramSessionReview::whereProgramSessionId($request->program_session_id)->whereRating(5)->count();
        $data['session_four_star_count'] = ProgramSessionReview::whereProgramSessionId($request->program_session_id)->whereRating(4)->count();
        $data['session_three_star_count'] = ProgramSessionReview::whereProgramSessionId($request->program_session_id)->whereRating(3)->count();
        $data['session_two_star_count'] = ProgramSessionReview::whereProgramSessionId($request->program_session_id)->whereRating(2)->count();
        $data['session_first_star_count'] = ProgramSessionReview::whereProgramSessionId($request->program_session_id)->whereRating(1)->count();

        $data['total_session_reviews'] = (5 * $data['session_five_star_count']) + (4 * $data['session_four_star_count']) + (3 * $data['session_three_star_count']) +
            (2 * $data['session_two_star_count']) + (1 * $data['session_first_star_count']);
        $data['total_session_user_review'] = $data['session_five_star_count'] + $data['session_four_star_count'] + $data['session_three_star_count'] + $data['session_two_star_count'] + $data['session_first_star_count'];

        if ($data['total_session_user_review'] > 0) {
            $average_session_rating = $data['total_session_reviews'] / $data['total_session_user_review'];
        } else {
            $average_session_rating = 0;
        }

        $programSession = Program_session::findOrFail($request->program_session_id);
        $programSession->average_rating = number_format($average_session_rating, 1);
        $programSession->save();

        // End:: Review Calculation and Update

        return response()->json([
            'status' => 200,
            'msg' => 'Review Created Successful.'
        ]);
    }

    public function reviewPaginate(Request $request, $courseId)
    {
        $data['reviews'] = Review::whereCourseId($courseId)->latest()->paginate(3);
        $response['appendReviews'] = View::make('frontend.student.course.partial.render-partial-review-list', $data)->render();
        $response['reviews'] = Review::whereCourseId($courseId)->latest()->paginate(3);
        return response()->json($response);
    }

    public function discussionCreate(Request $request)
    {
        $discussion = new Discussion();
        $discussion->user_id = Auth::id();
        $discussion->course_id = $request->course_id;
        $discussion->comment = $request->discussionComment;
        $discussion->status = 1;
        $discussion->comment_as = $request->comment_as;
        $discussion->save();

        return redirect()->back();
    }

    public function discussionReply(Request $request, $id)
    {
        $discussion = new Discussion();
        $discussion->user_id = Auth::id();
        $discussion->course_id = $request->course_id;
        $discussion->comment = $request->commentReply;
        $discussion->status = 1;
        $discussion->parent_id = $id;
        $discussion->comment_as = $request->comment_as;
        $discussion->save();

        Discussion::where('id', $id)
            ->update([
                'view' => 2
            ]);
        Discussion::where('parent_id', $id)->update([
            'view' => 2
        ]);

        return redirect()->back();
    }

    public function makePdfCertificate($course_id, $enrollment_id)
    {
        /** === make pdf certificate ===== */
        $course = Course::find($course_id);
        if (studentCourseProgress($course->id, $enrollment_id) == 100) {
            if (Certificate_by_instructor::where('course_id', $course->id)->count() > 0 && Student_certificate::where('course_id', $course->id)->count() == 0) {
                $certificate_by_instructor = Certificate_by_instructor::where('course_id', $course->id)->orderBy('id', 'DESC')->first();
                $certificate = Certificate::find($certificate_by_instructor->certificate_id);
                if ($certificate) {
                    $certificate_number = mt_rand(1000000000, 9999999999);
                    $certificate_name = 'certificate-' . $course->uuid . '.pdf';
                    // make sure email invoice is checked.
                    $customPaper = array(0, 0, 499.55, 353.05);
                    $certificate->certificate_number = $certificate_number;
                    $html = view('frontend.student.course.certificate.pdf', ['certificate' => $certificate, 'certificate_by_instructor' => $certificate_by_instructor, 'course_title' => $course->title]);
                    // exit($html);
                    $pdf = PDF::loadHtml($html);
                    $pdf->setOptions(['dpi' => 150, 'isRemoteEnabled' => true])->setPaper($customPaper);

                    // return $pdf->stream($certificate_name);
                    $pdf->save(public_path() . '/uploads/certificate/student/' . $certificate_name);
                    /** === make pdf certificate ===== */
                    $student_certificate = new Student_certificate();
                    $student_certificate->course_id = $course->id;
                    $student_certificate->certificate_number = $certificate_number;
                    $student_certificate->path = "/uploads/certificate/student/$certificate_name";
                    $student_certificate->save();
                }
            }
        }
        /** ------- end save certificate ----------- */
    }

    public function videoCompleted(Request $request)
    {
        $lecture = Course_lecture::find($request->lecture_id);

        if (Course_lecture_views::where('user_id', auth()->id())->where('course_id', $lecture->course_id)->where('course_lecture_id', $lecture->id)->count() == 0) {
            $course_lecture_views = new Course_lecture_views();
            $course_lecture_views->course_id = $lecture->course_id;
            $course_lecture_views->course_lecture_id = $lecture->id;
            $course_lecture_views->enrollment_id = $request->enrollment_id;
            $course_lecture_views->save();
        }

        /** === make pdf certificate ===== */
        $this->makePdfCertificate($lecture->course_id, $request->enrollment_id);
        /** ------- end save certificate ----------- */

        return response()->json([
            'success' => 'success'
        ]);
    }

    public function thankYou()
    {
        $data['pageTitle'] = 'New Enrolled';
        $new_order = Order::whereUserId(auth()->id())->latest()->first();

        if ($new_order) {
            $data['orderCourses'] = Order_item::whereOrderId($new_order->id)->whereNotNull('course_id')->get();
            $data['new_consultations'] = Order_item::whereOrderId($new_order->id)->whereNotNull('consultation_slot_id')->get();
        }

        return view('frontend.thankyou', $data);
    }


    public function bigBlueButtonJoinMeeting($liveClassId)
    {
        $liveClass = LiveClass::find($liveClassId);
        if ($liveClass) {
            return redirect()->to(
                Bigbluebutton::join([
                    'meetingID' => $liveClass->meeting_id,
                    'userName' => auth()->user()->student()->name ?? auth()->user()->name,
                    'password' => $liveClass->attendee_pw //which user role want to join set password here
                ])
            );
        } else {
            $this->showToastrMessage('error', __('Live Class is not found'));
            return redirect()->back();
        }
    }
}
