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
                                        <h5 style="direction: rtl; text-align: right!important;" class="card-header text-right">لیست رویداد های من</h5>
                                        <div class="card-body">
                                            <table style="width: 100%; text-align: center" id="table_id" class="table table-striped table-bordered table-hover table-checkable display nowrap">
                                                <thead>
                                                <tr>
                                                    <th>عنوان</th>
                                                    <th>نوع</th>
                                                    <th>قیمت (ریال)</th>
                                                    <th>ظرفیت</th>
                                                    <th>عضو</th>
                                                    <th>باقیمانده</th>
                                                    <th>وضعیت درخواست</th>
                                                    <th>مالی</th>
                                                    <th>شروع</th>
                                                    <th>پایان</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($requests as $request)
                                                    @php
                                                        $event = \App\Event::where('id',$request->event_id )->first();
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $event->title  }}</td>
                                                        <td>{{ $event->category->title }}</td>
                                                        <td>{{ number_format($event->price) }}</td>
                                                        <td>{{ $event->membersCount }}</td>
                                                        <td>{{  \DB::table('event_user')->where('event_id', $event->id)->where('status', 'accept')->where('payment', 'paid')->count() }}</td>
                                                        <td>{{ $event->membersCount - \DB::table('event_user')->where('event_id', $event->id)->where('status', 'accept')->count() }}</td>
                                                        <td>
                                                            @if ($request->status == 'accept')
                                                                تایید شده
                                                            @endif
                                                            @if ($request->status == 'reject')
                                                                رد شده
                                                            @endif
                                                            @if ($request->status == 'pending')
                                                                بررسی نشده
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($request->payment == 'paid')
                                                                پرداخت شده
                                                            @endif
                                                            @if ($request->payment == 'notPaid')
                                                                پرداخت نشده
                                                            @endif
                                                        </td>
                                                        <td style="direction: ltr">{{ jdate($event->timeStart) }}</td>
                                                        <td style="direction: ltr">{{ jdate($event->timeFinish) }}</td>

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