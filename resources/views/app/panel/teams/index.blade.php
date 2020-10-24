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
                                <p style="direction: rtl; text-align: right">جهت ارسال لینک دعوت تیم، خواهشمند است شماره موبایل و اطلاعات فرد مورد نظر جهت دعوت را وارد نمایید.</p>


                                @if ($errors->any())
                                    <div style="direction: rtl!important; text-align: right" class="alert alert-danger">
                                        <ul style="direction: rtl!important; text-align: right" >
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif


                                <form method="post" action="{{ route('team.invite') }}">
                                    @csrf
                                    <div class="form-row teamofitMarginTop">
                                        <div class="col">
                                            <select class="form-control" name="team_id">
                                                <option disabled selected value >لطفا تیم را انتخاب فرمایید ...</option>
                                                @foreach (\App\Team::where('user_id', \Auth::user()->id)->get() as $team)
                                                    <option {{ old('team_id') == $team->id ? 'selected' : '' }} value="{{ $team->id }}">{{ $team->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="col">
                                            <input  type="text" class="form-control" placeholder="شماره موبایل" id="mobile" value="{{ old('mobile') }}" name="mobile">
                                        </div>
                                    </div>

                                    <div class="form-row teamofitMarginTop">
                                        <div class="col">
                                            <input  type="text" class="form-control" placeholder="نام" id="fName" value="{{ old('fName') }}" name="fName">
                                        </div>

                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="نام خانوادگی" id="lName" value="{{ old('lName') }}" name="lName">
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

                                    @if ($errors->any())
                                        <div style="direction: rtl!important; text-align: right; " class="alert alert-danger">
                                            <ul style="direction: rtl!important; text-align: right" >
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <div class="card">
                                        <h5 style="direction: rtl; text-align: right!important;" class="card-header text-right">لیست تیم ها
                                            @canany(['admin', 'supervisor'])
                                                <a href="{{ route('team.create') }}"><button class="btn btn-success mr-3">ایجاد تیم</button></a>
                                                <button type="button" class="btn btn-primary mr-3" data-toggle="modal" data-target="#exampleModal">دعوت به تیم</button>
                                            @endcanany

                                        </h5>

                                        <div class="card-body">
                                            <table style="width: 100%; text-align: center" id="table_id" class="table table-striped table-bordered table-hover table-checkable display nowrap">
                                                <thead>
                                                <tr>
                                                    <th>نام</th>
                                                    <th>بنر</th>
                                                    <th>سرپرست</th>
                                                    @canany(['admin', 'supervisor'])
                                                        <th>اعضا</th>
                                                        <th>رویداد ها</th>
                                                    @endcanany
                                                    <th>تاریخ ایجاد</th>
                                                    <th>تغییرات</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($teams as $team)
                                                    <tr style="vertical-align: middle">
                                                        <td><a target="_blank" href="{{ route('app.teams.show', $team->id) }}">{{ $team->name }}</a></td>
                                                        <td><a target="_blank" href="{{ $team->banner }}"><img style="max-width: 100px" src="{{ $team->banner }}" alt=""></a></td>
                                                        <td>{{ $team->user->fName . ' ' . $team->user->lName }}</td>
                                                        @canany(['admin', 'supervisor'])
                                                            <td><a href="{{ route('team.users', $team->id) }}"><i class="fa fa-list"></i></a></td>
                                                            <td><a href="{{ route('team.events', $team->id) }}"><i class="fa fa-list"></i></a></td>
                                                        @endcanany
                                                        <td style="direction: ltr">{{ jdate($team->created_at) }}</td>
                                                        <td>
                                                        @canany(['admin', 'supervisor'])
                                                                <a href="{{ route('team.edit', $team->id) }}">ویرایش</a>
                                                                |
                                                                <a href="{{ route('team.delete', $team->id) }}">بستن تیم</a>
                                                        @endcanany


                                                        @can(['user'])
                                                                <a href="{{ route('team.exit', ['user_id' => \Auth::user()->id, 'team_id' => $team->id]) }}">خروج از تیم</a>
                                                        @endcan
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