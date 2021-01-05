<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin/header');
?>
<!-- Main Content -->
<div class="main-content" id="halaman-pasien">
  <section class="section">
    <div class="section-header">
      <h1>Master Data Keluarga Binaan</h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="col-md-12">
                <br>
                <table>
                  <tr>
                    <td style="width:120px;"><label class="">Pembina</label></td>
                    <th style="width:30px;">:</th>
                    <th><h6 class=""><?=($pembina)?$pembina->namalengkap:''?></h6></th>
                  </tr>
                  <tr>
                    <td style="width:120px;"><label class="">Kepala Keluarga</label></td>
                    <th style="width:30px;">:</th>
                    <th><h6 cl><?=($kepala)?$kepala->namalengkap:''?></h6></th>
                  </tr>
                  <tr>
                    <td style="width:120px;"><label class="">Tgl Join</label></td>
                    <th style="width:30px;">:</th>
                    <th><h6 class=""><?=($detail)?date('d F yy', strtotime($detail->tgl_join)):''?></h6></th>
                  </tr>
                </table>
              </div>
            <!-- <div class="card-header-action">
            </div> -->
            </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped" id="list-data">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
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
                <?php $i=1; if(!empty($keluarga)){ foreach ($keluarga as $k): ?>
                  <tr>
                    <th><?=$i++?></th>
                    <td><?=$k->namalengkap?></td>
                    <td><?=$k->nomor_kk?></td>
                    <td><?=$k->email?></td>
                    <td><?=$k->nohp?></td>
                    <td><?=($k->jenis_kelamin==0?'L':'P')?></td>
                    <td><?=$k->tgl_lahir?></td>
                    <td><?=$k->nama_provinsi?></td>
                    <td><?=$k->nama_kota?></td>
                  </tr>
                <?php endforeach; } ?>
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
