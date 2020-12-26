<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="Description" content="Deskripsi Singkat Situs" />
  <!-- Mendeklarasikan warna yang muncul pada address bar Chrome versi seluler -->
  <meta name="theme-color" content="#414f57" />
  <!-- Mendeklarasikan ikon untuk iOS -->
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="default" />
  <meta name="apple-mobile-web-app-title" content="Nama Situs" />
  <link rel="apple-touch-icon" href="<?=base_url('path/to/icons/128x128.png')?>" />
  <!-- Mendeklarasikan ikon untuk Windows -->
  <meta name="msapplication-TileImage" content="<?=base_url("path/to/icons/128x128.png")?>" />
  <meta name="msapplication-TileColor" content="#000000" />

  <title><?php echo $title; ?> &mdash; MHS COURSE</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <?php
  if ($this->uri->segment(2) == "" || $this->uri->segment(2) == "dashboard") { ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">

  <?php } elseif ($this->uri->segment(2) == "master"){ ?>
    <link href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/jquery-selectric/selectric.css">
  <?php }?>

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/components.css">
  <!-- Start GA -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <link href="<?=base_url('assets/calendar/main.css')?>" rel='stylesheet' />
  <script src="<?=base_url('assets/calendar/main.js')?>"></script>

  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-94034622-3');
  </script>
<!-- /END GA -->

<style>
/* .DTFC_LeftBodyLiner{overflow-y:unset !important}
.DTFC_RightBodyLiner{overflow-y:unset !important} */
.dataTables_filter{
  float: right;
}
.dataTables_length{
  display: none;
}
@media (max-width: 1024px){
  .main-content {
    padding-left: 0px;
    padding-right: 0px;
    width: 100% !important;
  }
}
.section-header h1{
  margin-left: 20px;
}
.fc-direction-ltr{
  /* padding: 20px; */
  margin-left: 20px;
}
.fc .fc-toolbar-title{
  font-size: 20px;
  margin-left: 10px;
}
.card .card-header, .card .card-body, .card .card-footer {
  background-color: transparent;
  padding: 0;
}
</style>
<link rel="manifest" href="<?=base_url("manifest.json")?>">
</head>
<?php
// if ($this->uri->segment(1) == "admin") {
$this->load->view('admin/layout');
$this->load->view('admin/sidebar');
// }
?>
