<?php 
    // session_start();
    include "koneksi.php";
 ?>

<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <!--   Kitchen Sink -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tabel Analisa Kriteria
                </div>
                <div class="panel-body">
                    <button class="btn btn-primary btn-md" data-toggle="modal" id="addModal" data-target="#add_modal">Tambah Analisa Kriteria</button>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">ID Kriteria</th>
                                    <th scope="col">Nama Kriteria</th>
                                    <th scope="col">Nilai Perbandingan</th>
                                    <th scope="col">Nama Kriteria</th>
                                    <th style="text-align: center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="dataAnalisaKriteria">
                            <?php
                                $query = mysqli_query($koneksi, "SELECT * FROM tb_perb_kriteria");

                                $no = 1;
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row[0]; ?></td>
                                    <td><?php echo $row[2]; ?></td>
                                    <td><?php echo $row[3]; ?></td>
                                    <td><?php echo $row[4]; ?></td>
                                    <td align="center" width="200">
                                        <button name="hapus" id="<?php echo $row['id_kriteria'] ?>" class="btn btn-danger btn-xs hapus_data" ><i class="fa fa-trash-o"></i> Hapus</button>
                                    </td> 
                                </tr>
                                <?php
                                $no++;
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                <!-- End  Kitchen Sink -->
        </div>
    </div>
</div>

<!-- Modal Data -->
<div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Tambah Analisa Kriteria</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="insert_form">  
                    <div class="form-group">
                        <label for="id_kriteria">ID Perbandingan</label>
                        <input type="text" class="form-control" id="id_kriteria" name="id_kriteria" readonly>
                    </div>
                    <div class="form-group">
                    <label>Nama Kriteria</label>
                        <select class="form-control" name="inpnmkrt" required>
                            <option value="">- Pilih Nama Kriteria -</option>
                            <?php
                                $hasil = mysqli_query($koneksi, "SELECT * FROM tb_kriteria");
                                while ($row = mysqli_fetch_array($hasil)) {
                                echo "<option value='".$row['nama_kriteria']."'>".$row['nama_kriteria']."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Perbandingan</label>
                        <select class="form-control" name="inpperb" required>
                            <option value="">- Pilih Perbandingan -</option>
                            <?php
                                $hasil_nilai = mysqli_query($koneksi, "SELECT * FROM tb_nilai");
                                while ($row_nilai = mysqli_fetch_array($hasil_nilai)) { ?>
                                    <option value="<?php echo $row_nilai['jml_nilai'] ?>"><?php echo $row_nilai['jml_nilai'] ?> - <?php echo $row_nilai['ket_nilai'] ?></option>
                                <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                    <label>Nama Kriteria</label>
                        <select class="form-control" name="inpnmkrt2" required>
                            <option value="">- Pilih Nama Kriteria -</option>
                            <?php
                            $hasil = mysqli_query($koneksi, "SELECT * FROM tb_kriteria");
                            while ($row = mysqli_fetch_array($hasil)) {
                            echo "<option value='".$row['nama_kriteria']."'>".$row['nama_kriteria']."</option>";
                            }
                            ?>
                        </select>
                    </div> 
                    <input type="hidden" name="mode" id="mode" />  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <input type="submit" name="insert" id="insert" value="Tambah" class="btn btn-primary" />
                </div>
            </form> 
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#addModal').click(function(){  
            var mode = "otomatis";
            $('#insert').val("Tambah");  
            $('#insert_form')[0].reset();
            $('#mode').val("tambah");  
           
            $.ajax({  
                    url:"./action/actAnalisaKriteria.php",
                    method:"POST",
                    data:{mode:mode},
                    success:function(data){  
                        $('#id_kriteria').val(data); 
                    }  
            }); 
      }); 
      $(document).on('click', '.hapus_data', function(){  
           var id_kriteria = $(this).attr("id");
           var mode = "hapus";
           Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Data akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus'
                }).then((result) => {
                    if (result.value) {
                  $.ajax({
                    url:"./action/actAnalisaKriteria.php",  
                    method:"post",
                    data:{id_kriteria:id_kriteria, mode:mode},
                    success:function(data){
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Data Terhapus!",
                            showConfirmButton: false,
                            timer: 1500
                        })
                      $('#dataAnalisaKriteria').html(data);
                    }
                  })
              }})
      });
        $('#insert_form').on("submit", function(event){ 
           event.preventDefault();   
                $.ajax({  
                     url:"./action/actAnalisaKriteria.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Diproses..");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_modal').modal('hide');  
                          $('#dataAnalisaKriteria').html(data);  
                     }  
                });  
      });
    });
</script>