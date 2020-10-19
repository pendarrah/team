<!DOCTYPE html>
<html>
<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    {!! SEO::generate() !!}

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css">

    <!-- Filtering Css
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">-->
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset("vendor/bootstrap/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("vendor/font-awesome/css/font-awesome.min.css") }}">
    <link rel="stylesheet" href="{{ asset('vendor/animate/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/simple-line-icons/css/simple-line-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/owl.carousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/owl.carousel/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/magnific-popup/magnific-popup.min.css') }}">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('css/rtl-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/rtl-theme-elements.css') }}">
    <link rel="stylesheet" href="{{ asset('css/rtl-theme-blog.css') }}">
    <link rel="stylesheet" href="{{ asset('css/rtl-theme-shop.css') }}">

    <!-- Current Page CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/rs-plugin/css/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/rs-plugin/css/layers.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/rs-plugin/css/navigation.css') }}">

    <!-- Demo CSS -->
    <link rel="stylesheet" href="{{ asset('css/demos/rtl-demo-app-landing.css') }}">



    <!-- Skin CSS -->
    <link rel="stylesheet" href="{{ asset('css/skins/skin-app-landing.css') }}">

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <!-- Head Libs -->
    <script src="{{ asset('vendor/modernizr/modernizr.min.js') }}"></script>
    <link rel="stylesheet" href="https://unpkg.com/persian-datepicker@1.2.0/dist/css/persian-datepicker.min.css"/>

    <style>
        .form-control{
            border: #d4cdcd solid 0.5px!important;
        }
        .menu-active{
            color: #f4645a!important;
        }
        td{
            vertical-align: middle!important;
        }
    </style>


</head>
<body>

