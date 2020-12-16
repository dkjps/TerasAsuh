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
            <div class="card-body">
              <div class="table-responsive">
              <form class="form-horizontal">
                <div class="form-group">
                  <label class="col-md-2 control-label" for="inputNamaPelatihan">Kelas</label>
                  <div class="col-md-8">
                    <select readonly="readonly" class="form-control"></select>
                  </div>
                  </div>

                  <div class="form-group">
                  <label class="col-md-2 control-label" for="inputNamaPelatihan">Judul Materi</label>
                  <div class="col-md-8">
                    <input type="text" class="form-control" id="namaKelas" placeholder="Nama Materi" required>
                  </div>
                  </div>

                  <div class="form-group">
                  <label class="col-md-2 control-label" for="inputNamaPelatihan">Pilih Pemateri</label>
                  <div class="col-md-8">
                    <select name="" id="" class="form-control">
                      <option value="">pilih pemateri</option>
                    </select>
                  </div>
                  </div>

                  <div class="form-group">
                  <label class="col-md-2 control-label" for="inputNamaPelatihan">Jadwal Pembelajaran</label>
                  <div class="col-md-3"style=>
                    <input type="date" class="form-control" id="namaKelas" placeholder="Tanggal Mulai" required>
                    <span  class="form-text text-muted" >Tanggal Mulai</span>
                  </div>
                  <div class="col-md-3" >
                    <input type="time" class="form-control" id="namaKelas" placeholder="Jam Mulai" required>
                    <span class="form-text text-muted" >Jam Mulai</span>
                  </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-12 text-center">
                    <a href="<?php echo base_url('Kelas/detailKelas'); ?>" class="btn btn-danger">Kembali</a>
                    <button type="button" class="btn btn-primary">Simpan Topik</button>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
