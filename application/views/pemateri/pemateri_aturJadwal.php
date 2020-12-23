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
			<div class="card">
				<div class="card-header">
					<div class="col-md-12">
						<?php echo @$this->session->flashdata('msg'); ?>
						<a href="<?php echo base_url('pemateri/aturJadwal'); ?>" class="btn btn-info float-right"
							role="button" aria-pressed="true"><i class="fas fa-plus" style="padding-right:3px"></i>
							Tambah Jadwal</a>
					</div>
				</div>
				<div class="card-body">

					<b>Pilih Pemateri </b>
					<br>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label class="col-md-2 " for="inputNamaPelatihan">Asal Pemateri</label>
							<div class="col-md-2"></div>
							<div class="col-md-12">
								<select class="form-control" required></select>
							</div>
						</div>

						<div class="form-group col-md-6">
							<label class="col-md-2 " for="inputNamaPelatihan">Pilih Pemateri</label>
							<div class="col-md-2"></div>
							<div class="col-md-12">
								<select class="form-control" required></select>
							</div>
						</div>

					</div>

					<b>Daftar Jadwal Pemateri </b>
					<br>
					<div class="table-responsive">
						<table id="list-data" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>ID Jadwal</th>
									<th>Jadwal</th>
									<th>Kelas</th>
									<th>Pelatihan</th>
									<th>Waktu</th>
									<th style="text-align: center;">Aksi</th>
								</tr>
							</thead>
							<tbody id="daftar-jadwal">
								<?php $this->load->view('pemateri/daftar_jadwal'); ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>


		</div>
	</section>
</div>
