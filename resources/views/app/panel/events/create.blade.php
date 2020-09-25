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
                                    <form method="post" enctype="multipart/form-data" action="{{ route('event.store') }}" >
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
                                                <input type="text" class="form-control" id="title" value="{{ old('title') }}" placeholder="عنوان رویداد" name="title">
                                            </div>
                                            <div class="col">
                                                <select class="form-control" name="category">
                                                    <option disabled >لطفا دسته بندی رویداد را وارد فرمایید ...</option>
                                                    <option {{ old('category') == 'فوتبال' ? 'selected' : '' }}>فوتبال</option>
                                                    <option {{ old('category') == 'فوتسال' ? 'selected' : '' }} >فوتسال</option>
                                                    <option {{ old('category') == 'بسکتبال' ? 'selected' : '' }} >بسکتبال</option>
                                                    <option {{ old('category') == 'والیبال' ? 'selected' : '' }} >والیبال</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row teamofitMarginTop">
                                            <div class="col">
                                                <input type="number"  class="form-control" id="price" value="{{ old('price') }}" placeholder="قیمت رویداد (ریال)" name="price">
                                            </div>
                                            <div class="col">
                                                <input type="number" class="form-control" id="membersCount" value="{{ old('membersCount') }}" placeholder="تعداد اعضا" name="membersCount">
                                            </div>
                                        </div>
                                        <div class="form-row teamofitMarginTop">
                                            <div class="col">
                                                <input placeholder="زمان شروع رویداد" class="form-control dp" >
                                                <input type="hidden" name="timeStart" placeholder="زمان شروع رویداد" class="observer" >
                                            </div>
                                            <div class="col">
                                                <input class="form-control dp2" >
                                                <input type="hidden" placeholder="زمان پایان رویداد" name="timeFinish" class="observer2" >

                                            </div>
                                        </div>
                                        <div class="form-row teamofitMarginTop">
                                            <div class="col">
                                                <input type="text" class="form-control" id="address" placeholder="آدرس" value="{{ old('address') }}" name="address">
                                            </div>
                                        </div>
                                        <div class="form-row teamofitMarginTop">
                                            <div class="col">
                                                <textarea name="description" class="form-control" placeholder="توضیحات رویداد ...">{{ old('description') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-row teamofitMarginTop teamofitTextAlignRight">
                                            <div class="col">
                                                <label style="color: white" for="">تصویر را انتخاب نمایید:</label>
                                                <input type="file" name="picture" class="btn btn-warning" value="آپلود تصویر">
                                            </div>
                                        </div>
                                        <div class="form-row teamofitMarginTop teamofitTextAlignRight">
                                            <div class="col">
                                                <input type="submit" class="btn btn-success form-control" value="درج رویداد">
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
