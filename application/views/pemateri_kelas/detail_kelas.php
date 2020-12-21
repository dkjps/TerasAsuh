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
            <div class="card-header">
              <div class="col-md-12">
                <?php echo @$this->session->flashdata('msg'); ?>
              </div>
            </div>
            <div class="card-body">
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
                    <span class="form-control btn btn-<?=$warna[$detail->status_kelas]?>">
                      <?php echo $caption[$detail->status_kelas]; ?>
                    </span>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-2">
                    <label for="inputNamaPelatihan">Jumlah Jadwal</label>
                    <span class="form-control"><?=(!empty($detail->jumlah_materi)?$detail->jumlah_materi:'0')?></span>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputTanggalPelatihan">Jadwal Terdekat</label>
                    <span class="form-control"><?=(!empty($detail)?$detail->tgl_buka:'')?></span>
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
                      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#tab_materi" role="tab" aria-controls="nav-home" aria-selected="true">Daftar Jadwal</a>
                      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#tab_peserta" role="tab" aria-controls="nav-profile" aria-selected="false">Daftar Peserta</a>
                    </div>
                  </nav>
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab_materi">
                      <div class="col col-md-12">
                        <!-- tabelTopik -->
                        <div class="table-responsive">
                          <table id="list-materi" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Materi Pelatihan</th>
                                <th>Jadwal Materi</th>
                                <th style="text-align: center; min-width:80px;">Aksi</th>
                              </tr>
                            </thead>
                            <tbody id="daftar-topik">
                              <?php
                              $i = 1;
                              foreach ($materi as $m) { ?>
                                <tr>
                                  <td><?=$i++?></td>
                                  <td><?=$m->judul_materi?></td>
                                  <td><?=$m->tgl_buka_materi?></td>
                                  <td style="min-width:100px;">
                                    <a href="<?=base_url("Kelas/ubahJadwal/$m->id_kelas/$m->id_jadwal")?>" class="btn btn-sm btn-primary update-data" ><i class="fas fa-pen"></i></a>
                                  </td>
                                </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                        </div>

                      </div>

                    </div>

                    <div class="tab-pane" id="tab_peserta">
                      <!-- tablePemateri -->

                      <div class="col col-md-12">
                        <div class="table-responsive">
                          <table id="list-pemateri" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th>#</th>
                                <!-- <th>ID Pemateri</th> -->
                                <th>Nama Peserta</th>
                                <th>Intansi</th>
                                <th>Kota / Kabupaten</th>
                                <th>Provinsi</th>
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
                                  <td><?=$m->nama_provinsi?></td>
                                  <td><?=$m->nama_provinsi?></td>
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
