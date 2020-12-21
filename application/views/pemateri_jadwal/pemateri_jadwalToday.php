<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$id = $this->uri->segment(3);
?>

<style>
	.float {
		position: fixed;
		width: 60px;
		height: 60px;
		bottom: 40px;
		right: 40px;
		background-color: #0C9;
		color: #FFF;
		border-radius: 50px;
		text-align: center;
		box-shadow: 2px 2px 3px #999;
    z-index: 1 ;
    /* position:relative; */
	}

	.my-float {
		margin-top: 22px;
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
			<div class="card">
				<div class="card-body">
					<div class="col col-md-12 text-center" style="padding: 0;">
						<div class="col-md-12 text-center">
							<h1><strong>Rabu</strong></h1>
							<!-- <br> -->
							<span>00 Juni 2020</span>
						</div>
					</div>
					<ul class="list-group list-group-flush">
						<!-- item1 -->
						<li class="list-group-item">
							<p class="list-group-item-text float-right"><strong>08:30</strong></p>
							<br>
							<h4 class="list-group-item-heading">Judul Kegiatan</h4>
							<p class="list-group-item-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ad non id sed
								consectetur praesentium delectus repellendus eum maiores blanditiis eaque earum atque officia quaerat
								autem
								nam, harum quas quia tenetur?</p>
							<br>

							<div class="row">
								<div class="col-6 text-center">
									<small style="color:orange"><i class="fas fa-edit"></i> Ubah Data</small>
								</div>
								<div class="col-6 text-center ">
									<small style="color:red"><i class="fas fa-trash"></i> Hapus Data</small>
								</div>
							</div>
						</li>
						<!-- item2 -->
						<li class="list-group-item">
							<p class="list-group-item-text float-right"><strong>08:30</strong></p>
							<br>
							<h4 class="list-group-item-heading">Judul Kegiatan</h4>
							<p class="list-group-item-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ad non id sed
								consectetur praesentium delectus repellendus eum maiores blanditiis eaque earum atque officia quaerat
								autem
								nam, harum quas quia tenetur?</p>
							<br>

							<div class="row">
								<div class="col-6 text-center">
									<small style="color:orange"><i class="fas fa-edit"></i> Ubah Data</small>
								</div>
								<div class="col-6 text-center ">
									<small style="color:red"><i class="fas fa-trash"></i> Hapus Data</small>
								</div>
							</div>
						</li>
						<!-- item3 -->
						<li class="list-group-item">
							<p class="list-group-item-text float-right"><strong>08:30</strong></p>
							<br>
							<h4 class="list-group-item-heading">Judul Kegiatan</h4>
							<p class="list-group-item-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ad non id sed
								consectetur praesentium delectus repellendus eum maiores blanditiis eaque earum atque officia quaerat
								autem
								nam, harum quas quia tenetur?</p>
							<br>

							<div class="row">
								<div class="col-6 text-center">
									<small style="color:orange"><i class="fas fa-edit"></i> Ubah Data</small>
								</div>
								<div class="col-6 text-center ">
									<small style="color:red"><i class="fas fa-trash"></i> Hapus Data</small>
								</div>
							</div>
						</li>
					</ul>


				</div>
			</div>
		</div>
	</section>
</div>

<a href="<?php echo base_url('aktivitas/tambahAktivitas'); ?>" class="float">
	<i class="fas fa-plus my-float"></i>
</a>
