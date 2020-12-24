<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$id = $this->uri->segment(4);
$id_kelas = $this->uri->segment(3);
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
                <form class="form-horizontal" method="post" action="<?=base_url('Kelas/'.$action.'Jadwal/'.$id_kelas.'/'.$id)?>">
                  <div class="form-group">
                    <label class="col-md-2 control-label" for="inputNamaPelatihan">Pelatihan</label>
                    <div class="col-md-8">
                      <!-- <select class="form-control col-md-8" name="pelatihan" onchange="detailPelatihan()" id="pelatihan">
                        <option value="">Pilih Pelatihan</option> -->
                        <?php
                        // foreach ($pelatihan as $p) {
                        //   $id_pelatihan = (!empty($detail)?$detail->id_pelatihan:0);
                        //   echo "<option value=".$p->id;
                        //   echo ($p->id==$id_pelatihan?' selected':'');
                        //   echo ">".$p->nama."</option>";
                        // }
                        ?>
                      <!-- </select> -->
                      <input type="text" name="" class="form-control col-md-8" value="<?=$pelatihan?>" disabled>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-2 control-label" for="inputNamaPelatihan">Kelas</label>
                    <div class="col-md-8">
                      <!-- <select class="form-control col-md-8" name="kelas" id="kelas" onchange="loadMateri()" required>                         -->
                        <?php
                          // foreach ($kelas as $k) {
                          //   if ($k->id==$id_kelas) {
                          //     echo "<option value='$k->id' selected>$k->nama</option>";
                          //   } else {
                          //     echo "<option value='$k->id'>$k->nama</option>";
                          //   }
                          // }
                        ?>
                      <!-- </select> -->
                      <input type="text" name="" class="form-control col-md-8" value="<?=$kelas?>" disabled>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-2 control-label" for="inputNamaPelatihan">Judul Materi</label>
                    <div class="col-md-8">
                      <input type="text" name="materi" class="col-md-8 form-control" value="<?=(!empty($detail)?$detail->judul_materi:'')?>" placeholder="Judul Materi" <?=(!empty($detail)?'readonly':'')?> required>
                      <!-- <select class="form-control" name="materi" id="materi" required>
                        <option value="">Pilih Materi</option>
                      </select> -->
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-2 control-label" for="inputNamaPelatihan">Pilih Pemateri</label>
                    <div class="col-md-8">
                      <select id="" class="form-control col-md-8" name="pemateri" required>
                        <option value="">Pilih Pemateri</option>
                        <?php
                          foreach ($pemateri as $k) {
                            if (!empty($detail) && $k->id==$detail->id_panitia) {
                              echo "<option value='$k->id' selected>$k->namalengkap</option>";
                            } else {
                              echo "<option value='$k->id'>$k->namalengkap</option>";
                            }
                          }
                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-2 control-label" for="inputNamaPelatihan">Waktu</label>
                    <?php
                    $tgl = (!empty($detail))?date("yy-m-d",strtotime($detail->tgl_buka_materi)):date("Y-m-d");
                    $jam = (!empty($detail))?date("H:i",strtotime($detail->tgl_buka_materi)):date("H:i");
                    ?>
                    <div class="col-md-3"style=>
                      <span  class="form-text text-muted" >Tanggal Mulai</span>
                      <input type="date" class="form-control" id="namaKelas" min="<?=date('Y-m-d')?>" name="tgl" value="<?=$tgl?>" required>
                    </div>
                    <div class="col-md-3" >
                      <span class="form-text text-muted" >Jam Mulai</span>
                      <input type="time" class="form-control" id="namaKelas" name="jam" value="<?=$jam?>" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 text-center">
                      <button type="submit" class="btn btn-primary form-control" name="submit">Simpan</button>
                    </div>
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
<script src="https://code.jquery.com/jquery-1.12.1.min.js"></script>
<script type="text/javascript">
// if ($('#kelas').val()) {
//   $('#kelas').trigger('change');
// }
//
// function loadMateri(){
//   var id = $('#kelas').val();
//   console.log(id);
//   $.ajax({
//     url : "<?=base_url('Kelas/getMateri/');?>",
//     method : "POST",
//     data : {id: id},
//     // async : true,
//     dataType : 'json',
//     success: function(data){
//       console.log(data);
//       var html = '';
//       var i;
//       if (data.length==0) {
//         var html = '<option value="">Materi Kosong</option>';
//       }
//       for(i=0; i<data.length; i++){
//         html += '<option value='+data[i].id+'>'+data[i].judul+'</option>';
//       }
//       $('#materi').html(html);
//     },
//     error: function (xhr, ajaxOptions, thrownError) {
//       console.log(xhr.status);
//       console.log(thrownError);
//     }
//   });
//   return false;
// }

if ($('#pelatihan').val()) {
	$('#pelatihan').trigger('change');
}

function detailPelatihan(){
	var id = $('#pelatihan').val();
	var url = "<?=base_url('SubMateri/detailPelatihan/');?>";
  console.log(id);
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
			// if (data.materi.length==0) {
			// 	var materi = '<option value="">Materi Kosong</option>';
			// }
			if (data.kelas.length==0) {
				var kelas = '<option value="">Kelas Kosong</option>';
			}
			// for(i=0; i<data.materi.length; i++){
			// 	materi += '<option value='+data.materi[i].id+'>'+data.materi[i].judul+'</option>';
			// }
			for(i=0; i<data.kelas.length; i++){
				kelas += '<option value='+data.kelas[i].id+'>'+data.kelas[i].nama+'</option>';
			}
			// $('#materi').html(materi);
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
