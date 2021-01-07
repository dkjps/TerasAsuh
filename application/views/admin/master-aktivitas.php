<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$id = $this->uri->segment(3);
?>
<!-- Main Content -->
<div class="main-content" id="halaman-pasien">
  <section class="section">
    <div class="section-header">
      <a href="javascript:window.history.go(-1);" class="fas fa-chevron-left text-dark" style="font-size:20px; margin-left:25px;"></a>
      <h1 style=""><?=$title?></h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <div class="col-md-12">
                <?php echo @$this->session->flashdata('msg'); ?>
                <br>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Soal</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Topik</a>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <br>
                    <h3>Tambah Data Soal & Jawaban</h3>
                    <form action="<?=base_url("master/Aktivitas/tambahSoal")?>" method="post">
                      <div class="row">
                        <div class="form-group col-md-6">
                          <label for="exampleInputEmail1">Aktivitas</label>
                          <select class="form-control" name="aktivitas">
                            <?php foreach ($aktivitas as $a): ?>
                              <option value="<?=$a->id?>"><?=$a->nama?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="exampleInputEmail1">Tipe</label>
                          <select class="form-control" name="tipe">
                            <option value="0">Check Box</option>
                            <option value="1">Radio Button</option>
                            <!-- <option value="2">Uraian</option> -->
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Topik</label>
                        <select class="form-control" name="topik">
                          <?php foreach ($topik as $a): ?>
                            <option value="<?=$a->id?>"><?=$a->nama?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Soal</label>
                        <input type="text" class="form-control" name="soal" placeholder="Soal">
                      </div>
                      <div class="form-group float-right">
                        <button type="button" id="tambahJawaban" class="btn btn-secondary">Tambah Jawaban</button>
                      </div><br>
                      <div class="" id="jawabans">
                        <div class="form-group">
                          <label for="exampleInputPassword1">Jawaban</label>
                          <input type="text" class="form-control" name="jawaban[]" placeholder="Jawaban">
                        </div>
                      </div>
                      <button name="simpan" type="submit" class="btn btn-primary col-md-12">Tambah Soal</button>
                    </form>
                  </div>
                  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <br>
                    <h3>Tambah Data Topik</h3>
                    <form action="<?=base_url("master/Aktivitas/tambahTopik")?>" method="post">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Topik</label>
                        <input type="text" class="form-control" name="topik" placeholder="Topik">
                      </div>
                      <button name="simpan_topik" type="submit" class="btn btn-primary col-md-12">Tambah Topik</button>
                    </form>
                  </div>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<script type="text/javascript">

</script>
