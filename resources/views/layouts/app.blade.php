<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ICON+</title>

    <link rel="apple-touch-icon" href="{{asset('./images/a.png/')}}">
    <link rel="shortcut icon" href="{{asset('./images/a.png/')}}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <script>
        function myFunction() {
            var x = document.getElementById("myDIV");
            if (x.style.display === "none") {
                x.style.display = "inline-block";
            } else {
                x.style.display = "none";
            }
        }

    </script>
    {{-- Style --}}
    @stack('before-style')
    <style type="text/css"> 
        .navbar {
            
            background: linear-gradient(45deg, #f39c12c7, #ea7700) !important;
            transition: background-color 200ms linear;

        }

        footer .bawah{
            padding-top: 10px;
            background-color: black;
            color: #fff;
            text-align: center;
        }

        /* Mark input boxes that gets an error on validation: */
        input.invalid {
            background-color: #ffdddd;
        }

        /* Hide all steps by default: */
        .tab {
            display: none;
        }

        /* Make circles that indicate the steps of the form: */
        .step {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbbbbb;
            border: none;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.5;
        }

        /* Mark the active step: */
        .step.active {
            opacity: 1;
        }

        /* Mark the steps that are finished and valid: */
        .step.finish {
            background-color: #4CAF50;
        }

    </style>
    <style>
        .blink {
            animation: blink-animation 1s steps(5, start) infinite;
            -webkit-animation: blink-animation 1s steps(5, start) infinite;
        }

        @keyframes blink-animation {
            to {
                visibility: hidden;
            }
        }

        @-webkit-keyframes blink-animation {
            to {
                visibility: hidden;
            }
        }

        .base-timer {
            width: 150px;
            height: 150px;
        }

        .base-timer__svg {
            transform: scaleX(-1);
        }

        .base-timer__circle {
            fill: none;
            stroke: none;
        }

        .base-timer__path-elapsed {
            stroke-width: 7px;
            stroke: grey;
        }

        .base-timer__path-remaining {
            stroke-width: 7px;
            stroke-linecap: round;
            transform: rotate(90deg);
            transform-origin: center;
            transition: 1s linear all;
            fill-rule: nonzero;
            stroke: currentColor;
        }

        .base-timer__path-remaining.green {
            color: rgb(65, 184, 131);
        }

        .base-timer__path-remaining.orange {
            color: orange;
        }

        .base-timer__path-remaining.red {
            color: red;
        }

        .base-timer__label {
            position: absolute;
            width: 150px;
            height: 150px;
            top: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
        }
        body {
            background: url(/../../images/Untitled-1.jpg);
        }
        

    </style>
    @stack('after-style')
</head>

<body>
    <div id="app">
        <nav class="navbar overflow-hidden navbar-light bg-white shadow-sm">
            <div class="container">
                <div class="row" style="margin:auto;display:flex;justify-content:center;" >
                    <ul class="navbar-nav">
                        <img src="{{ asset('./images/a.png') }}" width="60" height="50" alt="" loading="lazy">
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4" style="min-height:87vh">
            @yield('content')
        </main>
    </div>

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        function konfirmasi() {

            Swal.fire({
                title: 'Simpan Data?',
                text: "pastikan data terisi dengan benar",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Simpan',
                cancelButtonText: 'Batal'
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                        title: "Berhasil!",
                        text: "Data anda berhasil tersimpan",
                        icon: "success"
                            //timer: 3000
                }).then(function(){
                    window.location = "/users/download/new";
                })
                } 
            })
        }



        history.pushState(null, null, location.href);
        window.onpopstate = function () {
            history.go(1);
        };

    </script>
    <script>
        function edit() {
            var idx = $('#edit').data("id");
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data akan terhapus dan anda harus mengisi lagi dari awal!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url : "{{url('/users/data/delete')}}/"+idx,
                    type: "GET",
                    error: function() {
                        alert('Something is wrong');
                    },
                    success: function(idx)
                    {
                        
                        Swal.fire({
                            title: "Terhapus!",
                            text: "Data sudah terhapus",
                            icon: "success",
                                //timer: 3000
                        }).then(function(){
                            window.location = "/users";
                        })
                    }
                })
                } else {
                    Swal.fire("Batal", "Data anda aman :)", "error");
                }
            })
        }
        function edit1() {
            var id = $('#edit1').data("id");

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data akan terhapus dan anda harus mengisi lagi dari awal!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url : "{{url('/users/data/delete')}}/"+id,
                    type: "GET",
                    error: function() {
                        alert('Something is wrong');
                    },
                    success: function(id)
                    {
                        
                        Swal.fire({
                            title: "Terhapus!",
                            text: "Data sudah terhapus",
                            icon: "success",
                                //timer: 3000
                        }).then(function(){
                            window.location = "/users";
                        })
                    }
                });
                } else {
                    Swal.fire("Batal", "Data anda aman :)", "error");
                }
            })
        }
        function konfirmasi1() {
            Swal.fire({
                title: 'Simpan Data?',
                text: "pastikan data terisi dengan benar",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Simpan',
                cancelButtonText: 'Batal'
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Berhasil!",
                    text: "Data anda berhasil tersimpan",
                    icon: "success",
                            //timer: 3000
                }).then(function(){
                        window.location = "/users/download/old";
                })
            }
            })
        }



        history.pushState(null, null, location.href);
        window.onpopstate = function () {
            history.go(1);
        };

    </script>
    <script type="text/javascript">
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form ...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            // ... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Simpan";
            } else {
                document.getElementById("nextBtn").innerHTML = "Selanjutnya";
            }
            // ... and run a function that displays the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form... :
            if (currentTab >= x.length) {
                //...the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false:
                    valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class to the current step:
            x[n].className += " active";
        }

    </script>
    <script>
        // ALAMAT

        $(document).ready(function () {
            $('#province').on('change', function (e) {
                var id = e.target.value;
                $.get('{{ url('users/alamat/kota')}}/' + id,
                    function (data) {
                        console.log(id);
                        console.log(data);
                        $('#regencies').empty();
                        $('#districts').empty();
                        $('#villages').empty();
                        $('#regencies').append(new Option("Select Kab/Kota", ""));
                        $('#districts').append(new Option("Select Kecamatan", ""));
                        $('#villages').append(new Option("Select Desa", ""));
                        $.each(data, function (index, element) {
                            $('#regencies').append(new Option(element.name, element.id));
                        });
                    });
            });
            $('#regencies').on('change', function (e) {
                var id = e.target.value;
                $.get('{{ url('users/alamat/kec')}}/' + id,
                    function (data) {
                        console.log(id);
                        console.log(data);
                        $('#districts').empty();
                        $('#districts').append(new Option("Select Kecamatan", ""));
                        $('#villages').empty();
                        $('#villages').append(new Option("Select Desa", ""));
                        $.each(data, function (index, element) {
                            $('#districts').append(new Option(element.name, element.id));
                        });
                    });
            });
            $('#districts').on('change', function (e) {
                var id = e.target.value;
                $.get('{{ url('users/alamat/desa')}}/' + id,
                    function (data) {
                        console.log(id);
                        console.log(data);
                        $('#villages').empty();
                        $('#villages').append(new Option("Select Desa", ""));
                        $.each(data, function (index, element) {
                            $('#villages').append(new Option(element.name, element.id));
                        });
                    });
            });

        });

        // ALAMAT-END

    </script>
    <script>
        // Credit: Mateusz Rybczonec

        const FULL_DASH_ARRAY = 283;
        const WARNING_THRESHOLD = 10;
        const ALERT_THRESHOLD = 5;

        const COLOR_CODES = {
            info: {
                color: "green"
            },
            warning: {
                color: "orange",
                threshold: WARNING_THRESHOLD
            },
            alert: {
                color: "red",
                threshold: ALERT_THRESHOLD
            }
        };

        const TIME_LIMIT = 5;
        let timePassed = 0;
        let timeLeft = TIME_LIMIT;
        let timerInterval = null;
        let remainingPathColor = COLOR_CODES.info.color;

        document.getElementById("app1").innerHTML = `
        <div class="base-timer">
        <svg class="base-timer__svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
            <g class="base-timer__circle">
            <circle class="base-timer__path-elapsed" cx="50" cy="50" r="45"></circle>
            <path
                id="base-timer-path-remaining"
                stroke-dasharray="283"
                class="base-timer__path-remaining ${remainingPathColor}"
                d="
                M 50, 50
                m -45, 0
                a 45,45 0 1,0 90,0
                a 45,45 0 1,0 -90,0
                "
            ></path>
            </g>
        </svg>
        <span id="base-timer-label" class="base-timer__label">${formatTime(
            timeLeft
        )}</span>
        </div>
        `;

        startTimer();

        function onTimesUp() {
            clearInterval(timerInterval);
        }

        function startTimer() {
            timerInterval = setInterval(() => {
                timePassed = timePassed += 1;
                timeLeft = TIME_LIMIT - timePassed;
                document.getElementById("base-timer-label").innerHTML = formatTime(
                    timeLeft
                );
                setCircleDasharray();
                setRemainingPathColor(timeLeft);

                if (timeLeft === 0) {
                    onTimesUp();
                }
            }, 1000);
        }

        function formatTime(time) {
            const minutes = Math.floor(time / 60);
            let seconds = time % 60;

            if (seconds < 10) {
                seconds = `0${seconds}`;
            }

            return `${minutes}:${seconds}`;
        }

        function setRemainingPathColor(timeLeft) {
            const {
                alert,
                warning,
                info
            } = COLOR_CODES;
            if (timeLeft <= alert.threshold) {
                document
                    .getElementById("base-timer-path-remaining")
                    .classList.remove(warning.color);
                document
                    .getElementById("base-timer-path-remaining")
                    .classList.add(alert.color);
            } else if (timeLeft <= warning.threshold) {
                document
                    .getElementById("base-timer-path-remaining")
                    .classList.remove(info.color);
                document
                    .getElementById("base-timer-path-remaining")
                    .classList.add(warning.color);
            }
        }

        function calculateTimeFraction() {
            const rawTimeFraction = timeLeft / TIME_LIMIT;
            return rawTimeFraction - (1 / TIME_LIMIT) * (1 - rawTimeFraction);
        }

        function setCircleDasharray() {
            const circleDasharray = `${(
        calculateTimeFraction() * FULL_DASH_ARRAY
        ).toFixed(0)} 283`;
            document
                .getElementById("base-timer-path-remaining")
                .setAttribute("stroke-dasharray", circleDasharray);
        }

        function showIt2() {
            document.getElementById("edit").style.visibility = "visible";
        }
        function showIt1() {
            document.getElementById("edit1").style.visibility = "visible";
        }
        function showIt3() {
            document.getElementById("done").style.visibility = "visible";
        }
        setTimeout("showIt1()", (TIME_LIMIT * 1000));
        setTimeout("showIt2()", (TIME_LIMIT * 1000));
        setTimeout("showIt3()", (TIME_LIMIT * 1000));

    </script>
    @stack('after-script')
</body>

</html>
