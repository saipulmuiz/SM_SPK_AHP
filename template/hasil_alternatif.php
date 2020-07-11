<?php
    // session_start();
    include "koneksi.php";
    error_reporting(E_ALL^(E_NOTICE|E_WARNING));
    $query1 = mysqli_query($koneksi, "SELECT * FROM tb_perb_alternatif where id_alternatif='A01'");
    $query2 = mysqli_query($koneksi, "SELECT * FROM tb_perb_alternatif where id_alternatif='A02'");
    $query3 = mysqli_query($koneksi, "SELECT * FROM tb_perb_alternatif where id_alternatif='A03'");
    $query4 = mysqli_query($koneksi, "SELECT * FROM tb_perb_alternatif where id_alternatif='A04'");
    $query5 = mysqli_query($koneksi, "SELECT * FROM tb_perb_alternatif where id_alternatif='A05'");
    $b1 = mysqli_fetch_array($query1);
    $b2 = mysqli_fetch_array($query2);
    $b3 = mysqli_fetch_array($query3);
    $b4 = mysqli_fetch_array($query4);
    $b5 = mysqli_fetch_array($query5);
    $kriteria1 = mysqli_query($koneksi, "SELECT * FROM tb_perb_kriteria where id_kriteria='B01'");
    $kriteria2 = mysqli_query($koneksi, "SELECT * FROM tb_perb_kriteria where id_kriteria='B02'");
    $kriteria3 = mysqli_query($koneksi, "SELECT * FROM tb_perb_kriteria where id_kriteria='B03'");
    $kriteria4 = mysqli_query($koneksi, "SELECT * FROM tb_perb_kriteria where id_kriteria='B04'");
    $k1 = mysqli_fetch_array($kriteria1);
    $k2 = mysqli_fetch_array($kriteria2);
    $k3 = mysqli_fetch_array($kriteria3);
    $k4 = mysqli_fetch_array($kriteria4);
    ?>
