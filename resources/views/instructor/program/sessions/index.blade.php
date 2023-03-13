@extends('layouts.instructor')

@section('breadcrumb')
    <div class="page-banner-content text-center">
        <h3 class="page-banner-heading text-white pb-15"> {{ __('Sessions') }} </h3>

        <!-- Breadcrumb Start-->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item font-14"><a href="{{route('instructor.dashboard')}}">{{__('Dashboard')}}</a></li>
                <li class="breadcrumb-item font-14 " aria-current="page"><a href="{{ route('instructor.course', $course->uuid) }}">{{__('My Programs')}}</a></li>
                <li class="breadcrumb-item font-14 active" aria-current="page">{{ __('Session List') }}</li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="instructor-profile-right-part">
        <div class="instructor-quiz-list-page instructor-resources-page">

            <div class="instructor-my-courses-title d-flex justify-content-between align-items-center">
                <h6>{{ __('Sessions') }}</h6>
                <p>{{ @$course->title }}</p>
            </div>

            <div class="row">
                <div class="col-12">
                    @if(count($resources) > 0)
                        <div class="table-responsive">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">{{ __('Topic') }}</th>
                                    <th scope="col">{{ __('Date & Time') }}</th>
                                    <th scope="col">{{ __('Time Duration') }}</th>
                                    <th scope="col">{{ __('Session Type') }}</th>
                                    <th scope="col">{{ __('Meeting Host Name') }}</th>
{{--                                    <th scope="col">{{ __('Action') }}</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($resources as $resource)
                                    <tr>
                                        <td>{{ Str::limit($resource->class_topic, 50) }}</td>
                                        <td>{{ date('d M Y, H:i:s', strtotime(@$resource->date)) }}</td>
                                        <td>{{ $resource->duration }} minutes</td>
                                        <td>{{ $resource->session_type == 1 ?  __('LIVE')  : __('ONSITE') }}</td>
                                        <td>
                                            @if($resource->meeting_host_name == 'zoom')
                                                Zoom
                                                <button
                                                    class="theme-btn theme-button1 green-theme-btn default-hover-btn viewMeetingLink"
                                                    data-item="{{ $resource }}">
                                                    {{ __('View') }}
                                                </button>
                                            @elseif($resource->meeting_host_name == 'bbb')
                                                BigBlueButton
                                                <button
                                                    class="theme-btn theme-button1 green-theme-btn default-hover-btn viewBBBMeetingLink"
                                                    data-item="{{ $resource }}"
                                                    data-route="{{ route('instructor.join-bbb-meeting', $resource->id) }}">
                                                    {{ __('View') }}
                                                </button>
                                            @elseif($resource->meeting_host_name == 'jitsi')
                                                Jitsi
                                                <button
                                                    class="theme-btn theme-button1 green-theme-btn default-hover-btn viewJitsiMeetingLink"
                                                    data-item="{{ $resource }}"
                                                    data-route="{{ route('join-jitsi-meeting', $resource->uuid) }}">
                                                    {{ __('View') }}
                                                </button>
                                            @elseif($resource->meeting_host_name == 'gmeet')
                                                Gmeet
                                                <button
                                                    class="theme-btn theme-button1 green-theme-btn default-hover-btn viewGmeetMeetingLink"
                                                    data-url="{{ $resource->join_url }}">
                                                    {{ __('View') }}
                                                </button>
                                            @endif
                                        </td>

{{--                                        <td>--}}
{{--                                            <a href="{{ route('admin.program-session.edit', $resource->uuid) }}"--}}
{{--                                               class="theme-btn default-edit-btn-blue edit">--}}
{{--                                                <span class="iconify" data-icon="gg:eye"></span>{{ __('Show') }}--}}
{{--                                            </a>--}}
{{--                                        </td>--}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <!-- If there is no data Show Empty Design Start -->
                        <div class="empty-data">
                            <img src="{{ asset('frontend') }}/assets/img/empty-data-img.png" alt="img" class="img-fluid">
                            <h5 class="my-3">{{ __('Empty Sessions') }}</h5>
                        </div>
                        <!-- If there is no data Show Empty Design End -->
                    @endif

                    <!-- Add Resource Button Start -->
{{--                    <a href="{{ route('resource.create', $course->uuid) }}" class="add-resources-btn theme-btn theme-button1 default-hover-btn">{{ __('Add Resource') }}</a>--}}
                    <!-- Add Resource Button End -->

                </div>
            </div>

        </div>
    </div>
@endsection
@section('modal')
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
@push('script')
    <script src="{{ asset('frontend/assets/js/instructor/copy-zoom-url-and-show.js') }}"></script>
@endpush
