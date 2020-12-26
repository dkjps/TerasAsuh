<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$id = $this->uri->segment(4);
$id_kelas = $this->uri->segment(3);
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
            <div class="card-body">
              <form class="" action="<?=base_url("Pemateri/cariPemateri")?>" method="get">
								<div class="row" style="">
                    <select style="width:60%; margin-left:10%;" class="form-control text-center border-secondary" name="provinsi">
                      <?php foreach ($provinsi as $p): ?>
                        <?php if ($p->id==$id_provinsi): ?>
                          <option value="<?=$p->id?>" selected><?=$p->nama?></option>
                        <?php else: ?>
                          <option value="<?=$p->id?>"><?=$p->nama?></option>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </select>
										<button style="width:20%; margin-left:10px;" class="form-control btn btn-secondary" type="submit" name="submit"><i class="fas fa-search"></i> </button>
								</div>
							</form><br>
              <!-- <a href="<?php echo base_url('Pemateri/tambahPemateri/'); ?>" class="btn btn-info float-right" role="button" aria-pressed="true"><i class="fas fa-plus" style="padding-right:3px"></i> Tambah Pemateri</a> -->
              <div class="table-responsive">
                <table id="list-data" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>ID Pemateri</th>
                      <th> Nama Pemateri</th>
                      <th>Asal Provinsi</th>
                      <th>Jumlah Kelas</th>
                    </tr>
                  </thead>
                  <tbody id="data-pegawai">
                    <?php foreach ($pemateri as $p): ?>
                        <td><?=$p->id?></td>
                        <td><a href="<?=base_url("Pemateri/jadwalPemateri/$p->id")?>"><?=$p->namalengkap?></a></td>
                        <td><?=$p->nama_provinsi?></td>
                        <td><?=$p->jumlah_kelas?></td>
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