<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <!--   Kitchen Sink -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tabel Perhitungan Hasil Alternatif
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <form action="?modul=hasil_alternatif_akhir" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <!--   Kitchen Sink -->
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Hitung Alternatif <?= $k1["kriteria1"] ?>
                                        </div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr align="center">
                                                            <th>Alt</th>
                                                            <td><?php echo $b1['alternatif1']; ?></td>
                                                            <td><?php echo $b2['alternatif1']; ?></td>
                                                            <td><?php echo $b3['alternatif1']; ?></td>
                                                            <td><?php echo $b4['alternatif1']; ?></td>
                                                            <td><?php echo $b5['alternatif1']; ?></td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr align="center">
                                                        <td><?php echo $b1['alternatif1']; ?></td>
                                                        <td><?php echo $b1['nb_db']; ?></td>
                                                        <td>
                                                            <select class="form-control" name="nb1">
                                                            <option></option>
                                                            <option value="1">1. Sama penting dengan</option>
                                                            <option value="2">2. Mendekati sedikit lebih penting dari</option>
                                                            <option value="3">3. Sedikit lebih penting dari</option>
                                                            <option value="4">4. Mendekati lebih penting dari</option>
                                                            <option value="5">5. Lebih penting dari</option>
                                                            <option value="6">6. Mendekati sangat penting dari</option>
                                                            <option value="7">7. Sangat penting dari</option>
                                                            <option value="8">8. Mendekati mutlak dari</option>
                                                            <option value="9">9. Mutlak sangat penting dari</option>
                                                        </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="nb2">
                                                            <option></option>
                                                            <option value="1">1. Sama penting dengan</option>
                                                            <option value="2">2. Mendekati sedikit lebih penting dari</option>
                                                            <option value="3">3. Sedikit lebih penting dari</option>
                                                            <option value="4">4. Mendekati lebih penting dari</option>
                                                            <option value="5">5. Lebih penting dari</option>
                                                            <option value="6">6. Mendekati sangat penting dari</option>
                                                            <option value="7">7. Sangat penting dari</option>
                                                            <option value="8">8. Mendekati mutlak dari</option>
                                                            <option value="9">9. Mutlak sangat penting dari</option>
                                                        </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="nb3">
                                                            <option></option>
                                                            <option value="1">1. Sama penting dengan</option>
                                                            <option value="2">2. Mendekati sedikit lebih penting dari</option>
                                                            <option value="3">3. Sedikit lebih penting dari</option>
                                                            <option value="4">4. Mendekati lebih penting dari</option>
                                                            <option value="5">5. Lebih penting dari</option>
                                                            <option value="6">6. Mendekati sangat penting dari</option>
                                                            <option value="7">7. Sangat penting dari</option>
                                                            <option value="8">8. Mendekati mutlak dari</option>
                                                            <option value="9">9. Mutlak sangat penting dari</option>
                                                        </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="nb4">
                                                            <option></option>
                                                            <option value="1">1. Sama penting dengan</option>
                                                            <option value="2">2. Mendekati sedikit lebih penting dari</option>
                                                            <option value="3">3. Sedikit lebih penting dari</option>
                                                            <option value="4">4. Mendekati lebih penting dari</option>
                                                            <option value="5">5. Lebih penting dari</option>
                                                            <option value="6">6. Mendekati sangat penting dari</option>
                                                            <option value="7">7. Sangat penting dari</option>
                                                            <option value="8">8. Mendekati mutlak dari</option>
                                                            <option value="9">9. Mutlak sangat penting dari</option>
                                                        </select>
                                                        </td>
                                                        </tr>
                                                        <tr align="center">
                                                        <td><?php echo $b2['alternatif1']; ?></td>
                                                        <td><font color="red">0</font></td>
                                                        <td><?php echo $b2['nb_db']; ?></td>
                                                        <td>
                                                            <select class="form-control" name="nb5">
                                                            <option></option>
                                                            <option value="1">1. Sama penting dengan</option>
                                                            <option value="2">2. Mendekati sedikit lebih penting dari</option>
                                                            <option value="3">3. Sedikit lebih penting dari</option>
                                                            <option value="4">4. Mendekati lebih penting dari</option>
                                                            <option value="5">5. Lebih penting dari</option>
                                                            <option value="6">6. Mendekati sangat penting dari</option>
                                                            <option value="7">7. Sangat penting dari</option>
                                                            <option value="8">8. Mendekati mutlak dari</option>
                                                            <option value="9">9. Mutlak sangat penting dari</option>
                                                        </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="nb6">
                                                            <option></option>
                                                            <option value="1">1. Sama penting dengan</option>
                                                            <option value="2">2. Mendekati sedikit lebih penting dari</option>
                                                            <option value="3">3. Sedikit lebih penting dari</option>
                                                            <option value="4">4. Mendekati lebih penting dari</option>
                                                            <option value="5">5. Lebih penting dari</option>
                                                            <option value="6">6. Mendekati sangat penting dari</option>
                                                            <option value="7">7. Sangat penting dari</option>
                                                            <option value="8">8. Mendekati mutlak dari</option>
                                                            <option value="9">9. Mutlak sangat penting dari</option>
                                                        </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="nb7">
                                                            <option></option>
                                                            <option value="1">1. Sama penting dengan</option>
                                                            <option value="2">2. Mendekati sedikit lebih penting dari</option>
                                                            <option value="3">3. Sedikit lebih penting dari</option>
                                                            <option value="4">4. Mendekati lebih penting dari</option>
                                                            <option value="5">5. Lebih penting dari</option>
                                                            <option value="6">6. Mendekati sangat penting dari</option>
                                                            <option value="7">7. Sangat penting dari</option>
                                                            <option value="8">8. Mendekati mutlak dari</option>
                                                            <option value="9">9. Mutlak sangat penting dari</option>
                                                        </select>
                                                        </td>
                                                        </tr>
                                                        <tr align="center">
                                                        <td><?php echo $b3['alternatif1']; ?></td>
                                                        <td><font color="red">0</font></td>
                                                        <td><font color="red">0</font></td>
                                                        <td><?php echo $b3['nb_db']; ?></td>
                                                        <td>
                                                            <select class="form-control" name="nb8">
                                                            <option></option>
                                                            <option value="1">1. Sama penting dengan</option>
                                                            <option value="2">2. Mendekati sedikit lebih penting dari</option>
                                                            <option value="3">3. Sedikit lebih penting dari</option>
                                                            <option value="4">4. Mendekati lebih penting dari</option>
                                                            <option value="5">5. Lebih penting dari</option>
                                                            <option value="6">6. Mendekati sangat penting dari</option>
                                                            <option value="7">7. Sangat penting dari</option>
                                                            <option value="8">8. Mendekati mutlak dari</option>
                                                            <option value="9">9. Mutlak sangat penting dari</option>
                                                        </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="nb9">
                                                            <option></option>
                                                            <option value="1">1. Sama penting dengan</option>
                                                            <option value="2">2. Mendekati sedikit lebih penting dari</option>
                                                            <option value="3">3. Sedikit lebih penting dari</option>
                                                            <option value="4">4. Mendekati lebih penting dari</option>
                                                            <option value="5">5. Lebih penting dari</option>
                                                            <option value="6">6. Mendekati sangat penting dari</option>
                                                            <option value="7">7. Sangat penting dari</option>
                                                            <option value="8">8. Mendekati mutlak dari</option>
                                                            <option value="9">9. Mutlak sangat penting dari</option>
                                                        </select>
                                                        </td>
                                                        </tr>
                                                        <tr align="center">
                                                        <td><?php echo $b4['alternatif1']; ?></td>
                                                        <td><font color="red">0</font></td>
                                                        <td><font color="red">0</font></td>
                                                        <td><font color="red">0</font></td>
                                                        <td><?php echo $b3['nb_db']; ?></td>
                                                        <td>
                                                            <select class="form-control" name="nb10">
                                                            <option></option>
                                                            <option value="1">1. Sama penting dengan</option>
                                                            <option value="2">2. Mendekati sedikit lebih penting dari</option>
                                                            <option value="3">3. Sedikit lebih penting dari</option>
                                                            <option value="4">4. Mendekati lebih penting dari</option>
                                                            <option value="5">5. Lebih penting dari</option>
                                                            <option value="6">6. Mendekati sangat penting dari</option>
                                                            <option value="7">7. Sangat penting dari</option>
                                                            <option value="8">8. Mendekati mutlak dari</option>
                                                            <option value="9">9. Mutlak sangat penting dari</option>
                                                        </select>
                                                        </td>
                                                        </tr>
                                                        <tr align="center">
                                                        <td><?php echo $b5['alternatif1']; ?></td>
                                                        <td><font color="red">0</font></td>
                                                        <td><font color="red">0</font></td>
                                                        <td><font color="red">0</font></td>
                                                        <td><font color="red">0</font></td>
                                                        <td><?php echo $b3['nb_db']; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End  Kitchen Sink -->
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <!--   Kitchen Sink -->
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Hitung Alternatif <?= $k2["kriteria1"] ?>
                                        </div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr align="center">
                                                            <th scope="col">Alt</th>
                                                            <td scope="col"><?php echo $b1['alternatif1']; ?></td>
                                                            <td scope="col"><?php echo $b2['alternatif1']; ?></td>
                                                            <td scope="col"><?php echo $b3['alternatif1']; ?></td>
                                                            <td scope="col"><?php echo $b4['alternatif1']; ?></td>
                                                            <td scope="col"><?php echo $b5['alternatif1']; ?></td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr align="center">
                                                        <td><?php echo $b1['alternatif1']; ?></td>
                                                        <td><?php echo $b1['nb_db']; ?></td>
                                                        <td>
                                                            <select class="form-control" name="nb11">
                                                            <option></option>
                                                            <option value="1">1. Sama penting dengan</option>
                                                            <option value="2">2. Mendekati sedikit lebih penting dari</option>
                                                            <option value="3">3. Sedikit lebih penting dari</option>
                                                            <option value="4">4. Mendekati lebih penting dari</option>
                                                            <option value="5">5. Lebih penting dari</option>
                                                            <option value="6">6. Mendekati sangat penting dari</option>
                                                            <option value="7">7. Sangat penting dari</option>
                                                            <option value="8">8. Mendekati mutlak dari</option>
                                                            <option value="9">9. Mutlak sangat penting dari</option>
                                                        </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="nb12">
                                                            <option></option>
                                                            <option value="1">1. Sama penting dengan</option>
                                                            <option value="2">2. Mendekati sedikit lebih penting dari</option>
                                                            <option value="3">3. Sedikit lebih penting dari</option>
                                                            <option value="4">4. Mendekati lebih penting dari</option>
                                                            <option value="5">5. Lebih penting dari</option>
                                                            <option value="6">6. Mendekati sangat penting dari</option>
                                                            <option value="7">7. Sangat penting dari</option>
                                                            <option value="8">8. Mendekati mutlak dari</option>
                                                            <option value="9">9. Mutlak sangat penting dari</option>
                                                        </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="nb13">
                                                            <option></option>
                                                            <option value="1">1. Sama penting dengan</option>
                                                            <option value="2">2. Mendekati sedikit lebih penting dari</option>
                                                            <option value="3">3. Sedikit lebih penting dari</option>
                                                            <option value="4">4. Mendekati lebih penting dari</option>
                                                            <option value="5">5. Lebih penting dari</option>
                                                            <option value="6">6. Mendekati sangat penting dari</option>
                                                            <option value="7">7. Sangat penting dari</option>
                                                            <option value="8">8. Mendekati mutlak dari</option>
                                                            <option value="9">9. Mutlak sangat penting dari</option>
                                                        </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="nb14">
                                                            <option></option>
                                                            <option value="1">1. Sama penting dengan</option>
                                                            <option value="2">2. Mendekati sedikit lebih penting dari</option>
                                                            <option value="3">3. Sedikit lebih penting dari</option>
                                                            <option value="4">4. Mendekati lebih penting dari</option>
                                                            <option value="5">5. Lebih penting dari</option>
                                                            <option value="6">6. Mendekati sangat penting dari</option>
                                                            <option value="7">7. Sangat penting dari</option>
                                                            <option value="8">8. Mendekati mutlak dari</option>
                                                            <option value="9">9. Mutlak sangat penting dari</option>
                                                        </select>
                                                        </td>
                                                        </tr>
                                                        <tr align="center">
                                                        <td><?php echo $b2['alternatif1']; ?></td>
                                                        <td><font color="red">0</font></td>
                                                        <td><?php echo $b2['nb_db']; ?></td>
                                                        <td>
                                                            <select class="form-control" name="nb15">
                                                            <option></option>
                                                            <option value="1">1. Sama penting dengan</option>
                                                            <option value="2">2. Mendekati sedikit lebih penting dari</option>
                                                            <option value="3">3. Sedikit lebih penting dari</option>
                                                            <option value="4">4. Mendekati lebih penting dari</option>
                                                            <option value="5">5. Lebih penting dari</option>
                                                            <option value="6">6. Mendekati sangat penting dari</option>
                                                            <option value="7">7. Sangat penting dari</option>
                                                            <option value="8">8. Mendekati mutlak dari</option>
                                                            <option value="9">9. Mutlak sangat penting dari</option>
                                                        </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="nb16">
                                                            <option></option>
                                                            <option value="1">1. Sama penting dengan</option>
                                                            <option value="2">2. Mendekati sedikit lebih penting dari</option>
                                                            <option value="3">3. Sedikit lebih penting dari</option>
                                                            <option value="4">4. Mendekati lebih penting dari</option>
                                                            <option value="5">5. Lebih penting dari</option>
                                                            <option value="6">6. Mendekati sangat penting dari</option>
                                                            <option value="7">7. Sangat penting dari</option>
                                                            <option value="8">8. Mendekati mutlak dari</option>
                                                            <option value="9">9. Mutlak sangat penting dari</option>
                                                        </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="nb17">
                                                            <option></option>
                                                            <option value="1">1. Sama penting dengan</option>
                                                            <option value="2">2. Mendekati sedikit lebih penting dari</option>
                                                            <option value="3">3. Sedikit lebih penting dari</option>
                                                            <option value="4">4. Mendekati lebih penting dari</option>
                                                            <option value="5">5. Lebih penting dari</option>
                                                            <option value="6">6. Mendekati sangat penting dari</option>
                                                            <option value="7">7. Sangat penting dari</option>
                                                            <option value="8">8. Mendekati mutlak dari</option>
                                                            <option value="9">9. Mutlak sangat penting dari</option>
                                                        </select>
                                                        </td>
                                                        </tr>
                                                        <tr align="center">
                                                        <td><?php echo $b3['alternatif1']; ?></td>
                                                        <td><font color="red">0</font></td>
                                                        <td><font color="red">0</font></td>
                                                        <td><?php echo $b3['nb_db']; ?></td>
                                                        <td>
                                                            <select class="form-control" name="nb18">
                                                            <option></option>
                                                            <option value="1">1. Sama penting dengan</option>
                                                            <option value="2">2. Mendekati sedikit lebih penting dari</option>
                                                            <option value="3">3. Sedikit lebih penting dari</option>
                                                            <option value="4">4. Mendekati lebih penting dari</option>
                                                            <option value="5">5. Lebih penting dari</option>
                                                            <option value="6">6. Mendekati sangat penting dari</option>
                                                            <option value="7">7. Sangat penting dari</option>
                                                            <option value="8">8. Mendekati mutlak dari</option>
                                                            <option value="9">9. Mutlak sangat penting dari</option>
                                                        </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="nb19">
                                                            <option></option>
                                                            <option value="1">1. Sama penting dengan</option>
                                                            <option value="2">2. Mendekati sedikit lebih penting dari</option>
                                                            <option value="3">3. Sedikit lebih penting dari</option>
                                                            <option value="4">4. Mendekati lebih penting dari</option>
                                                            <option value="5">5. Lebih penting dari</option>
                                                            <option value="6">6. Mendekati sangat penting dari</option>
                                                            <option value="7">7. Sangat penting dari</option>
                                                            <option value="8">8. Mendekati mutlak dari</option>
                                                            <option value="9">9. Mutlak sangat penting dari</option>
                                                        </select>
                                                        </td>
                                                        </tr>
                                                        <tr align="center">
                                                        <td><?php echo $b4['alternatif1']; ?></td>
                                                        <td><font color="red">0</font></td>
                                                        <td><font color="red">0</font></td>
                                                        <td><font color="red">0</font></td>
                                                        <td><?php echo $b3['nb_db']; ?></td>
                                                        <td>
                                                            <select class="form-control" name="nb20">
                                                            <option></option>
                                                            <option value="1">1. Sama penting dengan</option>
                                                            <option value="2">2. Mendekati sedikit lebih penting dari</option>
                                                            <option value="3">3. Sedikit lebih penting dari</option>
                                                            <option value="4">4. Mendekati lebih penting dari</option>
                                                            <option value="5">5. Lebih penting dari</option>
                                                            <option value="6">6. Mendekati sangat penting dari</option>
                                                            <option value="7">7. Sangat penting dari</option>
                                                            <option value="8">8. Mendekati mutlak dari</option>
                                                            <option value="9">9. Mutlak sangat penting dari</option>
                                                        </select>
                                                        </td>
                                                        </tr>
                                                        <tr align="center">
                                                        <td><?php echo $b5['alternatif1']; ?></td>
                                                        <td><font color="red">0</font></td>
                                                        <td><font color="red">0</font></td>
                                                        <td><font color="red">0</font></td>
                                                        <td><font color="red">0</font></td>
                                                        <td><?php echo $b3['nb_db']; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End  Kitchen Sink -->
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <!--   Kitchen Sink -->
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Hitung Alternatif <?= $k3["kriteria1"] ?>
                                        </div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr align="center">
                                                            <th scope="col">Alt</th>
                                                            <td scope="col"><?php echo $b1['alternatif1']; ?></td>
                                                            <td scope="col"><?php echo $b2['alternatif1']; ?></td>
                                                            <td scope="col"><?php echo $b3['alternatif1']; ?></td>
                                                            <td scope="col"><?php echo $b4['alternatif1']; ?></td>
                                                            <td scope="col"><?php echo $b5['alternatif1']; ?></td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr align="center">
                                                        <td><?php echo $b1['alternatif1']; ?></td>
                                                        <td><?php echo $b1['nb_db']; ?></td>
                                                        <td>
                                                            <select class="form-control" name="nb21">
                                                            <option></option>
                                                            <option value="1">1. Sama penting dengan</option>
                                                            <option value="2">2. Mendekati sedikit lebih penting dari</option>
                                                            <option value="3">3. Sedikit lebih penting dari</option>
                                                            <option value="4">4. Mendekati lebih penting dari</option>
                                                            <option value="5">5. Lebih penting dari</option>
                                                            <option value="6">6. Mendekati sangat penting dari</option>
                                                            <option value="7">7. Sangat penting dari</option>
                                                            <option value="8">8. Mendekati mutlak dari</option>
                                                            <option value="9">9. Mutlak sangat penting dari</option>
                                                        </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="nb22">
                                                            <option></option>
                                                            <option value="1">1. Sama penting dengan</option>
                                                            <option value="2">2. Mendekati sedikit lebih penting dari</option>
                                                            <option value="3">3. Sedikit lebih penting dari</option>
                                                            <option value="4">4. Mendekati lebih penting dari</option>
                                                            <option value="5">5. Lebih penting dari</option>
                                                            <option value="6">6. Mendekati sangat penting dari</option>
                                                            <option value="7">7. Sangat penting dari</option>
                                                            <option value="8">8. Mendekati mutlak dari</option>
                                                            <option value="9">9. Mutlak sangat penting dari</option>
                                                        </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="nb23">
                                                            <option></option>
                                                            <option value="1">1. Sama penting dengan</option>
                                                            <option value="2">2. Mendekati sedikit lebih penting dari</option>
                                                            <option value="3">3. Sedikit lebih penting dari</option>
                                                            <option value="4">4. Mendekati lebih penting dari</option>
                                                            <option value="5">5. Lebih penting dari</option>
                                                            <option value="6">6. Mendekati sangat penting dari</option>
                                                            <option value="7">7. Sangat penting dari</option>
                                                            <option value="8">8. Mendekati mutlak dari</option>
                                                            <option value="9">9. Mutlak sangat penting dari</option>
                                                        </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="nb24">
                                                            <option></option>
                                                            <option value="1">1. Sama penting dengan</option>
                                                            <option value="2">2. Mendekati sedikit lebih penting dari</option>
                                                            <option value="3">3. Sedikit lebih penting dari</option>
                                                            <option value="4">4. Mendekati lebih penting dari</option>
                                                            <option value="5">5. Lebih penting dari</option>
                                                            <option value="6">6. Mendekati sangat penting dari</option>
                                                            <option value="7">7. Sangat penting dari</option>
                                                            <option value="8">8. Mendekati mutlak dari</option>
                                                            <option value="9">9. Mutlak sangat penting dari</option>
                                                        </select>
                                                        </td>
                                                        </tr>
                                                        <tr align="center">
                                                        <td><?php echo $b2['alternatif1']; ?></td>
                                                        <td><font color="red">0</font></td>
                                                        <td><?php echo $b2['nb_db']; ?></td>
                                                        <td>
                                                            <select class="form-control" name="nb25">
                                                            <option></option>
                                                            <option value="1">1. Sama penting dengan</option>
                                                            <option value="2">2. Mendekati sedikit lebih penting dari</option>
                                                            <option value="3">3. Sedikit lebih penting dari</option>
                                                            <option value="4">4. Mendekati lebih penting dari</option>
                                                            <option value="5">5. Lebih penting dari</option>
                                                            <option value="6">6. Mendekati sangat penting dari</option>
                                                            <option value="7">7. Sangat penting dari</option>
                                                            <option value="8">8. Mendekati mutlak dari</option>
                                                            <option value="9">9. Mutlak sangat penting dari</option>
                                                        </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="nb26">
                                                            <option></option>
                                                            <option value="1">1. Sama penting dengan</option>
                                                            <option value="2">2. Mendekati sedikit lebih penting dari</option>
                                                            <option value="3">3. Sedikit lebih penting dari</option>
                                                            <option value="4">4. Mendekati lebih penting dari</option>
                                                            <option value="5">5. Lebih penting dari</option>
                                                            <option value="6">6. Mendekati sangat penting dari</option>
                                                            <option value="7">7. Sangat penting dari</option>
                                                            <option value="8">8. Mendekati mutlak dari</option>
                                                            <option value="9">9. Mutlak sangat penting dari</option>
                                                        </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="nb27">
                                                            <option></option>
                                                            <option value="1">1. Sama penting dengan</option>
                                                            <option value="2">2. Mendekati sedikit lebih penting dari</option>
                                                            <option value="3">3. Sedikit lebih penting dari</option>
                                                            <option value="4">4. Mendekati lebih penting dari</option>
                                                            <option value="5">5. Lebih penting dari</option>
                                                            <option value="6">6. Mendekati sangat penting dari</option>
                                                            <option value="7">7. Sangat penting dari</option>
                                                            <option value="8">8. Mendekati mutlak dari</option>
                                                            <option value="9">9. Mutlak sangat penting dari</option>
                                                        </select>
                                                        </td>
                                                        </tr>
                                                        <tr align="center">
                                                        <td><?php echo $b3['alternatif1']; ?></td>
                                                        <td><font color="red">0</font></td>
                                                        <td><font color="red">0</font></td>
                                                        <td><?php echo $b3['nb_db']; ?></td>
                                                        <td>
                                                            <select class="form-control" name="nb28">
                                                            <option></option>
                                                            <option value="1">1. Sama penting dengan</option>
                                                            <option value="2">2. Mendekati sedikit lebih penting dari</option>
                                                            <option value="3">3. Sedikit lebih penting dari</option>
                                                            <option value="4">4. Mendekati lebih penting dari</option>
                                                            <option value="5">5. Lebih penting dari</option>
                                                            <option value="6">6. Mendekati sangat penting dari</option>
                                                            <option value="7">7. Sangat penting dari</option>
                                                            <option value="8">8. Mendekati mutlak dari</option>
                                                            <option value="9">9. Mutlak sangat penting dari</option>
                                                        </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="nb29">
                                                            <option></option>
                                                            <option value="1">1. Sama penting dengan</option>
                                                            <option value="2">2. Mendekati sedikit lebih penting dari</option>
                                                            <option value="3">3. Sedikit lebih penting dari</option>
                                                            <option value="4">4. Mendekati lebih penting dari</option>
                                                            <option value="5">5. Lebih penting dari</option>
                                                            <option value="6">6. Mendekati sangat penting dari</option>
                                                            <option value="7">7. Sangat penting dari</option>
                                                            <option value="8">8. Mendekati mutlak dari</option>
                                                            <option value="9">9. Mutlak sangat penting dari</option>
                                                        </select>
                                                        </td>
                                                        </tr>
                                                        <tr align="center">
                                                        <td><?php echo $b4['alternatif1']; ?></td>
                                                        <td><font color="red">0</font></td>
                                                        <td><font color="red">0</font></td>
                                                        <td><font color="red">0</font></td>
                                                        <td><?php echo $b3['nb_db']; ?></td>
                                                        <td>
                                                            <select class="form-control" name="nb30">
                                                            <option></option>
                                                            <option value="1">1. Sama penting dengan</option>
                                                            <option value="2">2. Mendekati sedikit lebih penting dari</option>
                                                            <option value="3">3. Sedikit lebih penting dari</option>
                                                            <option value="4">4. Mendekati lebih penting dari</option>
                                                            <option value="5">5. Lebih penting dari</option>
                                                            <option value="6">6. Mendekati sangat penting dari</option>
                                                            <option value="7">7. Sangat penting dari</option>
                                                            <option value="8">8. Mendekati mutlak dari</option>
                                                            <option value="9">9. Mutlak sangat penting dari</option>
                                                        </select>
                                                        </td>
                                                        </tr>
                                                        <tr align="center">
                                                        <td><?php echo $b5['alternatif1']; ?></td>
                                                        <td><font color="red">0</font></td>
                                                        <td><font color="red">0</font></td>
                                                        <td><font color="red">0</font></td>
                                                        <td><font color="red">0</font></td>
                                                        <td><?php echo $b3['nb_db']; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End  Kitchen Sink -->
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <!--   Kitchen Sink -->
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Hitung Alternatif <?= $k4["kriteria1"] ?>
                                        </div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr align="center">
                                                            <th scope="col">Alt</th>
                                                            <td scope="col"><?php echo $b1['alternatif1']; ?></td>
                                                            <td scope="col"><?php echo $b2['alternatif1']; ?></td>
                                                            <td scope="col"><?php echo $b3['alternatif1']; ?></td>
                                                            <td scope="col"><?php echo $b4['alternatif1']; ?></td>
                                                            <td scope="col"><?php echo $b5['alternatif1']; ?></td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr align="center">
                                                        <td><?php echo $b1['alternatif1']; ?></td>
                                                        <td><?php echo $b1['nb_db']; ?></td>
                                                        <td>
                                                            <select class="form-control" name="nb31" required>
                                                            <option></option>
                                                            <option value="1">1. Sama penting dengan</option>
                                                            <option value="2">2. Mendekati sedikit lebih penting dari</option>
                                                            <option value="3">3. Sedikit lebih penting dari</option>
                                                            <option value="4">4. Mendekati lebih penting dari</option>
                                                            <option value="5">5. Lebih penting dari</option>
                                                            <option value="6">6. Mendekati sangat penting dari</option>
                                                            <option value="7">7. Sangat penting dari</option>
                                                            <option value="8">8. Mendekati mutlak dari</option>
                                                            <option value="9">9. Mutlak sangat penting dari</option>
                                                        </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="nb32">
                                                            <option></option>
                                                            <option value="1">1. Sama penting dengan</option>
                                                            <option value="2">2. Mendekati sedikit lebih penting dari</option>
                                                            <option value="3">3. Sedikit lebih penting dari</option>
                                                            <option value="4">4. Mendekati lebih penting dari</option>
                                                            <option value="5">5. Lebih penting dari</option>
                                                            <option value="6">6. Mendekati sangat penting dari</option>
                                                            <option value="7">7. Sangat penting dari</option>
                                                            <option value="8">8. Mendekati mutlak dari</option>
                                                            <option value="9">9. Mutlak sangat penting dari</option>
                                                        </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="nb33">
                                                            <option></option>
                                                            <option value="1">1. Sama penting dengan</option>
                                                            <option value="2">2. Mendekati sedikit lebih penting dari</option>
                                                            <option value="3">3. Sedikit lebih penting dari</option>
                                                            <option value="4">4. Mendekati lebih penting dari</option>
                                                            <option value="5">5. Lebih penting dari</option>
                                                            <option value="6">6. Mendekati sangat penting dari</option>
                                                            <option value="7">7. Sangat penting dari</option>
                                                            <option value="8">8. Mendekati mutlak dari</option>
                                                            <option value="9">9. Mutlak sangat penting dari</option>
                                                        </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="nb34">
                                                            <option></option>
                                                            <option value="1">1. Sama penting dengan</option>
                                                            <option value="2">2. Mendekati sedikit lebih penting dari</option>
                                                            <option value="3">3. Sedikit lebih penting dari</option>
                                                            <option value="4">4. Mendekati lebih penting dari</option>
                                                            <option value="5">5. Lebih penting dari</option>
                                                            <option value="6">6. Mendekati sangat penting dari</option>
                                                            <option value="7">7. Sangat penting dari</option>
                                                            <option value="8">8. Mendekati mutlak dari</option>
                                                            <option value="9">9. Mutlak sangat penting dari</option>
                                                        </select>
                                                        </td>
                                                        </tr>
                                                        <tr align="center">
                                                        <td><?php echo $b2['alternatif1']; ?></td>
                                                        <td><font color="red">0</font></td>
                                                        <td><?php echo $b2['nb_db']; ?></td>
                                                        <td>
                                                            <select class="form-control" name="nb35">
                                                            <option></option>
                                                            <option value="1">1. Sama penting dengan</option>
                                                            <option value="2">2. Mendekati sedikit lebih penting dari</option>
                                                            <option value="3">3. Sedikit lebih penting dari</option>
                                                            <option value="4">4. Mendekati lebih penting dari</option>
                                                            <option value="5">5. Lebih penting dari</option>
                                                            <option value="6">6. Mendekati sangat penting dari</option>
                                                            <option value="7">7. Sangat penting dari</option>
                                                            <option value="8">8. Mendekati mutlak dari</option>
                                                            <option value="9">9. Mutlak sangat penting dari</option>
                                                        </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="nb36">
                                                            <option></option>
                                                            <option value="1">1. Sama penting dengan</option>
                                                            <option value="2">2. Mendekati sedikit lebih penting dari</option>
                                                            <option value="3">3. Sedikit lebih penting dari</option>
                                                            <option value="4">4. Mendekati lebih penting dari</option>
                                                            <option value="5">5. Lebih penting dari</option>
                                                            <option value="6">6. Mendekati sangat penting dari</option>
                                                            <option value="7">7. Sangat penting dari</option>
                                                            <option value="8">8. Mendekati mutlak dari</option>
                                                            <option value="9">9. Mutlak sangat penting dari</option>
                                                        </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="nb37">
                                                            <option></option>
                                                            <option value="1">1. Sama penting dengan</option>
                                                            <option value="2">2. Mendekati sedikit lebih penting dari</option>
                                                            <option value="3">3. Sedikit lebih penting dari</option>
                                                            <option value="4">4. Mendekati lebih penting dari</option>
                                                            <option value="5">5. Lebih penting dari</option>
                                                            <option value="6">6. Mendekati sangat penting dari</option>
                                                            <option value="7">7. Sangat penting dari</option>
                                                            <option value="8">8. Mendekati mutlak dari</option>
                                                            <option value="9">9. Mutlak sangat penting dari</option>
                                                        </select>
                                                        </td>
                                                        </tr>
                                                        <tr align="center">
                                                        <td><?php echo $b3['alternatif1']; ?></td>
                                                        <td><font color="red">0</font></td>
                                                        <td><font color="red">0</font></td>
                                                        <td><?php echo $b3['nb_db']; ?></td>
                                                        <td>
                                                            <select class="form-control" name="nb38">
                                                            <option></option>
                                                            <option value="1">1. Sama penting dengan</option>
                                                            <option value="2">2. Mendekati sedikit lebih penting dari</option>
                                                            <option value="3">3. Sedikit lebih penting dari</option>
                                                            <option value="4">4. Mendekati lebih penting dari</option>
                                                            <option value="5">5. Lebih penting dari</option>
                                                            <option value="6">6. Mendekati sangat penting dari</option>
                                                            <option value="7">7. Sangat penting dari</option>
                                                            <option value="8">8. Mendekati mutlak dari</option>
                                                            <option value="9">9. Mutlak sangat penting dari</option>
                                                        </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="nb39">
                                                            <option></option>
                                                            <option value="1">1. Sama penting dengan</option>
                                                            <option value="2">2. Mendekati sedikit lebih penting dari</option>
                                                            <option value="3">3. Sedikit lebih penting dari</option>
                                                            <option value="4">4. Mendekati lebih penting dari</option>
                                                            <option value="5">5. Lebih penting dari</option>
                                                            <option value="6">6. Mendekati sangat penting dari</option>
                                                            <option value="7">7. Sangat penting dari</option>
                                                            <option value="8">8. Mendekati mutlak dari</option>
                                                            <option value="9">9. Mutlak sangat penting dari</option>
                                                        </select>
                                                        </td>
                                                        </tr>
                                                        <tr align="center">
                                                        <td><?php echo $b4['alternatif1']; ?></td>
                                                        <td><font color="red">0</font></td>
                                                        <td><font color="red">0</font></td>
                                                        <td><font color="red">0</font></td>
                                                        <td><?php echo $b3['nb_db']; ?></td>
                                                        <td>
                                                            <select class="form-control" name="nb40">
                                                            <option></option>
                                                            <option value="1">1. Sama penting dengan</option>
                                                            <option value="2">2. Mendekati sedikit lebih penting dari</option>
                                                            <option value="3">3. Sedikit lebih penting dari</option>
                                                            <option value="4">4. Mendekati lebih penting dari</option>
                                                            <option value="5">5. Lebih penting dari</option>
                                                            <option value="6">6. Mendekati sangat penting dari</option>
                                                            <option value="7">7. Sangat penting dari</option>
                                                            <option value="8">8. Mendekati mutlak dari</option>
                                                            <option value="9">9. Mutlak sangat penting dari</option>
                                                        </select>
                                                        </td>
                                                        </tr>
                                                        <tr align="center">
                                                        <td><?php echo $b5['alternatif1']; ?></td>
                                                        <td><font color="red">0</font></td>
                                                        <td><font color="red">0</font></td>
                                                        <td><font color="red">0</font></td>
                                                        <td><font color="red">0</font></td>
                                                        <td><?php echo $b3['nb_db']; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End  Kitchen Sink -->
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-10 offset-lg-1">
                                    <div class="form-group">
                                    <input class="btn btn-success" type="submit" name="simpan" value="Proses">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End  Kitchen Sink -->
        </div>
    </div>
</div>