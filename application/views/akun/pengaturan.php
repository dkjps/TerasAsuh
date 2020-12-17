<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$id = $this->uri->segment(3);
?>

<style>
	.image-crop {
		object-fit: cover;
		width: 128px;
		height: 128px;
	}

</style>


<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1><?=$title?></h1>
			<div class="msg" style="display:none;">
				<?php echo @$this->session->flashdata('msg'); ?>
			</div>
		</div>
		<div class="section-body">
			<!-- /.box-header -->
			<div class="box">
				<div class="box-body">
					<ul class="nav nav-tabs">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#tab_profile">Pengaturan</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#tab_password">Ubah Password</a>
						</li>
					</ul>

					<div class="tab-content">
						<div class="tab-pane container active" id="tab_profile">
							<form id="tab">
								<br>

								<div class="col col-md-12 text-center">
									<img
										src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
										class="image-crop" alt="Responsive image">

								</div>
								<br>
								<div class="row">
									<div class="col-6 text-center">
										<label>ID : </label>
									</div>
									<div class="col-6 text-center">
										<label>Tipe : </label>
									</div>
								</div>

								<div class="col col-md-6">
									<label>Nama</label>
									<input type="text" class="form-control">
								</div>
								<div class="col col-md-6">
									<br>
									<label>Email</label>
									<input type="text" class="form-control">
								</div>
								<div class="col col-md-6">
									<br>
									<label>No Handphone</label>
									<input type="text" class="form-control">
								</div>
								<div class="col col-md-6">
									<br>
									<label>Alamat</label>
									<textarea style="resize: none;" class="form-control"></textarea>
								</div>

								<div class="row">
									<div class="col col-md-6 text-center">
										<br>
                    <a href="#" class="btn btn-warning" role="button" aria-pressed="true"><i class="fas fa-file-signature" ></i> Ubah Foto</a>					
									</div>
									<div class="col col-md-6 text-center">
										<br>
                    <a href="#" class="btn btn-info " role="button" aria-pressed="true"><i class="fas fa-save" ></i> Simpan Data</a>
									</div>
								</div>

							</form>

						</div>

						<div class="tab-pane container fade" id="tab_password">

							<form id="tab2">
								<div class="col col-md-6">
									<br>
									<label>Password Lama</label>
									<input type="password" class="form-control">
								</div>
								<div class="col col-md-6">
									<br>
									<label>Password Baru</label>
									<input type="password" class="form-control">
								</div>
								<div class="col col-md-6">
									<br>
									<label>Password Baru Lagi</label>
									<input type="password" class="form-control">
								</div>
								<div class="col col-md-6 text-center">
									<br>
									<button class="btn btn-primary">Simpan Password</button>
								</div>
							</form>

						</div>
					</div>


				</div>

			</div>
		</div>



	</section>
</div>
