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
                    Tabel Analisa Alternatif
                </div>
                <div class="panel-body">
                    <button class="btn btn-primary btn-md" data-toggle="modal" id="addModal" data-target="#add_modal">Tambah Analisa Alternatif</button>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">ID Alternatif</th>
                                    <th scope="col">Nama Alternatif</th>
                                    <th scope="col">Nilai Perbandingan</th>
                                    <th scope="col">Nama Alternatif</th>
                                    <th style="text-align: center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="dataAnalisaAlternatif">
                            <?php
                                $query = mysqli_query($koneksi, "SELECT * FROM tb_perb_alternatif");

                                $no = 1;
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row[0]; ?></td>
                                    <td><?php echo $row[3]; ?></td>
                                    <td><?php echo $row[1]; ?></td>
                                    <td><?php echo $row[4]; ?></td>
                                    <td align="center" width="200">
                                        <button name="hapus" id="<?php echo $row['id_alternatif'] ?>" class="btn btn-danger btn-xs hapus_data" ><i class="fa fa-trash-o"></i> Hapus</button>
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
                <h4 class="modal-title" id="myModalLabel">Tambah Analisa Alternatif</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="insert_form">  
                    <div class="form-group">
                        <label for="id_alternatif">ID Perbandingan</label>
                        <input type="text" class="form-control" id="id_alternatif" name="id_alternatif" readonly>
                    </div>
                    <div class="form-group">
                    <label>Nama Alternatif</label>
                        <select class="form-control" name="inpnmalter" required>
                            <option value="">- Pilih Nama Alternatif -</option>
                            <?php
                                $hasil = mysqli_query($koneksi, "SELECT * FROM tb_alternatif");
                                while ($row = mysqli_fetch_array($hasil)) {
                                echo "<option value='".$row['nama_alternatif']."'>".$row['nama_alternatif']."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Perbandingan</label>
                        <select class="form-control" name="inpperb" required>
                            <option value="">- Pilih Perbandingan -</option>
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
                    </div>
                    <div class="form-group">
                    <label>Nama Alternatif</label>
                        <select class="form-control" name="inpnmalter2" required>
                            <option value="">- Pilih Nama Alternatif -</option>
                            <?php
                            $hasil = mysqli_query($koneksi, "SELECT * FROM tb_alternatif");
                            while ($row = mysqli_fetch_array($hasil)) {
                            echo "<option value='".$row['nama_alternatif']."'>".$row['nama_alternatif']."</option>";
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
                    url:"./action/actAnalisaAlternatif.php",
                    method:"POST",
                    data:{mode:mode},
                    success:function(data){  
                        $('#id_alternatif').val(data); 
                    }  
            }); 
      }); 
      $(document).on('click', '.hapus_data', function(){  
           var id_alternatif = $(this).attr("id");
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
                    url:"./action/actAnalisaAlternatif.php",  
                    method:"post",
                    data:{id_alternatif:id_alternatif, mode:mode},
                    success:function(data){
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Data Terhapus!",
                            showConfirmButton: false,
                            timer: 1500
                        })
                      $('#dataAnalisaAlternatif').html(data);
                    }
                  })
              }})
      });
        $('#insert_form').on("submit", function(event){ 
           event.preventDefault();   
                $.ajax({  
                     url:"./action/actAnalisaAlternatif.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Diproses..");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_modal').modal('hide');  
                          $('#dataAnalisaAlternatif').html(data);  
                     }  
                });  
      });
    });
</script>