@extends('app.master')

@section('content')

	<!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">عضویت
                        <a href="{{ route('login') }}"><button class="btn btn-success mr-3">نمایش فرم ورود</button></a>
                    </h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <div style="direction: rtl; text-align: right" class="modal-body">

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <p style="margin: 10px">جهت ارسال درخواست عضویت، ثبت نام در تیموفیت الزامیست. درصورتی که حساب کاربری دارید باکلیک برروی گزینه سبز رنگ بالا، وارد شده و سپس درخواست عضویت را ارسال نمایید در غیر اینصورت پس از تکمیل فرم عضویت و احراز هویت، مجددا برروی گزینه عضویت در رویداد کلیک نمایید.</p>


                        @if ($errors->any())
                            <div style="direction: rtl!important; text-align: right" class="alert alert-danger">
                                <ul style="direction: rtl!important; text-align: right" >
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-row">
                            <div class="form-group col">
                                <label>شماره موبایل</label>
                                <input type="text" name="mobile" class="form-control form-control-lg">
                                @error('mobile')
                                <span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <label>کلمه عبور</label>
                                <input type="password" name="password" class="form-control form-control-lg">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>تکرار کلمه عبور</label>
                                <input type="password" name="password_confirmation" class="form-control form-control-lg">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <input type="submit" value="ثبت نام" class="btn btn-primary float-right mb-5" data-loading-text="Loading...">
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">انتخاب روش پرداخت</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <div style="direction: rtl; text-align: right" class="modal-body">

                    <div class="form-row">
                        <div class="form-group col">
                            <input type="submit" value="کسر از کیف پول" class="btn btn-primary float-right mb-5" data-loading-text="Loading...">
                        </div>

                        <div class="form-group col">
                            <input type="submit" value="ثبت نام" class="btn btn-primary float-right mb-5" data-loading-text="Loading...">
                        </div>

                    </div>


                </div>


            </div>
        </div>
    </div>
