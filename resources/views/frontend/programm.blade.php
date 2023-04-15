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
                        <h3 class="page-banner-heading text-white pb-15">{{ __('Programm') }}</h3>

                        <!-- Breadcrumb Start-->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item font-14"><a href="{{ url('/') }}">{{__('Home')}}</a></li>
                                <li class="breadcrumb-item font-14 active" aria-current="page">{{ __('Programm') }}</li>
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
<section class="tab-section section-t-space">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item na-item" role="presentation">
                    <button class="nav-link na-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">المؤتمرات والملتقيات
</button>
                </li>
                <li class="nav-item na-item" role="presentation">
                    <button class="nav-link na-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">البرامج الشبابية
</button>
                </li>
                <li class="nav-item na-item" role="presentation">
                    <button class="nav-link na-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">التطوير المهني
</button>
                </li>
                <li class="nav-item na-item" role="presentation">
                    <button class="nav-link na-link" id="contact2-tab" data-bs-toggle="tab" data-bs-target="#contact2" type="button" role="tab" aria-controls="contact2" aria-selected="false">تأهيل الكوتشز
</button>
                </li>
            </ul>
            <div class="tab-content section-t-space" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <!-- *************** item **************** -->
                    <div class="container">
    <div class="row">
        <div class="col-12">
            <div class="courses-filter-bar">
                <div class="row">
                    <div class="filter-bar-left col-lg-8">
                        <div class="d-inline-flex align-items-center">
                        <div id="filter" class="actions-filter cursor sidebar-filter-btn color-gray d-flex align-items-center me-2">
                        <img src="https://DAEEM.zainikthemes.com/frontend/assets/img/courses-img/filter-icon.png" alt="short" class="me-2">
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
<div id="inner-status"><img src="https://DAEEM.zainikthemes.com/frontend/assets/img/loader.svg" alt="img"></div>
</div>
<div class="row courses-grids appendBundleCourseList">

<div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
<div class="card course-item border-0 radius-3 bg-white">
<div class="course-img-wrap overflow-hidden">

