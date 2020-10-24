@extends('app.master')

@section('content')

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">فرم عضویت
						<a href="{{ route('login') }}"><button class="btn btn-success mr-3">نمایش فرم ورود</button></a>
					</h5>

					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>


				<div style="direction: rtl; text-align: right" class="modal-body">

					<form method="POST" action="{{ route('register') }}">
						@csrf

						<p style="margin: 10px">جهت ارسال درخواست عضویت، ثبت نام در تیموفیت الزامیست. درصورتی که حساب کاربری دارید باکلیک برروی گزینه سبز رنگ بالا، وارد شده و سپس درخواست عضویت را ارسال نمایید در غیر اینصورت پس از تکمیل فرم عضویت و احراز هویت، مجددا برروی گزینه عضویت در تیم کلیک نمایید.</p>


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


<section class="parallax section section-text-light section-parallax section-center mt-0" data-plugin-parallax data-plugin-options="{'speed': 1.5}" data-image-src="{{ $team->banner ? $team->banner : '/img/no-banner.jpg' }}" style="min-height: 560px; margin:0px;">
					<div class="container">
						<div class="row justify-content-center mt-5">
							<div class="col-lg-8 mt-5">
								<h1 class="mt-5 pt-5 font-weight-semibold text-uppercase">تیم {{ $team->name }}</h1>
							</div>
						</div>
					</div>
				</section>
				<div class="custom-about-me-links background-color-light-teams-details">
					<div class="container">
						<div class="row justify-content-end">
							<div class="col-md-6 text-center custom-xs-border-bottom p-0">
								<a data-hash href="{{ route('app.teams.events', $team->id) }}" class="text-decoration-none">
									<span class="custom-nav-button text-color-dark" style="color:#75abac;">
										لیست بازی تیم
										<i class="fa fa-list icons text-color-primary"></i>
									</span>
								</a>
							</div>
							<div class="col-md-6 text-center custom-xs-border-bottom p-0" style="border-right: 1px solid #eee;">

								@guest()
									<a data-toggle="modal" data-target="#exampleModal" class="text-decoration-none">
										<span class="custom-nav-button custom-divisors text-color-dark" style="color:#75abac;">
											<i class="fa fa-user-plus  icons text-color-primary"></i>
											درخواست عضویت
										</span>
									</a>
								@endguest

								@auth()

										<a href="{{ route('app.teams.request', $team->id) }}" class="text-decoration-none">
											<span class="custom-nav-button custom-divisors text-color-dark" style="color:#75abac;">
												<i class="fa fa-user-plus  icons text-color-primary"></i>
												درخواست عضویت
											</span>
										</a>

								@endauth






							</div>
						</div>
					</div>
			</div>
			<section class="about-us custom-section-padding" id="about-us">
					<div class="container">
						<div class="row">
							<div class="col-md-6 col-lg-6 teamofit-direction-rtl textAlginRightTeamofit">
								<h2 class="font-weight-bold text-color-dark">- درباره  {{ $team->name }}</h2>
								<p class="pl-4">{{ $team->description }}</p>



									<div style="margin-top: 100px" class="row">
										<div class="col">
											<h2 class="font-weight-bold text-color-dark teamofitTextAlignRight">- سرپرست تیم</h2>
										</div>
									</div>
									<div class="row">
										<article class="blog-post col">
											<div class="row">
												<div class="col-sm-8 col-lg-5">
													<div class="blog-post-image-wrapper teamofitTextAlignRight">
														<img style="border-radius: 50%;" src="/files/{{ $team->user->avatar }}" alt class="img-circle" />
													</div>
												</div>
												<div class="col-sm-12 col-lg-7">
													<h2 class="teamofitTextAlignRight teamofit-direction-rtl"> {{ $team->user->fName . ' ' .  $team->user->lName }}</h2>
													<hr class="solid">
												</div>
											</div>
										</article>
									</div>



							</div>
							<div class="col-md-6 col-lg-6">
								<div class="content-grid custom-content-grid mt-5 mb-4">
									<div class="row content-grid-row">
										<div class="content-grid-item col-lg-6 background-color-light p-4">
											<div class="counters">
												<div class="counter custom-sm-counter-style">
													<img class="counter-icon" src="img/demos/business-consulting/icons/icon-1.png" alt />
													<strong class="text-color-primary custom-primary-font" data-to="{{ \DB::table('team_user')->where('team_id', $team->id)->where('status', 'accept')->count() }}" >0</strong>
													<label>تعداد بازیکن</label>
												</div>
											</div>	
										</div>
										<div class="content-grid-item col-lg-6 p-4">
											<div class="counters">
												<div class="counter margin-style-2 custom-sm-counter-style">
													<img class="counter-icon" src="img/demos/business-consulting/icons/icon-2.png" alt />
													<strong class="text-color-primary custom-primary-font" data-to="{{ \App\Event::where('team_id', $team->id)->count() }}" >0</strong>
													<label>تعداد بازی ها</label>
												</div>
											</div>	
										</div>
									</div>
								</div>
								<div class="content-grid custom-content-grid mt-5 mb-4">
									<div class="row content-grid-row">
										<div class="content-grid-item col-lg-6 background-color-light p-4">
											<div class="counters">
												<div class="counter custom-sm-counter-style">
													<img class="counter-icon" src="img/demos/business-consulting/icons/icon-1.png" alt />
													<strong class="text-color-primary custom-primary-font" >{{ $team->city->name }}</strong>
													<label class="mt-3">شهر</label>
												</div>
											</div>
										</div>
										<div class="content-grid-item col-lg-6 p-4">
											<div class="counters">
												<div class="counter margin-style-2 custom-sm-counter-style">
													<img class="counter-icon" src="img/demos/business-consulting/icons/icon-2.png" alt />
													<strong class="text-color-primary custom-primary-font" >{{ $team->category->title }}</strong>
													<label class="mt-3">رشته</label>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>



						</div>
					</div>
				</section>


	<section class="section-secondary custom-section-padding" style="background-color: #eef4f2 !important; padding: 60px 0;">
					<div class="container">
						<div class="row">
							<div class="col">
								<h2 class="font-weight-bold text-color-dark textAlginRightTeamofit"> - اعضای تیم</h2>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="owl-carousel show-nav-title custom-dots-style-1 custom-dots-position custom-xs-arrows-style-2 mb-0" data-plugin-options="{'items': 4, 'margin': 20, 'autoHeight': true, 'loop': false, 'nav': false, 'dots': true}">

									@forelse ($teamMembers as $member)
										<div>
											<div class="team-item p-0">
												<a href="#" class="text-decoration-none">
												<span class="image-wrapper">
													<img src="{{ \App\User::where('id', $member)->first()->avatar ? "/files/" . \App\User::where('id', $member)->first()->avatar : '/img/no-avatar.jpeg' }}" alt="" class="img-fluid" />
												</span>
												</a>
												<div class="team-infos">

													<a href="#" class="text-decoration-none textAlginRightTeamofit">
														<p class="team-member-name text-color-dark font-weight-semibold text-4">{{ \App\User::where('id', $member)->first()->fName . ' ' . \App\User::where('id', $member)->first()->lName }}</p>
													</a>
												</div>
											</div>
										</div>

									@empty

									@endforelse





								</div>
							</div>
						</div>
					</div>
				</section>
@stop
