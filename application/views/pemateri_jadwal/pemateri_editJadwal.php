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
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<div class="col col-md-12">
								<table>
									<tbody>
										<tr>
											<td style="width:70px;"><label class="">Pelatihan</label></td>
											<th style="width:50px;">:</th>
											<th>
												<h6 class=""><a class=""
														href="https://mhscourses.ub-learningtechnology.com/Pelatihan/detailPelatihan/1">Pelatihan
														COVID-19</a></h6>
											</th>
										</tr>
										<tr>
											<td style="width:70px;"><label class="">Materi</label></td>
											<th style="width:50px;">:</th>
											<th>
												<h6 class="">COVID-19</h6>
											</th>
										</tr>
										<tr>
											<td style="width:70px;"><label class="">Jumlah Peserta</label></td>
											<th style="width:50px;">:</th>
											<th>
												<h6 class="">10</h6>
											</th>
										</tr>
									</tbody>
								</table>
								<br>

								<form>
									<div class="form-horizontal">
										<div class="form-group">
											<label class="col-md-2 control-label" for="inputNamaPelatihan">Link
												Meeting</label>
											<div class="col-md-8">
												<input type="text" class="form-control" id="namaKelas">
											</div>
										</div>

										<div class="form-group">
											<label class="col-md-2 control-label" for="inputNamaPelatihan">Password
												Meeting</label>
											<div class="col-md-8">
												<input type="password" class="form-control" id="namaKelas">
											</div>
										</div>
									</div>

								</form>

								<br>
								<div class="table-responsive">
									<table id="" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>Judul</th>
												<th>Deksripsi</th>
												<th style="text-align: center;">Aksi</th>
											</tr>
										</thead>
										<tbody id="data-pegawai">
											<tr>
												<td>1</td>
												<td><a
														href="https://mhscourses.ub-learningtechnology.com/SubMateri/detailSubMateri/4">pretest</a>
												</td>
												<td>soal singkat untuk mengetahui seberapa siap terhadap materi</td>
												<td><button class="btn btn-danger konfirmasiHapus-pegawai"
														onclick="konfirmasiHapus('https://mhscourses.ub-learningtechnology.com/SubMateri/hapusSubMateri/4/2')"><i
															class="fas fa-trash"></i></button></td>
											</tr>
											<tr>
												<td>2</td>
												<td><a
														href="https://mhscourses.ub-learningtechnology.com/SubMateri/detailSubMateri/5">Ringkasan
														Materi (PDF)</a></td>
												<td>materi powerpoint terkait data - data penting yang perlu diperoleh
												</td>
												<td><button class="btn btn-danger konfirmasiHapus-pegawai"
														onclick="konfirmasiHapus('https://mhscourses.ub-learningtechnology.com/SubMateri/hapusSubMateri/5/2')"><i
															class="fas fa-trash"></i></button></td>
											</tr>
											<tr>
												<td>3</td>
												<td><a
														href="https://mhscourses.ub-learningtechnology.com/SubMateri/detailSubMateri/6">postest</a>
												</td>
												<td>soal untuk mengetahui bagaimana pemahaman terhadap materi</td>
												<td><button class="btn btn-danger konfirmasiHapus-pegawai"
														onclick="konfirmasiHapus('https://mhscourses.ub-learningtechnology.com/SubMateri/hapusSubMateri/6/2')"><i
															class="fas fa-trash"></i></button></td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="col col-12 text-center">
									<div class="col-12">
										<button type="submit" class="btn btn-primary form-control" name="submit"><i
												class="fas fa-download"></i> Download Materi</button>
									</div>
									<br>
									<div class="col-12">
										<button type="submit" class="btn btn-primary form-control" name="submit"><i
												class="far fa-save"></i> Simpan</button>
									</div>



								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
