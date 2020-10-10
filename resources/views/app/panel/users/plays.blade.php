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
                                        <h5 style="direction: rtl; text-align: right!important;" class="card-header text-right">لیست  بازی ها/درخواست ها</h5>

                                        <div class="card-body">
                                            <table style="width: 100%; text-align: center" id="table_id" class="table table-striped table-bordered table-hover table-checkable display nowrap">
                                                <thead>
                                                <tr>
                                                    <th>شناسه درخواست</th>
                                                    <th>رویداد</th>
                                                    <th>سرپرست</th>
                                                    <th>وضعیت</th>
                                                    <th>پرداخت</th>
                                                    <th>روش</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($requests as $request)
                                                    <tr>
                                                        <td>{{ $request->id }}</td>
                                                        <td>{{ \App\Event::where('id', $request->event_id)->first()->title }}</td>
                                                        <td>{{ \App\Event::where('id', $request->event_id)->first()->user->fName . ' ' .  \App\Event::where('id', $request->event_id)->first()->user->lName }}</td>
                                                        <td>
                                                            @if ($request->status == 'pending')
                                                                بررسی نشده
                                                             @elseif($request->status == 'reject')
                                                                رد شده
                                                            @elseif($request->status == 'accept')
                                                                تایید شده
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($request->payment == 'notPaid')
                                                                پرداخت نشده
                                                            @elseif($request->payment == 'paid')
                                                                پرداخت شده
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($request->method == 'online')
                                                                آنلاین
                                                            @elseif($request->method == 'offline')
                                                                آفلاین
                                                            @endif
                                                        </td>
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