<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin/header');
$warna = array('danger', 'warning', 'primary', 'success');
$caption = array('Belum Buka', 'Daftar', 'Jalan', 'Selesai');
$id_sub = $this->uri->segment(3);
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
              <div class="col col-md-12">
                <?php if ($is_test==0): ?>
                  <?php echo @$this->session->flashdata('msg'); ?>
                  <div id="accordion">
                    <div class="card">
                      <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                          <button class="btn btn-primary" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Tambah Materi Belajar
                          </button>
                        </h5>
                      </div>

                      <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                          <div class="table-responsive">
                            <?php echo form_open_multipart('SubMateri/tambahMateriPembelajaran/'.$id_sub);?>
                            <div class="form-group col-md-12" id="file">
                              <label class="col-md-2 control-label" for="inputNamaPelatihan">File Materi  <button class="btn btn-success" type="button" name="button" id="btnTambahFile">
                                <i class="fas fa-plus"></i>
                              </button>
                            </label>
                            <div class="col-md-6" id="file-materi-wrap">
                              <div class="file-wrap">
                                <div class="input-group">
                                  <input type="file" name="files[]" class="form-control col-md-8">
                                </div>
                                <input type="text" class="form-control col-md-8" name="file_desk[]" value="" placeholder="Deskripsi File">
                              </div>
                            </div>
                          </div>

                          <div class="form-group col-md-12">
                            <button type="submit" name="submit" class="btn btn-info col-md-6">Tambah Materi</button>
                          </div>
                          <?php echo form_close(); ?>
                        </div>
                        </div>
                      </div>
                    </div>
                    </div>
              <?php else: ?>
                <div class="table-responsive">
                  <?php echo @$this->session->flashdata('msg'); ?>
                  <div id="accordion">
                    <div class="card">
                      <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                          <button class="btn btn-primary" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            <i class="fas fa-plus"></i>
                            Tambah Soal
                          </button>
                        </h5>
                      </div>

                      <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                          <?php echo form_open_multipart('SubMateri/tambahSoal/'.$id_sub);?>
                          <div class="form-group col-md-12">
                            <label class="col-md-2 control-label" for="inputNamaPelatihan">Soal</label>
                            <div class="col-md-6">
                              <input type="text" class="form-control col-md-" name="soal" value="" placeholder="Soal">
                            </div>
                          </div>
                          <div class="form-group col-md-12" style="display:none;">
                            <label class="col-md-2 control-label" for="inputNamaPelatihan">Tipe</label>
                            <div class="col-md-6">
                              <select class="form-control" name="tipe">
                                <option value="1">Radio Button</option>
                                <option value="0">Check Box</option>
                                <!-- <option value="2">Uraian</option> -->
                              </select>
                            </div>
                          </div>
                          <div class="form-group col-md-12">
                            <label class="col-md-2 control-label" for="inputNamaPelatihan">
                              Jawaban Benar
                              <!-- <button class="btn btn-success" type="button" name="button" id="btnTambahSoal">
                                <i class="fas fa-plus"></i>
                              </button> -->
                            </label>

                            <div class="col-md-6">
                              <!-- <div class="file-wrap"> -->
                                <input type="text" class="form-control col-md-12 border-success" name="benar" value="" placeholder="Jawaban Benar">
                              <!-- </div> -->
                            </div>
                          </div>

                          <div class="form-group col-md-12" id="file">
                            <label class="col-md-2 control-label" for="inputNamaPelatihan">
                              Jawaban Salah
                              <button class="btn btn-success" type="button" name="button" id="btnTambahSoal">
                                <i class="fas fa-plus"></i>
                              </button>
                            </label>

                            <div class="col-md-6" id="soal-materi-wrap">
                              <div class="file-wrap">
                                <input type="text" class="form-control col-md-12 border-danger" name="answers[]" value="" placeholder="Jawaban Salah">
                              </div>
                            </div>
                          </div>

                          <div class="form-group col-md-12">
                            <button type="submit" name="submit" class="btn btn-info col-md-6">Tambah Soal</button>
                          </div>
                          <?php echo form_close(); ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endif; ?>

              <div class="table-responsive">
                <?php if ($is_test==0): ?>
                  <table id="" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Deskripsi</th>
                        <th style="text-align: center;">Aksi</th>
                      </tr>
                    </thead>
                    <tbody id="data-pegawai">
                      <?php $i=1; foreach ($detail as $s): ?>
                        <tr>
                          <td><?=$i++?></td>
                          <td><?=$s->deskripsi?></td>
                          <td style="min-width:150px;">
                            <?php if ($s->tipe!=0): ?>
                              <!-- <button type="button" name="button" class="btn btn-secondary" onclick="downloadFile('<?=$s->isi?>')"><i class="fas fa-download"></i></button> -->
                              <a href="<?=$s->isi?>" rel="noreferrer" target="_blank" class="btn btn-success"><i class="fas fa-download"></i></a>
                            <?php endif; ?>
                            <button class="btn btn-danger konfirmasiHapus-pegawai" onclick="konfirmasiHapus('<?=base_url("SubMateri/hapusMateriPembelajaran/$s->id/$s->id_subbab_materi")?>')"><i class="fas fa-trash"></i></button></td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  <?php else: ?>
                    <table id="" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Soal</th>
                          <th style="text-align: center;">Aksi</th>
                        </tr>
                      </thead>
                      <tbody id="data-pegawai">
                        <?php $i=1; foreach ($detail as $s): ?>
                          <tr>
                            <td><?=$i++?></td>
                            <td><a href="<?=base_url("SubMateri/detailSoal/$s->id/$s->id_subbab_materi")?>"><?=$s->soal?></a></td>
                            <td class="text-center"><button class="btn btn-danger konfirmasiHapus-pegawai" onclick="konfirmasiHapus('<?=base_url("SubMateri/hapusSoal/$s->id/$s->id_subbab_materi")?>')"><i class="fas fa-trash"></i></button></td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  <?php endif; ?>
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
<!-- <script src="https://code.jquery.com/jquery-1.12.1.min.js"></script> -->

