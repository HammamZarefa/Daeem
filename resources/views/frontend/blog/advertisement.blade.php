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
                        <h3 class="page-banner-heading text-white pb-15">{{ __(@$pageTitle) }}</h3>

                        <!-- Breadcrumb Start-->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item font-14"><a href="{{ url('/') }}">{{__('Home')}}</a></li>
                                <li class="breadcrumb-item font-14 active" aria-current="page">{{ __(@$pageTitle) }}</li>
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

<!-- Course Single Details Area Start -->
<section class="blog-page-area section-t-space">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="blog-page-left-content row">

                    @forelse($blogs as $blog)
                    <!-- Blog Item Start -->
                    <div class="blog-item col-12 col-md-6 col-lg-4">

                        <div class="blog-item-img-wrap overflow-hidden position-relative">
                            <a href="{{ route('blog-details', $blog->slug) }}"><img src="{{ getImageFile($blog->image_path) }}" alt="img" class="img-fluid"></a>
                            <div class="blog-item-tag position-absolute font-12 font-semi-bold text-white bg-hover radius-3">{{ __(@$blog->category->name) }}</div>
                        </div>

                        <div class="blog-item-bottom-part">
                            <h3 class="card-title blog-title"><a href="{{ route('blog-details', $blog->slug) }}">{{ __($blog->title) }}</a></h3>
{{--                            <p class="blog-author-name-publish-date font-13 font-medium color-gray">By: {{ $blog->user->name }} / {{ $blog->created_at->format(' j  M, Y')  }}</p>--}}
{{--                            <p class="card-text blog-content">{!!  Str::limit($blog->details, 200) !!}</p>--}}

{{--                            <div class="blog-read-more-btn">--}}
{{--                                <a href="{{ route('blog-details', $blog->slug) }}" class="theme-btn font-15 ps-0 font-medium color-hover">{{ __('Read More') }} <i data-feather="arrow-right"></i></a>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                    <!-- Blog Item End -->
                    @empty
                        <div class="no-course-found text-center">
                            <img src="{{ asset('frontend/assets/img/empty-data-img.png') }}" alt="img" class="img-fluid">
                            <h5 class="mt-3">{{ __('Blog Not Found') }}</h5>
                        </div>
                    @endforelse
                    <div class="col-12">
                    <!-- Pagination Start -->
                    @if(@$blogs->hasPages())
                        {{ @$blogs->links('frontend.paginate.paginate') }}
                    @endif
                    <!-- Pagination End -->
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>
<!-- Course Single Details Area End -->

</div>

<input type="hidden" class="searchBlogRoute" value="{{ route('search-blog.list') }}">

@endsection

@push('script')
    <!-- Start:: Blog Search  -->
    <script src="{{ asset('frontend/assets/js/custom/search-blog-list.js') }}"></script>
    <!-- End:: Blog Search  -->
@endpush
