<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$id = $this->uri->segment(3);
?>

<style>
	ul.horizontal-slide {
		margin: 0;
		padding: 0;
		width: 100%;
		white-space: nowrap;
		overflow-x: auto;
	}

	ul.horizontal-slide li[class*="span"] {
    padding : 8px;
		display: inline-block;
		float: none;
	}

	ul.horizontal-slide li[class*="span"]:first-child {
		margin-left: 0;
	}

	ul.horizontal-slide li.active {
		color: #f4ba51;
		border-style: solid;
		border-width: 1px;
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
			<div class="body">
				<div class="box-body">

					<div class="container-fluid">
						<ul class="horizontal-slide">

							<li class="span2 col-xs-3 text-center active" style="margin-right:4px; margin-right:4px;">
								<h4><strong>Rabu</strong></h1>
									<span>01 Juni</span>
							</li>

							<li class="span2 col-xs-3 text-center" style="margin-right:4px; margin-right:4px;">
								<h4><strong>Kamis</strong></h1>
									<span>02 Juni</span>
							</li>

							<li class="span2 col-xs-3 text-center" style="margin-right:4px; margin-right:4px;">
								<h4><strong>Jumat</strong></h1>
									<span>03 Juni</span>
							</li>

							<li class="span2 col-xs-3 text-center" style="margin-right:4px; margin-right:4px;">
								<h4><strong>Sabtu</strong></h1>
									<span>04 Juni</span>
							</li>

							<li class="span2 col-xs-3 text-center" style="margin-right:4px; margin-right:4px;">
								<h4><strong>Minggu</strong></h1>
									<span>05 Juni</span>
							</li>

							<li class="span2 col-xs-3 text-center" style="margin-right:4px; margin-right:4px;">
								<h4><strong>Senin</strong></h1>
									<span>06 Juni</span>
							</li>

							<li class="span2 col-xs-3 text-center" style="margin-right:4px; margin-right:4px;">
								<h4><strong>Selasa</strong></h1>
									<span>07 Juni</span>
							</li>

							<li class="span2 col-xs-3 text-center" style="margin-right:4px; margin-right:4px;">
								<h4><strong>Rabu</strong></h1>
									<span>08 Juni</span>
							</li>

							<li class="span2 col-xs-3 text-center" style="margin-right:4px; margin-right:4px;">
								<h4><strong>Kamis</strong></h1>
									<span>09 Juni</span>
							</li>
						</ul>

					</div>
					<br>

					<div class="col-md-6 text-center">
						<h4>Daftar Aktivitas</h4>
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
								<div class="col-12 text-center ">
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
								<div class="col-12 text-center ">
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
								<div class="col-12 text-center ">
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
