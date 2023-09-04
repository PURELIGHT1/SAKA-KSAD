<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a>SAKA KSAD</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">SAKA</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li><a class="nav-link" href="<?php echo site_url('dashboard')?>"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
      <?php if($this->session->userdata('id_role') == 1): ?>
        <li class="menu-header">Menu</li>
          <li><a class="nav-link " href="<?php echo site_url('anggota')?>"><i class="fas fa-users"></i><span>Anggota</span></a></li>
          <!-- <li><a class="nav-link " href="<?php echo site_url('tentor') ?>"><i class="fas fa-user-tie"></i><span>Tentor</span></a></li> -->
          <li><a class="nav-link" href="<?php echo site_url('prodi')?>"><i class="fas fa-university"></i> <span>Program Studi</span></a></li>
          <li><a class="nav-link" href="<?php echo site_url('tahun_akademik')?>"><i class="far fa-calendar"></i> <span>Tahun Akademik </span></a></li>
          <li><a class="nav-link" href="<?php echo site_url('user')?>"><i class="far fa-user"></i> <span>User</span></a></li>
        
        <?php elseif($this->session->userdata('id_role') == 2): ?>
          <li><a class="nav-link" href="<?php echo site_url('anggota')?>"><i class="fas fa-users"></i> <span>Anggota</span></a></li>
        <?php endif; ?>
        
        <li class="menu-header">Laporan Keuangan</li>
          <li><a class="nav-link" href="<?php echo site_url('laporan')?>"><i class="fas fas fa-coins"></i> <span>Kas & Pangkal</span></a></li>
          <li><a class="nav-link" href="<?php echo site_url('keuangan')?>"><i class="fas fa-hand-holding-usd"></i><span>Pengeluaran Dan Pendapatan</span></a></li>
          
        <li class="menu-header">Laporan Absensi</li>
          <li><a class="nav-link" href="<?php echo site_url('kehadiran')?>"><i class="fas fa-clipboard-list"></i> <span>Daftar Kehadiran</span></a></li>
          <li><a class="nav-link" href="<?php echo site_url('pertemuan') ?>"><i class="fas fa-solid fa-handshake"></i> <span>Pertemuan</span></a></li>
      </ul>
    </aside>
  </div>