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
                                    <form method="post" enctype="multipart/form-data" action="{{ route('event.update', $event->id) }}" >
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
                                                <input type="text" class="form-control" id="title" value="{{ old('title', $event->title) }}" placeholder="عنوان رویداد" name="title">
                                            </div>
                                            <div class="col">
                                                <select class="form-control" name="category">
                                                    <option disabled >لطفا دسته بندی رویداد را وارد فرمایید ...</option>
                                                    <option {{ $event->category == 'فوتبال' ? 'selected' : '' }}>فوتبال</option>
                                                    <option {{ $event->category == 'فوتسال' ? 'selected' : '' }} >فوتسال</option>
                                                    <option {{ $event->category == 'بسکتبال' ? 'selected' : '' }} >بسکتبال</option>
                                                    <option {{ $event->category == 'والیبال' ? 'selected' : '' }} >والیبال</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row teamofitMarginTop">
                                            <div class="col">
                                                <input type="number"  class="form-control" id="price" value="{{ old('price', $event->price) }}" placeholder="قیمت رویداد (ریال)" name="price">
                                            </div>
                                            <div class="col">
                                                <input type="number" class="form-control" id="membersCount" value="{{ old('membersCount', $event->membersCount) }}" placeholder="تعداد اعضا" name="membersCount">
                                            </div>
                                        </div>
                                        <div class="form-row teamofitMarginTop">
                                            <div class="col">
                                                <input placeholder="زمان شروع رویداد" value="{{ $event->timeStart }}" class="form-control dp" >
                                                <input type="hidden" name="timeStart" value="{{ $event->timeStart }}" placeholder="زمان شروع رویداد" class="observer" >
                                            </div>
                                            <div class="col">
                                                <input value="{{ $event->timeFinish }}" class="form-control dp2" >
                                                <input value="{{ $event->timeFinish }}" type="hidden" placeholder="زمان پایان رویداد" name="timeFinish" class="observer2" >

                                            </div>
                                        </div>
                                        <div class="form-row teamofitMarginTop">
                                            <div class="col">
                                                <input type="text" class="form-control" id="address" placeholder="آدرس" value="{{ old('address', $event->address) }}" name="address">
                                            </div>
                                        </div>
                                        <div class="form-row teamofitMarginTop">
                                            <div class="col">
                                                <textarea name="description" class="form-control" placeholder="توضیحات رویداد ...">{{ old('description', $event->description) }}</textarea>
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
                                                <input type="submit" class="btn btn-success form-control" value="ویرایش رویداد">
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
