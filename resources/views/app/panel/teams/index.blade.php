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
                                        <h5 style="direction: rtl; text-align: right!important;" class="card-header text-right">لیست تیم ها<a href="{{ route('team.create') }}"><button class="btn btn-success mr-3">ایجاد تیم</button></a></h5>

                                        <div class="card-body">
                                            <table style="width: 100%; text-align: center" id="table_id" class="table table-striped table-bordered table-hover table-checkable display nowrap">
                                                <thead>
                                                <tr>
                                                    <th>نام</th>
                                                    <th>آواتار</th>
                                                    <th>بنر</th>
                                                    <th>سرپرست</th>
                                                    <th>کیف پول</th>
                                                    <th>تاریخ ایجاد</th>
                                                    <th>تغییرات</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($teams as $team)
                                                    <tr style="vertical-align: middle">
                                                        <td>{{ $team->name }}</td>
                                                        <td><a target="_blank" href="{{ $team->avatar }}"><img style="max-width: 100px" src="{{ $team->avatar }}" alt=""></a></td>
                                                        <td><a target="_blank" href="{{ $team->banner }}"><img style="max-width: 100px" src="{{ $team->banner }}" alt=""></a></td>
                                                        <td>{{ $team->user->fName . ' ' . $team->user->lName }}</td>
                                                        <td>اطلاعات مالی</td>
                                                        <td style="direction: ltr">{{ jdate($team->created_at) }}</td>
                                                        <td>
                                                            <a href="{{ route('team.edit', $team->id) }}">ویرایش</a>
                                                            |
                                                            <a href="{{ route('team.delete', $team->id) }}">حذف</a>
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