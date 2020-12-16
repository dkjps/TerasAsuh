<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$id = $this->uri->segment(4);
$id_kelas = $this->uri->segment(3);
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
              <div class="col-md-12">
                  <?php echo @$this->session->flashdata('msg'); ?>
                  <a href="<?php echo base_url('Pemateri/tambahPemateri/'); ?>" class="btn btn-info float-right" role="button" aria-pressed="true"><i class="fas fa-plus" style="padding-right:3px"></i> Tambah Pemateri</a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="list-data" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>ID Pemateri</th>
                      <th>Nama Pemateri</th>
                      <th>Asal Provinsi</th>
                      <th>Jumlah Kelas</th>
                      <th style="text-align: center;">Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="data-pegawai">                    
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
