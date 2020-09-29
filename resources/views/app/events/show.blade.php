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
														<span class="thumb-info thumb-info-centered-info thumb-info-no-borders text-4">
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
												<td class="background-color-primary text-light align-middle">

													عنوان رویداد
												</td>
												<td class="text-4 font-weight-bold align-middle background-color-primary text-light">

													{{ $event->title }}
												</td>
											</tr>
											<tr>
												<td>
													مبلغ
												</td>
												<td>
													{{ number_format($event->price) }} ریال
												</td>
											</tr>
											<tr>
												<td>
													آدرس
												</td>
												<td>
													{{ $event->address }}
													<a style="display: none" href="#map" class="text-2" data-hash data-hash-offset="100">مشاهده در نقشه</a>
												</td>
											</tr>
											<tr>
												<td>
													دسته بندی
												</td>
												<td>
													{{ $event->category->title }}
												</td>
											</tr>
											<tr>
												<td>
													تعداد اعضا
												</td>
												<td>
													{{ $event->membersCount }}
												</td>
											</tr>
											<tr>
												<td>
													عضو باقیمانده
												</td>
												<td>
													{{ $event->membersCount }}
												</td>
											</tr>
											<tr>
												<td>
													زمان شروع
												</td>
												<td style="direction: ltr">{{ jdate($event->timeStart) }}</td>
											</tr>
											<tr>
												<td>
													زمان پایان
												</td>
												<td style="direction: ltr">{{ jdate($event->timeFinish) }}</td>

											</tr>

											<tr>
												<td>
													اشتراک گذاری
												</td>
												<td>
													<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha256-NuCn4IvuZXdBaFKJOAcsU2Q3ZpwbdFisd5dux4jkQ5w=" crossorigin="anonymous" />
													<ul class="social-network social-circle">
														<li><a href="whatsapp://send?text={{  url()->current()  }}" data-action="share/whatsapp/share" target="_blank" class="icoRss" title="Rss"><i style="font-size: 20px;" class="fa fa-whatsapp"></i>  واتس اپ  </a></li>
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


									<h4 style="display: none" class="mt-3 mb-3" id="map">لوکیشن:</h4>
									<div style="display: none" id="googlemaps" class="google-map m-0 mb-5"></div>


								</div>
							</div>

						</div>
						<div class="col-lg-3">
							<aside class="sidebar">
								<div class="agents text-color-light text-center">
									<h4 class="text-light pt-5 m-0"> اعضای تیم </h4>
									<div class="owl-carousel owl-theme nav-bottom rounded-nav pl-1 pr-1 pt-3 m-0" data-plugin-options="{'items': 1, 'loop': false, 'dots': false, 'nav': true}">
										<div class="pr-2 pl-2">
											<a href="demo-real-estate-agents-detail.html" class="text-decoration-none">
												<span class="agent-thumb">
													<img class="img-fluid rounded-circle" src="/img/team-11.jpg" alt />
												</span>
												<span class="agent-infos text-light pt-3">
													<strong class="text-uppercase font-weight-bold">علی رحمانی</strong>
													<span class="font-weight-light">123-456-789</span>
													<span class="font-weight-light">bruno@domain.com</span>
												</span>
											</a>
										</div>
										<div class="pr-2 pl-2">
											<a href="demo-real-estate-agents-detail.html" class="text-decoration-none">
												<span class="agent-thumb">
													<img class="img-fluid rounded-circle" src="/img/team-11.jpg" alt />
												</span>
												<span class="agent-infos text-light pt-3">
													<strong class="text-uppercase font-weight-bold">محمدعلی مشاعی</strong>
													<span class="font-weight-light">123-456-789</span>
													<span class="font-weight-light">jeffdoe@domain.com</span>
												</span>
											</a>
										</div>
										<div class="pr-2 pl-2">
											<a href="demo-real-estate-agents-detail.html" class="text-decoration-none">
												<span class="agent-thumb">
													<img class="img-fluid rounded-circle" src="/img/team-11.jpg" alt />
												</span>
												<span class="agent-infos text-light pt-3">
													<strong class="text-uppercase font-weight-bold">محمد حسینی</strong>
													<span class="font-weight-light">123-456-789</span>
													<span class="font-weight-light">jessicadoe@domain.com</span>
												</span>
											</a>
										</div>
									</div>
								</div>

								<h4 class="pt-4 mb-3 text-color-dark textAlginRightTeamofit teamofit-direction-rtl"> اضافه شدن به رویداد </h4>
								<p class="textAlginRightTeamofit teamofit-direction-rtl">درصورتی که در تیموفیت ثبت نام نیستید ، ابتدا ثبت نام کنید</p>

							</aside>
						</div>
					</div>

				</div>

@stop
