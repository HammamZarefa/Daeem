@extends('layouts.admin')

@section('breadcrumb')
    <div class="page-banner-content text-center">
        <h3 class="page-banner-heading text-white pb-15"> {{__('Upload Course')}} </h3>

        <!-- Breadcrumb Start-->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item font-14"><a href="{{route('instructor.dashboard')}}">{{__('Dashboard')}}</a>
                </li>
                <li class="breadcrumb-item font-14"><a href="{{ route('instructor.course') }}">{{__('My Courses')}}</a>
                </li>
                <li class="breadcrumb-item font-14 active" aria-current="page">{{__('Upload Course')}}</li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="instructor-profile-right-part instructor-upload-course-box-part">
        <div class="instructor-upload-course-box">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div id="msform">
                            <!-- progressbar -->
                            <ul id="progressbar"
                                class="upload-course-item-block d-flex align-items-center justify-content-center">
                                <li class="active" id="account"><strong>{{ __('Course Overview') }}</strong></li>
                                <li class="active" id="personal"><strong>{{ __('Upload Video') }}</strong></li>
                                <li id="instructor"><strong>{{ __('Instructors') }}</strong></li>
                                <li id="confirm"><strong>{{ __('Submit Process') }}</strong></li>
                            </ul>

                            <!-- Upload Course Step-1 Item Start -->
                            <div class="upload-course-step-item upload-course-overview-step-item">
                                <!-- Upload Course Step-2 Item Start -->
                                <div class="upload-course-step-item upload-course-video-step-item">

                                @if($course->course_type == COURSE_TYPE_PROGRAM)
                                        <div class="instructor-profile-right-part" id="meet">
                                            <div class="instructor-quiz-list-page instructor-live-class-list-page">

                                                <div class="instructor-my-courses-title d-flex justify-content-between align-items-center">
                                                    <h6>{{ @$course->title }}</h6>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <ul class="nav nav-tabs assignment-nav-tabs live-class-list-nav-tabs" id="myTab" role="tablist">
                                                            <li class="nav-item" role="presentation">
                                                                <button class="nav-link {{ @$navUpcomingActive }}" id="upcoming-tab" data-bs-toggle="tab"
                                                                        data-bs-target="#upcoming" type="button" role="tab" aria-controls="upcoming"
                                                                        aria-selected="true">{{ __('Upcoming') }}
                                                                </button>
                                                            </li>
                                                            {{--                                                                            @if(count($past_live_classes) > 0)--}}
                                                            <li class="nav-item" role="presentation">
                                                                <button class="nav-link {{ @$navPastActive }}" id="past-tab" data-bs-toggle="tab"
                                                                        data-bs-target="#past" type="button" role="tab" aria-controls="past"
                                                                        aria-selected="false">{{ __('Past') }}
                                                                </button>
                                                            </li>
                                                            {{--                                                                            @endif--}}
                                                        </ul>

                                                        <div class="tab-content live-class-list" id="myTabContent">
                                                            <div class="tab-pane fade {{ @$tabUpcomingActive }}" id="upcoming" role="tabpanel"
                                                                 aria-labelledby="upcoming-tab">
                                                                @if(count($upcoming_live_classes) > 0)
                                                                    <div class="table-responsive table-responsive-xl">
                                                                        <table class="table">
                                                                            <thead>
                                                                            <tr>
                                                                                <th scope="col">{{ __('Topic') }}</th>
                                                                                <th scope="col">{{ __('Date & Time') }}</th>
                                                                                <th scope="col">{{ __('Time Duration') }}</th>
                                                                                <th scope="col">{{ __('Session Type') }}</th>
                                                                                <th scope="col">{{ __('Meeting Host Name') }}</th>
                                                                                <th scope="col">{{ __('Action') }}</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            @foreach($upcoming_live_classes as $upcoming_live_class)
                                                                                <tr>
                                                                                    <td>{{ Str::limit($upcoming_live_class->class_topic, 50) }}</td>
                                                                                    <td>{{ $upcoming_live_class->date }}</td>
                                                                                    <td>{{ $upcoming_live_class->duration }} minutes</td>
                                                                                    <td>{{ $upcoming_live_class->session_type == 1 ?  __('LIVE')  : __('ONSITE') }}</td>
                                                                                    <td>
                                                                                        @if($upcoming_live_class->meeting_host_name == 'zoom')
                                                                                            Zoom
                                                                                            <button
                                                                                                class="theme-btn theme-button1 green-theme-btn default-hover-btn viewMeetingLink"
                                                                                                data-item="{{ $upcoming_live_class }}">
                                                                                                {{ __('View') }}
                                                                                            </button>
                                                                                        @elseif($upcoming_live_class->meeting_host_name == 'bbb')
                                                                                            BigBlueButton
                                                                                            <button
                                                                                                class="theme-btn theme-button1 green-theme-btn default-hover-btn viewBBBMeetingLink"
                                                                                                data-item="{{ $upcoming_live_class }}"
                                                                                                data-route="{{ route('instructor.join-bbb-meeting', $upcoming_live_class->id) }}">
                                                                                                {{ __('View') }}
                                                                                            </button>
                                                                                        @elseif($upcoming_live_class->meeting_host_name == 'jitsi')
                                                                                            Jitsi
                                                                                            <button
                                                                                                class="theme-btn theme-button1 green-theme-btn default-hover-btn viewJitsiMeetingLink"
                                                                                                data-item="{{ $upcoming_live_class }}"
                                                                                                data-route="{{ route('join-jitsi-meeting', $upcoming_live_class->uuid) }}">
                                                                                                {{ __('View') }}
                                                                                            </button>
                                                                                        @elseif($upcoming_live_class->meeting_host_name == 'gmeet')
                                                                                            Gmeet
                                                                                            <button
                                                                                                class="theme-btn theme-button1 green-theme-btn default-hover-btn viewGmeetMeetingLink"
                                                                                                data-url="{{ $upcoming_live_class->join_url }}">
                                                                                                {{ __('View') }}
                                                                                            </button>
                                                                                        @endif
                                                                                    </td>

                                                                                    <td><a href="javascript:void(0);"
                                                                                           data-url="{{ route('admin.program-session.delete', $upcoming_live_class->uuid) }}"
                                                                                           class="theme-btn default-delete-btn-red delete"><span class="iconify"
                                                                                                                                                 data-icon="gg:trash"></span>{{ __('Delete') }}</a></td>
                                                                                </tr>
                                                                            @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                            @else
                                                                <!-- If there is no data Show Empty Design Start -->
                                                                    <div class="empty-data">
                                                                        <img src="{{ asset('frontend/assets/img/empty-data-img.png') }}" alt="img"
                                                                             class="img-fluid">
                                                                        <h4 class="my-3">{{ __('Empty Live Class') }}</h4>
                                                                    </div>
                                                                    <!-- If there is no data Show Empty Design End -->
                                                            @endif
                                                            <!-- Pagination Start -->
                                                            @if(@$upcoming_live_classes->hasPages())
                                                                {{ @$upcoming_live_classes->links('frontend.paginate.paginate') }}
                                                            @endif
                                                            <!-- Pagination End -->
                                                            </div>
                                                            <div class="tab-pane fade {{ @$tabPastActive }}" id="past" role="tabpanel"
                                                                 aria-labelledby="upcoming-tab">
                                                                @if(count($past_live_classes) > 0)
                                                                    <div class="table-responsive table-responsive-xl">
                                                                        <table class="table">
                                                                            <thead>
                                                                            <tr>
                                                                                <th scope="col">{{ __('Topic') }}</th>
                                                                                <th scope="col">{{ __('Date & Time') }}</th>
                                                                                <th scope="col">{{ __('Time Duration') }}</th>
                                                                                <th scope="col">{{ __('Meeting Host Name') }}</th>
                                                                                <th scope="col">{{ __('Action') }}</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            @foreach($past_live_classes as $past_live_class)
                                                                                <tr>
                                                                                    <td>{{ Str::limit($past_live_class->class_topic, 50) }}</td>
                                                                                    <td>{{ $past_live_class->date }}</td>
                                                                                    <td>{{ $past_live_class->duration }} minutes</td>
                                                                                    <td>
                                                                                        @if($past_live_class->meeting_host_name == 'zoom')
                                                                                            Zoom
                                                                                            <button
                                                                                                class="theme-btn theme-button1 green-theme-btn default-hover-btn viewMeetingLink"
                                                                                                data-item="{{ $past_live_class }}">
                                                                                                {{ __('View') }}
                                                                                            </button>
                                                                                        @elseif($past_live_class->meeting_host_name == 'bbb')
                                                                                            BigBlueButton
                                                                                            <button
                                                                                                class="theme-btn theme-button1 green-theme-btn default-hover-btn viewBBBMeetingLink"
                                                                                                data-item="{{ $past_live_class }}"
                                                                                                data-route="{{ route('instructor.join-bbb-meeting', $past_live_class->id) }}">
                                                                                                {{ __('View') }}
                                                                                            </button>
                                                                                        @elseif($past_live_class->meeting_host_name == 'jitsi')
                                                                                            Jitsi
                                                                                            <button
                                                                                                class="theme-btn theme-button1 green-theme-btn default-hover-btn viewJitsiMeetingLink"
                                                                                                data-item="{{ $past_live_class }}"
                                                                                                data-route="{{ route('join-jitsi-meeting', $past_live_class->uuid) }}">
                                                                                                {{ __('View') }}
                                                                                            </button>
                                                                                        @elseif($past_live_class->meeting_host_name == 'gmeet')
                                                                                            Gmeet
                                                                                            <button
                                                                                                class="theme-btn theme-button1 green-theme-btn default-hover-btn viewGmeetMeetingLink"
                                                                                                data-url="{{ $past_live_class->join_url }}">
                                                                                                {{ __('View') }}
                                                                                            </button>
                                                                                        @endif
                                                                                    </td>

                                                                                    <td><a href="javascript:void(0);"
                                                                                           data-url="{{ route('admin.program-session.delete', $past_live_class->uuid) }}"
                                                                                           class="theme-btn default-delete-btn-red delete">
                                                                                            <span class="iconify" data-icon="gg:trash"></span>{{ __('Delete') }}</a>
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                            @else
                                                                <!-- If there is no data Show Empty Design Start -->
                                                                    <div class="empty-data">
                                                                        <img src="{{ asset('frontend/assets/img/empty-data-img.png') }}" alt="img"
                                                                             class="img-fluid">
                                                                        <h4 class="my-3">{{ __('Empty Past Class') }}</h4>
                                                                    </div>
                                                                    <!-- If there is no data Show Empty Design End -->
                                                            @endif
                                                            <!-- Pagination Start -->
                                                            @if(@$past_live_classes->hasPages())
                                                                {{ @$past_live_classes->links('frontend.paginate.paginate') }}
                                                            @endif
                                                            <!-- Pagination End -->
                                                            </div>
                                                        </div>

                                                        <!-- Add Live Class Button Start -->
                                                        <a href="{{ route('admin.program.edit',[$course->uuid, 'step=category']) }}"
                                                           class="theme-btn theme-button3 quiz-back-btn default-hover-btn">{{ __('Back') }}</a>
                                                        <a href="{{ route('admin.program-session.create', $course->uuid) }}"
                                                           class="add-resources-btn theme-btn theme-button1 default-hover-btn">{{ __('Add New Session') }}</a>
                                                        @if($course->status == 1)
                                                            <a href="{{route('admin.course.upload-finished', [$course->uuid])}}" type="button" class="theme-btn theme-button1">{{ __('Done') }}</a>
                                                        @else
                                                            <a href="{{route('admin.course.upload-finished', [$course->uuid])}}" type="button" class="theme-btn theme-button1">{{ __('Submit for review') }}</a>
                                                    @endif
                                                        <!-- Add Live Class Button End -->

                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                @endif
                                </div>
                                <!-- Upload Course Step-6 Item End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@push('style')
    <!-- Video Player css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/video-player/plyr.css') }}">

    <!-- Summernote CSS - CDN Link -->
    <link href="{{ asset('common/css/summernote/summernote.min.css') }}" rel="stylesheet">
    <link href="{{ asset('common/css/summernote/summernote-lite.min.css') }}" rel="stylesheet">
    <!-- //Summernote CSS - CDN Link -->

