@extends('frontend.layouts.app')

@section('content')

    <!-- Header Start -->
    <div class="slider" data-animationspeed="2500">
        <div class="slider__slides">
            <!-- slider item  -->
            <div class="slider__slide">
                <img src="{{ getImageFile(@$home->banner_image) }}">
                <div class="slider__slide-text">
                    <p>
                        @foreach(@$home->banner_mini_words_title ?? [] as $banner_mini_word)
                            <span>{{ __($banner_mini_word) }}</span>
                        @endforeach
                    </p>
                    <p style="margin: 20px 0px;">{{ __(@$home->banner_first_line_title) }}</p>
                    <p>
                        {{ __(@$home->banner_second_line_title) }}&nbsp;
                        @foreach(@$home->banner_second_line_changeable_words ?? [] as $banner_second_line_changeable_word)
                            <span class="word">{{ __($banner_second_line_changeable_word) }}</span>
                        @endforeach
                    </p>
                    <p>
                        {{ __(@$home->banner_third_line_title) }}
                    </p>
                    <p>
                        {{ __(@$home->banner_subtitle) }}
                    </p>
                    @if(!get_option('private_mode') || !auth()->guest())
                        <a  style="margin: 20px 0px;" href="{{ route('courses') }}" class="theme-btn theme-button1">{{ __('Browse Course') }} <i data-feather="arrow-right"></i></a>
                    @endif
                </div>
            </div>
            <!-- slider item  -->
            <div class="slider__slide">
                <img src="{{ asset('frontend/assets/img/daeem/1.png') }}">
                <div class="slider__slide-text">
                    <p>
                        @foreach(@$home->banner_mini_words_title ?? [] as $banner_mini_word)
                            <span>{{ __($banner_mini_word) }}</span>
                        @endforeach
                    </p>
                    <p style="margin: 20px 0px;">{{ __(@$home->banner_first_line_title) }}</p>
                    <p>
                        {{ __(@$home->banner_second_line_title) }}&nbsp;
                        @foreach(@$home->banner_second_line_changeable_words ?? [] as $banner_second_line_changeable_word)
                            <span class="word">{{ __($banner_second_line_changeable_word) }}</span>
                        @endforeach
                    </p>
                    <p>
                        {{ __(@$home->banner_third_line_title) }}
                    </p>
                    <p>
                        {{ __(@$home->banner_subtitle) }}
                    </p>
                    @if(!get_option('private_mode') || !auth()->guest())
                        <a  style="margin: 20px 0px;" href="{{ route('courses') }}" class="theme-btn theme-button1">{{ __('Browse Course') }} <i data-feather="arrow-right"></i></a>
                    @endif
                </div>
            </div>
            <!-- slider item  -->
            <div class="slider__slide">
                <img src="{{ asset('frontend/assets/img/daeem/2.png') }}">
                <div class="slider__slide-text">
                    <p>
                        @foreach(@$home->banner_mini_words_title ?? [] as $banner_mini_word)
                            <span>{{ __($banner_mini_word) }}</span>
                        @endforeach
                    </p>
                    <p style="margin: 20px 0px;">{{ __(@$home->banner_first_line_title) }}</p>
                    <p>
                        {{ __(@$home->banner_second_line_title) }}&nbsp;
                        @foreach(@$home->banner_second_line_changeable_words ?? [] as $banner_second_line_changeable_word)
                            <span class="word">{{ __($banner_second_line_changeable_word) }}</span>
                        @endforeach
                    </p>
                    <p>
                        {{ __(@$home->banner_third_line_title) }}
                    </p>
                    <p>
                        {{ __(@$home->banner_subtitle) }}
                    </p>
                    @if(!get_option('private_mode') || !auth()->guest())
                        <a  style="margin: 20px 0px;" href="{{ route('courses') }}" class="theme-btn theme-button1">{{ __('Browse Course') }} <i data-feather="arrow-right"></i></a>
                    @endif
                </div>
            </div>
        </div>
        <button href="#" class="slider__button slider__button--next"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M11.3 19.3q-.275-.275-.288-.7q-.012-.425.263-.7l4.9-4.9H5q-.425 0-.713-.288Q4 12.425 4 12t.287-.713Q4.575 11 5 11h11.175l-4.9-4.9q-.275-.275-.263-.7q.013-.425.288-.7q.275-.275.7-.275q.425 0 .7.275l6.6 6.6q.15.125.213.312q.062.188.062.388t-.062.375q-.063.175-.213.325l-6.6 6.6q-.275.275-.7.275q-.425 0-.7-.275Z"/></svg></button>
         <button href="#" class="slider__button slider__button--prev"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M11.3 19.3q-.275-.275-.288-.7q-.012-.425.263-.7l4.9-4.9H5q-.425 0-.713-.288Q4 12.425 4 12t.287-.713Q4.575 11 5 11h11.175l-4.9-4.9q-.275-.275-.263-.7q.013-.425.288-.7q.275-.275.7-.275q.425 0 .7.275l6.6 6.6q.15.125.213.312q.062.188.062.388t-.062.375q-.063.175-.213.325l-6.6 6.6q-.275.275-.7.275q-.425 0-.7-.275Z"/></svg></button>

    </div>
    <!-- <header class="hero-area gradient-bg position-relative">
        <div class="section-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-7 col-lg-5">
                        <div class="hero-content">
                            <h6 class="come-for-learn-text">
                                @foreach(@$home->banner_mini_words_title ?? [] as $banner_mini_word)
        <span>{{ __($banner_mini_word) }}</span>
                                @endforeach
        </h6>
        <div class="text">
            <h1 class="hero-heading">{{ __(@$home->banner_first_line_title) }}</h1>
                                <h1 class="hero-heading">
                                    <span class="main-middle-text">{{ __(@$home->banner_second_line_title) }}</span>
                                    @foreach(@$home->banner_second_line_changeable_words ?? [] as $banner_second_line_changeable_word)
        <span class="word">{{ __($banner_second_line_changeable_word) }}</span>
                                    @endforeach
        </h1>
        <h1 class="hero-heading hero-heading-last-word">{{ __(@$home->banner_third_line_title) }}</h1>
                            </div>
                            <p>{{ __(@$home->banner_subtitle) }} </p>
                            @if(!get_option('private_mode') || !auth()->guest())
        <div class="hero-btns">
            <a href="{{ route('courses') }}" class="theme-btn theme-button1">{{ __('Browse Course') }} <i data-feather="arrow-right"></i></a>
                            </div>
                            @endif
        </div>
    </div>
    <div class="col-12 col-md-5 col-lg-7">
        <div class="hero-right-side">
            <img src="{{ getImageFile(@$home->banner_image) }}" alt="hero-img" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header> -->
    <!-- Header End -->

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
        <!-- <section class="courses-area section-t-space section-b-85-space {{ @$home->courses_area == 1 ? '' : 'd-none' }}">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <div class="section-left-title-with-btn d-flex justify-content-between align-items-end">
                        <div class="section-title section-title-left d-flex align-items-start">
                            <div class="section-heading-img"><img src="{{ getImageFile(get_option('course_logo')) }}" alt="Course"></div>
                            <div>
                                <h3 class="section-heading">{{ __(get_option('course_title')) }}</h3>
                                <p class="section-sub-heading">{{ __(get_option('course_subtitle')) }}</p>
                            </div>
                        </div>

                        <div class="course-tab-nav-wrap d-flex justify-content-between">
                            <ul class="nav nav-tabs tab-nav-list border-0" id="myTab" role="tablist">
                                @foreach($featureCategories as $key => $category)
            <li class="nav-item" role="presentation">
                <a class="nav-link {{ $key == 0 ? 'active' : '' }}" id="{{ $category->slug }}-tab" data-bs-toggle="tab" href="#{{ $category->slug }}" role="tab"
                                           aria-controls="{{ $category->slug }}" aria-selected="{{ $key == 0 ? 'true' : 'false' }}">{{ __($category->name) }}</a>
                                    </li>
                                @endforeach
            </ul>
        </div>

    </div>

