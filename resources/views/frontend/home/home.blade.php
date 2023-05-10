@extends('frontend.layouts.app')

@section('content')

    <section class="special-feature-area p-0 {{ @$home->faq_area == 1 ? '' : 'd-none' }}">
    <!-- Header Start -->
    <div class="slider" data-animationspeed="2500">
        <div class="slider__slides">
            @foreach($banners as $banner)
            <!-- slider item  -->
            <div class="slider__slide">
                <img src="{{ getImageFile(@$banner->banner_image) }}">
                <div class="slider__slide-text">
                    <p>
                        @foreach(@$banner->banner_mini_words_title ?? [] as $banner_mini_word)
                            <span>{{ __($banner_mini_word) }}</span>
                        @endforeach
                    </p>
                    <p style="margin: 20px 0px;">{{ __(@$banner->banner_first_line_title) }}</p>
                    <p>
                        {{ __(@$banner->banner_second_line_title) }}&nbsp;
                        @foreach(@$banner->banner_second_line_changeable_words ?? [] as $banner_second_line_changeable_word)
                            <span class="word">{{ __($banner_second_line_changeable_word) }}</span>
                        @endforeach
                    </p>
                    <p>
                        {{ __(@$banner->banner_third_line_title) }}
                    </p>
                    <p>
                        {{ __(@$banner->banner_subtitle) }}
                    </p>
                    @if(!get_option('private_mode') || !auth()->guest())
                        <a style="margin: 20px 0px;" href="{{ __(@$banner->banner_button_link) }}"
                           class="theme-btn theme-button1">{{ __(@$banner->banner_button_name) }} <i data-feather="arrow-right"></i></a>
                    @endif
                </div>
            </div>
            @endforeach

        </div>
        <button href="#" class="slider__button slider__button--next">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="currentColor"
                      d="M11.3 19.3q-.275-.275-.288-.7q-.012-.425.263-.7l4.9-4.9H5q-.425 0-.713-.288Q4 12.425 4 12t.287-.713Q4.575 11 5 11h11.175l-4.9-4.9q-.275-.275-.263-.7q.013-.425.288-.7q.275-.275.7-.275q.425 0 .7.275l6.6 6.6q.15.125.213.312q.062.188.062.388t-.062.375q-.063.175-.213.325l-6.6 6.6q-.275.275-.7.275q-.425 0-.7-.275Z"/>
            </svg>
        </button>
        <button href="#" class="slider__button slider__button--prev">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="currentColor"
                      d="M11.3 19.3q-.275-.275-.288-.7q-.012-.425.263-.7l4.9-4.9H5q-.425 0-.713-.288Q4 12.425 4 12t.287-.713Q4.575 11 5 11h11.175l-4.9-4.9q-.275-.275-.263-.7q.013-.425.288-.7q.275-.275.7-.275q.425 0 .7.275l6.6 6.6q.15.125.213.312q.062.188.062.388t-.062.375q-.063.175-.213.325l-6.6 6.6q-.275.275-.7.275q-.425 0-.7-.275Z"/>
            </svg>
        </button>

    </div>
    <!-- Header End -->
    </section>
    <!-- Special Feature Area Start -->
    <section class="special-feature-area p-0 {{ @$home->special_feature_area == 1 ? '' : 'd-none' }}">
        <div class="container">
            <div class="row">
                <!-- Single Feature Item start-->
                <div class="col-md-4">
                    <div class="single-feature-item d-flex align-items-center">
                        <div class="flex-shrink-0 feature-img-wrap">
                            <img src="{{ getImageFile(get_option('home_special_feature_first_logo')) }}" alt="feature">
                        </div>
                        <div class="flex-grow-1 ms-3 feature-content">
                            <h6 class="tex-s-c">{{ __(get_option('home_special_feature_first_title')) }}</h6>
                            <p class="tex-s-c">{{ __(get_option('home_special_feature_first_subtitle')) }}</p>
                        </div>
                    </div>
                </div>
                <!-- Single Feature Item End-->
                <!-- Single Feature Item start-->
                <div class="col-md-4">
                    <div class="single-feature-item d-flex align-items-center">
                        <div class="flex-shrink-0 feature-img-wrap">
                            <img src="{{ getImageFile(get_option('home_special_feature_second_logo')) }}" alt="feature">
                        </div>
                        <div class="flex-grow-1 ms-3 feature-content">
                            <h6>{{ __(get_option('home_special_feature_second_title')) }}</h6>
                            <p>{{ __(get_option('home_special_feature_second_subtitle')) }}</p>
                        </div>
                    </div>
                </div>
                <!-- Single Feature Item End-->
                <!-- Single Feature Item start-->
                <div class="col-md-4">
                    <div class="single-feature-item d-flex align-items-center">
                        <div class="flex-shrink-0 feature-img-wrap">
                            <img src="{{ getImageFile(get_option('home_special_feature_third_logo')) }}" alt="feature">
                        </div>
                        <div class="flex-grow-1 ms-3 feature-content">
                            <h6>{{ __(get_option('home_special_feature_third_title')) }}</h6>
                            <p>{{ __(get_option('home_special_feature_third_subtitle')) }}</p>
                        </div>
                    </div>
                </div>
                <!-- Single Feature Item End-->

            </div>
        </div>
    </section>
    <!-- Special Feature Area End -->

    @if(!get_option('private_mode') || !auth()->guest())


        <!-- ********************* A Broad Selection Of Courses ********************* -->
        <section
            class="courses-area section-t-space section-b-85-space {{ @$home->courses_area == 1 ? '' : 'd-none' }}">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-left-title-with-btn d-flex justify-content-between align-items-end">
                            <div class="section-title section-title-left d-flex align-items-start">
                                <div class="section-heading-img">
                                    <img src="{{ getImageFile(get_option('course_logo')) }}" alt="Course"></div>
                                <div>
                                    <h3 class="section-heading">{{ __(get_option('course_title')) }}</h3>
                                    <p class="section-sub-heading">{{ __(get_option('course_subtitle')) }}</p>
                                </div>
                            </div>


                        </div>
                        <div class="course-tab-nav-wrap d-flex justify-content-between">
                            <ul class="nav nav-tabs tab-nav-list border-0" id="myTab" role="tablist">
                                @foreach($featureCategories as $key => $category)
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link {{ $key == 0 ? 'active' : '' }}"
                                           id="{{ $category->slug }}-tab" data-bs-toggle="tab"
                                           href="#{{ $category->slug }}" role="tab"
                                           aria-controls="{{ $category->slug }}"
                                           aria-selected="{{ $key == 0 ? 'true' : 'false' }}">{{ __($category->name) }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-content" id="myTabContent">
                    @foreach($featureCategories as $key => $category)
                        <div class="tab-pane fade {{ $key == 0 ? 'active show' : '' }}" id="{{ $category->slug }}"
                             role="tabpanel" aria-labelledby="{{ $category->slug }}-tab">
                            <div class="course-slider-items owl-carousel owl-theme owl-loaded owl-drag">

                                <div class="owl-stage-outer">
                                    <div class="owl-stage"
                                         style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2006px;">
                                        <!-- ***************** slider item ***************** -->
                                        @foreach($category->activeCourses as $key2=>$course)
                                            <div class="owl-item {{ $key2 == 0 ? 'active' : '' }}"
                                                 style="width: 256.5px; margin-right: 30px;">
                                                <div class="col-12 col-sm-4 col-lg-3 w-100">
                                                    <div class="card course-item border-0 radius-3 bg-white">
                                                        <div class="course-img-wrap overflow-hidden">
                                                            <a href="{{route('course-details',$course->slug)}}">
                                                                <img
                                                                    src="{{getImageFile($course->image_path)}}"
                                                                    alt="course" class="img-fluid"></a>
{{--                                                            <div class="course-item-hover-btns position-absolute">--}}
{{--<span class="course-item-btn addToWishlist" data-course_id="1"--}}
{{--      data-route="/add-to-wishlist" title="Add to Wishlist">--}}
{{--<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"--}}
{{--     stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">--}}
{{--    <path--}}
{{--        d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>--}}
{{--</span>--}}
{{--                                                                <span class="course-item-btn addToCart"--}}
{{--                                                                      data-course_id="1"--}}
{{--                                                                      data-route="/add-to-cart"--}}
{{--                                                                      title="Add to Cart">--}}
{{--<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"--}}
{{--     stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path--}}
{{--        d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path--}}
{{--        d="M16 10a4 4 0 0 1-8 0"></path></svg>--}}
{{--</span>--}}
{{--                                                            </div>--}}
                                                        </div>
                                                        <div class="card-body tex-s-c">
                                                            <h5 class="card-title course-title"><a
                                                                    href="{{route('course-details',$course->slug)}}">
                                                                    {{$course->title}}
                                                                </a></h5>
                                                            <div class="course-item-bottom">
                                                                <div
                                                                    class="course-rating d-flex align-items-center rating-list">
                                                                    <span
                                                                        class="font-medium font-14 me-2">{{ number_format($course->average_rating, 1) }}</span>
                                                                    <ul class="rating-list d-flex align-items-center me-2">
                                                                        @include('frontend.course.render-course-rating')
                                                                    </ul>
                                                                    <span class="rating-count font-14">({{ @$course->orderItems->count() }})</span>
                                                                </div>
                                                                <div
                                                                    class="instructor-bottom-item font-14 font-semi-bold">
                                                                    <div
                                                                        class="instructor-bottom-item font-14 font-semi-bold">
                                                                        {{__('Price')}}:
                                                                        <span
                                                                            class="color-hover"> {{ $course->price }} {{ get_currency_symbol() }}</span>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="owl-nav">
                                    <button type="button" role="presentation" class="owl-prev disabled">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                                             class="iconify iconify--la" width="1em" height="1em"
                                             preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32"
                                             data-icon="la:angle-left">
                                            <path fill="currentColor"
                                                  d="m19.031 4.281l-11 11l-.687.719l.687.719l11 11l1.438-1.438L10.187 16L20.47 5.719z"></path>
                                        </svg>
                                    </button>
                                    <button type="button" role="presentation" class="owl-next">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                                             class="iconify iconify--la" width="1em" height="1em"
                                             preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32"
                                             data-icon="la:angle-right">
                                            <path fill="currentColor"
                                                  d="M12.969 4.281L11.53 5.72L21.812 16l-10.28 10.281l1.437 1.438l11-11l.687-.719l-.687-.719z"></path>
                                        </svg>
                                    </button>
                                </div>

                                <div class="owl-dots disabled"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>


        <!-- ********************* A Traning programs ********************* -->
        <section
            class="courses-area section-t-space section-b-85-space {{ @$home->bundle_area == 1 ? '' : 'd-none' }}">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-left-title-with-btn d-flex justify-content-between align-items-end">
                            <div class="section-title section-title-left d-flex align-items-start">
                                <div class="section-heading-img">
                                    <img src="{{ getImageFile(get_option('training_program_logo')) }}" alt="Course"></div>
                                <div>
                                    <h3 class="section-heading">{{ __(get_option('training_program_title')) }}</h3>
                                    <p class="section-sub-heading">{{ __(get_option('training_program_subtitle')) }}</p>
                                </div>

                            </div>
                            {{--                            <a href="{{ route('consultationInstructorList') }}"--}}
                            {{--                               class="theme-btn theme-button2 theme-button3 ">{{ __('View All') }} <i--}}
                            {{--                                    data-feather="arrow-right"></i></a>--}}


                        </div>

                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade active show">
                        <div class="course-slider-items owl-carousel owl-theme owl-loaded owl-drag">

                            <div class="owl-stage-outer">
                                <div class="owl-stage"
                                     style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2006px;">
                                    <!-- ***************** slider item ***************** -->
                                    @foreach($training_programmes as $key=>$training_program)
                                        <div class="owl-item {{$key==0? 'active' : ''}}"
                                             style="width: 256.5px; margin-right: 30px;">
                                            <div class="card-container">
                                                <a href="{{route('program-details',$training_program->slug)}}"
                                                   class="hero-image-container">
                                                    <img class="hero-image"
                                                         src="{{getImageFile($training_program->image_path)}}"
                                                         alt="Spinning glass cube"/>
                                                </a>
                                                <main class="main-content">
                                                    <h1>
                                                        <a href="{{route('program-details',$training_program->slug)}}">{{$training_program->title}}</a>
                                                    </h1>
                                                    <div class="course-rating d-flex align-items-center rating-list">
                                                        <span
                                                            class="font-medium font-14 me-2">{{ number_format($training_program->average_rating, 1) }}</span>
                                                        <ul class="rating-list d-flex align-items-center me-2">
                                                            @include('frontend.course.render-course-rating')
                                                        </ul>
                                                        <span class="rating-count font-14">({{ @$training_program->orderItems->count() }})</span>
                                                    </div>
                                                    <div class="flex-row">
                                                        <div class="coin-base">
                                                            <span class="m-1">@lang('Price'):</span>
                                                            <h2>{{ $training_program->price }} {{ get_currency_symbol() }}</h2>
                                                        </div>
                                                        <div class="time-left">
                                                            <img
                                                                src="https://i.postimg.cc/prpyV4mH/clock-selection-no-bg.png"
                                                                alt="clock" class="small-image"/>
                                                            <p>3 days left</p>
                                                        </div>
                                                    </div>
                                                </main>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>


                            <div class="owl-nav">
                                <button type="button" role="presentation" class="owl-prev disabled">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         aria-hidden="true" role="img" class="iconify iconify--la" width="1em"
                                         height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32"
                                         data-icon="la:angle-left">
                                        <path fill="currentColor"
                                              d="m19.031 4.281l-11 11l-.687.719l.687.719l11 11l1.438-1.438L10.187 16L20.47 5.719z"></path>
                                    </svg>
                                </button>
                                <button type="button" role="presentation" class="owl-next">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         aria-hidden="true" role="img" class="iconify iconify--la" width="1em"
                                         height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32"
                                         data-icon="la:angle-right">
                                        <path fill="currentColor"
                                              d="M12.969 4.281L11.53 5.72L21.812 16l-10.28 10.281l1.437 1.438l11-11l.687-.719l-.687-.719z"></path>
                                    </svg>
                                </button>
                            </div>

                            <div class="owl-dots disabled"></div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="business" role="tabpanel" aria-labelledby="business-tab">
                        <div class="course-slider-items owl-carousel owl-theme owl-loaded owl-drag">
                            <div class="owl-stage-outer">
                                <div class="owl-stage"
                                     style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s;">

                                </div>
                            </div>
                            <div class="owl-nav disabled">
                                <button type="button" role="presentation" class="owl-prev disabled">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         aria-hidden="true" role="img" class="iconify iconify--la" width="1em"
                                         height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32"
                                         data-icon="la:angle-left">
                                        <path fill="currentColor"
                                              d="m19.031 4.281l-11 11l-.687.719l.687.719l11 11l1.438-1.438L10.187 16L20.47 5.719z"></path>
                                    </svg>
                                </button>
                                <button type="button" role="presentation" class="owl-next disabled">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         aria-hidden="true" role="img" class="iconify iconify--la" width="1em"
                                         height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32"
                                         data-icon="la:angle-right">
                                        <path fill="currentColor"
                                              d="M12.969 4.281L11.53 5.72L21.812 16l-10.28 10.281l1.437 1.438l11-11l.687-.719l-.687-.719z"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="owl-dots disabled"></div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="it-software" role="tabpanel" aria-labelledby="it-software-tab">
                        <div class="course-slider-items owl-carousel owl-theme owl-loaded owl-drag">
                        </div>
                    </div>
                </div>
            </div>
        </section>


    @endif




    <section
        class="courses-area courses-bundels-area one-to-one-consultation-area section-t-space section-b-85-space bg-page {{ @$home->instructor_area == 1 ? '' : 'd-none' }}">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <div class="section-left-title-with-btn d-flex justify-content-between align-items-end">
                        <div class="section-title section-title-left d-flex align-items-start">
                            <div class="section-heading-img">
                                <img src="{{ getImageFile(get_option('top_instructor_logo')) }}" alt="Consultant">
                            </div>
                            <div>
                                <h3 class="section-heading">{{ __(get_option('top_instructor_title')) }}</h3>
                                <p class="section-sub-heading">{{ __(get_option('top_instructor_subtitle')) }}</p>
                            </div>
                        </div>
                        <a href="/consultation-instructor-list "
                           class="theme-btn theme-button2 theme-button3 mar1-s-au">{{ __('View All Coaches') }}
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-arrow-right">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-12">

                    <div class="course-slider-items one-to-one-slider-items owl-carousel owl-theme owl-loaded owl-drag">

                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                 style="transform: translate3d(0px, 0px, 0px); transition: all 1s ease 0s; width: 1433px;">
                                <!-- ************************ item coach ************************ -->
                                @foreach($consultationInstructors as $key=>$instructor)
                                    <div class="owl-item {{$key==0?'active':''}}" style="width: 256.5px; margin-right: 30px;">
                                        <div class="col-12 col-sm-4 col-lg-3 w-100 mt-0 mb-25">
                                            <x-frontend.instructor :user="$instructor" :type=INSTRUCTOR_CARD_TYPE_TWO/>

                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="owl-nav">
                            <button type="button" role="presentation" class="owl-prev disabled">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     aria-hidden="true" role="img" class="iconify iconify--la" width="1em" height="1em"
                                     preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32" data-icon="la:angle-left">
                                    <path fill="currentColor"
                                          d="m19.031 4.281l-11 11l-.687.719l.687.719l11 11l1.438-1.438L10.187 16L20.47 5.719z"></path>
                                </svg>
                            </button>
                            <button type="button" role="presentation" class="owl-next">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     aria-hidden="true" role="img" class="iconify iconify--la" width="1em" height="1em"
                                     preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32" data-icon="la:angle-right">
                                    <path fill="currentColor"
                                          d="M12.969 4.281L11.53 5.72L21.812 16l-10.28 10.281l1.437 1.438l11-11l.687-.719l-.687-.719z"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="owl-dots disabled"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Our Top Instructor Area End -->


    <!-- Video Area Start -->
    <section class="tex-s-c video-area {{ @$home->video_area == 1 ? '' : 'd-none' }} ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-5 col-xl-6">
                    <div class="video-area-right position-relative">
                        <div class="section-title">
                            <h3 class="section-heading">{{ Str::limit(__(get_option('become_instructor_video_title')), 100) }}</h3>
                        </div>

                        <div class="video-floating-img-wrap pe-2 position-relative">
                            <p>{{ Str::limit(get_option('become_instructor_video_subtitle'), 450) }}</p>
                        <!-- <img src="{{ getImageFile(get_option('become_instructor_video_logo')) }}" alt="video" class="position-absolute"> -->
                        </div>

                        <!-- section button start-->
                        <div class="col-12 section-btn">
                            <a href="{{ route('student.become-an-instructor') }}"
                               class="theme-btn theme-button1">{{ __('Become an Instructor') }} <i
                                    data-feather="arrow-right"></i></a>
                        </div>
                        <!-- section button end-->
                    </div>
                </div>
                <div class="col-md-6 col-lg-7 col-xl-6">
                    <div class="video-area-left position-relative d-flex align-items-center justify-content-center">
                        <img src="{{ getImageFile(get_option('become_instructor_video_preview_image')) }}" alt="video"
                             class="img-fluid">
                        <button type="button" class="play-btn position-absolute" data-bs-toggle="modal"
                                data-bs-target="#newVideoPlayerModal">
                            <img src="{{ asset('frontend/assets/img/icons-svg/play.svg') }}" alt="play">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Video Area End -->



    <!-- Customers Says/ testimonial Area Start -->
    <section class="customers-says-area gradient-bg p-0 {{ @$home->customer_says_area == 1 ? '' : 'd-none' }}">
        <div class="section-overlay section-t-space section-b-space">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <div class="section-heading-img"><img
                                    src="{{ getImageFile(get_option('customer_say_logo')) }}" alt="Our categories">
                            </div>
                            <h3 class="section-heading section-heading-light mx-auto">{{ __(get_option('customer_say_title')) }}</h3>
                        </div>
                    </div>
                </div>
                <div class="row testimonial-content-wrap">

                    <!-- Single Testimonial Item start-->
                    <div class="col-md-4">
                        <div class="testimonial-item tex-s-c">
                            <div class="testimonial-top-content d-flex align-items-center">
                            <!-- <div class="flex-shrink-0 quote-img-wrap">
                                    <img src="{{ asset('frontend/assets/img/icons-svg/quote.svg') }}" alt="quote">
                                </div> -->
                                <div class="flex-grow-1 ms-3 testimonial-content">
                                    <h6 class="font-16">{{ __(get_option('customer_say_first_name')) }}</h6>
                                    <p class="font-13 font-medium">{{ __(get_option('customer_say_first_position')) }}</p>
                                </div>
                            </div>
                            <div class="testimonial-bottom-content">
                                <h6 class="text-white">{{ __(get_option('customer_say_first_comment_title')) }}</h6>
                                <p class="font-17">{{ __(get_option('customer_say_first_comment_description') )}}</p>
                                @include('frontend.home.partial.customer-say-first-comment-rating')
                            </div>

                        </div>
                    </div>
                    <!-- Single Testimonial Item End-->

                    <!-- Single Testimonial Item start-->
                    <div class="col-md-4">
                        <div class="testimonial-item tex-s-c">
                            <div class="testimonial-top-content d-flex align-items-center">
                            <!-- <div class="flex-shrink-0 quote-img-wrap">
                                    <img src="{{ asset('frontend/assets/img/icons-svg/quote.svg') }}" alt="quote">
                                </div> -->
                                <div class="flex-grow-1 ms-3 testimonial-content">
                                    <h6 class="font-16">{{ __(get_option('customer_say_second_name')) }}</h6>
                                    <p class="font-13 font-medium">{{ __(get_option('customer_say_second_position')) }}</p>
                                </div>
                            </div>
                            <div class="testimonial-bottom-content">
                                <h6 class="text-white">{{ __(get_option('customer_say_second_comment_title')) }}</h6>
                                <p class="font-17">{{ __(get_option('customer_say_second_comment_description')) }}</p>
                                @include('frontend.home.partial.customer-say-second-comment-rating')
                            </div>

                        </div>
                    </div>
                    <!-- Single Testimonial Item End-->

                    <!-- Single Testimonial Item start-->
                    <div class="col-md-4">
                        <div class="testimonial-item tex-s-c">
                            <div class="testimonial-top-content d-flex align-items-center">
                            <!-- <div class="flex-shrink-0 quote-img-wrap">
                                    <img src="{{ asset('frontend/assets/img/icons-svg/quote.svg') }}" alt="quote">
                                </div> -->
                                <div class="flex-grow-1 ms-3 testimonial-content">
                                    <h6 class="font-16">{{ __(get_option('customer_say_third_name')) }}</h6>
                                    <p class="font-13 font-medium">{{ __(get_option('customer_say_third_position')) }}</p>
                                </div>
                            </div>
                            <div class="testimonial-bottom-content">
                                <h6 class="text-white">{{ __(get_option('customer_say_third_comment_title')) }}</h6>
                                <p class="font-17">{{ __(get_option('customer_say_third_comment_description')) }}</p>
                                @include('frontend.home.partial.customer-say-third-comment-rating')
                            </div>

                        </div>
                    </div>
                    <!-- Single Testimonial Item End-->

                </div>
            </div>
        </div>
    </section>
    <!-- Customers Says/ testimonial Area End -->

    <!-- Achievement Area Start -->
    <section class="achievement-area {{ @$home->achievement_area == 1 ? '' : 'd-none' }}">
        <div class="container">
            <div class="row achievement-content-area">
                <!-- Achievement Item start-->
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="achievement-item d-flex align-items-center tex-s-c">
                        <div class="flex-shrink-0 achievement-img-wrap">
                            <img src="{{ getImageFile(get_option('achievement_first_logo')) }}" alt="achievement">
                        </div>
                        <div class="flex-grow-1 ms-3 achievement-content">
                            <h6>{{ __(get_option('achievement_first_title')) }}</h6>
                            <p>{{ __(get_option('achievement_first_subtitle')) }}</p>
                        </div>
                    </div>
                </div>
                <!-- Achievement Item End-->

                <!-- Achievement Item start-->
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="achievement-item d-flex align-items-center tex-s-c">
                        <div class="flex-shrink-0 achievement-img-wrap">
                            <img src="{{ getImageFile(get_option('achievement_second_logo')) }}" alt="achievement">
                        </div>
                        <div class="flex-grow-1 ms-3 achievement-content">
                            <h6>{{ __(get_option('achievement_second_title')) }}</h6>
                            <p>{{ __(get_option('achievement_second_subtitle')) }}</p>
                        </div>
                    </div>
                </div>
                <!-- Achievement Item End-->

                <!-- Achievement Item start-->
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="achievement-item d-flex align-items-center tex-s-c">
                        <div class="flex-shrink-0 achievement-img-wrap">
                            <img src="{{ getImageFile(get_option('achievement_third_logo')) }}" alt="achievement">
                        </div>
                        <div class="flex-grow-1 ms-3 achievement-content">
                            <h6>{{ __(get_option('achievement_third_title')) }}</h6>
                            <p>{{ __(get_option('achievement_third_subtitle')) }}</p>
                        </div>
                    </div>
                </div>
                <!-- Achievement Item End-->

                <!-- Achievement Item start-->
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="achievement-item d-flex align-items-center tex-s-c">
                        <div class="flex-shrink-0 achievement-img-wrap">
                            <img src="{{ getImageFile(get_option('achievement_four_logo')) }}" alt="achievement">
                        </div>
                        <div class="flex-grow-1 ms-3 achievement-content">
                            <h6>{{ __(get_option('achievement_four_title')) }}</h6>
                            <p>{{ __(get_option('achievement_four_subtitle')) }}</p>
                        </div>
                    </div>
                </div>
                <!-- Achievement Item End-->
            </div>
        </div>
    </section>
    <!-- Achievement Area End -->



    <!-- Course Instructor and Support Area Start -->
    <section
        class="course-instructor-support-area bg-light section-t-space {{ @$home->instructor_support_area == 1 ? '' : 'd-none' }}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h3 class="section-heading">{{ __(@$aboutUsGeneral->instructor_support_title) }}</h3>
                        <p class="section-sub-heading">{{ __(@$aboutUsGeneral->instructor_support_subtitle) }}</p>
                    </div>
                </div>
            </div>
            <div class="row course-instructor-support-wrap">
            @foreach($instructorSupports as $instructorSupport)
                <!-- Instructor Support Item start-->
                    <div class="col-md-4">
                        <div class="instructor-support-item bg-white radius-3 text-center">
                            <div class="instructor-support-img-wrap">
                                <img src="{{ getImageFile($instructorSupport->image_path) }}" alt="support">
                            </div>
                            <h6>{{ __($instructorSupport->title) }}</h6>
                            <p>{{ __($instructorSupport->subtitle) }} </p>
                            <a href="{{ $instructorSupport->button_link ?? '#' }}"
                               class="theme-btn theme-button1 theme-button3">{{ __($instructorSupport->button_name) }}
                                <i data-feather="arrow-right"></i></a>
                        </div>
                    </div>
                    <!-- Instructor Support Item End-->
                @endforeach
            </div>

            <!-- Client Logo Area start-->
            <div class="row client-logo-area">
                @foreach($clients as $client)
                    <div class="col">
                        <div class="client-logo-item text-center">
                            <img src="{{ getImageFile($client->image_path) }}" alt="{{ $client->name }}">
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Client Logo Area end-->
        </div>
    </section>
    <!-- Course Instructor and Support Area End -->

    @include('frontend.home.partial.consultation-booking-schedule-modal')

    <!-- New Video Player Modal Start-->
    <div class="modal fade VideoTypeModal" id="newVideoPlayerModal" tabindex="-1" aria-labelledby="newVideoPlayerModal"
         aria-hidden="true">

        <div class="modal-header border-bottom-0">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span class="iconify"
                                                                                                     data-icon="akar-icons:cross"></span>
            </button>
        </div>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="video-player-area">
                        <!-- HTML 5 Video -->
                        <video id="player" playsinline controls
                               data-poster="{{ getImageFile(get_option('become_instructor_video_preview_image')) }}"
                               controlsList="nodownload">
                            <source src="{{ getVideoFile(get_option('become_instructor_video')) }}" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- New Video Player Modal End-->
@endsection

@push('style')
    <!-- Video Player css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/video-player/plyr.css') }}">
@endpush

@push('script')
    <!--Hero text effect-->
    <script src="{{ asset('frontend/assets/js/hero-text-effect.js') }}"></script>

    <script src="{{ asset('frontend/assets/js/course/addToCart.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/course/addToWishlist.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/custom/booking.js') }}"></script>

    <!-- Video Player js -->
    <script src="{{ asset('frontend/assets/vendor/video-player/plyr.js') }}"></script>
    <script>
        const zai_player = new Plyr('#player');

        // for slider
        class CutSlider {
            constructor(element) {
                this.slider = element;
                this.animationSpeed = parseInt(element.dataset.animationspeed);
                this.nextButton = this.slider.querySelector(".slider__button--next");
                this.prevButton = this.slider.querySelector(".slider__button--prev");
                this.slides = this.slider.querySelectorAll(".slider__slide");
                this.currentSlide = 0;
                this.setZindex();
                this.nextButton.addEventListener("click", this.next.bind(this));
                this.prevButton.addEventListener("click", this.prev.bind(this));
            }

            next(event) {
                event.preventDefault();
                const slide = this.slides[this.currentSlide];
                slide.slideobject = {};
                this.currentSlide++;
                if (this.currentSlide === this.slides.length) {
                    this.currentSlide = 0;
                }
                this.setZindex();
                this.cloneSlide(slide);
                this.nextTransition(slide);
                this.endTransition(slide);
            }

            prev(event) {
                event.preventDefault();
                const slide = this.slides[this.currentSlide];
                slide.slideobject = {};
                if (this.currentSlide != 0) {
                    this.currentSlide--;
                }
                this.setZindex();
                this.cloneSlide(slide);
                this.nextTransition(slide);
                this.endTransition(slide);
            }

            cloneSlide(currentSlide) {
                currentSlide.slideobject.wrapper = document.createElement("div");
                currentSlide.slideobject.slideWrapperTop = document.createElement("div");
                currentSlide.slideobject.slideWrapperBottom = document.createElement("div");
                currentSlide.slideobject.copy = currentSlide.cloneNode(true);
                currentSlide.slideobject.wrapper.classList.add("slider__slide");
                currentSlide.slideobject.wrapper.classList.add("slider__slide--parent");
                currentSlide.slideobject.slideWrapperTop.classList.add(
                    "slider__slide--child",
                    "slider__slide"
                );
                currentSlide.slideobject.slideWrapperBottom.classList.add(
                    "slider__slide--child",
                    "slider__slide"
                );
                currentSlide.slideobject.wrapper.style.zIndex =
                    30 + this.slides.length - this.currentSlide;
                currentSlide.slideobject.slideWrapperTop.style.transition = `all ${
                    this.animationSpeed / 1000
                }s ease`;
                currentSlide.slideobject.slideWrapperBottom.style.transition = `all ${
                    this.animationSpeed / 1000
                }s ease`;
                currentSlide.after(currentSlide.slideobject.wrapper);
                currentSlide.slideobject.wrapper.appendChild(currentSlide);
                currentSlide.after(currentSlide.slideobject.copy);
                currentSlide.classList.add("slider__slide--inner");
                currentSlide.slideobject.copy.classList.add("slider__slide--inner");
                currentSlide.slideobject.copy.after(
                    currentSlide.slideobject.slideWrapperTop
                );
                currentSlide.slideobject.slideWrapperTop.after(
                    currentSlide.slideobject.slideWrapperBottom
                );
                currentSlide.slideobject.slideWrapperTop.appendChild(currentSlide);
                currentSlide.slideobject.slideWrapperBottom.appendChild(
                    currentSlide.slideobject.copy
                );
            }

            nextTransition(currentSlide) {
                setTimeout(() => {
                    currentSlide.slideobject.slideWrapperTop.classList.add("anim");
                    currentSlide.slideobject.slideWrapperBottom.classList.add("anim");
                }, 100);
            }

            endTransition(currentSlide) {
                setTimeout(() => {
                    currentSlide.slideobject.wrapper.after(currentSlide);
                    currentSlide.classList.remove("slider__slide--inner");
                    currentSlide.slideobject.wrapper.remove();
                    currentSlide.slideobject = {};
                }, this.animationSpeed);
            }

            setZindex() {
                this.nextSlide = this.currentSlide + 1;

                if (this.nextSlide === this.slides.length) {
                    this.nextSlide = 0;
                }


                this.slides.forEach((slide, id) => {
                    if (id === this.currentSlide) {
                        slide.style.zIndex = 20;
                        return;
                    }
                    if (id === this.nextSlide) {
                        slide.style.zIndex = 10;
                        return;
                    }
                    slide.style.zIndex = 1;
                });
                if (this.currentSlide === 0) {
                    this.prevButton.disabled = true;
                } else {
                    this.prevButton.disabled = false;

                }
                if (this.currentSlide === this.slides.length) {
                    this.nextButton.disabled = true;
                } else {
                    this.nextButton.disabled = false;
                }
                console.log(this.currentSlide);

            }
        }

        new CutSlider(document.querySelector(".slider"));
    </script>
    <!-- Video Player js -->
@endpush
