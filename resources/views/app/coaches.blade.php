@extends('app.master')

@section('content')
	<div class="container" style="margin-top: 40px;margin-bottom: 40px;">
		<div class="row">
			<div class="col-md-3">
				<div class="filtering-background">
					<h4> فیلترینگ </h4>
				<div id="accordion">
					<div class="card">
						<div class="card-header" id="headingOne">
							<h5 class="mb-0">
								<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
								رشته ورزشی
								</button>
							</h5>
						</div>

						<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
							<div class="card-body">
								<label class="container-label">همه
									<input type="checkbox" checked="checked">
									<span class="checkmark"></span>
								</label>
								<label class="container-label">فوتبال
									<input type="checkbox">
									<span class="checkmark"></span>
								</label>
								<label class="container-label">فوتسال
									<input type="checkbox">
									<span class="checkmark"></span>
								</label>
								<label class="container-label">والیبال
									<input type="checkbox">
									<span class="checkmark"></span>
								</label>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-header" id="headingTwo">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							جنسیت
							</button>
						</h5>
						</div>
						<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
						<div class="card-body">
								<label class="container-label">همه
									<input type="checkbox" checked="checked">
									<span class="checkmark"></span>
								</label>
								<label class="container-label">مرد
									<input type="checkbox">
									<span class="checkmark"></span>
								</label>
								<label class="container-label">زن
									<input type="checkbox">
									<span class="checkmark"></span>
								</label>
						</div>
						</div>
					</div>
					<div class="card">
						<div class="card-header" id="headingThree">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							استان
							</button>
						</h5>
						</div>
						<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
							<div class="card-body">
								<label class="container-label">همه
									<input type="checkbox" checked="checked">
									<span class="checkmark"></span>
								</label>
								<label class="container-label">نهران
									<input type="checkbox">
									<span class="checkmark"></span>
								</label>
								<label class="container-label">مشهد
									<input type="checkbox">
									<span class="checkmark"></span>
								</label>
								<label class="container-label">اصفهان
									<input type="checkbox">
									<span class="checkmark"></span>
								</label>
								<label class="container-label">قم
									<input type="checkbox">
									<span class="checkmark"></span>
								</label>
								<label class="container-label">بندرعباس
									<input type="checkbox">
									<span class="checkmark"></span>
								</label>
							
							</div>
						</div>
					</div>
					</div>
				</div>
			</div>
			<div class="col-md-9">
				<div class="filtering-background">
					<h4> لیست مربی های برتر </h4>
					<div class="row">
						<div class="col-md-4 box-coaches all football">
							<div class="main-box-coaches">
								<img src="/img/profile.jpg" width="100%" alt="">
								<a href="#" class="btn btn-primary">فوتبال</a>
								<p>
									<strong> محمدعلی مشاعی </strong>
								</p>
								<a href="#" class="more-details"> <i class="fa fa-arrow-left"></i> بیشتر </a>
							</div>
						</div>
						<div class="col-md-4 box-coaches all volleyball">
							<div class="main-box-coaches">
								<img src="/img/profile.jpg" width="100%" alt="">
								<a href="#" class="btn btn-primary">فوتبال</a>
								<p>
									<strong> محمدعلی مشاعی </strong>
								</p>
								<a href="#" class="more-details"> <i class="fa fa-arrow-left"></i> بیشتر </a>
							</div>
						</div>
						<div class="col-md-4 box-coaches all futsal">
							<div class="main-box-coaches">
								<img src="/img/profile.jpg" width="100%" alt="">
								<a href="#" class="btn btn-primary">فوتبال</a>
								<p>
									<strong> محمدعلی مشاعی </strong>
								</p>
								<a href="#" class="more-details"> <i class="fa fa-arrow-left"></i> بیشتر </a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
