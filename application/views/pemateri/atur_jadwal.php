<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin/header');
$id = $this->uri->segment(3);
?>
<!-- Main Content -->
<div class="main-content" id="halaman-pasien">
	<section class="section">
		<div class="section-header">
			<h1><?=$title?></h1>
			<div class="msg" style="display:none;">
				<?php echo @$this->session->flashdata('msg'); ?>
			</div>
		</div>
		<div class="section-body">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<div class="table-responsive">
								<form method="post" action="<?=base_url('Pelatihan/'.$action.'Pelatihan/'.$id)?>">
									<div id="form-lama">
										<div class="col-12 text-center">
											<b>JADWAL LAMA</b>
										</div>
										<div class="form-group col-md-12">
											<label for="inputNamaPelatihan">Nama Jadwal</label>
											<input name="nama" type="text" class="form-control"
												value="<?=(!empty($detail)?$detail->nama:'')?>"
												placeholder="Nama Pelatihan" readonly>
										</div>
										<div class="form-group col-md-12">
											<label for="inputNamaPelatihan">Nama Kelas</label>
											<input name="nama" type="text" class="form-control"
												value="<?=(!empty($detail)?$detail->nama:'')?>"
												placeholder="Nama Pelatihan" readonly>
										</div>
										<div class="form-group col-md-12">
											<label for="inputNamaPelatihan">Nama Pelatihan</label>
											<input name="nama" type="text" class="form-control"
												value="<?=(!empty($detail)?$detail->nama:'')?>"
												placeholder="Nama Pelatihan" readonly>
										</div>
										<div class="form-group col-md-12">
											<label for="inputNamaPelatihan">Waktu</label>
											<input name="nama" type="datetime-local" class="form-control"
												value="<?=(!empty($detail)?$detail->nama:'')?>"
												placeholder="Nama Pelatihan" readonly>
										</div>
									</div>
									<div id="form-baru">
										<div class="col-12 text-center">
											<b>JADWAL BARU</b>
										</div>
										<div class="form-group col-md-12">
											<label for="inputNamaPelatihan">Pilih Pelatihan</label>
											<select class="form-control" name="" id="" required></select>
										</div>
										<div class="form-group col-md-12">
											<label for="inputNamaPelatihan">Pilih Kelas</label>
											<select class="form-control" name="" id="" required></select>
										</div>
										<div class="form-group col-md-12">
											<label for="inputNamaPelatihan">Pilih Jadwal</label>
											<select class="form-control" name="" id="" required></select>
										</div>
										<div class="form-group col-md-12">
											<label for="inputNamaPelatihan">Pemateri</label>
											<input name="nama" type="text" class="form-control"
												value="<?=(!empty($detail)?$detail->nama:'')?>"
												placeholder="Nama Pemateri" readonly>
										</div>

										<div class="form-group col-md-12">
											<label for="inputNamaPelatihan">Waktu</label>
											<input name="nama" type="datetime-local" class="form-control"
												value="<?=(!empty($detail)?$detail->nama:'')?>"
												placeholder="Nama Pelatihan" readonly>
										</div>

									</div>
									<div class="form-group col-md-12">
										<button type="submit" class="btn btn-primary" name="submit">Simpan</button>
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
<?php $this->load->view('admin/footer'); ?>
