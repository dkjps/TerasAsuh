<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!-- <div class="modal fade" id="konfirmasiHapus" role="dialog">
        <div class="modal-dialog modal-md" role="document" style="margin-top:40vh;">
          <div class="modal-content">
              <div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
              <h3 style="display:block; text-align:center;">Konfirmasi</h3>
              <div class="row">
                <div class="col-md-12" style="">
                  <a href="#" class="form-control btn btn-primary ' .$class .'" style="width:40%; margin-left:10%;" id="btnYa"> <i class=""></i> Ya </a>
                  <button class="form-control btn btn-danger" style="width:40%;" data-dismiss="modal"> <i class=""></i> Tidak </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> -->

      <div class="modal fade" id="konfirmasiHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body text-center">
              <button type="button" class="btn btn-secondary" style="width:100px;" data-dismiss="modal">Tidak</button>
              <a type="button" class="btn btn-danger" id="btnYa" style="width:100px;">Ya</a>
            </div>
          </div>
        </div>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2020 <div class="bullet"></div> Developed By <a href="#">UB Learning Technology Laboratory</a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>

<?php $this->load->view('admin/js'); ?>