<a href="{{ route('programm_details') }}"><img src="https://DAEEM.zainikthemes.com/uploads/bundle/1669902808-9TIvfckTbU.jpg" alt="course" class="img-fluid"></a>
<div class="course-item-hover-btns position-absolute">
<span class="course-item-btn addToWishlist" data-bundle_id="5" data-route="https://DAEEM.zainikthemes.com/student/add-to-wishlist" title="Add to Wishlist">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
</span>
<span class="course-item-btn addToCart" data-bundle_id="5" data-route="https://DAEEM.zainikthemes.com/student/add-to-cart" title="Add to Cart">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
</span>
</div>
</div>
<div class="card-body">
 <h5 class="card-title course-title"><a href="{{ route('programm_details') }}">Bundle course - Web development special...</a></h5>
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
<a href="https://DAEEM.zainikthemes.com/bundle-details/ultimate-renewable-energy-bundle-course-for-beginners"><img src="https://DAEEM.zainikthemes.com/uploads/bundle/1662703371-UulOac2DpP.jpg" alt="course" class="img-fluid"></a>
<div class="course-item-hover-btns position-absolute">
<span class="course-item-btn addToWishlist" data-bundle_id="4" data-route="https://DAEEM.zainikthemes.com/student/add-to-wishlist" title="Add to Wishlist">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
</span>
<span class="course-item-btn addToCart" data-bundle_id="4" data-route="https://DAEEM.zainikthemes.com/student/add-to-cart" title="Add to Cart">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
</span>
</div>
</div>
<div class="card-body">
<h5 class="card-title course-title"><a href="https://DAEEM.zainikthemes.com/bundle-details/ultimate-renewable-energy-bundle-course-for-beginners">Ultimate Renewable Energy Bundle Course...</a></h5>
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
<a href="https://DAEEM.zainikthemes.com/bundle-details/options-trading-basics-3-course-bundle"><img src="https://DAEEM.zainikthemes.com/uploads/bundle/1662703180-xG4o7nZaOs.jpg" alt="course" class="img-fluid"></a>
<div class="course-item-hover-btns position-absolute">
<span class="course-item-btn addToWishlist" data-bundle_id="3" data-route="https://DAEEM.zainikthemes.com/student/add-to-wishlist" title="Add to Wishlist">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
</span>
<span class="course-item-btn addToCart" data-bundle_id="3" data-route="https://DAEEM.zainikthemes.com/student/add-to-cart" title="Add to Cart">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
</span>
</div>
</div>
<div class="card-body">
<h5 class="card-title course-title"><a href="https://DAEEM.zainikthemes.com/bundle-details/options-trading-basics-3-course-bundle">Options Trading Basics (3-Course Bundle)</a></h5>
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
<a href="https://DAEEM.zainikthemes.com/bundle-details/bitcoin-ethereum-cryptocurrency-course-2-course-bundle"><img src="https://DAEEM.zainikthemes.com/uploads/bundle/1662702790-NmtHUBxd9T.jpg" alt="course" class="img-fluid"></a>
<div class="course-item-hover-btns position-absolute">
<span class="course-item-btn addToWishlist" data-bundle_id="2" data-route="https://DAEEM.zainikthemes.com/student/add-to-wishlist" title="Add to Wishlist">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
</span>
<span class="course-item-btn addToCart" data-bundle_id="2" data-route="https://DAEEM.zainikthemes.com/student/add-to-cart" title="Add to Cart">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
</span>
</div>
</div>
<div class="card-body">
<h5 class="card-title course-title"><a href="https://DAEEM.zainikthemes.com/bundle-details/bitcoin-ethereum-cryptocurrency-course-2-course-bundle">Bitcoin &amp; Ethereum CryptoCurrency Course...</a></h5>
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
<a href="https://DAEEM.zainikthemes.com/bundle-details/Matching-learning-with-python-javascript"><img src="https://DAEEM.zainikthemes.com/uploads/bundle/1662702126-5F3EyTbw6F.jpg" alt="course" class="img-fluid"></a>
<div class="course-item-hover-btns position-absolute">
<span class="course-item-btn addToWishlist" data-bundle_id="1" data-route="https://DAEEM.zainikthemes.com/student/add-to-wishlist" title="Add to Wishlist">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
</span>
<span class="course-item-btn addToCart" data-bundle_id="1" data-route="https://DAEEM.zainikthemes.com/student/add-to-cart" title="Add to Cart">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
</span>
</div>
</div>
<div class="card-body">
<h5 class="card-title course-title"><a href="https://DAEEM.zainikthemes.com/bundle-details/Matching-learning-with-python-javascript">Matching learning with python &amp; javascri...</a></h5>
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




</div>

</div>
</div>

</div>
                </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <!-- ************** item  ************** -->
                <div class="container">
    <div class="row">
        <div class="col-12">
            <div class="courses-filter-bar">
                <div class="row">
                    <div class="filter-bar-left col-lg-8">
                        <div class="d-inline-flex align-items-center">
                        <div id="filter" class="actions-filter cursor sidebar-filter-btn color-gray d-flex align-items-center me-2">
                        <img src="https://DAEEM.zainikthemes.com/frontend/assets/img/courses-img/filter-icon.png" alt="short" class="me-2">
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
<div id="inner-status"><img src="https://DAEEM.zainikthemes.com/frontend/assets/img/loader.svg" alt="img"></div>
</div>
<div class="row courses-grids appendBundleCourseList">

