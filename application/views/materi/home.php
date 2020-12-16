<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin/header');
?>
<!-- Main Content -->
<div class="main-content" id="halaman-pasien">
    <section class="section">
      <div class="section-header">
        <h1 style=""><?=$title?></h1>
      </div>
        <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <div class="col-md-12">
                        <?php echo @$this->session->flashdata('msg'); ?>
                        <a href="<?php echo base_url('Materi/tambahMateri/'); ?>" class="btn btn-info float-right" role="button" aria-pressed="true"><i class="fas fa-plus" style="padding-right:3px"></i> Tambah Materi</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="daftar-materi" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Judul Materi</th>
                            <th>Pelatihan</th>
                            <th style="text-align: center;">Aksi</th>
                          </tr>
                        </thead>
                        <tbody id="daftar-pelatihan">
                          <?php $this->load->view('materi/daftar_materi'); ?>
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
