<?php  
 include "../koneksi.php";
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';
    //   Bukan untuk mode detail dan mode hapus
      if ($_POST["mode"] != 'hapus' && $_POST["mode"] != 'detail' && $_POST["mode"] != 'otomatis'){
            $id_alternatif = mysqli_real_escape_string($koneksi, $_POST["id_alternatif"]);  
            $nama_alternatif = mysqli_real_escape_string($koneksi, $_POST["nama_alternatif"]);   
        
            // Untuk Mode tambahkan data
        if($_POST["mode"] == 'tambah')
        { 
            $query = "  
            INSERT INTO tb_alternatif (id_alternatif, nama_alternatif)
                VALUES ('$id_alternatif', '$nama_alternatif')";  
            $message = 'Swal.fire({
                position: "center",
                icon: "success",
                title: "Data Tersimpan!",
                showConfirmButton: false,
                timer: 1500
            })';  
        }
        // Untuk mode edit data
        else if($_POST["alternatif_id"] != '' && $_POST["mode"] == 'ubah')  
        {  
            $query = "  
            UPDATE tb_alternatif 
            SET nama_alternatif='$nama_alternatif'
            WHERE id_alternatif='".$_POST["alternatif_id"]."'";  
            $message = 'Swal.fire({
                position: "center",
                icon: "success",
                title: "Data Diperbarui!",
                showConfirmButton: false,
                timer: 1500
            })';  
        }
    } 
    // Untuk mode hapus
    else {
        if($_POST["mode"] != 'otomatis' && $_POST["id_alternatif"] != '' && $_POST["mode"] == 'hapus')  
      {  
           $query = "  
           DELETE FROM tb_alternatif 
           WHERE id_alternatif = '".$_POST["id_alternatif"]."'";  
      }
    }
    // Untuk tombol mode detail
      if ($_POST["mode"] == 'detail') {
            $query = "SELECT * FROM tb_alternatif WHERE id_alternatif = '".$_POST["id_alternatif"]."'";      
            $result = mysqli_query($koneksi, $query);
            $row = mysqli_fetch_array($result);  
            echo json_encode($row);
      } 
    //   Untuk Id Otomatis
      else if ($_POST["mode"] == 'otomatis') {
        $carikode = mysqli_query($koneksi, "SELECT id_alternatif FROM tb_alternatif") or die(mysqli_error($koneksi));
        $datakode = mysqli_fetch_array($carikode);
        $jumlah_data = mysqli_num_rows($carikode);
        
        if ($datakode) {
          $nilaikode = substr($jumlah_data[0], 1);
          $kode = (int) $nilaikode;
          $kode = $jumlah_data + 1;
          $kode_otomatis = "alt-".str_pad($kode, 3, "0", STR_PAD_LEFT);
        } else {
          $kode_otomatis = "alt-001";
        }
        
        echo $kode_otomatis;
      }
    //   Untuk memperbarui data tabel
      else {
        if(mysqli_query($koneksi, $query))  
        {  
            $select_query = "SELECT * FROM tb_alternatif";  
            $result = mysqli_query($koneksi, $select_query);
            $no = 1;
            while($row = mysqli_fetch_array($result))  
            {  
                    $output .= '  
                        <tr>  
                            <td>' . $no . '</td>  
                            <td>' . $row["id_alternatif"] . '</td>
                            <td>' . $row["nama_alternatif"] . '</td>
                            <td align="center" width="200">
                                <button name="edit" id="'.$row["id_alternatif"] .'" class="btn btn-info btn-xs edit_data" ><i class="fa fa-edit"></i> Edit</button> |   
                                <button name="hapus" id="' . $row["id_alternatif"] . '" class="btn btn-danger btn-xs hapus_data" ><i class="fa fa-trash-o"></i> Hapus</button>
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