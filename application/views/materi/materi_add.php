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
                      <select class="form-control" name="kelas" required>
                        <option value="">Pilih Kelas</option>
                        <?php
                          foreach ($kelas as $k) {
                            echo "<option value='$k->id'>$k->nama</option>";
                          }
                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-2 control-label" for="inputNamaPelatihan">Judul Materi</label>
                    <div class="col-md-8">
                      <select class="form-control" name="materi" required>
                        <option value="">Pilih Materi</option>
                        <?php
                          foreach ($materi as $k) {
                            echo "<option value='$k->id'>$k->judul</option>";
                          }
                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-2 control-label" for="inputNamaPelatihan">Pilih Pemateri</label>
                    <div class="col-md-8">
                      <select name="" id="" class="form-control">
                        <option value="">Pilih Pemateri</option>
                        <?php
                          foreach ($pemateri as $k) {
                            echo "<option value='$k->id'>$k->namalengkap</option>";
                          }
                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-2 control-label" for="inputNamaPelatihan">Waktu Topik</label>
                    <div class="col-md-3"style=>
                      <span  class="form-text text-muted" >Tanggal Mulai</span>
                      <input type="date" class="form-control" id="namaKelas" placeholder="Tanggal Mulai" required>
                    </div>
                    <div class="col-md-3" >
                      <span class="form-text text-muted" >Jam Mulai</span>
                      <input type="time" class="form-control" id="namaKelas" placeholder="Jam Mulai" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 text-center">
                      <button type="button" class="btn btn-primary form-control">Simpan</button>
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
