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
						<div class="card-header">
            <div class="container">
              <div class="row">
                <div class="col">
                Nama Pemateri : 
                </div>
                <div class="col">
                ini Namanya 
                </div>
              </div>
			  <div class="row">
                <div class="col">
                Total Kelas : 
                </div>
                <div class="col">
                ini totalnya 
                </div>
              </div>
			  <div class="row">
                <div class="col">
                Total Jadwal : 
                </div>
                <div class="col">
                ini Totalnyaa
                </div>
              </div>
            </div>


						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table id="list-data" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>#</th>
											<th>Kelas</th>
											<th>Pelatihan</th>
											<th>Peserta</th>
											<th>Pemateri</th>
											<th>Tgl Buka</th>
											<th>Tgl Selesai</th>
											<th>Total Jadwal</th>
											<th>Status</th>
											<!-- <th style="text-align: center;">Aksi</th> -->
										</tr>
									</thead>
									<tbody id="daftar-kelas">
										<?php $this->load->view('pemateri_kelas/data_kelas'); ?>
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