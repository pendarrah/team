@extends('app.master')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col">

                <div class="featured-boxes" style="margin-top:100px;margin-bottom:100px;">
                    <div class="row">
                        <div class="col-md-2">
                            @include('app.panel.menu')
                        </div>
                        <div class="col-md-10">
                            <div class="container-body">
                                <div class="container teamofitMarginTop">
                                    <p class="alert alert-warning teamofitTextAlignRight"> توضیحات در ارتباط با درج رویدادتوضیحات در ارتباط با درج رویدادتوضیحات در ارتباط با درج رویدادتوضیحات در ارتباط با درج رویدادتوضیحات در ارتباط با درج رویدادتوضیحات در ارتباط با درج رویدادتوضیحات در ارتباط با درج رویدادتوضیحات در ارتباط با درج رویدادتوضیحات در ارتباط با درج رویدادتوضیحات در ارتباط با درج رویداد </p>
                                    <form method="post" enctype="multipart/form-data" action="{{ route('team.store') }}" >
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
                                                <input style="width: 450px" type="text" class="form-control" id="name" value="{{ old('name') }}" placeholder="نام تیم" name="name">
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
                                                <input type="submit" class="btn btn-success form-control" value="ایجاد تیم">
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
