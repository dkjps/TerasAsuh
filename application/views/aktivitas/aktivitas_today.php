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

#artikel:hover{
	transition: 0.1s;
	background: #FAFAFA;
	margin-left: 20px;
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
							<h1><strong><?=date('l')?></strong></h1>
							<!-- <br> -->
							<span><?=date('d F yy'); ?></span>
						</div>
					</div>
					<ul class="list-group list-group-flush">
						<!-- item1 -->
						<?php foreach ($today as $t){ ?>
						<li class="list-group-item rounded mt-3" style="border:1px solid black;" id="artikel">
							<p class="list-group-item-text float-right"><strong><?=date("H:i",strtotime($t->jam))?></strong></p>

							<h4 class="list-group-item-heading"><?=$t->nama?></h4>
							<hr>
							<p class="list-group-item-text text-justify" style="text-indent:20px;">
								<?=$t->deskripsi?>
							</p>

							<div class="col-md-12">
									<button type="button" onclick="konfirmasiHapus('<?=base_url("")?>')" class="float-right btn btn-danger text-white"><i class="fas fa-trash"></i> Hapus</button>
									<a class="float-right btn btn-warning text-white mr-3"><i class="fas fa-edit"></i> Ubah</a>
								</div>
						</li>
					<?php } ?>
					</ul>
				</div>
			</div>
		</div>
	</section>
</div>

<a href="<?php echo base_url('aktivitas/tambahAktivitas'); ?>" class="float">
	<i class="fas fa-plus my-float"></i>
</a>
