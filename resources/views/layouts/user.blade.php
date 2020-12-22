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
    {{-- Style --}}
    @stack('before-style')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('css/index.css') }}" rel="stylesheet"> -->
    @stack('after-style')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        @yield('sidebar')
        
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <!-- navbar -->
            <nav class="navbar fixed-top navbar-expand-lg navbar-light navbar-fixed-top" id="navbar"
                style="padding-right:80px;padding-left:80px;background: linear-gradient(45deg, #f39c12c7, #ea7700) !important;">
                <div class="container-fluid">
                    <a class="navbar-brand">
                        <img src="{{asset('images/a.png')}}" width="60" height="50" alt="" loading="lazy">
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

                            <div class="navbar-nav" style="color:white;">
                                <a class="nav-link" href="/users" style="color:white;margin-right: 10px">Home</a>
                                <a class="nav-link" href="{{route('users.profile')}}" style="color:white;margin-right: 10px">Profile</a>
                            </div>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- end of navbar -->
            <div class="container-fluid " style="min-height:90vh;">
                @yield('content')
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
    <!-- footer -->
    <footer id="kontak" class="overflow-hidden">
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
    {{-- Script --}}
    @stack('before-script')
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        
    </script>
    @stack('after-script')
</body>

</html>
