@extends('app.master')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col">

                <div class="featured-boxes" style="margin-top:40px;margin-bottom:100px;">
                    <div class="row">
                        <div class="col-md-2">
                            @include('app.panel.menu')
                        </div>
                        <div class="col-md-10">
                            <div class="container-body">
                                <div class="container teamofitMarginTop">
                                    <p class="alert alert-warning teamofitTextAlignRight"> توضیحات در ارتباط با درج رویدادتوضیحات در ارتباط با درج رویدادتوضیحات در ارتباط با درج رویدادتوضیحات در ارتباط با درج رویدادتوضیحات در ارتباط با درج رویدادتوضیحات در ارتباط با درج رویدادتوضیحات در ارتباط با درج رویدادتوضیحات در ارتباط با درج رویدادتوضیحات در ارتباط با درج رویدادتوضیحات در ارتباط با درج رویداد </p>
                                    <form method="post" enctype="multipart/form-data" action="{{ route('team.update', $team->id) }}" >
                                        @method('PATCH')
                                        @csrf
                                        @if ($errors->any())
                                            <div style="direction: rtl!important; text-align: right" class="alert alert-danger">
                                                <ul style="direction: rtl!important; text-align: right" >
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif


                                        <div class="form-row teamofitMarginTop">
                                            <div class="col">
                                                <input style="width: 450px" type="text" class="form-control" id="name" value="{{ old('name', $team->name) }}" placeholder="نام تیم" name="name">
                                            </div>

                                            <div class="col">
                                                <select class="form-control" name="city_id">
                                                    <option disabled selected value> -- شهر را انتخاب نمایید -- </option>
                                                    @foreach (\App\City::all() as $city)
                                                        <option {{ $team->city_id == $city->id ? 'selected' : '' }} value="{{ $city->id }}">{{ $city->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row teamofitMarginTop">
                                            <div class="col">
                                                <select class="form-control" name="category_id">
                                                    <option disabled selected value >لطفا دسته بندی رویداد را وارد فرمایید ...</option>
                                                    @foreach (\App\Category::all() as $category)
                                                        <option {{ $team->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col">
                                                <select class="form-control" name="gender">
                                                    <option disabled selected value >لطفا جنسیت را انتخاب فرمایید ...</option>
                                                    <option {{ $team->gender == 'آقایان' ? 'selected' : '' }} value="آقایان">آقایان</option>
                                                    <option {{ $team->gender == 'بانوان' ? 'selected' : '' }} value="بانوان">بانوان</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row teamofitMarginTop">
                                            <div class="col">
                                                <textarea name="description" class="form-control" id="" placeholder="توضیحات تیم" cols="30" rows="10">{{ old('description', $team->description) }}</textarea>
                                            </div>
                                        </div>


                                        <div class="form-row teamofitMarginTop">
                                            <div style=" direction: rtl; text-align: right;" class="col">
                                                <label style="color: white" for="">آواتار سرپرست را انتخاب نمایید:</label>
                                                <input type="file" name="avatar" class="btn btn-warning" value="آپلود تصویر">
                                            </div>
                                        </div>


                                        <div class="form-row teamofitMarginTop">
                                            <div style=" direction: rtl; text-align: right;" class="col">
                                                <label style="color: white" for="">بنر تیم را انتخاب نمایید:</label>
                                                <input type="file" name="banner" class="btn btn-warning" value="آپلود تصویر">
                                            </div>
                                        </div>


                                        <div class="form-row teamofitMarginTop teamofitTextAlignRight">
                                            <div class="col">
                                                <input type="submit" class="btn btn-success form-control" value="ویرایش تیم">
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

@stop
