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
                    Tabel Alternatif
                </div>
                <div class="panel-body">
                    <button class="btn btn-primary btn-md" data-toggle="modal" id="addModal" data-target="#add_modal">Tambah Alternatif</button>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Id Alternatif</th>
                                    <th scope="col">Nama Alternatif</th>
                                    <th style="text-align: center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="dataAlternatif">
                            <?php
                                $query = mysqli_query($koneksi, "SELECT * FROM tb_alternatif");

                                $no = 1;
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row[0]; ?></td>
                                    <td><?php echo $row[1]; ?></td>
                                    <td align="center" width="200">
                                        <button name="edit" id="<?php echo $row['id_alternatif'] ?>" class="btn btn-info btn-xs edit_data" ><i class="fa fa-edit"></i> Edit</button> |  
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
                <h4 class="modal-title" id="myModalLabel">Tambah Alternatif</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="insert_form">  
                    <div class="form-group" id="altId">
                        <label for="id_alternatif">ID Alternatif</label>
                        <input type="text" class="form-control" id="id_alternatif" name="id_alternatif" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama_alternatif">Nama Alternatif</label>
                        <input type="text" class="form-control" id="nama_alternatif" name="nama_alternatif" required>
                    </div>
                    <input type="hidden" name="alternatif_id" id="alternatif_id" />  
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
            $('#altId').show();  
            $('#alternatif_id').val("");  
            $('#mode').val("tambah");  
           
            $.ajax({  
                    url:"./action/actAlternatif.php",
                    method:"POST",
                    data:{mode:mode},
                    success:function(data){  
                        $('#id_alternatif').val(data); 
                    }  
            }); 
      }); 
      $(document).on('click', '.edit_data', function(){  
           var id_alternatif = $(this).attr("id");
           var mode = "detail";
           $('#mode').val("ubah");  
           $.ajax({  
                url:"./action/actAlternatif.php",  
                method:"POST",  
                data:{id_alternatif:id_alternatif, mode:mode},
                dataType:"json",  
                success:function(data){  
                     $('#altId').hide();  
                     $('#alternatif_id').val(data.id_alternatif);  
                     $('#nama_alternatif').val(data.nama_alternatif);  
                     $('#insert').val("Simpan");  
                     $('#add_modal').modal('show');  
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
                    url:"./action/actAlternatif.php",  
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
                      $('#dataAlternatif').html(data);
                    }
                  })
              }})
      });
        $('#insert_form').on("submit", function(event){ 
           event.preventDefault();   
           if($('#nama_alternatif').val() == '')  
           {  
                alert("Nama alternatif is required");  
           }  
           else  
           {  
            //    alert("test");
                $.ajax({  
                     url:"./action/actAlternatif.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Diproses..");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_modal').modal('hide');  
                          $('#dataAlternatif').html(data);  
                     }  
                });  
           }  
      });
    });
</script>