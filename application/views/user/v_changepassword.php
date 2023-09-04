<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view("partials/header.php"); ?> 
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
  <form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
      <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
    </ul>
    <div class="search-element">
      <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
      <button class="btn" type="submit"><i class="fas fa-search"></i></button>
      <div class="search-backdrop"></div>
      <div class="search-result">
        <div class="search-header">
          Histories
        </div>
        <div class="search-item">
          <a href="#">How to hack NASA using CSS</a>
          <a href="#" class="search-close"><i class="fas fa-times"></i></a>
        </div>
        <div class="search-item">
          <a href="#">Pengurus baru</a>
          <a href="#" class="search-close"><i class="fas fa-times"></i></a>
        </div>
        <div class="search-item">
          <a href="#">#KSAD</a>
          <a href="#" class="search-close"><i class="fas fa-times"></i></a>
        </div>
        <div class="search-header">
          Projects
        </div>
        <div class="search-item">
          <a href="#">
            <div class="search-icon bg-primary text-white mr-3">
              <i class="fas fa-laptop"></i>
            </div>
            project apa ya hari ini ?
          </a>
        </div>
      </div>
    </div>
  </form>
  <ul class="navbar-nav navbar-right">
    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
      <div class="dropdown-menu dropdown-list dropdown-menu-right">
        <div class="dropdown-header">Messages
          <div class="float-right">
            <a href="#">Mark All As Read</a>
          </div>
        </div>
        <div class="dropdown-list-content dropdown-list-message">
          <a href="#" class="dropdown-item dropdown-item-unread">
            <div class="dropdown-item-avatar">
              <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle">
              <div class="is-online"></div>
            </div>
            <div class="dropdown-item-desc">
              <b>Kusnaedi</b>
              <p>Hello, Bro!</p>
              <div class="time">10 Hours Ago</div>
            </div>
          </a>
          <a href="#" class="dropdown-item dropdown-item-unread">
            <div class="dropdown-item-avatar">
              <img alt="image" src="../assets/img/avatar/avatar-2.png" class="rounded-circle">
            </div>
            <div class="dropdown-item-desc">
              <b>Dedik Sugiharto</b>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
              <div class="time">12 Hours Ago</div>
            </div>
          </a>
          <a href="#" class="dropdown-item dropdown-item-unread">
            <div class="dropdown-item-avatar">
              <img alt="image" src="../assets/img/avatar/avatar-3.png" class="rounded-circle">
              <div class="is-online"></div>
            </div>
            <div class="dropdown-item-desc">
              <b>Agung Ardiansyah</b>
              <p>Sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              <div class="time">12 Hours Ago</div>
            </div>
          </a>
          <a href="#" class="dropdown-item">
            <div class="dropdown-item-avatar">
              <img alt="image" src="../assets/img/avatar/avatar-4.png" class="rounded-circle">
            </div>
            <div class="dropdown-item-desc">
              <b>Ardian Rahardiansyah</b>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit ess</p>
              <div class="time">16 Hours Ago</div>
            </div>
          </a>
          <a href="#" class="dropdown-item">
            <div class="dropdown-item-avatar">
              <img alt="image" src="../assets/img/avatar/avatar-5.png" class="rounded-circle">
            </div>
            <div class="dropdown-item-desc">
              <b>Alfa Zulkarnain</b>
              <p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
              <div class="time">Yesterday</div>
            </div>
          </a>
        </div>
        <div class="dropdown-footer text-center">
          <a href="#">View All <i class="fas fa-chevron-right"></i></a>
        </div>
      </div>
    </li>
    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
      <div class="dropdown-menu dropdown-list dropdown-menu-right">
        <div class="dropdown-header">Notifications
          <div class="float-right">
            <a href="#">Mark All As Read</a>
          </div>
        </div>
        <div class="dropdown-list-content dropdown-list-icons">
          <a href="#" class="dropdown-item dropdown-item-unread">
            <div class="dropdown-item-icon bg-primary text-white">
              <i class="fas fa-code"></i>
            </div>
            <div class="dropdown-item-desc">
              Template update is available now!
              <div class="time text-primary">2 Min Ago</div>
            </div>
          </a>
          <a href="#" class="dropdown-item">
            <div class="dropdown-item-icon bg-info text-white">
              <i class="far fa-user"></i>
            </div>
            <div class="dropdown-item-desc">
              <b>You</b> and <b>Dedik Sugiharto</b> are now friends
              <div class="time">10 Hours Ago</div>
            </div>
          </a>
          <a href="#" class="dropdown-item">
            <div class="dropdown-item-icon bg-success text-white">
              <i class="fas fa-check"></i>
            </div>
            <div class="dropdown-item-desc">
              <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
              <div class="time">12 Hours Ago</div>
            </div>
          </a>
          <a href="#" class="dropdown-item">
            <div class="dropdown-item-icon bg-danger text-white">
              <i class="fas fa-exclamation-triangle"></i>
            </div>
            <div class="dropdown-item-desc">
              Low disk space. Let's clean it!
              <div class="time">17 Hours Ago</div>
            </div>
          </a>
          <a href="#" class="dropdown-item">
            <div class="dropdown-item-icon bg-info text-white">
              <i class="fas fa-bell"></i>
            </div>
            <div class="dropdown-item-desc">
              Welcome to Stisla template!
              <div class="time">Yesterday</div>
            </div>
          </a>
        </div>
        <div class="dropdown-footer text-center">
          <a href="#">View All <i class="fas fa-chevron-right"></i></a>
        </div>
      </div>
    </li>
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
     <img class="img-profile rounded-circle" src="<?php echo base_url('assets/img/boy.png')?>" style="max-width: 60px">
     <div class="d-sm-none d-lg-inline-block"><?= $user['nama_user']; ?></div></a>
     <div class="dropdown-menu dropdown-menu-right">
      <div class="dropdown-title">-Menu-</div>
      <a href="<?php echo site_url('user/profil')?>" class="dropdown-item has-icon">
        <i class="far fa-user"></i> Profile
      </a>
      <div class="dropdown-divider"></div>
      <a data-toggle="modal" data-target="#logoutModal" class="dropdown-item has-icon text-danger">
        <i class="fas fa-sign-out-alt"></i> Logout
      </a>
    </div>
  </li>
