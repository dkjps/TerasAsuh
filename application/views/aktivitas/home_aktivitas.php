<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$id = $this->uri->segment(3);
date_default_timezone_set("Asia/Jakarta");
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

#artikel:hover{
	transition: 0.1s;
	background: #FAFAFA;
	margin-left: 20px;
}

#btnDate:hover{
	cursor: pointer;
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
							<form class="" action="<?=base_url("Aktivitas/aktivitasDaftar")?>" method="get">
								<div class="row" style="">
									<!-- <div class="form-group col-md-10"> -->
										<input style="width:60%; margin-left:10%;" class="form-control text-center border-secondary" type="date" name="tanggal" value="<?=(!empty($tgl)?date("Y-m-d", strtotime($tgl)):date("Y-m-d"))?>">
									<!-- </div>
									<div class="form-group col-md-2"> -->
										<button style="width:20%; margin-left:10px;" class="form-control btn btn-secondary" type="submit" name="submit"><i class="fas fa-search"></i> </button>
									<!-- </div> -->
								</div>
							</form>
							<hr><br>
							<div class="row" style="margin:auto;">
									<form class="" action="<?=base_url("Aktivitas/aktivitasDaftar/$prev")?>" method="post" style="width:15%;">
										<!-- <input style="display:none;" class="form-control text-center border-secondary" type="date" name="tanggal" value="<?=(!empty($prev)?date("Y-m-d", strtotime($prev)):date("Y-m-d"))?>"> -->
										<button id="btnDate" style="background:transparent; border:none;" class="text-secondary mr-3" type="submit" name="submit"><i style="font-size:35px;" class="fas fa-chevron-left"></i></button>
									</form>
									<!-- <div class="">
								</div>
								<div class=""> -->
									<h2 style="width:70%;"><strong><?=date('l', strtotime($tgl))?></strong></h2>
								<!-- </div>
								<div class=""> -->
									<form class="" action="<?=base_url("Aktivitas/aktivitasDaftar/$next")?>" method="post" style="width:15%;">
										<!-- <input style="display:none;" class="form-control text-center border-secondary" type="date" name="tanggal" value="<?=(!empty($next)?date("Y-m-d", strtotime($next)):date("Y-m-d"))?>"> -->
										<button id="btnDate" style="background:transparent; border:none;" class="text-secondary ml-3" type="submit" name="submit"><i style="font-size:35px;" class="fas fa-chevron-right"></i></button>
									</form>
								<!-- </div> -->
							</div>
							<span class=""><?=date('d F yy', strtotime($tgl)); ?></span>
						</div>
					</div>
						<!-- item1 -->
						<ul class="list-group list-group-flush">
						<?php if ($today): ?>
							<?php foreach ($today as $t){ ?>
							<li class="list-group-item rounded mt-3" style="border:1px solid black; width:90%; margin:auto;" id="artikel">
								<p class="list-group-item-text float-right"><strong><?=date("H:i",strtotime($t->jam))?></strong></p>
								<h4 class="list-group-item-heading"><?=$t->nama?></h4>
								<hr>
								<p class="list-group-item-text text-justify" style="text-indent:20px;">
									<?=$t->deskripsi?>
								</p>

								<div class="col-md-12">
									<?php if ($visible): ?>
										<button type="button" onclick="konfirmasiHapus('<?=base_url("")?>')" class="float-right btn btn-danger text-white"><i class="fas fa-trash"></i> Hapus</button>
										<a class="float-right btn btn-warning text-white mr-3"><i class="fas fa-edit"></i> Ubah</a>
									<?php endif; ?>
								</div>
							</li>
						<?php } ?>
						<?php else: ?>
							<br>
							<div class="alert alert-danger text-center">
								Aktivitas Kosong
							</div>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</section>
</div>

<a href="<?php echo base_url('aktivitas/tambahAktivitas'); ?>" class="float">
	<i class="fas fa-plus my-float"></i>
</a>
