<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin/header');
$warna = array('danger', 'warning', 'primary', 'success');
$caption = array('Belum Buka', 'Daftar', 'Jalan', 'Selesai');
$id_soal = $this->uri->segment(3);
$id_sub = $this->uri->segment(4);
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
                <div class="table-responsive">
                  <?php echo form_open_multipart('SubMateri/ubahSoal/'.$id_soal.'/'.$id_sub);?>
                  <div class="form-group col-md-12">
                    <label class="col-md-2 control-label" for="inputNamaPelatihan">Soal</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control col-md-" name="soal" value="<?=$soal->soal?>" placeholder="Soal">
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
                    <input type="text" class="form-control col-md-12 border-success" name="benar" value="<?=$benar->jawaban?>" placeholder="Jawaban Benar">
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
                    <?php foreach ($salah as $s): ?>
                    <div class="file-wrap mt-2">
                      <div class="input-group-prepend">
                        <input type="text" class="form-control col-md-10 border-danger" name="answers[]" value="<?=$s->jawaban?>" placeholder="Jawaban Salah">
                        <div class="input-group-text">
                          <a href="#" class="btn btn-danger remove_field text-white"><i class="fas fa-trash"></i></a>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                  </div>

                </div>

                <div class="form-group col-md-12">
                  <button type="submit" name="submit" class="btn btn-info col-md-6">Ubah Soal</button>
                </div>
                <?php echo form_close(); ?>
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
</script>
