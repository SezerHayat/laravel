<!DOCTYPE html>
<html lang="tr">

<head>
    <title>PKDS Sistemi</title>
    <meta name="description" content="PDKS Sistemi">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Your website">

    <!-- Favicon -->


    <!-- Favicon -->

    <!-- Bootstrap CSS -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- Font Awesome CSS -->
    <link href="../../assets/font-awesome/css/all.css" rel="stylesheet" type="text/css" />

    <!-- Custom CSS -->
    <link href="../../assets/css/style.css" rel="stylesheet" type="text/css" />

    <!-- BEGIN CSS for this page -->
    <link rel="stylesheet" type="text/css" href="../../assets/plugins/chart.js/Chart.min.css" />
    <!-- END CSS for this page -->
</head>

<body class="adminbody">

    <div id="main">


        <!-- End Navigation -->
        @include('./header')

        <!-- Left Sidebar -->
        @include('./sidebar')

        <!-- End Sidebar -->

        @yield('content')
        <!-- END content-page -->

        @include('./footer')


    <!-- END Java Script for this page -->
    @yield('footer')
</body>



</html>