@extends('app.master')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col">


                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">دعوت عضو به تیم</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>


                            <div class="modal-body">
                                <p style="direction: rtl; text-align: right">جهت ارسال لینک دعوت تیم، خواهشمند است شماره موبایل های مورد نظر جهت دعوت را وارد نمایید. درصورت نیاز به ارسال پیامک به افراد مختلف، شماره هارا با کاما جدا نمایید.</p>

                                <form method="post" action="">
                                    @csrf
                                    <div class="form-row teamofitMarginTop">
                                        <div style=" direction: rtl; text-align: right;" class="col">
                                            <label style="color: black; display: inline" for="">شماره های موبایل:</label>
                                            <input style="width: 350px;display: inline; direction: ltr; text-align: left    " type="text" class="form-control" id="phone" value="{{ old('phone') }}" placeholder="Ex: 09127259562,09201010328" name="phone">
                                        </div>
                                    </div>

                            </div>


                            <div class="modal-footer">
                                <p style="text-align: right; display: inline; float: right"><button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button></p>
                                <button type="submit" class="btn btn-primary">ارسال پیام دعوت</button>
                            </div>

                            </form>

                        </div>
                    </div>
                </div>



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
                                        <h5 style="direction: rtl; text-align: right!important;" class="card-header text-right">لیست تیم ها
                                            <a href="{{ route('team.create') }}"><button class="btn btn-success mr-3">ایجاد تیم</button></a>
                                            <button type="button" class="btn btn-primary mr-3" data-toggle="modal" data-target="#exampleModal">دعوت به تیم</button>

                                        </h5>

                                        <div class="card-body">
                                            <table style="width: 100%; text-align: center" id="table_id" class="table table-striped table-bordered table-hover table-checkable display nowrap">
                                                <thead>
                                                <tr>
                                                    <th>نام</th>
                                                    <th>آواتار</th>
                                                    <th>بنر</th>
                                                    <th>سرپرست</th>
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