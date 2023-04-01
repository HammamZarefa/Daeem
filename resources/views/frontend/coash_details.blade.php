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
                        <h3 class="page-banner-heading text-white pb-15">{{ __('Coshing') }}</h3>

                        <!-- Breadcrumb Start-->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item font-14"><a href="{{ url('/') }}">{{__('Home')}}</a></li>
                                <li class="breadcrumb-item font-14 active" aria-current="page">{{ __('Coshing') }}</li>
                            </ol>
                        </nav>
                                                </div>
                        <img style="width:180px;margin-top: -40px;" src="{{ asset('frontend/assets/img/daeem/daeem-ha.png') }}" alt="">
                        <!-- Breadcrumb End-->
                    </div>

                </div>
            </div>
        </div>
    </div>
</header>
<!-- Page Header End -->
<section class="instructor-details-area section-t-space" style="background:#f8f6f0">
<div class="container">
<div class="row instructor-details-main-row">
<div class="col-12 col-md-12 col-lg-8 col-xl-9">
<div class="instructor-details-left-content">

<div class="instructor-details-left-inner-box about-skills-box bg-white radius-3">
<div class="about-instructor-box">
<h5 class="instructor-details-inner-title">About Johnny Depp</h5>
<p>Freelancers and entrepreneurs Freelancers and entrepreneurs use about.me to grow their audience and get more clients. · Create a page to present who you are and what you do in one link.use about.me to grow their audience and get more clients. · Create a page to present who you are and what you do in one link.</p>
</div>
<div class="instructor-skills-box mt-25">
<h5 class="instructor-details-inner-title">Skills</h5>
<ul class="instructor-skills-tag d-inline-flex align-items-center flex-wrap">
<li class="font-15"><span class="color-gray2">No skills to show</span></li>
</ul>
</div>
</div>

<div class="instructor-details-left-inner-box certificate-awards-box bg-white radius-3">
<div class="row">
<div class="col-md-6 certificate-awards-inner">
<h5 class="instructor-details-inner-title">Certifications</h5>
<ul>
<li class="font-15"><span class="color-gray2">No certificate to show</span></li>
</ul>
</div>
<div class="col-md-6 certificate-awards-inner">
<h5 class="instructor-details-inner-title">Awards</h5>
<ul>
<li class="font-15"><span class="color-gray2">No award to show</span></li>
</ul>
</div>
</div>
</div>

<div class="instructor-details-left-inner-box my-others-courses bg-white radius-3">
<h5 class="instructor-details-inner-title">My courses (6)</h5>
<div class="row" id="appendInstructorCourses">

<div class="col-12 col-md-6 col-lg-6 col-xl-4">
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
<div class="card-body">
<h5 class="card-title course-title"><a href="https://lmszai.zainikthemes.com/course-details/javascript-understanding-the-weird-parts">JavaScript: Understanding the Weird Part...</a></h5>
<p class="card-text instructor-name-certificate font-medium font-12">
<a href="https://lmszai.zainikthemes.com/users/2/profile">Johnny Depp</a>
</p>
<div class="course-item-bottom">
<div class="course-rating d-flex align-items-center">
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
$ 50.00
</span>
</div>

</div>
</div>
</div>
</div>
</div>


<div class="col-12 col-md-6 col-lg-6 col-xl-4">
<div class="card course-item border-0 radius-3 bg-white">
<div class="course-img-wrap overflow-hidden">
 <a href="https://lmszai.zainikthemes.com/course-details/php-for-beginners-become-a-php-master-cms-project"><img src="https://lmszai.zainikthemes.com/uploads/course/1657091202-uW4GOdGMEz.jpg" alt="course" class="img-fluid"></a>
