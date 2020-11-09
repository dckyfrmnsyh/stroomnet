<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Stroomnet</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: "Montserrat", sans-serif;
            font-size: 0.9rem;
            font-weight: 400;
            line-height: 1.6;
            color: #212529;
            text-align: left;
            background-color: #f8fafc;
        }

        .navbar-fixed-top.scrolled {
            background-color: #db7c26 !important;
            transition: background-color 200ms linear;
        }

        .navbar-fixed-top.scrolled .nav-link {
            color: white;
        }
        .navbar-fixed-top .nav-link:hover{
            border-bottom: 2px solid white;
        }

        #intro {
            width: 100%;
            height: 100vh;
            background: url(../images/backtq.jpg) center top no-repeat;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            position: relative;
        }

        #intro .intro_text {
            position: absolute;
            left: 0;
            top: 150px;
            right: 0;
            height: calc(50% - 60px);
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            text-align: center;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
        }

        #intro .intro_text h2 {
            font-size: 28px;
            line-height: 36px;
            margin-bottom: -10px;
            color: white;
        }

        #intro .intro_text p {
            font-size: 18px;
            line-height: 24px;
            margin-bottom: 20px;
            color: white;
        }

        #intro .btn-get-started {
            font-family: "Montserrat", sans-serif;
            text-decoration: none;
            font-weight: 400;
            font-size: 16px;
            letter-spacing: 1px;
            display: inline-block;
            padding: 8px 28px;
            border-radius: 50px;
            transition: 0.5s;
            margin: 10px;
            border: 2px solid #fff;
            color: #fff;
        }

        #daftar {
            width: 100%;
            height: 100vh;
            position: relative;
            padding-top: 20px;
        }

        .footer {
            width: 100%;
            position: relative;
            padding-top: 20px;
        }

    </style>
</head>

<body>
    <!-- Intro -->
    <section id="intro">
        <div class="intro_text">
            <h1 data-aos="flip-left" data-aos-easing="linear" data-aos-duration="1000" class="display-4" style="margin-top: 30vh;color: #f9e6c8; text-shadow: 3px 3px black;font-family: Montserrat, sans-serif; font-size: 50px; box-shadow: 0px 0px 10px 0px white">Terima Kasih</h1>
            <br>
        </div>
    </section>
    <!-- #Intro -->
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
                $nav.toggleClass('scrolled', $(this).scrollTop() >= $intro.height());
            });
        });

    </script>
</body>

</html>
