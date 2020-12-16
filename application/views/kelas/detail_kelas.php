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
            <div class="card-body">
              <form>
                <div class="form-row">
                  <div class="col-md-12">
                    <?php echo @$this->session->flashdata('msg'); ?>
                  </div>
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
                    <span class="form-control btn btn-<?=$warna[$detail->status_kelas]?>">
                      <?php echo $caption[$detail->status_kelas]; ?>
                    </span>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-2">
                    <label for="inputNamaPelatihan">Jumlah Materi</label>
                    <span class="form-control"><?=(!empty($detail)?$detail->jumlah_materi:'')?></span>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputTanggalPelatihan">Jumlah Pemateri</label>
                    <span class="form-control"><?=(!empty($detail)?$detail->jumlah_pemateri:'')?></span>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputTanggalPelatihan">Tanggal Buka</label>
                    <span class="form-control"><?=(!empty($detail)?$detail->tgl_buka:'')?></span>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputTanggalPelatihan">Tanggal Selesai</label>
                    <span class="form-control"><?=(!empty($detail)?$detail->tgl_selesai:'')?></span>
                  </div>
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
                      <!-- <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#tab_materi" role="tab" aria-controls="nav-home" aria-selected="true">Daftar Materi</a> -->
                      <!-- <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#tab_pemateri" role="tab" aria-controls="nav-profile" aria-selected="false">Daftar Pemateri</a> -->
                    </div>
                  </nav>
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab_materi">
                      <div class="col-md-6" style="margin-top:10px; margin-bottom:5px;">
                      </div>
                      <div class="col-md-12" style="margin-top:10px; margin-bottom:5px; z-index:9999;">
                        <h3 class="col-md-6 float-left">Daftar Jadwal</h3>
                        <a href="<?=base_url('Kelas/tambahJadwal/'.(!empty($detail)?$detail->id_kelas:'')); ?>" class="btn btn-primary col-md-2 col-xs-12 float-right" style="margin-top:10px; margin-bottom:5px;"><i class="fas fa-plus"></i>  Tambah Jadwal</a>
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
                                <th>Tanggal</th>
                                <th style="text-align: center; min-width:80px;">Aksi</th>
                              </tr>
                            </thead>
                            <tbody id="daftar-topik">
                              <?php
                              $i = 1;
                              foreach ($materi as $m) { ?>
                                <tr>
                                  <td><?=$i++?></td>
                                  <td><?=$m->materi?></td>
                                  <td><?=$m->namalengkap?></td>
                                  <td><?=$m->tgl_buka_materi?></td>
                                  <td style="min-width:100px;">
                                    <a href="<?=base_url("Kelas/ubahJadwal/$m->id_kelas/$m->id")?>" class="btn btn-sm btn-primary update-data" ><i class="fas fa-pen"></i></a>
                                    <button class="btn btn-sm btn-danger" onclick="konfirmasiHapus('<?=base_url("Jadwal/hapusJadwal/$m->id_kelas/$m->id")?>')"><i class="fas fa-trash"></i></button>
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
                        <a href="<?php echo base_url('Pemateri/tambahPemateri'); ?>" class="btn btn-primary float-right" style="margin-top:10px; margin-bottom:5px;"><i class="glyphicon glyphicon-plus-sign"></i>  Tambah Pemateri</a>
                      </div>

                      <div class="col col-md-12">
                        <div class="table-responsive">
                          <table id="list-pemateri" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>ID Pemateri</th>
                                <th>Nama Pemateri</th>
                                <th>Provinsi</th>
                                <th>Total Materi</th>
                                <!-- <th>Topik Diampu</th> -->
                                <th style="text-align: center;">Aksi</th>
                              </tr>
                            </thead>
                            <tbody id="daftar-pemateri">
                              <?php
                              $i = 1;
                              foreach ($pemateri as $m) {
                                ?>
                                <tr>
                                  <td><?=$i++?></td>
                                  <td><?=$m->id_panitia?></td>
                                  <td><?=$m->namalengkap?></td>
                                  <td><?=$m->nama_provinsi?></td>
                                  <td><?=$m->jumlah_materi?></td>
                                  <td>
                                    <a href="<?=base_url("Kelas/ubahJadwal/$m->id_kelas/$m->id")?>" class="btn btn-sm btn-primary update-data" ><i class="fas fa-pen"></i></a>
                                    <button class="btn btn-sm btn-danger" onclick="konfirmasiHapus('<?=base_url("Jadwal/hapusJadwal/$m->id_kelas/$m->id")?>')"><i class="fas fa-trash"></i></button>
                                  </td>
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
