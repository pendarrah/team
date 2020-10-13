@extends('app.master')

@section('content')


<div class="container marginBottomTeamofit" >

    <h2 class="custom-bar _left text-color-dark eventsMarginTop">رویدادها</h2>
    <div style="display: none;" class="events_filter_show_nav">
        <div style="float:right;" class="select_cat_mobile_btn">
        <ul class="nav nav-pills sort-source" data-sort-id="portfolio" data-option-key="filter">
                <li class="nav-item" data-option-value="*"><a class="nav-link active" href="#">نمایش همه</a></li>
            @foreach (\App\Category::all() as $category)
                <li class="nav-item" data-option-value=".{{ $category->english }}"><a class="nav-link" href="#">{{ $category->title }}</a></li>
            @endforeach
            </ul>

        </div>

    </div>


    <div class="ovaem_events_filter_content">

        @if (Route::currentRouteName() != 'app.teams.events')
            <form action="{{ route('app.events.search') }}" method="get">
                <div class="form-group row">

                    <label class="col-md-1 control-label text-md-right ">نوع:</label>
                    <div class="col-md-2">
                        <select name="type" class="form-control">
                            <option {{ request()->type == 'همه' ? 'selected' : '' }} value="همه">همه</option>
                            @foreach (\App\Category::all() as $category)
                                <option {{ request()->type == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <label class="col-md-1 control-label text-md-right "> شهر:</label>
                    <div class="col-md-2">
                        <select name="city" class="form-control">
                            <option {{ request()->city == 'همه' ? 'selected' : '' }} value="همه">همه</option>
                        @foreach (\App\City::orderBy('order')->get() as $city)
                                <option {{ request()->city == $city->id ? 'selected' : '' }} value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <label class="col-md-1 control-label text-md-right ">جنسیت:</label>
                    <div class="col-md-2">
                        <select name="gender" class="form-control">
                            <option value="همه" {{ request()->gender == 'همه' ? 'selected' : '' }} >همه</option>
                            <option value="آقایان" {{ request()->gender == 'آقایان' ? 'selected' : '' }} >آقایان</option>
                            <option value="بانوان" {{ request()->gender == 'بانوان' ? 'selected' : '' }} >بانوان</option>
                        </select>
                    </div>
                    <button class="btn custom-btn-style-1 _size-1 text-color-light" type="submit">جستجو</button>
                </div>
            </form>
        @endif



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
                                     <span class="price"><span>{{ number_format($event->price) }} ریال</span></span>
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
{{--            <p> {{ $events->links() }} </p>--}}

        </div>

       
    </div>

</div>


@stop

@section('footerScripts')

@stop