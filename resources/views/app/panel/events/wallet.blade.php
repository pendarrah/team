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

                                    <div class="card">
                                        @if ($reqs->first())
                                            <h5 style="direction: rtl; text-align: right!important;" class="card-header text-right">کیف پول رویداد<a href="{{ route('checkout.request', ['event_id' => $reqs->first()->event_id]) }}"><button class="btn btn-success mr-3">ثبت درخواست تسویه</button></a></h5>
                                        @endif
                                        <div class="card-body">
                                            <table style="width: 100%; text-align: center" id="table_id" class="table table-striped table-bordered table-hover table-checkable display nowrap">
                                                <thead>
                                                <tr>
                                                    <th>کد</th>
                                                    <th>ورزشکار</th>
                                                    <th>وضعیت</th>
                                                    <th>روش پرداخت</th>
                                                    <th>پرداخت آفلاین</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($reqs as $req)
                                                    <tr>
                                                        <td>{{ $req->id }}</td>
                                                        <td>{{ \App\User::where('id', $req->user_id )->first()->fName . ' ' . \App\User::where('id', $req->user_id )->first()->lName }}</td>
                                                        <td>
                                                            @if ($req->payment == 'notPaid')
                                                                <button class="btn btn-warning mr-3">پرداخت نشده</button>
                                                            @endif

                                                            @if ($req->payment == 'paid')
                                                                    <button class="btn btn-success mr-3">پرداخت شده</button>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($req->method == null)
                                                                -
                                                            @endif

                                                            @if ($req->method == 'online')
                                                                آنلاین
                                                            @endif

                                                                @if ($req->method == 'offline')
                                                                    آفلاین
                                                                @endif
                                                        </td>
                                                        <td>
                                                            @if ($req->payment == 'notPaid')
                                                                <a href="{{ route('event.offlinePayment', $req->id) }}"><button class="btn btn-success mr-3">پرداخت</button></a>                                                            @endif

                                                            @if ($req->payment == 'paid')
                                                                <button class="btn btn-success mr-3">پرداخت شده</button>
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