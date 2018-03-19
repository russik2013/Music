<!DOCTYPE HTML>
<html lang="ru-ru">
<head>
    <meta charset="utf-8">
    <title>MiCore Development</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <link href="{{url('css/app-ac34d3ec53(test).css')}}" rel="stylesheet">
    <link href="{{url('css/vendor-e604b36469(test).css')}}" rel="stylesheet">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <!-- build:css({.tmp/serve,src}) styles/vendor.css -->
    <!-- bower:css -->
    <!-- run `gulp inject` to automatically populate bower styles dependencies -->
    <!-- endbower -->
    <!-- endbuild -->

    <!-- build:css({.tmp/serve,src}) styles/app.css -->
    <!-- inject:css -->
    <!-- css files will be automatically insert here -->
    <!-- endinject -->
    <!-- endbuild -->

</head>
<!--NEW ADDED .homepage-->
<body class="homepage">
<!--[if lt IE 10]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<header>
    <div class="mobile_header_search">
        <a href="#" class="search_icon"></a>
        <div class="search_wrapper">
            <input type="text" placeholder="Search...">
        </div>
        <a href="#" class="close_icon mobile_search_toggle"></a>
    </div>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
                <div class="logo">
                    <a href="/"><img src="app/img/logo.png"></a>
                </div>
            </div>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#" class="mobile_search_toggle"></a>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="#">ALBUMS 2018</a></li>
                        <li><a href="#">MP3</a></li>
                        <li><a href="#">CD RIP</a></li>
                        <li><a href="#">HD & VINYL</a></li>
                        <li><a href="#">FLAC & APE</a></li>
                        <li><a href="#">ITUNES</a></li>
                        <li><a href="#">DISCOGRAPHY</a></li>
                        <li><a href="{{url('contact')}}">CONTACT</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <div class="search_wrapper">
                    <input type="text" placeholder="Search...">
                </div>
            </div>
        </div>
    </nav>
</header>

@yield('index')
@yield('contact')
@yield('one')
@yield('music')
@yield('result')

<div class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <p>2018 (c) by command+X</p>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="app/js/slick.js"></script>
<script src="app/js/jquery-ui.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>


<script src="{{url('js/app-414f4a99db.js')}}"></script>
<script src="{{url('js/vendor-f17729a97e.js')}}"></script>

<!-- build:js(src) scripts/vendor.js -->
<!-- bower:js -->
<!-- run `gulp inject` to automatically populate bower script dependencies -->
<!-- endbower -->
<!-- endbuild -->


<!-- build:js({.tmp/serve,.tmp/partials,src}) scripts/app.js -->
<!-- inject:js -->
<!-- js files will be automatically insert here -->
<!-- endinject -->

<!-- inject:partials -->
<!-- angular templates will be automatically converted in js and inserted here -->
<!-- endinject -->
<!-- endbuild -->
</html>