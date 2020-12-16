<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$id = $this->uri->segment(3);
?>

<div class="main-content" id="halaman_subbab">
	<section class="section">
		<div class="section-header">
			<h1><?=$title?></h1>
		</div>
		<div class="section-body">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<div class="col-md-12">
								<?php echo @$this->session->flashdata('msg'); ?>
								<a href="<?php echo base_url('subMateri/tambahMateri/'); ?>" class="btn btn-info float-right"
									role="button" aria-pressed="true"><i class="fas fa-plus" style="padding-right:3px"></i> Tambah subMateri</a>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="list-submateri" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>Judul</th>
												<th>Deksripsi</th>
												<th>Materi</th>
												<th>Pelatihan</th>
												<th style="text-align: center;">Aksi</th>
											</tr>
										</thead>
										<tbody id="data-pegawai">
											<?php $i=1; foreach ($submateri as $s): ?>
												<tr>
													<td><?=$i++?></td>
													<td><?=$s->subbab?></td>
													<td><?=$s->deskripsi_subbab?></td>
													<td><?=$s->materi?></td>
													<td><?=$s->nama_pelatihan?></td>
													<td></td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
