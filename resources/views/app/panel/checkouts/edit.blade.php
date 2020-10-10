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
                                    <form method="post" enctype="multipart/form-data" action="{{ route('checkout.update', $checkout->id) }}" >
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
                                                <select class="form-control" name="status">
                                                    <option {{ $checkout->status == 'notPaid' ? 'selected' : '' }} value="notPaid">پرداخت نشده</option>
                                                    <option {{ $checkout->status == 'paid' ? 'selected' : '' }} value="paid" >پرداخت شده</option>
                                                </select>
                                            </div>

                                            <div class="col">
                                                <input type="text" class="form-control" id="trackingCode" value="{{ old('trackingCode', $checkout->trackingCode) }}" placeholder="کد رهگیری" name="trackingCode">
                                            </div>



                                        </div>

                                        <div class="form-row teamofitMarginTop teamofitTextAlignRight">
                                            <div class="col">
                                                <input type="submit" class="btn btn-success form-control" value="ویرایش ">
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
