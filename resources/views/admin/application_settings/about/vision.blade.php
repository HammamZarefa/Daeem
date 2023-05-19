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
                    <div class="email-inbox__area  bg-style">
                        <div class="item-top mb-30"><h2>{{ __(@$title) }}</h2></div>
                        <form action="{{route('settings.about.vision.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="custom-form-group mb-3 row">
                                <label for="our_vision_title" class="col-lg-3 text-lg-right text-black">{{ __('Title Of Vision') }} </label>
                                <div class="col-lg-9">
                                    <input type="text" name="our_vision_title" id="our_vision_title" value="{{ @$aboutUsGeneral->our_vision_title }}"
                                           class="form-control" placeholder="{{ __('Type our vision title') }}">
                                </div>
                            </div>
                            <div class="custom-form-group mb-3 row">
                                <label for="our_vision_subtitle" class="col-lg-3 text-lg-right text-black">{{ __('Subtitle Of Vision') }} </label>
                                <div class="col-lg-9">
                                    <textarea name="our_vision_subtitle" class="form-control" rows="5" id="our_vision_subtitle"
                                              required>{{ @$aboutUsGeneral->our_vision_subtitle }}</textarea>
                                </div>
                            </div>

                            <div class="custom-form-group mb-3 row">
                                <label for="our_message_title" class="col-lg-3 text-lg-right text-black">{{ __('Title Of Message') }} </label>
                                <div class="col-lg-9">
                                    <input type="text" name="our_message_title" id="our_message_title" value="{{ @$aboutUsGeneral->our_message_title }}"
                                           class="form-control" placeholder="{{ __('Type our message title') }}">
                                </div>
                            </div>
                            <div class="custom-form-group mb-3 row">
                                <label for="our_message_subtitle" class="col-lg-3 text-lg-right text-black">{{ __('Subtitle Of Message') }} </label>
                                <div class="col-lg-9">
                                    <textarea name="our_message_subtitle" class="form-control" rows="5" id="our_message_subtitle"
                                              required>{{ @$aboutUsGeneral->our_message_subtitle }}</textarea>
                                </div>
                            </div>

                            <div class="row justify-content-end">
                                <div class="col-md-2 text-right ">
                                    <button type="submit" class="btn btn-blue float-right">{{__('Update')}}</button>
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
