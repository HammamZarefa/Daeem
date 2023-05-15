@extends('layouts.instructor')

@section('breadcrumb')
    <div class="page-banner-content text-center">
        <h3 class="page-banner-heading text-white pb-15"> {{__('Coach Membership')}} </h3>

        <!-- Breadcrumb Start-->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item font-14"><a href="{{route('instructor.dashboard')}}">{{__('Dashboard')}}</a></li>
                <li class="breadcrumb-item font-14 active" aria-current="page">{{__('Coach Membership')}}</li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="instructor-profile-right-part">
        <div class="tab-pane show" id="Certificate" role="tabpanel" aria-labelledby="Certificate-tab">
            <div class="row">
                <div class="col-12">
                    <div class="after-purchase-course-watch-tab bg-white p-30">
                    @if($student_certificate)
                        <!-- Course watch Certificate Start -->
                            <div class="course-watch-certificate-wrap">
                                <div class="watch-course-tab-inside-top-heading d-flex justify-content-between align-items-center">
                                    <h6>{{__('Certificate')}}</h6>
                                    <div class="course-watch-certificate-download-btns">
                                        <a href="{{ asset($student_certificate->path) }}" target="_blank" class="theme-btn theme-button1 default-hover-btn"><span class="iconify" data-icon="fluent:print-32-regular"></span>{{ __('Prints') }}</a>
                                        <a href="{{ asset($student_certificate->path) }}" download="" class="theme-btn theme-button1 green-theme-btn default-hover-btn"><span class="iconify" data-icon="heroicons-outline:download"></span>{{ __('Download') }}</a>
                                    </div>
                                </div>

                                <div class="course-watch-certificate-img text-center">
                                    <iframe src="{{ asset($student_certificate->path) }}#toolbar=0&navpanes=0&scrollbar=0" class="certificate-pdf-iframe" width="750" height="500"></iframe>
                                </div>

                            </div>
                            <!-- Course watch Certificate End -->
                    @else
                        <!-- If there is no data Show Empty Design Start -->
                            <div class="empty-data">
                                <img src="{{ asset('frontend/assets/img/empty-data-img.png') }}" alt="img" class="img-fluid">
                                <h5 class="my-3">{{ __('After completing the course, you will receive a certificate.') }}</h5>
                            </div>
                            <!-- If there is no data Show Empty Design End -->
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <link rel="stylesheet" href="{{asset('common/css/select2.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/custom/image-preview.css')}}">
@endpush

@push('script')
    <script src="{{asset('common/js/select2.min.js')}}"></script>
    <script src="{{asset('admin/js/custom/image-preview.js')}}"></script>
    <script>
         $('.select2').select2({
            width: '100%'
        });
    </script>
@endpush
