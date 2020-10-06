@extends('app.master')

@section('content')
<div class="container">

					<div class="row pb-5 pt-3 teamofit-direction-ltr">
						<div class="col-lg-9">
									
							<div class="row">
								<div class="col-lg-7">


									<div class="thumb-gallery">
										<div class="lightbox" data-plugin-options="{'delegate': 'a', 'type': 'image', 'gallery': {'enabled': true}}">
											<div class="owl-carousel owl-theme manual thumb-gallery-detail show-nav-hover" id="thumbGalleryDetail">
												<div>
													<a href="{{ asset("/files/$event->picture") }}">
														<span style="direction: rtl!important; text-align: right!important;margin-top: 10px;margin-bottom: 10px;" class="thumb-info thumb-info-centered-info thumb-info-no-borders text-4">
															<span style=" ">وضعیت:</span>
															<span class="thumb-info-wrapper text-4">
																<img alt="Property Detail" src="{{ asset("/files/$event->picture") }}" class="img-fluid">
																<span class="thumb-info-title text-4">
																	<span class="thumb-info-inner text-4"><i class="icon-magnifier icons text-4"></i></span>
																</span>
															</span>
														</span>
													</a>
												</div>



											</div>
										</div>

										<div style="display: none" class="owl-carousel owl-theme manual thumb-gallery-thumbs mt" id="thumbGalleryThumbs">
											<div>
												<img alt="Property Detail" src="{{ asset("/files/$event->picture") }}" class="img-fluid cur-pointer">
											</div>
										</div>
									</div>

								</div>
								<div class="col-lg-5">
									
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
												<td>مبلغ:</td>
												<td>
													{{ number_format($event->price) }} ریال
												</td>
											</tr>

											<tr>
												<td>محله:</td>
												<td>
													{{ $event->address }}  <a style="" href="#map" class="text-2" data-hash data-hash-offset="100">مشاهده در نقشه</a>
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
												<td style="direction: ltr">{{ \Carbon\Carbon::parse($event->timeFinish)->diffInMinutes(\Carbon\Carbon::parse($event->timeStart), true) }}</td>
											</tr>

											<tr>
												<td>
													اشتراک گذاری
												</td>
												<td>
													<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha256-NuCn4IvuZXdBaFKJOAcsU2Q3ZpwbdFisd5dux4jkQ5w=" crossorigin="anonymous" />
													<ul class="social-network social-circle">
														<li style="margin-bottom: 10px"><a href="whatsapp://send?text={{  url()->current()  }}" data-action="share/whatsapp/share" target="_blank" class="icoRss" title="Rss"><i style="font-size: 20px;" class="fa fa-whatsapp"></i>  واتس اپ  </a></li>
														<li><a href="tg://msg_url?url={{ url()->current() }}&text='Teamofit.com'" class="icoTwitter" title="Rss"><i style="font-size: 20px;" class="fa fa-telegram"></i>  تلگرام  </a></li>
													</ul>

												</td>


											</tr>
										</tbody>
									</table>

								</div>
							</div>

							<div class="row">
								<div class="col textAlginRightTeamofit teamofit-direction-rtl">

									<h4 class="mt-3 mb-3" id="map">توضیحات:</h4>

									<p>
										{{ $event->description }}
									</p>

								</div>
							</div>

							@if (isset($event->lat) && isset($event->long))
								<div class="row">
									<div class="col textAlginRightTeamofit teamofit-direction-rtl">
										<h4 class="mt-3 mb-3" id="map">لوکیشن:</h4>
											<div style="margin-bottom: 400px; margin-top: 40px">
												<script src="https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js"></script>
												<link href="https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css" rel="stylesheet" />
												<style>
													#loadingMap { position: absolute; top: 0; bottom: 0; width: 700px; height: 450px }
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
						<div class="col-lg-3">
							<aside class="sidebar">
								<div class="agents text-color-light text-center">
									<h4 class="text-light pt-5 m-0"> اعضای رویداد </h4>
									<div class="owl-carousel owl-theme nav-bottom rounded-nav pl-1 pr-1 pt-3 m-0" data-plugin-options="{'items': 1, 'loop': false, 'dots': false, 'nav': true}">

										@forelse ($event->users as $member)
											<div class="pr-2 pl-2 mb-5"">
												<span class="agent-thumb">
													<img class="img-fluid rounded-circle" src="{{ $member->avatar ? $member->avatar : '/img/team-11.jpg' }}" alt />
												</span>
													<span class="agent-infos text-light pt-3">
													<strong class="text-uppercase font-weight-bold ">{{ $member->fName . ' ' . $member->lName }}</strong>
												</span>

											</div>

											@empty
												بدون ورزشکار

									@endforelse

										
										
									</div>
								</div>

								<h4 class="pt-4 mb-3 text-color-dark textAlginRightTeamofit teamofit-direction-rtl"> پیوستن به رویداد </h4>

								@guest()
										<p class="textAlginRightTeamofit teamofit-direction-rtl">جهت پیوستن به رویداد ، ابتدا ثبت نام کنید</p>
					     				<a href="{{ route('login') }}"><p style="text-align: center"><button class="btn custom-btn-style-1 _size-1 text-color-light" type="submit">عضویت</button></p></a>
								@endguest

								@auth()
									@if ($event->membersCount > \DB::table('event_user')->where('event_id', $event->id)->count())
						    			<p style="text-align: center"><a href="{{ route('app.events.request', $event->id) }}"><button class="btn custom-btn-style-1 _size-1 text-color-light" type="submit">ارسال درخواست</button></a></p>
							    	@elseif ($event->membersCount <= \DB::table('event_user')->where('event_id', $event->id)->count())
								<p style="text-align: center"><button class="btn custom-btn-style-1 _size-1 text-color-light" type="submit">ظرفیت تکمیل میباشد</button></p>

								@endif
						     	@endauth


							</aside>
						</div>
					</div>

				</div>

@stop
