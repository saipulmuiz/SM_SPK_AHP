<?php 
    if(isset($_GET['modul'])) $modul = $_GET['modul'];
    else $modul = "dashboard";

    if($modul == "dashboard") include("./template/dashboard.php");
    elseif($modul == "logout") include("logout.php");

    elseif($modul == "kriteria") include("./template/kriteria.php");
    elseif($modul == "alternatif") include("./template/alternatif.php");
    elseif($modul == "analisa_kriteria") include("./template/analisa_kriteria.php");
    elseif($modul == "analisa_alternatif") include("./template/analisa_alternatif.php");
    elseif($modul == "hasil_kriteria") include("./template/hasil_kriteria.php");
    elseif($modul == "hasil_alternatif") include("./template/hasil_alternatif.php");
    elseif($modul == "hasil_kriteria_akhir") include("./template/hasil_kriteria_akhir.php");
    elseif($modul == "hasil_alternatif_akhir") include("./template/hasil_alternatif_akhir.php");
    elseif($modul == "laporan") include("./template/report.php");

    else echo"<script>alert('Modul Tidak Ditemukan!');
    window.location = 'index.php'</script>";
 ?>