<div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
<div class="card course-item border-0 radius-3 bg-white">
<div class="course-img-wrap overflow-hidden">
<a href="{{ route('programm_details') }}"><img src="https://DAEEM.zainikthemes.com/uploads/bundle/1669902808-9TIvfckTbU.jpg" alt="course" class="img-fluid"></a>
<div class="course-item-hover-btns position-absolute">
<span class="course-item-btn addToWishlist" data-bundle_id="5" data-route="https://DAEEM.zainikthemes.com/student/add-to-wishlist" title="Add to Wishlist">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
</span>
<span class="course-item-btn addToCart" data-bundle_id="5" data-route="https://DAEEM.zainikthemes.com/student/add-to-cart" title="Add to Cart">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
</span>
</div>
</div>
<div class="card-body">
 <h5 class="card-title course-title"><a href="{{ route('programm_details') }}">Bundle course - Web development special...</a></h5>
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
<a href="https://DAEEM.zainikthemes.com/bundle-details/ultimate-renewable-energy-bundle-course-for-beginners"><img src="https://DAEEM.zainikthemes.com/uploads/bundle/1662703371-UulOac2DpP.jpg" alt="course" class="img-fluid"></a>
<div class="course-item-hover-btns position-absolute">
<span class="course-item-btn addToWishlist" data-bundle_id="4" data-route="https://DAEEM.zainikthemes.com/student/add-to-wishlist" title="Add to Wishlist">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
</span>
<span class="course-item-btn addToCart" data-bundle_id="4" data-route="https://DAEEM.zainikthemes.com/student/add-to-cart" title="Add to Cart">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
</span>
</div>
</div>
<div class="card-body">
<h5 class="card-title course-title"><a href="https://DAEEM.zainikthemes.com/bundle-details/ultimate-renewable-energy-bundle-course-for-beginners">Ultimate Renewable Energy Bundle Course...</a></h5>
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
<a href="https://DAEEM.zainikthemes.com/bundle-details/options-trading-basics-3-course-bundle"><img src="https://DAEEM.zainikthemes.com/uploads/bundle/1662703180-xG4o7nZaOs.jpg" alt="course" class="img-fluid"></a>
<div class="course-item-hover-btns position-absolute">
<span class="course-item-btn addToWishlist" data-bundle_id="3" data-route="https://DAEEM.zainikthemes.com/student/add-to-wishlist" title="Add to Wishlist">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
</span>
<span class="course-item-btn addToCart" data-bundle_id="3" data-route="https://DAEEM.zainikthemes.com/student/add-to-cart" title="Add to Cart">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
</span>
</div>
</div>
<div class="card-body">
<h5 class="card-title course-title"><a href="https://DAEEM.zainikthemes.com/bundle-details/options-trading-basics-3-course-bundle">Options Trading Basics (3-Course Bundle)</a></h5>
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
<a href="https://DAEEM.zainikthemes.com/bundle-details/bitcoin-ethereum-cryptocurrency-course-2-course-bundle"><img src="https://DAEEM.zainikthemes.com/uploads/bundle/1662702790-NmtHUBxd9T.jpg" alt="course" class="img-fluid"></a>
<div class="course-item-hover-btns position-absolute">
<span class="course-item-btn addToWishlist" data-bundle_id="2" data-route="https://DAEEM.zainikthemes.com/student/add-to-wishlist" title="Add to Wishlist">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
</span>
<span class="course-item-btn addToCart" data-bundle_id="2" data-route="https://DAEEM.zainikthemes.com/student/add-to-cart" title="Add to Cart">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
</span>
</div>
</div>
<div class="card-body">
<h5 class="card-title course-title"><a href="https://DAEEM.zainikthemes.com/bundle-details/bitcoin-ethereum-cryptocurrency-course-2-course-bundle">Bitcoin &amp; Ethereum CryptoCurrency Course...</a></h5>
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
<a href="https://DAEEM.zainikthemes.com/bundle-details/Matching-learning-with-python-javascript"><img src="https://DAEEM.zainikthemes.com/uploads/bundle/1662702126-5F3EyTbw6F.jpg" alt="course" class="img-fluid"></a>
<div class="course-item-hover-btns position-absolute">
<span class="course-item-btn addToWishlist" data-bundle_id="1" data-route="https://DAEEM.zainikthemes.com/student/add-to-wishlist" title="Add to Wishlist">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
</span>
<span class="course-item-btn addToCart" data-bundle_id="1" data-route="https://DAEEM.zainikthemes.com/student/add-to-cart" title="Add to Cart">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
</span>
</div>
</div>
<div class="card-body">
<h5 class="card-title course-title"><a href="https://DAEEM.zainikthemes.com/bundle-details/Matching-learning-with-python-javascript">Matching learning with python &amp; javascri...</a></h5>
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




