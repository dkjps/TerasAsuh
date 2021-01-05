<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$role = 99;
if (isset($_GET['role'])) {
  $role = $_GET['role'];
}
?>
<!-- Main Content -->
<div class="main-content" id="halaman-pasien">
  <section class="section">
    <div class="section-header">
      <h1>Master Data Panitia</h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- <div class="card-header">
              <div class="col-md-12">
              <a href="<?=base_url("master/Panitia/tambahPanitia")?>" class="btn btn-md btn-info float-right">
                <i class="fas fa-plus" style="padding-right:3px"></i>
                <span style="font-size:10pt;">
                  Tambah Data Panitia
                </span>
              </a>
            </div>
            </div> -->
            <div class="card-body">
                <form class="" action="<?=base_url("master/Panitia/byrole")?>" method="get">
                  <div class="row" style="">
                    <select style="width:60%; margin-left:10%;" class="form-control text-center border-secondary" name="role">
                      <option value="99" <?=($role==99?'selected':'')?>>Semua</option>
                      <option value="2" <?=($role==2?'selected':'')?>>Administrator</option>
                      <option value="3" <?=($role==3?'selected':'')?>>Operator</option>
                      <option value="4" <?=($role==4?'selected':'')?>>Pemateri</option>
                    </select>
                    <button style="width:20%; margin-left:10px;" class="form-control btn btn-secondary" type="submit" name="submit" value="true"><i class="fas fa-search"></i> </button>
                  </div>
                </form><br>
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
                      <th>Role</th>
                      <!-- <th>Action</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; $role = array('','','Administrator', 'Operator', 'Pemateri');
                      $warna = array('','','success', 'info', 'warning');
                     foreach ($panitia as $p): ?>
                      <tr>
                        <th><?=$i++?></th>
                        <td><?=$p->namalengkap?></td>
                        <td><?=$p->email?></td>
                        <td><?=$p->nohp?></td>
                        <td><?=($p->jenis_kelamin==0?'L':'P')?></td>
                        <td><?=$p->tgl_lahir?></td>
                        <td><span class="btn btn-<?=$warna[$p->role]?>"><?=$role[$p->role]?></span></td>                        
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
