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
            <div class="card-header">
              <h4></h4>
              <div class="card-header-action">
                <a href="<?php echo base_url('Pelatihan/tambahPelatihan/'); ?>" class="btn btn-info pull-right" role="button" aria-pressed="true"><i class="fas fa-plus" style="padding-right:3px"></i> Tambah Pelatihan</a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <form method="post" action="<?=base_url('Pelatihan/'.$action.'Pelatihan/'.$id)?>">
                  <div class="form-group col-md-12">
                    <label for="inputNamaPelatihan">Nama Kelas Pelatihan</label>
                    <input name="nama" type="text" class="form-control" value="<?=(!empty($detail)?$detail->nama:'')?>" placeholder="Nama Pelatihan" required>
                  </div>
                  <div class="form-group col-md-12">
                    <label for="inputAddress">Deskripsi Pelatihan</label>
                    <textarea class="form-control" cols="40" id="textarea" name="deskripsi" rows="10" style="resize:none" placeholder="Pelatihan ini tentang . . ." required><?=(!empty($detail)?$detail->deskripsi:'')?></textarea>
                  </div>
                  <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
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
