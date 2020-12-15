<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin/header');
?>
<!-- Main Content -->
<div class="main-content" id="halaman-pasien">
    <section class="section">
        <div class="section-header">
            <h1>Data Pelatihan Panitia</h1>
        </div>
        <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tabel Data Pelatihan Panitia</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-master-panitia">
                        <thead>                                 
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Task Name</th>
                            <th>Progress</th>
                            <th>Members</th>
                            <th>Due Date</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>                                 
                            <tr>
                                <td>1</td>
                                <td>dummy</td>
                                <td>dummy</td>
                                <td>dummy</td>
                                <td>dummy</td>
                                <td>dummy</td>
                                <td>dummy</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>dummy</td>
                                <td>dummy</td>
                                <td>dummy</td>
                                <td>dummy</td>
                                <td>dummy</td>
                                <td>dummy</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>dummy</td>
                                <td>dummy</td>
                                <td>dummy</td>
                                <td>dummy</td>
                                <td>dummy</td>
                                <td>dummy</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>dummy</td>
                                <td>dummy</td>
                                <td>dummy</td>
                                <td>dummy</td>
                                <td>dummy</td>
                                <td>dummy</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>dummy</td>
                                <td>dummy</td>
                                <td>dummy</td>
                                <td>dummy</td>
                                <td>dummy</td>
                                <td>dummy</td>
                            </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </section>
</div>
<?php $this->load->view('admin/footer'); ?>