@endpush


@push('script')
    <script>
        $(function () {
            'use strict'
            $('.editLesson').on('click', function (e) {
                e.preventDefault();
                $('#lessonName').val($(this).data('name'))
                let route = $(this).data('route');
                $('#updateEditModal').attr("action", route)
            })
        })
    </script>
    <script src="{{asset('frontend/assets/js/custom/form-validation.js')}}"></script>
    <script src="{{asset('frontend/assets/js/custom/upload-lesson.js')}}"></script>
    <script src="{{asset('frontend/assets/js/custom/index.js')}}"></script>

    <!-- Video Player js -->
    <script src="{{ asset('frontend/assets/vendor/video-player/plyr.js') }}"></script>
    <script>
        "use strict"
        const zai_player = new Plyr('#player');
        const zai_player1 = new Plyr('#playerVideoYoutube');
        const zai_player2 = new Plyr('#playerVideoHTML5');
        const zai_player3 = new Plyr('#playerVideoVimeo');
    </script>
    <!-- Video Player js -->

    <script>
        const players = Array.from(document.querySelectorAll('.js-player')).map((p) => new Plyr(p));
    </script>

    <!-- Summernote JS - CDN Link -->
    <script src="{{ asset('common/js/summernote/summernote-lite.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $("#summernote").summernote({dialogsInBody: true});
            $('.dropdown-toggle').dropdown();
        });
    </script>
    <!-- //Summernote JS - CDN Link -->

    <script>
        "use strict"
        $('.lectureText').on('click', function () {
            var text = $(this).data("lecture_text")
            $('.getLectureText').html(text)
        })

        $('.lectureImage').on('click', function () {
            var image = $(this).data("lecture_image")
            $('.getLectureImage').attr('src', image)
        })

        $('.lectureSlide').on('click', function () {
            var slide = $(this).data("lecture_slide")
            $('.getLectureSlide').attr('src', slide)
        })

        $('.normalVideo').on('click', function () {
            var video = $(this).data("normal_video")
            $('.getNormalVideo').attr('src', video)
        })

        $('.lectureAudio').on('click', function () {
            var audio = $(this).data("lecture_audio")
            $('.getLectureAudio').attr('src', audio)
        })
    </script>

@endpush
