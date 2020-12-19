<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin/header');
$id = $this->uri->segment(3);
$warna = array('danger', 'warning', 'primary', 'success');
$caption = array('Belum Buka', 'Daftar', 'Jalan', 'Selesai');
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
              <div class="col-md-12">
              </div>
            </div> -->
            <div class="card-body">
              <?php echo @$this->session->flashdata('msg'); ?>
              <form>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="inputNamaPelatihan">Nama Pelatihan</label>
                    <span class="form-control"><?=(!empty($detail)?$detail->nama_pelatihan:'')?></span>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputTanggalPelatihan">Nama Kelas</label>
                    <span class="form-control"><?=(!empty($detail)?$detail->nama_kelas:'')?></span>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputTanggalPelatihan">Status Kelas</label>
                    <span class="form-control text-center text-<?=$warna[$detail->status_kelas]?> border-<?=$warna[$detail->status_kelas]?>">
                      <?php echo $caption[$detail->status_kelas]; ?>
                    </span>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-2">
                    <label for="inputNamaPelatihan">Jumlah Materi</label>
                    <span class="form-control"><?=(!empty($materi)?count($materi):'0')?></span>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputTanggalPelatihan">Jumlah Pemateri</label>
                    <span class="form-control"><?=(!empty($detail->jumlah_pemateri)?$detail->jumlah_pemateri:'0')?></span>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputTanggalPelatihan">Tanggal Buka</label>
                    <span class="form-control"><?=(!empty($detail)?$detail->tgl_buka:'')?></span>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputTanggalPelatihan">Tanggal Selesai</label>
                    <span class="form-control"><?=(!empty($detail)?$detail->tgl_selesai:'')?></span>
                  </div>
                  <?php if (!empty($detail) && ($detail->status_kelas==1 || $detail->status_kelas==2)): ?>

                  <div class="form-group col-md-2">
                    <label for="inputTanggalPelatihan">Pendaftaran</label>
                    <?php if (!empty($detail) && $detail->is_buka_pendaftaran==0): ?>
                      <button type="button" class="btn btn-sm btn-danger form-control" onclick="konfirmasiHapus('<?=base_url("Kelas/ubahStatusPendaftaran/1/$id")?>')">Tutup</button>
                    <?php else: ?>
                      <button type="button" class="btn btn-sm btn-success form-control" onclick="konfirmasiHapus('<?=base_url("Kelas/ubahStatusPendaftaran/0/$id")?>')">Buka</button>
                    <?php endif; ?>
                  </div>
                <?php endif; ?>
                </div>
              </form>
              <div class="tabbable-panel">
                <div class="tabbable-line">
                  <!-- <ul class="nav nav-tabs">
                    <li class="nav-item">
                      <a href="#tab_materi" data-toggle="tab">Daftar Materi </a>
                    </li>
                    <li class="nav-item">
                      <a href="#tab_pemateri" data-toggle="tab">Daftar Pemateri </a>
                    </li>
                  </ul> -->
                  <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#tab_materi" role="tab" aria-controls="nav-home" aria-selected="true">Jadwal Materi</a>
                      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#tab_pemateri" role="tab" aria-controls="nav-profile" aria-selected="false">Daftar Pemateri</a>
                    </div>
                  </nav>
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab_materi">
                      <div class="col col-md-12" style="margin-top:10px; margin-bottom:5px; z-index:9999;">
                        <a href="<?=base_url('Kelas/tambahJadwal/'.(!empty($detail)?$detail->id_kelas:'')); ?>" class="btn btn-primary float-right" style="margin-top:10px; margin-bottom:5px;"><i class="fas fa-plus"></i>  Tambah Jadwal</a>
                      </div>
                      <div class="col col-md-12">
                        <!-- tabelTopik -->
                        <div class="table-responsive">
                          <table id="list-materi" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Materi Pelatihan</th>
                                <th>Nama Pemateri</th>
                                <th>Tanggal Buka</th>
                                <th style="text-align: center; min-width:80px;">Aksi</th>
                              </tr>
                            </thead>
                            <tbody id="daftar-topik">
                              <?php
                              $i = 1;
                              foreach ($materi as $m) { ?>
                                <tr>
                                  <td><?=$i++?></td>
                                  <td><a href="<?=base_url("Materi/detailMateri/$m->id_materi")?>"><?=$m->judul_materi?></a></td>
                                  <td><?=$m->namalengkap?></td>
                                  <td><?=$m->tgl_buka_materi?></td>
                                  <td style="min-width:100px;">
                                    <a href="<?=base_url("Kelas/ubahJadwal/$m->id_kelas/$m->id_jadwal")?>" class="btn btn-sm btn-primary update-data" ><i class="fas fa-pen"></i></a>
                                    <button class="btn btn-sm btn-danger" onclick="konfirmasiHapus('<?=base_url("Jadwal/hapusJadwal/$m->id_kelas/$m->id_jadwal")?>')"><i class="fas fa-trash"></i></button>
                                  </td>
                                </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                        </div>

                      </div>

                    </div>

                    <div class="tab-pane" id="tab_pemateri">
                      <!-- tablePemateri -->
                      <div class="col col-md-12" style="z-index:999;">
                        <!-- <a href="<?php echo base_url('Pemateri/tambahPemateri'); ?>" class="btn btn-primary float-right" style="margin-top:10px; margin-bottom:5px;"><i class="glyphicon glyphicon-plus-sign"></i>  Tambah Pemateri</a> -->
                      </div>

                      <div class="col col-md-12">
                        <div class="table-responsive">
                          <table id="list-pemateri" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th>#</th>
                                <!-- <th>ID Pemateri</th> -->
                                <th>Nama Pemateri</th>
                                <th>Provinsi</th>
                                <th>Total Materi</th>
                                <!-- <th>Topik Diampu</th> -->
                              </tr>
                            </thead>
                            <tbody id="daftar-pemateri">
                              <?php
                              $i = 1;
                              foreach ($pemateri as $m) {
                                ?>
                                <tr>
                                  <td><?=$i++?></td>
                                  <td><?=$m->namalengkap?></td>
                                  <td><?=$m->nama_provinsi?></td>
                                  <td><?=$m->jumlah_materi?></td>
                                </tr>
                                <?php
                                $id_panitia = $m->id_panitia;
                              }
                              ?>
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
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('admin/footer'); ?>
