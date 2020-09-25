@extends('app.master')

@section('content')
<div class="container">

					<div class="row pb-5 pt-3 teamofit-direction-ltr">
						<div class="col-lg-9">
									
							<div class="row">
								<div class="col-lg-7">

									<span class="thumb-info-listing-type thumb-info-listing-type-detail background-color-secondary text-uppercase text-color-light font-weight-semibold p-2 pl-3 pr-3">
										دسته بندی
									</span>

									<div class="thumb-gallery">
										<div class="lightbox" data-plugin-options="{'delegate': 'a', 'type': 'image', 'gallery': {'enabled': true}}">
											<div class="owl-carousel owl-theme manual thumb-gallery-detail show-nav-hover" id="thumbGalleryDetail">
												<div>
													<a href="/img/listing-detail-1.jpg">
														<span class="thumb-info thumb-info-centered-info thumb-info-no-borders text-4">
															<span class="thumb-info-wrapper text-4">
																<img alt="Property Detail" src="/img/listing-detail-1.jpg" class="img-fluid">
																<span class="thumb-info-title text-4">
																	<span class="thumb-info-inner text-4"><i class="icon-magnifier icons text-4"></i></span>
																</span>
															</span>
														</span>
													</a>
												</div>
												<div>
													<a href="/img/listing-detail-1.jpg">
														<span class="thumb-info thumb-info-centered-info thumb-info-no-borders text-4">
															<span class="thumb-info-wrapper text-4">
																<img alt="Property Detail" src="/img/listing-detail-1.jpg" class="img-fluid">
																<span class="thumb-info-title text-4">
																	<span class="thumb-info-inner text-4"><i class="icon-magnifier icons text-4"></i></span>
																</span>
															</span>
														</span>
													</a>
												</div>
												<div>
													<a href="/img/listing-detail-1.jpg">
														<span class="thumb-info thumb-info-centered-info thumb-info-no-borders text-4">
															<span class="thumb-info-wrapper text-4">
																<img alt="Property Detail" src="/img/listing-detail-1.jpg" class="img-fluid">
																<span class="thumb-info-title text-4">
																	<span class="thumb-info-inner text-4"><i class="icon-magnifier icons text-4"></i></span>
																</span>
															</span>
														</span>
													</a>
												</div>
												<div>
													<a href="/img/listing-detail-1.jpg">
														<span class="thumb-info thumb-info-centered-info thumb-info-no-borders text-4">
															<span class="thumb-info-wrapper text-4">
																<img alt="Property Detail" src="/img/listing-detail-1.jpg" class="img-fluid">
																<span class="thumb-info-title text-4">
																	<span class="thumb-info-inner text-4"><i class="icon-magnifier icons text-4"></i></span>
																</span>
															</span>
														</span>
													</a>
												</div>
											</div>
										</div>

										<div class="owl-carousel owl-theme manual thumb-gallery-thumbs mt" id="thumbGalleryThumbs">
											<div>
												<img alt="Property Detail" src="/img/listing-detail-1.jpg" class="img-fluid cur-pointer">
											</div>
											<div>
												<img alt="Property Detail" src="/img/listing-detail-1.jpg" class="img-fluid cur-pointer">
											</div>
											<div>
												<img alt="Property Detail" src="/img/listing-detail-1.jpg" class="img-fluid cur-pointer">
											</div>
											<div>
												<img alt="Property Detail" src="/img/listing-detail-1.jpg" class="img-fluid cur-pointer">
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
													مبلغ
												</td>
												<td class="text-4 font-weight-bold align-middle background-color-primary text-light">
													$3,595,000
												</td>
											</tr>
											<tr>
												<td>
													عنوان تست
												</td>
												<td>
													#123456
												</td>
											</tr>
											<tr>
												<td>
													آدرس
												</td>
												<td>
													1234 SW 63rd Ave - South Miami - Florida<br><a href="#map" class="text-2" data-hash data-hash-offset="100">(Map Location)</a>
												</td>
											</tr>
											<tr>
												<td>
													عنوان تست
												</td>
												<td>
													Porto Village
												</td>
											</tr>
											<tr>
												<td>
													عنوان تست
												</td>
												<td>
													7
												</td>
											</tr>
											<tr>
												<td>
													عنوان تست
												</td>
												<td>
													8
												</td>
											</tr>
											<tr>
												<td>
													عنوان تست
												</td>
												<td>
													2
												</td>
											</tr>
											<tr>
												<td>
													عنوان تست
												</td>
												<td>
													8,000
												</td>
											</tr>
											<tr>
												<td>
													عنوان تست
												</td>
												<td>
													20,000
												</td>
											</tr>
											<tr>
												<td>
													عنوان تست
												</td>
												<td>
													1999
												</td>
											</tr>
										</tbody>
									</table>

								</div>
							</div>

							<div class="row">
								<div class="col textAlginRightTeamofit teamofit-direction-rtl">

									<h4 class="mt-3 mb-3">توضیحات</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc <a href="#">vehicula</a> lacinia. Proin adipiscing porta tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>

									<p>Ctrices posuere cubilia Curae; In eu libero ligula. Fusce eget metus lorem, ac feugiat nibh adipiscing sit amet. In eu juiverra leo. Vestibulum ante ipsum primis in faucibus orci.</p>

									<hr class="solid tall">

									<h4 class="mt-3 mb-3">امکانات</h4>

									<ul class="list list-icons list-secondary row m-0">
										<li class="col-sm-6 col-lg-4"><i class="fa fa-check"></i> Air conditioning <a href="#" data-plugin-tooltip data-toggle="tooltip" data-placement="top" title="+ Central Heating"><i class="fa fa-info-circle"></i></a></li>
										<li class="col-sm-6 col-lg-4"><i class="fa fa-check"></i> Home Theater</li>
										<li class="col-sm-6 col-lg-4"><i class="fa fa-check"></i> Central Heating</li>
										<li class="col-sm-6 col-lg-4"><i class="fa fa-check"></i> Laundry</li>
										<li class="col-sm-6 col-lg-4"><i class="fa fa-check"></i> Balcony</li>
										<li class="col-sm-6 col-lg-4 custom-list-item-disabled"><i class="fa fa-check"></i> Storage</li>
										<li class="col-sm-6 col-lg-4 custom-list-item-disabled"><i class="fa fa-check"></i> Garage</li>
										<li class="col-sm-6 col-lg-4 custom-list-item-disabled"><i class="fa fa-check"></i> Yard</li>
										<li class="col-sm-6 col-lg-4"><i class="fa fa-check"></i> Electric Water Heater</li>
										<li class="col-sm-6 col-lg-4"><i class="fa fa-check"></i> Deck</li>
										<li class="col-sm-6 col-lg-4"><i class="fa fa-check"></i> Gym</li>
										<li class="col-sm-6 col-lg-4"><i class="fa fa-check"></i> Ocean View</li>
									</ul>

									<hr class="solid tall">

									<h4 class="mt-3 mb-3" id="map">لوکیشن</h4>
									<div id="googlemaps" class="google-map m-0 mb-5"></div>

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

								<form id="contactForm" action="php/contact-form.php" method="POST" class="mb-4 textAlginRightTeamofit teamofit-direction-rtl">
									<div class="form-row">
										<div class="form-group col">
											<label>Your name *</label>
											<input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" id="name" required>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col">
											<label>Your email address *</label>
											<input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email" required>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col">
											<label>Subject</label>
											<input type="text" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control" name="subject" id="subject" required>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col">
											<label>Message *</label>
											<textarea maxlength="5000" data-msg-required="Please enter your message." rows="6" class="form-control" name="message" id="message" required></textarea>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col">
											<input type="submit" value="Send Message" class="btn btn-secondary mb-lg-5" data-loading-text="Loading...">

											<div class="alert alert-success d-none" id="contactSuccess">
												Message has been sent to us.
											</div>

											<div class="alert alert-danger d-none" id="contactError">
												Error sending your message.
											</div>
										</div>
									</div>
								</form>

							</aside>
						</div>
					</div>

				</div>

@stop
