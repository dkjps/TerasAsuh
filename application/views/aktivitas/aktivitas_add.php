<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$id = $this->uri->segment(3);
?>

<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1><?=$title?></h1>
			<div class="msg" style="display:none;">
				<?php echo @$this->session->flashdata('msg'); ?>
			</div>
		</div>
		<div class="section-body">

			<div class="box">
				<div class="box-body">
					<form>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputNamaPelatihan">Nama Aktivitas</label>
								<input type="text" class="form-control" id="inputEmail4" placeholder="Nama Aktivitas" required>
							</div>
							<div class="form-group col-md-6">
								<label for="inputTanggalPelatihan">Jam Aktivitas</label>
								<input class="form-control" id="date" name="date" placeholder="HH/MM/SS" type="time"
									readonly="readonly" />
							</div>
						</div>


						<div class="form-group">
							<label for="exampleFormControlTextarea1">Deskripsi Aktivitas</label>
							<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="resize:none" required></textarea>
						</div>

						<div class="row">

							<div class="col col-md-12 text-center">
								<a href="" class="btn btn-danger"><i class="fa fa-undo"></i> Kembali</a>
								<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah
									Aktivitas</button>
							</div>


						</div>

					</form>
				</div>
			</div>
		</div>
	</section>
</div>
