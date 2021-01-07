<?php
  $id = $this->uri->segment(3);
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin/header');
?>
<!-- Main Content -->
<div class="main-content" id="halaman-pasien">
    <section class="section">
        <div class="section-header">
          <a href="javascript:window.history.go(-1);" class="fas fa-chevron-left text-dark" style="font-size:20px; margin-left:25px;"></a>
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
                    <h4></h4>
                    <div class="card-header-action">
                        <a href="<?php echo base_url('Pelatihan/tambahKelas/'.$id); ?>" class="btn btn-info float-right" role="button" aria-pressed="true"><i class="fas fa-plus" style="padding-right:3px"></i> Tambah Kelas</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="list-data" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Kelas</th>
                            <th>Peserta</th>
                            <th>Pemateri</th>
                            <th>Tgl Buka</th>
                            <th>Tgl Selesai</th>
                            <th>Kode</th>
                            <th>Status</th>
                            <th style="text-align: center;">Aksi</th>
                          </tr>
                        </thead>
                        <tbody id="daftar-kelas">
                          <?php $this->load->view('pelatihan/daftar_kelas'); ?>
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
<?php $this->load->view('admin/footer'); ?>
