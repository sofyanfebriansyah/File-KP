<?php include 'header.php' ?>

<section id="collection" style="margin-top: 100px;">

 <div class="container">
   
  <div class="row">
    <div class="events_home text-center clearfix">
     <p>Praja Music Studio</p>
     <h1>Login User</h1>
	 <hr>
   </div>
   
    <div class="collection clearfix">
    <?php include 'alert.php' ?>

<form action="login_pros.php" method="POST">
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
    <h4><button type="submit" class="btn btn-info"><i class="fa fa-user" aria-hidden="true"></i> LOGIN</button></h4>
   </div>
  </form>
	</div>
  </div>
 </div>
</section>



<?php include 'footer.php' ?>