<div class="course-item-hover-btns position-absolute">
<span class="course-item-btn addToWishlist" data-course_id="19" data-route="https://lmszai.zainikthemes.com/student/add-to-wishlist" title="Add to Wishlist">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
</span>
<span class="course-item-btn addToCart" data-course_id="19" data-route="https://lmszai.zainikthemes.com/student/add-to-cart" title="Add to Cart">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
</span>
</div>
</div>
<div class="card-body">
<h5 class="card-title course-title"><a href="https://lmszai.zainikthemes.com/course-details/php-for-beginners-become-a-php-master-cms-project">PHP for Beginners - Become a PHP Master...</a></h5>
<p class="card-text instructor-name-certificate font-medium font-12">
<a href="https://lmszai.zainikthemes.com/users/2/profile">Johnny Depp</a>
</p>
<div class="course-item-bottom">
<div class="course-rating d-flex align-items-center">
<span class="font-medium font-14 me-2">0.00</span>
<ul class="rating-list d-flex align-items-center me-2">
<li class=""><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--bi" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16" data-icon="bi:star-fill"><path fill="currentColor" d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327l4.898.696c.441.062.612.636.282.95l-3.522 3.356l.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path></svg></li>
<li class=""><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--bi" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16" data-icon="bi:star-fill"><path fill="currentColor" d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327l4.898.696c.441.062.612.636.282.95l-3.522 3.356l.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path></svg></li>
<li class=""><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--bi" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16" data-icon="bi:star-fill"><path fill="currentColor" d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327l4.898.696c.441.062.612.636.282.95l-3.522 3.356l.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path></svg></li>
<li class=""><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--bi" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16" data-icon="bi:star-fill"><path fill="currentColor" d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327l4.898.696c.441.062.612.636.282.95l-3.522 3.356l.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path></svg></li>
<li class=""><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--bi" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16" data-icon="bi:star-fill"><path fill="currentColor" d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327l4.898.696c.441.062.612.636.282.95l-3.522 3.356l.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path></svg></li>
</ul>
<span class="rating-count font-14">(1)</span>
</div>
<div class="instructor-bottom-item font-14 font-semi-bold">
<div class="instructor-bottom-item font-14 font-semi-bold">Price:
<span class="color-hover">
$ 25.00
</span>
</div>

</div>
</div>
</div>
</div>
</div>


