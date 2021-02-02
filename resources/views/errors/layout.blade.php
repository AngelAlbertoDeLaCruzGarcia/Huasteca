<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}&nbsp;@yield('title')</title>

        <link rel="shortcut icon" href="/assets/img/Logo.jpeg" />

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="/css/all.min.css" rel="stylesheet"> <!--load all styles -->
        <script src="/js/all.min.js"></script>
        <link href="assets/css/style.css" rel="stylesheet" >
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" >
        <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" >
        <link href="assets/vendor/venobox/venobox.css" rel="stylesheet" >
        <link rel="stylesheet" href="{{ mix('css/app.css') }}"async>


    </head>
    <body>
        <div>
            <!-- ======= Header ======= -->
            <header id="header" style="margin-top: 10px" class="fixed-top">
                <div class="container d-flex">

                    <div class="logo mr-auto">
                        <h1 class="text-light"><a href="/Inicio"><img src="assets/img/Logo.jpeg"/></a></h1>
                        <!-- Uncomment below if you prefer to use an image logo -->
                        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
                    </div>
                    <nav class="nav-menu d-none d-lg-block">
                        <ul>
                            <li class="active"><a href="/Inicio" style="color:black;"><i class="fas fa-home"></i></a></li>
                            <li><a href="/Acerca" style="color:black;">Acerca de</a></li>
                            <li><a href="/Carrito" style="color:black;"><i class="fas fa-shopping-cart"></i></a></li>
                            <li><a href="#" style="color:black;" class="facebook"><i class="bx bxl-facebook"></i></a></li>
                            <li><a href="#" style="color:black;" class="facebook"><i class="fab fa-whatsapp"></i></a></li>

                        </ul>
                    </nav><!-- .nav-menu -->
                </div>
            </header><!-- End Header -->
                    <!-- ======= Hero Section ======= -->
          <section id="hero2" style="padding: 45px 0;">
                <div class="hero-container" data-aos="fade-up">

                </div>
            </section>

        </div>
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:justify-center sm:pt-0">

            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="px-4 text-lg text-gray-500 border-r border-gray-400 tracking-wider">

                    <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        @yield('code')&nbsp;|&nbsp;@yield('message')
                    </h2>

                    <img src="storage/nf/error-404-not-found.jpg" height="50%" width="100%">
                </div>

                <div class="ml-4 text-lg text-gray-500 uppercase tracking-wider">

                </div>

            </div>
        </div>
    </div>



    </body>
</html>
