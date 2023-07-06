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
                        <div class="item-top mb-30 d-flex justify-content-between">
                            <h2>{{ __(@$title) }}</h2>
{{--                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#sendTestMail" class="btn btn-success btn-sm"> <i class="fa fa-envelope"></i> {{ __('Send Test Mail') }} </a>--}}
                        </div>
                        <form action="{{ route('settings.save.setting')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 mb-3">
                                    <div class="form-group text-black">
                                        <label>{{__('SMS USERSENDER')}} </label>
                                        <input type="text" name="SMS_USERSENDER" value="{{get_option('SMS_USERSENDER')}}" class="form-control">
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 mb-3">
                                    <div class="form-group text-black">
                                        <label>{{__('SMS API KEY')}} </label>
                                        <input type="text" name="SMS_API_KEY" value="{{get_option('SMS_API_KEY')}}" class="form-control">
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 mb-3">
                                    <div class="form-group text-black">
                                        <label class="text-black">{{__('SMS NOTIFICATION ACTIVE')}}
                                            <input type="checkbox" name="SMS_NOTIFICATION_ACTIVE" id="SMS_NOTIFICATION_ACTIVE" value="yes" {{get_option('SMS_NOTIFICATION_ACTIVE') == 'yes' ? 'checked' : '' }} >  </label>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="input__group general-settings-btn">
                                        <button type="submit" class="btn btn-blue float-right">{{__('Save')}}</button>
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

    <div class="modal fade" id="sendTestMail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('Test Mail')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{route('settings.send.test.mail')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3 text-black">
                            <label for="to" class="col-form-label">{{__('Recipient')}}:</label>
                            <input type="email" name="to" class="form-control" id="to" placeholder="{{__('Recipient Mail')}}" required>
                        </div>
                        <div class="mb-3 text-black">
                            <label for="to" class="col-form-label">{{__('Subject')}}:</label>
                            <input type="text" name="subject" class="form-control" id="to" placeholder="{{__('Subject')}}" value="Test Mail" required>
                        </div>
                        <div class="mb-3 text-black">
                            <label for="message" class="col-form-label">{{ __('Your Message') }}:</label>
                            <textarea name="message" class="form-control" id="message-text">{{ __('Hi, This is a test mail') }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer button__list">
                        <button type="submit" class="btn btn-warning mx-md-2">{{ __('Send') }}</button>
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

