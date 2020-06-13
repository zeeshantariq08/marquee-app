<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Security-Policy" content="default-src 'self' data: gap: https://ssl.gstatic.com 'unsafe-eval'; style-src 'self' 'unsafe-inline'; media-src *; img-src 'self' data: content:;">

        <meta name="format-detection" content="telephone=no">
        <meta name="msapplication-tap-highlight" content="no">
        <meta name="viewport" content="initial-scale=1, width=device-width, viewport-fit=cover">

        {{-- <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" type="text/css" href="css/framework.css"> --}}

        @yield('styles')

        <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

        <title>Book Your Marquee</title>
    </head>
    <body>
        <div id="preloader" class="preloader-light">
            <h1></h1>
            <div id="preload-spinner"></div>
        </div>
        <div id="page-transitions">
            @yield('header')
            <!--header start -->
            
            <!-- end header -->
            
            <div id="page-content" class="page-content">
                <!-- Content Start -->
                    @yield('content')
                <!-- End Content -->
                <!-- footer start-->
                    @yield('footer')
                    <!-- end footer-->
            </div> 
        </div>
        @yield('scripts')

    </body>
</html>

