<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?php echo base_url(); ?>admin/dashboard">MHS &mdash; Courses</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?php echo base_url(); ?>admin/dashboard">MHS</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="<?php echo $this->uri->segment(2) == 'dashboard' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/dashboard"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            <li class="menu-header">Main Menu</li>
            <li class="dropdown <?php echo $this->uri->segment(2) == 'master' ? 'active' : ''; ?>">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-globe-asia"></i> <span>Data Master</span></a>
              <ul class="dropdown-menu">
                <li class="<?php echo $page == 'panitia' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/master/master-panitia">Data Panitia</a></li>
                <li class="<?php echo $page == 'peserta' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/master/master-peserta">Data Peserta</a></li>
                <li class="<?php echo $page == 'pelatihan' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>pelatihan">Data Pelatihan</a></li>
                <li class="<?php echo $page == 'kelas' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>kelas">Data Kelas</a></li>
                <li class="<?php echo $page == 'kader' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/master/master-kader">Data Kader</a></li>
                <li class="<?php echo $page == 'keluarga-binaan' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/master/master-keluarga-binaan">Data Keluarga Binaan</a></li>
              </ul>
            </li>
            <li class="dropdown <?php echo $this->uri->segment(2) == 'pelatihan' ? 'active' : ''; ?>">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-graduation-cap"></i> <span>Data Pelatihan</span></a>
              <ul class="dropdown-menu">
                <li class="<?php echo $this->uri->segment(3) == 'pelatihan-panitia' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/pelatihan/pelatihan-panitia">Data Panitia</a></li>
                <li class="<?php echo $this->uri->segment(3) == 'pelatihan-pretest' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/pelatihan/pelatihan-pretest">Data Pretest</a></li>
                <li class="<?php echo $this->uri->segment(3) == 'pelatihan-postest' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/pelatihan/pelatihan-postest">Data Postest</a></li>
              </ul>
            </li>
            <li class="<?php echo $this->uri->segment(2) == 'skrining' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/skrining"><i class="fas fa-check-circle"></i> <span>Data Skrining</span></a></li>
            <li class="<?php echo $this->uri->segment(2) == 'aktivitas' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/aktivitas"><i class="fas fa-history"></i> <span>Data Aktivitas</span></a></li>
          </ul>
        </aside>
      </div>
