<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="/assets/img/logo.png" />


    <link href="/css/all.min.css" rel="stylesheet"> <!--load all styles -->
    <script src="/js/all.min.js"></script>
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" defer />
    <script src="{{ mix('/js/app.js') }}" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet" defer>
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" defer>
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet" defer>
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" defer>
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet" defer>
    <link href="assets/vendor/aos/aos.css" rel="stylesheet" defer>
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet"defer >



        <!-- Vendor JS Files -->
        <script src="assets/vendor/jquery/jquery.min.js" defer></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js" defer></script>
        <script src="assets/vendor/jquery.easing/jquery.easing.min.js" defer></script>
        <script src="assets/vendor/waypoints/jquery.waypoints.min.js" defer></script>
        <script src="assets/vendor/counterup/counterup.min.js" defer></script>
        <script src="assets/vendor/venobox/venobox.min.js" defer></script>
        <script src="assets/vendor/owl.carousel/owl.carousel.min.js" defer></script>
        <script src="assets/vendor/aos/aos.js" defer></script>

        <!-- Template Main JS File -->
        <script src="assets/js/main.js"defer></script>

  </head>
  <body class="antialiased">
    @inertia

  </body>
</html>
