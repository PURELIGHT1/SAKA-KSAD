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
            <h1>Tambah Prodi</h1>
          </div>
          <div class="section-body">
            <div class="body">
             <form class="in-line" action="<?php echo base_url('prodi/save_prodi')?>" method="post">
              <div class="card shadow mb-4 card-primary">
                <div class="card-body ">
                  <div class="section-title mt-0">Jurusan</div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Program Studi</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="text" id="nama_prodi" name="nama_prodi" class="form-control">
                    </div>
                  </div>
                  <div class="text-right">
                    <?php echo anchor('prodi','<div class="btn btn-danger waves-effect"><i class="fas fa-undo"></i> Kembali</div>'); ?>
                    <button class="btn btn-primary waves-effect" type="submit" ><i class="fas fa-plus"></i> Tambah</button>
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
</body>
</html>
