<?php include 'header.php' ?>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<link rel="stylesheet" href="stepper.css">

<section id="pricing" class="pricing-area pt-95 pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center pb-20">
                        <h4 class="title">Daftar Kursus</h4>
                        <p class="text">Program Kursus</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <form action="proses_kursus.php" id="msform" method="post" enctype="multipart/form-data">
                <ul id="progressbar">
                        <li class="active" id="personal"><strong>Data Diri</strong></li>
                        <li id="account"><strong>Akun</strong></li>
                        <li id="payment"><strong>Pembayaran</strong></li>
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
                          <h4 class="steps text-center">Form Data Diri</h4>
           
                    <div class="pricing">
                      <div class="row">
                        <div class="col-md-4">
                            <div class="form-group p-3">
                              <label for="">Masukan Nomor KTP/Kartu Pelajar</label>
                              <input type="number" class="form-control" name="nik" id="nik" aria-describedby="helpId" placeholder="">
                              <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group p-3">
                              <label for="">Masukan Nama</label>
                              <input type="text" class="form-control" name="nama" id="nama" aria-describedby="helpId" placeholder="">
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
                              <input type="email" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="">
                              <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>
                        </div>

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

                        <div class="col-md-12">
                            <div class="form-group p-3">
                              <label for="">Pilih Tingkatan</label>
                              <select class="form-control" name="tingkatan" id="tingaktan">
                                <option value="" selected>-- Pilihan --</option>
                                <option value="basic1">Basic - 1</option>
                                <option value="basic2">Basic - 2</option>
                                <option value="intermediate1">Intermediate - 1</option>
                                <option value="intermediate2">Intermediate - 2</option>
                                <option value="advance1">Advance - 1</option>
                                <option value="advance2">Advance - 2</option>
                                <option value="conversation1">Conversation - 1</option>
                                <option value="conversation2">Conversation - 2</option>

                              </select>
                            </div>
                        </div>
                      
                        </div>
                      </div>
                 
                </div>
                   
                        <input type="button" name="next" class="next action-button" value="Selanjutnya" />
              
                </fieldset>

                <fieldset>
                    <div class="form-card">
                        <h4 class="steps text-center">Form Akun</h4>
                        <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" class="form-control" name="username" id="username" aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">Help text</small>
                          </div>
                        </div>
                     
                       
                            
                     

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Password</label>
                          <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="">
                          <small id="helpId" class="form-text text-muted">Help text</small>
                        </div>
                      </div>
                      </div>
                    </div>
           
                  
                    <input type="button" name="next" class="next action-button" value="Selanjutnya" /> <input type="button" name="previous" class="previous action-button-previous" value="Kembali" />
                  
                 
                </fieldset>

                <fieldset>
                    <div class="form-card">
                        <h4 class="steps text-center">Form Pembayaran</h4>
         
                  <div class="pricing">
                    <div class="row">
                      <div class="col-md-6">
                        <span class="badge bg-info text-white">Transfer Ke :</span><br><hr>
                        <span class="badge"><img src="assets/images/bca.png" style="width:25%;" alt=""><h3>3150 : Eko Praditya</h3></span>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Upload Bukti Pembayaran</label>
                          <input type="file" class="form-control-file" name="bukti" id="bukti" placeholder="" aria-describedby="fileHelpId">
                          <small id="fileHelpId" class="form-text text-muted">Help text</small>
                        </div>
                       </div>
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
    </script>
    

<?php include 'footer.php' ?>