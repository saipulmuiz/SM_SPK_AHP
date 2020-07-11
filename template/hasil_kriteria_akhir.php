<?php
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

    if (isset($_POST['simpan'])) {
			$nm_banding1 = $_POST['nm_banding1'];
			$nm_banding2 = $_POST['nm_banding2'];
			$nm_banding3 = $_POST['nm_banding3'];
			$nm_banding4 = $_POST['nm_banding4'];
			$nm_banding5 = $_POST['nm_banding5'];
			$nm_banding6 = $_POST['nm_banding6'];
		}

		// memasukan nilai banding dari database ke dalam variabel
			$k1 = $b1['nilai_banding'];
			$k2 = $b2['nilai_banding'];
			$k3 = $b3['nilai_banding'];
			$k4 = $b4['nilai_banding'];

			// perhitungan baris dan kolom
			// baris Umur
			$bk11 = $k1;
			$bk12 = $nm_banding1;
			$bk13 = $nm_banding2;
			$bk14 = $nm_banding3;
			// baris ipk
			$bk21 = round($k2/$nm_banding1,2);
			$bk22 = $k2;
			$bk23 = $nm_banding4;
			$bk24 = $nm_banding5;
			// baris penghasilan ortu
			$bk31 = round($k3/$nm_banding2,2);
			$bk32 = round($k3/$nm_banding4,2);
			$bk33 = $k3;
			$bk34 = $nm_banding6;
			// baris semester
			$bk41 = round($k4/$nm_banding3,2);
			$bk42 = round($k4/$nm_banding5,2);
			$bk43 = round($k4/$nm_banding6,2);
			$bk44 = $k4;
			// perhitungan jumlah kolom
			$jk51 = $bk11+$bk21+$bk31+$bk41;
			$jk52 = $bk12+$bk22+$bk32+$bk42;
			$jk53 = $bk13+$bk23+$bk33+$bk43;
			$jk54 = $bk14+$bk24+$bk34+$bk44;

			// perhitungan Priority Weight
			$pw11 = round($bk11/$jk51,2);
			$pw12 = round($bk12/$jk52,2);
			$pw13 = round($bk13/$jk53,2);
			$pw14 = round($bk14/$jk54,2);
			$pw21 = round($bk21/$jk51,2);
			$pw22 = round($bk22/$jk52,2);
			$pw23 = round($bk23/$jk53,2);
			$pw24 = round($bk24/$jk54,2);
			$pw31 = round($bk31/$jk51,2);
			$pw32 = round($bk32/$jk52,2);
			$pw33 = round($bk33/$jk53,2);
			$pw34 = round($bk34/$jk54,2);
			$pw41 = round($bk41/$jk51,2);
			$pw42 = round($bk42/$jk52,2);
			$pw43 = round($bk43/$jk53,2);
			$pw44 = round($bk44/$jk54,2);

			// perhitungan jumlah baris PW
			$jb15 = $pw11+$pw12+$pw13+$pw14;
			$jb25 = $pw21+$pw22+$pw23+$pw24;
			$jb35 = $pw31+$pw32+$pw33+$pw34;
			$jb45 = $pw41+$pw42+$pw43+$pw44;

			// jumlah baris di tambah kemudian dibagi 4
			$rata16 = round($jb15/4,2);
			$rata26 = round($jb25/4,2);
			$rata36 = round($jb35/4,2);
			$rata46 = round($jb45/4,2);

			// menghitung jumlah PW baris kolom
			$jpw51 = round($pw11+$pw21+$pw31+$pw41);
			$jpw52 = round($pw12+$pw22+$pw32+$pw42);
			$jpw53 = round($pw13+$pw23+$pw33+$pw43);
			$jpw54 = round($pw14+$pw24+$pw34+$pw44);
			$jpw55 = $jb15+$jb25+$jb35+$jb45;
			$jpw56 = round($rata16+$rata26+$rata36+$rata46);

			$maks = round(($jk51*$rata16)+($jk52*$rata26)+($jk53*$rata36)+($jk54*$rata46),3);
			// menentukan jumlah rows pada kriteria untuk Rasio Index
			$i = mysqli_query($koneksi, "SELECT * FROM tb_kriteria ORDER BY id_kriteria");
			$n = mysqli_num_rows($i);
			if ($n==1) {
				$rc = 0.00;
			}elseif ($n==2) {
				$rc = 0.00;
			}elseif ($n==3) {
				$rc = 0.58;
			}elseif ($n==4) {
				$rc = 0.90;
			}elseif ($n==5) {
				$rc = 1.12;
			}elseif ($n==6) {
				$rc = 1.24;
			}elseif ($n==7) {
				$rc = 1.32;
			}elseif ($n==8) {
				$rc = 1.41;
			} elseif ($n==9) {
				$rc = 1.45;
			} elseif ($n==10) {
				$rc = 1.49;
			} elseif ($n==11) {
				$rc = 1.51;
			}

        $ci    = round(($maks-$n)/($n-1),3);
        $cr    = round($ci/$rc,3);
        $sql   = "INSERT INTO pw_kriteria (id, pw1, pw2, pw3, pw4)
                VALUES ('', '$rata16', '$rata26', '$rata36', '$rata46')";
        $query = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
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
                        <div class="row">
                            <div class="col-md-12">
                                <!--   Kitchen Sink -->
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Kriteria</th>
                                                        <th scope="col"><?php echo $b1['kriteria1']; ?></th>
                                                        <th scope="col"><?php echo $b2['kriteria1']; ?></th>
                                                        <th scope="col"><?php echo $b3['kriteria1']; ?></th>
                                                        <th scope="col"><?php echo $b4['kriteria1']; ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr align="center">
                                                        <th><?php echo $b1['kriteria1']; ?></th> <!-- Membaca baris Umur -->
                                                        <td><?php echo $bk11; ?></td>
                                                        <td><?php echo $bk12; ?></td>
                                                        <td><?php echo $bk13; ?></td>
                                                        <td><?php echo $bk14; ?></td>
                                                    </tr>
                                                    <tr align="center">
                                                        <th><?php echo $b2['kriteria1']; ?></th> <!-- Membaca baris IPK -->
                                                        <td><?php echo $bk21; ?></td>
                                                        <td><?php echo $bk22; ?></td>
                                                        <td><?php echo $bk23; ?></td>
                                                        <td><?php echo $bk24; ?></td>
                                                    </tr>
                                                    <tr align="center">
                                                        <th><?php echo $b3['kriteria1']; ?></th> <!-- membaca baris peng Ortu -->
                                                        <td><?php echo $bk31; ?></td>
                                                        <td><?php echo $bk32; ?></td>
                                                        <td><?php echo $bk33; ?></td>
                                                        <td><?php echo $bk34; ?></td>
                                                    </tr>
                                                    <tr align="center">
                                                        <th><?php echo $b4['kriteria1']; ?></th> <!-- membaca Semester -->
                                                        <td><?php echo $bk41; ?></td>
                                                        <td><?php echo $bk42; ?></td>
                                                        <td><?php echo $bk43; ?></td>
                                                        <td><?php echo $bk44; ?></td>
                                                    </tr>
                                                    <tr align="center" style="font-weight:700">
                                                        <th>Jumlah</th>
                                                        <td><?php echo $jk51; ?></td>
                                                        <td><?php echo $jk52; ?></td>
                                                        <td><?php echo $jk53; ?></td>
                                                        <td><?php echo $jk54; ?></td>
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
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Kriteria</th>
                                                        <th scope="col"><?php echo $b1['kriteria1']; ?></th>
                                                        <th scope="col"><?php echo $b2['kriteria1']; ?></th>
                                                        <th scope="col"><?php echo $b3['kriteria1']; ?></th>
                                                        <th scope="col"><?php echo $b4['kriteria1']; ?></th>
                                                        <th scope="col">Jumlah</th>
                                                        <th scope="col">Prioritas Kriteria</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr align="center">
                                                        <th><?php echo $b1['kriteria1']; ?></th> <!-- baris Usia -->
                                                        <td><?php echo $pw11; ?></td>
                                                        <td><?php echo $pw12; ?></td>
                                                        <td><?php echo $pw13; ?></td>
                                                        <td><?php echo $pw14; ?></td>
                                                        <td><?php echo $jb15; ?></td>
                                                        <td style="text-align:center;font-weight:700"><?php echo $rata16; ?></td>
                                                    </tr>
                                                    <tr align="center">
                                                        <th><?php echo $b2['kriteria1']; ?></th> <!-- baris ipk -->
                                                        <td><?php echo $pw21; ?></td>
                                                        <td><?php echo $pw22; ?></td>
                                                        <td><?php echo $pw23; ?></td>
                                                        <td><?php echo $pw24; ?></td>
                                                        <td><?php echo $jb25; ?></td>
                                                        <td style="text-align:center;font-weight:700"><?php echo $rata26; ?></td>
                                                    </tr>
                                                    <tr align="center">
                                                        <th><?php echo $b3['kriteria1']; ?></th> <!-- baris peng ortu -->
                                                        <td><?php echo $pw31; ?></td>
                                                        <td><?php echo $pw32; ?></td>
                                                        <td><?php echo $pw33; ?></td>
                                                        <td><?php echo $pw34; ?></td>
                                                        <td><?php echo $jb35; ?></td>
                                                        <td style="text-align:center;font-weight:700"><?php echo $rata36; ?></td>
                                                    </tr>
                                                    <tr align="center">
                                                        <th><?php echo $b4['kriteria1']; ?></th> <!-- baris semester -->
                                                        <td><?php echo $pw41; ?></td>
                                                        <td><?php echo $pw42; ?></td>
                                                        <td><?php echo $pw43; ?></td>
                                                        <td><?php echo $pw44; ?></td>
                                                        <td><?php echo $jb45; ?></td>
                                                        <td style="text-align:center;font-weight:700"><?php echo $rata46; ?></td>
                                                    </tr>
                                                    <tr align="center" style="font-weight:700">
                                                        <th>Jumlah</th>
                                                        <td><?php echo $jpw51; ?></td>
                                                        <td><?php echo $jpw52; ?></td>
                                                        <td><?php echo $jpw53; ?></td>
                                                        <td><?php echo $jpw54; ?></td>
                                                        <td><?php echo $jpw55; ?></td>
                                                        <td><?php echo $jpw56; ?></td>
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
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr align="center">
                                                        <th colspan="5"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><h4>&#955; Maks = <?php echo $maks; ?> </h4> </td>
                                                    </tr>
                                                    <tr>
                                                        <td><h4>CI = <?php echo $ci; ?> <= 0.1</h4></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h4>CR = <?php echo $cr; ?></h4></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- End  Kitchen Sink -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End  Kitchen Sink -->
        </div>
    </div>
</div>