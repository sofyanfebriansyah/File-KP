<?php include 'header.php' ?>
<?php 
include 'koneksi.php';
$id_studio = $_GET['id']; 
$sql1 = mysqli_query($koneksi, "SELECT * FROM studio WHERE id_studio='$id_studio'");
$i = mysqli_fetch_array($sql1);
?>
<section id="collection" style="margin-top: 100px;">
 <div class="container">
  <div class="row">
    <div class="events_home text-center clearfix">
     <p>Praja Music Studio</p>
     <h1>Studio Pilihan Kamu</h1>
	 <hr>
   </div>
    <div class="collection clearfix">
	 <div class="col-sm-6">
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
	 <div class="col-sm-6">
	  <div class="collection_right clearfix">
	   <div class="collection_right_inner clearfix">
	     <p>Studio - Kami</p>
		 <h3><?= $i['nama_studio'] ?></h3>
	   </div>
	   <div class="collection_right_inner_1 clearfix">
	     <div class="col-sm-9 space_left">
		    <div class="collection_right_inner_1_left clearfix">
			 <p><?= $i['ket_studio'] ?></p>
			</div>
		 </div>
		 <div class="col-sm-3">
		   <div class="collection_right_inner_1_right clearfix">
		     <p>Rp <?= number_format($i['harga_studio'],0,",","."); ?> / Jam</p>
		   </div>

		 </div>
		 <a href="daftar_harga.php" class="btn btn-danger"><i class="fa fa-backward" aria-hidden="true"></i> Pilih Studio Lain</a>

		 <a href="proses.php?id=<?= $i['id_studio'] ?>" class="btn btn-info"><i class="fa fa-music" aria-hidden="true"></i> Proses Booking</a>

	   </div>
	   
	  </div>
	 </div>
	</div>
  </div>
 </div>
</section>



<?php include 'footer.php' ?>