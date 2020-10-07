@extends('app.master')

@section('content')
    <style>
        .background-color-dark{
            background-color: transparent !important;
        }
    </style>
    <section id="overview" class="section custom-background-color-1 custom-background-style-1 m-0">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-8">
                <div class="custom-top-title-box">
                    <span class="text-color-light font-weight-semibold">متن تست</span>
                    <h1 class="text-color-light">نرم افزار موبایل</h1>
                    <span class="text-color-light font-weight-semibold mb-5 sliderText">متن تست</span>
                    <a href="{{ Route('app.events.index') }}" class="btn custom-btn-style-1 text-color-light mb-5" data-hash>رخدادهای ورزشی</a>
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
                @foreach (\App\Category::all() as $category)
                    <li class="nav-item" data-option-value=".{{ $category->english }}"><a class="nav-link" href="#">{{ $category->title }}</a></li>
                @endforeach
        </ul>
        </div>
    </div>
    <div class="ovaem_events_filter_content">
        <div class="sort-destination-loader sort-destination-loader-showing">
            <div class="row image-gallery sort-destination lightbox" data-sort-id="portfolio" data-plugin-options="{'delegate': 'a.lightbox-portfolio', 'type': 'image', 'gallery': {'enabled': true}}">
                @foreach ($events as $event)
                    @php
                        $zarfiat = $event->membersCount - \DB::table('event_user')->where('event_id', $event->id)->where('status', 'accept')->where('payment', 'paid')->count();
                    @endphp
                    <div class="col-md-4 col-sm-6 col-xs-6 ova-item isotope-item style3 {{ $event->category->english }}">
                        <a href="{{ route('app.events.show', $event->id) }}">
                            <div class="ova_thumbnail">
                                <img alt="" src="{{ asset("/files/$event->picture") }}">
                                <div class="date">
                                    <span class="month">{{ jdate($event->timeStart)->format('d F Y') }} ساعت {{ jdate($event->timeStart)->format(' H:i') }}</span>
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
                                <a href="{{ route('app.events.show', $event->id) }}">{{ $event->title }}</a>
                            </h2>
                            <div class="venue_mobile">
                                            <span>
                                                <i class="icon_pin_alt"></i>
                                            </span>
                                {{ $event->title }}
                            </div>
                            <div class="except">
                                محله:
                                {{ $event->address }}
                            </div>
                            <div class="more_detail">
                                @if ($zarfiat != 0)
                                    <a class="btn_link" href="{{ route('app.events.show', $event->id) }}">ثبت نام<i class="arrow_right"></i></a>
                                @else
                                    <a class="btn_link" href="">ظرفیت تکمیل است<i class="arrow_right"></i></a>
                                @endif
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        



    </div>

</div>


@stop
