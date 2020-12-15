<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin/header');
?>
<!-- Main Content -->
<div class="main-content" id="halaman-pasien">
    <section class="section">
        <div class="section-header">
            <h1>Master Data Pelatihan</h1>
        </div>
        <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tabel Data Pelatihan</h4>
                    <div class="card-header-action">
                        <a href="#" class="btn btn-md btn-primary" data-toggle="modal" data-target="#modal-pelatihan-tambah">
                            <i class="fas fa-plus" style="padding-right:3px"></i>
                            <span style="font-size:10pt;">
                                Tambah Pelatihan
                            </span>
                        </a>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-pelatihan">
                        <thead>
                          <tr>
                            <th style="" class="text-center">No</th>
                            <th style="" class="text-center">Nama Pelatihan</th>
                            <th style="" class="text-center">Deskripsi</th>
                            <th style="" class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $warna = array('danger', 'warning', 'primary', 'success');
                            $i = 1;
                            // var_dump((object)$pelatihan);
                            foreach ($pelatihan as $p) {
                              ?>
                              <tr>
                                <td><?=$i++?></td>
                                <td style="min-width:0;"><a class="" href="<?php echo base_url("admin/master/master-pelatihan/detail-pelatihan/$p->id"); ?>"><?php echo $p->nama; ?></a></td>
                                <td style="min-width:0;"><?php echo $p->deskripsi; ?></td>
                                <td class="text-center" style="min-width:120px;">
                                  <a href="<?=base_url("admin/master/edit-pelatihan/$p->id")?>" class="btn btn-primary update-dataPegawai" data-id="<?php echo $p->id; ?>">Edit</a>
                                  <button class="btn btn-danger konfirmasiHapus-pegawai" onclick="konfirmasiHapus('<?=base_url("Pelatihan/hapusPelatihan/$p->id")?>')">Hapus</button>
                                </td>
                              </tr>
                              <?php
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
    </section>
</div>
<?php $this->load->view('admin/modal-master-pelatihan-edit');?>
<?php $this->load->view('admin/modal-master-pelatihan-tambah');?>
<?php $this->load->view('admin/footer'); ?>
