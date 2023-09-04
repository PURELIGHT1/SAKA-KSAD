<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view("partials/header.php"); ?> 
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <?php $this->load->view("partials/topbar.php"); ?> 
      <?php $this->load->view("partials/sidebar.php"); ?> 

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Profil</h1>
          </div>
          <div class="section-body">
           <div class="body">
             <form class="in-line" action="<?= site_url('user/changepassword/')?>" method="post">
              <div class="card card-body shadow mb-4">
               <div class="section-title mt-0">Data user</div>
                <div class="card-body ">
                  <div class="row clearfix">
                    <div class="col-md-3 ">
                      <div align="center">
                        <img class="img-profile rounded-circle" src="<?php echo base_url('assets/img/boy.png')?>" style="width: 100px;"><br><br>
                      </div>
                      <div align="center" class="h5 font-weight-bold"><?= $user->nama_user;?></div>
                      <div align="center"><?= $role->nama_role ?></div>
                    </div>
                    <div class="col-md-7">
                      <div><h5>Settings</h5></div>
                      <hr class="sidebar-divider">
                      <a href="<?= base_url('user/changepassword/'.$user->id_user)?>" class="btn btn-outline-primary btn-sm">Ubah Password</a>
                    </div>
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
<?php $this->load->view("partials/modal.php"); ?> 
</body>
</html>
