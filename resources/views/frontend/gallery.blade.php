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
                                <h3 class="page-banner-heading text-white pb-15">{{ __('Gallery') }}</h3>

                                <!-- Breadcrumb Start-->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item font-14"><a href="{{ url('/') }}">{{__('Home')}}</a>
                                        </li>
                                        <li class="breadcrumb-item font-14 active"
                                            aria-current="page">{{ __('Gallery') }}</li>
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
    <!-- ********************* tabs section start ********************* -->
    <section class="tab-section section-t-space galery-section ">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="Img-tab" data-bs-toggle="tab" data-bs-target="#Img"
                            type="button" role="tab" aria-controls="Img" aria-selected="true">Img
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="Video-tab" data-bs-toggle="tab" data-bs-target="#Video" type="button"
                            role="tab" aria-controls="Video" aria-selected="false">Video
                    </button>
                </li>
            </ul>
            <div class="tab-content section-t-space" id="myTabContent">
                <div class="tab-pane fade show active" id="Img" role="tabpanel" aria-labelledby="Img-tab">
                    <div class="gallery gallerys">
                        @forelse($images as $image)
                            <div class="gallery-item">
                                <div class="content">
                                    <img src="{{ getImageFile($image->image_path) }}" alt="">
                                    <div class="name">
                                        {{ __($image->title) }}
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="no-course-found text-center">
                                <img src="{{ asset('frontend/assets/img/empty-data-img.png') }}" alt="img"
                                     class="img-fluid">
                                <h5 class="mt-3">{{ __('Image Not Found') }}</h5>
                            </div>
                        @endforelse
                        {{--                        <div class="gallery-item">--}}
                        {{--                            <div class="content">--}}
                        {{--                                <img src="http://127.0.0.1:8000/uploads/setting/1677225335-l8XumH3xrE.png" alt="">--}}
                        {{--                                <div class="name">--}}
                        {{--                                    img name--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="gallery-item">--}}
                        {{--                            <div class="content"><img src="https://source.unsplash.com/random/?tech,substance" alt="">--}}
                        {{--                                <div class="name">--}}
                        {{--                                    img name--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="gallery-item">--}}
                        {{--                            <div class="content"><img src="https://source.unsplash.com/random/?tech,choose" alt="">--}}
                        {{--                                <div class="name">--}}
                        {{--                                    img name--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="gallery-item">--}}
                        {{--                            <div class="content"><img src="https://source.unsplash.com/random/?tech,past" alt="">--}}
                        {{--                                <div class="name">--}}
                        {{--                                    img name--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="gallery-item">--}}
                        {{--                            <div class="content"><img src="https://source.unsplash.com/random/?tech,lamp" alt="">--}}
                        {{--                                <div class="name">--}}
                        {{--                                    img name--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="gallery-item">--}}
                        {{--                            <div class="content"><img src="https://source.unsplash.com/random/?tech,yet" alt="">--}}
                        {{--                                <div class="name">--}}
                        {{--                                    img name--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="gallery-item">--}}
                        {{--                            <div class="content"><img src="https://source.unsplash.com/random/?tech,eight" alt="">--}}
                        {{--                                <div class="name">--}}
                        {{--                                    img name--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="gallery-item">--}}
                        {{--                            <div class="content"><img src="https://source.unsplash.com/random/?tech,crew" alt="">--}}
                        {{--                                <div class="name">--}}
                        {{--                                    img name--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="gallery-item">--}}
                        {{--                            <div class="content"><img src="https://source.unsplash.com/random/?tech,event" alt="">--}}
                        {{--                                <div class="name">--}}
                        {{--                                    img name--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="gallery-item">--}}
                        {{--                            <div class="content"><img src="https://source.unsplash.com/random/?tech,instrument" alt="">--}}
                        {{--                                <div class="name">--}}
                        {{--                                    img name--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="gallery-item">--}}
                        {{--                            <div class="content"><img src="https://source.unsplash.com/random/?tech,practical" alt="">--}}
                        {{--                                <div class="name">--}}
                        {{--                                    img name--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="gallery-item">--}}
                        {{--                            <div class="content"><img src="https://source.unsplash.com/random/?tech,pass" alt="">--}}
                        {{--                                <div class="name">--}}
                        {{--                                    img name--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="gallery-item">--}}
                        {{--                            <div class="content"><img src="https://source.unsplash.com/random/?tech,bigger" alt="">--}}
                        {{--                                <div class="name">--}}
                        {{--                                    img name--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="gallery-item">--}}
                        {{--                            <div class="content"><img src="https://source.unsplash.com/random/?tech,number" alt="">--}}
                        {{--                                <div class="name">--}}
                        {{--                                    img name--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="gallery-item">--}}
                        {{--                            <div class="content"><img src="https://source.unsplash.com/random/?tech,feature" alt="">--}}
                        {{--                                <div class="name">--}}
                        {{--                                    img name--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="gallery-item">--}}
                        {{--                            <div class="content"><img src="https://source.unsplash.com/random/?tech,line" alt="">--}}
                        {{--                                <div class="name">--}}
                        {{--                                    img name--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="gallery-item">--}}
                        {{--                            <div class="content"><img src="https://source.unsplash.com/random/?tech,railroad" alt="">--}}
                        {{--                                <div class="name">--}}
                        {{--                                    img name--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="gallery-item">--}}
                        {{--                            <div class="content"><img src="https://source.unsplash.com/random/?tech,pride" alt="">--}}
                        {{--                                <div class="name">--}}
                        {{--                                    img name--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="gallery-item">--}}
                        {{--                            <div class="content"><img src="https://source.unsplash.com/random/?tech,too" alt="">--}}
                        {{--                                <div class="name">--}}
                        {{--                                    img name--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="gallery-item">--}}
                        {{--                            <div class="content"><img src="https://source.unsplash.com/random/?tech,bottle" alt="">--}}
                        {{--                                <div class="name">--}}
                        {{--                                    img name--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="gallery-item">--}}
                        {{--                            <div class="content"><img src="https://source.unsplash.com/random/?tech,base" alt="">--}}
                        {{--                                <div class="name">--}}
                        {{--                                    img name--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="gallery-item">--}}
                        {{--                            <div class="content"><img src="https://source.unsplash.com/random/?tech,cell" alt="">--}}
                        {{--                                <div class="name">--}}
                        {{--                                    img name--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="gallery-item">--}}
                        {{--                            <div class="content"><img src="https://source.unsplash.com/random/?tech,bag" alt="">--}}
                        {{--                                <div class="name">--}}
                        {{--                                    img name--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="gallery-item">--}}
                        {{--                            <div class="content"><img src="https://source.unsplash.com/random/?tech,card" alt="">--}}
                        {{--                                <div class="name">--}}
                        {{--                                    img name--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                    </div>
                </div>
                <div class="tab-pane fade" id="Video" role="tabpanel" aria-labelledby="Video-tab">
                    <div class="row">
                        <div class="col-12 col-md-3 col-lg-4 col-xl-6">
                            <video width="320" height="240" controls>
                                <source id='mp4' src="http://media.w3.org/2010/05/sintel/trailer.mp4" type='video/mp4'/>
                            </video>
                            <div class="name">
                                video name
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ********************* tabs section end ********************* -->

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
    <script>
        // img section
        var gallery = document.querySelector('.gallerys');
        var getVal = function (elem, style) {
            return parseInt(window.getComputedStyle(elem).getPropertyValue(style));
        };
        var getHeight = function (item) {
            return item.querySelector('.content').getBoundingClientRect().height;
        };
        var resizeAll = function () {
            var altura = getVal(gallery, 'grid-auto-rows');
            var gap = getVal(gallery, 'grid-row-gap');
            gallery.querySelectorAll('.gallery-item').forEach(function (item) {
                var el = item;
                el.style.gridRowEnd = "span " + Math.ceil((getHeight(item) + gap) / (altura + gap));
            });
        };
        gallery.querySelectorAll('img').forEach(function (item) {
            item.classList.add('byebye');
            if (item.complete) {
                console.log(item.src);
            } else {
                item.addEventListener('load', function () {
                    var altura = getVal(gallery, 'grid-auto-rows');
                    var gap = getVal(gallery, 'grid-row-gap');
                    var gitem = item.parentElement.parentElement;
                    gitem.style.gridRowEnd = "span " + Math.ceil((getHeight(gitem) + gap) / (altura + gap));
                    item.classList.remove('byebye');
                });
            }
        });
        window.addEventListener('resize', resizeAll);
        gallery.querySelectorAll('.gallery-item').forEach(function (item) {
            item.addEventListener('click', function () {
                item.classList.toggle('full');
            });
        });

        //  video

    </script>
    <!-- Shuffle js filter and masonry Start -->
@endpush
