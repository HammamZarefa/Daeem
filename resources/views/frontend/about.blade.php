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
                        <h3 class="page-banner-heading text-white pb-15">{{ __('About Us') }}</h3>

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

<!-- Gallery Area Start -->
<section class="our-gallery-area section-t-space">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center">
                    <h3 class="section-heading">{{ __(@$aboutUsGeneral->gallery_area_title) }}</h3>
                    <p class="section-sub-heading">{{ __(@$aboutUsGeneral->gallery_area_subtitle) }}</p>
                </div>
            </div>
        </div>

        <div class="gallery-img-wrapper">
            <!--Our Gallery image Start-->
            <div class="row shuffle-wrapper">
                <div class="col-lg-6 col-6 mb-25 shuffle-item wow fadeIn" data-groups="[&quot;all&quot;]" data-wow-duration="0.5s" data-wow-delay=".25s">
                    <div class="position-relative hover-wrapper">
                        <img src="{{ getImageFile($aboutUsGeneral->gallery_first_image) }}" alt="portfolio-image" class="img-fluid w-100 d-block">
                    </div>
                </div>
                <div class="col-lg-6 col-6 mb-25 shuffle-item wow fadeIn" data-groups="[&quot;all&quot;]" data-wow-duration="0.5s" data-wow-delay=".25s">
                    <div class="position-relative hover-wrapper">
                        <img src="{{ getImageFile($aboutUsGeneral->gallery_second_image) }}" alt="portfolio-image" class="img-fluid w-100 d-block">
                    </div>
                </div>
                <div class="col-lg-6 col-6 mb-25 shuffle-item wow fadeIn" data-groups="[&quot;all&quot;]" data-wow-duration="0.5s" data-wow-delay=".25s">
                    <div class="position-relative hover-wrapper">
                        <img src="{{ getImageFile($aboutUsGeneral->gallery_third_image) }}" alt="portfolio-image" class="img-fluid w-100 d-block">
                    </div>
                </div>
            </div>
            <!--Our Gallery image End-->
        </div>

    </div>
</section>
<!-- Gallery Area End -->

