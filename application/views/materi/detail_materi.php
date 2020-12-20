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
              <div class="col col-md-12" style="z-index:9999;">
                <?php echo @$this->session->flashdata('msg'); ?>
                <a href="<?=base_url('SubMateri/tambahSubMateri/'.$id)?>" class="btn btn-primary float-right" style="margin-top:10px; margin-bottom:5px;"><i class="fas fa-plus"></i>  Tambah Sub Materi</a>
              </div>
            </div>
            <div class="card-body">
              <div class="col col-md-12">
                  <table>
                    <tr>
                      <td style="width:70px;"><label class="">Pelatihan</label></td>
                      <th style="width:50px;">:</th>
                      <th><h6 class=""><a class="" href="<?php echo base_url("Pelatihan/detailPelatihan/$detail->id_pelatihan"); ?>"><?=($detail)?$detail->nama_pelatihan:''?></h6></a></th>
                    </tr>
                    <tr>
                      <td style="width:70px;"><label class="">Materi</label></td>
                      <th style="width:50px;">:</th>
                      <th><h6 class=""><?=($detail)?$detail->judul_materi:''?></h6></th>
                    </tr>
                    <tr>
                      <td style="width:70px;"><label class="">Pemateri</label></td>
                      <th style="width:50px;">:</th>
                      <th><h6 class=""><?=($detail)?$detail->namalengkap:''?></h6></th>
                    </tr>
                  </table>
                  <br>
                <div class="table-responsive">
                  <table id="" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Judul</th>
                        <th>Deksripsi</th>
                        <th style="text-align: center;">Aksi</th>
                      </tr>
                    </thead>
                    <tbody id="data-pegawai">
                      <?php $i=1; foreach ($submateri as $s): ?>
                        <tr>
                          <td><?=$i++?></td>
                          <td><a href="<?=base_url("SubMateri/detailSubMateri/$s->id_sub")?>"><?=$s->subbab?></a></td>
                          <td><?=$s->deskripsi_subbab?></td>
                          <td><button class="btn btn-danger konfirmasiHapus-pegawai" onclick="konfirmasiHapus('<?=base_url("SubMateri/hapusSubMateri/$s->id_sub/$s->id_materi")?>')"><i class="fas fa-trash"></i></button></td>
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
    </div>
  </section>
</div>
<?php $this->load->view('admin/footer'); ?>
