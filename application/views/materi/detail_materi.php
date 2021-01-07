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
      <a href="javascript:window.history.go(-1);" class="fas fa-chevron-left text-dark" style="font-size:20px; margin-left:25px;"></a>
      <h1><?=$title?></h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="col col-md-12" style="z-index:9999;">
                <?php echo @$this->session->flashdata('msg'); ?>
                <a href="<?=base_url('SubMateri/tambahSubMateri/'.$id)?>" class="btn btn-primary float-right" style="margin-top:10px; margin-bottom:5px;"><i class="fas fa-plus"></i>  Tambah Materi Belajar</a>
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
                      <td style="width:70px;"><label class="">Kelas</label></td>
                      <th style="width:50px;">:</th>
                      <th><h6 class=""><a href="<?=base_url("Kelas/detailKelas/$detail->id_kelas")?>"><?=($detail)?$detail->nama_kelas:''?></a></h6></th>
                    </tr>
                    <tr>
                      <td style="width:70px;"><label class="">Materi</label></td>
                      <th style="width:50px;">:</th>
                      <th><h6 class=""><a href="<?=base_url("Materi/detailMateri/$detail->id_materi")?>"><?=($detail)?$detail->judul_materi:''?></a></h6></th>
                    </tr>
                    <tr>
                      <td style="width:70px;"><label class="">Pemateri</label></td>
                      <th style="width:50px;">:</th>
                      <th><h6 class=""><a href="<?=base_url("Pemateri/jadwalPemateri/$detail->id_panitia")?>"> <?=($detail)?$detail->namalengkap:''?></a></h6></th>
                    </tr>
                  </table>
                  <br>
                <div class="table-responsive">
                  <table id="" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Tipe</th>
                        <th>Deksripsi</th>
                        <th>Prioritas</th>
                        <th style="text-align: center;">Aksi</th>
                      </tr>
                    </thead>
                    <tbody id="data-pegawai">

                      <?php
                        $s = (array)$submateri;
                        $n =1;
                        $m =1;
                        for ($i=0; $i < count($s); $i++) {
                      ?>
                        <tr>
                          <td><?=$n++?></td>
                          <td>
                            <a href="<?=base_url("SubMateri/detailSubMateri/".$s[$i]->id_sub)?>"><?=$s[$i]->subbab?></a>
                          </td>
                          <td><?=$s[$i]->deskripsi_subbab?></td>
                          <td class="text-center">
                            <?php if ($s[$i]->is_test==0): ?>
                                <?php if ($m>1): ?>
                                  <a href="<?=base_url("SubMateri/naik/".$s[$i]->id_sub."/".$s[$i-1]->id_sub."/".$id)?>" class="btn btn-secondary update-dataPegawai"><i class="fas fa-chevron-up"></i></a>
                                <?php endif; ?>
                                <?php if ($m<count($jumlah_materi)): ?>
                                <a href="<?=base_url("SubMateri/turun/".$s[$i+1]->id_sub."/".$s[$i]->id_sub."/".$id)?>" class="btn btn-secondary update-dataPegawai"><i class="fas fa-chevron-down"></i></a>
                              <?php endif; ?>
                                <?php $m++ ?>
                            <?php endif; ?>
                          </td>
                          <td>
                            <a href="<?=base_url("SubMateri/ubahSubMateri/".$s[$i]->id_materi."/".$s[$i]->id_sub)?>" class="btn btn-primary update-dataPegawai"><i class="fas fa-pen"></i></a>
                            <?php if ($s[$i]->is_test==0): ?>
                            <button class="btn btn-danger konfirmasiHapus-pegawai" onclick="konfirmasiHapus('<?=base_url("SubMateri/hapusSubMateri/".$s[$i]->id_sub."/".$s[$i]->id_materi)?>')"><i class="fas fa-trash"></i></button>
                            <?php endif; ?>
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
    </div>
  </section>
</div>
<?php $this->load->view('admin/footer'); ?>