<!-- Our History Area Start -->
{{--<section class="our-history-area bg-page section-t-space" id="Vision">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-12">--}}
{{--                <div class="section-title text-center">--}}
{{--                    <h3 class="section-heading">{{ __(@$aboutUsGeneral->our_history_title) }}</h3>--}}
{{--                    <p class="section-sub-heading">{{ __(@$aboutUsGeneral->our_history_subtitle) }}</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--            <div class="container-timeline">--}}
{{--                <ul>--}}
{{--                    @foreach($ourHistories as $ourHistory)--}}
{{--                    <li>--}}
{{--                        <h6 class="history-year">{{ $ourHistory->year }}</h6>--}}
{{--                        <div class="history-content">--}}
{{--                            <h6 class="h6 fw-bold font-18">{{ Str::limit($ourHistory->title, 23) }}</h6>--}}
{{--                            <p class="font-15 pt-1">{{ Str::limit($ourHistory->subtitle, 100) }}</p>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
<!-- Our History Area End -->

<!-- Our History Area Start -->
<section class="our-history-area bg-page section-t-space" id="Vision">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center">
                    <h3 class="section-heading">الرؤية</h3>
                    <p class="section-sub-heading">أول منصة عربية، لتحقيق الريادة عربي وعالمي، في مجال الكوتشينج التربوي والتعليمي.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="our-servcies section-t-space" id="Vision">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center">
                    <h3 class="section-heading">الرسالة</h3>
                    <p class="section-sub-heading">تقديم خدمات الكوتشينج النوعية، لتمكين المؤسسات وا£فراد من تجويد المخرجات في مجال التربية
                        والتعليم.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Our History Area End -->

<section class="section-t-space our-goal" id="Goal">
    <div class="container">
    <div class="row">
            <div class="col-12">
                <div class="section-title text-center">
                    <h3 class="section-heading text-white">{{ __('Our Goal') }}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <ul>
                    <li>
                        <i class="iconify" data-icon="ic:baseline-star-border"></i>
                        <span class="text-white">نشر ثقافة الكوتشينج التربوي والتعليمي في المؤسسات التربوية والتعليمية.</span>
                    </li>
                    <li>
                        <i class="iconify" data-icon="ic:baseline-star-border"></i>
                        <span class="text-white">تصميم وابتكار البرامج والانشطة التربوية لرعاية الناشئة وتحسين جودة حياتهم واختياراتهم وفق نماذج وأدوات الكوتشينج التربوي.</span>
                    </li>
                    <li>
                        <i class="iconify" data-icon="ic:baseline-star-border"></i>
                        <span class="text-white"">الشراكة مع الجهات والمؤسسات التربوية والتعليمية لتطوير عملها ودعم وتحفيز منسوبيها.</span>
                    </li>
                    <li>
                        <i class="iconify" data-icon="ic:baseline-star-border"></i>
                        <span class="text-white">استخدام أدوات ونماذج الكوتشينج التربوي والتعليمي لدعم وتحفيز الناشئة تعليمياً وتربويا وتحسين جودة حياتهم.</span>
                    </li>
                    <li>
                        <i class="iconify" data-icon="ic:baseline-star-border"></i>
                        <span class="text-white">المشاركة في الملتقيات العلمية والندوات والمؤتمرات محليا ودوليا.</span>
                    </li>
                    <li>
                        <i class="iconify" data-icon="ic:baseline-star-border"></i>
                        <span class="text-white">تأهيل كوتشز متخصصين في مجال الكوتشينج التربوي والتعليمي وتطوير اداءهم ومهارتهم</span>
                    </li>
                    <li>
                        <i class="iconify" data-icon="ic:baseline-star-border"></i>
                        <span class="text-white">تأهيل الكوتش المعلم لصقل شخصية المتعلم ورفع نواتجه التعليمية  .</span>
                    </li>
                    <li>
                        <i class="iconify" data-icon="ic:baseline-star-border"></i>
                        <span class="text-white">توفير خدمات الكوتشينج التربوي والتعليمي بشكل متكامل في مكان واحد</span>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</section>
<!-- our servcies -->
<section class="our-servcies section-t-space" id="Servcies">
    <!-- ******************* servces-page programes ************************** -->

					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<!--Animation Block-->
								<div>
									<!--Section Title-->
                                    <div class="section-title text-center">
                                        <h3 class="section-heading">{{ __('Our Servcies') }}</h3>
                                    </div>
								</div>
							</div>
						</div>
                        <!-- <section class="servces-page-area section-t-space">
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
            </div>
        </div>
</section> -->
						<div class="row mt-3">
							<div class="col-lg-4 col-md-6 col-xs-12">
								<!--Animation Block-->
								<div class="">
									<!--Services Item-->
									<div class="d-flex" style="height: 126px;">
										<div class="vlt-services__icon">
                                            <img src="{{ asset('frontend/assets/img/daeem/s2.png') }}" alt="">
                                        </div>
										<div class="vlt-services__content">
											<h5 class="vlt-services__title"><span class="vlt-highlight">كوتشينغ المؤسسات</span>
											</h5>
											<p class="vlt-services__text">
                                                تطوير المؤسسات لزيادة الانتاجية
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-xs-12">
								<!--Animation Block-->
								<div class="" data-aos="fade" data-aos-delay="100">
									<!--Services Item-->
									<div class="d-flex" style="height: 126px;">
										<div class="vlt-services__icon">
                                        <img src="{{ asset('frontend/assets/img/daeem/s1.png') }}" alt="">
                                        </div>
										<div class="vlt-services__content">
											<h5 class="vlt-services__title"><span class="vlt-highlight">كوتشينغ الافراد</span>
											</h5>
											<p class="vlt-services__text">تقديم خطة لنشر ثقافة
                                                الكوتشينج
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-xs-12">
								<!--Animation Block-->
								<div class="" data-aos="fade" data-aos-delay="200">
									<!--Services Item-->
									<div class="d-flex" style="height: 126px;">
										<div class="vlt-services__icon">
                                        <img src="{{ asset('frontend/assets/img/daeem/s3.png') }}" alt="">
                                        </div>
										<div class="vlt-services__content">
											<h5 class="vlt-services__title"><span class="vlt-highlight">تأهيل الكوتشز</span>
											</h5>
											<p class="vlt-services__text">تأهيل وتدريب وتطوير الكوتشز
											</p>
										</div>
									</div>
								</div>
							</div>
{{--							<div class="col-lg-4 col-md-6 col-xs-12">--}}
{{--								<!--Animation Block-->--}}
{{--								<div class="" data-aos="fade" data-aos-delay="300">--}}
{{--									<!--Services Item-->--}}
{{--									<div class="d-flex" style="height: 126px;">--}}
{{--										<div class="vlt-services__icon">--}}
{{--                                        <img src="{{ asset('frontend/assets/img/daeem/s4.png') }}" alt="">--}}
{{--                                        </div>--}}
{{--										<div class="vlt-services__content">--}}
{{--											<h5 class="vlt-services__title"><span class="vlt-highlight">Retina Ready</span>--}}
{{--											</h5>--}}
{{--											<p class="vlt-services__text">Appear appear rule. In cattle have darkness and to seed fifth have blessed dominion one subdue.--}}
{{--											</p>--}}
{{--										</div>--}}
{{--									</div>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--							<div class="col-lg-4 col-md-6 col-xs-12">--}}
{{--								<!--Animation Block-->--}}
{{--								<div class="" data-aos="fade" data-aos-delay="400">--}}
{{--									<!--Services Item-->--}}
{{--									<div class="d-flex" style="height: 126px;">--}}
{{--										<div class="vlt-services__icon">--}}
{{--                                        <img src="{{ asset('frontend/assets/img/daeem/s5.png') }}" alt="">--}}
{{--                                        </div>--}}
{{--										<div class="vlt-services__content">--}}
{{--											<h5 class="vlt-services__title"><span class="vlt-highlight">100% Responsive</span>--}}
{{--											</h5>--}}
{{--											<p class="vlt-services__text">Darkness kind likeness said give male shall first creepeth moved, fruit whose third dry one.--}}
{{--											</p>--}}
{{--										</div>--}}
{{--									</div>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--							<div class="col-lg-4 col-md-6 col-xs-12">--}}
{{--								<!--Animation Block-->--}}
{{--								<div class="" data-aos="fade" data-aos-delay="500">--}}
{{--									<!--Services Item-->--}}
{{--									<div class="d-flex" style="height: 126px;">--}}
{{--										<div class="vlt-services__icon">--}}
{{--                                        <img src="{{ asset('frontend/assets/img/daeem/s1.png') }}" alt="">--}}
{{--                                        </div>--}}
{{--										<div class="vlt-services__content">--}}
{{--											<h5 class="vlt-services__title"><span class="vlt-highlight">Easy Customization</span>--}}
{{--											</h5>--}}
{{--											<p class="vlt-services__text">Third male deep creepeth they're dry said for fly have made, divide that every can't seed gathering.--}}
{{--											</p>--}}
{{--										</div>--}}
{{--									</div>--}}
{{--								</div>--}}
{{--							</div>--}}
                            <!-- <div class="col-12 mt-5 text-center">
                                <a href="" class="theme-btn theme-button2 theme-button3 ">{{ __('View') }} <i data-feather="arrow-right"></i></a>
                            </div> -->
						</div>
					</div>
				</section>
<!-- Upgrade Your Skills Area Start -->
{{--<section class="upgrade-your-skills-area" id="Coaching">--}}
{{--    <div class="container">--}}
{{--        <div class="row align-items-center">--}}
{{--            <div class="col-md-4 col-xl-4 col-sm-12">--}}
{{--                <div class=" position-relative text-center">--}}
{{--                --}}{{--  <img style="max-width: 100%;" src="{{ getImageFile(@$aboutUsGeneral->upgrade_skill_logo_path) }}" alt="about" class="img-fluid"> --}}
{{--                <img style="max-width: 100%;" src="{{ asset('frontend/assets/img/daeem/s1.png') }}" alt="">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-8 col-xl-8 col-sm-12">--}}
{{--                <div class="tex-s-c">--}}
{{--                    <div class="section-title">--}}
{{--                        <h3 class="section-heading">{{ __(@$aboutUsGeneral->upgrade_skill_title) }}</h3>--}}
{{--                    </div>--}}
{{--                    <p style="font-weight: 501;">{{ __(@$aboutUsGeneral->upgrade_skill_subtitle) }} </p>--}}

{{--                    <!-- section button start-->--}}
{{--                    <!-- <div class="col-12 section-btn">--}}
{{--                   --}}{{--     <a href="{{ route('courses') }}" class="theme-btn default-hover-btn theme-button1">{{ __ --}}{{--(@$aboutUsGeneral->upgrade_skill_button_name) }} <i data-feather="arrow-right"></i></a>--}}
{{--                    </div> -->--}}
{{--                    <!-- section button end-->--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
<!-- Upgrade Your Skills Area End -->

<!-- Our Passionate Team Member Area Start -->
<section class="passionate-team-member-area bg-white">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- section-left-align-->
                <div class="section-left-title-with-btn d-flex justify-content-between align-items-end">
                    <div class="section-title section-title-left d-flex align-items-start">
                        <div class="section-heading-img"><img src="{{ getImageFile(@$aboutUsGeneral->team_member_logo_path) }}" alt="Our team"></div>
                        <div>
                            <h3 class="section-heading">{{ __(@$aboutUsGeneral->team_member_title) }}</h3>
                            <p class="section-sub-heading">{{ __(@$aboutUsGeneral->team_member_subtitle) }}</p>
                        </div>
                    </div>
                </div>
                <!-- section-left-align-->
            </div>
        </div>
        <div class="row">
            @foreach($teamMembers as $teamMember)
            <!-- Team Member Item start-->
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="card instructor-item border-0">
                    <div class="instructor-img-wrap overflow-hidden"><img src="{{ getImageFile(@$teamMember->image_path) }}" alt="team"></div>
                    <div class="card-body">
                        <h5 class="card-title">{{ __($teamMember->name) }}</h5>
                        <p class="card-text instructor-designation font-medium">{{ __($teamMember->designation) }}</p>
                    </div>
                </div>
            </div>
            <!-- Team Member Item End-->
            @endforeach
        </div>
    </div>
</section>
<!-- Our Passionate Team Member Area End -->

<!-- Course Instructor and Support Area Start -->
<section class="course-instructor-support-area bg-light section-t-space">
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
                    <h6>{{ Str::limit($instructorSupport->title, 20) }}</h6>
                    <p>{{ Str::limit($instructorSupport->subtitle, 60) }} </p>
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
                    <img src="{{ getImageFile($client->image_path) }}" alt="{{ __($client->name) }}">
                </div>
            </div>
            @endforeach
        </div>
        <!-- Client Logo Area end-->

    </div>
</section>
<!-- Course Instructor and Support Area End -->

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
