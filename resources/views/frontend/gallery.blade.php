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
                                <li class="breadcrumb-item font-14"><a href="{{ url('/') }}">{{__('Home')}}</a></li>
                                <li class="breadcrumb-item font-14 active" aria-current="page">{{ __('About Us') }}</li>
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
