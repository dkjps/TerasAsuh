<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-body">
    
  <form class="form-horizontal">

  <div class="form-group">
    <label class="col-md-2 control-label" for="inputNamaPelatihan">Asal Provinsi</label>
    <div class="col-md-8">
      <select  class="form-control"></select>
    </div>
    </div>

    <div class="form-group">
    <label class="col-md-2 control-label" for="inputNamaPelatihan">Pilih Pemateri</label>
    <div class="col-md-8">
      <select  class="form-control" required></select>
    </div>
    </div>

    <div class="form-group">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Detail Pemateri</div>
        <div class="panel-body">
          <form class="form-horizontal">
            <div class="form-group">
            <label class="col-md-2 control-label" for="inputNamaPelatihan">Nama :</label>
            <div class="col-md-10">
             <input type="text" class="form-control" id="namaKelas" placeholder="Nama" readonly="readonly">
            </div>
            </div>

            <div class="form-group">
            <label class="col-md-2 control-label" for="inputNamaPelatihan">Total Kelas :</label>
            <div class="col-md-10">
             <input type="text" class="form-control" id="namaKelas" placeholder="Total Kelas" readonly="readonly">
            </div>
            </div>

          </form>
        </div>

        <!-- Table -->
        <div class="table-responsive">
        <table class="table">
        <table id="list-data" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Kelas</th>
              <th>Nama Topik</th>
              <th>Jam Kelas</th>
            </tr>
          </thead>
          <tbody id="jadwal-pemateri">
          </tbody>
        </table>
        </table>
        </div>
   
      </div> 

    </div> 
    </div>

    <div class="form-group">
      <div class="col-md-12 text-center">
      <a href="<?php echo base_url('Kelas/detailKelas'); ?>" class="btn btn-danger">Kembali</a>
      <button type="button" class="btn btn-primary">Tambah Pemateri</button>
      </div>
    </div>

</form>

  </div>
</div>

<?php
  $data['judul'] = 'TambahPelatihan';
  $data['url'] = 'Pelatihan/addPelatihan';
?>
