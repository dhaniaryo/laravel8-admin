<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">

    {{-- Buat judul --}}
    <title>@yield('judul')</title>

    <link
        href="https://fonts.googleapis.com/css?family=PT+Serif:400,400i,700,700ii%7CRoboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ion.rangeSlider.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ion.rangeSlider.skinFlat.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.bxslider.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flexslider.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/media.css') }}">

</head>

<body>
    <!-- Header - start -->
    <header class="header">
        <div class="header-middle">
            <div class="container header-middle-cont">
                <div class="toplogo">
                    <a href="{{ url('/admindashboard') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>
                <div class="shop-menu">
                    <ul>


                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="menu-item-has-children">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @endguest



                    </ul>
                </div>
            </div>
        </div>
        <!-- Logo, Shop-menu - end -->

        <!-- Topmenu - start -->
        <div class="header-bottom">
            <div class="container">
                <nav class="topmenu">



                    <!-- Main menu - start -->
                    <button type="button" class="mainmenu-btn">Menu</button>

                    <ul class="mainmenu">
                        <li>
                            <a href="{{ url('/userdashboard') }}" class="">
                                Semua Data Penjualan
                            </a>
                        </li>

                        <li class="menu">
                            <a href="{{ url('/userjualjasasemua') }}">
                                Penjualan Jasa
                            </a>
                        </li>

                        <li class="menu">
                            <a href="{{ url('/userjualbarangsemua') }}">
                                Penjualan Barang
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- Topmenu - end -->

    </header>
    <!-- Header - end -->

    {{-- Bagian main --}}
    <main>
        @yield('content')
    </main>





    <!-- jQuery plugins/scripts - start -->
    <script src="{{ asset('js/jquery-1.11.2.min.js') }}"></script>
    <script src="{{ asset('js/jquery.bxslider.min.js') }}"></script>
    <script src="{{ asset('js/fancybox/fancybox.js') }}"></script>
    <script src="{{ asset('js/fancybox/helpers/jquery.fancybox-thumbs.js') }}"></script>
    <script src="{{ asset('js/jquery.flexslider-min.js') }}"></script>
    <script src="{{ asset('js/swiper.jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/progressbar.min.js') }}"></script>
    <script src="{{ asset('js/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset('js/chosen.jquery.min.js') }}"></script>
    <script src="{{ asset('js/jQuery.Brazzers-Carousel.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhAYvx0GmLyN5hlf6Uv_e9pPvUT3YpozE"></script>
    <script src="{{ asset('js/gmap.js') }}"></script>
    <!-- jQuery plugins/scripts - end -->

</body>

</html>
