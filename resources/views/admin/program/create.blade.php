@extends('layouts.admin')



@section('content')
<div class="admin-profile-right-part admin-upload-course-box-part">
    <div class="admin-upload-course-box">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div id="msform">
                        <!-- progressbar -->
                        <ul id="progressbar"
                            class="upload-course-item-block d-flex align-items-center justify-content-center">
                            <li class="active" id="account"><strong>{{ __('Program Overview') }}</strong></li>
                            <li id="personal"><strong>{{ __('Upload Video') }}</strong></li>
                            <li id="instructor"><strong>{{ __('Coaches') }}</strong></li>
                            <li id="confirm"><strong>{{ __('Submit Process') }}</strong></li>
                        </ul>

                        <!-- Upload Course Step-1 Item Start -->
                        <div class="upload-course-step-item upload-course-overview-step-item">

                            <!-- Upload Course Overview-1 start -->
                            <div id="upload-course-overview-1">
                                <form method="POST" action="{{route('admin.program.store')}}" id="step1"
                                    class="row g-3 needs-validation" novalidate>
                                    @csrf


                                    <div class="upload-course-item-block course-overview-step1 radius-8">
                                        <div class="upload-course-item-block-title mb-3">
                                            <h6 class="font-20">{{ __('Program Details') }}</h6>
                                        </div>

                                        <div class="row mb-30">
                                            <input type="hidden" name="course_type" value="{{ COURSE_TYPE_PROGRAM }}">

                                        </div>
                                        <div class="row mb-30">
                                            <div class="col-md-12">
                                                <div class="label-text-title color-heading font-medium font-16 mb-3">
                                                    {{ __('Program Title') }}
                                                    <span class="text-danger">*</span>
                                                </div>

                                                <input type="text" name="title" value="{{old('title')}}"
                                                    class="form-control" placeholder="Type your Program title" required>
                                                @if ($errors->has('title'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{
                                                    $errors->first('title') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row mb-30">
                                            <div class="col-md-12">
                                                <div class="label-text-title color-heading font-medium font-16 mb-3">
                                                    {{ __('Program Subtitle') }}
                                                    <span class="text-danger">*</span>
                                                </div>
                                                <textarea class="form-control" name="subtitle" cols="30" rows="10"
                                                    required
                                                    placeholder="Program subtitle in 1000 characters">{{old('subtitle')}}</textarea>
                                                @if ($errors->has('subtitle'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{
                                                    $errors->first('subtitle') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        @if(get_option('subscription_mode'))
                                        <div class="row mb-30">
                                            <div class="col-md-12">
                                                <div class="label-text-title color-heading font-medium font-16 mb-3">{{
                                                    __('Enable for subscription') }}
                                                    <span class="text-danger">*</span>
                                                </div>

                                                <select name="is_subscription_enable" id="is_subscription_enable" class="form-select"
                                                    required>
                                                    <option value="{{ PACKAGE_STATUS_ACTIVE }}"
                                                        {{old('is_subscription_enable')==PACKAGE_STATUS_ACTIVE ? 'selected' : '' }}>
                                                        {{ __("Enable") }}</option>
                                                    <option value="{{ PACKAGE_STATUS_DISABLED }}"
                                                        {{old('is_subscription_enable')==PACKAGE_STATUS_DISABLED ? 'selected' : '' }}>
                                                        {{ __("Disabled") }}</option>
                                                </select>

                                                @if ($errors->has('is_subscription_enable'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{
                                                    $errors->first('is_subscription_enable') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        @endif
                                        <div class="row mb-30">
                                            <div class="col-md-12">
                                                <div class="label-text-title color-heading font-medium font-16 mb-3">
                                                    {{ __('Program Description Key Points') }}
                                                    <span class="text-danger">*</span>
                                                </div>
                                                <div id="add_repeater">
                                                    <div data-repeater-list="key_points" class="">
                                                        <label for="name" class="text-lg-right text-black"> {{
                                                            __('Name') }} </label>
                                                        <div data-repeater-item=""
                                                            class="form-group row align-items-center">
                                                            <div class="custom-form-group mb-3 col-md-10">
                                                                <input type="text" name="name" id="name" value=""
                                                                    class="form-control"
                                                                    placeholder="Type key point name" required>
                                                            </div>

                                                            <div class="col mb-3">
                                                                <a href="javascript:;" data-repeater-delete=""
                                                                    class="theme-btn theme-button1 default-delete-btn-red default-hover-btn frontend-remove-btn btn-danger">
                                                                    <span class="iconify"
                                                                        data-icon="akar-icons:cross"></span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-2">
                                                        <a id="add" href="javascript:;" data-repeater-create=""
                                                            class="theme-btn default-hover-btn theme-button1">
                                                            <span class="iconify" data-icon="akar-icons:plus"></span> {{
                                                            __('Add') }}
                                                        </a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-30">
                                            <div class="col-md-12">
                                                <div class="label-text-title color-heading font-medium font-16 mb-3">
                                                    {{ __('Program Description') }}
                                                    <span class="text-danger">*</span>
                                                </div>
                                                <textarea class="form-control" name="description" cols="30" rows="10"
                                                    required
                                                    placeholder="Program description">{{old('description')}}</textarea>
                                                @if ($errors->has('description'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{
                                                    $errors->first('description') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div id="upload-course-overview-2">

                                        <div class="upload-course-item-block course-overview-step1 radius-8">
                                            <div class="upload-course-item-block-title mb-3">
                                                <h6 class="font-20">{{ __('Category & Tags') }}</h6>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 mb-30">
                                                    <label
                                                        class="label-text-title color-heading font-medium font-16 mb-3">{{
                                                    __('Program Category') }}
                                                        <span
                                                            class="cursor tooltip-show-btn share-referral-big-btn primary-btn get-referral-btn border-0"
                                                            data-toggle="popover" data-bs-placement="bottom"
                                                            data-bs-content="">
                                                        !
                                                    </span>
                                                    </label>
                                                    <select name="category_id" id="category_id" class="form-select"
                                                            required>
                                                        <option value="">{{ __('Select Category') }}</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{$category->id}}" @if(old('category_id'))
                                                                {{old('category_id')==$category->id ? 'selected' : '' }}
                                                                @endif >{{$category->name}}</option>
                                                        @endforeach
                                                    </select>

                                                    @if ($errors->has('category_id'))
                                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{
                                                    $errors->first('category_id') }}</span>
                                                    @endif

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 mb-30">
                                                    <label
                                                        class="label-text-title color-heading font-medium font-16 mb-3">{{
                                                    __('Program Subcategory') }}
                                                        <span
                                                            class="cursor tooltip-show-btn share-referral-big-btn primary-btn get-referral-btn border-0"
                                                            data-toggle="popover" data-bs-placement="bottom"
                                                            data-bs-content="">
                                                        !
                                                    </span>
                                                    </label>
                                                    <select name="subcategory_id" id="subcategory_id" class="form-select"
                                                            required>
                                                        <option value="">{{ __('Select Subcategory') }}</option>
                                                        @foreach($subcategories as $subcategory)
                                                            <option value="{{$subcategory->id}}"
                                                            >{{$subcategory->name}}</option>
                                                        @endforeach
                                                    </select>

                                                    @if ($errors->has('subcategory_id'))
                                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{
                                                    $errors->first('subcategory_id') }}</span>
                                                    @endif

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 mb-30">
                                                    <label
                                                        class="label-text-title color-heading font-medium font-16 mb-3">{{
                                                    __('Tags') }}
                                                        <span
                                                            class="cursor tooltip-show-btn share-referral-big-btn primary-btn get-referral-btn border-0"
                                                            data-toggle="popover" data-bs-placement="bottom"
                                                            data-bs-content="">
                                                        !
                                                    </span>
                                                    </label>
                                                    <select name="tag[]" class="select2" multiple>
                                                        @foreach($tags as $tag)
                                                            <option value="{{$tag->id}}" @if(in_array($tag->id, $selected_tags))
                                                            selected @endif>{{$tag->name}}</option>
                                                        @endforeach
                                                    </select>

                                                    @if ($errors->has('tag'))
                                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{
                                                    $errors->first('tag') }}</span>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                        <div class="upload-course-item-block course-overview-step1 radius-8">
                                            <div class="upload-course-item-block-title mb-3">
                                                <h6 class="font-20">{{ __('Learners Accessibility & others') }}</h6>
                                            </div>
                                                <div class="row">
                                                    <div class="col-md-12 mb-30">
                                                        <label
                                                            class="label-text-title color-heading font-medium font-16 mb-3">{{
                                                    __('Drip Content') }}
                                                            <span
                                                                class="cursor tooltip-show-btn share-referral-big-btn primary-btn get-referral-btn border-0"
                                                                data-toggle="popover" data-bs-placement="bottom"
                                                                data-bs-content="">
                                                        !
                                                    </span>
                                                        </label>
                                                        <select name="drip_content" class="form-select drip_content" required>
                                                            <option value="{{ DRIP_SHOW_ALL }}" {{ (old('drip_content')) ? 'selected' : ''
                                                        }}>{{ dripType(DRIP_SHOW_ALL) }}</option>
                                                            <option value="{{ DRIP_SEQUENCE }}" {{ (old('drip_content')) ? 'selected' : ''
                                                        }}>{{ dripType(DRIP_SEQUENCE) }}</option>
                                                            <option value="{{ DRIP_AFTER_DAY }}" {{ (old('drip_content')) ? 'selected' : ''
                                                        }}>{{ dripType(DRIP_AFTER_DAY) }}</option>
                                                            <option value="{{ DRIP_UNLOCK_DATE }}" {{ (old('drip_content')) ? 'selected' : ''
                                                        }}>{{ dripType(DRIP_UNLOCK_DATE) }}</option>
                                                            <option value="{{ DRIP_PRE_IDS }}" {{ (old('drip_content')) ? 'selected' : ''
                                                        }}>{{ dripType(DRIP_PRE_IDS) }}</option>
                                                        </select>
                                                        <div id="drip-help-text-{{ DRIP_SHOW_ALL }}" class="d-none drip-help-text form-text">
                                                            {{ dripTypeHelpText(DRIP_SHOW_ALL) }}
                                                        </div>
                                                        <div id="drip-help-text-{{ DRIP_SEQUENCE }}" class="d-none drip-help-text form-text">
                                                            {{ dripTypeHelpText(DRIP_SEQUENCE) }}
                                                        </div>
                                                        <div id="drip-help-text-{{ DRIP_AFTER_DAY }}" class="d-none drip-help-text form-text">
                                                            {{ dripTypeHelpText(DRIP_AFTER_DAY) }}
                                                        </div>
                                                        <div id="drip-help-text-{{ DRIP_UNLOCK_DATE }}" class="d-none drip-help-text form-text">
                                                            {{ dripTypeHelpText(DRIP_UNLOCK_DATE) }}
                                                        </div>
                                                        <div id="drip-help-text-{{ DRIP_PRE_IDS }}" class="d-none drip-help-text form-text">
                                                            {{ dripTypeHelpText(DRIP_PRE_IDS) }}
                                                        </div>
                                                    </div>
                                                </div>


                                            <div class="row">
                                                <div class="col-md-12 mb-30">
                                                    <label
                                                        class="label-text-title color-heading font-medium font-16 mb-3">{{
                                                    __('Program Access Period') }}
                                                    </label>
                                                    <input type="number" name="access_period"
                                                           value="{{old('access_period')}}" min="0"
                                                           class="form-control"
                                                           placeholder="{{  __('If there is no expiry duration, leave the field blank.')}} "
                                                    >

                                                    @if ($errors->has('access_period'))
                                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{
                                                    $errors->first('access_period') }}</span>
                                                    @endif
                                                    <div class="form-text">
                                                        {{ __('Enrollment will expire after this number of days. Set 0 for no expiration') }}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 mb-30">
                                                    <label
                                                        class="label-text-title color-heading font-medium font-16 mb-3">{{
                                                    __('Learners Accessibility') }}
                                                        <span
                                                            class="cursor tooltip-show-btn share-referral-big-btn primary-btn get-referral-btn border-0"
                                                            data-toggle="popover" data-bs-placement="bottom"
                                                            data-bs-content="">
                                                        !
                                                    </span>
                                                    </label>
                                                    <select name="learner_accessibility"
                                                            class="form-select learner_accessibility" required>
                                                        <option value="">{{ __('Select Option') }}</option>
                                                        <option value="paid" @if(old('learner_accessibility'))
                                                            {{old('learner_accessibility')=='paid' ? 'selected' : '' }}
                                                             @endif >{{__('Paid')}}</option>
                                                        <option value="free" @if(old('learner_accessibility'))
                                                            {{old('learner_accessibility')=='free' ? 'selected' : '' }}
                                                             @endif >{{__('Free')}}</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row priceDiv">
                                                <div class="col-md-12 mb-30">
                                                    <label
                                                        class="label-text-title color-heading font-medium font-16 mb-3">{{
                                                    __('Program Price') }}
                                                        <span
                                                            class="cursor tooltip-show-btn share-referral-big-btn primary-btn get-referral-btn border-0"
                                                            data-toggle="popover" data-bs-placement="bottom"
                                                            data-bs-content="">
                                                        !
                                                    </span>
                                                    </label>
                                                    <input type="number" name="price"
                                                           value="" min="1"
                                                           maxlength="11" class="form-control price" placeholder="price"
                                                           required="required">

                                                    @if ($errors->has('price'))
                                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{
                                                    $errors->first('price') }}</span>
                                                    @endif

                                                </div>
                                                <div class="col-md-12 mb-30">
                                                    <label
                                                        class="label-text-title color-heading font-medium font-16 mb-3">{{
                                                    __('Old Price') }}
                                                        <span
                                                            class="cursor tooltip-show-btn share-referral-big-btn primary-btn get-referral-btn border-0"
                                                            data-toggle="popover" data-bs-placement="bottom"
                                                            data-bs-content="">
                                                        !
                                                    </span>
                                                    </label>
                                                    <input type="number" name="old_price"
                                                           value="" min="1"
                                                           maxlength="11" class="form-control old_price" placeholder="Old Price"
                                                           required="required">

                                                    @if ($errors->has('old_price'))
                                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{
                                                    $errors->first('old_price') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 mb-30">
                                                    <label
                                                        class="label-text-title color-heading font-medium font-16 mb-3">{{
                                                    __('Language') }}
                                                        <span
                                                            class="cursor tooltip-show-btn share-referral-big-btn primary-btn get-referral-btn border-0"
                                                            data-toggle="popover" data-bs-placement="bottom"
                                                            data-bs-content="">
                                                        !
                                                    </span>
                                                    </label>
                                                    <select name="course_language_id" id="course_language_id"
                                                            class="form-select" required>
                                                        <option value="">Select Language</option>
                                                        @foreach($course_languages as $course_language)
                                                            <option value="{{$course_language->id}}"
                                                            @if(old('course_language_id'))
                                                                {{old('course_language_id')==$course_language->id ? 'selected' :
                                                                '' }}  @endif
                                                            >{{$course_language->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('course_language_id'))
                                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{
                                                    $errors->first('course_language_id') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 mb-30">
                                                    <label
                                                        class="label-text-title color-heading font-medium font-16 mb-3">{{
                                                    __('Difficulty Level') }}
                                                        <span
                                                            class="cursor tooltip-show-btn share-referral-big-btn primary-btn get-referral-btn border-0"
                                                            data-toggle="popover" data-bs-placement="bottom"
                                                            data-bs-content="">
                                                        !
                                                    </span>
                                                    </label>
                                                    <select name="difficulty_level_id" id="difficulty_level_id"
                                                            class="form-select" required>
                                                        <option value="">{{ __('Select Difficulty Level') }}</option>
                                                        @foreach($difficulty_levels as $difficulty_level)
                                                            <option value="{{$difficulty_level->id}}"
                                                            @if(old('difficulty_level_id'))
                                                                {{old('difficulty_level_id')==$difficulty_level->id ? 'selected'
                                                                : '' }}  @endif
                                                            >{{$difficulty_level->name}}</option>
                                                        @endforeach
                                                    </select>

                                                    @if ($errors->has('difficulty_level_id'))
                                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{
                                                    $errors->first('difficulty_level_id') }}</span>
                                                    @endif

                                                </div>
                                            </div>
{{--                                            <div class="row align-items-center">--}}
{{--                                                <div class="col-12">--}}
{{--                                                    <label--}}
{{--                                                        class="label-text-title color-heading font-medium font-16 mb-3">{{--}}
{{--                                                    __('Program Thumbnail') }}--}}
{{--                                                        <span--}}
{{--                                                            class="cursor tooltip-show-btn share-referral-big-btn primary-btn get-referral-btn border-0"--}}
{{--                                                            data-toggle="popover" data-bs-placement="bottom"--}}
{{--                                                            data-bs-content="">--}}
{{--                                                        !--}}
{{--                                                    </span>--}}
{{--                                                    </label>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-md-6 mb-30">--}}
{{--                                                    <div class="upload-img-box mt-3 height-200">--}}

{{--                                                            <img src="">--}}
{{--                                                        <input type="file" name="image" id="image" accept="image/*"--}}
{{--                                                               onchange="previewFile(this)" >--}}
{{--                                                        <div class="upload-img-box-icon">--}}
{{--                                                            <i class="fa fa-camera"></i>--}}
{{--                                                            <p class="m-0">{{__('Image')}}</p>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    @if ($errors->has('image'))--}}
{{--                                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{--}}
{{--                                                    $errors->first('image') }}</span>--}}
{{--                                                    @endif--}}
{{--                                                </div>--}}
{{--                                                <div class="col-md-6 mb-30">--}}
{{--                                                    <p class="font-14 color-gray">{{ __('Accepted image format & size') }}:--}}
{{--                                                        575px X 450px (1MB)</p>--}}
{{--                                                    <p class="font-14 color-gray">{{ __('Accepted image filetype') }}: jpg,--}}
{{--                                                        jpeg, png</p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                            <div class="row align-items-center">
                                                <div class="col-12">
                                                    <label
                                                        class="label-text-title color-heading font-medium font-16 mb-3">{{
                                                    __('Course Thumbnail') }}
                                                        <span
                                                            class="cursor tooltip-show-btn share-referral-big-btn primary-btn get-referral-btn border-0"
                                                            data-toggle="popover" data-bs-placement="bottom"
                                                            data-bs-content="">
                                                        !
                                                    </span>
                                                    </label>
                                                </div>
                                                <div class="col-md-6 mb-30">
                                                    <div class="upload-img-box mt-3 height-200">

                                                            <img src="">
                                                        <input type="file" name="image" id="image" accept="image/*"
                                                               onchange="previewFile(this)"  required>
                                                        <div class="upload-img-box-icon">
                                                            <i class="fa fa-camera"></i>
                                                            <p class="m-0">{{__('Image')}}</p>
                                                        </div>
                                                    </div>
                                                    @if ($errors->has('image'))
                                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{
                                                    $errors->first('image') }}</span>
                                                    @endif
                                                </div>
                                                <div class="col-md-6 mb-30">
                                                    <p class="font-14 color-gray">{{ __('Accepted image format & size') }}:
                                                        575px X 450px (1MB)</p>
                                                    <p class="font-14 color-gray">{{ __('Accepted image filetype') }}: jpg,
                                                        jpeg, png</p>
                                                </div>
                                            </div>
                                            <div class="row align-items-center">
                                                <div class="col-12">
                                                    <label class="label-text-title color-heading font-medium font-16 mb-3">{{ __('Program Introduction Video') }} ({{ __('Optional') }})</label>
                                                </div>
                                                <div class="col-md-12 mb-30">
                                                    <input type="radio"  id="video_check" class="intro_video_check" name="intro_video_check" value="1">
                                                    <label for="video_check">{{ __('Video Upload') }}</label><br>
                                                    <input type="radio"  id="youtube_check" class="intro_video_check" name="intro_video_check" value="2">
                                                    <label for="youtube_check">{{ __('Youtube Video') }} ({{ __('write only video Id') }})</label><br>
                                                </div>
                                                <div class="col-md-12 mb-30">
                                                    <input type="file" name="video" id="video" accept="video/mp4" class="form-control d-none">
                                                    <input type="text" name="youtube_video_id" id="youtube_video_id" placeholder="{{ __('Type your youtube video ID') }}" value="" class="form-control d-none">
                                                </div>


                                                @if ($errors->has('video'))
                                                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{
                                                $errors->first('video') }}</span>
                                                @endif
                                            </div>

                                        </div>


                                    </div>
                                    <div class="stepper-action-btns">
                                        <a href="{{route('admin.program.index')}}"
                                            class="btn btn-danger">{{__('Cancel')}}</a>
                                        <button type="submit"
                                            class="btn btn-success">{{__('Save and
                                            continue')}}</button>
                                    </div>
                                </form>
                            </div>
                            <!-- Upload Course Overview-1 end -->

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('style')
    <link rel="stylesheet" href="{{asset('common/css/select2.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/custom/img-view.css')}}">
    <!-- Video Player css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/video-player/plyr.css') }}">
@endpush

@push('script')
<script src="{{asset('frontend/assets/js/custom/upload-course.js')}}"></script>
<script src="{{ asset('common/js/jquery.repeater.min.js') }}"></script>
<script src="{{ asset('common/js/add-repeater.js') }}"></script>
<script src="{{asset('common/js/select2.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/custom/img-view.js')}}"></script>
<script src="{{asset('frontend/assets/js/custom/upload-course.js')}}"></script>
<!-- Video Player js -->
<script src="{{ asset('frontend/assets/vendor/video-player/plyr.js') }}"></script>
<script>
    const zai_player1 = new Plyr('#playerVideoYoutube');
</script>
<!-- Video Player js -->

<script>
    "use strict"
    $(function (){
        var intro_video_check = "";
        console.log(intro_video_check)
        introVideoCheck(intro_video_check);
    })
    $(".intro_video_check").click(function(){
        var intro_video_check = $("input[name='intro_video_check']:checked").val();
        introVideoCheck(intro_video_check);
    });

    function introVideoCheck(intro_video_check){
        if(intro_video_check == 1){
            $('#video').removeClass('d-none');
            $('.videoSource').removeClass('d-none');
            $('.videoSourceYoutube').addClass('d-none');
            $('#youtube_video_id').addClass('d-none');
        }

        if(intro_video_check == 2){
            $('#video').addClass('d-none');
            $('.videoSource').addClass('d-none');
            $('.videoSourceYoutube').removeClass('d-none');
            $('#youtube_video_id').removeClass('d-none');
        }
    }


    $(document).on('change', ':input[name=drip_content]', function(){
        let dripValue = $(':input[name=drip_content]').val();
        $('.drip-help-text').addClass('d-none');
        $('#drip-help-text-'+dripValue).removeClass('d-none');
    });

    $(':input[name=drip_content]').trigger('change');
</script>

<!-- Video Player js -->
<script src="{{ asset('frontend/assets/vendor/video-player/plyr.js') }}"></script>
<script>
    const aysha_player = new Plyr('#player');
    const aysha_player2 = new Plyr('#youtubePlayer');
</script>
<!-- Video Player js -->
@endpush
