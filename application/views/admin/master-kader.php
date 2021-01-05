<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin/header');
?>
<!-- Main Content -->
<div class="main-content" id="halaman-pasien">
    <section class="section">
        <div class="section-header">
            <h1>Master Data Kader</h1>
        </div>
        <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <!-- <div class="card-header">
                    <h4>Tabel Data Kader</h4>
                    <div class="card-header-action">
                        <a href="#" class="btn btn-md btn-primary disabled">
                            <i class="fas fa-plus" style="padding-right:3px"></i>
                            <span style="font-size:10pt;">
                                Tambah Data Kader
                            </span>
                        </a>
                    </div>
                  </div> -->
                  <div class="card-body">
                    <br>
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-master-kader">
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
                              <td><a href="<?=base_url("master/Kader/detailKader/$p->id_user")?>"><?=$p->namalengkap?></a></td>
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
