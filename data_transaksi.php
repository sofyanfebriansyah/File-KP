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
                            <button data-toggle="modal" data-target="#tambahStudio" type="button" class='btn btn-sm btn-info'"><i class="fa fa-plus"></i> Tambah Transaksi</button>
                            <?php include 'alert.php' ?>

                                <!-- Table -->
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="table-datatable">
                                        <thead>
                                          <tr>
                                            <th width="1%">NO</th>
                                            <th>ID User</th>
                                            <th>ID Studio</th>
                                            <th class="text-center">Nama Customer</th>
                                            <th class="text-center">Tanggal Booking</th>
                                            <th class="text-center">Total Jam</th>
                                            <th class="text-center">Jam Booking</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center" width="25%">OPSI</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php 
                                          include 'koneksi.php';
                                          $no = 1;
                                          $invoice = mysqli_query($koneksi,"SELECT * FROM transaksi");
                                          while($i = mysqli_fetch_array($invoice)){
                                            ?>
                                            <tr>
                                              <td><?= $no++; ?></td>
                                              <td><?= $i['id_user'] ?></td>
                                              <td><?= $i['id_studio'] ?></td>
                                              <td class="text-center"><?= $i['nama_customer'] ?></td>
                                              <td class="text-center"><?= $i['tgl_book'] ?></td>
                                              <td class="text-center"><?php 
                                              $j = explode(" - ",$i['jam_book']);
                                              echo $j[1]-$j[0];
                                              ?> Jam</td>
                                              <td class="text-center"><?php 
                                              $j = explode(" - ",$i['jam_book']);
                                              echo "Jam ".intval($j[0]) ." Sampai Jam ". intval($j[1]);
                                              ?> </td>
                                              <td class="text-center"><?= $i['status'] ?></td>
                                              <td class="text-center">  
                                                <button data-toggle="modal" data-target="#editStudio_<?= $i['id_transaksi']; ?>" type="button" class='btn btn-sm btn-success text-white'"><i class="fa fa-edit"></i> Edit</button>
                                                <a data-toggle="tooltip" data-placement="top" title="Hapus Data" class='btn btn-sm btn-danger' href="deleteStudio.php?id=<?= $i['id_transaksi']; ?>&role=transaksi"><i class="fa fa-trash"></i></a>
                                                <button data-toggle="modal" data-target="#checkPay_<?= $i['id_transaksi']; ?>" type="button" class='btn btn-sm btn-success text-white'"><i class="fa fa-money" aria-hidden="true"></i> Bukti Pembayaran</button>
                                                
                                            </td>
                                            </tr>

                                            <div class="modal fade" id="checkPay_<?= $i['id_transaksi']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                      
                                                    <div class="modal-header">
                                                    <h4 class="modal-title">Cek Pembayaran</h4>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    
                                                    <div class="modal-body">
                                                      <?php if ($i['bukti'] == NULL) {?>
                                                        <span class="badge badge-danger badge-lg text-white">Peserta Belum Melakukan Pembayaran</span>
                                                     <?php }else{?>
                                                      <center>
                                                        <img style="width: 100%;" src="./img/<?= $i['bukti'] ?>" alt="">
                                                    <span class="badge badge-warning badge-lg text-white">Total Pembayaran : Rp. <?= number_format($i['total_bayar'],0,",","."); ?></span>
                                                      </center><br>
                                                    <?php  } ?>
                                                    </div>
                                                  
                                                    
                                                  </div>
                                                </div>
                                              </div>

                                            <div class="modal fade" id="editStudio_<?= $i['id_transaksi'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                              <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    
                                                  <div class="modal-header">
                                                  <h4 class="modal-title">Edit Data Customer</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                  </div>
                                                  
                                                  <div class="modal-body">
                                                 <form action="editStudio.php" class="form" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="role" value="transaksi">
                                                    <input type="hidden" name="id_transaksi" value="<?= $i['id_transaksi'] ?>">
                                                  <div class="row">
                                    
                                                    <div class="col-md-6">
                                                      <div class="form-group p-3">
                                                        <label for="">ID Customer</label>
                                                          <input value="<?= $i['id_user'] ?>" type="text" name="id_user" id="id_user" class="form-control">
                                                      </div>
                                                    </div>
                                    
                                                    <div class="col-md-6">
                                                      <div class="form-group p-3">
                                                        <label for="">ID Studio</label>
                                                        <input value="<?= $i['id_studio'] ?>" type="text" name="id_studio" id="id_studio" class="form-control">
                                                      </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group p-3">
                                                          <label for="">Nama</label>
                                                          <input value="<?= $i['nama_customer'] ?>" type="text" name="nama_customer" id="nama_customer" class="form-control">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-6">
                                                        <div class="form-group p-3">
                                                          <label for="">Tanggal Booking</label>
                                                          <input value="<?= $i['tgl_book'] ?>" type="text" name="tgl_book" id="tgl_book" class="form-control">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-6">
                                                        <div class="form-group p-3">
                                                          <label for="">Jam Booking</label>
                                                          <input value="<?= $i['jam_book'] ?>" type="text" name="jam_book" id="jam_book" class="form-control">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-6">
                                                        <div class="form-group p-3">
                                                          <label for="">Status Order</label>
                                                          <select class="form-control" name='status_order' >
                                                          <option>Aktif</option>
                                                          <option>Selesai</option>
                                                          <option>Cancel</option>
                                                           </select>  
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
              <h4 class="modal-title">Tambah Data Transaksi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              
              <div class="modal-body">
             <form action="tambahStudio.php" class="form" method="post" enctype="multipart/form-data">
                <input type="hidden" name="role" value="transaksi">
              <div class="row">

                <div class="col-md-6">
                  <div class="form-group p-3">
                    <label for="">ID Customer</label>
                    <select class="form-control" name="id_user" id="id_user1">
                    <?php 
                    include 'koneksi.php';
                    $sql1 = mysqli_query($koneksi, "SELECT * FROM user");
                    while ($z = mysqli_fetch_array($sql1)) { ?>
                      <option value="<?= $z['id_user'] ?>" id="<?= $z['nama'] ?>"><?= $z['id_user'] ?> - <?= $z['nama'] ?></option>
                   <?php } ?>
                      </select>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group p-3">
                    <label for="">Nama Studio</label>
                    <select class="form-control" name="id_studio" id="id_studio1">
                    <?php 
                    include 'koneksi.php';
                    $sql1 = mysqli_query($koneksi, "SELECT * FROM studio");
                    while ($z = mysqli_fetch_array($sql1)) { ?>
                      <option value="<?= $z['id_studio'] ?>" id="<?= $z['harga_studio'] ?>"><?= $z['nama_studio'] ?></option>
                   <?php } ?>
                      </select>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group p-3">
                    <label for="">Nama Customer</label>
                    <input readonly type="text" name="nama_customer" id="nama_customer1" class="form-control">
                  </div>
                </div>

                  <div class="col-md-6">
                    <div class="form-group p-3">
                      <label for="">Tanggal Booking</label>
                      <input type="text" name="tgl_book" id="datepicker" class="form-control">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group p-3">
                        <label>Harga Studio</label>
                        <input readonly value="" type="text" class="form-control" name="harga_studio" id="harga_studio1"  aria-describedby="helpId">
                    
                    </div>
                </div>
    
                <div class="col-md-6">
                    <div class="form-group p-3">
                        <label>Pilih Jam Sewa</label>
                        <select name="jam_book" id="jam_sewa1" class="form-control">
                            <option value="1">1 Jam</option>
                            <option value="2">2 Jam</option>
                            <option value="3">3 Jam</option>
                            <option value="4">4 Jam</option>
                            <option value="5">5 Jam</option>
                        </select>
                        <small style="color: red">* Max sewa 5 jam</small>
                    </div>
                </div>
    
                <div class="col-md-12" id="inis">
                    <div class="form-group p-3">
                        <label>Total Bayar</label>
                        <input value="" readonly type="text" class="form-control" name="total_bayar" id="3" aria-describedby="helpId">
                    </div>
                </div>

                <div class="col-md-12" id="subs">
                  <div class="form-group p-3">
                      <label>Bukti Pembayaran</label>
                      <input type="file" class="form-control-file" name="bukti" aria-describedby="helpId">
                  </div>
              </div>

              </div>

                    </div>
                <button type="submit" class="btn btn-info"><i class="fa fa-exclamation" aria-hidden="true"></i> Tambah Transaksi</button>
           
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