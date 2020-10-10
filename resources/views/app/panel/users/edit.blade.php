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
                                    <p class="alert alert-warning teamofitTextAlignRight"> توضیحات در ارتباط با درج دسته بندیتوضیحات در ارتباط با درج دسته بندیتوضیحات در ارتباط با درج دسته بندیتوضیحات در ارتباط با درج دسته بندیتوضیحات در ارتباط با درج دسته بندیتوضیحات در ارتباط با درج دسته بندیتوضیحات در ارتباط با درج دسته بندیتوضیحات در ارتباط با درج دسته بندیتوضیحات در ارتباط با درج دسته بندیتوضیحات در ارتباط با درج دسته بندی </p>
                                    <form method="post" enctype="multipart/form-data" action="{{ route('users.update', $user->id) }}" >
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
                                                    <input type="text" class="form-control" id="fName" value="{{ old('fName', $user->fName) }}" placeholder="نام" name="fName">
                                                </div>

                                                <div class="col">
                                                    <input type="text" class="form-control" id="lName" value="{{ old('lName', $user->fName) }}" placeholder="نام خانوادگی" name="lName">
                                                </div>
                                            </div>

                                            <div class="form-row teamofitMarginTop">
                                                <div class="col">
                                                    <select class="form-control" name="type">
                                                        <option disabled >لطفا نوع حساب کاربری را انتخاب نمایید ...</option>
                                                        <option {{ $user->type == 'user' ? 'selected' : '' }} value="user">ورزشکار</option>
                                                        <option {{ $user->type == 'supervisor' ? 'selected' : '' }} value="supervisor" >سرپرست</option>
                                                    </select>
                                                </div>

                                                <div class="col">
                                                    <input type="email" class="form-control" id="email" value="{{ old('email', $user->email) }}" placeholder="آدرس ایمیل" name="email">
                                                </div>
                                            </div>


                                            <div class="form-row teamofitMarginTop">

                                                <div class="col">
                                                    <select class="form-control" name="category_id">
                                                        <option disabled selected value> -- رشته انتخاب نمایید -- </option>
                                                        @foreach (\App\Category::all() as $category)
                                                            <option {{ $user->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>


                                                <div class="col">
                                                    <select class="form-control" name="city_id">
                                                        <option disabled selected value> -- شهر را انتخاب نمایید -- </option>
                                                        @foreach (\App\City::all() as $city)
                                                            <option {{ $user->city_id == $city->id ? 'selected' : '' }} value="{{ $city->id }}">{{ $city->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>


                                        <div class="form-row teamofitMarginTop">
                                            <div class="col">
                                                <input type="text" class="form-control" id="mobile" value="{{ old('mobile', $user->mobile) }}" placeholder="شماره موبایل" name="mobile">
                                            </div>


                                            <div class="col">
                                                <select class="form-control" name="status">
                                                    <option {{ $user->status == '1' ? 'selected' : '' }} value="1">تایید نشده</option>
                                                    <option {{ $user->status == '2' ? 'selected' : '' }} value="2" >تایید شده</option>
                                                    <option {{ $user->status == '13' ? 'selected' : '' }} value="13" >مسدود</option>
                                                </select>
                                            </div>


                                        </div>




                                        <div class="form-row teamofitMarginTop teamofitTextAlignRight">
                                            <div class="col">
                                                <input type="submit" class="btn btn-success form-control" value="ویرایش کاربر">
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
