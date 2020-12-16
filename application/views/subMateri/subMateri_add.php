<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
								<form class="form-horizontal">
									<div class="form-row">
										<div class="form-group col-md-4">
											<label for="inputNamaPelatihan">Pelatihan</label>
											<input type="text" class="form-control" id="namaPelatihan" placeholder="Nama Pelatihan"
												readonly="readonly">
										</div>

										<div class="form-group col-md-4">
											<label for="inputNamaPelatihan">Nama Kelas</label>
											<input type="text" class="form-control" id="namaPelatihan" placeholder="Nama Kelas"
												readonly="readonly">
										</div>

										<div class="form-group col-md-4">
											<label for="inputNamaPelatihan">Nama Pemateri</label>
											<input type="text" class="form-control" id="namaPelatihan" placeholder="Nama Pemateri"
												readonly="readonly">
										</div>
									</div>


									<div class="form-group col-md-12">
										<label class="col-md-2 control-label" for="inputNamaPelatihan">Tipe Materi</label>
										<div class="col-md-6">
											<select class="form-control" name="" id="" required>
												<option>Materi Belajar</option>
												<option>Test</option>
											</select>
										</div>
									</div>

									<div class="form-group col-md-12">
										<label class="col-md-2 control-label" for="inputNamaPelatihan">Judul Materi</label>
										<div class="col-md-6">
											<input type="text" class="form-control" id="namaKelas" placeholder="Judul Materi" required>
										</div>
									</div>

									<div class="form-group col-md-12">
										<label class="col-md-2 control-label" for="inputNamaPelatihan">Desksripsi Materi</label>
										<div class="col-md-6">
											<textarea class="form-control" rows="3" style="resize: none;"></textarea>
										</div>
									</div>

									<div class="form-group col-md-12">
										<label class="col-md-2 control-label" for="inputNamaPelatihan">File Materi</label>
										<div class="col-md-6">
											<input type="file" class="form-control" id="exampleInputFile" required>
										</div>
									</div>

									<div class="form-group col-md-12 text-center">
										<a href="<?php echo base_url('Materi'); ?>" class="btn btn-danger">Kembali</a>
										<button type="button" class="btn btn-primary">Tambah Materi</button>
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
