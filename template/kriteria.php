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
                    Tabel Kriteria
                </div>
                <div class="panel-body">
                    <button class="btn btn-primary btn-md" data-toggle="modal" id="addModal" data-target="#add_modal">Tambah Kriteria</button>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Id Kriteria</th>
                                    <th scope="col">Kode Kriteria</th>
                                    <th scope="col">Nama Kriteria</th>
                                    <th style="text-align: center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="dataKriteria">
                                <?php
                                $query = mysqli_query($koneksi, "SELECT * FROM tb_kriteria");

                                $no = 1;
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $row[0]; ?></td>
                                <td><?php echo $row[1]; ?></td>
                                <td><?php echo $row[2]; ?></td>
                                <td align="center" width="200">
                                    <button name="edit" id="<?php echo $row['id_kriteria'] ?>" class="btn btn-info btn-xs edit_data" ><i class="fa fa-edit"></i> Edit</button> |  
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
                <h4 class="modal-title" id="myModalLabel">Tambah Kriteria</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="insert_form">  
                    <div class="form-group" id="krtId">
                        <label for="id_kriteria">ID Kriteria</label>
                        <input type="text" class="form-control" id="id_kriteria" name="id_kriteria" readonly>
                    </div>
                    <div class="form-group">
                        <label for="kode_kriteria">Kode Kriteria</label>
                        <input type="text" class="form-control" id="kode_kriteria" name="kode_kriteria" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="nama_kriteria">Nama Kriteria</label>
                        <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria" required>
                    </div>
                    <input type="hidden" name="kriteria_id" id="kriteria_id" />  
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
            $('#krtId').show();  
            $('#kriteria_id').val("");  
            $('#mode').val("tambah");  
           
            $.ajax({  
                    url:"./action/actKriteria.php",
                    method:"POST",
                    data:{mode:mode},
                    success:function(data){  
                        $('#id_kriteria').val(data); 
                    }  
            }); 
      }); 
      $(document).on('click', '.edit_data', function(){  
           var id_kriteria = $(this).attr("id");
           var mode = "detail";
           $('#mode').val("ubah");  
           $.ajax({  
                url:"./action/actKriteria.php",  
                method:"POST",  
                data:{id_kriteria:id_kriteria, mode:mode},
                dataType:"json",  
                success:function(data){  
                     $('#krtId').hide();  
                     $('#kriteria_id').val(data.id_kriteria);  
                     $('#kode_kriteria').val(data.kd_kriteria);  
                     $('#nama_kriteria').val(data.nama_kriteria);  
                     $('#insert').val("Simpan");  
                     $('#add_modal').modal('show');  
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
                    url:"./action/actKriteria.php",  
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
                      $('#dataKriteria').html(data);
                    }
                  })
              }})
      });
        $('#insert_form').on("submit", function(event){ 
           event.preventDefault();   
           if($('#kode_kriteria').val() == '')  
           {  
                alert("Kode kriteria is required");  
           }  
           else if($('#nama_kriteria').val() == '')  
           {  
                alert("Nama kriteria is required");  
           }  
           else  
           {  
            //    alert("test");
                $.ajax({  
                     url:"./action/actKriteria.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Diproses..");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_modal').modal('hide');  
                          $('#dataKriteria').html(data);  
                     }  
                });  
           }  
      });
    });
</script>