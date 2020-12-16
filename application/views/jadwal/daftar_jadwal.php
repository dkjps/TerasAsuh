<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin/header');
$id = $this->uri->segment(3);
?>

<div class="main-content" id="halaman_materi">
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
                    <h4></h4>
                    <div class="card-header-action">
                        <a href="<?php echo base_url('materi/tambahMateri/'); ?>" class="btn btn-info float-right" role="button" aria-pressed="true"><i class="fas fa-plus" style="padding-right:3px"></i> Tambah Materi</a>
                    </div>
                  </div>
                  <div class="card-body">
                  <div class="table-responsive">
                    <table id="list-data" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Judul Materi</th>
                            <th>Pelatihan</th>
                            <th>Kelas</th>
                            <th>Tanggal Mulai</th>
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

<?php
  $data['judul'] = 'TambahPelatihan';
  $data['url'] = 'Pelatihan/addPelatihan';
?>

<?php $this->load->view('admin/footer'); ?>
