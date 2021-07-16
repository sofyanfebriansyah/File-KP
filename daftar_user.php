<?php include 'header.php' ?>

<section id="collection" style="margin-top: 100px;">
 <div class="container">
  <div class="row">
    <div class="events_home text-center clearfix">
     <p>Praja Music Studio</p>
     <h1>Daftar User</h1>
	 <hr>
   </div>
    <div class="collection clearfix">
    <?php include 'alert.php' ?>

<form action="daftar_pros.php" method="POST">
    <div class="col-sm-6">
        <div class="contact_home_right">
          <input type="text" class="form-control form_1" name="nik" id="nik" aria-describedby="helpId" placeholder="Masukan Nik">
        </div>
	 </div>

     <div class="col-sm-6">
        <div class="contact_home_right">
          <input type="text" class="form-control form_1" name="nama" id="nama" aria-describedby="helpId" placeholder="Masukan Nama">
        </div>
	 </div>

     <div class="col-sm-6">
        <div class="contact_home_right">
          <input type="text" class="form-control form_1" name="email" id="email" aria-describedby="helpId" placeholder="Masukan Email">
        </div>
	 </div>

   <div class="col-sm-6">
        <div class="contact_home_right">
          <input type="text" class="form-control form_1" name="band" id="band" aria-describedby="helpId" placeholder="Masukan Nama Band">
        </div>
	 </div>
     
     <div class="col-sm-6">
        <div class="contact_home_right">
          <input type="text" class="form-control form_1" name="personil" id="personil" aria-describedby="helpId" placeholder="Masukan Jumlah Personil">
        </div>
	 </div>

	 <div class="col-sm-6">
        <div class="contact_home_right">
          <input type="text" class="form-control form_1" name="username" id="username" aria-describedby="helpId" placeholder="Masukan Username">
        </div>
	 </div>

	 <div class="col-sm-6">
	    <div class="contact_home_right">
        <input type="password" class="form-control form_1" name="password" id="password" aria-describedby="helpId" placeholder="Masukan Password">
      </div>
	 </div>
     

   <div class="col-sm-12">
    <h4><button type="submit" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i> Daftar User</button></h4>
   </div>
  </form>
	</div>
  </div>
 </div>
</section>



<?php include 'footer.php' ?>