<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <!-- <div class="navbar-bg" style="position:fixed; z-index:999;"></div> -->
      <nav class="navbar navbar-expand-lg main-navbar" style="position:fixed; background:#6777ef;">
        <div class="mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?php echo base_url(); ?>assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, <?=$_SESSION['namalengkap']?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <!-- <div class="dropdown-title">Logged in 5 min ago</div> -->
              <div class="dropdown-title"><?=$_SESSION['namalengkap']?></div>
              <div class="dropdown-divider"></div>
              <a href="<?= base_url("Auth/logout"); ?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
