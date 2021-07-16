<?php include 'header.php' ?>
<?php 
include 'koneksi.php';
$id_studio = $_GET['id']; 
$sql1 = mysqli_query($koneksi, "SELECT * FROM studio WHERE id_studio='$id_studio'");
$i = mysqli_fetch_array($sql1);
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<section id="collection" style="margin-top: 100px;">
 <div class="container">
  <div class="row">
    <div class="events_home text-center clearfix">
     <p>Sofyan Music Club</p>
     <h1>Proses Booking</h1>
	 <hr>
   </div>
    <div class="collection clearfix">
	 <div class="col-md-6">
	  <div class="collection_left clearfix">
	    <div class="grid clearfix">
        <figure class="effect-marley">
            <img src="./admins/img/<?= $i['foto_studio'] ?>" alt="img12"/>
            <figcaption>
                <h2><?= $i['nama_studio'] ?></h2>
                <p><?= $i['ket_studio'] ?></p>
            <a href="#">View more</a></figcaption>			
		</figure>
	  </div>
	  </div>
	 </div>
	 <div class="col-md-6">
    <?php include 'alert.php' ?>

	<form action="book_pros.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_user" value="<?= $_SESSION['id'] ?>">
        <input type="hidden" name="id_studio" value="<?= $i['id_studio'] ?>">
        <div class="row">
            <div class="col-md-6">
                <div class="contact_home_right">
                    <label style="color: #ffffff;">Nama Kamu</label>
                    <input readonly value="<?= $_SESSION['nama'] ?>" type="text" class="form-control form_1" name="nama_customer" id="nama_customer" aria-describedby="helpId">
                </div>
            </div>

            <div class="col-md-6">
                <div class="contact_home_right">
                    <label style="color: #ffffff;">Pilih Tanggal Sewa</label>
                    <input type="text" class="form-control form_1" name="tgl_book" id="tanggal" aria-describedby="helpId" placeholder="Pilih Tanggal">

                </div>
            </div>
            <div class="col-md-6">

                <div class="contact_home_right">
                    <label style="color: #ffffff;">Pilih Jam Sewa</label>
                    <input onchange="CekJamSewa()" type="text" class="form-control form_1" name="jam_sewa" id="jam_sewa" aria-describedby="helpId" placeholder="Pilih Tanggal">

                </div>
            </div>

            <div class="col-md-6">
                <div class="contact_home_right">
                    <label style="color: #ffffff;">Harga Studio</label>
                    <input readonly value="Rp <?= number_format($i['harga_studio'],0,",","."); ?> / Jam" type="text" class="form-control form_1"  aria-describedby="helpId">
                    <input readonly value="<?= $i['harga_studio'] ?>" type="hidden" id="harga">
                
                </div>
            </div>

           

            <div class="col-md-12" id="inis">
                <div class="contact_home_right">
                    <label style="color: #ffffff;">Total Bayar</label>
                    <input value="" readonly type="text" class="form-control form_1" name="total_bayar" id="3" aria-describedby="helpId" placeholder="Total Bayar">
                </div>
            </div>

            <div class="col-md-6" id="subs" style="display: none;">
                <div class="contact_home_right">
                    <label style="color: #ffffff;">Upload Bukti Pembayaran</label>
                    <input type="file" class="form-control-file form_1" name="bukti" id="3" aria-describedby="helpId" placeholder="Pilih Tanggal">
                </div>
            </div>

            <div class="col-md-6" id="subs2" style="display: none;">
                <div class="contact_home_right">
                    <label style="color: #ffffff;">Nomor Rek : 128039978 (BCA)</label>
                </div>
            </div>

             <div class="col-md-12" id="subs1" style="display: none;">
                <div class="contact_home_right">
                    <button type="submit" class="btn btn-block btn-info"><i class="fa fa-check" aria-hidden="true"></i> Konfirmasi & Bayar</button>
                </div>
            </div>

           

            

       

        </div>
    </form>
	 </div>
	</div>
  </div>
 </div>
</section>

<script type="text/javascript">

function CekJamSewa(){
var jam_sewa = $("#jam_sewa").val();

if(jam_sewa != "00 - 23"){
var explode = jam_sewa.split(" - ");
var jam_awal = parseInt(explode[0]);
var jam_akhir = parseInt(explode[1]);
var total_jam = jam_akhir-jam_awal;
if(total_jam > 5 ){
alert("tidak boleh lebih dari 5 jam");
}else{
var jam_se = $("#jam_sewa").val();
var tanggal = $("#tanggal").val();

 $.ajax({
    method:"post",
    url:"CekKetersediaanJam.php",
    data:"jam_sewa="+jam_se+"&tanggal_sewa="+tanggal,
    success:function(data){
        var r = JSON.parse(data);

        if(r.status == 'success'){
        $("#inis").show();  
    $("#subs").show();  
    $("#subs1").show();  
    $("#subs2").show();
        }else{
            alert(r.message);
            $("#jam_sewa").val("00 - 23");
            
        }  
   

    } 
 });

     var i1 = parseFloat($("#harga").val());
      var i2 = total_jam;
      i1 = isNaN(i1) ? 0 : i1;
      i2 = isNaN(i2) ? 0 : i2;
      $("#3").val('Rp. ' + i1 * i2);
}
}
}

    $(document).ready(function(){
        $('input[name="tgl_book"]').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            showDropdowns: true,
            timePicker24Hour :true,
            locale: {
              format: 'DD-MM-YYYY '
            }
        });
    });


    $(function() {
  
   $('input[name="jam_sewa"]').daterangepicker({
    format: 'HH:mm',
    timePicker : true,
            timePicker24Hour : true,
            timePickerIncrement : 60,
            timePickerSeconds : false,
            locale : {
                format : 'HH'
            },
}).on('show.daterangepicker', function(ev, picker) {
            picker.container.find(".calendar-table").hide();
   }).on('dp.show', function () {
    $('a.btn[data-action="incrementMinutes"], a.btn[data-action="decrementMinutes"]').removeAttr('data-action').attr('disabled', true).hide();
    $('span.timepicker-minute[data-action="showMinutes"]').removeAttr('data-action').attr('disabled', true).text('00').hide();
}).on('dp.change', function () {
    $(this).val($(this).val().split(':')[0]+':00').hide()
    $('span.timepicker-minute').text('00').hide()
})
});


   
   

   /* $(function () {
        $("#inis").hide();  
        $("#subs").hide();  
        $("#subs1").hide();  
        $("#subs2").hide();  
  $("select").on('change',function () {
    $("#inis").show();  
    $("#subs").show();  
    $("#subs1").show();  
    $("#subs2").show();  
    $("#3").val(function () {
      var i1 = parseFloat($("#harga").val());
      var i2 = $('#jam_sewa').find(":selected").val();
      i1 = isNaN(i1) ? 0 : i1;
      i2 = isNaN(i2) ? 0 : i2;
      return ('Rp. ' + i1 * i2);
      
    });
  });
});


		*/

 </script>

<?php include 'footer.php' ?>