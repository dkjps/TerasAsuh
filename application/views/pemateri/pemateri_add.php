<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$id = $this->uri->segment(3);
?>
<!-- Main Content -->
<div class="main-content" id="halaman-pasien">
  <section class="section">
    <div class="section-header">
      <h1><?=$title?></h1>
      <div class="msg" style="display:none;">
        <?php echo @$this->session->flashdata('msg'); ?>
      </div>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label class="col-md-2 control-label" for="inputNamaPelatihan">Asal Provinsi</label>
                    <div class="col-md-8">
                      <select  class="form-control" name="provinsi">
                        <option value="">Pilih Provinsi</option>
                        <?php
                          foreach ($provinsi as $k) {
                            if (!empty($detail) && $k->id==$detail->id_provinsi) {
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
                    <label class="col-md-2 control-label" for="inputNamaPelatihan">Pilih Pemateri</label>
                    <div class="col-md-8">
                      <select  class="form-control" name="pemateri" required>
                        <option value="">Pilih Pemateri</option>
                        <?php
                          foreach ($pemateri as $k) {
                            if (!empty($detail) && $k->id==$detail->id) {
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
                      <button type="button" class="btn btn-primary">Tambah Pemateri</button>
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
