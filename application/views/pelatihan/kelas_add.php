<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$id_kelas = $this->uri->segment(4);
$id_pelatihan = $this->uri->segment(3);
?>
<!-- Main Content -->
<div class="main-content" id="halaman-pasien">
  <section class="section">
    <div class="section-header">
      <a href="javascript:window.history.go(-1);" class="fas fa-chevron-left text-dark" style="font-size:20px; margin-left:25px;"></a>
      <h1><?=$title?></h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <?php if ($action=="tambah"): ?>
                  <form class="form-horizontal" method="post" action="<?=base_url('Pelatihan/'.$action.'Kelas/'.$id_pelatihan.'/'.$id_kelas)?>">
                <?php else: ?>
                  <form class="form-horizontal" method="post" action="<?=base_url('Pelatihan/'.$action.'Kelas/'.$id_pelatihan )?>">
                <?php endif; ?>
                  <div class="form-group">
                    <label class="col-md-2 control-label" for="inputNamaPelatihan">Pelatihan</label>
                    <div class="col-md-8">
                      <select class="form-control" name="pelatihan">
                        <?php
                        if ($action=='tambah') {
                          echo "<option value='$p->id'> $pelatihan->nama</option>";
                        } else {
                          foreach ($pelatihan as $p) {
                            $id_pelatihan = (!empty($detail)?$detail->id_pelatihan:0);
                            echo "<option value=".$p->id;
                            echo ($p->id==$id_pelatihan?' selected':'');
                            echo ">".$p->nama."</option>";
                          }
                        }
                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-2 control-label" for="inputNamaPelatihan">Nama Kelas</label>
                    <div class="col-md-8">
                      <input value="<?=(!empty($detail)?$detail->nama_kelas:'')?>" type="text" class="form-control" name="kelas" placeholder="Nama Kelas" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-2 control-label" for="inputNamaPelatihan">Kapasitas</label>
                    <div class="col-md-8">
                      <input value="<?=(!empty($detail)?$detail->kapasitas:1)?>" type="number" class="form-control" name="kapasitas" placeholder="Kapasitas" min="1" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-2 control-label" for="inputNamaPelatihan">Periode Kelas</label>
                    <?php if (empty($detail) || $detail->status_kelas==0 || $detail->status_kelas==1): ?>
                      <div class="col-md-3"style=>
                        <input value="<?=(!empty($detail)?$detail->tgl_buka:'')?>" type="date" min="<?=date('Y-m-d')?>" class="form-control" name="tgl_buka" placeholder="Tanggal Mulai Kelas" id="tglBuka" onchange="setMin()" required>
                      </div>
                      <div class="col-md-2 text-center" style="margin-top: 4px; margin-bottom: 4px;">
                        <strong>s/d</strong>
                      </div>
                      <div class="col-md-3" >
                        <input value="<?=(!empty($detail)?$detail->tgl_selesai:'')?>" type="date" min="<?=date('Y-m-d')?>" class="form-control" name="tgl_selesai" id="tglSelesai" placeholder="Tanggal Selesai Kelas" required>
                      </div>
                    <?php endif; ?>
                    <?php if (!empty($detail) && $detail->status_kelas==2): ?>
                    <div class="col-md-3"style=>
                      <input value="<?=(!empty($detail)?$detail->tgl_buka:'')?>" type="date" class="form-control" name="tgl_buka" placeholder="Tanggal Mulai Kelas" id="tglBuka" onchange="setMin()" readonly required>
                    </div>
                    <div class="col-md-2 text-center" style="margin-top: 4px; margin-bottom: 4px;">
                      <strong>s/d</strong>
                    </div>
                    <div class="col-md-3" >
                      <input value="<?=(!empty($detail)?$detail->tgl_selesai:'')?>" type="date" min="<?=date('Y-m-d')?>" class="form-control" name="tgl_selesai" id="tglSelesai" placeholder="Tanggal Selesai Kelas" required>
                    </div>
                  <?php elseif (!empty($detail) && $detail->status_kelas==3): ?>
                    <div class="col-md-3"style=>
                      <input value="<?=(!empty($detail)?$detail->tgl_buka:'')?>" type="date" class="form-control" name="tgl_buka" placeholder="Tanggal Mulai Kelas" id="tglBuka" onchange="setMin()" readonly required>
                    </div>
                    <div class="col-md-2 text-center" style="margin-top: 4px; margin-bottom: 4px;">
                      <strong>s/d</strong>
                    </div>
                    <div class="col-md-3" >
                      <input value="<?=(!empty($detail)?$detail->tgl_selesai:'')?>" type="date" class="form-control" name="tgl_selesai" id="tglSelesai" placeholder="Tanggal Selesai Kelas" readonly required>
                    </div>
                  <?php endif; ?>
                  </div>

                  <div class="form-group">
                    <div class="col-md-2"></div>
                    <div class="col-md-6 ">
                      <!-- <a href="<?php echo base_url('Pelatihan/detailPelatihan'); ?>" class="btn btn-danger">Kembali</a> -->
                      <button type="submit" name="submit" class="btn btn-primary btn-lg col-md-12">Simpan Kelas</button>
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
<script type="text/javascript">
  function setMin(){
    var today = $("#tglBuka").val();
    console.log(today);
    document.getElementById("tglSelesai").readOnly = false;
    document.getElementById("tglSelesai").setAttribute('min', today);
  }
</script>
