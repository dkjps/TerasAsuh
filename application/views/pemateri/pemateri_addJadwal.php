<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-body">
    
  <form class="form-horizontal">

    <div class="form-group">
    <div class="col col-md-4 col-md-offset-2">
    <label class="col-md-2 " for="inputNamaPelatihan">Asal Pemateri</label>
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <select  class="form-control" required></select>
    </div>
    </div>

    <div class="col col-md-4">
    <label class="col-md-2 " for="inputNamaPelatihan">Pilih Pemateri</label>
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <select  class="form-control" required></select>
    </div>
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
            <label class="col-md-2 control-label" for="inputNamaPelatihan">Opsi Pengaturan :</label>
            <div class="col-md-10">
            <select  class="form-control" required>
            <option>Tambah Jadwal</option>
            <option>Ubah Jadwal</option>
            <option>Hapus Jadwal</option>
            </select>
            </div>
            </div>

            <div class="box-body" id="tambahJadwal">
             <label>TAMBAH JADWAL</label>
              <div class="form-group col-md-12">
            
                <label>Pilih Pelatihan :</label>
                <select class="form-control" style="margin-top:10px; margin-bottom:10px;" name="" id=""></select>

                <label>Pilih Kelas :</label>
                <select class="form-control" style="margin-top:10px; margin-bottom:10px;" name="" id=""></select>

                <label>Pilih Topik :</label>
                <select class="form-control" style="margin-top:10px; margin-bottom:10px;" name="" id=""></select>

                    <div class="panel panel-default"  style="margin-top:10px; margin-bottom:10px;">
                      <!-- Default panel contents -->
                      <div class="panel-heading">Detail Kelas & Topik</div>
                      <div class="panel-body">
                      <div class="form-row">
                      <div class="col col-md-6">
                      <a>Jumlah Peserta</a><b>    : TOTAL PESERTA</b>
                      </div>

                      <div class="col col-md-6">
                      <a>Tanggal Mulai</a><b>     : TANGGAL MULAI</b>
                      </div>
                      </div>
                      
                      </div>
                    </div>

              </div>
          
            </div>

            <div class="box-body" id="ubahJadwal">
             <label>UBAH JADWAL</label>
              <div class="form-group col-md-12">
            
                <label>Pilih Jadwal Lama :</label>
                <select class="form-control" style="margin-top:10px; margin-bottom:10px;" name="" id=""></select>

                <div class="panel panel-default"  style="margin-top:10px; margin-bottom:10px;">
                      <!-- Default panel contents -->
                      <div class="panel-heading">Detail Kelas & Topik (Lama)</div>
                      <div class="panel-body">
                        <div class="form-row">
                        
                          <div class="col col-md-6">
                          <a>Nama Pelatihan</a><b>     : NAMA PELATIHAN</b>
                          </div>
                          
                          <div class="col col-md-6">
                          <a>Nama Kelas</a><b>     : NAMA KELAS</b>
                          </div>

                          <div class="col col-md-6">
                          <a>Nama Topik</a><b>    : NAMA TOPIK</b>
                          </div>

                          <div class="col col-md-6">
                          <a>Tanggal Mulai</a><b>     : TANGGAL MULAI</b>
                          </div>

                        </div>
                      
                      </div>

                     
              </div>

              <div class="form-group">
                        <div class="col-md-12 text-center">
                        <a href="<?php echo base_url('Kelas/detailKelas'); ?>" class="btn btn-info">Kembali</a>
                        <button type="button" class="btn btn-success">Tambah Jadwal</button>
                        </div>
                </div>

                <label>Pilih Pelatihan :</label>
                <select class="form-control" style="margin-top:10px; margin-bottom:10px;" name="" id=""></select>

                <label>Pilih Kelas :</label>
                <select class="form-control" style="margin-top:10px; margin-bottom:10px;" name="" id=""></select>

                <label>Pilih Topik :</label>
                <select class="form-control" style="margin-top:10px; margin-bottom:10px;" name="" id=""></select>

                    <div class="panel panel-default"  style="margin-top:10px; margin-bottom:10px;">
                      <!-- Default panel contents -->
                      <div class="panel-heading">Detail Kelas & Topik</div>
                      <div class="panel-body">
                        <div class="form-row">
                          <div class="col col-md-6">
                          <a>Jumlah Peserta</a><b>    : TOTAL PESERTA</b>
                          </div>

                          <div class="col col-md-6">
                          <a>Tanggal Mulai</a><b>     : TANGGAL MULAI</b>
                          </div>
                        </div>
                      
                      </div>
                    </div>

              </div>

              <div class="form-group">
                <div class="col-md-12 text-center">
                <a href="<?php echo base_url('Kelas/detailKelas'); ?>" class="btn btn-info">Kembali</a>
                <button type="button" class="btn btn-warning">Ubah Jadwal</button>
                </div>
              </div>
          
            </div>

            <div class="box-body" id="hapusJadwal">
             <label>HAPUS JADWAL</label>
              <div class="form-group col-md-12">
            
                <label>Pilih Jadwal :</label>
                <select class="form-control" style="margin-top:10px; margin-bottom:10px;" name="" id=""></select>

                <div class="panel panel-default"  style="margin-top:10px; margin-bottom:10px;">
                      <!-- Default panel contents -->
                      <div class="panel-heading">Detail Kelas & Topik </div>
                      <div class="panel-body">
                        <div class="form-row">
                        
                          <div class="col col-md-6">
                          <a>Nama Pelatihan</a><b>     : NAMA PELATIHAN</b>
                          </div>
                          
                          <div class="col col-md-6">
                          <a>Nama Kelas</a><b>     : NAMA KELAS</b>
                          </div>

                          <div class="col col-md-6">
                          <a>Nama Topik</a><b>    : NAMA TOPIK</b>
                          </div>

                          <div class="col col-md-6">
                          <a>Tanggal Mulai</a><b>     : TANGGAL MULAI</b>
                          </div>

                        </div>
                      
                      </div>
                </div>

              </div>

              <div class="form-group">
                <div class="col-md-12 text-center">
                <a href="<?php echo base_url('Kelas/detailKelas'); ?>" class="btn btn-primary">Kembali</a>
                <button type="button" class="btn btn-danger">Hapus Jadwal</button>
                </div>
              </div>
          
            </div>
            
          </form>
        </div>

   
      </div> 

    </div> 
    </div>

</form>

  </div>
</div>

<?php
  $data['judul'] = 'TambahPelatihan';
  $data['url'] = 'Pelatihan/addPelatihan';
?>
