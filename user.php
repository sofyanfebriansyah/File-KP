<?php include 'header.php' ?> 

<style>
 .tab-container{
	margin: 5% 10%;
	background-color: #c1e3d9;
	padding: 3%;
	border-radius: 4px;
}
.tab-menu{}
.tab-menu ul{
	margin: 0;
	padding: 0;
}
.tab-menu ul li{
	list-style-type: none;
	display: inline-block;
}
.tab-menu ul li a{
	text-decoration: none;
	color: rgba(0,0,0,0.4);
	background-color: #b4cbc4;
	padding: 7px 25px;
	border-radius: 4px;
}
.tab-menu ul li a.active-a{
	background-color: #588d7d;
	color: #ffffff;
}
.tab{
	display: none;
}
.tab h2{
	color: rgba(0,0,0,.7);
}
.tab p{
	color: rgba(0,0,0,0.6);
	text-align: justify;
}
.tab-active{
	display: block;
}
</style>  
<section id="videos" style="margin-top:100px;">
 <div class="container">
  <div class="row">
   <div class="events_home text-left clearfix">
     <p>Praja Music Studio</p>
     <h1>Hai, <?= $_SESSION['nama'] ?></h1>
    <?php include 'alert.php' ?>
     
   </div>

   <div class="videos clearfix">
    <div class="row">
        <div class="col-md-12 text-center">
   
            <?php
            include 'koneksi.php';
            $id_user = $_SESSION['id'];
            $sql = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_user = '$id_user'");
            $sql1 = mysqli_fetch_array($sql);
            
            $sql2 = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id_user'");
            $sql3 = mysqli_fetch_array($sql2);
            
            if (!$sql1 == '') {
                $id_studio = $sql1['id_studio'];
                $sql4 = mysqli_query($koneksi, "SELECT * FROM studio WHERE id_studio = '$id_studio'");
                $sql5 = mysqli_fetch_array($sql4);
            }
           
            ?>
