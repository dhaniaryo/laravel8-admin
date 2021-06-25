<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">

    {{-- Buat judul --}}
    <title>Halaman Admin</title>

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
        <!-- Topmenu - start -->
        <div class="header-bottom">
            <div class="container">
                <nav class="topmenu">



                    <!-- Main menu - start -->
                    <button type="button" class="mainmenu-btn">Menu</button>

                    <ul class="mainmenu">
                        <li>
                            <a href="{{ url('/admindashboard') }}" class="active">
                                Beranda
                            </a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{ url('/lihatdatapengguna') }}">
                                Pengguna <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="{{ url('/lihatdatapengguna') }}">
                                        Lihat Data Pengguna
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/tambahdatapengguna') }}">
                                        Tambah Data Pengguna
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{ url('/datajualjasasemua') }}">
                                Jual Jasa <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="sub-menu">

                                <li>
                                    <a href="{{ url('/datajualjasasemua') }}">
                                        Lihat Data Jasa
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ url('/tambahdatajualjasa') }}">
                                        Tambah Data Jasa
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="menu-item-has-children">
                            <a href="{{ url('/datajualbarangsemua') }}">
                                Jual Barang <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="sub-menu">

                                <li>
                                    <a href="{{ url('/datajualbarangsemua') }}">
                                        Lihat Data Barang
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ url('/tambahdatajualbarang') }}">
                                        Tambah Data Barang
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{ url('/datapengeluaransemua') }}">
                                Data Pengeluaran <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="sub-menu">

                                <li>
                                    <a href="{{ url('/datapengeluaransemua') }}">
                                        Lihat Data Pengeluaran
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ url('/tambahdatapengeluaran') }}">
                                        Tambah Data Pengeluaran
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{ url('/datarekapsemua') }}">
                                Semua Rekap Data <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="sub-menu">

                                <li>
                                    <a href="{{ url('/datarekasemua') }}">
                                        Semua Data
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/datarekaphari') }}">
                                        Data Rekap Hari Ini
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/datarekapbulan') }}">
                                        Data Rekap Bulanan
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/datarekaptahun') }}">
                                        Data Rekap Tahunan
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="menu-item-has-children">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
    
    
                            {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
    
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div> --}}
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