<body data-spy="scroll" data-target=".header-nav-main nav" data-offset="65">
<header id="header" class="header-narrow header-semi-transparent header-transparent-sticky-deactive custom-header-style @if(Route::current()->getName() == 'app.index') headerindex @endif" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 1, 'stickySetTop': '1'}">
    <div class="header-body background-color-dark">
        <div class="header-container container">
            <div class="header-row">
                <div class="header-column">
                    <div class="header-row">
                        <div class="header-btn-lg pr-0" >
                            <div class="widget-content p-0">
                                @auth
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="btn-group">
                                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                                    <img class="rounded-circle" src="https://d11a6trkgmumsb.cloudfront.net/original/3X/d/8/d8b5d0a738295345ebd8934b859fa1fca1c8c6ad.jpeg" alt="" width="42">
                                                    <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                                </a>
                                                <div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right" style="">
                                                    <div class="dropdown-menu-header">
                                                        <div class="dropdown-menu-header-inner bg-info">
                                                            <div class="menu-header-image opacity-2" style="background-image: url('/img/city3.jpg');"></div>

                                                            <div class="menu-header-content text-left">
                                                                <div class="widget-content p-0">
                                                                    <div class="widget-content-wrapper">
                                                                        <div class="widget-content-left mr-3">
                                                                            <img class="rounded-circle" src="https://d11a6trkgmumsb.cloudfront.net/original/3X/d/8/d8b5d0a738295345ebd8934b859fa1fca1c8c6ad.jpeg" alt="" width="42">
                                                                        </div>
                                                                        <div class="widget-content-left">
                                                                            <div class="widget-heading text-white">{{ \Auth::user()->fName . ' ' .  \Auth::user()->lName }}</div>
                                                                            <div class="widget-subheading opacity-8">
                                                                                @if (\Auth::user()->type === 'admin')
                                                                                    مدیر
                                                                                @elseif(\Auth::user()->type === 'superviser')
                                                                                @else
                                                                                    بازیکن
                                                                                @endif
                                                                                تیموفیت
                                                                            </div>
                                                                        </div>
                                                                        <div class="widget-content-right mr-2">
                                                                            <a href="{{ route('dashboard-logout') }}"><button class="btn-pill btn-shadow btn-shine btn btn-focus">خروج</button></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <ul class="nav flex-column">
                                                        <li class="nav-item-divider mb-0 nav-item" style="margin:0px;"></li>
                                                    </ul>
                                                    <div class="grid-menu grid-menu-2col">
                                                        <div class="no-gutters row">
                                                            <div class="col-sm-6">
                                                                <a href="{{ route('panel.profile') }}">
                                                                    <button class="btn-icon-vertical btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-warning">
                                                                        <i class="pe-7s-chat icon-gradient bg-amy-crisp btn-icon-wrapper mb-2"></i> تعویض اکانت
                                                                    </button>
                                                                </a>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <a href="{{ route('panel.profile') }}">
                                                                    <button class="btn-icon-vertical btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-danger">
                                                                        <i class="pe-7s-ticket icon-gradient bg-love-kiss btn-icon-wrapper mb-2"></i>
                                                                        <b>ویرایش حساب کاربری</b>
                                                                    </button>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-content-left  ml-3 header-user-info hide-on-mobile" style="direction:rtl; text-align:right; border-right: 1px solid #fff; padding-right:12px;">
                                            <div class="widget-heading text-white"> {{ \Auth::user()->fName . ' ' .  \Auth::user()->lName }} </div>
                                            <div class="widget-subheading">
                                                @if (\Auth::user()->type === 'admin')
                                                    مدیر
                                                @elseif(\Auth::user()->type === 'superviser')
                                                @else
                                                    بازیکن
                                                @endif
                                                تیموفیت
                                            </div>
                                        </div>
                                        <div class="widget-content-right header-user-info ml-3">
                                            <button type="button" class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
                                                <i class="fa text-white fa-calendar pr-1 pl-1"></i>
                                            </button>
                                            <button type="button" class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
                                                <i class="fa text-white fa-bell pr-1 pl-1"></i>
                                            </button>
                                            <button type="button" class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
                                                <i class="fa text-white fa-credit-card pr-1 pl-1"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @endauth
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-column justify-content-end">
                    <div class="header-row">
                        <div class="header-nav">
                            <div class="header-nav-main header-nav-main-square custom-header-nav-main-effect-1">
                                <nav class="collapse">
                                <ul class="nav nav-pills" id="mainNav">
                                        <li>
                                            <a class="nav-link" href="{{ Route('app.index') }}">
                                                <i class="fa fa-home"></i>
                                            </a>
                                        </li>

                                    <li id="login-box-menu">
                                        <a class="nav-link" href="/login">
                                            @guest()
                                                ورود / عضویت
                                            @endguest()

                                            @auth()
                                              مشاهده پنل کاربری
                                            @endauth()
                                        </a>
                                    </li>

                                        <li>
                                            <a class="nav-link" href="{{ Route('app.events.index') }}">
                                               رخدادهای ورزشی
                                            </a>
                                        </li>

                                    <li>
                                        <a class="nav-link" href="{{ Route('app.teams.index') }}">
                                            لیست تیم ها
                                        </a>
                                    </li>

                                    </ul>
                                </nav>
                                <div class="header-logo hide-on-mobile">
                                    <a href="{{ Route('app.index') }}">
                                        <img alt="teamofit"  width="50" src="/img/logo.png">
                                    </a>
                                </div>
                            </div>
                            <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
                                <i class="fa fa-bars"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="modal fade" id="registerModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">ورود</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="loginModalTeamofit">
                <div class="modal-body teamofitTextAlignRight">
                    
                    <form class="form-horizontal" action="#">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">موبایل :</label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control" id="email" placeholder="لطفا شماره موبایل خود را وارد کنید ..." name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="pwd">کلمه عبور :</label>
                            <div class="col-sm-12">
                                <input type="password" class="form-control" id="pwd" placeholder="لطفا کلمه عبور خود را وارد کنید ..." name="pwd">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-12">
                                <div class="checkbox">
                                    <label><input type="checkbox" name="remember"> مرا به خاطر بسپار</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-12">
                                <button type="submit" class="btn btn-success">ورود</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer teamofitTextAlignRight">
                    <a id="registerBtn" class="btn col-md-12">ثبت نام </a>
                </div>
            </div>
            <div class="registerModalTeamofit">
                <div class="modal-body teamofitTextAlignRight">
                    
                    <form class="form-horizontal" action="#">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">موبایل :</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="email" placeholder="لطفا شماره موبایل خود را وارد کنید ..." name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="pwd">کلمه عبور :</label>
                            <div class="col-sm-12">
                                <input type="password" class="form-control" id="pwd" placeholder="لطفا کلمه عبور خود را وارد کنید ..." name="pwd">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="pwd">تکرار کلمه عبور :</label>
                            <div class="col-sm-12">
                                <input type="password" class="form-control" id="pwd" placeholder="لطفا کلمه عبور خود را وارد کنید ..." name="pwd">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-12">
                                <button type="submit" class="btn btn-success">ثبت نام</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer teamofitTextAlignRight">
                    <a id="loginBtn" class="btn col-md-12" >ورود به ناحیه کاربری</a>
                </div>
            </div>
        </div>

    </div>
