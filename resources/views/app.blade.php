<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="/assets/img/Logo.jpeg" />



    <script src="{{ mix('/js/app.js') }}" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet" defer>
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" defer>
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet" defer>

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet"defer >

        <!-- Vendor JS Files -->
        <script src="assets/vendor/jquery/jquery.min.js" defer></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js" defer></script>


        <!-- Template Main JS File -->
        <script src="assets/js/main.js"defer></script>

  </head>
  <body class="antialiased">
    @inertia

  </body>
</html>