</div>
</div>

</div>
</div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <!-- ************** item  *************** -->
                <div class="container">
    <div class="row">
        <div class="col-12">
            <div class="courses-filter-bar">
                <div class="row">
                    <div class="filter-bar-left col-lg-8">
                        <div class="d-inline-flex align-items-center">
                        <div id="filter" class="actions-filter cursor sidebar-filter-btn color-gray d-flex align-items-center me-2">
                        <img src="https://DAEEM.zainikthemes.com/frontend/assets/img/courses-img/filter-icon.png" alt="short" class="me-2">
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
<div id="inner-status"><img src="https://DAEEM.zainikthemes.com/frontend/assets/img/loader.svg" alt="img"></div>
</div>
<div class="row courses-grids appendBundleCourseList">

<div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
<div class="card course-item border-0 radius-3 bg-white">
<div class="course-img-wrap overflow-hidden">
<a href="{{ route('programm_details') }}"><img src="https://DAEEM.zainikthemes.com/uploads/bundle/1669902808-9TIvfckTbU.jpg" alt="course" class="img-fluid"></a>
<div class="course-item-hover-btns position-absolute">
<span class="course-item-btn addToWishlist" data-bundle_id="5" data-route="https://DAEEM.zainikthemes.com/student/add-to-wishlist" title="Add to Wishlist">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
</span>
<span class="course-item-btn addToCart" data-bundle_id="5" data-route="https://DAEEM.zainikthemes.com/student/add-to-cart" title="Add to Cart">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
</span>
</div>
</div>
<div class="card-body">
 <h5 class="card-title course-title"><a href="{{ route('programm_details') }}">Bundle course - Web development special...</a></h5>
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
<a href="https://DAEEM.zainikthemes.com/bundle-details/ultimate-renewable-energy-bundle-course-for-beginners"><img src="https://DAEEM.zainikthemes.com/uploads/bundle/1662703371-UulOac2DpP.jpg" alt="course" class="img-fluid"></a>
<div class="course-item-hover-btns position-absolute">
<span class="course-item-btn addToWishlist" data-bundle_id="4" data-route="https://DAEEM.zainikthemes.com/student/add-to-wishlist" title="Add to Wishlist">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
</span>
<span class="course-item-btn addToCart" data-bundle_id="4" data-route="https://DAEEM.zainikthemes.com/student/add-to-cart" title="Add to Cart">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
</span>
</div>
</div>
<div class="card-body">
<h5 class="card-title course-title"><a href="https://DAEEM.zainikthemes.com/bundle-details/ultimate-renewable-energy-bundle-course-for-beginners">Ultimate Renewable Energy Bundle Course...</a></h5>
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
<a href="https://DAEEM.zainikthemes.com/bundle-details/options-trading-basics-3-course-bundle"><img src="https://DAEEM.zainikthemes.com/uploads/bundle/1662703180-xG4o7nZaOs.jpg" alt="course" class="img-fluid"></a>
<div class="course-item-hover-btns position-absolute">
<span class="course-item-btn addToWishlist" data-bundle_id="3" data-route="https://DAEEM.zainikthemes.com/student/add-to-wishlist" title="Add to Wishlist">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
</span>
<span class="course-item-btn addToCart" data-bundle_id="3" data-route="https://DAEEM.zainikthemes.com/student/add-to-cart" title="Add to Cart">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
</span>
</div>
</div>
<div class="card-body">
<h5 class="card-title course-title"><a href="https://DAEEM.zainikthemes.com/bundle-details/options-trading-basics-3-course-bundle">Options Trading Basics (3-Course Bundle)</a></h5>
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
<a href="https://DAEEM.zainikthemes.com/bundle-details/bitcoin-ethereum-cryptocurrency-course-2-course-bundle"><img src="https://DAEEM.zainikthemes.com/uploads/bundle/1662702790-NmtHUBxd9T.jpg" alt="course" class="img-fluid"></a>
<div class="course-item-hover-btns position-absolute">
<span class="course-item-btn addToWishlist" data-bundle_id="2" data-route="https://DAEEM.zainikthemes.com/student/add-to-wishlist" title="Add to Wishlist">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
</span>
<span class="course-item-btn addToCart" data-bundle_id="2" data-route="https://DAEEM.zainikthemes.com/student/add-to-cart" title="Add to Cart">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
</span>
</div>
</div>
<div class="card-body">
<h5 class="card-title course-title"><a href="https://DAEEM.zainikthemes.com/bundle-details/bitcoin-ethereum-cryptocurrency-course-2-course-bundle">Bitcoin &amp; Ethereum CryptoCurrency Course...</a></h5>
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
<a href="https://DAEEM.zainikthemes.com/bundle-details/Matching-learning-with-python-javascript"><img src="https://DAEEM.zainikthemes.com/uploads/bundle/1662702126-5F3EyTbw6F.jpg" alt="course" class="img-fluid"></a>
<div class="course-item-hover-btns position-absolute">
<span class="course-item-btn addToWishlist" data-bundle_id="1" data-route="https://DAEEM.zainikthemes.com/student/add-to-wishlist" title="Add to Wishlist">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
</span>
<span class="course-item-btn addToCart" data-bundle_id="1" data-route="https://DAEEM.zainikthemes.com/student/add-to-cart" title="Add to Cart">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
</span>
</div>
</div>
<div class="card-body">
<h5 class="card-title course-title"><a href="https://DAEEM.zainikthemes.com/bundle-details/Matching-learning-with-python-javascript">Matching learning with python &amp; javascri...</a></h5>
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





