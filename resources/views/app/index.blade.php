@extends('app.master')

@section('content')
    <section id="overview" class="section custom-background-color-1 custom-background-style-1 m-0">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-8">
                <div class="custom-top-title-box">
                    <span class="text-color-light font-weight-semibold">متن تست</span>
                    <h1 class="text-color-light">نرم افزار موبایل</h1>
                    <span class="text-color-light font-weight-semibold mb-5 sliderText">متن تست</span>
                    <a href="#downloads" class="btn custom-btn-style-1 text-color-light mb-5" data-hash>رخدادهای ورزشی</a>
                    <a href="#key-features" class="btn btn-primary custom-btn-style-1 _borders text-color-light ml-2 mb-5" data-hash data-hash-offset="62">راهنما</a>
                    
                </div>
            </div>
            <div class="col-8 col-md-4 col-lg-4 mx-auto">
                <div class="owl-carousel custom-arrows-style-1 custom-left-pos-1 custom-background-1 m-0" data-plugin-options="{'items': 1, 'loop': true, 'dots': false, 'nav': true, 'autoplay': true, 'autoplayTimeout': 3000}">
                    <div>
                        <img src="img/demos/app-landing/product/overview-carousel-1.jpg" alt class="img-fluid" />
                    </div>
                    <div>
                        <img src="img/demos/app-landing/product/overview-carousel-2.jpg" alt class="img-fluid" />
                    </div>
                    <div>
                        <img src="img/demos/app-landing/product/overview-carousel-3.jpg" alt class="img-fluid" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div id="home-intro" class="home-intro custom-home-intro background-color-tertiary m-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-sm-8">
                <p class="text-color-light m-0">
                    نرم افزار در  <strong>اندروید و IOS</strong> موجود می باشد .
                    <span class="text-2">همینطور میتوانید از بازار و اپ استور تهییه کنید .</span>
                </p>
            </div>
            <div class="col-lg-4 col-sm-4">
                <a href="#downloads" class="btn btn-primary custom-btn-style-1 text-uppercase font-weight-semibold float-md-right mt-1" data-hash data-hash-offset="62"><i class="icon-cloud-download icons mr-3	"></i> همین الان دانلود کنید </a>
            </div>
        </div>
    </div>
</div>
<div class="container marginBottomTeamofit" >

    <h2 class="custom-bar _left text-color-dark eventsMarginTop">رویدادها</h2>
    <div class="events_filter_show_nav">
        <div class="select_cat_mobile_btn">
        <ul class="nav nav-pills sort-source" data-sort-id="portfolio" data-option-key="filter">
                <li class="nav-item" data-option-value="*"><a class="nav-link active" href="#">نمایش همه</a></li>
                <li class="nav-item" data-option-value=".football"><a class="nav-link" href="#">فوتبلا</a></li>
                <li class="nav-item" data-option-value=".volleyball"><a class="nav-link" href="#">والیبال</a></li>
                <li class="nav-item" data-option-value=".futsal"><a class="nav-link" href="#">فوتسال</a></li>
                <li class="nav-item" data-option-value=".basketball"><a class="nav-link" href="#">بستکتبال</a></li>
            </ul>
        </div>
    </div>
    <div class="ovaem_events_filter_content">
        <div class="sort-destination-loader sort-destination-loader-showing">
            <div class="row image-gallery sort-destination lightbox" data-sort-id="portfolio" data-plugin-options="{'delegate': 'a.lightbox-portfolio', 'type': 'image', 'gallery': {'enabled': true}}">
                @foreach ($events as $event)
                    <div class="col-md-4 col-sm-6 col-xs-6 ova-item isotope-item style3 football">
                        <p class="number" style="display:none;">1632873600</p>
                        <a href="#">
                            <div class="ova_thumbnail">
                                <img alt="" src="{{ asset("/files/$event->picture") }}">
                                <div class="date">
                                    <span class="month">{{ jdate($event->timeStart)->format('d F Y') }}</span>
                                </div>
                                <div class="venue">
                                    ساعت {{ jdate($event->timeStart)->format('G:H') }} الی {{ jdate($event->timeFinish)->format('G:H') }}
                                </div>
                                <div class="venue eventsIcons">
                                    <span data-toggle="tooltip" data-placement="bottom" title="اشتراک گذاری" class="fa fa-share-alt"></span>
                                    <span data-toggle="tooltip" data-placement="bottom" title="جزئیات" class="fa fa-info-circle"></span>
                                    <span data-toggle="tooltip" data-placement="bottom" title="عضویت" class="fa fa-sign-in"></span>
                                </div>
                                <div class="time">
                                                <span class="price">
                                                    <span>{{ number_format($event->price) }} ریال</span>
                                                </span>
                                </div>
                            </div>
                        </a>
                        <div class="wrap_content">
                            <h2 class="title">
                                <a href="#">{{ $event->title }}</a>
                            </h2>
                            <div class="venue_mobile">
                                            <span>
                                                <i class="icon_pin_alt"></i>
                                            </span>
                                {{ $event->title }}
                            </div>
                            <div class="except">
                                {{ $event->description }}
                            </div>
                            <div class="more_detail">
                                <a class="btn_link" href="#">
                                    جزئیات بیشتر<i class="arrow_right"></i>
                                </a>
                            </div>
                            <div class="status">
                                <a href="#">
                                    <span class="upcoming">ثبت نام</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        



    </div>

</div>


<div class="p-relative">
    <section id="downloads" class="section section-parallax background-color-primary m-0" data-plugin-parallax data-plugin-options="{'speed': 1.5}" data-image-src="img/demos/app-landing/parallax/downloads-parallax.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <h2 class="custom-bar _left _color-light text-color-light textAlginRightTeamofit">دانلود نرم افزار تیموفیت</h2>
                    <p class="text-color-light custom-font-secondary text-4 mb-0 textAlginRightTeamofit">قابل دسترسی در  <strong>اندروید و IOS.</strong></p>
                    <p class="text-2 text-color-light custom-font-secondary mb-4 pb-3 textAlginRightTeamofit">برای دانلود می توانید به نرم افزار بازار و app store مراجعه فرمایید</p>
                    <div class="row">
                        <div class="col-sm-4 text-center">
                            <a href="#" class="text-decoration-none" target="_blank" title="Download on Google Play">
                                <img src="img/demos/app-landing/buttons/android-download.png" alt class="custom-shadow-on-hover custom-xs-image-center img-fluid" />
                            </a>
                        </div>
                        <div class="col-sm-4 text-center">
                            <a href="#" class="text-decoration-none" target="_blank" title="Download on App Store">
                                <img src="img/demos/app-landing/buttons/apple-download.png" alt class="custom-shadow-on-hover custom-xs-image-center img-fluid" />
                            </a>
                        </div>
                        <div class="col-sm-4 text-center">
                            <a href="#" class="text-decoration-none" target="_blank" title="Download on Windows Phone Store">
                                <img src="img/demos/app-landing/buttons/windows-download.png" alt class="custom-shadow-on-hover custom-xs-image-center img-fluid" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <img src="img/demos/app-landing/product/downloads-product-image-1.png" data-appear-animation="fadeInRight" data-appear-animation-delay="100" data-plugin-options="{'accY': 200}" alt="" class="custom-product-image-pos-2 img-fluid d-none d-lg-block" />
    <img src="img/demos/app-landing/product/downloads-product-image-2.png" data-appear-animation="fadeInRight" data-appear-animation-delay="300" data-plugin-options="{'accY': 200}" alt="" class="custom-product-image-pos-2 _litle-small img-fluid d-none d-lg-block" />
</div>

@stop