<script type="text/javascript">
var max_fields      = 10; //maximum input boxes allowed
var wrapper   		= $("#file-materi-wrap"); //Fields wrapper
var add_button      = $("#btnTambahFile"); //Add button ID

var x = 1;
$(add_button).click(function(e){ //on add input button click
  e.preventDefault();
  if(x < max_fields){ //max input box allowed
    x++; //text box increment
    $(wrapper).append(`<div class="file-wrap mt-2">
    <div class="input-group">
    <input type="file" name="files[]" class="form-control col-md-8">
    <div class="input-group-prepend">
    <div class="input-group-text">
    <a hre  f="#" class="btn btn-danger remove_field text-white"><i class="fas fa-trash"></i></a>
    </div>
    </div>
    </div>
    <input type="text" class="form-control col-md-8" name="file_desk[]" value="" placeholder="Deskripsi File">
    </div>`);
  }
});

$(wrapper).on("click",".remove_field", function(e){
  e.preventDefault(); $(this).parents('.file-wrap').remove(); x--;
})
</script>

<script type="text/javascript">
var max      = 10; //maximum input boxes allowed
var wrap   		= $("#soal-materi-wrap"); //Fields wrap
var add_btn      = $("#btnTambahSoal"); //Add btn ID

var x = 1;
$(add_btn).click(function(e){ //on add input btn click
  e.preventDefault();
  if(x < max){ //max input box allowed
    x++; //text box increment
    $(wrap).append(`<div class="file-wrap mt-2">
    <div class="input-group">
    <input type="text" class="form-control col-md-12 border-danger" name="answers[]" value="" placeholder="Jawaban Salah">
    <div class="input-group-prepend">
    <div class="input-group-text">
    <a href="#" class="btn btn-danger remove_field text-white"><i class="fas fa-trash"></i></a>
    </div>
    </div>
    </div>
    </div>`);
  }
});

$(wrap).on("click",".remove_field", function(e){
  e.preventDefault(); $(this).parents('.file-wrap').remove(); x--;
})
function downloadFile(link){
  window.open(link, '_blank');
}
</script>
