<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed:100,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    {{--<link rel="stylesheet" href="{{}}css/open-iconic-bootstrap.min.css">--}}
    <link rel="stylesheet" href="{{mix('css/animate.css')}}">
    <link rel="stylesheet" href="{{mix('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{mix('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{mix('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{mix('css/aos.css')}}">
    <link rel="stylesheet" href="{{mix('css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{mix('css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{mix('css/jquery.timepicker.css')}}">
    <link rel="stylesheet" href="{{mix('css/flaticon.css')}}">
    <link rel="stylesheet" href="{{mix('css/icomoon.css')}}">
    <link rel="stylesheet" href="{{mix('css/style.css')}}">
    <title>Document</title>
</head>
<body>
    <div id="app"></div>
    <div id="">
        @include('client.layouts.header.index')

        @yield('content')

        @include('client.layouts.footer.index')
{{--        <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>--}}
    </div>

    <script src="{{mix('js/app.js')}}"></script>
    <script src="{{mix('js/jquery.min.js')}}"></script>
    <script src="{{mix('js/popper.min.js')}}"></script>
    <script src="{{mix('js/jquery.easing.1.3.js')}}"></script>
    <script src="{{mix('js/jquery.waypoints.min.js')}}"></script>
    <script src="{{mix('js/jquery.stellar.min.js')}}"></script>
    <script src="{{mix('js/jquery-migrate-3.0.1.min.js')}}"></script>
    <script src="{{mix('js/owl.carousel.min.js')}}"></script>

    <script src="{{mix('js/aos.js')}}"></script>
    <script src="{{mix('js/jquery.animateNumber.min.js')}}"></script>
    <script src="{{mix('js/bootstrap-datepicker.js')}}"></script>
    <script src="{{mix('js/jquery.timepicker.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
{{--    <script src="{{mix('js/jquery.magnific-popup.min.js')}}"></script>--}}
    <script src="{{mix('js/scrollax.min.js')}}"></script>
    <script src="{{mix('js/main.js')}}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script>

        $('.timepicker').timepicker({
            timeFormat: 'HH:mm',
            interval:10,
            minTime: '10',
            maxTime: '6:00pm',
            defaultTime: '11',
            startTime: '10:00',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });

    </script>
    <style>

        /*dfdsf*/
    </style>
</body>
</html>
