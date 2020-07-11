<?php 
    include "koneksi.php";

    $query1 = mysqli_query($koneksi, "SELECT * FROM tb_nilai");
    $query2 = mysqli_query($koneksi, "SELECT * FROM tb_kriteria");
    $query3 = mysqli_query($koneksi, "SELECT * FROM tb_alternatif");
    $data1 = mysqli_num_rows($query1);
    $data2 = mysqli_num_rows($query2);
    $data3 = mysqli_num_rows($query3);
 ?>
<div id="page-inner">
<!-- /. ROW  -->

    <div class="row">
        <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="board">
                <div class="panel panel-primary">
                <div class="number">
                    <h3>
                        <h3><?= $data1 ?></h3>
                        <small>Nilai Preferensi</small>
                    </h3> 
                </div>
                <div class="icon">
                    <i class="fa fa-eye fa-5x red"></i>
                </div>

                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="board">
                <div class="panel panel-primary">
                <div class="number">
                    <h3>
                        <h3><?= $data2 ?></h3>
                        <small>Kriteria & Bobot</small>
                    </h3> 
                </div>
                <div class="icon">
                    <i class="fa fa-balance-scale fa-5x blue"></i>
                </div>

                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="board">
                <div class="panel panel-primary">
                <div class="number">
                    <h3>
                        <h3><?= $data3 ?></h3>
                        <small>Alternatif</small>
                    </h3> 
                </div>
                <div class="icon">
                    <i class="fa fa-database fa-5x green"></i>
                </div>

                </div>
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h3 class="panel-title">Nilai Preferensi</h3>
                </div>
                <div class="panel-body">
                <ol>
                    <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM tb_nilai");
                        while ($row3 = mysqli_fetch_array($query)) {
                    ?>
                    <li><?php echo $row3['ket_nilai'] ?> (<?php echo $row3['jml_nilai'] ?>)</li>
                    <?php } ?>
                </ol>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h3 class="panel-title">Kriteria & Bobot</h3>
                </div>
                <div class="panel-body">
                <ol>
                    <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM tb_kriteria");
                        while ($row2 = mysqli_fetch_array($query)) {
                    ?>
                    <li><?php echo $row2['nama_kriteria'] ?></li>
                    <?php } ?>
                </ol>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h3 class="panel-title">Skor Alternatif & Hasil</h3>
                </div>
                <div class="panel-body">
                <ol>
                    <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM tb_alternatif");
                        while ($row1 = mysqli_fetch_array($query)) {
                    ?>
                    <li><?php echo $row1['nama_alternatif'] ?></li>
                    <?php } ?>
                </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /. PAGE INNER  -->