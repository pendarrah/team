@extends('app.master')

@section('content')
<section class="parallax section section-text-light section-parallax section-center mt-0" data-plugin-parallax data-plugin-options="{'speed': 1.5}" data-image-src="/files/{{ $team->banner }}" style="min-height: 560px; margin:0px;">
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
							<div class="col-lg-6 text-center custom-xs-border-bottom p-0">
								<a data-hash href="#say-hello" class="text-decoration-none">
									<span class="custom-nav-button text-color-dark" style="color:#75abac;">
										لیست بازی تیم	
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
			<section class="about-us custom-section-padding" id="about-us">
					<div class="container">
						<div class="row">
							<div class="col-md-6 col-lg-6 teamofit-direction-rtl textAlginRightTeamofit">
								<h2 class="font-weight-bold text-color-dark">- درباره تیم سلاطین</h2>
								<p class="pl-4">توضیحات</p>
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
							</div>
						</div>
					</div>
				</section>
				<section class="custom-section-padding" style="background:#fff;">
					<div class="container">
						<div class="row">
							<div class="col">
								<h2 class="font-weight-bold text-color-dark teamofitTextAlignRight">- سرپرست تیم</h2>
							</div>
						</div>
						<div class="row">
							<article class="blog-post col">
								<div class="row">
									<div class="col-sm-8 col-lg-5">
										<div class="blog-post-image-wrapper teamofitTextAlignRight">
											<img src="/files/{{ $team->user->avatar }}" alt class="img-fluid" />
										</div>
									</div>
									<div class="col-sm-12 col-lg-7">
										<h2 class="teamofitTextAlignRight teamofit-direction-rtl"> {{ $team->user->fName . ' ' .  $team->user->lName }}</h2>
										<p class="teamofitTextAlignRight teamofit-direction-rtl">توضیحات</p>
										<hr class="solid">
									</div>
								</div>
							</article>
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
													<img src="{{ \App\User::where('id', $member)->first()->avatar ? "/files/" . \App\User::where('id', $member)->first()->avatar : '/img/team-11.jpg' }}" alt="" class="img-fluid" />
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
