<!DOCTYPE html>
<html lang="zxx">

<head>
<meta charset="UTF-8">
    <meta name="description" content="Yoga Studio Template">
    <meta name="keywords" content="Yoga, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Dynamic meta data -->
    <meta name="title" content="@yield('meta_title')">
    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="blog, food, recipes">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="@yield('meta_title')" />
    <meta property="og:description" content="@yield('meta_description')" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="@yield('meta_image')" />
    <meta property="og:site_name" content="{{ config('app.name') }}" />

    <title>{{ config('app.name') }}</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap" rel="stylesheet">

    <link rel="icon" href="{{ config('app.logo') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ config('app.logo') }}" type="image/x-icon">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('blog/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('blog/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('blog/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('blog/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('blog/css/style.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">

    <!-- toastr css link -->
    <link href="{{ asset('user/css/toastr.min.css') }}" rel="stylesheet"/>
    <!-- end toastr css link -->

    <style>
    .toast-message{
        color:white !important;
        font-weight: bold;
    }

    .toast-success{
        background-color:#51A351
    }

    .toast-error{
        background-color:#BD362F
    }

    .toast-info{
        background-color:#2F96B4
    }

    .toast-warning{
        background-color:#F89406
    }
    </style>


</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
    <div class="container-fluid">
            <div class="nav-menu">
                <nav class="main-menu mobile-menu">
                    <ul>
                        <li class="logo">
                        <a href="{{ route('index') }}"><img src="{{ config('app.logo') }}" alt=""></a></li>
                        <li class="{{Request::routeIs('index')? 'active':''}}"><a href="{{ route('index') }}">Home</a></li>
                        <li class="{{Request::routeIs('blog_page')? 'active':''}}"><a href="{{ route('blog_page') }}">Blogs</a></li>
                        <li class="{{Request::routeIs('about_page')? 'active':''}}"><a href="{{ route('about_page') }}">About Me</a></li>
                        <!-- <li><a href="categories.html">Categories</a></li> -->
                        <li class="{{Request::routeIs('contact_page')? 'active':''}}"><a href="{{ route('contact_page') }}">Contact</a></li>
                        @if(!Auth::user())
                        <li class="{{Request::routeIs('register')? 'active':''}}"><a href="{{ route('register') }}">Signup</a></li>
                        @else
                            @if($authUser->role==='admin')
                                <li class="{{Request::routeIs('admin_dashboard')? 'active':''}}"><a href="{{ route('admin_dashboard') }}">Profile</a></li>
                            @elseif($authUser->role==='user')
                                <li class="{{Request::routeIs('user_dashboard')? 'active':''}}"><a href="{{ route('user_dashboard') }}">Profile</a></li>
                            @endif
                        @endif
                    </ul>
                    <div class="nav-right search-switch"><i class="fa fa-search"></i></div>
                </nav>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Page Top Recipe Section Begin -->
        @yield('page-top-recipe')
    <!-- Page Top Recipe Section End -->

    <!-- Top Recipe Section Begin -->
        @yield('top-recipe')
    <!-- Top Recipe Section End -->

    <!-- Categories Filter Section Begin -->
        @yield('categories-filter-section')
    <!-- Categories Filter Section End -->
     
        @yield('main')
    <!-- Feature Recipe Section Begin -->
    <!-- <section class="feature-recipe">
       
        
    </section> -->
    <!-- Feature Recipe Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="footer__text mt-0 pt-0">
                    <div class="footer__logo">
                        <a href="{{ asset('index') }}">
                            <img src="{{ config('app.logo') ?? asset('favicon.ico') }}" alt="">
                        </a>
                    </div>
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                        ut<br /> labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus
                        commodo viverra<br /> maecenas accumsan lacus vel facilisis. </p> -->
                    <div class="footer__social">
                        <a href="{{ $website->insta_link }}"><i class="fa fa-instagram"></i></a>
                    <a href="{{ $website->pinterest_link }}"><i class="fa fa-pinterest"></i></a>
                    <a href="{{ $website->fb_link }}"><i class="fa fa-facebook"></i></a>
                    <a href="{{ $website->whatsapp_link }}"><i class="fa fa-whatsapp"></i></a>
                    </div>
                </div>
                <div class="footer__copyright">
                    <div class="copyright-text m-0 p-0">
                        This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    </div>
                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Created by <a href="https://github.com/krishnaluharuka" target="_blank">Krishna Luharuka <i class="fa fa-moon-o" aria-hidden="true"></i></a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search model -->
	<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
			<div class="search-close-switch">+</div>
			<form class="search-model-form" action="{{ route('search') }}" method="GET">
				<input type="text" id="search-input" name="query" placeholder="Search here....." value="{{ request('query') }}">
                <button type="submit"><i class="fa fa-search"></i></button>
			</form>
		</div>
	</div>
	<!-- Search model end -->

    <!-- Js Plugins -->
    <script src="{{ asset('blog/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('blog/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('blog/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('blog/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('blog/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('blog/js/main.js') }}"></script>

    <!-- toastr link -->
    <script src="{{ asset('user/js/toastr.min.js') }}"></script>
    <!-- toastr link end -->

    <script>
    @if(Session::has('success'))
        toastr.success('{{ Session::get('success') }}');
    @endif

    @if(Session::has('error'))
        toastr.error('{{ Session::get('error') }}');
    @endif

    @if(Session::has('info'))
        toastr.info('{{ Session::get('info') }}');
    @endif

    @if(Session::has('warning'))
        toastr.warning('{{ Session::get('warning') }}');
    @endif
</script>
</body>

</html>