</ul>
</nav>
      <?php $this->load->view("partials/sidebar.php"); ?> 

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Ubah password</h1>
          </div>
          <div class="section-body">
           <?php echo $this->session->flashdata('message');?>
           <div class="body">
             <form class="in-line" action="<?= site_url('user/changepassword')?>" method="post">
              <div class="card shadow mb-4 card-warning">
                <div class="card-body ">
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password saat ini</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="password" name="current_password" id="current_password" class="form-control" value="<?= set_value('oldpass') ?>"required = "" /> <?= form_error('current_password','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password baru</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="password" name="new_password1" id="new_password1"  class="form-control"  value="<?= set_value('newpass') ?>"/><?= form_error('new_password1','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Konfirmasi password baru</label>
                    <div class="col-sm-12 col-md-7">
                     <input type="password" name="new_password2" id="new_password2"  class="form-control" value="<?= set_value('passconf') ?>" /> <?= form_error('new_password2','<small class="text-danger pl-3">','</small>'); ?>
                   </div>
                 </div>
                 <div class="text-right">
                  <?php echo anchor('dashboard','<div class="btn btn-danger waves-effect">Kembali</div>'); ?>
                  <button class="btn btn-warning waves-effect" type="submit" >Change Password</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
  <?php $this->load->view("partials/footer.php"); ?> 
</div>
</div>

<?php $this->load->view("partials/js.php"); ?> 
<script> window.setTimeout(function() { $(".alert").fadeTo(500, 0).slideUp(500, function(){ $(this).remove(); }); }, 2000); </script> 

</body>
</html>
