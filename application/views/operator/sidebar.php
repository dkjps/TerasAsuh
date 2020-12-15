<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?php echo base_url(); ?>dist/index">MHS &mdash; Courses</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?php echo base_url(); ?>dist/index">MHS</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="<?php echo $this->uri->segment(2) == 'dashboard' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>operator/dashboard"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            <li class="menu-header">Main Menu</li>
            <li class="<?php echo $this->uri->segment(2) == 'Materi' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>operator/materi"><i class="fas fa-pen-square"></i> <span>Materi</span></a></li>
            <li class="<?php echo $this->uri->segment(2) == 'Jadwal' ? 'active' : ''; ?>"><a class="nav-link" href="#"><i class="far fa-clock"></i><span>Jadwal</span></a></li>
          </ul>
        </aside>
      </div>
