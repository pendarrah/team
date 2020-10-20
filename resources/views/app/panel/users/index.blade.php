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
                                        <h5 style="direction: rtl; text-align: right!important;" class="card-header text-right">لیست  کاربران</h5>

                                        <div class="card-body">
                                            <table style="width: 100%; text-align: center" id="table_id" class="table table-striped table-bordered table-hover table-checkable display nowrap">
                                                <thead>
                                                <tr>
                                                    <th>نام</th>
                                                    <th>نام خانوادگی</th>
                                                    <th>نوع</th>
                                                    <th>موبایل</th>
                                                    <th>وضعیت</th>
                                                    <th>موجودی</th>
                                                    <th>شهر</th>
                                                    <th>بازی ها</th>
                                                    <th>تراکنش ها</th>
                                                    <th>ویرایش</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($users as $user)
                                                    <tr>
                                                        <td>{{ $user->fName }}</td>
                                                        <td>{{ $user->lName }}</td>
                                                        <td>
                                                            @if ($user->type == 'admin')
                                                                مدیر
                                                             @elseif($user->type == 'coach')
                                                                مربی
                                                            @elseif($user->type == 'user')
                                                                ورزشکار
                                                            @endif
                                                        </td>
                                                        <td>{{ $user->mobile }}</td>
                                                        <td>
                                                            @if ($user->status == 1)
                                                                تایید نشده
                                                            @elseif($user->status == 2)
                                                                تایید شده
                                                            @elseif($user->status == 13)
                                                                مسدود
                                                            @endif
                                                        </td>
                                                        <td>{{ number_format($user->amount) }}</td>
                                                        <td>{{ $user->city ? $user->city->name : '' }}</td>
                                                        <td><a href="{{ route('users.plays', $user->id) }}"><i class="fa fa-list"></i></a></td>
                                                        <td><a href="{{ route('users.transactions', $user->id) }}"><i class="fa fa-list"></i></a></td>
                                                        <td style=""><a href="{{ route('users.edit', $user->id) }}">ویرایش</a></td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
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