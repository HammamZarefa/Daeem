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
                                <h2>{{ __('Application Settings') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __(@$title) }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    @include('admin.application_settings.sidebar')
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="email-inbox__area bg-style">
                        <div class="item-top mb-30"><h2>{{ __(@$title) }}</h2></div>
                        <form action="{{route('settings.store-banner')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="input__group mb-25 row">
                                <label for="banner_mini_words_title" class="col-lg-3"> {{ __('Mini Title') }}</label>
                                <div class="col-lg-9">
                                    <select class="form-control multiple-select-input" name="banner_mini_words_title[]" id="banner_mini_words_title" multiple="multiple">

                                    </select>
                                </div>
                            </div>
                            <div class="input__group mb-25 row">
                                <label for="banner_first_line_title" class="col-lg-3"> {{ __('First Line Title') }} <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input type="text" name="banner_first_line_title" id="banner_first_line_title"
                                           value="" class="form-control" required>
                                </div>
                            </div>
                            <div class="input__group mb-25 row">
                                <label for="banner_second_line_title" class="col-lg-3"> {{ __('Second Line Title') }} <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input type="text" name="banner_second_line_title" id="banner_second_line_title"
                                           value="" class="form-control" required>
                                </div>
                            </div>
                            <div class="input__group mb-25 row">
                                <label for="banner_second_line_changeable_words" class="col-lg-3"> {{ __('Second Line Changeable Word Title') }}</label>
                                <div class="col-lg-9">
                                    <select class="form-control multiple-select-input" name="banner_second_line_changeable_words[]" id="banner_second_line_changeable_words" multiple="multiple">

                                    </select>
                                </div>
                            </div>
                            <div class="input__group mb-25 row">
                                <label for="banner_third_line_title" class="col-lg-3"> {{ __('Third Line Title') }} <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input type="text" name="banner_third_line_title" id="banner_third_line_title" value="" class="form-control" required>
                                </div>
                            </div>
                            <div class="input__group mb-25 row">
                                <label for="banner_subtitle" class="col-lg-3"> {{ __('Subtitle') }} <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input type="text" name="banner_subtitle" id="banner_subtitle" value="" class="form-control" required>
                                </div>
                            </div>
                            <div class="input__group mb-25 row">
                                <label for="banner_first_button_name" class="col-lg-3">{{ __('First Button Name') }} </label>
                                <div class="col-lg-9">
                                    <input type="text" name="banner_button_name" id="banner_button_name" value=""
                                           class="form-control" >
                                </div>
                            </div>
                            <div class="input__group mb-25 row">
                                <label for="banner_first_button_link" class="col-lg-3">{{ __('First Button Link') }} </label>
                                <div class="col-lg-9">
                                    <input type="text" name="banner_button_link" id="banner_button_link" value=""
                                           class="form-control" >
                                </div>
                            </div>

                            <div class="input__group mb-25 row">
                                <label class="col-lg-3">{{ __('Banner Image') }}</label>
                                <div class="col-lg-5">
                                    <div class="upload-img-box">

                                            <img src="" alt="img">

                                        <input type="file" name="banner_image" id="banner_image" accept="image/*" onchange="previewFile(this)">
                                        <div class="upload-img-box-icon">
                                            <i class="fa fa-camera"></i>
                                            <p class="m-0">{{ __('Banner Image') }}</p>
                                        </div>
                                    </div>
                                    @if ($errors->has('banner_image'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('banner_image') }}</span>
                                    @endif
                                    <p><span class="text-black">{{ __('Accepted Files') }}:</span> PNG,SVG <br> <span class="text-black">{{ __('Recommend Size') }}:</span> 800 x 540 (1MB)</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="input__group general-settings-btn">
                                        <button type="submit" class="btn btn-blue">{{__('Update')}}</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content area end -->
@endsection


@push('style')
    <link rel="stylesheet" href="{{asset('admin/css/custom/image-preview.css')}}">
@endpush

@push('script')
    <script src="{{asset('admin/js/custom/image-preview.js')}}"></script>
@endpush
