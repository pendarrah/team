@extends('app.master')

@section('content')


	<div class="container marginBottomTeamofit" >

		<h2 class="custom-bar _left text-color-dark eventsMarginTop">تیم ها</h2>
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


			<form action="{{ route('app.teams.search') }}" method="get">
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



			<div class="sort-destination-loader sort-destination-loader-showing">
				<div class="row image-gallery sort-destination lightbox" data-sort-id="portfolio" data-plugin-options="{'delegate': 'a.lightbox-portfolio', 'type': 'image', 'gallery': {'enabled': true}}">
					@foreach ($teams as $team)

						<div class="col-md-4 col-sm-6 col-xs-6 ova-item isotope-item style3 ">
							<a href="{{ route('app.teams.show', $team->id) }}">
								<div class="ova_thumbnail">
									<img alt="" src="{{ asset("/files/$team->banner") }}">
								</div>
							</a>
							<div class="wrap_content">
								<h2 class="title">
									<a href="{{ route('app.teams.show', $team->id) }}">{{ $team->name }}</a>
								</h2>
								<div class="venue_mobile">
                                            <span>
                                                <i class="icon_pin_alt"></i>
                                            </span>
									{{ $team->name }}
								</div>

								<div class="more_detail">
										<a class="btn_link" href="{{ route('app.teams.show', $team->id) }}">مشاهده جزییات<i class="arrow_right"></i></a>
								</div>

							</div>
						</div>
					@endforeach
				</div>
				{{--<p> {{ $teams->links() }} </p>--}}
			</div>


		</div>

	</div>


@stop

@section('footerScripts')

@stop