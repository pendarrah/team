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
                                    <p class="alert alert-warning teamofitTextAlignRight">
                                        توضیحات در ارتباط با درج کیف پولتوضیحات در ارتباط با درج کیف پولتوضیحات در ارتباط با درج کیف پولتوضیحات در ارتباط با درج کیف پولتوضیحات در ارتباط با درج کیف پولتوضیحات در ارتباط با درج کیف پولتوضیحات در ارتباط با درج کیف پولتوضیحات در ارتباط با درج کیف پولتوضیحات در ارتباط با درج کیف پولتوضیحات در ارتباط با درج کیف پول
                                    </p>

                                    <div class="card">
                                        <h5 style="direction: rtl; text-align: right!important;" class="card-header text-right">لیست تراکنش ها

                                            <button class="btn btn-dark mr-3">موجودی: {{ number_format(\Auth::user()->amount) }} ریال</button>
                                            <button type="button" class="btn btn-success mr-3" data-toggle="modal" data-target="#exampleModal">شارژ کیف پول</button>

                                        </h5>



                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">شارژ کیف پول تیم و فیت</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>


                                                    <div class="modal-body">
                                                        <p style="direction: rtl; text-align: right">جهت واریز وجه و شارژ کیف پول، مقدار وجه مورد نظر خودرا وارد کرده و برروی گزینه پرداخت کلیک نمایید.</p>

                                                        <form method="post" action="{{ route('payment') }}">
                                                            @csrf
                                                            <div class="form-row teamofitMarginTop">
                                                                <div style=" direction: rtl; text-align: right;" class="col">
                                                                    <label style="color: black; display: inline" for="">مبلغ مورد نظر را به ریال وارد نمایید:</label>
                                                                    <input style="width: 150px;display: inline" type="text" class="form-control" id="name" value="{{ old('amount') }}" placeholder="مثال: 1500000" name="amount">
                                                                </div>
                                                            </div>

                                                        </div>


                                                            <div class="modal-footer">
                                                                <p style="text-align: right; display: inline; float: right"><button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button></p>
                                                                <button type="submit" class="btn btn-success">پرداخت</button>
                                                            </div>

                                                    </form>

                                                </div>
                                            </div>
                                        </div>



                                        <div class="card-body">
                                            <table style="width: 100%; text-align: center" id="table_id" class="table table-striped table-bordered table-hover table-checkable display nowrap">
                                                <thead>
                                                <tr>
                                                    <th>شناسه</th>
                                                    <th>نوع</th>
                                                    <th>بابت</th>
                                                    <th>مبلغ</th>
                                                    <th>توضیحات</th>
                                                    <th>تاریخ و ساعت</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($transactions as $transaction)
                                                    <tr>
                                                        <td>{{ $transaction->id }}</td>
                                                        <td>{{ $transaction->type }}</td>
                                                        <td>{{ $transaction->for }}</td>
                                                        <td>{{ number_format($transaction->amount) }}</td>
                                                        <td>{{ $transaction->description }}</td>
                                                        <td>{{ jdate($transaction->created_at) }}</td>
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
                    "order": [[ 0, "desc" ]],

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