<div class="tab-container">
    <div class="tab-menu">
          <ul>
             <li><a href="#" class="tab-a active-a" data-id="tab1">Tiket</a></li>
             <li><a href="#" class="tab-a" data-id="tab2">Transaksi</a></li>
             <li><a href="#" class="tab-a" data-id="tab3">Profil</a></li>
          </ul>
       </div><!--end of tab-menu-->
       <div class="tab tab-active" data-id="tab1">
             <h2 style="margin-top:20px;">Tiket Studio</h2>
             <div class="text-right">
             <a href="cetakPdf.php?id_user=<?= $id_user ?>" class="btn btn-info" style="margin-top:20px; margin-bottom:20px;"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Cetak Tiket</a>
             </div>
            <table class="table table-striped" border="0px">
                <tr class="info">
                    <th width="20%">Nama Band</th>
                    <td width="1%">:</td>
                    <td><?= $sql3['band'] ?></td>
                </tr>
                <tr class="info">
                    <th>Jumlah Personil</th>
                    <td>:</td>
                    <td><?= $sql3['personil'] ?> Orang</td>
                </tr>
                <tr class="info">
                    <th class="text-right">Studio Yang Dipilih : </th>
                    <?php
                    if ($sql1 == '') {?>
                        <td colspan="2" style="text-align: left;"><span class="label label-danger">Belum ada Transaksi</span></td>

                   <?php }else{ ?>
                    <td colspan="2" style="text-align: left;"><span class="label label-info"><?= $sql5['nama_studio'] ?></span></td>
                  <?php } ?>
                </tr>
                <tr class="info">
                    <th class="text-right">Tanggal Pesan : </th>
                    <?php
                    if ($sql1 == '') {?>
                        <td colspan="2" style="text-align: left;"><span class="label label-danger">Belum ada Transaksi</span></td>

                   <?php }else{ ?>
                    <td colspan="2" style="text-align: left;"><span class="label label-info"><?= $sql1['tgl_book'] ?></span></td>
                  <?php } ?>
                </tr>
                <tr class="info">
                    <th class="text-right">Jam Pesan : </th>
                    <?php
                    if ($sql1 == '') {?>
                        <td colspan="2" style="text-align: left;"><span class="label label-danger">Belum ada Transaksi</span></td>

                   <?php }else{ ?>
                    <td colspan="2" style="text-align: left;"><span class="label label-info"><?= $sql1['jam_book'] ?> Jam</span></td>
                  <?php } ?>
                </tr>
              
            </table>

       </div><!--end of tab one-->
       
       <div class="tab" data-id="tab2">
        <h2 style="margin-top:20px;">Detail Transaksi Kamu.</h2>
        <div class="text-right">
        <a href="cetakPdf1.php?id_user=<?= $id_user ?>" class="btn btn-info" style="margin-top:20px; margin-bottom:20px;"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Cetak Tiket (PDF)</a>
        <a href="cetakPrint1.php?id_user=<?= $id_user ?>" class="btn btn-info" style="margin-top:20px; margin-bottom:20px;"><i class="fa fa-print" aria-hidden="true"></i> Print Tiket</a>
       </div>
       <?php if ($sql1 == '') { ?>
           <span class="label label-danger" style="font-size: 20px;">Kamu Belum Melakukan Transaksi</span>
     <?php  } else { 
        $sqlz = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_user = '$id_user'");
        while ($i = mysqli_fetch_array($sqlz)){
        $no = 1;?>
        <table class="table table-striped">
            <thead>
                <td>No</td>
                <td>Nama</td>
                <td>Tanggal</td>
                <td>Jam</td>
                <td>Total Bayar</td>
                <td>Tanggal Pembayaran</td>
            </thead>
            <tbody>
                <td><?= $no++ ?></td>
                <td><?= $i['nama_customer'] ?></td>
                <td><?= $i['tgl_book'] ?></td>
                <td><?= $i['jam_book'] ?> Jam</td>
                <td>Rp <?= number_format($i['total_bayar'],0,",","."); ?></td>
                <td><?= $i['tanggal_dibuat'] ?></td>
            </tbody>
        </table>
        <?php } }?>
       

  </div><!--end of tab one-->

       <div class="tab" data-id="tab3">
        
        <h2 style="margin-top:20px;">Profil Kamu <span class="label label-warning" style="font-size: 12px;">Terakhir Diupdate Pada : <?= $sql3['tanggal_diupdate'] ?></span></h2>
        
        <div class="row">
            <form action="editUser.php" method="POST">
                <input type="hidden" name="id" value="<?= $_SESSION['id'] ?>">
            <div class="col-md-6">
                <div class="form-group">
                  <label for="">Nik</label>
                  <input value="<?= $sql3['nik'] ?>" type="text" class="form-control" name="nik" id="nik" aria-describedby="helpId" placeholder="">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                  <label for="">Nama</label>
                  <input value="<?= $sql3['nama'] ?>" type="text" class="form-control" name="nama" id="nama" aria-describedby="helpId" placeholder="">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                  <label for="">Email</label>
                  <input value="<?= $sql3['email'] ?>" type="text" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                  <label for="">Nama Band</label>
                  <input value="<?= $sql3['band'] ?>" type="text" class="form-control" name="band" id="band" aria-describedby="helpId" placeholder="">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                  <label for="">Personil</label>
                  <input value="<?= $sql3['personil'] ?>" type="text" class="form-control" name="personil" id="personil" aria-describedby="helpId" placeholder="">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                  <label for="">Username</label>
                  <input readonly value="<?= $sql3['username'] ?>" type="text" class="form-control" name="username" id="username" aria-describedby="helpId" placeholder="">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                  <label for="">Password Sekarang</label>
                  <input readonly value="R A H A S I A" type="text" class="form-control" aria-describedby="helpId" placeholder="">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                  <label for="">Ubah Password</label>
                  <input type="text" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Kosongkan jika tidak ingin dirubah">
                </div>
            </div>

            <div class="col-md-12">
                <div class="text-right">
                    <button class="btn-block btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i> Ubah Profil</button>
                </div>
            </div>
        </form>

            
        </div>
       

  </div><!--end of tab one--> 


    </div><!--end of container-->
        </div>
    </div>
    </div>
   </div>
  </div>
</section>



<script>
$(document).ready(function(){ 
    $('.tab-a').click(function(){  
      $(".tab").removeClass('tab-active');
      $(".tab[data-id='"+$(this).attr('data-id')+"']").addClass("tab-active");
      $(".tab-a").removeClass('active-a');
      $(this).parent().find(".tab-a").addClass('active-a');
     });
});


</script>
<?php include 'footer.php' ?>   