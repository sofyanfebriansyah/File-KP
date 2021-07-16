<?php include 'header.php'?>
 



 
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
                            <button data-toggle="modal" data-target="#tambahStudio" type="button" class='btn btn-sm btn-info'"><i class="fa fa-plus"></i> Tambah Customer</button>
                            <?php include 'alert.php' ?>

                                <!-- Table -->
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="table-datatable">
                                        <thead>
                                          <tr>
                                            <th width="1%">NO</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th class="text-center">Nama Band</th>
                                            <th class="text-center">Tanggal Daftar</th>
                                            <th class="text-center" width="20%">OPSI</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php 
                                          include 'koneksi.php';
                                          $no = 1;
                                          $invoice = mysqli_query($koneksi,"SELECT * FROM user");
                                          while($i = mysqli_fetch_array($invoice)){
                                            ?>
                                            <tr>
                                              <td><?= $no++; ?></td>
                                              <td><?= $i['nik'] ?></td>
                                              <td><?= $i['nama'] ?></td>
                                              <td><?= $i['band'] ?></td>
                                              <td class="text-center"><?= $i['tanggal_dibuat'] ?></td>
                                              <td class="text-center">  
                                                <button data-toggle="modal" data-target="#editStudio_<?= $i['id_user']; ?>" type="button" class='btn btn-sm btn-success text-white'"><i class="fa fa-edit"></i> Edit</button>
                                                <a data-toggle="tooltip" data-placement="top" title="Hapus Data" class='btn btn-sm btn-danger' href="deleteStudio.php?id=<?= $i['id_user']; ?>&role=user"><i class="fa fa-trash"></i></a>
                                              </td>
                                            </tr>

                                            <div class="modal fade" id="editStudio_<?= $i['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                              <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    
                                                  <div class="modal-header">
                                                  <h4 class="modal-title">Edit Data Customer</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                  </div>
                                                  
                                                  <div class="modal-body">
                                                 <form action="editStudio.php" class="form" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="role" value="user">
                                                    <input type="hidden" name="id_user" value="<?= $i['id_user'] ?>">
                                                  <div class="row">
                                    
                                                    <div class="col-md-6">
                                                      <div class="form-group p-3">
                                                        <label for="">Nik Customer</label>
                                                          <input value="<?= $i['nik'] ?>" type="text" name="nik" id="nik" class="form-control">
                                                      </div>
                                                    </div>
                                    
                                                    <div class="col-md-6">
                                                      <div class="form-group p-3">
                                                        <label for="">Nama</label>
                                                        <input value="<?= $i['nama'] ?>" type="text" name="nama" id="nama" class="form-control">
                                                      </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group p-3">
                                                          <label for="">Email</label>
                                                          <input value="<?= $i['email'] ?>" type="text" name="email" id="email" class="form-control">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-6">
                                                        <div class="form-group p-3">
                                                          <label for="">Band</label>
                                                          <input value="<?= $i['band'] ?>" type="text" name="band" id="band" class="form-control">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-6">
                                                        <div class="form-group p-3">
                                                          <label for="">Personil</label>
                                                          <input value="<?= $i['personil'] ?>" type="text" name="personil" id="personil" class="form-control">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-6">
                                                        <div class="form-group p-3">
                                                          <label for="">Username</label>
                                                          <input value="<?= $i['username'] ?>" type="text" name="username" id="username" class="form-control">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-6">
                                                        <div class="form-group p-3">
                                                          <label for="">Password Sekarang</label>
                                                          <input readonly value="R A H A S I A" type="text" class="form-control">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-6">
                                                        <div class="form-group p-3">
                                                          <label for="">Password Baru</label>
                                                          <input type="text" name="password" id="password" class="form-control" placeholder="Kosongkan jika tidak ingin dirubah">
                                                        </div>
                                                      </div>
                                    
                                    
                                                  </div>
                                    
                                                        </div>
                                                    <button type="submit" class="btn btn-info"><i class="fa fa-exclamation" aria-hidden="true"></i> Edit Customer</button>
                                               
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
                <h4 class="modal-title">Tambah Data Customer</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                
                <div class="modal-body">
               <form action="tambahStudio.php" class="form" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="role" value="user">
                <div class="row">
  
                  <div class="col-md-6">
                    <div class="form-group p-3">
                      <label for="">Nik Customer</label>
                        <input type="text" name="nik" id="nik" class="form-control">
                    </div>
                  </div>
  
                  <div class="col-md-6">
                    <div class="form-group p-3">
                      <label for="">Nama</label>
                      <input type="text" name="nama" id="nama" class="form-control">
                    </div>
                  </div>

                  <div class="col-md-6">
                      <div class="form-group p-3">
                        <label for="">Email</label>
                        <input type="text" name="email" id="email" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group p-3">
                        <label for="">Band</label>
                        <input type="text" name="band" id="band" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group p-3">
                        <label for="">Personil</label>
                        <input type="text" name="personil" id="personil" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group p-3">
                        <label for="">Username</label>
                        <input type="text" name="username" id="username" class="form-control">
                      </div>
                    </div>


                    <div class="col-md-6">
                      <div class="form-group p-3">
                        <label for="">Password Baru</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="">
                      </div>
                    </div>
  
  
                </div>
  
                      </div>
                  <button type="submit" class="btn btn-info"><i class="fa fa-exclamation" aria-hidden="true"></i> Tambah Customer</button>
             
               </form>
                
              </div>
            </div>
          </div>

        <!--**********************************
            Content body end
        ***********************************-->
  

     
        
     <script>
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