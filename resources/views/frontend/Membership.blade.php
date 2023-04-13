@extends('frontend.layouts.app')

@section('content')
    <!-- Page Header Start -->
    <header class="page-banner-header gradient-bg position-relative">
        <div class="section-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12">
                        <div class="page-banner-content text-center" style="display: flex;
                                    flex-direction: column;
                                    justify-content: center;
                                    align-items: center;">
                            <div style="position: relative;">
                                <img style="width:180px;position: absolute;left: -55px;top: -40px;"
                                     src="{{ asset('frontend/assets/img/daeem/daeem-ha2.png') }}" alt="">
                                <h3 class="page-banner-heading text-white pb-15">{{ __('Members') }}</h3>

                                <!-- Breadcrumb Start-->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item font-14"><a href="{{ url('/') }}">{{__('Home')}}</a>
                                        </li>
                                        <li class="breadcrumb-item font-14 active"
                                            aria-current="page">{{ __('Members') }}</li>
                                    </ol>
                                </nav>
                            </div>
                            <img style="width:180px;margin-top: -40px;"
                                 src="{{ asset('frontend/assets/img/daeem/daeem-ha.png') }}" alt="">
                            <!-- Breadcrumb End-->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Page Header End -->
    <section class="tab-section section-t-space">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item na-item" role="presentation">
                    <button class="nav-link na-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                            type="button" role="tab" aria-controls="home" aria-selected="true">عضوية المنظمات
                    </button>
                </li>
                <li class="nav-item na-item" role="presentation">
                    <button class="nav-link na-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                            type="button" role="tab" aria-controls="profile" aria-selected="false">عضوية كوتش
                    </button>
                </li>
                <li class="nav-item na-item" role="presentation">
                    <button class="nav-link na-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                            type="button" role="tab" aria-controls="contact" aria-selected="false">عضوية مستفيد
                    </button>
                </li>
            </ul>
            <div class="tab-content section-t-space" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"
                     style="padding-top: 200px;">
                    <!-- *************** item **************** -->
                    <section class="course-single-details-area before-login-purchase-course-details">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-8">
                                    <div class="course-single-details-left-content bg-white">

                                        <div
                                            class="course-tab-nav-wrap course-details-tab-nav-wrap d-flex justify-content-between">
                                            <ul class="nav nav-tabs tab-nav-list border-0" id="myTab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link active" id="Overview-tab" data-bs-toggle="tab"
                                                       href="#Overview" role="tab" aria-controls="Overview"
                                                       aria-selected="true">مميزاتها عضوية المنظمات :</a>
                                                </li>
                                            </ul>
                                        </div>


                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="Overview" role="tabpanel"
                                                 aria-labelledby="Overview-tab">
                                                <div class="overview-content">
                                                    <p>
                                                    <ul>
                                                        <li>
                                                            1. اضافة شعار المؤسسة كأحد شركاء النجاح للمنصة.
                                                        </li>
                                                        <li>
                                                            2. دعم حسابات المؤسسة من خلال حسابات المنصة.
                                                        </li>
                                                        <li>
                                                            3. تقديم إثراءات لمنسوبي المؤسسة من انتاج المنصة التربوي
                                                            والتعليمي
                                                        </li>
                                                        <li>
                                                            4. تقديم خطة لنشر ثقافة الكوتشينج
                                                        </li>
                                                        <li>
                                                            5. تصميم برامج التطوير المهني منسوبي المدرسة وفق احتياجاتهم
                                                        </li>
                                                        <li>
                                                            6. تقديم خصم على البرامج النوعية للناشئة المنتسبين للمدرسة
                                                            وفق منهجيه الكوتشينج
                                                        </li>
                                                        <li>
                                                            7. تقديم ثلاث جلسات مجانية في الكوتشينج القيادي لمدير
                                                            المدرسة
                                                        </li>
                                                        <li>
                                                            8. تقديم جلسة اولي مجانية الاثنين منسوبي المدرسة
                                                        </li>
                                                        <li>
                                                            9. تخفيض جلسات الكوتشينج الشخصية لمنسوبي المدرسة
                                                        </li>
                                                    </ul>
                                                    </p>
                                                    <h6 class="mb-4 col-12 section-t-space">آخر الأعضاء</h6>
                                                    <div class="row">
                                                        <div class="col-md-7 col-lg-12 col-xl-7 p-0">
                                                            <div class="meet-your-instructor-left d-flex">
                                                                <div class="meet-instructor-img-wrap flex-shrink-0">
                                                                    <img
                                                                        src="https://lmszai.zainikthemes.com/uploads_demo/user/1.jpg"
                                                                        alt="img">
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <p class="font-medium color-heading mb-1">Johnny
                                                                        Depp</p>
                                                                    <p class="font-12 mb-2">PHP Developer</p>
                                                                    <div
                                                                        class="teacher-tag color-hover bg-light-purple font-medium font-14 radius-4">
                                                                        Instructor
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5 col-lg-12 col-xl-5 p-0">
                                                            <div class="meet-your-instructor-right">
                                                                <div class="d-flex">
                                                                    <div>
                                                                        <div
                                                                            class="meet-instructor-extra-info-item color-heading">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                 aria-hidden="true" role="img"
                                                                                 class="iconify iconify--bi" width="1em"
                                                                                 height="1em"
                                                                                 preserveAspectRatio="xMidYMid meet"
                                                                                 viewBox="0 0 16 16"
                                                                                 data-icon="bi:star">
                                                                                <path fill="currentColor"
                                                                                      d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256l4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73l3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356l-.83 4.73zm4.905-2.767l-3.686 1.894l.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575l-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957l-3.686-1.894a.503.503 0 0 0-.461 0z"></path>
                                                                            </svg>
                                                                            5.0 Rating
                                                                        </div>
                                                                        <div
                                                                            class="meet-instructor-extra-info-item color-heading">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                 aria-hidden="true" role="img"
                                                                                 class="iconify iconify--ph" width="1em"
                                                                                 height="1em"
                                                                                 preserveAspectRatio="xMidYMid meet"
                                                                                 viewBox="0 0 256 256"
                                                                                 data-icon="ph:student">
                                                                                <path fill="currentColor"
                                                                                      d="m226.53 56.41l-96-32a8 8 0 0 0-5.06 0l-96 32A8 8 0 0 0 24 64v80a8 8 0 0 0 16 0V75.1l33.59 11.19a64 64 0 0 0 20.65 88.05c-18 7.06-33.56 19.83-44.94 37.29a8 8 0 1 0 13.4 8.74C77.77 197.25 101.57 184 128 184s50.23 13.25 65.3 36.37a8 8 0 0 0 13.4-8.74c-11.38-17.46-27-30.23-44.94-37.29a64 64 0 0 0 20.65-88l44.12-14.7a8 8 0 0 0 0-15.18ZM176 120a48 48 0 1 1-86.65-28.45l36.12 12a8 8 0 0 0 5.06 0l36.12-12A47.89 47.89 0 0 1 176 120Zm-48-32.43L57.3 64L128 40.43L198.7 64Z"></path>
                                                                            </svg>
                                                                            2 Students
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <div
                                                                            class="meet-instructor-extra-info-item color-heading">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                 aria-hidden="true" role="img"
                                                                                 class="iconify iconify--cil"
                                                                                 width="1em" height="1em"
                                                                                 preserveAspectRatio="xMidYMid meet"
                                                                                 viewBox="0 0 512 512"
                                                                                 data-icon="cil:badge">
                                                                                <path fill="currentColor"
                                                                                      d="m328.375 384l3.698 74.999l-75.862-52.719l-76.287 52.769L183.625 384h-32.039l-5.522 112h36.692l73.413-50.78L329.242 496h36.694l-5.522-112h-32.039zm87.034-229.086l-2.194-48.054L372.7 80.933l-25.932-40.519l-48.055-2.2L256 16.093l-42.713 22.126l-48.055 2.2L139.3 80.933L98.785 106.86l-2.194 48.054l-22.127 42.714l22.127 42.715l2.2 48.053l40.509 25.927l25.928 40.52l48.055 2.195L256 379.164l42.713-22.126l48.055-2.195l25.928-40.52l40.518-25.923l2.195-48.053l22.127-42.715Zm-31.646 76.949L382 270.377l-32.475 20.78l-20.78 32.475l-38.515 1.76L256 343.125l-34.234-17.733l-38.515-1.76l-20.78-32.475L130 270.377l-1.759-38.514l-17.741-34.235l17.737-34.228L130 124.88l32.471-20.78l20.78-32.474l38.515-1.76L256 52.132l34.234 17.733l38.515 1.76l20.78 32.474L382 124.88l1.759 38.515l17.741 34.233Z"></path>
                                                                            </svg>
                                                                            Author Level 3
                                                                        </div>
                                                                        <div
                                                                            class="meet-instructor-extra-info-item color-heading">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                 aria-hidden="true" role="img"
                                                                                 class="iconify iconify--ph" width="1em"
                                                                                 height="1em"
                                                                                 preserveAspectRatio="xMidYMid meet"
                                                                                 viewBox="0 0 256 256"
                                                                                 data-icon="ph:monitor-light">
                                                                                <path fill="currentColor"
                                                                                      d="M208 42H48a22 22 0 0 0-22 22v112a22 22 0 0 0 22 22h160a22 22 0 0 0 22-22V64a22 22 0 0 0-22-22Zm10 134a10 10 0 0 1-10 10H48a10 10 0 0 1-10-10V64a10 10 0 0 1 10-10h160a10 10 0 0 1 10 10Zm-52 48a6 6 0 0 1-6 6H96a6 6 0 0 1 0-12h64a6 6 0 0 1 6 6Z"></path>
                                                                            </svg>
                                                                            6 Courses
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 meet-your-instructor-content-part">
                                                            <h6 class="font-16">About Instructor</h6>
                                                            <p>Freelancers and entrepreneurs Freelancers and
                                                                entrepreneurs use about.me to grow their audience and
                                                                get more clients. · Create a page to present who you are
                                                                and what you do in one link.use about.me to grow their
                                                                audience and get more clients. · Create a page to
                                                                present who you are and what you do in one link.</p>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-7 col-lg-12 col-xl-7 p-0">
                                                            <div class="meet-your-instructor-left d-flex">
                                                                <div class="meet-instructor-img-wrap flex-shrink-0">
                                                                    <img
                                                                        src="https://lmszai.zainikthemes.com/uploads_demo/user/1.jpg"
                                                                        alt="img">
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <p class="font-medium color-heading mb-1">Johnny
                                                                        Depp</p>
                                                                    <p class="font-12 mb-2">PHP Developer</p>
                                                                    <div
                                                                        class="teacher-tag color-hover bg-light-purple font-medium font-14 radius-4">
                                                                        Instructor
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5 col-lg-12 col-xl-5 p-0">
                                                            <div class="meet-your-instructor-right">
                                                                <div class="d-flex">
                                                                    <div>
                                                                        <div
                                                                            class="meet-instructor-extra-info-item color-heading">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                 aria-hidden="true" role="img"
                                                                                 class="iconify iconify--bi" width="1em"
                                                                                 height="1em"
                                                                                 preserveAspectRatio="xMidYMid meet"
                                                                                 viewBox="0 0 16 16"
                                                                                 data-icon="bi:star">
                                                                                <path fill="currentColor"
                                                                                      d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256l4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73l3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356l-.83 4.73zm4.905-2.767l-3.686 1.894l.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575l-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957l-3.686-1.894a.503.503 0 0 0-.461 0z"></path>
                                                                            </svg>
                                                                            5.0 Rating
                                                                        </div>
                                                                        <div
                                                                            class="meet-instructor-extra-info-item color-heading">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                 aria-hidden="true" role="img"
                                                                                 class="iconify iconify--ph" width="1em"
                                                                                 height="1em"
                                                                                 preserveAspectRatio="xMidYMid meet"
                                                                                 viewBox="0 0 256 256"
                                                                                 data-icon="ph:student">
                                                                                <path fill="currentColor"
                                                                                      d="m226.53 56.41l-96-32a8 8 0 0 0-5.06 0l-96 32A8 8 0 0 0 24 64v80a8 8 0 0 0 16 0V75.1l33.59 11.19a64 64 0 0 0 20.65 88.05c-18 7.06-33.56 19.83-44.94 37.29a8 8 0 1 0 13.4 8.74C77.77 197.25 101.57 184 128 184s50.23 13.25 65.3 36.37a8 8 0 0 0 13.4-8.74c-11.38-17.46-27-30.23-44.94-37.29a64 64 0 0 0 20.65-88l44.12-14.7a8 8 0 0 0 0-15.18ZM176 120a48 48 0 1 1-86.65-28.45l36.12 12a8 8 0 0 0 5.06 0l36.12-12A47.89 47.89 0 0 1 176 120Zm-48-32.43L57.3 64L128 40.43L198.7 64Z"></path>
                                                                            </svg>
                                                                            2 Students
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <div
                                                                            class="meet-instructor-extra-info-item color-heading">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                 aria-hidden="true" role="img"
                                                                                 class="iconify iconify--cil"
                                                                                 width="1em" height="1em"
                                                                                 preserveAspectRatio="xMidYMid meet"
                                                                                 viewBox="0 0 512 512"
                                                                                 data-icon="cil:badge">
                                                                                <path fill="currentColor"
                                                                                      d="m328.375 384l3.698 74.999l-75.862-52.719l-76.287 52.769L183.625 384h-32.039l-5.522 112h36.692l73.413-50.78L329.242 496h36.694l-5.522-112h-32.039zm87.034-229.086l-2.194-48.054L372.7 80.933l-25.932-40.519l-48.055-2.2L256 16.093l-42.713 22.126l-48.055 2.2L139.3 80.933L98.785 106.86l-2.194 48.054l-22.127 42.714l22.127 42.715l2.2 48.053l40.509 25.927l25.928 40.52l48.055 2.195L256 379.164l42.713-22.126l48.055-2.195l25.928-40.52l40.518-25.923l2.195-48.053l22.127-42.715Zm-31.646 76.949L382 270.377l-32.475 20.78l-20.78 32.475l-38.515 1.76L256 343.125l-34.234-17.733l-38.515-1.76l-20.78-32.475L130 270.377l-1.759-38.514l-17.741-34.235l17.737-34.228L130 124.88l32.471-20.78l20.78-32.474l38.515-1.76L256 52.132l34.234 17.733l38.515 1.76l20.78 32.474L382 124.88l1.759 38.515l17.741 34.233Z"></path>
                                                                            </svg>
                                                                            Author Level 3
                                                                        </div>
                                                                        <div
                                                                            class="meet-instructor-extra-info-item color-heading">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                 aria-hidden="true" role="img"
                                                                                 class="iconify iconify--ph" width="1em"
                                                                                 height="1em"
                                                                                 preserveAspectRatio="xMidYMid meet"
                                                                                 viewBox="0 0 256 256"
                                                                                 data-icon="ph:monitor-light">
                                                                                <path fill="currentColor"
                                                                                      d="M208 42H48a22 22 0 0 0-22 22v112a22 22 0 0 0 22 22h160a22 22 0 0 0 22-22V64a22 22 0 0 0-22-22Zm10 134a10 10 0 0 1-10 10H48a10 10 0 0 1-10-10V64a10 10 0 0 1 10-10h160a10 10 0 0 1 10 10Zm-52 48a6 6 0 0 1-6 6H96a6 6 0 0 1 0-12h64a6 6 0 0 1 6 6Z"></path>
                                                                            </svg>
                                                                            6 Courses
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 meet-your-instructor-content-part">
                                                            <h6 class="font-16">About Instructor</h6>
                                                            <p>Freelancers and entrepreneurs Freelancers and
                                                                entrepreneurs use about.me to grow their audience and
                                                                get more clients. · Create a page to present who you are
                                                                and what you do in one link.use about.me to grow their
                                                                audience and get more clients. · Create a page to
                                                                present who you are and what you do in one link.</p>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-4">
                                    <div class="course-single-details-right-content">
                                        <div class="course-info-box bg-white">
                                            <div
                                                class="video-area-left position-relative d-flex align-items-center justify-content-center">
                                                <div class="course-info-video-img">
                                                    <img
                                                        src="https://lmszai.zainikthemes.com/uploads/bundle/1662703371-UulOac2DpP.jpg"
                                                        alt="Bundle Image" class="img-fluid">
                                                </div>
                                            </div>
                                            <div
                                                class="course-price-box d-flex justify-content-between align-items-center mt-30 mb-30">
                                                <div>
                                                    <h4 class="d-flex align-items-center mb-1">
                                                        {{ get_currency_symbol()}} {{get_option('become_organization_coast')}}
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="course-includes-box course-includes-box-top">
                                                <ul class="pb-30">
                                                    <li class="d-flex justify-content-between">
                                                        <div>
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                 aria-hidden="true" role="img"
                                                                 class="iconify iconify--carbon" width="1em"
                                                                 height="1em" preserveAspectRatio="xMidYMid meet"
                                                                 viewBox="0 0 32 32" data-icon="carbon:increase-level">
                                                                <path fill="currentColor"
                                                                      d="m23 4l-5 3.75v6.5L15 12l-5 3.75v6.5L7 20l-5 3.75V30h2v-5.25l3-2.25l3 2.25V30h2V16.75l3-2.25l3 2.25V30h2V8.75l3-2.25l3 2.25V30h2V7.75L23 4z"></path>
                                                            </svg>
                                                            <span>Total Course</span>
                                                        </div>
                                                        <div>3</div>
                                                    </li>
                                                </ul>
                                            </div>
                                            @if(Auth::user())
                                                <a href="{{route('student.become-an-organization')}}" class="theme-btn theme-button1 theme-button3 w-100 mb-30 addToCart">
                                                    تسجيل العضوية
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                         class="feather feather-arrow-right">
                                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                                        <polyline points="12 5 19 12 12 19"></polyline>
                                                    </svg>
                                                </a>
                                            @else
                                                <p>
                                                    لتسجيل العضوية تحتاج لتسجيل الدخول اولا
                                                </p>
                                                <a href="{{ route('login') }}" class="theme-btn theme-button1 theme-button3 w-100 mb-30 addToCart">
                                                    تسجيل الدخول
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                         class="feather feather-arrow-right">
                                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                                        <polyline points="12 5 19 12 12 19"></polyline>
                                                    </svg>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab" style="padding-top: 200px;">
                    <!-- ************** item  ************** -->
                    <section class="course-single-details-area before-login-purchase-course-details">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-8">
                                    <div class="course-single-details-left-content bg-white">

                                        <div
                                            class="course-tab-nav-wrap course-details-tab-nav-wrap d-flex justify-content-between">
                                            <ul class="nav nav-tabs tab-nav-list border-0" id="myTab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link active" id="Overview-tab" data-bs-toggle="tab"
                                                       href="#Overview" role="tab" aria-controls="Overview"
                                                       aria-selected="true">	شروط الحصول عليها  :</a>
                                                </li>
                                            </ul>
                                        </div>


                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="Overview" role="tabpanel"
                                                 aria-labelledby="Overview-tab">
                                                <div class="overview-content">
                                                    <p>

                                                    <ul>
                                                        <li>
                                                            1. 	أن يكون العضو حاصلاً على برنامج تأهيلي في الكوتشينج (الممارس كحد ادنى) من جهة معتبرة  في الكوتشينج .
                                                        </li>
                                                        <li>
                                                            2.	أن يكون العضو حاصل على الكوتش التربوي والتعليمي المستوى الأولى كحد ادنى. (من خلال المنصة للالتزام بمعاييرها ).
                                                        </li>
                                                        <li>
                                                            3.	ان يمتلك العضو خبرة في مجال التربية أو التعليم لا تقل عن خمس سنوات.
                                                        </li>
                                                        <li>
                                                            4.	ان يلتزم العضو بحضور جلسات الكوتشينج مع العميل في الوقت المحدد.
                                                        </li>
                                                        <li>
                                                            5.	أن يلتزم العضو بالعمل داخل اطار المنصة إذا كان العميل عن طريق المنصة.
                                                        </li>
                                                        <li>
                                                            6.	أن يحافظ العضو على اخلاقيات مهنة الكوتش ومن أهمها السرية والخصوصية.
                                                        </li>
                                                        <li>
                                                            7.	أن يطلع العضو على الأنظمة واللوائح الخاصة بتشغيل المنصة والالتزام بها
                                                        </li>
                                                        <li>
                                                            8.	أن يدفع العضو رسوم العضوية السنوية والمقدرة  .
                                                        </li>
                                                    </ul>
                                                    </p>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="course-single-details-left-content bg-white">

                                        <div
                                            class="course-tab-nav-wrap course-details-tab-nav-wrap d-flex justify-content-between">
                                            <ul class="nav nav-tabs tab-nav-list border-0" id="myTab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link active" id="Overview-tab" data-bs-toggle="tab"
                                                       href="#Overview" role="tab" aria-controls="Overview"
                                                       aria-selected="true">	مميزات عضوية الكوتش:</a>
                                                </li>
                                            </ul>
                                        </div>


                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="Overview" role="tabpanel"
                                                 aria-labelledby="Overview-tab">
                                                <div class="overview-content">
                                                    <p>

                                                    <ul>
                                                        <li>
                                                            1.	دورات تطوير مهني مخفضة ومجانية
                                                        </li>
                                                        <li>
                                                            2.	المشاركة بحضور امسيات تطويريه مخفضة ومجانية
                                                        </li>
                                                        <li>
                                                            3.	الحصول على جلسات كوتشينج مخفضة
                                                        </li>
                                                        <li>
                                                            4.	حضور لقاءات التوجيه لجلسات الكوتشينج مجانا
                                                        </li>
                                                        <li>
                                                            5.	امكانيه تقديم جلسات كوتشينج للمستفيدين
                                                        </li>
                                                        <li>
                                                            6.	خدمه الدفع الالكتروني
                                                        </li>
                                                        <li>
                                                            7.	خدمه قاعه الزوم لتنفيذ الجلسات
                                                        </li>
                                                        <li>
                                                            8.	نشر معلومات و سيره ذاتية للكوتش على المنصة
                                                        </li>
                                                    </ul>
                                                    </p>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-4">
                                    <div class="course-single-details-right-content">
                                        <div class="course-info-box bg-white">
                                            <div
                                                class="video-area-left position-relative d-flex align-items-center justify-content-center">
                                                <div class="course-info-video-img">
                                                    <img
                                                        src="https://lmszai.zainikthemes.com/uploads/bundle/1662703371-UulOac2DpP.jpg"
                                                        alt="Bundle Image" class="img-fluid">
                                                </div>
                                            </div>
                                            <div
                                                class="course-price-box d-flex justify-content-between align-items-center mt-30 mb-30">
                                                <div>
                                                    <h4 class="d-flex align-items-center mb-1">
                                                        {{ get_currency_symbol()}} {{get_option('become_instructor_coast')}}
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="course-includes-box course-includes-box-top">
                                                <ul class="pb-30">
                                                    <li class="d-flex justify-content-between">
                                                        <div>
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                 aria-hidden="true" role="img"
                                                                 class="iconify iconify--carbon" width="1em"
                                                                 height="1em" preserveAspectRatio="xMidYMid meet"
                                                                 viewBox="0 0 32 32" data-icon="carbon:increase-level">
                                                                <path fill="currentColor"
                                                                      d="m23 4l-5 3.75v6.5L15 12l-5 3.75v6.5L7 20l-5 3.75V30h2v-5.25l3-2.25l3 2.25V30h2V16.75l3-2.25l3 2.25V30h2V8.75l3-2.25l3 2.25V30h2V7.75L23 4z"></path>
                                                            </svg>
                                                            <span>Total Course</span>
                                                        </div>
                                                        <div>3</div>
                                                    </li>
                                                </ul>
                                            </div>
                                            @if(Auth::user())
                                            <a href="{{route('student.become-an-instructor')}}" class="theme-btn theme-button1 theme-button3 w-100 mb-30 addToCart">
                                                تسجيل العضوية
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-arrow-right">
                                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                                    <polyline points="12 5 19 12 12 19"></polyline>
                                                </svg>
                                            </a>
                                            @else
                                                <p>
                                                    لتسجيل العضوية تحتاج لتسجيل الدخول اولا
                                                </p>
                                                <a href="{{ route('login') }}" class="theme-btn theme-button1 theme-button3 w-100 mb-30 addToCart">
                                                    تسجيل الدخول
                                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                         class="feather feather-arrow-right">
                                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                                        <polyline points="12 5 19 12 12 19"></polyline>
                                                    </svg>
                                                </a>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab" style="padding-top: 200px;">
                    <!-- ************** item  *************** -->
                    <section class="course-single-details-area before-login-purchase-course-details">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-8">
                                    <div class="course-single-details-left-content bg-white">

                                        <div
                                            class="course-tab-nav-wrap course-details-tab-nav-wrap d-flex justify-content-between">
                                            <ul class="nav nav-tabs tab-nav-list border-0" id="myTab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link active" id="Overview-tab" data-bs-toggle="tab"
                                                       href="#Overview" role="tab" aria-controls="Overview"
                                                       aria-selected="true">	مميزات عضوية المستفيد:</a>
                                                </li>
                                            </ul>
                                        </div>


                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="Overview" role="tabpanel"
                                                 aria-labelledby="Overview-tab">
                                                <div class="overview-content">
                                                    <p>
                                                        تتيح هذه العضوية للمستفيد ان يطلع على جميع خدمات المنصة وتفاصيلها ويطلبها ويحصل عليها وفق اليه طلب كل خدمه من هذه الخدمات سواء كانت مجانية او مدفوعة .
{{--                                                    <ul>--}}
{{--                                                        <li>--}}
{{--                                                            1.	دورات تطوير مهني مخفضة ومجانية--}}
{{--                                                        </li>--}}
{{--                                                        <li>--}}
{{--                                                            2.	المشاركة بحضور امسيات تطويريه مخفضة ومجانية--}}
{{--                                                        </li>--}}
{{--                                                        <li>--}}
{{--                                                            3.	الحصول على جلسات كوتشينج مخفضة--}}
{{--                                                        </li>--}}
{{--                                                        <li>--}}
{{--                                                            4.	حضور لقاءات التوجيه لجلسات الكوتشينج مجانا--}}
{{--                                                        </li>--}}
{{--                                                        <li>--}}
{{--                                                            5.	امكانيه تقديم جلسات كوتشينج للمستفيدين--}}
{{--                                                        </li>--}}
{{--                                                        <li>--}}
{{--                                                            6.	خدمه الدفع الالكتروني--}}
{{--                                                        </li>--}}
{{--                                                        <li>--}}
{{--                                                            7.	خدمه قاعه الزوم لتنفيذ الجلسات--}}
{{--                                                        </li>--}}
{{--                                                        <li>--}}
{{--                                                            8.	نشر معلومات و سيره ذاتية للكوتش على المنصة--}}
{{--                                                        </li>--}}
{{--                                                    </ul>--}}
                                                    </p>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-4">
                                    <div class="course-single-details-right-content">
                                        <div class="course-info-box bg-white">
                                            <div
                                                class="video-area-left position-relative d-flex align-items-center justify-content-center">
                                                <div class="course-info-video-img">
                                                    <img
                                                        src="https://lmszai.zainikthemes.com/uploads/bundle/1662703371-UulOac2DpP.jpg"
                                                        alt="Bundle Image" class="img-fluid">
                                                </div>
                                            </div>
                                            <div
                                                class="course-price-box d-flex justify-content-between align-items-center mt-30 mb-30">
                                                <div>
                                                    <h4 class="d-flex align-items-center mb-1">
                                                        @lang('Free')
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="course-includes-box course-includes-box-top">
                                                <ul class="pb-30">
                                                    <li class="d-flex justify-content-between">
                                                        <div>
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                 aria-hidden="true" role="img"
                                                                 class="iconify iconify--carbon" width="1em"
                                                                 height="1em" preserveAspectRatio="xMidYMid meet"
                                                                 viewBox="0 0 32 32" data-icon="carbon:increase-level">
                                                                <path fill="currentColor"
                                                                      d="m23 4l-5 3.75v6.5L15 12l-5 3.75v6.5L7 20l-5 3.75V30h2v-5.25l3-2.25l3 2.25V30h2V16.75l3-2.25l3 2.25V30h2V8.75l3-2.25l3 2.25V30h2V7.75L23 4z"></path>
                                                            </svg>
                                                            <span>Total Course</span>
                                                        </div>
                                                        <div>3</div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <a href="{{route('sign-up')}}" class="theme-btn theme-button1 theme-button3 w-100 mb-30 addToCart">

                                                تسجيل العضوية
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-arrow-right">
                                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                                    <polyline points="12 5 19 12 12 19"></polyline>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>


            </div>
        </div>
    </section>


@endsection

@push('script')
    <!-- Include Shuffle Plugins -->
    <script src="{{ asset('frontend/assets/js/shuffle.min.js') }}"></script>
    <!-- Include Shuffle Plugins -->

    <!-- Shuffle js filter and masonry Start -->
    <script>
        var Shuffle = window.Shuffle;
        var jQuery = window.jQuery;

        var myShuffle = new Shuffle(document.querySelector('.shuffle-wrapper'), {
            itemSelector: '.shuffle-item',
            buffer: 1
        });

        jQuery('input[name="shuffle-filter"]').on('change', function (evt) {
            var input = evt.currentTarget;
            if (input.checked) {
                myShuffle.filter(input.value);
            }
        });
    </script>
    <!-- Shuffle js filter and masonry Start -->
@endpush
