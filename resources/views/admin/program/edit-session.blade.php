@extends('layouts.admin')



@section('content')
    <div class="instructor-profile-right-part">
        <div class="instructor-quiz-list-page instructor-create-live-class-page">
            <div class="instructor-my-courses-title d-flex justify-content-between align-items-center">
                <h6>Edit Program Session</h6>
            </div>

            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.program-session.update', $session->uuid) }}" method="post">
                        @csrf
                        <div class="row mb-30">
                            <div class="col-md-12">
                                <div class="label-text-title color-heading font-medium font-16 mb-3">{{
                                                    __('Coach') }}
                                    <span class="text-danger">*</span>
                                </div>

                                <select name="coach" id="coach" class="form-select coach"
                                        required>
                                    <option value="">{{ __('Select Coach') }}</option>
                                    @foreach($instructors as $instructor)
                                        <option value="{{ $instructor->id }}"
                                            {{old('coach', $session->instructor->id)==$instructor->id ? 'selected' : '' }}>
                                            {{$instructor->name}}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('session_type'))
                                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{
                                                    $errors->first('session_type') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-30">
                            <div class="col-md-12">
                                <label
                                    class="label-text-title color-heading font-medium font-16 mb-3">{{ __('Program Session Topic') }}</label>
                                <input type="text" name="class_topic" class="form-control topic"
                                       placeholder="Enter your topic" required value="{{ old('class_topic',$session->class_topic) }}">
                                @if ($errors->has('class_topic'))
                                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('class_topic') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-30">
                            <div class="col-md-12">
                                <label
                                    class="label-text-title color-heading font-medium font-16 mb-3">{{ __('Program Session Date') }}</label>
                                <input type="datetime-local" name="date" class="form-control date"
                                       placeholder="Selected Date" value="{{old('date',$session->date)}}" required>
                                @if ($errors->has('date'))
                                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('date') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-30">
                            <div class="col-md-12">
                                <label
                                    class="label-text-title color-heading font-medium font-16 mb-3">{{ __('Time Duration (Write minutes)') }}</label>
                                <input type="number" name="duration" class="form-control duration"
                                  value="{{old('duration',$session->duration)}}"     placeholder="Type duration in minutes" required>
                                @if ($errors->has('duration'))
                                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('duration') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-30">
                            <div class="col-md-12">
                                <div class="label-text-title color-heading font-medium font-16 mb-3">{{
                                                    __('Program Session Type') }}
                                    <span class="text-danger">*</span>
                                </div>

                                <select name="session_type" id="session_type" class="form-select session_type"
                                        required>
                                    <option value="">{{ __('Select Program Session
                                                        Type') }}</option>
                                    <option value="{{ PROGRAM_SESSION_TYPE_LIVE }}"
                                        {{old('session_type',$session->session_type)==PROGRAM_SESSION_TYPE_LIVE ? 'selected' : '' }}>
                                        LIVE
                                    </option>
                                    <option value="{{ PROGRAM_SESSION_TYPE_ONSITE }}"
                                        {{old('session_type',$session->session_type)==PROGRAM_SESSION_TYPE_ONSITE ? 'selected' : '' }}>
                                        ONSITE
                                    </option>
                                </select>

                                @if ($errors->has('session_type'))
                                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{
                                                    $errors->first('session_type') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row liveSession {{$session->session_type == 1 ? 'd-block' : 'd-none'}} ">
                            <div class="row">
                                <div class="col-md-12 mb-30">
                                    <label
                                        class="label-text-title color-heading font-medium font-16 mb-3">{{ __('Meeting Host Name') }}
                                        <span
                                            class="cursor tooltip-show-btn share-referral-big-btn primary-btn get-referral-btn border-0"
                                            data-toggle="popover" data-bs-placement="bottom"
                                            data-bs-content="Meridian sun strikes upper urface of the impenetrable foliage of my trees">
                                        !
                                    </span>
                                    </label>
                                    <select name="meeting_host_name" id="meeting_host_name" class="form-select">
                                        <option value="">{{ __('Select Option') }}</option>
                                        @if(zoom_status() == 1)
                                            <option value="zoom" {{$session->meeting_host_name == "zoom" ? "selected" : ""}}>Zoom</option> @endif
                                        @if(get_option('bbb_status') == 1)
                                            <option value="bbb" {{$session->meeting_host_name == "bbb" ? "selected" : ""}}>BigBlueButton</option> @endif
                                        @if(get_option('jitsi_status') == 1)
                                            <option value="jitsi" {{$session->meeting_host_name == "jitsi" ? "selected" : ""}}>Jitsi</option> @endif
                                        @if(get_option('gmeet_status') == 1 && $gmeet)
                                            <option value="gmeet" {{$session->meeting_host_name == "gmeet" ? "selected" : ""}}>Google Meet</option> @endif
                                    </select>

                                    @if ($errors->has('meeting_host_name'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('meeting_host_name') }}</span>
                                    @endif
                                </div>
                            </div>

                            @if(zoom_status() == 1)
                                <div class="row mb-30 {{$session->meeting_host_name != "zoom" ? "d-none" : ""}} zoom_live_link_div">
                                    <div class="col">
                                        <label
                                            class="label-text-title color-heading font-medium font-16 mb-3">{{ __('Zoom Program Session Link') }}</label>
                                        <div class="row align-items-center">
                                            <div class="col-md-9">
                                                <input type="text" name="start_url" class="form-control start_url"
                                                       id="zoom_start_url" placeholder="Generate your live class link"
                                                       value="{{ old('start_url',$session->start_url) }}">
                                                @if ($errors->has('start_url'))
                                                    <span class="text-danger"><i
                                                            class="fas fa-exclamation-triangle"></i> {{ $errors->first('start_url') }}</span>
                                                @endif
                                            </div>
                                            <div class="col">
                                                <button type="button"
                                                        class="theme-btn theme-button1 default-hover-btn green-theme-btn createLiveLink">{{ __('Create Live Link') }}</button>
                                            </div>
                                        </div>
                                        <div class="row align-items-center d-none">
                                            <div class="col-md-9">
                                                <input type="hidden" name="join_url" class="form-control join_url"
                                                       id="zoom_join_url" placeholder="Generate your live class link"
                                                       value="{{ old('join_url',$session->join_url) }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if(get_option('jitsi_status') == 1)
                                <div class="row mb-30 {{$session->meeting_host_name != "jitsi" ? "d-none" : ""}} jitsi_live_link_div">
                                    <div class="col">
                                        <label
                                            class="label-text-title color-heading font-medium font-16 mb-3">{{ __('Jitsi Meeting ID/Room') }}</label>
                                        <div class="row align-items-center">
                                            <div class="col-md-9">
                                                <input type="text" name="jitsi_meeting_id" class="form-control"
                                                       id="jitsi_meeting_id" placeholder="Type jitsi meeting id/room"
                                                       minlength="6"
                                                       value="{{ old('jitsi_meeting_id',$session->meeting_id) }}">
                                                @if ($errors->has('jitsi_meeting_id'))
                                                    <span class="text-danger"><i
                                                            class="fas fa-exclamation-triangle"></i> {{ $errors->first('jitsi_meeting_id') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if(get_option('bbb_status') == 1)
                                <div class="{{$session->meeting_host_name != "bbb" ? "d-none" : ""}} bbb_live_link_div">
                                    <div class="row mb-30">
                                        <div class="col">
                                            <label
                                                class="label-text-title color-heading font-medium font-16 mb-3">{{ __('Moderator Password') }}</label>
                                            <div class="row align-items-center">
                                                <div class="col-md-9">
                                                    <input type="text" name="moderator_pw" minlength="6"
                                                           class="form-control " id="moderator_pw"
                                                           placeholder="Type moderator password (min length  6)"
                                                           value="{{ old('moderator_pw') }}">
                                                    @if ($errors->has('moderator_pw'))
                                                        <span class="text-danger"><i
                                                                class="fas fa-exclamation-triangle"></i> {{ $errors->first('moderator_pw') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-30">
                                        <div class="col">
                                            <label
                                                class="label-text-title color-heading font-medium font-16 mb-3">{{ __('Attendee Password') }}</label>
                                            <div class="row align-items-center">
                                                <div class="col-md-9">
                                                    <input type="text" name="attendee_pw" minlength="6"
                                                           class="form-control" id="attendee_pw"
                                                           placeholder="Type attendee password (min length  6)"
                                                           value="{{ old('attendee_pw') }}">
                                                    @if ($errors->has('attendee_pw'))
                                                        <span class="text-danger"><i
                                                                class="fas fa-exclamation-triangle"></i> {{ $errors->first('attendee_pw') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                        <div class="row onSiteSession  {{$session->session_type == 1 ? 'd-none' : 'd-block'}}">
                            <div class="row mb-30">
                                <div class="col-md-12">
                                    <label
                                        class="label-text-title color-heading font-medium font-16 mb-3">{{ __('Descriptions') }}</label>
                                    <textarea type="text" name="desc" class="form-control topic"
                                              placeholder="Enter Program Session Description"
                                              value="{{ old('desc',$session->description) }}"></textarea>
                                    @if ($errors->has('desc'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('desc') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div>
                            <a href="{{ route('live-class.index', $course->uuid) }}"
                               class="theme-btn theme-button3 quiz-back-btn default-hover-btn">{{ __('Back') }}</a>
                            <button type="submit"
                                    class="theme-btn theme-button1 default-hover-btn">{{ __('Update Session') }}</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>

    <input type="hidden" class="getZoomLinkRoute" value="{{ route('live-class.get-zoom-link') }}">
@endsection

@push('script')
    <script src="{{ asset('frontend/assets/js/instructor/create-live-class-zoom-link.js') }}"></script>

    <script>
        $('.session_type').on('change', function () {
            let session_type = $(this).val();
            if (session_type == 1) {
                $('.liveSession').removeClass('d-none')
                $('.liveSession').addClass('d-block')
                $('.onSiteSession').removeClass('d-block')
                $('.onSiteSession').addClass('d-none')
            } else if (session_type == 2) {
                $('.liveSession').removeClass('d-block')
                $('.liveSession').addClass('d-none')
                $('.onSiteSession').removeClass('d-none')
                $('.onSiteSession').addClass('d-block')
            }
        })
    </script>
    <script>
        "use strict"
        $('#meeting_host_name').change(function () {
            var meeting_host_name = this.value
            if (meeting_host_name == 'zoom') {
                $('.zoom_live_link_div').removeClass('d-none')
                $('.bbb_live_link_div').addClass('d-none')
                $('.jitsi_live_link_div').addClass('d-none')

                $("#zoom_start_url").attr("required", true);
                $('#moderator_pw').removeAttr('required');
                $('#attendee_pw').removeAttr('required');
                $('#jitsi_meeting_id').removeAttr('required');
            }

            if (meeting_host_name == 'bbb') {
                $('.bbb_live_link_div').removeClass('d-none')
                $('.zoom_live_link_div').addClass('d-none')
                $('.jitsi_live_link_div').addClass('d-none')

                $('#jitsi_meeting_id').removeAttr('required');
                $('#zoom_start_url').removeAttr('required');
                $("#moderator_pw").attr("required", true);
                $("#attendee_pw").attr("required", true);
            }

            if (meeting_host_name == 'jitsi') {
                $('.jitsi_live_link_div').removeClass('d-none')
                $('.bbb_live_link_div').addClass('d-none')
                $('.zoom_live_link_div').addClass('d-none')

                $("#zoom_start_url").removeAttr('required');
                $('#moderator_pw').removeAttr('required');
                $('#attendee_pw').removeAttr('required');
                $("#jitsi_meeting_id").attr("required", true);
            }
        })
    </script>
@endpush


