<!DOCTYPE html>
<html lang="en">

<head>
    <title>Nura Admin - Dashboard</title>
    <meta name="description" content="Dashboard | Nura Admin">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Your website">

    <!-- Favicon -->
    <link rel="shortcut icon" href="../../assets/images/favicon.ico">

    <!-- Bootstrap CSS -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- Font Awesome CSS -->
    <link href="../../assets/font-awesome/css/all.css" rel="stylesheet" type="text/css" />

    <!-- Custom CSS -->
    <link href="../../assets/css/style.css" rel="stylesheet" type="text/css" />

    <!-- BEGIN CSS for this page -->
    <link rel="stylesheet" type="text/css" href="../../assets/plugins/chart.js/Chart.min.css" />
    <link rel="stylesheet" type="text/css" href="../../assets/plugins/datatables/datatables.min.css" />
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


        <script src="../../assets/js/modernizr.min.js"></script>
        <script src="../../assets/js/jquery.min.js"></script>
        <script src="../../assets/js/moment.min.js"></script>

        <script src="../../assets/js/popper.min.js"></script>
        <script src="../../assets/js/bootstrap.min.js"></script>

        <script src="../../assets/js/detect.js"></script>
        <script src="../../assets/js/fastclick.js"></script>
        <script src="../../assets/js/jquery.blockUI.js"></script>
        <script src="../../assets/js/jquery.nicescroll.js"></script>

        <!-- App js -->
        <script src="../../assets/js/admin.js"></script>

    </div>
    <!-- END main -->

    <!-- BEGIN Java Script for this page -->
    <script src="../../assets/plugins/chart.js/Chart.min.js"></script>
    <script src="../../assets/plugins/datatables/datatables.min.js"></script>

    <!-- Counter-Up-->
    <script src="../../assets/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="../../assets/plugins/counterup/jquery.counterup.min.js"></script>

    <!-- dataTabled data -->
    <script src="../../assets/data/data_datatables.js"></script>

    <!-- Charts data -->
    <script src="../../assets/data/data_charts_dashboard.js"></script>
    <script>
        $(document).on('ready', function() {
            // data-tables
            $('#dataTable').DataTable({
                data: dataSet,
                columns: [{
                    title: "Name"
                }, {
                    title: "Position"
                }, {
                    title: "Office"
                }, {
                    title: "Extn."
                }, {
                    title: "Date"
                }, {
                    title: "Salary"
                }]
            });

            // counter-up
            $('.counter').counterUp({
                delay: 10,
                time: 600
            });
        });
    </script>
    <!-- END Java Script for this page -->
    @yield('footer')
</body>



</html>