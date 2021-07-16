<?php include 'header.php'?>
 

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>


 
<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-wrapper">
            <!-- row -->
            <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                            <button data-toggle="modal" data-target="#tambahStudio" type="button" class='btn btn-sm btn-info'"><i class="fa fa-plus"></i> Tambah Admin</button>
                            <?php include 'alert.php' ?>

                                <!-- Table -->
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="table-datatable">
                                        <thead>
                                          <tr>
                                            <th width="1%">NO</th>
                                            <th>Nama Admin</th>
                                            <th>Role Admin</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center" width="25%">OPSI</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php 
                                          include 'koneksi.php';
                                          $no = 1;
                                          $invoice = mysqli_query($koneksi,"SELECT * FROM admins");
                                          while($i = mysqli_fetch_array($invoice)){
                                            ?>
                                            <tr>
                                              <td><?= $no++; ?></td>
                                              <td><?= $i['nama_admin'] ?></td>
                                              <td><?= $i['role_admin'] ?></td>
                                              <td class="text-center">
                                                <?php if ($i['status'] == 'aktif') {?>
                                                    <span class='badge bg-info text-white'><i class="fa fa-check"></i> Aktif</span>
                                                    <?php  } else{ ?>
                                                    <span class='badge bg-danger text-white'><i class="fa fa-exclamation" aria-hidden="true"></i> Non Aktif</span>
                                                     <?php }?> 
                                              </td>
                                              <td class="text-center">  
                                                <button data-toggle="modal" data-target="#editStudio_<?= $i['id_admin']; ?>" type="button" class='btn btn-sm btn-success text-white'"><i class="fa fa-edit"></i> Edit</button>
                                                <a data-toggle="tooltip" data-placement="top" title="Hapus Data" class='btn btn-sm btn-danger' href="deleteStudio.php?id=<?= $i['id_admin']; ?>&role=admin"><i class="fa fa-trash"></i></a>
                                                <?php if ($i['status'] == 'aktif') {?>
                                                    <a data-toggle="tooltip" data-placement="top" title="Non-aktifkan Admin" class='btn btn-sm btn-danger' href="studioNonAktif.php?id=<?= $i['id_admin']; ?>&role=admin"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></a>
                                                    <?php  } else{ ?>
                                                      <a data-toggle="tooltip" data-placement="top" title="Aktifkan Admin" class='btn btn-sm btn-info' href="studioAktif.php?id=<?= $i['id_admin']; ?>&role=admin"><i class="fa fa-check"></i></a>
                                                     <?php }?>  
                                            </td>
                                            </tr>

                                            </div>

                                            <div class="modal fade" id="editStudio_<?= $i['id_admin'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                              <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    
                                                  <div class="modal-header">
                                                  <h4 class="modal-title">Edit Data Admin</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                  </div>
                                                  
                                                  <div class="modal-body">
                                                 <form action="editStudio.php" class="form" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="role" value="admin">
                                                    <input type="hidden" name="id_admin" value="<?= $i['id_admin'] ?>">
                                                  <div class="row">
                                    
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                          <label for="">Nama Admin</label>
                                                          <input value="<?= $i['nama_admin'] ?>" type="text" class="form-control" name="nama_admin" id="nama_admin" aria-describedby="helpId" placeholder="">
                                                        </div>
                                                    </div>
                                    
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                          <label for="">Role Admin</label>
                                                          <select class="form-control" name="role_admin" id="role_admin">
                                                              <option value="<?= $i['role_admin'] ?>" selected><?= $i['role_admin'] ?></option>
                                                              <option value="admin">Admin</option>
                                                              <option value="studio">Penjaga Studio</option>
                                                          </select>
                                                        </div>
                                                    </div>
                                    
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                          <label for="">Status Admin</label>
                                                          <select class="form-control" name="status" id="status">
                                                              <option value="<?= $i['status'] ?>" selected><?= $i['status'] ?></option>
                                                              <option value="aktif">Aktif</option>
                                                              <option value="tidak aktif">Non-Aktif</option>
                                                          </select>
                                                        </div>
                                                    </div>
                                    
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                          <label for="">Username</label>
                                                          <input value="<?= $i['username'] ?>" readonly type="text" class="form-control" name="username" id="username" aria-describedby="helpId" placeholder="">
                                                        </div>
                                                    </div>
                                    
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                          <label for="">Password Baru</label>
                                                          <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Kosongkan jika tidak ingin dirubah">
                                                        </div>
                                                    </div>

                                                  </div>
                                    
                                                        </div>
                                                    <button type="submit" class="btn btn-info"><i class="fa fa-exclamation" aria-hidden="true"></i> Edit Transaksi</button>
                                               
                                                 </form>
                                                  
                                                </div>
                                              </div>
                                            </div>


                                            <?php 
                                          }
                                          ?>
                                        </tbody>
                                      </table>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </section>
            <!-- #/ container -->
        </div>


        <div class="modal fade" id="tambahStudio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                
              <div class="modal-header">
              <h4 class="modal-title">Tambah Data Admin</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              
              <div class="modal-body">
             <form action="tambahStudio.php" class="form" method="post" enctype="multipart/form-data">
                <input type="hidden" name="role" value="admin">
              <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Nama Admin</label>
                      <input type="text" class="form-control" name="nama_admin" id="nama_admin" aria-describedby="helpId" placeholder="">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Role Admin</label>
                      <select class="form-control" name="role_admin" id="role_admin">
                          <option selected>-- Pilihan --</option>
                          <option value="admin">Admin</option>
                          <option value="studio">Penjaga Studio</option>
                      </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Status Admin</label>
                      <select class="form-control" name="status" id="status">
                          <option selected>-- Pilihan --</option>
                          <option value="aktif">Aktif</option>
                          <option value="tidak aktif">Non-Aktif</option>
                      </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Username</label>
                      <input type="text" class="form-control" name="username" id="username" aria-describedby="helpId" placeholder="">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Password Baru</label>
                      <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="">
                    </div>
                </div>
                

              </div>

                    </div>
                <button type="submit" class="btn btn-info"><i class="fa fa-exclamation" aria-hidden="true"></i> Tambah Admin</button>
           
             </form>
              
            </div>
          </div>
        </div>

        <!--**********************************
            Content body end
        ***********************************-->
  

     
        
     <script>

