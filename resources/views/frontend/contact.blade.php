@extends('frontend.layouts.app')

@section('content')
<div class="bg-page">
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
                        <h3 class="page-banner-heading text-white pb-15">{{ __('Contact Us') }}</h3>

                        <!-- Breadcrumb Start-->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item font-14"><a href="{{ url('/') }}">{{__('Home')}}</a></li>
                                <li class="breadcrumb-item font-14 active" aria-current="page">{{ __('Contact Us') }}</li>
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

<!-- Contact Page Area Start -->
<section class="contact-page-area section-t-space">
    <div class="container">
        <div class="row">
            <!-- Contact page left side start-->
            <div class="col-md-6 col-lg-5 bg-white contact-page-left-side">

                <div class="contact-page-left-side-wrap">
                    <h5 class="contact-form-title font-24 font-semi-bold">{{ __(get_option('get_in_touch_title')) }}</h5>

                    <!-- Contact Info Item Start-->
                    <div class="contact-info-item d-flex align-items-center">
                        <div class="flex-shrink-0 contact-icon-img-wrap">
                            <img src="{{ asset('frontend/assets/img/icons-svg/contact-icon-1.png') }}" alt="feature">
                        </div>
                        <div class="flex-grow-1 ms-3 contact-info-content">
                            <p>{{ __(get_option('contact_us_location')) }}</p>
                        </div>
                    </div>
                    <!-- Contact Info Item End-->

                    <!-- Contact Info Item Start-->
                    <div class="contact-info-item d-flex align-items-center">
                        <div class="flex-shrink-0 contact-icon-img-wrap">
                            <img src="{{ asset('frontend/assets/img/icons-svg/contact-icon-2.png') }}" alt="feature">
                        </div>
                        <div class="flex-grow-1 ms-3 contact-info-content">
                            <p>{{ __(get_option('contact_us_email_one')) }}</p>
                            <p>{{ __(get_option('contact_us_email_two')) }}</p>
                        </div>
                    </div>
                    <!-- Contact Info Item End-->

                    <!-- Contact Info Item Start-->
                    <div class="contact-info-item d-flex align-items-center">
                        <div class="flex-shrink-0 contact-icon-img-wrap">
                            <img src="{{ asset('frontend/assets/img/icons-svg/contact-icon-3.png') }}" alt="feature">
                        </div>
                        <div class="flex-grow-1 ms-3 contact-info-content">
                            <p>{{ __(get_option('contact_us_phone_one')) }}</p>
                            <p>{{ __(get_option('contact_us_phone_two')) }}</p>
                        </div>
                    </div>
                    <!-- Contact Info Item End-->

                    <div class="contact-bottom-content">
                        <p class="color-gray mt-3">{{ __(get_option('contact_us_description')) }}</p>
                    </div>
                </div>

            </div>
            <!-- Contact page left side End-->

            <!-- Contact page right side start-->
            <div class="col-md-6 col-lg-7 bg-white contact-page-right">
                <div class="contact-form-area">
                    <h5 class="contact-form-title font-24 font-semi-bold">{{ __(get_option('send_us_msg_title')) }}</h5>
                    <form>
                        <div class="row">
                            <div class="col-md-6 mb-30">
                                <input type="text" class="form-control" id="inputName" placeholder="{{ __('Your name') }}*">
                            </div>
                            <div class="col-md-6 mb-30">
                                <input type="email" class="form-control" id="inputEmail" placeholder="{{ __('Your Email') }}*">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-30">
                                <select id="inputState" class="form-select contact_us_issue_id">
                                    <option value="">{{__('Select an Issue')}}</option>
                                    @foreach($contactUsIssues as $issue)
                                    <option value="{{ $issue->id }}">{{ __($issue->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-30">
                                <textarea class="form-control message" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="button" class="theme-btn theme-button1 theme-button3 w-100 font-15 fw-bold submitContactUs">{{__('Submit')}}</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Contact page right side End-->
        </div>

        <!-- Google Map Part Start-->
        <div class="row google-map-area section-t-space">
            <div class="col-12">
                <iframe src="{{ get_option('contact_us_map_link') }}" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
        <!-- Google Map Part End-->
    </div>
</section>
<!-- Contact Page Area End -->
</div>
<!-- ******************* servces-page programes ************************** -->
<section class="servces-page-area section-t-space">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-12 img-servce">

                <img src="{{ asset('frontend/assets/img/daeem/3.png') }}" alt="">

            </div>

            <div class="col-md-6 col-lg-6 u-content col-12">
               <div class="content">
               <h4> للأفراد </h4>
               <h6>خدمات الدعم والتطوير المهني والشخصي لافراد المجتمع من خلال الجلسات الكوتشينغ الفرديه والجماعيه المتنوعه الخدمات الكوتشينغ للناشئه خدمات التطوير المهني المتزامن وغير المتزامن</h6>
               </div>
            </div>
            <div class="col-12 section-t-space text-center">
            <a href="" class="theme-btn theme-button2 theme-button3 ">{{ __('View') }} <i data-feather="arrow-right"></i></a>
            </div>
        </div>
    </div>

    <div class="container section-t-space">
        <div class="row">
                <div class="col-md-6 col-lg-6 u-content col-12">
                <div class="content or-content">
                <h4> للمنظمات </h4>
                <h6>الكوتشينج، وسيلة للتعلم، والتطور، وتحقيق الأهداف والإنجازات فهو لديه أثر ايجابي على الطالب، المعلم، والفريق القيادي في المنشئة التعليمية. حيث يساعد الكوتشنج المدارس على تقديم المعلومات والمهارات الأساسية التي يحتاجها الطالب ليس فقط للتفوق الدراسي ولكن كي يستطيع تحقيق أهدافه في الحياة ويصبح انسان ناجحا.</h6>
                </div>
                </div>
                <div class="col-md-6 col-lg-6 col-12 img-servce">
                    <img src="{{ asset('frontend/assets/img/daeem/1.png') }}" alt="">
                </div>
                <div class="col-12 section-t-space text-center">
                <a href="" class="theme-btn theme-button2 theme-button3 ">{{ __('View') }} <i data-feather="arrow-right"></i></a>
                </div>
            </div>
        </div>
</section>

<!-- ******************* traning-page programes ************************** -->
<section class="consultation-page-area section-t-space">
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="courses-filter-bar">
                <div class="row">
                    <div class="filter-bar-left col-lg-8">
                        <div class="d-inline-flex align-items-center">
                        <div id="filter" class="actions-filter cursor sidebar-filter-btn color-gray d-flex align-items-center me-2">
                        <img src="https://lmszai.zainikthemes.com/frontend/assets/img/courses-img/filter-icon.png" alt="short" class="me-2">
                        Filter
                        </div>
                        </div>
                    </div>
                    <div class="filter-bar-right col-lg-4 text-end">
                        <div class="filter-box align-items-center justify-content-end">
                        <div class="filter-box-short-icon color-gray font-15"><p>Sort By:</p></div>
                        <select class="form-select form-select-sm filterSortBy">
                        <option value="1" selected="">Default</option>
                        <option value="2">Newest Bundle</option>
                        <option value="3">Oldest Bundle</option>
                        </select>
                        </div>
                    </div>
                </div>
        </div>

        </div>
    </div>
<div class="row shop-content">

<div class="col-md-12 col-lg-12 col-xl-12 show-all-course-area-wrap">
<di
v class="show-all-course-area">

<div id="loading" class="no-course-found text-center d-none">
<div id="inner-status"><img src="https://lmszai.zainikthemes.com/frontend/assets/img/loader.svg" alt="img"></div>
</div>
<div class="row courses-grids appendBundleCourseList">

<div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
<div class="card course-item border-0 radius-3 bg-white">
<div class="course-img-wrap overflow-hidden">
<a href="https://lmszai.zainikthemes.com/bundle-details/Bundle-course-Web-development-special-offer"><img src="https://lmszai.zainikthemes.com/uploads/bundle/1669902808-9TIvfckTbU.jpg" alt="course" class="img-fluid"></a>
<div class="course-item-hover-btns position-absolute">
<span class="course-item-btn addToWishlist" data-bundle_id="5" data-route="https://lmszai.zainikthemes.com/student/add-to-wishlist" title="Add to Wishlist">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
</span>
<span class="course-item-btn addToCart" data-bundle_id="5" data-route="https://lmszai.zainikthemes.com/student/add-to-cart" title="Add to Cart">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
</span>
</div>
</div>
<div class="card-body">
 <h5 class="card-title course-title"><a href="https://lmszai.zainikthemes.com/bundle-details/Bundle-course-Web-development-special-offer">Bundle course - Web development special...</a></h5>
<p class="card-text instructor-name-certificate font-medium font-12">
Benjamin Lucas
| Author Level 1
</p>
<div class="course-item-bottom">
<div class="instructor-bottom-item font-14 font-semi-bold mb-15">Courses: <span class="color-hover">2</span></div>
<div class="instructor-bottom-item font-14 font-semi-bold">Price: <span class="color-hover">
$ 200
</span>
</div>
</div>
</div>
</div>
</div>


<div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
<div class="card course-item border-0 radius-3 bg-white">
<div class="course-img-wrap overflow-hidden">
<a href="https://lmszai.zainikthemes.com/bundle-details/ultimate-renewable-energy-bundle-course-for-beginners"><img src="https://lmszai.zainikthemes.com/uploads/bundle/1662703371-UulOac2DpP.jpg" alt="course" class="img-fluid"></a>
<div class="course-item-hover-btns position-absolute">
<span class="course-item-btn addToWishlist" data-bundle_id="4" data-route="https://lmszai.zainikthemes.com/student/add-to-wishlist" title="Add to Wishlist">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
</span>
<span class="course-item-btn addToCart" data-bundle_id="4" data-route="https://lmszai.zainikthemes.com/student/add-to-cart" title="Add to Cart">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
</span>
</div>
</div>
<div class="card-body">
<h5 class="card-title course-title"><a href="https://lmszai.zainikthemes.com/bundle-details/ultimate-renewable-energy-bundle-course-for-beginners">Ultimate Renewable Energy Bundle Course...</a></h5>
<p class="card-text instructor-name-certificate font-medium font-12">
Johnny Depp
| Author Level 3
</p>
<div class="course-item-bottom">
<div class="instructor-bottom-item font-14 font-semi-bold mb-15">Courses: <span class="color-hover">3</span></div>
<div class="instructor-bottom-item font-14 font-semi-bold">Price: <span class="color-hover">
$ 199
</span>
</div>
</div>
</div>
</div>
</div>


<div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
<div class="card course-item border-0 radius-3 bg-white">
<div class="course-img-wrap overflow-hidden">
<a href="https://lmszai.zainikthemes.com/bundle-details/options-trading-basics-3-course-bundle"><img src="https://lmszai.zainikthemes.com/uploads/bundle/1662703180-xG4o7nZaOs.jpg" alt="course" class="img-fluid"></a>
<div class="course-item-hover-btns position-absolute">
<span class="course-item-btn addToWishlist" data-bundle_id="3" data-route="https://lmszai.zainikthemes.com/student/add-to-wishlist" title="Add to Wishlist">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
</span>
<span class="course-item-btn addToCart" data-bundle_id="3" data-route="https://lmszai.zainikthemes.com/student/add-to-cart" title="Add to Cart">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
</span>
</div>
</div>
<div class="card-body">
<h5 class="card-title course-title"><a href="https://lmszai.zainikthemes.com/bundle-details/options-trading-basics-3-course-bundle">Options Trading Basics (3-Course Bundle)</a></h5>
<p class="card-text instructor-name-certificate font-medium font-12">
Johnny Depp
| Author Level 3
</p>
<div class="course-item-bottom">
<div class="instructor-bottom-item font-14 font-semi-bold mb-15">Courses: <span class="color-hover">2</span></div>
<div class="instructor-bottom-item font-14 font-semi-bold">Price: <span class="color-hover">
$ 99
</span>
</div>
</div>
</div>
</div>
</div>


<div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
<div class="card course-item border-0 radius-3 bg-white">
<div class="course-img-wrap overflow-hidden">
<a href="https://lmszai.zainikthemes.com/bundle-details/bitcoin-ethereum-cryptocurrency-course-2-course-bundle"><img src="https://lmszai.zainikthemes.com/uploads/bundle/1662702790-NmtHUBxd9T.jpg" alt="course" class="img-fluid"></a>
<div class="course-item-hover-btns position-absolute">
<span class="course-item-btn addToWishlist" data-bundle_id="2" data-route="https://lmszai.zainikthemes.com/student/add-to-wishlist" title="Add to Wishlist">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
</span>
<span class="course-item-btn addToCart" data-bundle_id="2" data-route="https://lmszai.zainikthemes.com/student/add-to-cart" title="Add to Cart">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
</span>
</div>
</div>
<div class="card-body">
<h5 class="card-title course-title"><a href="https://lmszai.zainikthemes.com/bundle-details/bitcoin-ethereum-cryptocurrency-course-2-course-bundle">Bitcoin &amp; Ethereum CryptoCurrency Course...</a></h5>
<p class="card-text instructor-name-certificate font-medium font-12">
Johnny Depp
| Author Level 3
</p>
<div class="course-item-bottom">
<div class="instructor-bottom-item font-14 font-semi-bold mb-15">Courses: <span class="color-hover">2</span></div>
<div class="instructor-bottom-item font-14 font-semi-bold">Price: <span class="color-hover">
$ 70
</span>
</div>
 </div>
</div>
</div>
</div>


 <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
<div class="card course-item border-0 radius-3 bg-white">
<div class="course-img-wrap overflow-hidden">
<a href="https://lmszai.zainikthemes.com/bundle-details/Matching-learning-with-python-javascript"><img src="https://lmszai.zainikthemes.com/uploads/bundle/1662702126-5F3EyTbw6F.jpg" alt="course" class="img-fluid"></a>
<div class="course-item-hover-btns position-absolute">
<span class="course-item-btn addToWishlist" data-bundle_id="1" data-route="https://lmszai.zainikthemes.com/student/add-to-wishlist" title="Add to Wishlist">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
</span>
<span class="course-item-btn addToCart" data-bundle_id="1" data-route="https://lmszai.zainikthemes.com/student/add-to-cart" title="Add to Cart">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
</span>
</div>
</div>
<div class="card-body">
<h5 class="card-title course-title"><a href="https://lmszai.zainikthemes.com/bundle-details/Matching-learning-with-python-javascript">Matching learning with python &amp; javascri...</a></h5>
<p class="card-text instructor-name-certificate font-medium font-12">
Johnny Depp
| Author Level 3
</p>
<div class="course-item-bottom">
<div class="instructor-bottom-item font-14 font-semi-bold mb-15">Courses: <span class="color-hover">5</span></div>
<div class="instructor-bottom-item font-14 font-semi-bold">Price: <span class="color-hover">
$ 50
</span>
</div>
</div>
</div>
</div>
</div>


<div class="col-12">
</div>

</div>

</div>
</div>

</div>
</div>
</section>
<input type="hidden" value="{{ route('contact.store') }}" class="contactStoreRoute">
@endsection

@push('script')
    <script src="{{ asset('frontend/assets/js/custom/contact-us-store.js') }}"></script>
@endpush
