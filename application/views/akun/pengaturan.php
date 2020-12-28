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
			</div>
		</div>
		<div class="section-body">
			<!-- /.box-header -->
			<div class="box">
				<?php echo @$this->session->flashdata('msg'); ?>
				<div class="box-body">
					<div class="col-md-12">
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
								<form id="tab" action="<?=base_url("Akun/ubahProfil")?>" method="post">
									<!-- <br> -->

									<!-- <div class="col col-md-12 text-center">
									<img
									src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
									class="image-crop" alt="Responsive image">
								</div> -->
								<!-- <br> -->
								<!-- <div class="row">
								<div class="col-6 text-center">
								<label>ID : </label>
							</div>
							<div class="col-6 text-center">
							<label>Tipe : </label>
						</div>
					</div> -->

					<div class="col col-md-6">
						<?php $role = array('','','Administrator', 'Operator', 'Pemateri'); ?>
						<tr>
							<td>Role</td>
							<td> : <b><?=$role[$panitia->role]?></b></td>
						</tr>
					</div>
					<hr>
					<div class="col col-md-6">
						<label>Nama</label>
						<input type="text" name="nama" value="<?=$panitia->namalengkap?>" class="form-control">
					</div>
					<div class="col col-md-6">
						<br>
						<label>Email</label>
						<input type="email" name="email" value="<?=$panitia->email?>" class="form-control">
					</div>
					<div class="col col-md-6">
						<br>
						<label>No Handphone</label>
						<input type="text" name="nohp" value="<?=$panitia->nohp?>" class="form-control">
					</div>
					<div class="col col-md-6">
						<br>
						<label>Alamat</label>
						<textarea style="resize: none;" name="alamat" class="form-control"><?=$panitia->alamat_lengkap?></textarea>
					</div>
					<div class="col col-md-6 text-center">
						<br>
						<button type="submit" name="profil" class="btn btn-info col-md-12">Ubah Data</button>
					</div>
					<!-- </div> -->
				</form>
			</div>

			<div class="tab-pane container fade" id="tab_password">
				<form id="tab2" action="<?=base_url("Akun/gantiPassword")?>" method="post">
					<div class="col col-md-6">
						<br>
						<label>Password Lama</label>
						<input type="password" name="lama" class="form-control" required>
					</div>
					<div class="col col-md-6">
						<br>
						<label>Password Baru</label>
						<input type="password" name="baru" class="form-control" id="password" onkeyup="check()" required>
					</div>
					<div class="col col-md-6">
						<br>
						<label>Konfirmasi Password</label>
						<input type="password" name="konfirmasi" class="form-control" id="confirm_password" onkeyup="check()" required>
						<span id='message'></span>
					</div>
					<div class="col col-md-6 text-center">
						<br>
						<button type="submit" class="btn btn-info col-md-12" name="password">Ubah Password</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</section>
</div>
<script type="text/javascript">
var check = function() {
if (document.getElementById('password').value ==
	document.getElementById('confirm_password').value) {
	document.getElementById('message').style.color = 'green';
	document.getElementById('message').innerHTML = 'Berhasil';
} else {
	document.getElementById('message').style.color = 'red';
	document.getElementById('message').innerHTML = 'Tidak Sama';
}
}
</script>
