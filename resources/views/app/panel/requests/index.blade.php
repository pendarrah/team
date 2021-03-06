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

                                    <div class="col-md-12 mt-3">
                                        <div class="dashboard-box">
                                            <div class="dashboard-box-header">
                                                <div> درخواست های دردست بررسی </div>
                                            </div>
                                            <div class="scroll-box">
                                                @if (\Auth::user()->type == 'supervisor' OR \Auth::user()->type == 'admin')
                                                    <ul>
                                                        @forelse (\DB::table('event_user')->where('owner_id', \Auth::user()->id)->where('status', 'pending')->get() as $request)
                                                            <li>
                                                                <div class="bg-req">
                                                                    <div class="img-req">
                                                                        <img src="{{ \App\User::where('id',$request->user_id )->first()->avatar }}" width="42" alt="">
                                                                    </div>
                                                                    <div class="title-req">
                                                                        <div class="widget-heading"> {{ \App\User::where('id',$request->user_id )->first()->fName . ' ' . \App\User::where('id',$request->user_id )->first()->lName  }}  | سن : {{ \App\User::where('id',$request->user_id )->first()->birthYear ?  jdate()->format('Y') - \App\User::where('id',$request->user_id )->first()->birthYear : ''}}</div>
                                                                        <div class="widget-subheading"> درخواست عضویت در <span style="font-size: 15px!important; color: black">رویداد</span> {{ \App\Event::where('id', $request->event_id )->first()->title }}  |   تاریخ رویداد: {{ jdate(\App\Event::where('id', $request->event_id )->first()->created_at)->format('Y/m/d') }} | زمان: {{ jdate(\App\Event::where('id', $request->event_id )->first()->created_at)->format('H:i:s') }}</div>
                                                                        <div style="direction: ltr" class="widget-subheading"><p>  تاریخ ایجاد درخواست: {{ jdate($request->created_at)->format('Y/m/d') }} | زمان: {{ jdate($request->created_at)->format('H:i:s') }}</p></div>
                                                                    </div>
                                                                    <div class="btn-req">
                                                                        <a href="{{ route('event.requestAccept', $request->id) }}" class="btn btn-success"> پذیرفتن </a>
                                                                        <a href="{{ route('event.requestReject', $request->id) }}" class="btn btn-warning"> رد کردن </a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @empty
                                                        @endforelse
                                                    </ul>


                                                    <ul>
                                                        @forelse (\DB::table('team_user')->where('owner_id', \Auth::user()->id)->where('status', 'pending')->get() as $request)
                                                            <li>
                                                                <div class="bg-req">
                                                                    <div class="img-req">
                                                                        <img src="{{ \App\User::where('id',$request->user_id )->first()->avatar }}" width="42" alt="">
                                                                    </div>
                                                                    <div class="title-req">
                                                                        <div class="widget-heading"> {{ \App\User::where('id',$request->user_id )->first()->fName . ' ' . \App\User::where('id',$request->user_id )->first()->lName  }} | سن : {{ \App\User::where('id',$request->user_id )->first()->birthYear ?  jdate()->format('Y') - \App\User::where('id',$request->user_id )->first()->birthYear : ''}}</div>
                                                                        <div class="widget-subheading"> درخواست عضویت در <span style="font-size: 15px!important; color: black">تیم</span> {{ \App\Team::where('id', $request->team_id )->first()->name }} </div>
                                                                        <div style="direction: ltr" class="widget-subheading"><p>  تاریخ ایجاد درخواست: {{ jdate($request->created_at)->format('Y/m/d') }} | زمان: {{ jdate($request->created_at)->format('H:i:s') }}</p></div>
                                                                    </div>
                                                                    <div class="btn-req">
                                                                        <a href="{{ route('team.requestAccept', $request->id) }}" class="btn btn-success"> پذیرفتن </a>
                                                                        <a href="{{ route('team.requestReject', $request->id) }}" class="btn btn-warning"> رد کردن </a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @empty
                                                        @endforelse
                                                    </ul>
                                                @endif

                                                @if (\Auth::user()->type == 'user')
                                                        <ul>
                                                            @forelse (\DB::table('event_user')->where('owner_id', \Auth::user()->id)->get() as $request)
                                                                <li>
                                                                    <div class="bg-req">
                                                                        <div class="img-req">
                                                                            <img src="{{ \App\User::where('id',$request->user_id )->first()->avatar }}" width="42" alt="">
                                                                        </div>
                                                                        <div class="title-req">
                                                                            <div class="widget-heading"> {{ \App\User::where('id',$request->user_id )->first()->fName . ' ' . \App\User::where('id',$request->user_id )->first()->lName  }} </div>
                                                                            <div class="widget-subheading"> درخواست عضویت در <span style="font-size: 15px!important;; color: black">رویداد</span> {{ \App\Event::where('id', $request->event_id )->first()->title }}  |   تاریخ رویداد: {{ jdate(\App\Event::where('id', $request->event_id )->first()->created_at)->format('Y/m/d') }} | زمان: {{ jdate(\App\Event::where('id', $request->event_id )->first()->created_at)->format('H:i:s') }}</div>
                                                                            <div style="direction: ltr" class="widget-subheading"><p>  تاریخ ایجاد درخواست: {{ jdate($request->created_at)->format('Y/m/d') }} | زمان: {{ jdate($request->created_at)->format('H:i:s') }}</p></div>
                                                                        </div>
                                                                        <div class="btn-req">
                                                                            <a href="" class="btn btn-primary"> وضعیت:
                                                                                @if ($request->status == 'pending')
                                                                                    بررسی نشده
                                                                                @endif
                                                                                @if ($request->status == 'accept')
                                                                                    تایید شده
                                                                                    @if ($request->payment == 'notPaid')
                                                                                        - (درانتظار پرداخت)
                                                                                    @endif
                                                                                    @if ($request->payment == 'paid')
                                                                                        - (پرداخت شده)
                                                                                    @endif

                                                                                @endif
                                                                                @if ($request->status == 'reject')
                                                                                    رد شده
                                                                                @endif





                                                                            </a>


                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @empty
                                                            @endforelse
                                                        </ul>

                                                        <ul>
                                                            @forelse (\DB::table('team_user')->where('owner_id', \Auth::user()->id)->get() as $request)
                                                                <li>
                                                                    <div class="bg-req">
                                                                        <div class="img-req">
                                                                            <img src="{{ \App\User::where('id',$request->user_id )->first()->avatar }}" width="42" alt="">
                                                                        </div>
                                                                        <div class="title-req">
                                                                            <div class="widget-heading"> {{ \App\User::where('id',$request->user_id )->first()->fName . ' ' . \App\User::where('id',$request->user_id )->first()->lName  }} </div>
                                                                            <div class="widget-subheading"> درخواست عضویت در <span style="font-size: 15px!important;; color: black">تیم</span> {{ \App\Team::where('id', $request->team_id )->first()->name }} </div>
                                                                            <div style="direction: ltr" class="widget-subheading"><p>  تاریخ ایجاد درخواست: {{ jdate($request->created_at)->format('Y/m/d') }} | زمان: {{ jdate($request->created_at)->format('H:i:s') }}</p></div>
                                                                        </div>
                                                                        <div class="btn-req">
                                                                            <a href="" class="btn btn-primary"> وضعیت:
                                                                                @if ($request->status == 'pending')
                                                                                    بررسی نشده
                                                                                @endif
                                                                                @if ($request->status == 'accept')
                                                                                    تایید شده
                                                                                @endif
                                                                                @if ($request->status == 'reject')
                                                                                    رد شده
                                                                                @endif


                                                                            </a>


                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @empty
                                                            @endforelse
                                                        </ul>

                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mt-3">
                                        <div class="dashboard-box">
                                            <div class="dashboard-box-header">
                                                <div> درخواست های درانتظار پرداخت </div>
                                            </div>
                                            <div class="scroll-box">


                                                    <ul>
                                                        @forelse (\DB::table('event_user')->where('user_id', \Auth::user()->id)->where('status', 'accept')->where('payment', 'notPaid')->get() as $request)
                                                            <li>
                                                                <div class="bg-req">
                                                                    <div class="img-req">
                                                                        <img src="{{ \App\User::where('id',$request->user_id )->first()->avatar }}" width="42" alt="">
                                                                    </div>
                                                                    <div class="title-req">
                                                                        <div class="widget-heading"> {{ \App\User::where('id',$request->user_id )->first()->fName . ' ' . \App\User::where('id',$request->user_id )->first()->lName  }} </div>
                                                                        <div class="widget-subheading"> درخواست عضویت در رویداد {{ \App\Event::where('id', $request->event_id )->first()->title }}  |   تاریخ رویداد: {{ jdate(\App\Event::where('id', $request->event_id )->first()->created_at)->format('Y/m/d') }} | زمان: {{ jdate(\App\Event::where('id', $request->event_id )->first()->created_at)->format('H:i:s') }}</div>
                                                                        <div style="direction: ltr" class="widget-subheading"><p>  تاریخ ایجاد درخواست: {{ jdate($request->created_at)->format('Y/m/d') }} | زمان: {{ jdate($request->created_at)->format('H:i:s') }}</p></div>
                                                                    </div>
                                                                    <div class="btn-req">
                                                                        <a href="" class="btn btn-primary"> وضعیت:
                                                                            @if ($request->status == 'pending')
                                                                                بررسی نشده
                                                                            @endif
                                                                            @if ($request->status == 'accept')
                                                                                تایید شده
                                                                                @if ($request->payment == 'notPaid')
                                                                                    - (درانتظار پرداخت)
                                                                                @endif
                                                                                @if ($request->payment == 'paid')
                                                                                    - (پرداخت شده)
                                                                                @endif

                                                                            @endif
                                                                        </a>
                                                                        @if ($request->payment == 'notPaid' && $request->status == 'accept')
                                                                            <a href="{{ route('requests.payFromWallet', $request->id) }}" class="btn btn-success"> پرداخت از کیف پول </a>
                                                                        @endif

                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @empty
                                                        @endforelse
                                                    </ul>




                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-md-12 mt-3">
                                        <div class="dashboard-box">
                                            <div class="dashboard-box-header">
                                                <div> تایید و پرداخت شده </div>
                                            </div>
                                            <div class="scroll-box">
                                                    <ul>
                                                        @forelse (\DB::table('event_user')->where('user_id', \Auth::user()->id)->where('status', 'accept')->where('payment', 'paid')->get() as $request)
                                                            <li>
                                                                <div class="bg-req">
                                                                    <div class="img-req">
                                                                        <img src="{{ \App\User::where('id',$request->user_id )->first()->avatar }}" width="42" alt="">
                                                                    </div>
                                                                    <div class="title-req">
                                                                        <div class="widget-heading"> {{ \App\User::where('id',$request->user_id )->first()->fName . ' ' . \App\User::where('id',$request->user_id )->first()->lName  }} </div>
                                                                        <div class="widget-subheading"> درخواست عضویت در رویداد {{ \App\Event::where('id', $request->event_id )->first()->title }} |   تاریخ رویداد: {{ jdate(\App\Event::where('id', $request->event_id )->first()->created_at)->format('Y/m/d') }} | زمان: {{ jdate(\App\Event::where('id', $request->event_id )->first()->created_at)->format('H:i:s') }}</div>
                                                                        <div style="direction: ltr" class="widget-subheading"><p>  تاریخ ایجاد درخواست: {{ jdate($request->created_at)->format('Y/m/d') }} | زمان: {{ jdate($request->created_at)->format('H:i:s') }}</p></div>

                                                                    </div>
                                                                    <div class="btn-req">
                                                                        <a href="" class="btn btn-primary"> وضعیت:
                                                                            @if ($request->status == 'pending')
                                                                                بررسی نشده
                                                                            @endif
                                                                            @if ($request->status == 'accept')
                                                                                تایید شده
                                                                                @if ($request->payment == 'notPaid')
                                                                                    - (درانتظار پرداخت)
                                                                                @endif
                                                                                @if ($request->payment == 'paid')
                                                                                    - (پرداخت شده)
                                                                                @endif

                                                                            @endif
                                                                            @if ($request->status == 'reject')
                                                                                رد شده
                                                                            @endif





                                                                        </a>


                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @empty
                                                        @endforelse
                                                    </ul>

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