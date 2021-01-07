<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$id = $this->uri->segment(3);
// var_dump($_SESSION);
// echo $_SESSION['id'];
?>

<div class="main-content">
	<section class="section">
		<div class="section-header">
			<a href="javascript:window.history.go(-1);" class="fas fa-chevron-left text-dark" style="font-size:20px; margin-left:25px;"></a>
			<h1><?=$title?></h1>
			<div class="msg" style="display:none;">
				<?php echo @$this->session->flashdata('msg'); ?>
			</div>
		</div>
		<div class="section-body">

			<div class="box">
				<div class="box-body">
					<div class="col-md-12">
					<form method="post" action="<?=base_url("Aktivitas/$action"."Aktivitas/$id")?>">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputNamaPelatihan">Nama Aktivitas</label>
								<input type="text" class="form-control" id="inputEmail4" name="nama" placeholder="Nama Aktivitas" value="<?=(!empty($detail)?$detail->nama:'');?>" required>
							</div>
							<?php
								$tgl = (!empty($detail))?date("yy-m-d",strtotime($detail->tanggal)):date("Y-m-d");
								$jam = (!empty($detail))?date("H:i",strtotime($detail->jam)):date("H:i");
							?>
							<div class="form-group col-md-12">
								<label for="inputTanggalPelatihan">Waktu Aktivitas</label>
								<div class="row">

								<div class="col-md-3">
									<span  class="form-text text-muted" >Tanggal</span>
									<input type="date" class="form-control" id="namaKelas" name="tgl" value="<?=$tgl?>" readonly required>
								</div>
								<div class="col-md-3">
									<span class="form-text text-muted" >Jam</span>
									<input type="time" class="form-control" id="namaKelas" name="jam" value="<?=$jam?>" required>
								</div>
							</div>
							</div>
						</div>


						<div class="form-group">
							<label for="exampleFormControlTextarea1">Deskripsi Aktivitas</label>
							<textarea class="form-control col-md-6" id="exampleFormControlTextarea1" name="deskripsi" rows="3" style="resize:none" required><?=(!empty($detail)?$detail->deskripsi:'');?></textarea>
						</div>

						<!-- <div class="row"> -->
							<!-- <div class="col col-md-12 text-center"> -->
								<div class="form-group">
								<!-- <a href="<?=base_url("Aktivitas")?>" class="btn btn-danger"><i class="fa fa-undo"></i> Kembali</a> -->
								<button type="submit" name="submit" class="btn btn-primary col-md-6"><i class="fas fa-plus"></i> Simpan</button>
							</div>
						<!-- </div> -->

					</form>
				</div>
				</div>
			</div>
		</div>
	</section>
</div>
