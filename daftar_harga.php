<?php include 'header.php' ?>   
<section id="videos" style="margin-top:100px;">
 <div class="container">
  <div class="row">
   <div class="events_home text-center clearfix">
     <p>Praja Music Studio</p>
     <h1>Daftar Harga Sewa Studio</h1>
	 <hr>
   </div>

   <div class="videos clearfix">
  <?php
  include 'koneksi.php';
  $sql1 = mysqli_query($koneksi, "SELECT * FROM studio");
  while ($i = mysqli_fetch_array($sql1)){?>
   
	  <div class="col-md-6" style="margin-top:20px;">
	   <div class="videos_inner clearfix">
	     <div class="grid clearfix">
					<figure class="effect-dexter">
						<img src="admins/img/<?= $i['foto_studio'] ?>" alt="img12"/>
						<figcaption>
							<h2><span><?= $i['nama_studio']?></span></h2>
							<p><?= $i['ket_studio'] ?></p>
						<a href="daftar.php?id=<?= $i['id_studio']; ?>">View more</a>						</figcaption>			
		  </figure>
	  </div>
	     <h4 class="text-center">Rp <?= number_format($i['harga_studio'],0,",","."); ?> / Jam</h4>
	   </div>
	  </div>
	 
  <?php } ?>
   


   </div>
  </div>
 </div>
</section>

<?php include 'footer.php' ?>   