@extends('app.master')

@section('content')
<section class="parallax section section-text-light section-parallax section-center mt-0" data-plugin-parallax data-plugin-options="{'speed': 1.5}" data-image-src="/img/team-details.jpg" style="min-height: 560px; margin:0px;">
					<div class="container">
						<div class="row justify-content-center mt-5">
							<div class="col-lg-8 mt-5">
								<h1 class="mt-5 pt-5 font-weight-semibold text-uppercase">تیم سلاطین</h1>
								<p class="mb-0 lead"> تمامی ایوینت های این تیم در  این صفحه قرار خواهد گرفت. </p>
							</div>
						</div>
					</div>
				</section>
				<div class="custom-about-me-links background-color-light-teams-details">
					<div class="container">
						<div class="row justify-content-end">
							<div class="col-lg-6 text-center custom-xs-border-bottom p-0">
								<a data-hash href="#say-hello" class="text-decoration-none">
									<span class="custom-nav-button text-color-dark" style="color:#75abac;">
										صفحه اختصاصی تیم	
										<i class="fa fa-list icons text-color-primary"></i>
									</span>
								</a>
							</div>
							<div class="col-lg-6 text-center custom-xs-border-bottom p-0" style="border-right: 1px solid #eee;">
								<a data-hash href="#say-hello" class="text-decoration-none">
									<span class="custom-nav-button custom-divisors text-color-dark" style="color:#75abac;">
										<i class="fa fa-user-plus  icons text-color-primary"></i>
										درخواست عضویت	
									</span>
								</a>
							</div>
						</div>
					</div>
			</div>
			
				
	<section class="section-secondary custom-section-padding" style="background-color: #eef4f2 !important; padding: 60px 0;">
					<div class="container">
						<div class="row">
							<div class="col">
								<h2 class="font-weight-bold text-color-dark textAlginRightTeamofit">- لیست رویدادهای تیم</h2>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="col-lg-12">
									<div class="tabs">
										<ul class="nav nav-tabs nav-justified">
											<li class="nav-item active">
												<a class="nav-link" href="#popular10" data-toggle="tab" class="text-center"><i class="fa fa-star"></i> رویدادهای در حال برگزاری</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#recent10" data-toggle="tab" class="text-center">رویدادهای گذشته</a>
											</li>
										</ul>
										<div class="tab-content">
											<div id="popular10" class="tab-pane active">
												<div class="ovaem_events_filter_content">
													<div class="col-md-4 col-sm-6 col-xs-6 ova-item isotope-item style3">
														<a href="#">
															<div class="ova_thumbnail">
																<img alt="" src="/img/blog-1.jpg">
																<div class="date">
																	<span class="month">17 مهر 1399</span>
																</div>
																<div class="venue">
																	
																ساعت 18:18 الی 21:21
									
																</div>
																<div class="venue eventsIcons">
																	<span data-toggle="tooltip" data-placement="bottom" title="اشتراک گذاری" class="fa fa-share-alt"></span>
																	<span data-toggle="tooltip" data-placement="bottom" title="جزئیات" class="fa fa-info-circle"></span>
																	<span data-toggle="tooltip" data-placement="bottom" title="عضویت" class="fa fa-sign-in"></span>
																</div>
																<div class="time">
																	<span class="price"><span>120000 ریال</span></span>
																</div>
															</div>
														</a>
														<div class="wrap_content">
															<h2 class="title">
																<a href="#">سلاطین</a>
															</h2>
															<div class="venue_mobile">
																			<span>
																				<i class="icon_pin_alt"></i>
																			</span>
																سلاطین
															</div>
															<div class="except">
															محله:
															پاسداران
															</div>
															<div class="more_detail">
																	<a class="btn_link" href="#">ثبت نام<i class="arrow_right"></i></a>
															</div>

														</div>
													</div>
												</div>
											</div>
											<div id="recent10" class="tab-pane">
												<div class="ovaem_events_filter_content">
													<div class="col-md-4 col-sm-6 col-xs-6 ova-item isotope-item style3">
														<a href="#">
															<div class="ova_thumbnail">
																<img alt="" src="/img/blog-1.jpg">
																<div class="date">
																	<span class="month">17 مهر 1399</span>
																</div>
																<div class="venue">
																	
																ساعت 18:18 الی 21:21
									
																</div>
																<div class="venue eventsIcons">
																	<span data-toggle="tooltip" data-placement="bottom" title="اشتراک گذاری" class="fa fa-share-alt"></span>
																	<span data-toggle="tooltip" data-placement="bottom" title="جزئیات" class="fa fa-info-circle"></span>
																	<span data-toggle="tooltip" data-placement="bottom" title="عضویت" class="fa fa-sign-in"></span>
																</div>
																<div class="time">
																	<span class="price"><span>120000 ریال</span></span>
																</div>
															</div>
														</a>
														<div class="wrap_content">
															<h2 class="title">
																<a href="#">سلاطین</a>
															</h2>
															<div class="venue_mobile">
																			<span>
																				<i class="icon_pin_alt"></i>
																			</span>
																سلاطین
															</div>
															<div class="except">
															محله:
															پاسداران
															</div>
															<div class="more_detail">
																	<a class="btn_link" href="#">ثبت نام<i class="arrow_right"></i></a>
															</div>

														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
@stop
