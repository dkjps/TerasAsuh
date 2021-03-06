<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// if (empty($page)) {
//   $role = 'master';
// }

$role = $_SESSION['role'];

if ($role==2) {
  $menu = 'admin';
} elseif ($role==3) {
  $menu = 'operator';
} else {
  $menu = 'pemateri';
}
?>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?php echo base_url(); ?>admin/dashboard">TerasAsuh</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?php echo base_url(); ?>admin/dashboard">Home</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="<?php echo $menu == 'admin' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/dashboard"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>

<!-- Menu Admin Dashboard -->
            <?php if ($role==2): ?>
            <li class="menu-header">Admin Dashboard</li>
            <!-- <li class="dropdown <?php echo $menu == 'admin' ? 'active' : ''; ?>"> -->
              <!-- <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-globe-asia"></i> <span>Data Master</span></a> -->
              <!-- <ul class="dropdown-menu"> -->
                <li class="<?php echo $page == 'panitia' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>master/Panitia"><i class="fas fa-bookmark"></i> <span>Data Panitia</span></a></li>
                <li class="<?php echo $page == 'peserta' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>master/peserta"><i class="fas fa-bookmark"></i> <span>Data Peserta</span></a></li>
                <!-- <li class="<?php echo $page == 'pelatihan' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>pelatihan"><i class="fas fa-bookmark"></i> <span>Data Pelatihan</span></a></li>
                <li class="<?php echo $page == 'kelas' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>kelas"><i class="fas fa-bookmark"></i> <span>Data Kelas</a></span></li> -->
                <li class="<?php echo $page == 'kader' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>master/Kader"><i class="fas fa-bookmark"></i> <span>Data Kader</span></a></li>
                <li class="<?php echo $page == 'keluarga' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>master/KeluargaBinaan"><i class="fas fa-bookmark"></i> <span>Data Keluarga Binaan</span></a></li>
                <li class="<?php echo $page == 'faq' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>master/Faq"><i class="fas fa-bookmark"></i> <span>Data FAQ</span></a></li>
                <li class="<?php echo $page == 'institusi' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>master/Institusi"><i class="fas fa-bookmark"></i> <span>Data Institusi</span></a></li>
                <li class="<?php echo $page == 'aktivitas' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>master/Aktivitas"><i class="fas fa-bookmark"></i> <span>Data Soal Aktivitas</span></a></li>
              <!-- </ul> -->
            <!-- </li> -->
            <?php endif; ?>
            <?php if ($role==3): ?>
<!-- Menu Operator -->
            <li class="menu-header">Admin Operator</li>
            <li class="dropdown <?php echo $menu == 'master' ? 'active' : ''; ?>">
              <li class="<?php echo $page == 'pelatihan' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>pelatihan"><i class="fas fa-puzzle-piece"></i> <span>Data Pelatihan</span></a></li>
            <!-- <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-graduation-cap"></i> <span>Kelas dan Materi</span></a>
              <ul class="dropdown-menu"> -->
                <!-- <li class="<?php echo $page == 'kelas' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>kelas"><i class="fas fa-home"></i><span>Daftar Kelas</span></a></li> -->
                <!-- <li class="<?php echo $page == 'materi' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>materi"><i class="fas fa-book"></i> <span>Daftar Materi</span></a></li> -->
                <!-- <li class="<?php echo $page == 'sub-materi' ? '' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>subMateri">Daftar Sub Materi</a></li> -->
              <!-- </ul>
            </li> -->
            <!-- <li class="dropdown <?php echo $menu == 'master' ? 'active' : ''; ?>">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-graduation-cap"></i> <span>Pemateri</span></a>
              <ul class="dropdown-menu"> -->
                <li class="<?php echo $page == 'pemateri' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>pemateri"><i class="fas fa-user"></i> <span>Daftar Pemateri</span></a></li>
                <!-- <li class="<?php echo $page == 'peserta' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>pemateri/tambahJadwal">Atur Jadwal Pemateri</a></li> -->
              <!-- </ul> -->
            </li>
            <?php endif; ?>

            <?php if ($role==4): ?>
            <!-- Menu Pemateri -->
            <li class="menu-header">Admin Pemateri</li>
            <!-- <li class="<?php echo $this->uri->segment(2) == 'skrining' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>PemateriKelas"><i class="fas fa-check-circle"></i> <span>Data Kelas</span></a></li> -->
            <li class="<?php echo $page == 'jadwal' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>PemateriJadwal"><i class="fas fa-calendar"></i> <span>Jadwal Pemateri</span></a></li>
          <?php endif; ?>

<hr>
            <!-- Menu aktivitas -->
            <!-- <li class="menu-header">Aktivitas</li>
            <li class="dropdown <?php echo $menu == 'aktivitas' ? 'active' : ''; ?>">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-graduation-cap"></i> <span>Data Aktivitas</span></a>
              <ul class="dropdown-menu"> -->
                <li class="<?php echo $page == 'today' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>aktivitas"><i class="fas fa-bicycle"></i> <span>Aktivitas Hari Ini</span></a></li>
                <li class="<?php echo $page == 'allday' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>aktivitas/aktivitasDaftar/<?=date('Y-m-d')?>"><i class="fas fa-history"></i> <span>Daftar Aktivitas</span></a></li>
              <!-- </ul>
            </li> -->
<hr>
      <!-- Menu akun -->
      <!-- <li class="menu-header">Akun</li>
            <li class="dropdown <?php echo $menu == 'master' ? '' : ''; ?>">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-graduation-cap"></i> <span>Data Akun</span></a>
              <ul class="dropdown-menu"> -->
                <li class="<?php echo $page == 'panitia' ? '' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>akun"><i class="fas fa-cog"></i> <span>Pengaturan Akun</span></a></li>
                <li class="<?php echo $page == 'peserta' ? '' : ''; ?>"><a class="nav-link" href="<?php echo base_url("Auth/logout"); ?>"><i class="fas fa-door-open"></i> <span>Keluar</span></a></li>
              <!-- </ul>
            </li> -->

          </ul>
        </aside>
      </div>
