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
								<!-- <form class="form-horizontal" method="post" action="<?=base_url("SubMateri/tambahSubMateri")?>" enctype="multipart/form-data"> -->
								<?php echo form_open_multipart('SubMateri/tambahSubMateri');?>
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


									<!-- <div class="form-group col-md-12" id="file"> -->
										<div class="form-group col-md-12" id="file" style="display:none;">
										<label class="col-md-2 control-label" for="inputNamaPelatihan">File Materi  <button class="btn btn-success" type="button" name="button" id="btnTambahFile">
											<i class="fas fa-plus"></i>
										</button>
									</label>
									<div class="col-md-6" id="file-materi-wrap">
										<div class="file-wrap">
											<div class="input-group">
												<input type="file" name="files[]" class="form-control col-md-8">
												<div class="input-group-prepend">
													<!-- <div class="input-group-text">
														<a href="#" class="btn btn-danger remove_field"><i class="fas fa-trash"></i></a>
													</div> -->
												</div>
											</div>
											<input type="text" class="form-control col-md-8" name="file_desk[]" value="" placeholder="Deskripsi File">
										</div>
									</div>
								</div>

								<div class="form-group col-md-12">
									<button type="submit" name="submit" class="btn btn-primary col-md-6">Tambah Materi</button>
								</div>
							<!-- </form> -->
							<?php echo form_close(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
</div>
<script src="https://code.jquery.com/jquery-1.12.1.min.js"></script>

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
		<a href="#" class="btn btn-danger remove_field"><i class="fas fa-trash"></i></a>
		</div>
		</div>
		</div>
		<input type="text" class="form-control col-md-8" name="file_desk[]" value="" placeholder="Deskripsi File">
		</div>`); //add input box
	}
});

$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
	e.preventDefault(); $(this).parents('.file-wrap').remove(); x--;
})

function pilihTipe(){
	var id = $('#tipe').val();
	if (id[0]==1) {
		$('#file').hide();
	} else {
		$('#file').show();
	}
}
</script>

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
