<!DOCTYPE html>x
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
            <h1>Tambah Keuangan</h1>
          </div>
          <div class="section-body">
            <div class="body">
             <form class="in-line" action="<?php echo base_url('keuangan/save_tambah')?>" method="post" enctype="multipart/form-data">
              <!-- <form id="fromSubmit" > -->
              <div class="card shadow mb-4 card-primary">
                <div class="card-body ">

                  <div class="section-title mt-0">Bukti</div>
                  <div class="form-group row mb-4">
                    <div class="col-sm-12 col-md-7">
                      <input type="file" class="form-control" name="bukti" accept="image/*">
                    </div>
                  </div>

                  <div class="section-title mt-0">Jumlah</div>
                  <div class="form-group row mb-4">
                    <div class="col-sm-12 col-md-7">
                      <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Masukkan Jumlah Uang" value="1000000" min="0">
                    </div>
                  </div>

                  <div class="section-title mt-0">Jenis Keuangan</div>
                  <div class="form-group row mb-4">
                    <div class="col-sm-12 col-md-7">
                     <select class="custom-select" name="jenis_keuangan" id="jenis_keuangan">
                      <?php foreach($list_jenis as $value): ?>
                        <option value="<?= $value->id_jenis_keuangan ?>"><?= $value->nama_jenis_keuangan ?>
                      </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>

                <div class="section-title mt-0">Tahun Akademik</div>
                  <div class="form-group row mb-4">
                    <div class="col-sm-12 col-md-7">
                     <select class="custom-select" name="ta" id="ta">
                      <?php foreach($tahun_akademik->result() as $value): ?>
                        <option value="<?= $value->id_tahun_akademik ?>"><?= $value->tahun_akademik ?>
                      </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>

              <div class="section-title mt-0">Keterangan</div>
              <div class="form-group row mb-4">
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control" placeholder="Masukkan Keterangan Selengkap-lengkapnya" name ="ket_keuangan" id="ket_keuangan">
                </div>
              </div>

              <div class="text-right">
                <?php echo anchor('keuangan','<div class="btn btn-danger waves-effect"><i class="fas fa-undo"></i> Batal</div>'); ?>
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
