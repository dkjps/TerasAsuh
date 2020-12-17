<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin/header');
$id = $this->uri->segment(3);
$warna = array('danger', 'warning', 'primary', 'success');
$caption = array('Belum Buka', 'Daftar', 'Jalan', 'Selesai');
?>
<!-- Main Content -->
<div class="main-content" id="halaman-pasien">
  <section class="section">
    <div class="section-header">
      <h1><?=$title?></h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <?php echo @$this->session->flashdata('msg'); ?>
              <div class="col col-md-12" style="z-index:9999;">
                <a href="<?=base_url('SubMateri/tambahSubMateri/')?>" class="btn btn-primary float-right" style="margin-top:10px; margin-bottom:5px;"><i class="fas fa-plus"></i>  Tambah Sub Materi</a>
              </div>
            </div>
            <div class="card-body">
              <div class="col col-md-12">
                <div class="table-responsive">
                  <div class="form-group">
                    <label class="col-md-2 float-left">Pelatihan:</label>
                    <h6 class="col-md-10 float-left"><?=$submateri[0]->nama_pelatihan?></h6>
                  </div>
                  <div class="form-group">
                    <label class="col-md-2 float-left">Materi:</label>
                    <h6 class="col-md-10 float-left"><?=$submateri[0]->materi?></h6>
                  </div>
                  <br><br><br><br><br>
                  <br>
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
                      <?php $i=1; foreach ($submateri as $s): ?>
                        <tr>
                          <td><?=$i++?></td>
                          <td><?=$s->subbab?></td>
                          <td><?=$s->deskripsi_subbab?></td>
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
    </div>
  </section>
</div>
<?php $this->load->view('admin/footer'); ?>