</div>
</div>

<div class="tab-content" id="myTabContent">
@foreach($featureCategories as $key => $category)
            <div class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}" id="{{ $category->slug }}" role="tabpanel" aria-labelledby="{{ $category->slug }}-tab">
                            <div class="course-slider-items owl-carousel owl-theme">
                                @foreach($category->courses as $course)
                @php
                    $userRelation = getUserRoleRelation($course->user);
                @endphp
                    <div class="col-12 col-sm-4 col-lg-3 w-100">
@include('frontend.partials.course')
                    </div>
@endforeach
                </div>
            </div>
@endforeach
            </div>
        </div>
    </section> -->

        <!-- ********************* A Broad Selection Of Courses ********************* -->
        <section class="courses-area section-t-space section-b-85-space {{ @$home->courses_area == 1 ? '' : 'd-none' }}">
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
                                        <a class="nav-link {{ $key == 0 ? 'active' : '' }}" id="{{ $category->slug }}-tab" data-bs-toggle="tab" href="#{{ $category->slug }}" role="tab"
                                           aria-controls="{{ $category->slug }}" aria-selected="{{ $key == 0 ? 'true' : 'false' }}">{{ __($category->name) }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="development" role="tabpanel" aria-labelledby="development-tab">
                        <div class="course-slider-items owl-carousel owl-theme owl-loaded owl-drag">

                            <div class="owl-stage-outer">
                                <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2006px;">
                                    <!-- ***************** slider item ***************** -->
                                    <div class="owl-item active" style="width: 256.5px; margin-right: 30px;">
                                        <div class="col-12 col-sm-4 col-lg-3 w-100">
                                            <div class="card course-item border-0 radius-3 bg-white">
                                                <div class="course-img-wrap overflow-hidden">
                                                    <a href="https://lmszai.zainikthemes.com/course-details/javascript-understanding-the-weird-parts"><img src="https://lmszai.zainikthemes.com/uploads/course/1655545018-UOg3MEPfM6.jpg" alt="course" class="img-fluid"></a>
                                                    <div class="course-item-hover-btns position-absolute">
<span class="course-item-btn addToWishlist" data-course_id="1" data-route="https://lmszai.zainikthemes.com/student/add-to-wishlist" title="Add to Wishlist">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
</span>
                                                        <span class="course-item-btn addToCart" data-course_id="1" data-route="https://lmszai.zainikthemes.com/student/add-to-cart" title="Add to Cart">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
</span>
                                                    </div>
                                                </div>
                                                <div class="card-body tex-s-c">
                                                    <h5 class="card-title course-title"><a href="https://lmszai.zainikthemes.com/course-details/javascript-understanding-the-weird-parts">JavaScript: Understanding the Weird Part...</a></h5>
                                                    <div class="course-item-bottom">
                                                        <div class="course-rating d-flex align-items-center rating-list">
                                                            <span class="font-medium font-14 me-2">5.00</span>
                                                            <ul class="rating-list d-flex align-items-center me-2">
                                                                <li class="star-full"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--bi" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16" data-icon="bi:star-fill"><path fill="currentColor" d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327l4.898.696c.441.062.612.636.282.95l-3.522 3.356l.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path></svg></li>
                                                                <li class="star-full"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--bi" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16" data-icon="bi:star-fill"><path fill="currentColor" d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327l4.898.696c.441.062.612.636.282.95l-3.522 3.356l.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path></svg></li>
                                                                <li class="star-full"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--bi" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16" data-icon="bi:star-fill"><path fill="currentColor" d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327l4.898.696c.441.062.612.636.282.95l-3.522 3.356l.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path></svg></li>
                                                                <li class="star-full"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--bi" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16" data-icon="bi:star-fill"><path fill="currentColor" d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327l4.898.696c.441.062.612.636.282.95l-3.522 3.356l.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path></svg></li>
                                                                <li class="star-full"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--bi" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16" data-icon="bi:star-fill"><path fill="currentColor" d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327l4.898.696c.441.062.612.636.282.95l-3.522 3.356l.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path></svg></li>
                                                            </ul>
                                                            <span class="rating-count font-14">(2)</span>
                                                        </div>
                                                        <div class="instructor-bottom-item font-14 font-semi-bold">
                                                            <div class="instructor-bottom-item font-14 font-semi-bold">Price:
                                                                <span class="color-hover">
50.00 $
</span>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div></div>

                                </div></div>


                            <div class="owl-nav"><button type="button" role="presentation" class="owl-prev disabled"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--la" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32" data-icon="la:angle-left"><path fill="currentColor" d="m19.031 4.281l-11 11l-.687.719l.687.719l11 11l1.438-1.438L10.187 16L20.47 5.719z"></path></svg></button><button type="button" role="presentation" class="owl-next"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--la" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32" data-icon="la:angle-right"><path fill="currentColor" d="M12.969 4.281L11.53 5.72L21.812 16l-10.28 10.281l1.437 1.438l11-11l.687-.719l-.687-.719z"></path></svg></button></div>

                            <div class="owl-dots disabled"></div></div>
                    </div>
                    <div class="tab-pane fade" id="business" role="tabpanel" aria-labelledby="business-tab">
                        <div class="course-slider-items owl-carousel owl-theme owl-loaded owl-drag">
                            <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s;">

                                </div></div><div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev disabled"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--la" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32" data-icon="la:angle-left"><path fill="currentColor" d="m19.031 4.281l-11 11l-.687.719l.687.719l11 11l1.438-1.438L10.187 16L20.47 5.719z"></path></svg></button><button type="button" role="presentation" class="owl-next disabled"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--la" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32" data-icon="la:angle-right"><path fill="currentColor" d="M12.969 4.281L11.53 5.72L21.812 16l-10.28 10.281l1.437 1.438l11-11l.687-.719l-.687-.719z"></path></svg></button></div><div class="owl-dots disabled"></div></div>
                    </div>
                    <div class="tab-pane fade" id="it-software" role="tabpanel" aria-labelledby="it-software-tab">
                        <div class="course-slider-items owl-carousel owl-theme owl-loaded owl-drag">
                        </div>
                    </div>
                </div>
        </section>
    <!-- ********************* A Traning programs ********************* -->
    <section class="courses-area section-t-space section-b-85-space {{ @$home->courses_area == 1 ? '' : 'd-none' }}">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-left-title-with-btn d-flex justify-content-between align-items-end">
                            <div class="section-title section-title-left d-flex align-items-start">
                                <div class="section-heading-img">
                                    <img src="{{ getImageFile(get_option('course_logo')) }}" alt="Course"></div>
                                <div>
                                    <h3 class="section-heading">A Traning programs </h3>
                                    <p class="section-sub-heading">{{ __(get_option('course_subtitle')) }}</p>
                                </div>

                            </div>
                            <a href="{{ route('consultationInstructorList') }}" class="theme-btn theme-button2 theme-button3 ">{{ __('View All') }} <i data-feather="arrow-right"></i></a>


                        </div>

                    </div>
                </div>
<div class="tab-content">
    <div class="tab-pane fade active show">
        <div class="course-slider-items owl-carousel owl-theme owl-loaded owl-drag">

            <div class="owl-stage-outer">
                <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2006px;">
                    <!-- ***************** slider item ***************** -->
                    <div class="owl-item active" style="width: 256.5px; margin-right: 30px;">
                    <div class="card-container">
      <a href="/" class="hero-image-container">
        <img class="hero-image" src="https://lmszai.zainikthemes.com/uploads/course/1655545018-UOg3MEPfM6.jpg" alt="Spinning glass cube"/>
      </a>
      <main class="main-content">
        <h1><a href="#">Traning programs</a></h1>
        <div class="course-rating d-flex align-items-center rating-list">
                                                            <span class="font-medium font-14 me-2">5.00</span>
                                                            <ul class="rating-list d-flex align-items-center me-2">
                                                                <li class="star-full"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--bi" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16" data-icon="bi:star-fill"><path fill="currentColor" d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327l4.898.696c.441.062.612.636.282.95l-3.522 3.356l.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path></svg></li>
                                                                <li class="star-full"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--bi" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16" data-icon="bi:star-fill"><path fill="currentColor" d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327l4.898.696c.441.062.612.636.282.95l-3.522 3.356l.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path></svg></li>
                                                                <li class="star-full"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--bi" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16" data-icon="bi:star-fill"><path fill="currentColor" d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327l4.898.696c.441.062.612.636.282.95l-3.522 3.356l.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path></svg></li>
                                                                <li class="star-full"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--bi" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16" data-icon="bi:star-fill"><path fill="currentColor" d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327l4.898.696c.441.062.612.636.282.95l-3.522 3.356l.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path></svg></li>
                                                                <li class="star-full"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--bi" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16" data-icon="bi:star-fill"><path fill="currentColor" d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327l4.898.696c.441.062.612.636.282.95l-3.522 3.356l.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path></svg></li>
                                                            </ul>
                                                            <span class="rating-count font-14">(2)</span>
                                                        </div>
        <div class="flex-row">
          <div class="coin-base">
            <span class="m-1">Price:</span>
            <h2>50.00 $</h2>
          </div>
          <div class="time-left">
            <img src="https://i.postimg.cc/prpyV4mH/clock-selection-no-bg.png" alt="clock" class="small-image"/>
            <p>3 days left</p>
          </div>
        </div>
      </main>
    </div>
                                    </div>



                                </div></div>


                            <div class="owl-nav"><button type="button" role="presentation" class="owl-prev disabled"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--la" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32" data-icon="la:angle-left"><path fill="currentColor" d="m19.031 4.281l-11 11l-.687.719l.687.719l11 11l1.438-1.438L10.187 16L20.47 5.719z"></path></svg></button><button type="button" role="presentation" class="owl-next"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--la" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32" data-icon="la:angle-right"><path fill="currentColor" d="M12.969 4.281L11.53 5.72L21.812 16l-10.28 10.281l1.437 1.438l11-11l.687-.719l-.687-.719z"></path></svg></button></div>

                            <div class="owl-dots disabled"></div></div>
                    </div>
                    <div class="tab-pane fade" id="business" role="tabpanel" aria-labelledby="business-tab">
                        <div class="course-slider-items owl-carousel owl-theme owl-loaded owl-drag">
                            <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s;">

                                </div></div><div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev disabled"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--la" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32" data-icon="la:angle-left"><path fill="currentColor" d="m19.031 4.281l-11 11l-.687.719l.687.719l11 11l1.438-1.438L10.187 16L20.47 5.719z"></path></svg></button><button type="button" role="presentation" class="owl-next disabled"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--la" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32" data-icon="la:angle-right"><path fill="currentColor" d="M12.969 4.281L11.53 5.72L21.812 16l-10.28 10.281l1.437 1.438l11-11l.687-.719l-.687-.719z"></path></svg></button></div><div class="owl-dots disabled"></div></div>
                    </div>
                    <div class="tab-pane fade" id="it-software" role="tabpanel" aria-labelledby="it-software-tab">
                        <div class="course-slider-items owl-carousel owl-theme owl-loaded owl-drag">
                        </div>
                    </div>
                </div>
        </section>
        <!-- Board Selection of Courses Area End -->
        @if(count($bundles) > 0)
            <!-- Latest Courses bundles Area Start -->
            <section class="courses-area courses-bundels-area section-t-space section-b-85-space bg-page {{ @$home->bundle_area == 1 ? '' : 'd-none' }}">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <!-- section-left-align-->
                            <div class="section-left-title-with-btn d-flex justify-content-between align-items-end">
                                <div class="section-title section-title-left d-flex align-items-start">
                                    <div class="section-heading-img"><img src="{{ getImageFile(get_option('bundle_course_logo')) }}" alt="Course"></div>
                                    <div>
                                        <h3 class="section-heading">{{ __(get_option('bundle_course_title')) }}</h3>
                                        <p class="section-sub-heading">{{ __(get_option('bundle_course_subtitle')) }}</p>
                                    </div>
                                </div>
                                <a href="{{ route('bundles') }}" class="theme-btn theme-button2 theme-button3">{{ __('View All') }} <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
                            </div>
                            <!-- section-left-align-->
                        </div>
                    </div>
                    <!-- Tab Content-->
                    <div class="tab-content" id="myTabContent1">
                        <div class="tab-pane fade show active" id="React" role="tabpanel" aria-labelledby="React-tab">
                            <div class="course-slider-items owl-carousel owl-theme">
                            @foreach($bundles as $bundle)
                                @php
                                    $relation = getUserRoleRelation($bundle->user)
                                @endphp
                                <!-- Course item start -->
                                    <div class="col-12 col-sm-4 col-lg-3 w-100">
                                        <div class="card course-item border-0 radius-3 bg-white">
                                            <div class="course-img-wrap overflow-hidden">
                                                <a href="{{ route('bundle-details', [$bundle->uuid, $bundle->slug]) }}"><img src="{{ getImageFile($bundle->image) }}" alt="course"
                                                                                                                             class="img-fluid"></a>
                                                <div class="course-item-hover-btns position-absolute">
                                        <span class="course-item-btn addToWishlist" data-bundle_id="{{ $bundle->id }}" data-route="{{ route('student.addToWishlist') }}"
                                              title="Add to Wishlist">
                                                    <i data-feather="heart"></i>
                                                </span>
                                                    <span class="course-item-btn addToCart" data-bundle_id="{{ $bundle->id }}" data-route="{{ route('student.addToCart') }}"
                                                          title="Add to Cart">
                                                    <i data-feather="shopping-bag"></i>
                                                </span>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title course-title"><a
                                                        href="{{ route('bundle-details', [$bundle->uuid, $bundle->slug]) }}">{{ Str::limit($bundle->name, 40) }}</a></h5>
                                                <p class="card-text instructor-name-certificate font-medium font-12">
                                                    <a href="{{ route('userProfile',$bundle->user->id) }}">{{ @$bundle->user->$relation->name }}</a>
                                                    @if(@$bundle->user->$relation->level_id != NULL)
                                                        | {{ @$bundle->user->$relation->ranking_level->name }}
                                                    @endif
                                                </p>
                                                <div class="course-item-bottom">
                                                    <div class="instructor-bottom-item font-14 font-semi-bold mb-15">{{ __('Courses') }}: <span
                                                            class="color-hover">{{ @$bundle->bundleCourses->count() }}</span></div>
                                                    <div class="instructor-bottom-item font-14 font-semi-bold">{{ __('Price') }}: <span class="color-hover">
                                                @if($currencyPlacement == 'after')
                                                                {{$bundle->price}} {{ $currencySymbol }}
                                                            @else
                                                                {{ $currencySymbol }} {{$bundle->price}}
                                                            @endif
                                            </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Course item end -->
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Latest Courses bundles Area End -->
        @endif
    @endif

    <!-- Our Top Categories Area Start -->
    <!-- <section class="top-categories-area p-0 {{ @$home->top_category_area == 1 ? '' : 'd-none' }}">
        <div class="section-overlay section-t-space section-b-space">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <div class="section-heading-img"><img src="{{ asset(get_option('top_category_logo')) }}" alt="Our categories"></div>
                            <h3 class="section-heading">{{ __(get_option('top_category_title')) }}</h3>
                            <p class="section-sub-heading">{{ __(get_option('top_category_subtitle')) }}</p>
                        </div>
                    </div>
                </div>
                <div class="row top-categories-content-wrap">


                    <section class="section-categories">
                        @foreach(@$firstFourCategories as $firstFourCategory)
                            <article>
                                <figure>
                                    <h2>{{ Str::limit($firstFourCategory->name, 20) }}</h2>
                                    <p>{{ @$firstFourCategory->courses->count() }} {{ __('Courses') }}</p>
                                </figure>
                                <img alt src="{{ getImageFile($firstFourCategory->image ?? 'frontend/assets/img/top-categories-icon/1.png') }}" alt="categories" />
                            </article>
                        @endforeach
                        @foreach(@$firstFourCategories as $firstFourCategory)
                            <article>
                                <figure>
                                    <h2>{{ Str::limit($firstFourCategory->name, 20) }}</h2>
                                    <p>{{ @$firstFourCategory->courses->count() }} {{ __('Courses') }}</p>
                                </figure>
                                <img alt src="{{ getImageFile($firstFourCategory->image ?? 'frontend/assets/img/top-categories-icon/1.png') }}" alt="categories" />
                            </article>
                        @endforeach
                        @foreach(@$firstFourCategories as $firstFourCategory)
                            <article>
                                <figure>
                                    <h2>{{ Str::limit($firstFourCategory->name, 20) }}</h2>
                                    <p>{{ @$firstFourCategory->courses->count() }} {{ __('Courses') }}</p>
                                </figure>
                                <img alt src="{{ getImageFile($firstFourCategory->image ?? 'frontend/assets/img/top-categories-icon/1.png') }}" alt="categories" />
                            </article>
                        @endforeach
                    </section> -->

                    <!-- Single Feature Item start-->
                <!-- <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="single-feature-item top-cat-item align-items-center tex-s-c">
                                <div class="flex-shrink-0 feature-img-wrap mar-s-au">
                                    <img src="{{ getImageFile($firstFourCategory->image ?? 'frontend/assets/img/top-categories-icon/1.png') }}" alt="categories">
                                </div>
                                <div class="flex-grow-1 mt-3 feature-content">
                                    <h6>{{ Str::limit($firstFourCategory->name, 20) }}</h6>
                                    <p>{{ @$firstFourCategory->courses->count() }} {{ __('Courses') }}</p>
                                </div>
                            </div>
                        </div>

                @if(!get_option('private_mode') || !auth()->guest())
                        <div class="col-12 text-center section-btn">
                            <a href="{{ route('courses') }}" class="theme-btn theme-button1">{{ __('All Categories') }} <i data-feather="arrow-right"></i></a>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>-->

    <!--  ****************** Coaching ******************-->
    @if(!get_option('private_mode') || !auth()->guest())
        @if(count($consultationInstructors) > 0)
            <!-- One to One Consultation Area Start -->
            <section class="courses-area courses-bundels-area one-to-one-consultation-area section-t-space section-b-85-space bg-page {{ @$home->consultation_area == 1 ? '' : 'd-none' }}">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <!-- section-left-align-->
                            <div class="section-left-title-with-btn d-flex justify-content-between align-items-end">
                                <div class="section-title section-title-left d-flex align-items-start">
                                    <div class="section-heading-img">
                                        <img src="{{ asset('uploads_demo/about_us_general/team-members-heading-img.png') }}" alt="Consultant">
                                    </div>
                                    <div>
                                        <h3 class="section-heading">{{ __('One to one consultation') }}</h3>
                                        <p class="section-sub-heading">{{ __('Consult with your favorite consultant!') }}</p>
                                    </div>
                                </div>
                                <a href="{{ route('consultationInstructorList') }}" class="theme-btn theme-button2 theme-button3 ">{{ __('View All') }} <i data-feather="arrow-right"></i></a>
                            </div>
                            <!-- section-left-align-->
                        </div>
                    </div>

                    <!-- One to one consultation Slider start -->
                    <div class="row">
                        <div class="col-12">
                            <!-- Consultation instructor slider items wrap -->
                            <div class="course-slider-items one-to-one-slider-items owl-carousel owl-theme">
                            @foreach($consultationInstructors as $instructorUser)
                                <!-- Course item start -->
                                    <div class="col-12 col-sm-4 col-lg-3 w-100 mt-0 mb-25">
                                        <x-frontend.instructor :user="$instructorUser" :type=INSTRUCTOR_CARD_TYPE_TWO />
                                    </div>
                                    <!-- Course item end -->
                                @endforeach
                            </div>
                            <!-- Consultation instructor slider items wrap -->
                        </div>
                    </div>
                    <!-- One to one consultation Slider end -->

                </div>
            </section>
            <!-- One to One Consultation Area End -->
        @endif
    @endif

    <!-- Subscription Start -->
    @if( @$home->subscription_show == 1 && get_option('subscription_mode'))
        @include('frontend.home.partial.subscription-home-list')
    @endif
    <!-- Subscription End -->

    <!--  ****************** Coaching ******************-->
    <!-- <section class="top-instructor-area section-t-space bg-white {{ @$home->instructor_area == 1 ? '' : 'd-none' }}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-left-title-with-btn d-flex justify-content-between align-items-end">
                        <div class="section-title section-title-left d-flex align-items-start">
                            <div class="section-heading-img"><img src="{{ getImageFile(get_option('top_instructor_logo')) }}" alt="Our categories"></div>
                            <div>
                                <h3 class="section-heading">{{ __(get_option('top_instructor_title')) }}</h3>
                                <p class="section-sub-heading">{{ __(get_option('top_instructor_subtitle')) }}</p>
                            </div>
                        </div>
                        <a href="{{ route('instructor') }}" class="theme-btn theme-button2 theme-button3">{{ __('View All Instructor') }} <i data-feather="arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="row top-instructor-content-wrap">
                @foreach ($instructors as $instructorUser)
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 mt-0 mb-25">
            <x-frontend.instructor :user="$instructorUser" :type=INSTRUCTOR_CARD_TYPE_ONE />
        </div>
@endforeach
        </div>
    </div>
</section> -->

    <section class="courses-area courses-bundels-area one-to-one-consultation-area section-t-space section-b-85-space bg-page {{ @$home->instructor_area == 1 ? '' : 'd-none' }}">
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
                        <a href="https://lmszai.zainikthemes.com/consultation-instructor-list " class="theme-btn theme-button2 theme-button3 mar1-s-au">{{ __('View All Instructor') }} <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-12">

                    <div class="course-slider-items one-to-one-slider-items owl-carousel owl-theme owl-loaded owl-drag">

                        <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 1s ease 0s; width: 1433px;">
                                <!-- ************************ item coach ************************ -->

                                <div class="owl-item active" style="width: 256.5px; margin-right: 30px;"><div class="col-12 col-sm-4 col-lg-3 w-100 mt-0 mb-25">
                                        <div class="card instructor-item search-instructor-item position-relative text-center border-0 p-30 px-3">
                                            <div class="search-instructor-img-wrap mb-15"><a href="{{ route('coash_details') }}">
                                                    <img src="https://lmszai.zainikthemes.com/uploads_demo/user/1.jpg" alt="instructor" class="fit-image rounded-circle"></a>
                                            </div>
                                            <div class="card-body p-0">
                                                <h6 class="card-title"><a href="{{ route('coash_details') }}">Johnny Depp</a>
                                                </h6>
                                                <p class="card-text instructor-designation font-medium mb-15">
                                                    PHP Developer
                                                    <span class="mx-2">||</span>Author Level 3</p>
                                                <div class="course-rating search-instructor-rating w-100 mb-15 d-inline-flex align-items-center justify-content-center">
                                                    <span class="font-medium font-14 me-2">5.0</span>
                                                    <div class="star-ratings" style="width: 83.3333px;">
                                                        <div class="fill-ratings" style="width: 20%">
                                                            <span>★★★★★</span>
                                                        </div>
                                                        <div class="empty-ratings">
                                                            <span>★★★★★</span>
                                                        </div>
                                                    </div>
                                                    <span class="rating-count font-14 ms-2">(2)</span>
                                                </div>
                                                <div class="search-instructor-bottom-item font-14 font-medium">
                                                    <div class="search-instructor-award-img d-inline-flex flex-wrap justify-content-center">
                                                        <img src="https://lmszai.zainikthemes.com/frontend/assets/img/ranking_badges/membership_1.png" title="1 Years of Membership" alt="1 Years of Membership" class="fit-image rounded-circle">
                                                        <img src="https://lmszai.zainikthemes.com/frontend/assets/img/ranking_badges/rank_3.png" title="Author Level 3" alt="Author Level 3" class="fit-image rounded-circle">
                                                        <img src="https://lmszai.zainikthemes.com/frontend/assets/img/ranking_badges/course_1.png" title="0 to 5 Course" alt="0 to 5 Course" class="fit-image rounded-circle">
                                                        <img src="https://lmszai.zainikthemes.com/frontend/assets/img/ranking_badges/student_1.png" title="0 to 10 Student" alt="0 to 10 Student" class="fit-image rounded-circle">
                                                        <img src="https://lmszai.zainikthemes.com/frontend/assets/img/ranking_badges/sale_1.png" title="0 to 10 Sold" alt="0 to 10 Sold" class="fit-image rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="search-instructor-price d-inline-flex align-items-center mb-15">
                                                    <div class="search-instructor-new-price font-medium mx-1">
                                                        50/Hour
                                                    </div>
                                                    <div class="search-instructor-old-price text-decoration-line-through color-gray font-13 font-medium mx-1">
                                                    </div>
                                                </div>
                                                <div class="w-100">
                                                    <button type="button" data-type="3" data-booking_instructor_user_id="2" data-hourly_fee="$ 50/h" data-hourly_rate="50" data-get_off_days_route="https://lmszai.zainikthemes.com/get-off-days/2" class="theme-btn theme-button1 theme-button3 w-100 bookSchedule" data-bs-toggle="modal" data-bs-target="#consultationBookingModal">Book Now
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div></div>

                            </div></div>
                        <div class="owl-nav"><button type="button" role="presentation" class="owl-prev disabled"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--la" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32" data-icon="la:angle-left"><path fill="currentColor" d="m19.031 4.281l-11 11l-.687.719l.687.719l11 11l1.438-1.438L10.187 16L20.47 5.719z"></path></svg></button><button type="button" role="presentation" class="owl-next"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--la" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32" data-icon="la:angle-right"><path fill="currentColor" d="M12.969 4.281L11.53 5.72L21.812 16l-10.28 10.281l1.437 1.438l11-11l.687-.719l-.687-.719z"></path></svg></button></div><div class="owl-dots disabled"></div></div>
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
                            <a href="{{ route('student.become-an-instructor') }}" class="theme-btn theme-button1">{{ __('Become an Instructor') }} <i
                                    data-feather="arrow-right"></i></a>
                        </div>
                        <!-- section button end-->
                    </div>
                </div>
                <div class="col-md-6 col-lg-7 col-xl-6">
                    <div class="video-area-left position-relative d-flex align-items-center justify-content-center">
                        <img src="{{ getImageFile(get_option('become_instructor_video_preview_image')) }}" alt="video" class="img-fluid">
                        <button type="button" class="play-btn position-absolute" data-bs-toggle="modal" data-bs-target="#newVideoPlayerModal">
                            <img src="{{ asset('frontend/assets/img/icons-svg/play.svg') }}" alt="play">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Video Area End -->

    <!-- Saas Plan Start -->
    @if( @$home->saas_show == 1 && get_option('saas_mode'))
        @include('frontend.home.partial.saas-home-list')
    @endif
    <!-- Saas Plan End -->

    <!-- Customers Says/ testimonial Area Start -->
    <section class="customers-says-area gradient-bg p-0 {{ @$home->customer_says_area == 1 ? '' : 'd-none' }}">
        <div class="section-overlay section-t-space section-b-space">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <div class="section-heading-img"><img src="{{ getImageFile(get_option('customer_say_logo')) }}" alt="Our categories"></div>
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

    <!-- FAQ Area Start -->
    <!-- <section class="faq-area home-page-faq-area section-t-space {{ @$home->faq_area == 1 ? '' : 'd-none' }}">
        <div class="container">
            <div class="faq-area-shape"></div>
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-6 col-xl-5">
                    <div class="section-title">
                        <h3 class="section-heading">{{ __(get_option('faq_title')) }}</h3>
                        <p class="section-sub-heading">{{ __(get_option('faq_subtitle')) }}</p>
                    </div>
                    <div class="accordion" id="accordionExample">
                        @foreach($faqQuestions as $key => $faqQuestion)
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading_{{ $key }}">
                                    <button class="accordion-button font-medium font-18 {{ $key == 0 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse_{{ $key }}"
                                            aria-expanded="{{ $key == 0 ? 'true' : 'false' }}" aria-controls="collapse_{{ $key }}">
                                        {{ $key+1 }}. {{ __($faqQuestion->question) }}
            </button>
        </h2>
        <div id="collapse_{{ $key }}" class="accordion-collapse collapse {{ $key == 0 ? 'show' : '' }}" aria-labelledby="heading_{{ $key }}"
                                     data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {{ __($faqQuestion->answer) }}
            </div>
        </div>
    </div>
@endforeach
        </div>
    </div>
    <div class="col-md-6 col-lg-6 col-xl-7">
        <div class="faq-area-right position-relative">
            <img src="{{ getImageFile(get_option('faq_image')) }}" alt="faq" class="img-fluid">
                        <div class="still-no-luck radius-3 bg-white position-absolute">
                            <h6>{{ __(get_option('faq_image_title')) }}</h6>
                            <p>{{ __('Then feel free to') }} <a href="{{ route('contact') }}"
                                                                    class="text-decoration-underline color-heading">{{ __('Contact With Us') }}</a>,
                                {{ __('We are 24/7 for you') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- FAQ Area End -->

    <!-- Course Instructor and Support Area Start -->
    <section class="course-instructor-support-area bg-light section-t-space {{ @$home->instructor_support_area == 1 ? '' : 'd-none' }}">
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
                            <a href="{{ $instructorSupport->button_link ?? '#' }}" class="theme-btn theme-button1 theme-button3">{{ __($instructorSupport->button_name) }} <i data-feather="arrow-right"></i></a>
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
    <div class="modal fade VideoTypeModal" id="newVideoPlayerModal" tabindex="-1" aria-labelledby="newVideoPlayerModal" aria-hidden="true">

        <div class="modal-header border-bottom-0">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span class="iconify" data-icon="akar-icons:cross"></span></button>
        </div>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="video-player-area">
                        <!-- HTML 5 Video -->
                        <video id="player" playsinline controls data-poster="{{ getImageFile(get_option('become_instructor_video_preview_image')) }}" controlsList="nodownload">
                            <source src="{{ getVideoFile(get_option('become_instructor_video')) }}" type="video/mp4" >
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
                if(this.currentSlide === this.slides.length){
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
                if(this.currentSlide != 0){
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
                }
                else{
                    this.prevButton.disabled = false;

                }
                if (this.currentSlide === this.slides.length) {
                    this.nextButton.disabled = true;
                }
                else{
                    this.nextButton.disabled = false;
                }
                console.log(this.currentSlide);

            }
        }
        new CutSlider(document.querySelector(".slider"));
    </script>
    <!-- Video Player js -->
@endpush