$(function () {
        $("#inis").hide();  
        $("#subs").hide();  
        $("#subs1").hide();  
  $("select").on('change',function () {
    $("#inis").show();  
    $("#subs").show();  
    $("#subs1").show();  
    $("#3").val(function () {
      var i1 = parseFloat($("#harga_studio1").val());
      var i2 = $('#jam_sewa1').find(":selected").val();
      i1 = isNaN(i1) ? 0 : i1;
      i2 = isNaN(i2) ? 0 : i2;
      return ('Rp. ' + i1 * i2);
      
    });
  });
});

$(document).ready(function(){
    $('#id_user1').on('change', function() {
      var msd = $('option:selected', this).attr('id');
      $("#nama_customer1").val(msd);
    });
    });

    $(document).ready(function(){
    $('#id_studio1').on('change', function() {
      var msd = $('option:selected', this).attr('id');
      $("#harga_studio1").val(msd);
    });
    });

    var rupiah = document.getElementById('rupiah');
		rupiah.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah.value = formatRupiah(this.value, 'Rp. ');
		});
 
		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}

    var rupiah1 = document.getElementById('rupiah1');
		rupiah1.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah1() untuk mengubah angka yang di ketik menjadi format angka
			rupiah1.value = formatRupiah1(this.value, 'Rp. ');
		});
 
		/* Fungsi formatRupiah1 */
		function formatRupiah1(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah1     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah1 += separator + ribuan.join('.');
			}
 
			rupiah1 = split[1] != undefined ? rupiah1 + ',' + split[1] : rupiah1;
			return prefix == undefined ? rupiah1 : (rupiah1 ? 'Rp. ' + rupiah1 : '');
		}
     </script>
     

        <?php include 'footer.php' ?>