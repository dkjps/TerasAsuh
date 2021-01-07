
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$id = $this->uri->segment(3);
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
                <a href="<?php echo base_url('master/Aktivitas/tambahSoal/'); ?>" class="btn btn-info btn-lg float-right" role="button" aria-pressed="true"><i class="fas fa-plus" style="padding-right:3px"></i> Tambah Soal</a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <form class="" action="<?=base_url("master/Aktivitas/")?>" method="get">
                  <!-- Aktivitas : -->
                  <div class="row">
                    <select style="width:60%; margin-left:10%;" class="form-control" name="aktivitas" id="aktivitas">
                      <option value="">Pilih Aktivitas</option>
                      <?php foreach ($aktivitas as $a): ?>
                        <option value="<?=$a->id?>"><?=$a->nama?></option>
                      <?php endforeach; ?>
                    </select>
                    <button style="width:20%; margin-right:8%;" type="submit" name="cari" class="form-control btn btn-secondary" value="true" id="cari">Cari</button>
                  </div>
                </form>
                <br><br>
                <div class="col-md-12">
                  <?php echo (!empty($list)?unserialize($list):''); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