<div class="col-12 col-md-6 col-lg-6 col-xl-4">
<div class="card course-item border-0 radius-3 bg-white">
<div class="course-img-wrap overflow-hidden">
<a href="https://lmszai.zainikthemes.com/course-details/react-the-complete-guide-incl-hooks-react-router-redux"><img src="https://lmszai.zainikthemes.com/uploads/course/1657091384-VX5ZldBJ3q.jpg" alt="course" class="img-fluid"></a>
<div class="course-item-hover-btns position-absolute">
<span class="course-item-btn addToWishlist" data-course_id="23" data-route="https://lmszai.zainikthemes.com/student/add-to-wishlist" title="Add to Wishlist">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
</span>
<span class="course-item-btn addToCart" data-course_id="23" data-route="https://lmszai.zainikthemes.com/student/add-to-cart" title="Add to Cart">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
</span>
</div>
</div>
<div class="card-body">
<h5 class="card-title course-title"><a href="https://lmszai.zainikthemes.com/course-details/react-the-complete-guide-incl-hooks-react-router-redux">React - The Complete Guide (incl Hooks,...</a></h5>
<p class="card-text instructor-name-certificate font-medium font-12">
<a href="https://lmszai.zainikthemes.com/users/2/profile">Johnny Depp</a>
</p>
<div class="course-item-bottom">
<div class="course-rating d-flex align-items-center">
<span class="font-medium font-14 me-2">0.00</span>
<ul class="rating-list d-flex align-items-center me-2">
<li class=""><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--bi" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16" data-icon="bi:star-fill"><path fill="currentColor" d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327l4.898.696c.441.062.612.636.282.95l-3.522 3.356l.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path></svg></li>
<li class=""><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--bi" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16" data-icon="bi:star-fill"><path fill="currentColor" d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327l4.898.696c.441.062.612.636.282.95l-3.522 3.356l.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path></svg></li>
<li class=""><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--bi" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16" data-icon="bi:star-fill"><path fill="currentColor" d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327l4.898.696c.441.062.612.636.282.95l-3.522 3.356l.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path></svg></li>
<li class=""><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--bi" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16" data-icon="bi:star-fill"><path fill="currentColor" d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327l4.898.696c.441.062.612.636.282.95l-3.522 3.356l.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path></svg></li>
<li class=""><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--bi" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16" data-icon="bi:star-fill"><path fill="currentColor" d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327l4.898.696c.441.062.612.636.282.95l-3.522 3.356l.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path></svg></li>
</ul>
<span class="rating-count font-14">(0)</span>
</div>
<div class="instructor-bottom-item font-14 font-semi-bold">
<div class="instructor-bottom-item font-14 font-semi-bold">Price:
<span class="color-hover">
$ 55.00
</span>
</div>

</div>
</div>
</div>
</div>
</div>

</div>

<div class="d-block" id="loadMoreBtn"><button type="button" class="theme-btn theme-button2 load-more-btn loadMore">Load More <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--icon-park-outline" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48" data-icon="icon-park-outline:loading-one"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M24 4v4m10-1.32l-2 3.464M41.32 14l-3.464 2M44 24h-4m1.32 10l-3.464-2M34 41.32l-2-3.464M24 44v-4m-10 1.32l2-3.464M6.68 34l3.464-2M4 24h4M6.68 14l3.464 2M14 6.68l2 3.464"></path></svg></button></div>
</div>
</div>
</div>
<div class="col-12 col-md-12 col-lg-4 col-xl-3">
<div class="instructor-details-right-content radius-3">
<div class="course-info-box instructor-info-box bg-white p-0">
<div class="instructor-details-right-img-box text-center mb-20">
<div class="instructor-details-avatar-wrap radius-50 overflow-hidden mx-auto">
<img src="https://lmszai.zainikthemes.com/uploads_demo/user/1.jpg" alt="img" class="radius-50">
</div>
<h6 class="instructor-details-name">Johnny Depp</h6>
<p class="instructor-details-designation font-12 font-semi-bold mb-15">PHP Developer</p>
<div class="search-instructor-award-img d-inline-flex flex-wrap justify-content-center">
<img src="https://lmszai.zainikthemes.com/frontend/assets/img/ranking_badges/membership_1.png" title="1 Years of Membership" alt="1 Years of Membership" class="fit-image rounded-circle">
<img src="https://lmszai.zainikthemes.com/frontend/assets/img/ranking_badges/rank_3.png" title="Author Level 3" alt="Author Level 3" class="fit-image rounded-circle">
<img src="https://lmszai.zainikthemes.com/frontend/assets/img/ranking_badges/course_1.png" title="0 to 5 Course" alt="0 to 5 Course" class="fit-image rounded-circle">
<img src="https://lmszai.zainikthemes.com/frontend/assets/img/ranking_badges/student_1.png" title="0 to 10 Student" alt="0 to 10 Student" class="fit-image rounded-circle">
 <img src="https://lmszai.zainikthemes.com/frontend/assets/img/ranking_badges/sale_1.png" title="0 to 10 Sold" alt="0 to 10 Sold" class="fit-image rounded-circle">
</div>
<div>
<button type="button" class="green-theme-btn theme-button1 follow-btn" id="unAuthBtnId">Follow</button>
</div>
</div>
<div class="follower-following-box mb-20">
<div class="font-15 follower-item only-follower-item border-start-0">
<h6 class="d-block color-heading font-15" id="followers">2</h6>
<span>Followers</span>
</div>
<div class="font-15 follower-item border-start-0 border-end-0">
<h6 class="d-block color-heading font-15" id="following">4</h6>
<span>Following</span>
</div>
</div>
<div class="course-includes-box p-0 mb-20">
<ul>
<li>
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--icon-park-outline" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48" data-icon="icon-park-outline:ranking"><g fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="4"><path stroke-linecap="round" d="M17 18H4v24h13V18Z"></path><path d="M30 6H17v36h13V6Z"></path><path stroke-linecap="round" d="M43 26H30v16h13V26Z"></path></g></svg>
<span>Author Level 3
(Ranking)</span>
</li>
<li>
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--akar-icons" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24" data-icon="akar-icons:book-close"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4.222v15.556C4 21.005 5.023 22 6.286 22h11.428C18.977 22 20 21.005 20 19.778V8.444a2 2 0 0 0-2-2H6.286C5.023 6.444 4 5.45 4 4.222Zm0 0C4 2.995 5.023 2 6.286 2h9.143c1.262 0 2.285.995 2.285 2.222v2.222"></path></svg>
<span>6 Courses</span>
</li>
<li>
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--bi" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16" data-icon="bi:camera-video"><path fill="currentColor" fill-rule="evenodd" d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2V5zm11.5 5.175l3.5 1.556V4.269l-3.5 1.556v4.35zM2 4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H2z"></path></svg>
<span>31 Video Lectures</span>
</li>
<li>
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--la" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32" data-icon="la:book-reader"><path fill="currentColor" d="M16 4c-3.3 0-6 2.7-6 6c0 1.008.246 1.945.688 2.781C8.863 12.336 6.64 12 4 12H2.719l3.5 14H7c3.406 0 5.5.488 6.719.938c.61.226.996.449 1.219.593c.222.145.25.157.25.157l.28.312h1.063l.282-.313s.027-.011.25-.156a6.124 6.124 0 0 1 1.218-.593C19.5 26.488 21.594 26 25 26h.781l3.5-14H28c-2.629 0-4.848.316-6.656.75A5.91 5.91 0 0 0 22 10c0-3.3-2.7-6-6-6zm0 2c2.223 0 4 1.777 4 4s-1.777 4-4 4s-4-1.777-4-4s1.777-4 4-4zM5.312 14.125c3.11.152 5.649.691 7.313 1.313c1.34.5 2 .886 2.375 1.124v8.75c-.18-.082-.344-.167-.563-.25c-1.351-.5-3.57-.921-6.656-1zm21.375 0l-2.468 9.938c-3.086.078-5.305.5-6.657 1c-.218.082-.382.167-.562.25v-8.75c.375-.243 1.031-.633 2.344-1.125c1.652-.622 4.195-1.16 7.343-1.313z"></path></svg>
<span>2 Students</span>
</li>
<li>
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--healthicons" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48" data-icon="healthicons:i-exam-multiple-choice-outline"><g fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"><path d="M36 16a3 3 0 1 1 6 0v20.303l-3 4.5l-3-4.5V16Zm3-1a1 1 0 0 0-1 1v19.697l1 1.5l1-1.5V16a1 1 0 0 0-1-1Z"></path><path d="M41 20h-4v-2h4v2ZM10 8a2 2 0 0 0-2 2v28a2 2 0 0 0 2 2h20a2 2 0 0 0 2-2V10a2 2 0 0 0-2-2H10Zm-4 2a4 4 0 0 1 4-4h20a4 4 0 0 1 4 4v28a4 4 0 0 1-4 4H10a4 4 0 0 1-4-4V10Z"></path><path d="M20 15a1 1 0 0 1 1-1h8a1 1 0 1 1 0 2h-8a1 1 0 0 1-1-1Zm0 4a1 1 0 0 1 1-1h8a1 1 0 1 1 0 2h-8a1 1 0 0 1-1-1Zm0 9a1 1 0 0 1 1-1h8a1 1 0 1 1 0 2h-8a1 1 0 0 1-1-1Zm0 4a1 1 0 0 1 1-1h8a1 1 0 1 1 0 2h-8a1 1 0 0 1-1-1Zm-8-4v3h3v-3h-3Zm-1-2h5a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1v-5a1 1 0 0 1 1-1Zm6.707-11.707a1 1 0 0 1 0 1.414L13 20.414l-2.707-2.707a1 1 0 1 1 1.414-1.414L13 17.586l3.293-3.293a1 1 0 0 1 1.414 0Z"></path></g></svg>
<span>6 Quizzes</span>
</li>
<li>
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--bi" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16" data-icon="bi:book"><path fill="currentColor" d="M1 2.828c.885-.37 2.154-.769 3.388-.893c1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493c-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752c1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81c-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02c1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877c1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"></path></svg>
<span>2 Assignments</span>
</li>
<li>
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--fluent" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24" data-icon="fluent:device-meeting-room-remote-24-regular"><path fill="currentColor" d="M4.094 5.346A3.063 3.063 0 0 1 7.072 3h9.858c1.415 0 2.646.97 2.978 2.346l1.992 8.273A3.55 3.55 0 0 1 18.448 18H10.5v-1.5h7.947a2.05 2.05 0 0 0 1.993-2.53l-1.99-8.273A1.563 1.563 0 0 0 16.93 4.5H7.073c-.722 0-1.35.495-1.52 1.197L4.879 8.5H3.75c-.144 0-.285.011-.423.032l.767-3.186ZM10.49 20.5h6.762a.75.75 0 1 0 0-1.5h-6.75v1.25c0 .084-.005.168-.012.25Zm-4.74-6a1.25 1.25 0 1 0 0-2.5a1.25 1.25 0 0 0 0 2.5ZM2 11.25c0-.966.784-1.75 1.75-1.75h4a1.75 1.75 0 0 1 1.751 1.75v9A1.75 1.75 0 0 1 7.751 22h-4A1.75 1.75 0 0 1 2 20.25v-9ZM3.75 11a.25.25 0 0 0-.25.25v9c0 .138.112.25.25.25h4a.25.25 0 0 0 .25-.25v-9a.25.25 0 0 0-.25-.25h-4Z"></path></svg>
<span>2 Meetings</span>
</li>
<li>
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--bi" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16" data-icon="bi:star"><path fill="currentColor" d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256l4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73l3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356l-.83 4.73zm4.905-2.767l-3.686 1.894l.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575l-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957l-3.686-1.894a.503.503 0 0 0-.461 0z"></path></svg>
<span>2 Reviews (5.0
average)</span>
</li>
<li>
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--codicon" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16" data-icon="codicon:globe"><path fill="currentColor" fill-rule="evenodd" d="M8.5 1a6.5 6.5 0 1 1 0 13a6.5 6.5 0 0 1 0-13zm4.894 4a5.527 5.527 0 0 0-3.053-2.676c.444.84.765 1.74.953 2.676h2.1zm.582 2.995A5.11 5.11 0 0 0 14 7.5a5.464 5.464 0 0 0-.213-1.5h-2.342c.032.331.055.664.055 1a10.114 10.114 0 0 1-.206 2h2.493c.095-.329.158-.665.19-1.005zm-3.535 0l.006-.051A9.04 9.04 0 0 0 10.5 7a8.994 8.994 0 0 0-.076-1H6.576A8.82 8.82 0 0 0 6.5 7a8.98 8.98 0 0 0 .233 2h3.534c.077-.332.135-.667.174-1.005zM10.249 5a8.974 8.974 0 0 0-1.255-2.97C8.83 2.016 8.666 2 8.5 2a3.62 3.62 0 0 0-.312.015l-.182.015L8 2.04A8.97 8.97 0 0 0 6.751 5h3.498zM5.706 5a9.959 9.959 0 0 1 .966-2.681A5.527 5.527 0 0 0 3.606 5h2.1zM3.213 6A5.48 5.48 0 0 0 3 7.5A5.48 5.48 0 0 0 3.213 9h2.493A10.016 10.016 0 0 1 5.5 7c0-.336.023-.669.055-1H3.213zm2.754 4h-2.36a5.515 5.515 0 0 0 3.819 2.893A10.023 10.023 0 0 1 5.967 10zM8.5 12.644A8.942 8.942 0 0 0 9.978 10H7.022A8.943 8.943 0 0 0 8.5 12.644zM11.033 10a10.024 10.024 0 0 1-1.459 2.893A5.517 5.517 0 0 0 13.393 10h-2.36z" clip-rule="evenodd"></path></svg>
<span>Khulna, Bangladesh</span>
</li>
</ul>
 </div>
<div class="instructor-social mt-20">
<ul class="d-flex align-items-center">
<li>
<a href="">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--ant-design" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 1024 1024" data-icon="ant-design:facebook-filled"><path fill="currentColor" d="M880 112H144c-17.7 0-32 14.3-32 32v736c0 17.7 14.3 32 32 32h736c17.7 0 32-14.3 32-32V144c0-17.7-14.3-32-32-32zm-92.4 233.5h-63.9c-50.1 0-59.8 23.8-59.8 58.8v77.1h119.6l-15.6 120.7h-104V912H539.2V602.2H434.9V481.4h104.3v-89c0-103.3 63.1-159.6 155.3-159.6c44.2 0 82.1 3.3 93.2 4.8v107.9z"></path></svg>
</a>
</li>
<li>
<a href="">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--ant-design" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 1024 1024" data-icon="ant-design:twitter-square-filled"><path fill="currentColor" d="M880 112H144c-17.7 0-32 14.3-32 32v736c0 17.7 14.3 32 32 32h736c17.7 0 32-14.3 32-32V144c0-17.7-14.3-32-32-32zM727.3 401.7c.3 4.7.3 9.6.3 14.4c0 146.8-111.8 315.9-316.1 315.9c-63 0-121.4-18.3-170.6-49.8c9 1 17.6 1.4 26.8 1.4c52 0 99.8-17.6 137.9-47.4c-48.8-1-89.8-33-103.8-77c17.1 2.5 32.5 2.5 50.1-2a111 111 0 0 1-88.9-109v-1.4c14.7 8.3 32 13.4 50.1 14.1a111.13 111.13 0 0 1-49.5-92.4c0-20.7 5.4-39.6 15.1-56a315.28 315.28 0 0 0 229 116.1C492 353.1 548.4 292 616.2 292c32 0 60.8 13.4 81.1 35c25.1-4.7 49.1-14.1 70.5-26.7c-8.3 25.7-25.7 47.4-48.8 61.1c22.4-2.4 44-8.6 64-17.3c-15.1 22.2-34 41.9-55.7 57.6z"></path></svg>
</a>
</li>
<li>
<a href="">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--ant-design" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 1024 1024" data-icon="ant-design:linkedin-filled"><path fill="currentColor" d="M880 112H144c-17.7 0-32 14.3-32 32v736c0 17.7 14.3 32 32 32h736c17.7 0 32-14.3 32-32V144c0-17.7-14.3-32-32-32zM349.3 793.7H230.6V411.9h118.7v381.8zm-59.3-434a68.8 68.8 0 1 1 68.8-68.8c-.1 38-30.9 68.8-68.8 68.8zm503.7 434H675.1V608c0-44.3-.8-101.2-61.7-101.2c-61.7 0-71.2 48.2-71.2 98v188.9H423.7V411.9h113.8v52.2h1.6c15.8-30 54.5-61.7 112.3-61.7c120.2 0 142.3 79.1 142.3 181.9v209.4z"></path></svg>
</a>
</li>
<li>
<a href="">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--fa-brands" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 448 512" data-icon="fa-brands:pinterest-square" data-width="1em" data-height="1em"><path fill="currentColor" d="M448 80v352c0 26.5-21.5 48-48 48H154.4c9.8-16.4 22.4-40 27.4-59.3c3-11.5 15.3-58.4 15.3-58.4c8 15.3 31.4 28.2 56.3 28.2c74.1 0 127.4-68.1 127.4-152.7c0-81.1-66.2-141.8-151.4-141.8c-106 0-162.2 71.1-162.2 148.6c0 36 19.2 80.8 49.8 95.1c4.7 2.2 7.1 1.2 8.2-3.3c.8-3.4 5-20.1 6.8-27.8c.6-2.5.3-4.6-1.7-7c-10.1-12.3-18.3-34.9-18.3-56c0-54.2 41-106.6 110.9-106.6c60.3 0 102.6 41.1 102.6 99.9c0 66.4-33.5 112.4-77.2 112.4c-24.1 0-42.1-19.9-36.4-44.4c6.9-29.2 20.3-60.7 20.3-81.8c0-53-75.5-45.7-75.5 25c0 21.7 7.3 36.5 7.3 36.5c-31.4 132.8-36.1 134.5-29.6 192.6l2.2.8H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48z"></path></svg>
</a>
</li>
</ul>
</div>
<div class="instructor-bottom-item mt-20">
<button type="button" data-type="3" data-booking_instructor_user_id="2" data-hourly_fee="$ 50/h" data-hourly_rate="50" data-get_off_days_route="https://lmszai.zainikthemes.com/get-off-days/2" class="theme-btn theme-button1 theme-button3 w-100 bookSchedule" data-bs-toggle="modal" data-bs-target="#consultationBookingModal">Book Schedule
</button>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

@endsection

@push('script')
    <!--Hero text effect-->
    <script src="{{ asset('frontend/assets/js/hero-text-effect.js') }}"></script>

    <script src="{{ asset('frontend/assets/js/course/addToCart.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/course/addToWishlist.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/custom/booking.js') }}"></script>

    <!-- Video Player js -->
    <script src="{{ asset('frontend/assets/vendor/video-player/plyr.js') }}"></script>
    <!-- Video Player js -->
@endpush