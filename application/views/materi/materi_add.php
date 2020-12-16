<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$id = $this->uri->segment(3);
// $id = $this->uri->segment(4);
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
                <form class="form-horizontal" method="post" action="<?=base_url('Materi/'.$action.'Materi/'.$id)?>">
                  <div class="form-group">
                    <label class="col-md-2 control-label" for="inputNamaPelatihan">Pelatihan</label>
                    <div class="col-md-8">
                      <select class="form-control" name="pelatihan" id="pelatihan" required>
                        <option value="">Pilih Pelatihan</option>
                        <?php
                          foreach ($pelatihan as $k) {
                            if ($k->id==$detail->id_pelatihan) {
                              echo "<option value='$k->id' selected>$k->nama</option>";
                            } else {
                              echo "<option value='$k->id'>$k->nama</option>";
                            }
                          }
                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-2 control-label" for="inputNamaPelatihan">Judul Materi</label>
                    <div class="col-md-8">
                      <input type="text" name="materi" class="form-control" value="<?=(!empty($detail)?$detail->judul:'')?>">
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
if ($('#kelas').val()) {
  $('#kelas').trigger('change');
}

function loadMateri(){
  var id = $('#kelas').val();
  console.log(id);
  $.ajax({
    url : "<?=base_url('Kelas/getMateri/');?>",
    method : "POST",
    data : {id: id},
    // async : true,
    dataType : 'json',
    success: function(data){
      console.log(data);
      var html = '';
      var i;
      if (data.length==0) {
        var html = '<option value="">Materi Kosong</option>';
      }
      for(i=0; i<data.length; i++){
        html += '<option value='+data[i].id+'>'+data[i].judul+'</option>';
      }
      $('#materi').html(html);
    },
    error: function (xhr, ajaxOptions, thrownError) {
      console.log(xhr.status);
      console.log(thrownError);
    }
  });
  return false;
}
</script>
