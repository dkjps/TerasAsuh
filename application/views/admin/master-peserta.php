<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Master Data Peserta</h1>
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
                  <!-- <th>Action</th> -->
                </tr>
              </thead>
              <tbody>                
                <?php $i=1; foreach ($peserta as $p): ?>
                  <tr>
                    <th><?=$i++?></th>
                    <td><a href="<?=base_url("master/Peserta/detailPeserta/$p->id")?>"><?=$p->namalengkap?></a></td>
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
      </div>
    </div>
  </div>
</div>
</section>
</div>
