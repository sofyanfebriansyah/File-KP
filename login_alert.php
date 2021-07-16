<?php 
		if(isset($_GET['alert'])){
			if($_GET['alert']=='gagal_ukosong'){
				?>
				<div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-warning"></i> Peringatan !</h4>
					Username tidak Boleh Kosong
				</div>								
				<?php
			}elseif($_GET['alert']=="gagal_pkosong"){
				?>
				<div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-check"></i> Peringatan !</h4>
					Password Tidak Boleh Kosong
				</div> 								
				<?php
			}elseif($_GET['alert']=="berhasil"){
				?>
				<div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center mt-2">
			<!-- Then put toasts within -->
			<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
			<div class="toast-body bg-success text-white text-center">
				Registrasi berhasil, silahkan cek email anda untuk link konfirmasi.
			</div>
			</div>
			</div>	 								
				<?php
			}elseif($_GET['alert']=="berhasil_confirm"){
				?>
				<div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center mt-2">
			<!-- Then put toasts within -->
			<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
			<div class="toast-body bg-success text-white text-center">
				Email anda berhasil dikonfirmasi.
			</div>
			</div>
			</div>	 								
				<?php
            }elseif($_GET['alert']=="gagal_psalah"){
				?>
				<div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-check"></i> Peringatan !</h4>
					Password Salah
				</div> 								
				<?php
			}elseif($_GET['alert']=="gagal_usalah"){
				?>
				<div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-check"></i> Peringatan !</h4>
					Username Salah
				</div> 								
				<?php
			}elseif($_GET['alert']=="gagal_confirm"){
				?>
				<div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center mt-2">
			<!-- Then put toasts within -->
			<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
			<div class="toast-body bg-warning text-white text-center">
				Anda belum mengkonfirmasi pendaftaran anda, silhakan cek email anda.
			</div>
			</div>
			</div>	 								
				<?php
			}elseif($_GET['alert']=="berhasil_out"){
				?>
				<div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center mt-2">
			<!-- Then put toasts within -->
			<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
			<div class="toast-body bg-success text-white text-center">
				Anda berhasil logout.
			</div>
			</div>
			</div>	 								
				<?php
			}elseif($_GET['alert']=="gagal_aja"){
				?>
				<div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center mt-2">
			<!-- Then put toasts within -->
			<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
			<div class="toast-body bg-danger text-white text-center">
				Username atau Password salah.
			</div>
			</div>
			</div>									
				<?php
			}elseif($_GET['alert']=="harus_login"){
				?>
				<div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center mt-2">
			<!-- Then put toasts within -->
			<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
			<div class="toast-body bg-warning text-white text-center">
				Anda harus login terlebih dahulu.
			</div>
			</div>
			</div>								
				<?php
			}elseif($_GET['alert']=="berhasil_kursus"){
				?>
						<!-- Flexbox container for aligning the toasts -->
			<div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center mt-2">
			<!-- Then put toasts within -->
			<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
			<div class="toast-body bg-success text-white text-center">
				Anda berhasil mendaftar sebagai siswa kursus, cek jadwal lebih lanjut di page user.
			</div>
			</div>
			</div>						
				<?php
            }elseif($_GET['alert']=="berhasil_login"){
				?>
						<!-- Flexbox container for aligning the toasts -->
			<div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center mt-2">
			<!-- Then put toasts within -->
			<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
			<div class="toast-body bg-success text-white text-center">
				Halo <?= $_SESSION['nama'] ?>, Selamat Datang.
			</div>
			</div>
			</div>						
				<?php
            }elseif($_GET['alert']=="gagal_gamasuk"){
				?>
						<!-- Flexbox container for aligning the toasts -->
			<div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center mt-2">
			<!-- Then put toasts within -->
			<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
			<div class="toast-body bg-danger text-white text-center">
				Data yang kamu masukan error
			</div>
			</div>
			</div>						
				<?php
            }
		}
		?>
