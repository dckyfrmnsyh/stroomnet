<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ICON+</title>

    <link rel="apple-touch-icon" href="{{asset('./images/a.png/')}}">
    <link rel="shortcut icon" href="{{asset('./images/a.png/')}}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body>

    <!-- navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light navbar-fixed-top" id="navbar" style="">
        <div class="container">
            <a class="navbar-brand">
                <img src="./images/a.png" width="60" height="50" alt="" loading="lazy">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">

                    <div class="navbar-nav" style="">

                        <a class="nav-link" href="#intro" style="margin-right: 10px">Home <span
                                class="sr-only">(current)</span></a>
                        <a class="nav-link" href="#daftar" style="margin-right: 10px">Daftar</a>
                        <a class="nav-link" href="#kontak" style="margin-right: 10px">Kontak</a>

                        <!-- Authentication Links -->
                        @guest
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @else
                        <div class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('users.profile') }}"><i class="fa fa-btn fa-user"
                                        style="margin-right:10px;"></i> Profile</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fa fa-btn fa-sign-out" style="margin-right:10px;"></i>
                                    {{ __('Logout') }}</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                        @endguest
                    </div>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end of navbar -->
    <!-- Intro -->
    <section id="intro">
        <div class="intro_text">
            <h2>We Speak Beyond Connectivity</h2><br>
            <p>Melayani fasilitas internet yang anda butuhkan</p>
            <a href="#daftar" class="btn-get-started">Daftar </a>
        </div>
    </section>
    <!-- #Intro -->

    <!-- Container -->
    <div class="container">
        <section id="daftar">
            <div class="row justify-content-center">
                <h2 data-aos="fade-down" data-aos-offset="300" data-aos-easing="ease-in-sine" data-aos-duration="700"
                    class="daftar-tittle">Pilih Layanan</h2>
            </div>
            <div class="row overflow-hidden justify-content-center">
                <div data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine" data-aos-duration="700"
                    class="col-lg-4 baru">
                    <h3>Layanan Baru</h3>
                    @if($count_fb != 0)
                    <a href="{{route('users.bakbb_new')}}" class="btn btn-outline-light btn-dark">Daftar</a>
                    @endif
                </div>
                <div data-aos="fade-left" data-aos-offset="300" data-aos-easing="ease-in-sine" data-aos-duration="700"
                    class="col-lg-4 lama">
                    <h3>Layanan Lama</h3>
                    @if($count_fb != 0)
                    <a href="{{route('users.bakbb_exist')}}" class="">Daftar</a>
                    @endif
                </div>
            </div>
        </section>
    </div>
    <!-- #Container -->
    <!-- footer -->
    <footer id="kontak" class="overflow-hidden">
        <section id="footer">
            <div class="row justify-content-center">
                <h2 class="footer-tittle">Kontak</h2>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-3">
                        <h4>Alamat</h4>
                        <p><i class="fa fa-map-marker"></i> Kantor SBU Regional Surabaya PLN PIKITRING Jl. Ketintang
                            Baru 1 NO.1-3 Surabaya 60231</p>
                    </div>
                    <div class="col-lg-2">

                    </div>
                    <div class="col-lg-3">
                        <h4>Telepon</h4>
                        <p><i class="fa fa-phone"></i> Kantor: (031)827-3399<br>
                            Fax : (031)828-6611</p>
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-3">
                        <h4>Email</h4>
                        <p><i class="fa fa-envelope"></i> hendy.rubiyanto@iconpln.co.id</p>
                    </div>
                </div>
            </div>
        </section>
        <div class="bawah">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <p>© 2020 icon plus surabaya</p>
                    </div>
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">
                        <p>
                            Follow Us
                            <i class="fa fa-instagram"></i>
                            <i class="fa fa-facebook-square" aria-hidden="true"></i>
                            <i class="fa fa-twitter-square" aria-hidden="true"></i>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- #footer -->


    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();

    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $(document).scroll(function () {
                var $nav = $(".navbar-fixed-top");
                var $intro = $("#intro");
                $nav.toggleClass('scrolled', $(this).scrollTop() >= ($intro.height()-100));
            });
        });

    </script>
</body>

</html>
