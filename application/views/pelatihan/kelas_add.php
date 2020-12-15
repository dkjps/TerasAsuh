<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>
<?php
  $id_kelas = $this->uri->segment(4);
  $id_pelatihan = $this->uri->segment(3);
?>
<div class="box">
  <div class="box-body">
    <form class="form-horizontal" method="post" action="<?=base_url('Pelatihan/'.$action.'Kelas/'.$id_pelatihan.'/'.$id_kelas)?>">
      <div class="form-group">
        <label class="col-md-2 control-label" for="inputNamaPelatihan">Pelatihan</label>
        <div class="col-md-8">
          <select class="form-control" name="pelatihan">
            <?php
            foreach ($pelatihan as $p) {
              echo "<option value=".$p->id;
              echo ($p->id==$id_pelatihan?' selected':'');
              echo ">".$p->nama."</option>";
            }
            ?>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-2 control-label" for="inputNamaPelatihan">Nama Kelas</label>
        <div class="col-md-8">
          <input value="<?=(!empty($detail)?$detail->nama:'')?>" type="text" class="form-control" name="kelas" placeholder="Nama Kelas">
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-2 control-label" for="inputNamaPelatihan">Kapasitas</label>
        <div class="col-md-8">
          <input value="<?=(!empty($detail)?$detail->kapasitas:'')?>" type="number" class="form-control" name="kapasitas" placeholder="Kapasitas">
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-2 control-label" for="inputNamaPelatihan">Periode Kelas</label>
        <div class="col-md-3"style=>
          <input value="<?=(!empty($detail)?$detail->tgl_buka:'')?>" type="date" class="form-control" name="tgl_buka" placeholder="Tanggal Mulai Kelas">
        </div>
        <div class="col-md-2 text-center" style="margin-top: 4px; margin-bottom: 4px;">
          <strong>s/d</strong>
        </div>
        <div class="col-md-3" >
          <input value="<?=(!empty($detail)?$detail->tgl_selesai:'')?>" type="date" class="form-control" name="tgl_selesai" placeholder="Tanggal Selesai Kelas">
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-2"></div>
        <div class="col-md-2 ">
          <!-- <a href="<?php echo base_url('Pelatihan/detailPelatihan'); ?>" class="btn btn-danger">Kembali</a> -->
          <button type="submit" name="submit" class="btn btn-primary">Simpan Kelas</button>
        </div>
      </div>

    </form>

  </div>
</div>

<?php
$data['judul'] = 'TambahPelatihan';
$data['url'] = 'Pelatihan/addPelatihan';
?>
