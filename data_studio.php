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
                            <button data-toggle="modal" data-target="#tambahStudio" type="button" class='btn btn-sm btn-info'"><i class="fa fa-plus"></i> Tambah Studio</button>
                            <?php include 'alert.php' ?>

                                <!-- Table -->
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="table-datatable">
                                        <thead>
                                          <tr>
                                            <th width="1%">NO</th>
                                            <th>Nama Studio</th>
                                            <th>Harga Studio</th>
                                            <th class="text-center">Keterangan Studio</th>
                                            <th class="text-center">Status Studio</th>
                                            <th class="text-center" width="20%">OPSI</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php 
                                          include 'koneksi.php';
                                          $no = 1;
                                          $invoice = mysqli_query($koneksi,"SELECT * FROM studio");
                                          while($i = mysqli_fetch_array($invoice)){
                                            ?>
                                            <tr>
                                              <td><?= $no++; ?></td>
                                              <td><?= $i['nama_studio'] ?></td>
                                              <td>Rp <?= number_format($i['harga_studio'],0,",","."); ?> / Jam</td>
                                              <td><?= $i['ket_studio'] ?></td>
                                              <td class="text-center">
                                                <?php if ($i['status_studio'] == 'aktif') {?>
                                                  <span class='badge bg-info text-white'><i class="fa fa-check"></i> Aktif</span>
                                                  <?php  } else{ ?>
                                                  <span class='badge bg-danger text-white'><i class="fa fa-exclamation" aria-hidden="true"></i> Non Aktif</span>
                                                   <?php }?>  
                                              </td>
                                              <td class="text-center">  
                                                <button data-toggle="modal" data-target="#editStudio_<?= $i['id_studio']; ?>" type="button" class='btn btn-sm btn-success text-white'"><i class="fa fa-edit"></i> Edit</button>
                                                <a data-toggle="tooltip" data-placement="top" title="Hapus Data" class='btn btn-sm btn-danger' href="deleteStudio.php?id_studio=<?= $i['id_studio']; ?>"><i class="fa fa-trash"></i></a>
                                                <?php if ($i['status_studio'] == 'aktif') {?>
                                                  <a data-toggle="tooltip" data-placement="top" title="Non-aktifkan Studio" class='btn btn-sm btn-danger' href="studioNonAktif.php?id=<?= $i['id_studio']; ?>&role=studio"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></a>
                                                  <?php  } else{ ?>
                                                    <a data-toggle="tooltip" data-placement="top" title="Aktifkan Studio" class='btn btn-sm btn-info' href="studioAktif.php?id=<?= $i['id_studio']; ?>&role=studio"><i class="fa fa-check"></i></a>
                                                   <?php }?>  
                                              </td>
                                            </tr>

                                            <div class="modal fade" id="editStudio_<?= $i['id_studio'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                              <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    
                                                  <div class="modal-header">
                                                  <h4 class="modal-title">Edit Data Studio</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                  </div>
                                                  
                                                  <div class="modal-body">
                                                 <form action="editStudio.php" class="form" method="post" enctype="multipart/form-data">
                                                  <div class="row">
                                    
                                                    <div class="col-md-6">
                                                      <div class="form-group p-3">
                                                        <label for="">Nama Studio</label>
                                                          <input value="<?= $i['nama_studio'] ?>" type="text" name="nama_studio" id="nama_studio" class="form-control">
                                                      </div>
                                                    </div>
                                    
                                                    <div class="col-md-6">
                                                      <div class="form-group p-3">
                                                        <label for="">Harga Studio</label>
                                                          <input value="Rp <?= number_format($i['harga_studio'],0,",","."); ?>" type="text" name="harga_studio" id="rupiah" class="form-control">
                                                          <small class="text-danger">*Per Jam</small>
                                                      </div>
                                                    </div>
                                    
                                                    <div class="col-md-12">
                                                      <div class="form-group p-3">
                                                        <label for="">Keterangan Studio</label>
                                                        <textarea class="form-control" name="ket_studio" id="ket_studio" rows="3"><?= $i['ket_studio'] ?></textarea>
                                                      </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                      <div class="form-group">
                                                        <label for="">Foto Studio Lama</label>
                                                        <img style="width: 100%;" class="img-responsive" src="../img/<?= $i['foto_studio'] ?>" alt="">
                                                      </div>
                                                    </div>
                                    
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label for="">Unggah Foto Studio</label>
                                                        <input type="file" class="form-control-file" name="foto_studio" id="foto_studio" rows="3">
                                                        <small class="text-danger">* Kosongkan jika tidak ada perubahan</small>
                                                      </div>
                                                    </div>
                                    
                                    
                                                  </div>
                                    
                                                        </div>
                                                    <button type="submit" class="btn btn-info"><i class="fa fa-exclamation" aria-hidden="true"></i> Edit Studio</button>
                                               
                                                 </form>
                                                  
                                                </div>
                                              </div>
                                            </div>

                                                


                                                <div class="modal fade" id="checkPay_<?= $i['id_studio']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        
                                                      <div class="modal-header">
                                                      <h4 class="modal-title">Cek Pembayaran</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                      </div>
                                                      
                                                      <div class="modal-body">
                                                        <?php if ($i['kursus_bukti'] == NULL) {
                                                          echo 'Peserta Belum melakukan Pembayaran';
                                                        }else{?>
                                                        <center>
                                                          <img style="width: 100%;" src="../assets/images/<?= $i['kursus_bukti'] ?>" alt="">
                                                        </center><br>
                                                      <?php  } ?>
                                                      <span class="badge badge-warning badge-lg text-white">Total Pembayaran : Rp. <?= number_format($i['kursus_harga'],0,",","."); ?></span>
                                                      </div>
                                                    
                                                      
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
              <h4 class="modal-title">Tambah Data Studio</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              
              <div class="modal-body">
             <form action="tambahStudio.php" class="form" method="post" enctype="multipart/form-data">
              <div class="row">

                <div class="col-md-6">
                  <div class="form-group p-3">
                    <label for="">Nama Studio</label>
                      <input type="text" name="nama_studio" id="nama_studio" class="form-control">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group p-3">
                    <label for="">Harga Studio</label>
                      <input type="text" name="harga_studio" id="rupiah1" class="form-control">
                      <small class="text-danger">*Per Jam</small>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Keterangan Studio</label>
                    <textarea class="form-control" name="ket_studio" id="ket_studio" rows="3"></textarea>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group p-3">
                    <label for="">Status Studio</label>
                    <select class="form-control" name="status_studio">
                      <option value="" selected>-- Pilihan --</option>
                      <option value="aktif">Aktif</option>
                      <option value="tidak aktif">Non Aktif</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Unggah Foto Studio</label>
                    <input type="file" class="form-control-file" name="foto_studio" id="foto_studio" rows="3">
                  </div>
                </div>


              </div>

                    </div>
                <button type="submit" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Studio</button>
           
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