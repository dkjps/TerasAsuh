<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (empty($page)) {
  $page = 'master';
}
if (empty($menu)) {
  $menu = 'master';
}
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
            <li class="<?php echo $menu == 'dashboard' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/dashboard"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            
<!-- Menu Admin Dashboard -->
            <li class="menu-header">Admin Dashboard</li>
            <li class="dropdown <?php echo $menu == 'master' ? 'active' : ''; ?>">
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

<!-- Menu Operator -->
            <li class="menu-header">Admin Operator</li>
            <li class="<?php echo $page == 'pelatihan' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>pelatihan"><i class="fas fa-history"></i> <span>Data Pelatihan</span></a></li>     
            <li class="dropdown <?php echo $menu == 'master' ? '' : ''; ?>">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-graduation-cap"></i> <span>Kelas dan Topik</span></a>
              <ul class="dropdown-menu">
                <li class="<?php echo $page == 'panitia' ? '' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>kelas">Daftar Kelas</a></li>
                <li class="<?php echo $page == 'peserta' ? '' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>materi">Daftar Materi</a></li>
                <li class="<?php echo $page == 'pelatihan' ? '' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>subMateri">Daftar Sub Materi</a></li>
              </ul>
            </li>
            <li class="dropdown <?php echo $menu == 'master' ? '' : ''; ?>">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-graduation-cap"></i> <span>Pemateri</span></a>
              <ul class="dropdown-menu">
                <li class="<?php echo $page == 'panitia' ? '' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>pemateri">Daftar Pemateri</a></li>
                <li class="<?php echo $page == 'peserta' ? '' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>pemateri/tambahJadwal">Atur Jadwal Pemateri</a></li>
              </ul>
            </li>
            
  <!-- Menu Pemateri -->
            <li class="menu-header">Admin Pemateri</li>
            <li class="<?php echo $this->uri->segment(2) == 'skrining' ? '' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/skrining"><i class="fas fa-check-circle"></i> <span>Data Kelas</span></a></li>
            <li class="<?php echo $this->uri->segment(2) == 'aktivitas' ? '' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/aktivitas"><i class="fas fa-history"></i> <span>Jadwal Pelatihan</span></a></li>


            <!-- Menu aktivitas -->
            <li class="menu-header">Aktivitas</li>
            <li class="dropdown <?php echo $menu == 'master' ? '' : ''; ?>">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-graduation-cap"></i> <span>Data Aktivitas</span></a>
              <ul class="dropdown-menu">
                <li class="<?php echo $page == 'panitia' ? '' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>aktivitas">Aktivitas Hari Ini</a></li>
                <li class="<?php echo $page == 'peserta' ? '' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>aktivitas/aktivitasDaftar">Daftar Aktivitas</a></li>
              </ul>
            </li>

      <!-- Menu akun -->
      <li class="menu-header">Akun</li>
            <li class="dropdown <?php echo $menu == 'master' ? '' : ''; ?>">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-graduation-cap"></i> <span>Data Akun</span></a>
              <ul class="dropdown-menu">
                <li class="<?php echo $page == 'panitia' ? '' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>akun">Pengaturan Akun</a></li>
                <li class="<?php echo $page == 'peserta' ? '' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/master/master-peserta">Keluar</a></li>
              </ul>
            </li>

          </ul>
        </aside>
      </div>