</div>
<div role="main" class="main">


    @yield('content')

    <footer id="footer" class="background-color-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <h4 class="text-color-dark mb-0">عضویت در <strong>خبرنامه</strong></h4>
                    <p class="text-color-dark custom-font-secondary text-2 mb-0 mb-lg-4"> اخبار و به روزرسانی ها مطلع شوید.</p>
                </div>
                <div class="col-lg-6">
                    <div class="newsletter custom-newsletter-style-1">
                        <div class="alert alert-success d-none" id="newsletterSuccess">
                            <strong>Success!</strong> You've been added to our email list.
                        </div>

                        <div class="alert alert-danger d-none" id="newsletterError"></div>

                        <form id="newsletterForm" action="php/newsletter-subscribe.php" method="POST" novalidate="novalidate">
                            <div class="input-group">
                                <input class="form-control form-control-sm" placeholder="ایمیل آدرس" name="newsletterEmail" id="newsletterEmail" type="text">
                                <span class="input-group-btn">
											<button class="btn custom-btn-style-1 _size-1 text-color-light" type="submit">عضویت</button>
										</span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright background-color-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 text-center text-md-left">
								<span class="copyright-text">
									© تمامی حقوق محفوظ است.
									<ul class="social-icons custom-social-icons-style-1 _colored">
										<li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fa fa-facebook-square"></i></a></li>
										<li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fa fa-twitter-square"></i></a></li>
		 								<li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fa fa-linkedin-square"></i></a></li>
	 								</ul>
								</span>
                    </div>
                    <div class="col-lg-6">
                        <nav>
                            <ul class="nav nav-pills" id="footerNav">
                                <li class="nav-item">
                                    <a class="nav-link text-color-dark" href="#overview" data-hash>
                                        درباره تیموفیت
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-color-dark" href="#" target="_blank" title="Go to Community">
                                        قوانین
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-color-dark" href="mailto:you@domain.com" title="Contact Us">
                                        تماس با ما
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<!-- Vendor -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/jquery.appear/jquery.appear.min.js') }}"></script>
<script src="{{ asset('vendor/jquery.easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-cookie/jquery-cookie.min.js') }}"></script>
<script src="{{ asset('vendor/popper/umd/popper.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/common/common.min.js') }}"></script>
<script src="{{ asset('vendor/jquery.validation/jquery.validation.min.js') }}"></script>
<script src="{{ asset('vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js') }}"></script>
<script src="{{ asset('vendor/jquery.gmap/jquery.gmap.min.js') }}"></script>
<script src="{{ asset('vendor/jquery.lazyload/jquery.lazyload.min.js') }}"></script>
<script src="{{ asset('vendor/isotope/jquery.isotope.min.js') }}"></script>
<script src="{{ asset('vendor/owl.carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('vendor/vide/vide.min.js') }}"></script>

<script src="https://unpkg.com/persian-date@1.1.0/dist/persian-date.min.js"></script>
<script src="https://unpkg.com/persian-datepicker@1.2.0/dist/js/persian-datepicker.min.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="{{ asset('js/theme.js') }}"></script>

<!-- Current Page Vendor and Views -->
<script src="{{ asset('vendor/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('vendor/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>

<!-- Current Page Vendor and Views -->
<script src="{{ asset('js/views/view.contact.js') }}"></script>

<!-- Demo -->
<script src="{{ asset('js/demos/demo-app-landing.js') }}"></script>

<!-- Theme Custom -->
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/jquery.mixitup.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

<!-- Theme Initialization Files -->
<script src="{{ asset('js/theme.init.js') }}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>

@include('sweet::alert')

<script src="{{ asset('datatables/datatables.bundle.js') }}"></script>
<link rel="stylesheet" href="{{ asset('datatables/datatables.bundle.rtl.css') }}"/>
<!---start GOFTINO code--->
<script type="text/javascript">
    !function(){var a=window,d=document;function g(){var g=d.createElement("script"),s="https://www.goftino.com/widget/Hqa6DI",l=localStorage.getItem("goftino");g.type="text/javascript",g.async=!0,g.src=l?s+"?o="+l:s;d.getElementsByTagName("head")[0].appendChild(g);}"complete"===d.readyState?g():a.attachEvent?a.attachEvent("onload",g):a.addEventListener("load",g,!1);}();
</script>
<!---end GOFTINO code--->
@yield('footerScripts')

<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-12345678-1', 'auto');
    ga('send', 'pageview');
</script>
 -->


</body>
</html>