<section class="parallax section section-text-light section-parallax section-center mt-0" data-plugin-parallax data-plugin-options="{'speed': 1.5}" data-image-src="{{ $event->team->banner ? $event->team->banner : '/img/no-banner.jpg' }}" style="min-height: 560px; margin:0px;">
					<div class="container">
						<div class="row justify-content-center mt-5">
							<div class="col-lg-8 mt-5">
								<h1 class="mt-5 pt-5 font-weight-semibold text-uppercase">رویداد {{ $event->team->name }}</h1>

                                <span style="padding: 10px; color: white">
																	وضعیت:
																	@if ($event->timeStart <= \Carbon\Carbon::now())
                                        برگزار شده
                                    @elseif ($event->membersCount - \DB::table('event_user')->where('event_id', $event->id)->where('status', 'accept')->where('payment', 'paid')->count() === 0)
                                        لیست تکمیل شده
                                    @else
                                        درحال برگزاری
                                    @endif
																</span>
							</div>
						</div>
					</div>
				</section>



				<div class="custom-about-me-links background-color-light-teams-details">
					<div class="container">
						<div class="row justify-content-end">

							<div class="col-lg-12 text-center custom-xs-border-bottom p-0" style="border-right: 1px solid #eee;margin-top: 25px">

                                @if ($event->timeStart >= \Carbon\Carbon::now())

                                    @auth
                                        @if (\DB::table('event_user')->where('event_id', $event->id)->where('user_id', \Auth::user()->id)->where('status', 'accept')->where('payment', 'paid')->count() >= 1)
                                            <p style="text-align: center;direction: rtl;">آخرین وضعیت درخواست: شما عضو رویداد هستید</p>
                                        @elseif(\DB::table('event_user')->where('event_id', $event->id)->where('user_id', \Auth::user()->id)->where('status', 'accept')->where('payment', 'notPaid')->count() >= 1)
                                            <p style="text-align: center;direction: rtl;">آخرین وضعیت درخواست: در انتظار پرداخت</p>
                                        @elseif(\DB::table('event_user')->where('event_id', $event->id)->where('user_id', \Auth::user()->id)->where('status', 'pending')->count() >= 1)
                                            <p style="text-align: center;direction: rtl;">آخرین وضعیت درخواست: درخواست شما دردست بررسی سرپرست میباشد</p>
                                        @elseif(\DB::table('event_user')->where('event_id', $event->id)->where('user_id', \Auth::user()->id)->where('status', 'reject')->count() >= 1)
                                            <p style="text-align: center;direction: rtl;">آخرین وضعیت درخواست: درخواست شما توسط سرپرست رد شده است</p>
                                        @endif
                                    @endauth


                                    @guest
                                            <p style="text-align: center; margin-bottom: 30px;" class="textAlginRightTeamofit teamofit-direction-rtl">جهت پیوستن به رویداد ، ابتدا ثبت نام کنید</p>
                                            <a data-toggle="modal" data-target="#exampleModal"><p style="text-align: center"><button class="btn custom-btn-style-1 _size-1 text-color-light" type="submit">عضویت</button></p></a>

                                    @endguest

                                    @auth
                                            @if ($event->membersCount > \DB::table('event_user')->where('event_id', $event->id)->count())
                                                <p style="text-align: center"><a href="{{ route('app.events.request', $event->id) }}"><button class="btn custom-btn-style-1 _size-1 text-color-light" type="submit">ارسال درخواست پیوستن به رویداد</button></a></p>
                                            @elseif ($event->membersCount <= \DB::table('event_user')->where('event_id', $event->id)->count())
                                                <p style="text-align: center"><button class="btn custom-btn-style-1 _size-1 text-color-light" type="submit">ظرفیت تکمیل میباشد</button></p>
                                            @endif
                                    @endauth


                                @endif

							</div>
						</div>
					</div>
			</div>


			<section class="about-us custom-section-padding" id="about-us">
					<div class="container">
						<div class="row">
							<div class="col-md-6 col-lg-6 teamofit-direction-rtl textAlginRightTeamofit">
                                <table class="table table-striped textAlginRightTeamofit teamofit-direction-rtl">
                                    <colgroup>
                                        <col width="35%">
                                        <col width="65%">
                                    </colgroup>
                                    <tbody>

                                    <tr>
                                        <td class="background-color-primary text-light align-middle">عنوان رویداد: </td>
                                        <td class="text-4 font-weight-bold align-middle background-color-primary text-light">
                                            {{ $event->title }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="background-color-primary text-light align-middle">نام تیم: </td>
                                        <td class="text-4 font-weight-bold align-middle background-color-primary text-light">
                                            <a href="{{ route('app.teams.show', $event->team_id) }}">{{ $event->team->name }}</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>مبلغ:</td>
                                        <td>
                                            {{ number_format($event->price) }} ریال
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>منطقه:</td>
                                        <td>
                                            {{ $event->region }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>دسته بندی:</td>
                                        <td>
                                            {{ $event->category->title }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>تعداد اعضا:</td>
                                        <td>
                                            {{ $event->membersCount }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> باقیمانده:</td>
                                        <td>
                                            {{ $event->membersCount - \DB::table('event_user')->where('event_id', $event->id)->where('status', 'accept')->where('payment', 'paid')->count() }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>تاریخ برگزاری:</td>
                                        <td style="direction: ltr">{{ jdate($event->timeStart)->format('Y/m/d') }}</td>
                                    </tr>

                                    <tr>
                                        <td>زمان</td>
                                        <td style="direction: ltr">{{ jdate($event->timeFinish)->format('H:i') }}</td>
                                    </tr>

                                    <tr>
                                        <td>مدت (دقیقه):</td>
                                        <td style="direction: ltr">{{ $event->duration }}</td>
                                    </tr>

                                    <tr>
                                        <td>
                                            اشتراک گذاری
                                        </td>
                                        <td>
                                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha256-NuCn4IvuZXdBaFKJOAcsU2Q3ZpwbdFisd5dux4jkQ5w=" crossorigin="anonymous" />
                                            <ul class="social-network social-circle">
                                                <li style="margin-bottom: 10px"><a href="whatsapp://send?text={{  url()->current()  }} شما از طرف دوستتان به این بازی دوستانه دعوت شده اید، جهت اطلاعات بیشتر برروی این لینک کنیک کنید:" data-action="share/whatsapp/share" target="_blank" class="icoRss" title="Rss"><i style="font-size: 20px;" class="fa fa-whatsapp"></i>  واتس اپ  </a></li>
                                                <li><a href="tg://msg_url?url={{ url()->current() }}&text='شما از طرف دوستتان به این بازی دوستانه دعوت شده اید، جهت اطلاعات بیشتر برروی این لینک کنیک کنید:'" class="icoTwitter" title="Rss"><i style="font-size: 20px;" class="fa fa-telegram"></i>  تلگرام  </a></li>
                                            </ul>

                                        </td>


                                    </tr>

                                    <tr>
                                        <td>
                                            آدرس
                                        </td>
                                        <td>
                                            {{ $event->address  }} <a style="" href="#map" class="text-2" data-hash data-hash-offset="100">مشاهده در نقشه</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            توضیحات
                                        </td>
                                        <td>
                                            {{ $event->description  }}
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
							</div>
							<div class="col-md-6 col-lg-6">


                                <div class="dashboard-box">
                                    <div class="dashboard-box-header">
                                        <div>لیست بازیکن ها</div>
                                    </div>
                                    <div class="scroll-box">
                                        <ul>
                                            @forelse ($eventMembers as $member)
                                                <li>
                                                    <div class="indicator"></div>
                                                    <div class="widget-heading">
                                                        <img style="max-height: 50px; max-width: 50px" class="img-fluid rounded-circle" src="{{ \App\User::where('id', $member)->first()->avatar ? "/files/" . \App\User::where('id', $member)->first()->avatar : '/img/no-avatar.jpeg' }}" alt />
                                                        <strong class="text-uppercase font-weight-bold ">{{ \App\User::where('id', $member)->first()->fName . ' ' . \App\User::where('id', $member)->first()->lName }}</strong>
                                                        @if (\DB::table('event_user')->where('user_id', $member)->where('event_id', $event->id)->first())
                                                            |
                                                                نحوه پرداخت:
                                                                {{ \DB::table('event_user')->where('user_id', $member)->where('event_id', $event->id)->first()->method == 'online' ? 'آنلاین' : 'آفلاین'}}

                                                        @endif
                                                    </div>


                                                </li>
                                            @empty
                                                بدون ورزشکار
                                            @endforelse

                                        </ul>
                                    </div>
                                </div>


                                @if (isset($event->lat) && isset($event->long))
                                    <div class="row">
                                        <div class="col mt-3 mb-3 textAlginRightTeamofit teamofit-direction-rtl">
                                            <h4 class="mt-3 mb-4" id="map">لوکیشن:</h4>
                                            <div style=" margin-top: 40px; margin-bottom: 200px">
                                                <script src="https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js"></script>
                                                <link href="https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css" rel="stylesheet" />
                                                <style>
                                                    #loadingMap { position: absolute; top: 0; bottom: 0; width: 550px; height: 450px }
                                                </style>
                                                <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.min.js"></script>
                                                <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.css" type="text/css"/>

                                                <style>
                                                    .loadingCoordinates {
                                                        background: rgba(0, 0, 0, 0.5);
                                                        color: #fff;
                                                        position: absolute;
                                                        bottom: 40px;
                                                        left: 10px;
                                                        padding: 5px 10px;
                                                        margin: 0;
                                                        font-size: 11px;
                                                        line-height: 18px;
                                                        border-radius: 3px;
                                                        display: none;
                                                    }
                                                </style>

                                                <div id="loadingMap"></div>
                                                <pre id="loadingCoordinates" class="loadingCoordinates"></pre>

                                                <script>
                                                    mapboxgl.accessToken = 'pk.eyJ1IjoiYWxpaW5qZWN0b3IiLCJhIjoiY2tlcjNxM3ppNDl0dDJ5bHRseGZhazI2NCJ9.dtI471dfmQYQMkBa_j1sCw';
                                                    mapboxgl.setRTLTextPlugin(
                                                        'https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-rtl-text/v0.2.3/mapbox-gl-rtl-text.js',
                                                        null,
                                                        true // Lazy load the plugin
                                                    );

                                                    var loadingCoordinates = document.getElementById('loadingCoordinates');
                                                    var loadingMap = new mapboxgl.Map({
                                                        container: 'loadingMap',
                                                        style: 'mapbox://styles/mapbox/streets-v11',
                                                        center: [
                                                            "{{ $event->long }}", "{{ $event->lat }}"
                                                        ],
                                                        zoom: 15
                                                    });

                                                    loadingMap.addControl(
                                                        new MapboxGeocoder({
                                                            accessToken: mapboxgl.accessToken,
                                                        })
                                                    );

                                                    var loadingMarker = new mapboxgl.Marker({
                                                        draggable:false,
                                                    })

                                                        .setLngLat([
                                                            "{{ $event->long }}", "{{ $event->lat }}"
                                                        ])
                                                        .addTo(loadingMap);


                                                    function onDragEnd() {
                                                        var loadingLngLat = loadingMarker.getLngLat();
                                                        loadingCoordinates.style.display = 'block';
                                                        loadingCoordinates.innerHTML =
                                                            'Longitude: ' + loadingLngLat.lng + '<br />Latitude: ' + loadingLngLat.lat;
                                                        document.getElementById('loadingLat').value = loadingLngLat.lat; //latitude
                                                        document.getElementById('loadingLong').value = loadingLngLat.lng; //longitude
                                                    }

                                                    loadingMarker.on('dragend', onDragEnd);
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                @endif

							</div>



						</div>
					</div>
				</section>


	{{--<section class="section-secondary custom-section-padding" style="background-color: #eef4f2 !important; padding: 60px 0;">--}}
					{{--<div class="container">--}}
						{{--<div class="row">--}}
							{{--<div class="col">--}}
								{{--<h2 class="font-weight-bold text-color-dark textAlginRightTeamofit"> - اعضای تیم</h2>--}}
							{{--</div>--}}
						{{--</div>--}}
						{{--<div class="row">--}}
							{{--<div class="col">--}}
								{{--<div class="owl-carousel show-nav-title custom-dots-style-1 custom-dots-position custom-xs-arrows-style-2 mb-0" data-plugin-options="{'items': 4, 'margin': 20, 'autoHeight': true, 'loop': false, 'nav': false, 'dots': true}">--}}

									{{--@forelse ($teamMembers as $member)--}}
										{{--<div>--}}
											{{--<div class="team-item p-0">--}}
												{{--<a href="#" class="text-decoration-none">--}}
												{{--<span class="image-wrapper">--}}
													{{--<img src="{{ \App\User::where('id', $member)->first()->avatar ? "/files/" . \App\User::where('id', $member)->first()->avatar : '/img/team-11.jpg' }}" alt="" class="img-fluid" />--}}
												{{--</span>--}}
												{{--</a>--}}
												{{--<div class="team-infos">--}}

													{{--<a href="#" class="text-decoration-none textAlginRightTeamofit">--}}
														{{--<p class="team-member-name text-color-dark font-weight-semibold text-4">{{ \App\User::where('id', $member)->first()->fName . ' ' . \App\User::where('id', $member)->first()->lName }}</p>--}}
													{{--</a>--}}
												{{--</div>--}}
											{{--</div>--}}
										{{--</div>--}}

									{{--@empty--}}

									{{--@endforelse--}}





								{{--</div>--}}
							{{--</div>--}}
						{{--</div>--}}
					{{--</div>--}}
				{{--</section>--}}
@stop
