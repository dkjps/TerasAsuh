<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('operator/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas fa-chalkboard"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Kelas</h4>
                  </div>
                  <div class="card-body">
                    10
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Peserta</h4>
                  </div>
                  <div class="card-body">
                    42
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="fas fa-hand-holding-heart"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Kader</h4>
                  </div>
                  <div class="card-body">
                    1,201
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-theater-masks"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Keluarga Binaan</h4>
                  </div>
                  <div class="card-body">
                    47
                  </div>
                </div>
              </div>
            </div>                  
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Statistik Keseluruhan Data Non Filter Kelas</h4>
                </div>
                <div class="card-body">
                  <canvas id="myChart" height="182"></canvas>
                  <div class="statistic-details mt-sm-4">
                    <div class="statistic-details-item">
                      <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 7%</span>
                      <div class="detail-value">1,243</div>
                      <div class="detail-name">Pendaftar Bulan Ini</div>
                    </div>
                    <div class="statistic-details-item">
                      <span class="text-muted"><span class="text-danger"><i class="fas fa-caret-down"></i></span> 23%</span>
                      <div class="detail-value">2,902</div>
                      <div class="detail-name">Angkatan Baru Bulan ini</div>
                    </div>
                    <div class="statistic-details-item">
                      <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 19%</span>
                      <div class="detail-value">7,142</div>
                      <div class="detail-name">Keluarga Binaan Baru Bulan Ini</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Statistik Keseluruhan Data Non Filter Kelas</h4>
                </div>
                <div class="card-body">
                  <canvas id="testChart" height="182"></canvas>
                  <div class="statistic-details mt-sm-4">
                    <div class="statistic-details-item">
                      <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 7%</span>
                      <div class="detail-value">1,243</div>
                      <div class="detail-name">Pendaftar Bulan Ini</div>
                    </div>
                    <div class="statistic-details-item">
                      <span class="text-muted"><span class="text-danger"><i class="fas fa-caret-down"></i></span> 23%</span>
                      <div class="detail-value">2,902</div>
                      <div class="detail-name">Angkatan Baru Bulan ini</div>
                    </div>
                    <div class="statistic-details-item">
                      <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 19%</span>
                      <div class="detail-value">7,142</div>
                      <div class="detail-name">Keluarga Binaan Baru Bulan Ini</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 col-md-6 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Statistik Data Berdasarkan Kategori</h4>
                </div>
                <div class="card-body">
                  <canvas id="chart-kategori-user"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Statistik Data Berdasarkan Pekerjaan</h4>
                </div>
                <div class="card-body">
                  <canvas id="chart-pekerjaan-user"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 col-md-6 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Statistik Data Berdasarkan Kota</h4>
                </div>
                <div class="card-body">
                  <canvas id="chart-kota-user"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Statistik Data Berdasarkan Provinsi</h4>
                </div>
                <div class="card-body">
                  <canvas id="chart-provinsi-user"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 col-md-6 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Statistik Skrining User Akhir Ini</h4>
                </div>
                <div class="card-body">
                  <canvas id="chart-skrining-user"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Statistik Skrining User Khusus Rentan Akhir Ini</h4>
                </div>
                <div class="card-body">
                  <canvas id="chart-skrining-khusus-user"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 col-md-6 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Statistik Skrining User Per Tanggal Skrining Berdasarkan Status</h4>
                </div>
                <div class="card-body">
                  <canvas id="chart-skrining-pertanggal-user"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Statistik Skrining User Per Tanggal Skrining Khusus Rentan</h4>
                </div>
                <div class="card-body">
                  <canvas id="chart-skrining-pertanggal-rentan-user"></canvas>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
<?php $this->load->view('operator/footer'); ?>