<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin/header');
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
            <!-- <div class="card-header">
            <div class="card-header-action">
          </div>
        </div> -->
        <br>
        <div class="card-body">
          <div class="col-md-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Kader</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Keluarga Binaan</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="table-responsive">
                  <table class="table table-striped" id="list-data">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>No. HP</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Provinsi</th>
                        <th>Kota</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; foreach ($kader as $p): ?>
                        <tr>
                          <th><?=$i++?></th>
                          <td><a href="<?=base_url("master/Kader/detailKader/$p->id")?>"><?=$p->namalengkap?></a></td>
                          <td><?=$p->email?></td>
                          <td><?=$p->nohp?></td>
                          <td><?=($p->jenis_kelamin==0?'L':'P')?></td>
                          <td><?=$p->tgl_lahir?></td>
                          <td><?=$p->nama_provinsi?></td>
                          <td><?=$p->nama_kota?></td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"><div class="table-responsive">
                <table class="table table-striped" id="list-materi">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Kepala</th>
                      <th>No KK</th>
                      <th>Email</th>
                      <th>No. HP</th>
                      <th>Jenis Kelamin</th>
                      <th>Tanggal Lahir</th>
                      <th>Provinsi</th>
                      <th>Kota</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; if(!empty($keluarga)){ for($j=0; $j<count($keluarga); $j++){ foreach ($keluarga[$j] as $k): ?>
                      <tr>
                        <th><?=$i++?></th>
                        <td><a href="<?=base_url("master/KeluargaBinaan/detail/$k->nomor_kk")?>"><?=$k->namalengkap?></a></td>
                        <td><?=$k->nomor_kk?></td>
                        <td><?=$k->email?></td>
                        <td><?=$k->nohp?></td>
                        <td><?=($k->jenis_kelamin==0?'L':'P')?></td>
                        <td><?=$k->tgl_lahir?></td>
                        <td><?=$k->nama_provinsi?></td>
                        <td><?=$k->nama_kota?></td>
                      </tr>
                    <?php endforeach; }} ?>
                  </tbody>
                </table>
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
