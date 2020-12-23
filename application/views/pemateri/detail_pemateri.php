<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// $this->load->view('admin/header');
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
                <a href="<?php echo base_url('Pemateri/tambahJadwal/'.$id); ?>" class="btn btn-info float-right" role="button" aria-pressed="true"><i class="fas fa-plus" style="padding-right:3px"></i> Tambah Jadwal</a>
              </div>
            </div>
            <div class="card-body">
              <?php echo @$this->session->flashdata('msg'); ?>
              <form>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="inputNamaPelatihan">Nama Pemateri</label>
                    <span class="form-control"><?=(!empty($detail)?$detail->namalengkap:'')?></span>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputTanggalPelatihan">Asal Provinsi</label>
                    <span class="form-control"><?=(!empty($detail)?$detail->nama_provinsi:'')?></span>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputTanggalPelatihan">Jumlah Kelas</label>
                    <span class="form-control"><?=(!empty($detail)?$detail->jumlah_kelas:'')?></span>
                  </div>
                </div>
              </form>
              <div class="table-responsive">
                <table id="list-materi" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Kelas</th>
                      <th>Materi Pelatihan</th>
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
                        <td><?=$m->nama_kelas?></td>
                        <td><?=$m->judul_materi?></td>
                        <td style="min-width:150px;" class="text-center"><?=date('l, d F yy H:i', strtotime($m->tgl_buka_materi))?></td>
                        <td style="min-width:100px;">
                          <!-- <a href="<?=base_url("Pemateri/ubahJadwal/$m->id_panitia/$m->id_jadwal")?>" class="btn btn-sm btn-primary update-data" ><i class="fas fa-pen"></i></a> -->
                          <button class="btn btn-sm btn-danger" onclick="konfirmasiHapus('<?=base_url("Pemateri/hapusJadwal/$m->id_panitia/$m->id_jadwal")?>')"><i class="fas fa-trash"></i></button>
                        </td>
                      </tr>
                    <?php } ?>
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
