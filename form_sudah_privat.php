<?php include 'header.php' ?>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<link rel="stylesheet" href="stepper.css">

<section id="pricing" class="pricing-area pt-95 pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center pb-20">
                        <h4 class="title">Daftar Program</h4>
                        <p class="text">Form pendaftaran program</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <form action="proses_privat.php" id="msform" method="post" enctype="multipart/form-data">
                        <input type="hidden" value="<?= $_SESSION['id'] ?>" name="id_cust">
                <ul id="progressbar">
                        <li class="active" id="personal"><strong>Data Diri</strong></li>
                        <li id="personal"><strong>Pilihan Program</strong></li>
                        <li id="account"><strong>Pembayaran</strong></li>
                    </ul>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> <br>
               
                  <fieldset>
                    <?php 
                    if(isset($_GET['alert'])){
                        if($_GET['alert']=='gagal_ekstensi'){
                            ?>
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-warning"></i> Peringatan !</h4>
                                Ekstensi Tidak Diperbolehkan
                            </div>								
                            <?php
                        }elseif($_GET['alert']=="gagal_ukuran"){
                            ?>
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-check"></i> Peringatan !</h4>
                                Ukuran File terlalu Besar
                            </div> 								
                            <?php
                        }
                    }
                    ?>
                      <div class="form-card">           
                    <div class="pricing">
                      <div class="row">
                        <div class="col-md-4">
                            <div class="form-group p-3">
                              <label for="">Masukan Nomor KTP/Kartu Pelajar</label>
                              <input type="number" class="form-control" name="nik" id="nik" aria-describedby="helpId" placeholder="">
                              <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>
                        </div>
                        <?php 
                                    if(isset($_SESSION['customer_status'])){
                                        $id_customer = $_SESSION['id'];
                                        $customer = mysqli_query($koneksi,"SELECT * FROM customer WHERE id='$id_customer'");
                                        $c = mysqli_fetch_assoc($customer);
                                        ?>
                        <div class="col-md-4">
                            <div class="form-group p-3">
                              <label for="">Masukan Nama</label>
                              <input type="text" class="form-control" readonly name="nama" id="nama" value="<?= $c['nama']?>">
                              <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group p-3">
                              <label for="">Masukan Nomor Telfon</label>
                              <input type="number" class="form-control" name="no_hp" id="no_hp" aria-describedby="helpId" placeholder="">
                              <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group p-3">
                              <label for="">Masukan Email</label>
                              <input type="email" class="form-control" name="email" id="email" readonly value="<?= $c['email']?>">
                              <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>
                        </div>
                    <?php }?>
                        <div class="col-md-4">
                            <div class="form-group p-3">
                              <label for="">Masukan Tempat Lahir</label>
                              <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" aria-describedby="helpId" placeholder="">
                              <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group p-3">
                              <label for="">Masukan Tanggal Lahir</label>
                              <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" aria-describedby="helpId" placeholder="">
                              <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>
                        </div>
                      
                        </div>
                      </div>
                 
                </div>
                   
                        <input type="button" name="next" class="next action-button" value="Selanjutnya" />
              
                </fieldset>

                <fieldset>
                    <div class="form-card">
                        <div class="pricing">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group p-3">
                                  <label for="">Pilih Tingkatan</label>
                                  <select class="form-control" name="tingkatan" id="tingkatan">
                                    <option value="">-- Pilihan --</option>
                                    <option value="x6">6 Kali Sesi</option>
                                    <option value="x8">8 Kali Sesi</option>
                                    <option value="x12">12 Kali Sesi</option>
                                    <option value="x16">16 Kali Sesi</option>
                                  </select>
                                </div>
                            </div>

                           
                            <div class="col-md-12">
                                <div class="form-group p-3">
                                  <label for="">Pilih Hari</label>
                                  <select class="form-control" name="hari">
                                    <option value="">-- Pilihan --</option>
                                    <option value="Senin - Rabu">Senin - Rabu</option>
                                    <option value="Selasa - Kamis">Selasa - Kamis</option>
                                    <option value="Rabu - Jumat">Rabu - Jumat</option>
                                    <option value="Kamis - Sabtu">Kamis - Sabtu</option>
                                  </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group p-3">
                                  <label for="">Pilih Jam</label>
                                  <select class="form-control" name="jam">
                                    <option value="">-- Pilihan --</option>
                                    <option value="<?= date("08:00") ?> - <?= date("09:30") ?>"><?= date("08:00") ?> - <?= date("09:30") ?></option>
                                    <option value="<?= date("12:30") ?> - <?= date("14:00") ?>"><?= date("12:30") ?> - <?= date("14:00") ?></option>
                                    <option value="<?= date("14:00") ?> - <?= date("15:30") ?>"><?= date("14:00") ?> - <?= date("15:30") ?></option>
                                    <option value="<?= date("15:30") ?> - <?= date("17:00") ?>"><?= date("15:30") ?> - <?= date("17:00") ?></option>
                                    <option value="<?= date("17:00") ?> - <?= date("18:30") ?>"><?= date("17:00") ?> - <?= date("18:30") ?></option>
                                    <option value="<?= date("18:30") ?> - <?= date("20:00") ?>"><?= date("18:30") ?> - <?= date("20:00") ?></option>
                                  </select>
                                </div>
                            </div>

                           

                        </div>
                      </div>
                    </div>
           
                  
                    <input type="button" name="next" class="next action-button" value="Selanjutnya" /> <input type="button" name="previous" class="previous action-button-previous" value="Kembali" />
                  
                 
                </fieldset>

                <fieldset>
                    <div class="form-card">
                  <div class="pricing">
                    <div class="row">
                      <div class="col-md-4">
                        <span class="badge bg-info text-white">Transfer Ke :</span><br><hr>
                        <span class="badge"><img src="assets/images/bca.png" style="width:25%;" alt=""><h3>3150 : Eko Praditya</h3></span>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="">Tulis Nominal Transfer</label>
                          <input type="text" class="form-control" name="bukti_nominal" id="rupiah">
                        </div>
                       </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="">Upload Bukti Pembayaran</label>
                          <input type="file" class="form-control-file" name="bukti" id="bukti" placeholder="" aria-describedby="fileHelpId">
                          <small id="fileHelpId" class="form-text text-muted">Help text</small>
                        </div>
                       </div>

                       <?php include 'harga.php' ?>
                       
                      </div>
                    </div>
               
                    </div>
           
                  
                    <button type="submit" name="next" class="next action-button"/>Kirim</button> <input type="button" name="previous" class="previous action-button-previous" value="Kembali" />
                  
                 
                </fieldset>
            </form>
                    
     
        </div> <!-- container -->
            </div>
    </section>

    <script>
