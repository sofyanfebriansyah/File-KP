<?php 
		if(isset($_GET['alert'])){
			if($_GET['alert']=="berhasil_studio_tambah"){
				?>
				<div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center mt-2">
			<!-- Then put toasts within -->
			<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
			<div class="toast-body bg-success text-white text-center">
				Data Studio Ditambahkan
			</div>
			</div>
			</div>	 								
				<?php
            }elseif($_GET['alert']=="gagal_studio_tambah"){
				?>
				<div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center mt-2">
                    <!-- Then put toasts within -->
                    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
                    <div class="toast-body bg-danger text-white text-center">
                        Data Studio Gagal Ditambahkan
                    </div>
                    </div>
                    </div>	 								
				<?php
			} elseif($_GET['alert']=="berhasil_studio_status"){
				?>
				<div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center mt-2">
                    <!-- Then put toasts within -->
                    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
                    <div class="toast-body bg-success text-white text-center">
                        Status Studio berhasil diubah
                    </div>
                    </div>
                    </div>	 			
				<?php
            } elseif($_GET['alert']=="berhasil_studio_hapus"){
				?>
				<div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center mt-2">
                    <!-- Then put toasts within -->
                    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
                    <div class="toast-body bg-success text-white text-center">
                        Data Studio Berhasil Dihapus
                    </div>
                    </div>
                    </div>	 			
				<?php
                }elseif($_GET['alert']=="berhasil_studio_edit"){?>
				<div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center mt-2">
                    <!-- Then put toasts within -->
                    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
                    <div class="toast-body bg-success text-white text-center">
                        Data Studio Berhasil Diedit
                    </div>
                    </div>
                    </div>	 
                 <?php } elseif($_GET['alert']=="gagal_studio_edit"){?>
                    <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center mt-2">
                        <!-- Then put toasts within -->
                        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
                        <div class="toast-body bg-danger text-white text-center">
                            Data Studio Gagal Diedit
                        </div>
                        </div>
                        </div>	 <?php } ?>
                

           <?php }?>
