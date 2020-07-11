<?php
    // session_start();
    include "koneksi.php";
    // error_reporting(E_ALL^(E_NOTICE|E_WARNING));
    $query1 = mysqli_query($koneksi, "SELECT * FROM tb_perb_kriteria where id_kriteria='B01'");
    $query2 = mysqli_query($koneksi, "SELECT * FROM tb_perb_kriteria where id_kriteria='B02'");
    $query3 = mysqli_query($koneksi, "SELECT * FROM tb_perb_kriteria where id_kriteria='B03'");
    $query4 = mysqli_query($koneksi, "SELECT * FROM tb_perb_kriteria where id_kriteria='B04'");
    $b1 = mysqli_fetch_array($query1);
    $b2 = mysqli_fetch_array($query2);
    $b3 = mysqli_fetch_array($query3);
    $b4 = mysqli_fetch_array($query4);
    ?>
<div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <!--   Kitchen Sink -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Tabel Perhitungan Hasil Kriteria
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <form action="?modul=hasil_kriteria_akhir" method="post">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Kriteria</th>
                                            <th scope="col"><?php echo $b1['kriteria1']; ?></th>
                                            <th scope="col"><?php echo $b2['kriteria1']; ?></th>
                                            <th scope="col"><?php echo $b3['kriteria1']; ?></th>
                                            <th scope="col"><?php echo $b4['kriteria1']; ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <th><?php echo $b1['kriteria1']; ?></th> <!-- Baris Umur -->
                                        <td align="center"><?php echo $b1['nilai_banding']; ?></td>
                                        <td>
                                            <select class="form-control" name="nm_banding1" required>
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
                                            <select class="form-control" name="nm_banding2">
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
                                            <select class="form-control" name="nm_banding3">
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

                                        <tr>
                                        <th><?php echo $b2['kriteria1']; ?></th> <!-- Baris IPK -->
                                        <td align="center"><font color="red">0</font></td>
                                        <td align="center"><?php echo $b2['nilai_banding']; ?></td>
                                        <td>
                                            <select class="form-control" name="nm_banding4">
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
                                            <select class="form-control" name="nm_banding5">
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

                                        <tr>
                                        <th><?php echo $b3['kriteria1']; ?></th> <!-- baris Penghasilan Orangtua -->
                                        <td align="center"><font color="red">0</font></td>
                                        <td align="center"><font color="red">0</font></td>
                                        <td align="center"><?php echo $b3['nilai_banding']; ?></td>
                                        <td>
                                            <select class="form-control" name="nm_banding6">
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

                                        <tr>
                                        <th><?php echo $b4['kriteria1']; ?></th> <!-- baris semester -->
                                        <td align="center"><font color="red">0</font></td>
                                        <td align="center"><font color="red">0</font></td>
                                        <td align="center"><font color="red">0</font></td>
                                        <td colspan="3" align="center"><?php echo $b4['nilai_banding']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            <div class="form-group">
                                <input class="btn btn-success" type="submit" name="simpan" value="Proses">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End  Kitchen Sink -->
            </div>
        </div>
</div>