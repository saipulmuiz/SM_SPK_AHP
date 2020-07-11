<?php  
 include "../koneksi.php";
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';
    //   Bukan untuk mode detail dan mode hapus
      if ($_POST["mode"] != 'hapus' && $_POST["mode"] != 'otomatis'){
            $id_kriteria = $_POST['id_kriteria'];
            $nm_banding  = $_POST['inpperb'];
            $kriteria1   = $_POST['inpnmkrt'];
            $kriteria2   = $_POST['inpnmkrt2'];
  
            if ($nm_banding==1) {
        $nilai = 1;
        $nama = "1. Sama penting dengan";
      } elseif ($nm_banding==2) {
        $nilai = 2;
        $nama = "2. Mendekati sedikit lebih penting dari";
      } elseif ($nm_banding==3) {
        $nilai = 3;
        $nama = "3. Sedikit lebih penting dari";
      } elseif ($nm_banding==4) {
        $nilai = 4;
        $nama = "4. Mendekati lebih penting dari";
      } elseif ($nm_banding==5) {
        $nilai = 5;
        $nama = "5. Lebih penting dari";
      } elseif ($nm_banding==6) {
        $nilai = 6;
        $nama = "6. Mendekati sangat penting dari";
      } elseif ($nm_banding==7) {
        $nilai = 7;
        $nama = "7. Sangat penting dari";
      } elseif ($nm_banding==8) {
        $nilai = 8;
        $nilai = "8. Mendekati mutlak dari";
      } elseif ($nm_banding==9) {
        $nilai = 9;
        $nama = "9. Mutlak sangat penting dari";
      }
        
            // Untuk Mode tambahkan data
        if($_POST["mode"] == 'tambah')
        { 
            $query = "INSERT INTO tb_perb_kriteria (id_kriteria, nilai_banding, kriteria1, nm_banding, kriteria2)
                VALUES ('$id_kriteria', '$nilai', '$kriteria1', '$nama', '$kriteria2')";  
            $message = 'Swal.fire({
                position: "center",
                icon: "success",
                title: "Data Tersimpan!",
                showConfirmButton: false,
                timer: 1500
            })';  
        }
    } 
    // Untuk mode hapus
    else {
        if($_POST["mode"] != 'otomatis' && $_POST["id_kriteria"] != '' && $_POST["mode"] == 'hapus')  
      {  
           $query = "DELETE FROM tb_perb_kriteria WHERE id_kriteria = '".$_POST["id_kriteria"]."'";  
      }
    } 
    //   Untuk Id Otomatis
      if ($_POST["mode"] == 'otomatis') {
        $carikode = mysqli_query($koneksi, "SELECT id_kriteria FROM tb_perb_kriteria") or die(mysql_error());
        $datakode = mysqli_fetch_array($carikode);
        $jumlah_data = mysqli_num_rows($carikode);
        
        if ($datakode) {
            $nilaikode = substr($jumlah_data[0], 1);
            $kode = (int) $nilaikode;
            $kode = $jumlah_data + 1;
            $kode_otomatis = "B".str_pad($kode, 2, "0", STR_PAD_LEFT);
          } else {
            $kode_otomatis = "B01";
          }
        
        echo $kode_otomatis;
      }
    //   Untuk memperbarui data tabel
      else {
        if(mysqli_query($koneksi, $query))  
        {  
            $select_query = "SELECT * FROM tb_perb_kriteria";  
            $result = mysqli_query($koneksi, $select_query);
            $no = 1;
            while($row = mysqli_fetch_array($result))  
            {  
                    $output .= '  
                        <tr>  
                            <td>' . $no . '</td>  
                            <td>' . $row["id_kriteria"] . '</td>
                            <td>' . $row["kriteria1"] . '</td>
                            <td>' . $row["nm_banding"] . '</td>
                            <td>' . $row["kriteria2"] . '</td>
                            <td align="center" width="200">
                                <button name="hapus" id="' . $row["id_kriteria"] . '" class="btn btn-danger btn-xs hapus_data" ><i class="fa fa-trash-o"></i> Hapus</button>
                            </td>  
                        </tr>  
                    ';  
                    $no++;
            }
            $output .= '<script>' . $message . '</script>';   
            echo $output;  
        }
 }  
}
 ?>