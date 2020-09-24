<!DOCTYPE html>
<html>
<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>teamofit</title>

    <meta name="keywords" content="" />
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css">

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
    <link rel="stylesheet" href="{{ asset('css/persian-datepicker.min.css') }}"/>

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
<header id="header" class="header-narrow header-semi-transparent header-transparent-sticky-deactive custom-header-style" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 1, 'stickySetTop': '1'}">
    <div class="header-body">
        <div class="header-container container">
            <div class="header-row">
                <div class="header-column">
                    <div class="header-row">
                        <div class="header-logo">
                            <a href="/">
                                <img alt="teamofit" height="50" width="70" src="/img/logo.png">
                            </a>
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
                                            <a class="nav-link active" href="/" data-hash>
                                                صفحه اصلی
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="" data-hash data-hash-offset="62">
                                                آخرین رویداد ها
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="{{ route('login') }}" data-hash>
                                                ورود / عضویت
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <ul class="header-social-icons social-icons custom-social-icons-style-1 _white d-none d-sm-block">
                                <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fa fa-facebook-square"></i></a></li>
                                <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fa fa-twitter-square"></i></a></li>
                                <li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fa fa-linkedin-square"></i></a></li>
                            </ul>
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
									© Copyright 2020. All Rights Reserved.
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

<script src="{{ asset('js/persian-datepicker.min.js') }}"></script>
<script src="{{ asset('js/persian-date.min.js') }}"></script>

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

<!-- Theme Initialization Files -->
<script src="{{ asset('js/theme.init.js') }}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>

@include('sweet::alert')

<script src="{{ asset('datatables/datatables.bundle.js') }}"></script>
<link rel="stylesheet" href="{{ asset('datatables/datatables.bundle.rtl.css') }}"/>

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