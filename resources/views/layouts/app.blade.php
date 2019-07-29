<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'ABSOLUTE') }}</title>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- Styles -->
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <script>

        window.Laravel = <?php echo json_encode([
            'userId' => !Auth::guest() ? Auth::user()->id : '',
            'roles' =>  !Auth::guest() ? Auth::user()->roles()->pluck('name')->toArray() : '',
            'permissions' => !Auth::guest() ? Auth::user()->roles()->pluck('name')->toArray() : ''
        ]); ?>;
        var store = {}, roles =  window.Laravel.roles
        for (var i = 0; i < roles.length; i++) {
            store[roles[i]] = true;
        }
        window.Laravel['store'] = store;
    </script>
    <style>

        body {
            overflow: hidden;
        }
        * {
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }
        *:after, *:before {
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        .main {
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            z-index: 1;
            width: 100%;
            height: 100%;
            overflow: hidden;
            background: white;
            background: linear-gradient(45deg, #ffffff 0%, rgba(187, 147, 252, 0.8) 26%, #94edff 50%);
        }

        .main {
            overflow: hidden;
        }

        .bubble {
            background-color: rgba(255, 255, 255, 0.4);
            display: inline-block;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            position: absolute;
        }
        .bubble-1 {
            opacity: 0.7;
            left: 82vw;
            top: 45vh;
            animation: move-1 30.02s infinite;
            -moz-transform: translate(0, 0) scale(1.58);
            -ms-transform: translate(0, 0) scale(1.58);
            -webkit-transform: translate(0, 0) scale(1.58);
            transform: translate(0, 0) scale(1.58);
        }
        .bubble-2 {
            opacity: 0.07;
            left: 28vw;
            top: 58vh;
            animation: move-2 30.04s infinite;
            -moz-transform: translate(0, 0) scale(1.89);
            -ms-transform: translate(0, 0) scale(1.89);
            -webkit-transform: translate(0, 0) scale(1.89);
            transform: translate(0, 0) scale(1.89);
        }
        .bubble-3 {
            opacity: 0.49;
            left: 71vw;
            top: 67vh;
            animation: move-3 30.06s infinite;
            -moz-transform: translate(0, 0) scale(1.32);
            -ms-transform: translate(0, 0) scale(1.32);
            -webkit-transform: translate(0, 0) scale(1.32);
            transform: translate(0, 0) scale(1.32);
        }
        .bubble-4 {
            opacity: 0.59;
            left: 96vw;
            top: 56vh;
            animation: move-4 30.08s infinite;
            -moz-transform: translate(0, 0) scale(0.25);
            -ms-transform: translate(0, 0) scale(0.25);
            -webkit-transform: translate(0, 0) scale(0.25);
            transform: translate(0, 0) scale(0.25);
        }
        .bubble-5 {
            opacity: 0.01;
            left: 34vw;
            top: 15vh;
            animation: move-5 30.1s infinite;
            -moz-transform: translate(0, 0) scale(1.04);
            -ms-transform: translate(0, 0) scale(1.04);
            -webkit-transform: translate(0, 0) scale(1.04);
            transform: translate(0, 0) scale(1.04);
        }
        .bubble-6 {
            opacity: 0.77;
            left: 19vw;
            top: 69vh;
            animation: move-6 30.12s infinite;
            -moz-transform: translate(0, 0) scale(1.28);
            -ms-transform: translate(0, 0) scale(1.28);
            -webkit-transform: translate(0, 0) scale(1.28);
            transform: translate(0, 0) scale(1.28);
        }
        .bubble-7 {
            opacity: 0.18;
            left: 40vw;
            top: 54vh;
            animation: move-7 30.14s infinite;
            -moz-transform: translate(0, 0) scale(0.38);
            -ms-transform: translate(0, 0) scale(0.38);
            -webkit-transform: translate(0, 0) scale(0.38);
            transform: translate(0, 0) scale(0.38);
        }
        .bubble-8 {
            opacity: 0.77;
            left: 71vw;
            top: 9vh;
            animation: move-8 30.16s infinite;
            -moz-transform: translate(0, 0) scale(1.19);
            -ms-transform: translate(0, 0) scale(1.19);
            -webkit-transform: translate(0, 0) scale(1.19);
            transform: translate(0, 0) scale(1.19);
        }
        .bubble-9 {
            opacity: 0.32;
            left: 15vw;
            top: 46vh;
            animation: move-9 30.18s infinite;
            -moz-transform: translate(0, 0) scale(0.42);
            -ms-transform: translate(0, 0) scale(0.42);
            -webkit-transform: translate(0, 0) scale(0.42);
            transform: translate(0, 0) scale(0.42);
        }
        .bubble-10 {
            opacity: 0.21;
            left: 48vw;
            top: 66vh;
            animation: move-10 30.2s infinite;
            -moz-transform: translate(0, 0) scale(1.69);
            -ms-transform: translate(0, 0) scale(1.69);
            -webkit-transform: translate(0, 0) scale(1.69);
            transform: translate(0, 0) scale(1.69);
        }
        .bubble-11 {
            opacity: 0.07;
            left: 13vw;
            top: 60vh;
            animation: move-11 30.22s infinite;
            -moz-transform: translate(0, 0) scale(1.9);
            -ms-transform: translate(0, 0) scale(1.9);
            -webkit-transform: translate(0, 0) scale(1.9);
            transform: translate(0, 0) scale(1.9);
        }
        .bubble-12 {
            opacity: 0.91;
            left: 17vw;
            top: 85vh;
            animation: move-12 30.24s infinite;
            -moz-transform: translate(0, 0) scale(0.37);
            -ms-transform: translate(0, 0) scale(0.37);
            -webkit-transform: translate(0, 0) scale(0.37);
            transform: translate(0, 0) scale(0.37);
        }
        .bubble-13 {
            opacity: 0.85;
            left: 26vw;
            top: 59vh;
            animation: move-13 30.26s infinite;
            -moz-transform: translate(0, 0) scale(0.29);
            -ms-transform: translate(0, 0) scale(0.29);
            -webkit-transform: translate(0, 0) scale(0.29);
            transform: translate(0, 0) scale(0.29);
        }
        .bubble-14 {
            opacity: 0.29;
            left: 5vw;
            top: 67vh;
            animation: move-14 30.28s infinite;
            -moz-transform: translate(0, 0) scale(0.51);
            -ms-transform: translate(0, 0) scale(0.51);
            -webkit-transform: translate(0, 0) scale(0.51);
            transform: translate(0, 0) scale(0.51);
        }
        .bubble-15 {
            opacity: 0.39;
            left: 22vw;
            top: 58vh;
            animation: move-15 30.3s infinite;
            -moz-transform: translate(0, 0) scale(1.31);
            -ms-transform: translate(0, 0) scale(1.31);
            -webkit-transform: translate(0, 0) scale(1.31);
            transform: translate(0, 0) scale(1.31);
        }
        .bubble-16 {
            opacity: 0.77;
            left: 91vw;
            top: 70vh;
            animation: move-16 30.32s infinite;
            -moz-transform: translate(0, 0) scale(0.54);
            -ms-transform: translate(0, 0) scale(0.54);
            -webkit-transform: translate(0, 0) scale(0.54);
            transform: translate(0, 0) scale(0.54);
        }
        .bubble-17 {
            opacity: 0.66;
            left: 21vw;
            top: 44vh;
            animation: move-17 30.34s infinite;
            -moz-transform: translate(0, 0) scale(1.82);
            -ms-transform: translate(0, 0) scale(1.82);
            -webkit-transform: translate(0, 0) scale(1.82);
            transform: translate(0, 0) scale(1.82);
        }
        .bubble-18 {
            opacity: 0.48;
            left: 16vw;
            top: 10vh;
            animation: move-18 30.36s infinite;
            -moz-transform: translate(0, 0) scale(0.98);
            -ms-transform: translate(0, 0) scale(0.98);
            -webkit-transform: translate(0, 0) scale(0.98);
            transform: translate(0, 0) scale(0.98);
        }
        .bubble-19 {
            opacity: 0.91;
            left: 59vw;
            top: 57vh;
            animation: move-19 30.38s infinite;
            -moz-transform: translate(0, 0) scale(0.47);
            -ms-transform: translate(0, 0) scale(0.47);
            -webkit-transform: translate(0, 0) scale(0.47);
            transform: translate(0, 0) scale(0.47);
        }
        .bubble-20 {
            opacity: 0.11;
            left: 24vw;
            top: 38vh;
            animation: move-20 30.4s infinite;
            -moz-transform: translate(0, 0) scale(1.62);
            -ms-transform: translate(0, 0) scale(1.62);
            -webkit-transform: translate(0, 0) scale(1.62);
            transform: translate(0, 0) scale(1.62);
        }
        .bubble-21 {
            opacity: 0.47;
            left: 8vw;
            top: 79vh;
            animation: move-21 30.42s infinite;
            -moz-transform: translate(0, 0) scale(0.92);
            -ms-transform: translate(0, 0) scale(0.92);
            -webkit-transform: translate(0, 0) scale(0.92);
            transform: translate(0, 0) scale(0.92);
        }
        .bubble-22 {
            opacity: 0.75;
            left: 97vw;
            top: 89vh;
            animation: move-22 30.44s infinite;
            -moz-transform: translate(0, 0) scale(0.46);
            -ms-transform: translate(0, 0) scale(0.46);
            -webkit-transform: translate(0, 0) scale(0.46);
            transform: translate(0, 0) scale(0.46);
        }
        .bubble-23 {
            opacity: 0.02;
            left: 16vw;
            top: 66vh;
            animation: move-23 30.46s infinite;
            -moz-transform: translate(0, 0) scale(1.85);
            -ms-transform: translate(0, 0) scale(1.85);
            -webkit-transform: translate(0, 0) scale(1.85);
            transform: translate(0, 0) scale(1.85);
        }
        .bubble-24 {
            opacity: 0.66;
            left: 65vw;
            top: 67vh;
            animation: move-24 30.48s infinite;
            -moz-transform: translate(0, 0) scale(0.83);
            -ms-transform: translate(0, 0) scale(0.83);
            -webkit-transform: translate(0, 0) scale(0.83);
            transform: translate(0, 0) scale(0.83);
        }
        .bubble-25 {
            opacity: 0.22;
            left: 36vw;
            top: 65vh;
            animation: move-25 30.5s infinite;
            -moz-transform: translate(0, 0) scale(0.91);
            -ms-transform: translate(0, 0) scale(0.91);
            -webkit-transform: translate(0, 0) scale(0.91);
            transform: translate(0, 0) scale(0.91);
        }
        .bubble-26 {
            opacity: 0.43;
            left: 80vw;
            top: 15vh;
            animation: move-26 30.52s infinite;
            -moz-transform: translate(0, 0) scale(0.35);
            -ms-transform: translate(0, 0) scale(0.35);
            -webkit-transform: translate(0, 0) scale(0.35);
            transform: translate(0, 0) scale(0.35);
        }
        .bubble-27 {
            opacity: 0.31;
            left: 35vw;
            top: 48vh;
            animation: move-27 30.54s infinite;
            -moz-transform: translate(0, 0) scale(0.19);
            -ms-transform: translate(0, 0) scale(0.19);
            -webkit-transform: translate(0, 0) scale(0.19);
            transform: translate(0, 0) scale(0.19);
        }
        .bubble-28 {
            opacity: 0.99;
            left: 81vw;
            top: 75vh;
            animation: move-28 30.56s infinite;
            -moz-transform: translate(0, 0) scale(0.78);
            -ms-transform: translate(0, 0) scale(0.78);
            -webkit-transform: translate(0, 0) scale(0.78);
            transform: translate(0, 0) scale(0.78);
        }
        .bubble-29 {
            opacity: 0.46;
            left: 89vw;
            top: 79vh;
            animation: move-29 30.58s infinite;
            -moz-transform: translate(0, 0) scale(1.39);
            -ms-transform: translate(0, 0) scale(1.39);
            -webkit-transform: translate(0, 0) scale(1.39);
            transform: translate(0, 0) scale(1.39);
        }
        .bubble-30 {
            opacity: 0.29;
            left: 82vw;
            top: 68vh;
            animation: move-30 30.6s infinite;
            -moz-transform: translate(0, 0) scale(0.46);
            -ms-transform: translate(0, 0) scale(0.46);
            -webkit-transform: translate(0, 0) scale(0.46);
            transform: translate(0, 0) scale(0.46);
        }

        .credits {
            position: fixed;
            left: 0;
            bottom: 0;
            padding: 2px 15px;
            background-color: rgba(0, 0, 0, 0.6);
            width: 100%;
            z-index: 111;
        }
        .credits a {
            color: #fff;
            font-size: 11px;
            text-decoration: none;
            letter-spacing: 0.05em;
        }

        @keyframes move-1 {
            37% {
                -moz-transform: translate(-16vw, -86vh);
                -webkit-transform: translate(-16vw, -86vh);
                transform: translate(-16vw, -86vh);
            }
        }
        @keyframes move-2 {
            40% {
                -moz-transform: translate(-56vw, -33vh);
                -webkit-transform: translate(-56vw, -33vh);
                transform: translate(-56vw, -33vh);
            }
        }
        @keyframes move-3 {
            40% {
                -moz-transform: translate(-28vw, -85vh);
                -webkit-transform: translate(-28vw, -85vh);
                transform: translate(-28vw, -85vh);
            }
        }
        @keyframes move-4 {
            42% {
                -moz-transform: translate(-41vw, -52vh);
                -webkit-transform: translate(-41vw, -52vh);
                transform: translate(-41vw, -52vh);
            }
        }
        @keyframes move-5 {
            46% {
                -moz-transform: translate(0vw, -37vh);
                -webkit-transform: translate(0vw, -37vh);
                transform: translate(0vw, -37vh);
            }
        }
        @keyframes move-6 {
            56% {
                -moz-transform: translate(-99vw, -88vh);
                -webkit-transform: translate(-99vw, -88vh);
                transform: translate(-99vw, -88vh);
            }
        }
        @keyframes move-7 {
            34% {
                -moz-transform: translate(-72vw, -4vh);
                -webkit-transform: translate(-72vw, -4vh);
                transform: translate(-72vw, -4vh);
            }
        }
        @keyframes move-8 {
            55% {
                -moz-transform: translate(-95vw, -98vh);
                -webkit-transform: translate(-95vw, -98vh);
                transform: translate(-95vw, -98vh);
            }
        }
        @keyframes move-9 {
            33% {
                -moz-transform: translate(-89vw, -13vh);
                -webkit-transform: translate(-89vw, -13vh);
                transform: translate(-89vw, -13vh);
            }
        }
        @keyframes move-10 {
            40% {
                -moz-transform: translate(-64vw, -24vh);
                -webkit-transform: translate(-64vw, -24vh);
                transform: translate(-64vw, -24vh);
            }
        }
        @keyframes move-11 {
            47% {
                -moz-transform: translate(-81vw, -74vh);
                -webkit-transform: translate(-81vw, -74vh);
                transform: translate(-81vw, -74vh);
            }
        }
        @keyframes move-12 {
            37% {
                -moz-transform: translate(-44vw, -12vh);
                -webkit-transform: translate(-44vw, -12vh);
                transform: translate(-44vw, -12vh);
            }
        }
        @keyframes move-13 {
            50% {
                -moz-transform: translate(-57vw, -27vh);
                -webkit-transform: translate(-57vw, -27vh);
                transform: translate(-57vw, -27vh);
            }
        }
        @keyframes move-14 {
            46% {
                -moz-transform: translate(-31vw, -9vh);
                -webkit-transform: translate(-31vw, -9vh);
                transform: translate(-31vw, -9vh);
            }
        }
        @keyframes move-15 {
            32% {
                -moz-transform: translate(-38vw, -23vh);
                -webkit-transform: translate(-38vw, -23vh);
                transform: translate(-38vw, -23vh);
            }
        }
        @keyframes move-16 {
            48% {
                -moz-transform: translate(-52vw, -69vh);
                -webkit-transform: translate(-52vw, -69vh);
                transform: translate(-52vw, -69vh);
            }
        }
        @keyframes move-17 {
            42% {
                -moz-transform: translate(-24vw, -18vh);
                -webkit-transform: translate(-24vw, -18vh);
                transform: translate(-24vw, -18vh);
            }
        }
        @keyframes move-18 {
            55% {
                -moz-transform: translate(-93vw, -81vh);
                -webkit-transform: translate(-93vw, -81vh);
                transform: translate(-93vw, -81vh);
            }
        }
        @keyframes move-19 {
            51% {
                -moz-transform: translate(-1vw, -99vh);
                -webkit-transform: translate(-1vw, -99vh);
                transform: translate(-1vw, -99vh);
            }
        }
        @keyframes move-20 {
            48% {
                -moz-transform: translate(-14vw, -75vh);
                -webkit-transform: translate(-14vw, -75vh);
                transform: translate(-14vw, -75vh);
            }
        }
        @keyframes move-21 {
            31% {
                -moz-transform: translate(-11vw, -14vh);
                -webkit-transform: translate(-11vw, -14vh);
                transform: translate(-11vw, -14vh);
            }
        }
        @keyframes move-22 {
            57% {
                -moz-transform: translate(-64vw, -96vh);
                -webkit-transform: translate(-64vw, -96vh);
                transform: translate(-64vw, -96vh);
            }
        }
        @keyframes move-23 {
            44% {
                -moz-transform: translate(-55vw, -21vh);
                -webkit-transform: translate(-55vw, -21vh);
                transform: translate(-55vw, -21vh);
            }
        }
        @keyframes move-24 {
            53% {
                -moz-transform: translate(-71vw, -71vh);
                -webkit-transform: translate(-71vw, -71vh);
                transform: translate(-71vw, -71vh);
            }
        }
        @keyframes move-25 {
            35% {
                -moz-transform: translate(-79vw, -69vh);
                -webkit-transform: translate(-79vw, -69vh);
                transform: translate(-79vw, -69vh);
            }
        }
        @keyframes move-26 {
            43% {
                -moz-transform: translate(-43vw, -18vh);
                -webkit-transform: translate(-43vw, -18vh);
                transform: translate(-43vw, -18vh);
            }
        }
        @keyframes move-27 {
            36% {
                -moz-transform: translate(-62vw, -44vh);
                -webkit-transform: translate(-62vw, -44vh);
                transform: translate(-62vw, -44vh);
            }
        }
        @keyframes move-28 {
            52% {
                -moz-transform: translate(-51vw, -56vh);
                -webkit-transform: translate(-51vw, -56vh);
                transform: translate(-51vw, -56vh);
            }
        }
        @keyframes move-29 {
            35% {
                -moz-transform: translate(-70vw, -74vh);
                -webkit-transform: translate(-70vw, -74vh);
                transform: translate(-70vw, -74vh);
            }
        }
        @keyframes move-30 {
            60% {
                -moz-transform: translate(-89vw, -1vh);
                -webkit-transform: translate(-89vw, -1vh);
                transform: translate(-89vw, -1vh);
            }
        }

        .preloader {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 100000;
            backface-visibility: hidden;
            background-color: #22252C;

        }
        .loader_img {
            position: absolute;
            top:0;
            bottom: 0;
            left: 0;
            right: 0;
            width: 250px;
            height: 250px;
            margin: auto;
        }

        svg {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
        }

        .beat-loader {
            stroke: #E76E66;
            stroke-dasharray: 175;
            stroke-dashoffset: 350;
            -webkit-animation: draw 1.4s linear;
            -moz-animation: draw 1.4s linear;
            animation: draw 1.4s linear;
            -webkit-animation-iteration-count: infinite;
            -moz-animation-iteration-count: infinite;
            animation-iteration-count: infinite;
        }

        @-webkit-keyframes draw {
            to {
                stroke-dashoffset: 0;
            }
        }
        @-moz-keyframes draw {
            to {
                stroke-dashoffset: 0;
            }
        }
        @keyframes draw {
            to {
                stroke-dashoffset: 0;
            }
        }




    </style>
    @yield('css')
</head>
<body class="hold-transition transform login-page sidebar-mini">
<div class="preloader">
    <div class="loader_img">
        <svg width="108px" height="128px" viewBox="0 0 54 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
            <defs></defs>
            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                <path class="beat-loader" d="M0.5,38.5 L16,38.5 L19,25.5 L24.5,57.5 L31.5,7.5 L37.5,46.5 L43,38.5 L53.5,38.5" id="Path-2" stroke-width="2" sketch:type="MSShapeGroup"></path>
            </g>
        </svg>
    </div>
    <div class='main'>
        <div class='bubble bubble-1'></div>
        <div class='bubble bubble-2'></div>
        <div class='bubble bubble-3'></div>
        <div class='bubble bubble-4'></div>
        <div class='bubble bubble-5'></div>
        <div class='bubble bubble-6'></div>
        <div class='bubble bubble-7'></div>
        <div class='bubble bubble-8'></div>
        <div class='bubble bubble-9'></div>
        <div class='bubble bubble-10'></div>
        <div class='bubble bubble-11'></div>
        <div class='bubble bubble-12'></div>
        <div class='bubble bubble-13'></div>
        <div class='bubble bubble-14'></div>
        <div class='bubble bubble-15'></div>
        <div class='bubble bubble-16'></div>
        <div class='bubble bubble-17'></div>
        <div class='bubble bubble-18'></div>
        <div class='bubble bubble-19'></div>
        <div class='bubble bubble-20'></div>
        <div class='bubble bubble-21'></div>
        <div class='bubble bubble-22'></div>
        <div class='bubble bubble-23'></div>
        <div class='bubble bubble-24'></div>
        <div class='bubble bubble-25'></div>
        <div class='bubble bubble-26'></div>
        <div class='bubble bubble-27'></div>
        <div class='bubble bubble-28'></div>
        <div class='bubble bubble-29'></div>
        <div class='bubble bubble-30'></div>
    </div>

</div>
@yield('content')
@yield('js')
<script>

</script>
</body>
</html>