$(document).ready(function(){
$(".juls").hide();

    $('#tingkatan').on('change', function() {
      var ids = $('#' + this.value);

      if ( this.value == ids)
      {
        $('.juls').hide();
        $(ids).show();
      }
      else
      {
        $('.juls').hide();
        $(ids).show();
      }
    });
});
    $(document).ready(function(){
      
var current_fs, next_fs, previous_fs; //fieldsets
var opacity;
var current = 1;
var steps = $("fieldset").length;

setProgressBar(current);

$(".next").click(function(){

current_fs = $(this).parent();
next_fs = $(this).parent().next();

//Add Class Active
$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
next_fs.show();
//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
next_fs.css({'opacity': opacity});
},
duration: 500
});
setProgressBar(++current);
});

$(".previous").click(function(){

current_fs = $(this).parent();
previous_fs = $(this).parent().prev();

//Remove class active
$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
previous_fs.show();

//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
previous_fs.css({'opacity': opacity});
},
duration: 500
});
setProgressBar(--current);
});

function setProgressBar(curStep){
var percent = parseFloat(100 / steps) * curStep;
percent = percent.toFixed();
$(".progress-bar")
.css("width",percent+"%")
}

$(".submit").click(function(){
return false;
})

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
    </script>
    

<?php include 'footer.php' ?>