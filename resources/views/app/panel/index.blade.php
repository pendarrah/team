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
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="navbar-panel">
                                                <div class="navbar-panel-left">
                                                        <a href="#" data-toggle="tooltip" data-placement="top" title="اطلاعیه ها">
                                                            <div class="notif-icon">
                                                                    <i class="fa fa-envelope"></i>
                                                            </div>
                                                        </a>
                                                        <a href="#" data-toggle="tooltip" data-placement="top" title="رویدادها">
                                                            <div class="notif-icon">
                                                                <i class="fa fa-bell"></i>
                                                            </div>
                                                        </a>
                                                        <a href="#" data-toggle="tooltip" data-placement="top" title="درخواست ها">
                                                            <div class="notif-icon">
                                                                <i class="fa fa-users"></i>
                                                            </div>
                                                        </a>
                                                </div>
                                                <div class="navbar-panel-right" style="margin-right: auto;">
                                                        <a href="#" data-toggle="tooltip" data-placement="top" title="پروفایل">
                                                            <div class="notif-icon">
                                                                <i class="fa fa-sign-out"></i>
                                                            </div>
                                                        </a>
                                                        <a href="#" data-toggle="tooltip" data-placement="top" title="تنظیمات">
                                                            <div class="notif-icon">
                                                                <i class="fa fa-cog"></i>
                                                            </div>
                                                        </a>
                                                        <a href="#" data-toggle="tooltip" data-placement="top" title="خروج">
                                                            <div class="notif-icon">
                                                                <i class="fa fa-user"></i>
                                                            </div>
                                                        </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   <div class="row">

                                        <div class="col-md-6">
                                            <div class="dashboard-box">
                                                <div class="dashboard-box-header">
                                                    <div> درخواست ها </div>
                                                    <div class="dashboard-box-btn">
                                                        <a class="dashboard-btn"> مشاهده کامل </a>
                                                    </div>
                                                </div>
                                                <div class="scroll-box">
                                                    <ul>
                                                        @forelse (\DB::table('event_user')->where('owner_id', \Auth::user()->id)->where('status', 'pending')->get() as $request)
                                                            <li>
                                                                <div class="bg-req">
                                                                    <div class="img-req">
                                                                        <img src="{{ \App\User::where('id',$request->user_id )->first()->avatar }}" width="42" alt="">
                                                                    </div>
                                                                    <div class="title-req">
                                                                        <div class="widget-heading"> {{ \App\User::where('id',$request->user_id )->first()->fName . ' ' . \App\User::where('id',$request->user_id )->first()->lName  }} </div>
                                                                        <div class="widget-subheading"> درخواست عضویت در رویداد {{ \App\Event::where('id', $request->event_id )->first()->title }} </div>
                                                                    </div>
                                                                    <div class="btn-req">
                                                                        <a href="{{ route('event.requestAccept', $request->id) }}" class="btn btn-success"> پذیرفتن </a>
                                                                        <a href="{{ route('event.requestReject', $request->id) }}" class="btn btn-warning"> رد کردن </a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            @empty
                                                            <p style="margin: auto; margin-top: 10px">بدون درخواست</p>
                                                        @endforelse
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                       <div class="col-md-6">
                                           <div class="dashboard-box">
                                               <div class="dashboard-box-header">
                                                   <div>اطلاعیه ها</div>
                                                   <div class="dashboard-box-btn">
                                                       <a class="dashboard-btn"> مشاهده کامل </a>
                                                   </div>
                                               </div>
                                               <div class="scroll-box">
                                                   <ul>
                                                       <li>
                                                           <div class="indicator"></div>
                                                           <div class="widget-heading"> مدیریت سایت : </div>
                                                           <div class="widget-subheading"> لطفا به هنگام پرداخت دقت لازم را انجام دهید . </div>
                                                       </li>
                                                       <li>
                                                           <div class="indicator"></div>
                                                           <div class="widget-heading"> مدیریت سایت : </div>
                                                           <div class="widget-subheading"> لطفا به هنگام پرداخت دقت لازم را انجام دهید . </div>
                                                       </li>
                                                       <li>
                                                           <div class="indicator"></div>
                                                           <div class="widget-heading"> مدیریت سایت : </div>
                                                           <div class="widget-subheading"> لطفا به هنگام پرداخت دقت لازم را انجام دهید . </div>
                                                       </li>
                                                       <li>
                                                           <div class="indicator"></div>
                                                           <div class="widget-heading"> مدیریت سایت : </div>
                                                           <div class="widget-subheading"> لطفا به هنگام پرداخت دقت لازم را انجام دهید . </div>
                                                       </li>
                                                       <li>
                                                           <div class="indicator"></div>
                                                           <div class="widget-heading"> مدیریت سایت : </div>
                                                           <div class="widget-subheading"> لطفا به هنگام پرداخت دقت لازم را انجام دهید . </div>
                                                       </li>
                                                       <li>
                                                           <div class="indicator"></div>
                                                           <div class="widget-heading"> مدیریت سایت : </div>
                                                           <div class="widget-subheading"> لطفا به هنگام پرداخت دقت لازم را انجام دهید . </div>
                                                       </li>
                                                   </ul>
                                               </div>
                                           </div>
                                       </div>

                                        <div class="col-md-12" style="margin-top: 50px;">
                                            <div class="dashboard-box">
                                                <div class="dashboard-box-header">
                                                    <div> نزدیک ترین رویدادها </div>
                                                    <div class="dashboard-box-btn">
                                                        <a class="dashboard-btn"> مشاهده کامل </a>
                                                    </div>
                                                </div>
                                                <div class="scroll-box">
                                                    <ul>
                                                        <li> 
                                                            <div class="indicator indicator-events"></div>
                                                            <div class="widget-heading">  </div>
                                                            <div class="widget-subheading"> لطفا به هنگام پرداخت دقت لازم را انجام دهید . </div>
                                                        </li>
                                                        <li> 
                                                            <div class="indicator indicator-events"></div>
                                                            <div class="widget-heading"> مدیریت سایت : </div>
                                                            <div class="widget-subheading"> لطفا به هنگام پرداخت دقت لازم را انجام دهید . </div>
                                                        </li>
                                                        <li> 
                                                            <div class="indicator indicator-events"></div>
                                                            <div class="widget-heading"> مدیریت سایت : </div>
                                                            <div class="widget-subheading"> لطفا به هنگام پرداخت دقت لازم را انجام دهید . </div>
                                                        </li>
                                                        <li> 
                                                            <div class="indicator indicator-events"></div>
                                                            <div class="widget-heading"> مدیریت سایت : </div>
                                                            <div class="widget-subheading"> لطفا به هنگام پرداخت دقت لازم را انجام دهید . </div>
                                                        </li>
                                                        <li> 
                                                            <div class="indicator indicator-events"></div>
                                                            <div class="widget-heading"> مدیریت سایت : </div>
                                                            <div class="widget-subheading"> لطفا به هنگام پرداخت دقت لازم را انجام دهید . </div>
                                                        </li>
                                                        <li> 
                                                            <div class="indicator indicator-events"></div>
                                                            <div class="widget-heading"> مدیریت سایت : </div>
                                                            <div class="widget-subheading"> لطفا به هنگام پرداخت دقت لازم را انجام دهید . </div>
                                                        </li>
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

    </div>

@stop
