<!DOCTYPE html>
<!-- 
Template Name: BRILLIANT Bootstrap Admin Template
Version: 4.5.6
Author: WebThemez
Website: http://www.webthemez.com/ 
-->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="" name="description" />
    <meta content="webthemez" name="author" />
    <title>SPK Metode AHP</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome-min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
</head>

<body>
    <div id="wrapper">
        <div class="not_print">
            <nav class="navbar navbar-default top-navbar" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><strong><i class="icon fa fa-plane"></i> SPK AHP</strong></a>

                    <div id="sideNav" href=""><i class="fa fa-bars icon"></i> </div>
                </div>
            </nav>
            <!--/. NAV TOP  -->
            <?php
            function getCrumb()
            {
                $crumbs = explode("/", $_SERVER["REQUEST_URI"]);
                foreach ($crumbs as $crumb) {
                    $crmb = ucfirst(str_replace(array("index.php", "kampus", "spk_ahp3", "?modul=", "_"), array("", " "), $crumb) . ' ');
                }
                return $crmb;
            }
            $page = strtolower(str_replace(' ', '', getCrumb()));
            ?>
            <nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="main-menu">
                        <li>
                            <a <?php if ($page == "") {
                                    echo "class='active-menu'";
                                } ?> href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a>
                        </li>
                        <li>
                            <a <?php if ($page == "kriteria") {
                                    echo "class='active-menu'";
                                } ?> href="?modul=kriteria"><i class="fa fa-balance-scale"></i> Kriteria</a>
                        </li>
                        <li>
                            <a <?php if ($page == "alternatif") {
                                    echo "class='active-menu'";
                                } ?> href="?modul=alternatif"><i class="fa fa-database"></i> Alternatif</a>
                        </li>
                        <li <?php if ($page == "analisakriteria" || $page == "analisaalternatif") {
                                echo "class='active'";
                            } ?>>
                            <a href="#"><i class="fa fa-sitemap"></i> Analisa<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a <?php if ($page == "analisakriteria") {
                                            echo "class='active-menu'";
                                        } ?> href="?modul=analisa_kriteria">Analisa Kriteria</a>
                                </li>
                                <li>
                                    <a <?php if ($page == "analisaalternatif") {
                                            echo "class='active-menu'";
                                        } ?> href="?modul=analisa_alternatif">Analisa Alternatif</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a <?php if ($page == "hasilkriteria") {
                                    echo "class='active-menu'";
                                } ?> href="?modul=hasil_kriteria"><i class="fa fa-qrcode"></i> Hasil Kriteria</a>
                        </li>

                        <li>
                            <a <?php if ($page == "hasilalternatif") {
                                    echo "class='active-menu'";
                                } ?> href="?modul=hasil_alternatif"><i class="fa fa-table"></i> Hasil Alternatif</a>
                        </li>
                        <!-- <li>
                            <a <?php if ($page == "laporan") {
                                    echo "class='active-menu'";
                                } ?> href="?modul=laporan"><i class="fa fa-print"></i> Laporan</a>
                        </li> -->
                    </ul>

                </div>

            </nav>
            <!-- /. NAV SIDE  -->
        </div>

        <div id="page-wrapper">
            <?php
            include "modul.php"
            ?>
            <footer class="text-center">© Saipul Muiz - Cektrend Studio 2020</footer>
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->

    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>

    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>

    <script type="text/javascript" src="assets/js/sweetalert2.all.min.js"></script>

</body>

</html>