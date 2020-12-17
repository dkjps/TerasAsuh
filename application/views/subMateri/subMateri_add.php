<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$id = $this->uri->segment(3);
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
							<div class="table-responsive">
								<form class="form-horizontal" method="post" action="<?=base_url("SubMateri/tambahSubMateri")?>">
									<div class="form-group col-md-12">
										<div class="form-group col-md-6">
											<label for="inputNamaPelatihan">Pelatihan</label>
											<select class="form-control" name="pelatihan" id="pelatihan" onchange="detailPelatihan()" required>
												<option value="">Pilih Pelatihan</option>
												<?php foreach ($pelatihan as $p): ?>
													<option value="<?=$p->id?>"><?=$p->nama?></option>
												<?php endforeach; ?>
											</select>
										</div>

										<div class="form-group col-md-6">
											<label for="inputNamaPelatihan">Nama Kelas</label>
											<select class="form-control" name="kelas" id="kelas" required>
												<option value="">Pilih Kelas</option>
											</select>
										</div>

										<div class="form-group col-md-6">
											<label for="inputNamaPelatihan">Judul Materi</label>
											<select class="form-control" name="materi" id="materi" required>
												<option value="">Pilih Materi</option>
											</select>
										</div>

										<div class="form-group col-md-6">
											<label for="inputNamaPelatihan">Nama Pemateri</label>
											<select class="form-control" name="pemateri">
												<option value="">Pilih Pemateri</option>
												<?php foreach ($pemateri as $p): ?>
													<option value="<?=$p->id?>"><?=$p->namalengkap?></option>
												<?php endforeach; ?>
											</select>
										</div>

										<label class="col-md-2 control-label" for="inputNamaPelatihan">Tipe Materi</label>
										<div class="col-md-6">
											<select class="form-control" name="tipe" id="tipe" onchange="pilihTipe()" required>
												<option value="1-Pre Test">Pre Test</option>
												<option value="0-Materi Belajar">Materi Belajar</option>
												<option value="1-Post Test">Post Test</option>
											</select>
										</div>
									</div>

									<div class="form-group col-md-12">
										<label class="col-md-2 control-label" for="inputNamaPelatihan">Deskripsi Materi</label>
										<div class="col-md-6">
											<textarea class="form-control" rows="3" style="resize: none;" name="deskripsi"></textarea>
										</div>
									</div>


									<div class="form-group col-md-12" id="file" style="display:none;">
										<label class="col-md-2 control-label" for="inputNamaPelatihan">File Materi  <button class="btn btn-success" type="button" name="button">
												<i class="fas fa-plus"></i>
											</button>
										</label>
										<div class="col-md-6">
											<input type="file" class="form-control" id="exampleInputFile" required>
										</div>
									</div>

								<div class="form-group col-md-12">
									<button type="submit" name="submit" class="btn btn-primary col-md-6">Tambah Materi</button>
								</div>

							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
</div>
<script type="text/javascript">
function pilihTipe(){
	var id = $('#tipe').val();
	if (id[0]==1) {
		$('#file').hide();
	} else {
		$('#file').show();
	}
}
</script>
<script src="https://code.jquery.com/jquery-1.12.1.min.js"></script>
<script type="text/javascript">
if ($('#kelas').val()) {
  $('#kelas').trigger('change');
}

function detailPelatihan(){
  var id = $('#pelatihan').val();
	var url = "<?=base_url('SubMateri/detailPelatihan/');?>";
  $.ajax({
    url : url,
    method : "POST",
    data : {id: id},
    // async : true,
    dataType : 'json',
    success: function(data){
      console.log(data);
      var materi = '';
      var kelas = '';
      var i;
      if (data.materi.length==0) {
        var materi = '<option value="">Materi Kosong</option>';
      }
      if (data.kelas.length==0) {
        var kelas = '<option value="">Kelas Kosong</option>';
      }
      for(i=0; i<data.materi.length; i++){
        materi += '<option value='+data.materi[i].id+'>'+data.materi[i].judul+'</option>';
      }
      for(i=0; i<data.kelas.length; i++){
        kelas += '<option value='+data.kelas[i].id+'>'+data.kelas[i].nama+'</option>';
      }
      $('#materi').html(materi);
      $('#kelas').html(kelas);
    },
    error: function (xhr, ajaxOptions, thrownError) {
      console.log(xhr.status);
      console.log(thrownError);
    }
  });
  return false;
}
</script>
