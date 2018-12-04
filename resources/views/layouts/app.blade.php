<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Viethistory</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="author" content=""/>

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content=""/>
    <meta name="twitter:image" content=""/>
    <meta name="twitter:url" content=""/>
    <meta name="twitter:card" content=""/>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="/css/css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="/css/css/icomoon.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="/css/css/bootstrap.css">
    <!-- Flexslider  -->
    <link rel="stylesheet" href="/css/css/flexslider.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="/css/css/magnific-popup.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="/css/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/css/owl.theme.default.min.css">
    <!-- Theme style  -->
    <link rel="stylesheet" href="/css/css/style.css">

    <!-- Modernizr JS -->
    <script src="/js/js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="/js/js/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<div id="colorlib-page">
    <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
    <aside id="colorlib-aside" role="complementary" class="js-fullheight">
        <h1 id="colorlib-logo"><a href="/">Viethist</a></h1>
        <nav id="colorlib-main-menu" role="navigation">
            <ul>
                <li class="colorlib-active"><a href="/">Home</a></li>
                @if (Route::has('login'))
                    @auth
                        <li class="colorlib-active" href="#">{{ Auth::user()->name }}</li>
                        <a href="{{ url('/newspapers/create') }}">CREATE</a>
                        <li>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>

                        </li>
                    @else
                        <li class="colorlib-active" ><a href="{{ route('login') }}">Login</a></li>
                        <li class="colorlib-active" ><a href="{{ route('register') }}">Register</a></li>
                    @endauth
                @endif
            </ul>
        </nav>

        <div class="colorlib-footer">
            <p>
                <small>&copy;
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                    This website made by Nguyên Vũ
                </small>
            </p>
            <h6>{{date(" l. ")}} {{date("d.F.Y")}}  </h6>
            {{--<ul>--}}
            {{--<li><a href="#"><i class="icon-facebook2"></i></a></li>--}}
            {{--<li><a href="#"><i class="icon-twitter2"></i></a></li>--}}
            {{--<li><a href="#"><i class="icon-instagram"></i></a></li>--}}
            {{--<li><a href="#"><i class="icon-linkedin2"></i></a></li>--}}
            {{--</ul>--}}
        </div>

    </aside>
    @yield('content')

</div>
@yield('subcontent')
<!-- jQuery -->
<script src="/js/js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="/js/js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="/js/js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="/js/js/jquery.waypoints.min.js"></script>
<!-- Flexslider -->
<script src="/js/js/jquery.flexslider-min.js"></script>
<!-- Magnific Popup -->
<script src="/js/js/jquery.magnific-popup.min.js"></script>
<script src="/js/js/magnific-popup-options.js"></script>
<!-- Owl Carousel -->
<script src="/js/js/owl.carousel.min.js"></script>
<!-- Sticky Kit -->
<script src="/js/js/sticky-kit.min.js"></script>


<!-- MAIN JS -->
<script src="/js/js/main.js"></script>

</body>
</html>