</div>
</div>

</div>
</div>
            </div>
            <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="contact2-tab">
                <!-- ************** item  *************** -->
                <div class="container">
    <div class="row">
        <div class="col-12">
            <div class="courses-filter-bar">
                <div class="row">
                    <div class="filter-bar-left col-lg-8">
                        <div class="d-inline-flex align-items-center">
                        <div id="filter" class="actions-filter cursor sidebar-filter-btn color-gray d-flex align-items-center me-2">
                        <img src="https://DAEEM.zainikthemes.com/frontend/assets/img/courses-img/filter-icon.png" alt="short" class="me-2">
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
<div id="inner-status"><img src="https://DAEEM.zainikthemes.com/frontend/assets/img/loader.svg" alt="img"></div>
</div>
<div class="row courses-grids appendBundleCourseList">

<div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
<div class="card course-item border-0 radius-3 bg-white">
<div class="course-img-wrap overflow-hidden">
<a href="{{ route('programm_details') }}"><img src="https://DAEEM.zainikthemes.com/uploads/bundle/1669902808-9TIvfckTbU.jpg" alt="course" class="img-fluid"></a>
<div class="course-item-hover-btns position-absolute">
<span class="course-item-btn addToWishlist" data-bundle_id="5" data-route="https://DAEEM.zainikthemes.com/student/add-to-wishlist" title="Add to Wishlist">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
</span>
<span class="course-item-btn addToCart" data-bundle_id="5" data-route="https://DAEEM.zainikthemes.com/student/add-to-cart" title="Add to Cart">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
</span>
</div>
</div>
<div class="card-body">
 <h5 class="card-title course-title"><a href="{{ route('programm_details') }}">Bundle course - Web development special...</a></h5>
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
<a href="https://DAEEM.zainikthemes.com/bundle-details/ultimate-renewable-energy-bundle-course-for-beginners"><img src="https://DAEEM.zainikthemes.com/uploads/bundle/1662703371-UulOac2DpP.jpg" alt="course" class="img-fluid"></a>
<div class="course-item-hover-btns position-absolute">
<span class="course-item-btn addToWishlist" data-bundle_id="4" data-route="https://DAEEM.zainikthemes.com/student/add-to-wishlist" title="Add to Wishlist">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
</span>
<span class="course-item-btn addToCart" data-bundle_id="4" data-route="https://DAEEM.zainikthemes.com/student/add-to-cart" title="Add to Cart">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
</span>
</div>
</div>
<div class="card-body">
<h5 class="card-title course-title"><a href="https://DAEEM.zainikthemes.com/bundle-details/ultimate-renewable-energy-bundle-course-for-beginners">Ultimate Renewable Energy Bundle Course...</a></h5>
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
<a href="https://DAEEM.zainikthemes.com/bundle-details/options-trading-basics-3-course-bundle"><img src="https://DAEEM.zainikthemes.com/uploads/bundle/1662703180-xG4o7nZaOs.jpg" alt="course" class="img-fluid"></a>
<div class="course-item-hover-btns position-absolute">
<span class="course-item-btn addToWishlist" data-bundle_id="3" data-route="https://DAEEM.zainikthemes.com/student/add-to-wishlist" title="Add to Wishlist">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
</span>
<span class="course-item-btn addToCart" data-bundle_id="3" data-route="https://DAEEM.zainikthemes.com/student/add-to-cart" title="Add to Cart">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
</span>
</div>
</div>
<div class="card-body">
<h5 class="card-title course-title"><a href="https://DAEEM.zainikthemes.com/bundle-details/options-trading-basics-3-course-bundle">Options Trading Basics (3-Course Bundle)</a></h5>
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
<a href="https://DAEEM.zainikthemes.com/bundle-details/bitcoin-ethereum-cryptocurrency-course-2-course-bundle"><img src="https://DAEEM.zainikthemes.com/uploads/bundle/1662702790-NmtHUBxd9T.jpg" alt="course" class="img-fluid"></a>
<div class="course-item-hover-btns position-absolute">
<span class="course-item-btn addToWishlist" data-bundle_id="2" data-route="https://DAEEM.zainikthemes.com/student/add-to-wishlist" title="Add to Wishlist">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
</span>
<span class="course-item-btn addToCart" data-bundle_id="2" data-route="https://DAEEM.zainikthemes.com/student/add-to-cart" title="Add to Cart">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
</span>
</div>
</div>
<div class="card-body">
<h5 class="card-title course-title"><a href="https://DAEEM.zainikthemes.com/bundle-details/bitcoin-ethereum-cryptocurrency-course-2-course-bundle">Bitcoin &amp; Ethereum CryptoCurrency Course...</a></h5>
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
<a href="https://DAEEM.zainikthemes.com/bundle-details/Matching-learning-with-python-javascript"><img src="https://DAEEM.zainikthemes.com/uploads/bundle/1662702126-5F3EyTbw6F.jpg" alt="course" class="img-fluid"></a>
<div class="course-item-hover-btns position-absolute">
<span class="course-item-btn addToWishlist" data-bundle_id="1" data-route="https://DAEEM.zainikthemes.com/student/add-to-wishlist" title="Add to Wishlist">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
</span>
<span class="course-item-btn addToCart" data-bundle_id="1" data-route="https://DAEEM.zainikthemes.com/student/add-to-cart" title="Add to Cart">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
</span>
</div>
</div>
<div class="card-body">
<h5 class="card-title course-title"><a href="https://DAEEM.zainikthemes.com/bundle-details/Matching-learning-with-python-javascript">Matching learning with python &amp; javascri...</a></h5>
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





</div>
</div>

</div>
</div>
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
