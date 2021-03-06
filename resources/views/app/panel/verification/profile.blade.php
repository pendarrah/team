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

                                    <div class="card">
                                        <h5 style="direction: rtl; text-align: right!important;" class="card-header text-right">تکمیل پروفایل</h5>

                                        <div class="card-body">


                                                <form method="post" enctype="multipart/form-data" action="{{ route('panel.verification.profile.store') }}" >
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
                                                            <input type="text" class="form-control" id="title" value="{{ old('fName', \Auth::user()->fName) }}" placeholder="نام" name="fName">
                                                        </div>

                                                        <div class="col">
                                                            <input type="text" class="form-control" id="title" value="{{ old('lName', \Auth::user()->lName) }}" placeholder="نام خانوادگی" name="lName">
                                                        </div>
                                                    </div>




                                                    <div class="form-row teamofitMarginTop teamofitTextAlignRight">


                                                        <div class="col">
                                                            <span style="direction: rtl; text-align: right"> تاریخ تولد:</span>

                                                            <input  class="form-control dp" >
                                                            <input type="hidden"  placeholder="تاریخ تولد" name="birthday" class="observer" >
                                                        </div>


                                                    </div>



                                            <div class="form-row teamofitMarginTop teamofitTextAlignRight">
                                                <div class="col">
                                                    <input type="submit" class="btn btn-success form-control" value="آپلود اطلاعات">
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
        </div>

    </div>

@stop

@section('footerScripts')
    <script>
        var DatatablesExtensionButtons = {
            init: function () {




                // start data table m_table_2
                var t;
                t = $("#table_id").DataTable({

                        scrollY:"",scrollX:!0,scrollCollapse:!0,
                        responsive: !0,

                        buttons: ["print", "copyHtml5", "excelHtml5", "csvHtml5", "pdfHtml5"],
                    }
                ),
                    $("#export_print").on("click", function (e) {
                            e.preventDefault(), t.button(0).trigger()
                        }
                    ),
                    $("#export_copy").on("click", function (e) {
                            e.preventDefault(), t.button(1).trigger()
                        }
                    ),
                    $("#export_excel").on("click", function (e) {
                            e.preventDefault(), t.button(2).trigger()
                        }
                    ),
                    $("#export_csv").on("click", function (e) {
                            e.preventDefault(), t.button(3).trigger()
                        }
                    ),
                    $("#export_pdf").on("click", function (e) {
                            e.preventDefault(), t.button(4).trigger()
                        }
                    )
                // end data table m_table_2






            }
        };


        jQuery(document).ready(function () {
                DatatablesExtensionButtons.init()
            }
        );


    </script>


@stop