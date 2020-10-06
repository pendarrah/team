@extends('app.master')

@section('content')


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
                                <a href="{{ route('app.events.show', $event->id) }}">{{ $event->title }}</a>
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