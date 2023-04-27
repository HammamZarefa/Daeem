@extends('layouts.admin')
@section('content')
    <div class="instructor-profile-right-part instructor-upload-course-box-part">
        <div class="instructor-upload-course-box">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div id="msform">
                            <!-- progressbar -->
                            <ul id="progressbar" class="upload-course-item-block d-flex align-items-center justify-content-center">
                                <li class="active" id="account"><strong>{{ __('Course Overview') }}</strong></li>
                                <li class="active"  id="personal"><strong>{{ __('Upload Video') }}</strong></li>
                                <li class="active"><strong>{{ __('Instructors') }}</strong></li>
                                <li  class="active" id="confirm"><strong>{{ __('Submit Process') }}</strong></li>
                            </ul>

                            <!-- Upload Course Step-1 Item Start -->
                            <div class="upload-course-step-item upload-course-overview-step-item">
                                <!-- Upload Course Step-3 Item Start -->
                                <div class="upload-course-step-item">
                                    <div class="upload-course-item-block course-overview-step1 radius-8 mb-0 pb-0">
                                        <div class="form-last-step">
                                            <div class="last-step-content-wrap">
                                                <h4 class="mb-3">Finish!</h4>
                                                <div class="stepper-action-btns">
                                                    <a href="{{route('admin.course.index')}}" class="theme-btn theme-button3">{{__('Cancel')}}</a>
                                                    @if($course->status == 1)
                                                    <a href="{{route('admin.course.upload-finished', [$course->uuid])}}" type="button" class="theme-btn theme-button1">{{ __('Done') }}</a>
                                                    @else
                                                    <a href="{{route('admin.course.upload-finished', [$course->uuid])}}" type="button" class="theme-btn theme-button1">{{ __('Submit for review') }}</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Upload Course Step-3 Item End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
