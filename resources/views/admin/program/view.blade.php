@extends('layouts.admin')

@section('content')
    <!-- Page content area start -->
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                                <h2>{{ __('Program Sessions') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a
                                            href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a></li>
                                    <li class="breadcrumb-item active"
                                        aria-current="page">{{__('Program Sessions')}}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="customers__area bg-style mb-30">
                        <div class="item-title d-flex justify-content-between">
                            <h2>{{ __('Program Sessions') }}</h2>
                        </div>

                        <!-- View Curriculum Start -->
                        <div class="admin-course-watch-page-area">
                            <div class="curriculum-content">
                                <div class="accordion" id="accordionExample">
                                    @forelse(@$course->programSessions as $key => $lesson)
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="heading{{ $key }}">
                                                <button
                                                    class="accordion-button font-medium font-18 {{ $key == 0 ? '' : 'collapsed' }}"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapse{{ $key }}"
                                                    aria-expanded="{{ $key == 0 ? 'true' : 'false' }}"
                                                    aria-controls="collapseOne">
                                                    {{ $lesson->class_topic }}
                                                </button>
                                            </h2>
                                            <div id="collapse{{ $key }}"
                                                 class="accordion-collapse collapse {{ $key == 0 ? 'show' : '' }}"
                                                 aria-labelledby="heading{{ $key }}" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div class="play-list">
                                                        @if($lesson->session_type == PROGRAM_SESSION_TYPE_LIVE)
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <th scope="col">{{ __('Topic') }}</th>
                                                                    <th scope="col">{{ __('Coach') }}</th>
                                                                    <th scope="col">{{ __('Date & Time') }}</th>
                                                                    <th scope="col">{{ __('Time Duration') }}</th>
                                                                    <th scope="col">{{ __('Session Type') }}</th>
                                                                    <th scope="col">{{ __('Meeting Host Name') }}</th>
                                                                    <th scope="col">{{ __('Action') }}</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td>{{ Str::limit($lesson->class_topic, 50) }}</td>
                                                                    <td>{{$lesson->instructor->name}}</td>
                                                                    <td>{{ $lesson->date }}</td>
                                                                    <td>{{ $lesson->duration }} minutes</td>
                                                                    <td>{{ $lesson->session_type == 1 ?  __('LIVE')  : __('ONSITE') }}</td>
                                                                    <td>
                                                                        @if($lesson->meeting_host_name == 'zoom')
                                                                            Zoom
                                                                            <button
                                                                                class="theme-btn theme-button1 green-theme-btn default-hover-btn viewMeetingLink"
                                                                                data-item="{{ $lesson }}">
                                                                                {{ __('View') }}
                                                                            </button>
                                                                        @elseif($lesson->meeting_host_name == 'bbb')
                                                                            BigBlueButton
                                                                            <button
                                                                                class="theme-btn theme-button1 green-theme-btn default-hover-btn viewBBBMeetingLink"
                                                                                data-item="{{ $lesson }}"
                                                                                data-route="{{ route('instructor.join-bbb-meeting', $lesson->id) }}">
                                                                                {{ __('View') }}
                                                                            </button>
                                                                        @elseif($lesson->meeting_host_name == 'jitsi')
                                                                            Jitsi
                                                                            <button
                                                                                class="theme-btn theme-button1 green-theme-btn default-hover-btn viewJitsiMeetingLink"
                                                                                data-item="{{ $lesson }}"
                                                                                data-route="{{ route('join-jitsi-meeting', $lesson->uuid) }}">
                                                                                {{ __('View') }}
                                                                            </button>
                                                                        @elseif($lesson->meeting_host_name == 'gmeet')
                                                                            Gmeet
                                                                            <button
                                                                                class="theme-btn theme-button1 green-theme-btn default-hover-btn viewGmeetMeetingLink"
                                                                                data-url="{{ $lesson->join_url }}">
                                                                                {{ __('View') }}
                                                                            </button>
                                                                        @endif
                                                                    </td>

                                                                    <td><a href="javascript:void(0);"
                                                                           data-url="{{ route('admin.program-session.delete', $lesson->uuid) }}"
                                                                           class="theme-btn default-delete-btn-red delete"><span class="iconify"
                                                                                                                                 data-icon="gg:trash"></span>{{ __('Delete') }}</a></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        @elseif($lesson->session_type == PROGRAM_SESSION_TYPE_ONSITE)
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <th scope="col">{{ __('Topic') }}</th>
                                                                    <th scope="col">{{ __('Coach') }}</th>
                                                                    <th scope="col">{{ __('Date & Time') }}</th>
                                                                    <th scope="col">{{ __('Time Duration') }}</th>
                                                                    <th scope="col">{{ __('Session Type') }}</th>
                                                                    <th scope="col">{{ __('Description') }}</th>
                                                                    <th scope="col">{{ __('Action') }}</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td>{{ Str::limit($lesson->class_topic, 50) }}</td>
                                                                    <td>{{$lesson->instructor->name}}</td>
                                                                    <td>{{ $lesson->date }}</td>
                                                                    <td>{{ $lesson->duration }} minutes</td>
                                                                    <td>{{ $lesson->session_type == 1 ?  __('LIVE')  : __('ONSITE') }}</td>
                                                                    <td>{{$lesson->description}}</td>

                                                                    <td><a href="javascript:void(0);"
                                                                           data-url="{{ route('admin.program-session.delete', $lesson->uuid) }}"
                                                                           class="theme-btn default-delete-btn-red delete"><span class="iconify"
                                                                                                                                 data-icon="gg:trash"></span>{{ __('Delete') }}</a></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        @else
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="row">
                                            <p>{{ __('No Data Found') }}</p>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <!-- View Curriculam Start -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content area end -->


    <!--  Text Upload Modal Start -->
    <div class="modal fade textUploadModal venoBoxTypeModal" id="textUploadModal" tabindex="-1" aria-hidden="true">
        <div class="modal-header border-bottom-0">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span class="iconify"
                                                                                                     data-icon="akar-icons:cross"></span>
            </button>
        </div>
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-body">
                    <p class="getLectureText"></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Text Upload Modal End -->

    <!-- Image Upload Modal Start -->
    <div class="modal fade textUploadModal venoBoxTypeModal" id="imageUploadModal" tabindex="-1" aria-hidden="true">
        <div class="modal-header border-bottom-0">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span class="iconify"
                                                                                                     data-icon="akar-icons:cross"></span>
            </button>
        </div>
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="" alt="" class="img-fluid getLectureImage">
                </div>
            </div>
        </div>
    </div>
    <!-- Image Upload Modal End -->

    <!-- Slide Show Upload Modal Start-->
    <div class="modal fade venoBoxTypeModal" id="slideModal" tabindex="-1" aria-hidden="true">
        <div class="modal-header border-bottom-0">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span class="iconify"
                                                                                                     data-icon="akar-icons:cross"></span>
            </button>
        </div>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <iframe class="getLectureSlide" src="" width="100%" height="400" frameborder="0"
                            scrolling="no"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- Slide Show Upload Modal End-->

    <!-- Audio Player Modal Start-->
    <div class="modal fade venoBoxTypeModal" id="audioPlayerModal" tabindex="-1" aria-hidden="true">
        <div class="modal-header border-bottom-0">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span class="iconify"
                                                                                                     data-icon="akar-icons:cross"></span>
            </button>
        </div>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <!--Audio -->
                    <audio class="getLectureAudio" src="" type="audio/mp3" style="width: 550px" controls
                           controlsList="nodownload">
                    </audio>
                </div>
            </div>
        </div>
    </div>
    <!-- Audio Player Modal End-->



    <!--View Meeting Modal Start-->
    <div class="modal fade viewMeetingLinkModal" id="viewMeetingModal" tabindex="-1" aria-labelledby="viewMeetingModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="viewMeetingModalLabel">{{ __('View Meeting') }}</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="d-none bbbMeetingDiv">
                        <div class="row mb-30">
                            <div class="col-md-12">
                                <div class="join-url-wrap position-relative">
                                    <label class="font-medium font-15 color-heading">{{ __('Meeting ID') }}</label>
                                    <input type="text" name="meeting_id" class="form-control" disabled readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-30">
                            <div class="col-md-12">
                                <div class="join-url-wrap position-relative">
                                    <label class="font-medium font-15 color-heading">{{ __('Moderator Password') }}</label>
                                    <input type="text" name="moderator_pw" class="form-control" disabled readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-30">
                            <div class="col-md-12">
                                <div class="join-url-wrap position-relative">
                                    <label class="font-medium font-15 color-heading">{{ __('Attendee Password') }}</label>
                                    <input type="" name="attendee_pw" class="form-control" disabled readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-30 d-none zoomMeetingDiv">
                        <div class="col-md-12">
                            <div class="join-url-wrap position-relative">
                                <label class="font-medium font-15 color-heading">{{ __('Start URL') }}</label>
                                <textarea name="start_url" class="start_url join-url-text form-control" id="start_url"
                                          disabled readonly rows="3">
                            </textarea>
                                <button class="copy-text-btn position-absolute copyZoomStartUrl"><span class="iconify"
                                                                                                       data-icon="akar-icons:copy"></span></button>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-30 d-none jitsiMeetingDiv">
                        <div class="col-md-12">
                            <div class="join-url-wrap position-relative">
                                <label class="font-medium font-15 color-heading">{{ __('Jitsi Meeting ID/Room') }}</label>
                                <input type="text" name="jitsi_meeting_id" class="form-control jitsi_meeting_id" disabled
                                       readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between align-items-center">
                    <a href="" target="_blank" class="theme-btn theme-button1 default-hover-btn green-theme-btn startNow">{{
                    __('Start Now') }}</a>
                </div>
            </div>
        </div>
    </div>
    <!--View Meeting Modal End-->

@endsection

@push('style')
    <link rel="stylesheet" href="{{asset('frontend/assets/fonts/feather/feather.css')}}">

    <!-- Video Player css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/video-player/plyr.css') }}">
@endpush

@push('script')
    <!--Feather Icon-->
    <script src="{{asset('frontend/assets/js/feather.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/instructor/copy-zoom-url-and-show.js') }}"></script>
    <!-- Video Player js -->
    <script src="{{ asset('frontend/assets/vendor/video-player/plyr.js') }}"></script>
    <script>
        const players = Array.from(document.querySelectorAll('.js-player')).map((p) => new Plyr(p));
    </script>
    <!-- Video Player js -->

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
    </script>

    <script type="text/javascript">
        'use strict';
        //For Scorm course body
        $(document).ready(function () {
            var width = $('#scorm_player').width();
            $('#scorm_player').attr("height", width / 2);
            window.onresize = function (event) {
                var width = $('#scorm_player').width();
                $('#scorm_player').attr("height", width / 2);
            };
        });
        //End for Scorm course body
    </script>
@endpush
