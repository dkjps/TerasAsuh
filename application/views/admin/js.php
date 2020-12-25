<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- JS untuk Admin Pusat SIM ODGJ -->
<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-1.12.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- <script src="<?php echo base_url(); ?>assets/modules/jquery.min.js"></script> -->
<script src="<?php echo base_url(); ?>assets/modules/popper.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/tooltip.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/stisla.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/monthpicker/MonthPicker.min.js"></script>

<!-- JS Libraies -->
<?php
//if ($this->uri->segment(2) == "" || $this->uri->segment(2) == "dashboard") { ?>
<script src="<?php echo base_url(); ?>assets/modules/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/chart.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

<?php //}elseif ($this->uri->segment(2) == "master") {?>
  <script src="<?php echo base_url(); ?>assets/modules/datatables/datatables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jquery-ui/jquery-ui.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/sweetalert/sweetalert.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
  <?php //}?>

  <!-- Page Specific JS File -->
  <?php
  //if ($this->uri->segment(2) == "dashboard") { ?>
  <script src="<?php echo base_url(); ?>assets/js/admin/dashboard.js"></script>
  <?php
  //}elseif ($this->uri->segment(2) == "pasien"){?>
  <!-- <script src="<?php echo base_url(); ?>assets/js/pasien.js"></script> -->
  <?php //} ?>

  <!-- Template JS File -->
  <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/admin-custom.js"></script>

  <!-- JS Custom Untuk page Tertentu -->
  <?php
  if ($this->uri->segment(3) == "master-pelatihan") { ?>
    <script src="<?php echo base_url(); ?>assets/js/admin/master-pelatihan-datatable.js"></script>
  <?php } elseif ($this->uri->segment(3) == "master-panitia"){?>
    <script src="<?php echo base_url(); ?>assets/js/admin/master-panitia-datatable.js"></script>
  <?php } elseif ($this->uri->segment(3) == "master-peserta"){?>
    <script src="<?php echo base_url(); ?>assets/js/admin/master-peserta-datatable.js"></script>
  <?php } elseif ($this->uri->segment(3) == "master-kader"){?>
    <script src="<?php echo base_url(); ?>assets/js/admin/master-kader-datatable.js"></script>
  <?php } elseif ($this->uri->segment(3) == "master-keluarga-binaan"){?>
    <script src="<?php echo base_url(); ?>assets/js/admin/master-keluargabinaan-datatable.js"></script>
  <?php }?>
  <script src="https://cdn.datatables.net/fixedcolumns/3.3.2/js/dataTables.fixedColumns.min.js" type="text/javascript"></script>
  <script type="text/javascript">
  $('#table-pelatihan').DataTable({
    "info": false,
    "autoWidth": false
  });
  $('#list-data').DataTable({
    "info": false,
    "autoWidth": false
  });
  $('#list-materi').DataTable({
    "info": false,
    "autoWidth": false
  });
  $('#list-submateri').DataTable({
    "info": false,
    "autoWidth": false
  });
  $('#daftar-materi').DataTable({
    "info": false,
    "autoWidth": false
  });
  $('#list-pemateri').DataTable({
    "info": false,
    "autoWidth": false
  });

  function konfirmasiHapus(link){
    $('#btnYa').attr('href', link);
    $('#konfirmasiHapus').modal('show');
  }

</script>


<script>
if ('serviceWorker' in navigator) {
  window.addEventListener('load', function() {
    navigator.serviceWorker.register('/service-worker.js').then(function(registration) {
      // Registration was successful
      console.log('ServiceWorker registration successful with scope: ', registration.scope);
    }, function(err) {
      // registration failed :(
      console.log('ServiceWorker registration failed: ', err);
    });
  });
}</script>

<!-- <script>
if ('serviceWorker' in navigator) {
window.addEventListener('load', () => {
navigator.serviceWorker.register('<?=base_url("sw.js")?>');
});

}

</script> -->
<!-- <script src="https://cdnjs.cloudflare.cm/ajax/libs/UpUp/1.0.0/upup.min.js"></script> -->
<!-- <script>
UpUp.start({
'cache-version' : 'v2',
'content-url': '<?=base_url($this->uri->segment(1))?>',
'content' : 'Cannot reach site. Please check your internet connection.',
'servlce-worker-url' : '/upup.sw.min.js'
})
</script> -->
</body>
</html>
