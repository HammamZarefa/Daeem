@extends('layouts.admin')



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
                                <li class="active" id="account"><strong>{{ __('Program Overview') }}</strong></li>
                                <li class="active" id="personal"><strong>{{ __('Upload Video') }}</strong></li>
                                <li class="active"><strong>{{ __('Instructors') }}</strong></li>
                                <li class="active" id="confirm"><strong>{{ __('Submit Process') }}</strong></li>
                            </ul>

                            <!-- Upload Course Step-1 Item Start -->
                            <div class="upload-course-step-item upload-course-overview-step-item">
                                <!-- Upload Course Step-3 Item Start -->
                                <div class="upload-course-step-item">
                                    <div class="upload-course-item-block course-overview-step1 radius-8 mb-0 pb-0">

                                        <div class="last-step-content-wrap">
                                            <form method="POST" action="{{route('admin.program.update.status', [$course->uuid])}}"
                                                  id="step1" class="row g-3 needs-validation" novalidate>
                                                @csrf
                                                <div class="row mb-30">
                                                    <div class="col-md-12">
                                                        <div
                                                            class="label-text-title color-heading font-medium font-16 mb-3">{{
                                                    __('Status') }}
                                                            <span class="text-danger">*</span>
                                                        </div>

                                                        <select name="status"
                                                                id="status" class="form-select"
                                                                required>
                                                            <option value="0"
                                                                {{old('status', $course->status)==0 ? 'selected' : '' }}>
                                                                {{ __("Pending") }}</option>
                                                            <option value="1"
                                                                {{old('status', $course->status)==1 ? 'selected' : '' }}>
                                                                {{ __("Published") }}</option>
                                                            <option value="2"
                                                                {{old('status', $course->status)==2 ? 'selected' : '' }}>
                                                                {{ __("Waiting For Review") }}</option>
                                                            <option value="3"
                                                                {{old('status', $course->status)==3 ? 'selected' : '' }}>
                                                                {{ __("Hold") }}</option>
                                                            <option value="4"
                                                                {{old('status', $course->status)==4 ? 'selected' : '' }}>
                                                                {{ __("Draft") }}</option>
                                                        </select>

                                                        @if ($errors->has('status'))
                                                            <span class="text-danger"><i
                                                                    class="fas fa-exclamation-triangle"></i> {{
                                                    $errors->first('status') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="stepper-action-btns">
                                                    <a href="{{route('admin.program.edit', [$course->uuid, 'step=overview'])}}"
                                                       class="btn btn-danger">{{__('Back')}}</a>
                                                    <button type="submit" class="btn btn-success">{{__('Save
                                        and continue')}}</button>
                                                </div>
                                            </form>
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
