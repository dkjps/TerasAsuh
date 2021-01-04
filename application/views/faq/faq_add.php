<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$id = $this->uri->segment(4);
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
								<?php echo form_open_multipart("master/Faq/$action"."pertanyaan/$id");?>
								<div class="form-group col-md-12">
									<label class="control-label" for="inputNamaPelatihan">Kategori</label>
									<select class="form-control col-md-6" name="kategori" id="tipe" onchange="pilihTipe()" required>
										<?php foreach ($kategori as $k) { ?>
											<option value="<?=$k->id?>" <?=(!empty($detail) && $detail->id_kategori==$k->id?'selected':'')?>><?=$k->kategori?></option>
										<?php	} ?>
									</select>
								</div>

								<div class="form-group col-md-12">
									<label class="control-label" for="inputNamaPelatihan">Pertanyaan</label>
									<input type="text" name="pertanyaan" value="<?=(empty($detail)?'':$detail->pertanyaan);?>" class="form-control col-md-6">
								</div>

								<div class="form-group col-md-12">
									<button type="submit" name="submit" class="btn btn-primary col-md-6">Simpan</button>
								</div>
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
		</div>`);
	}
});

$(wrapper).on("click",".remove_field", function(e){
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
if ($('#pelatihan').val()) {
	$('#pelatihan').trigger('change');
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
