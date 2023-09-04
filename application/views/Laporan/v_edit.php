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
            <h1>Update anggota KSAD</h1>
          </div>
          <div class="section-body">
            <div class="body">
              <form class="in-line" action="<?php echo base_url('laporan/save_ubah/'.$anggota->id_anggota)?>" method="post">
                <div class="card shadow mb-4 card-success">
                  <div class="card-body">
                   <div class="section-title mt-0">Data diri</div>
                   <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama anggota</label>
                    <div class="col-sm-12 col-md-7"><?= $anggota->nama ?>
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NPM</label>
                  <div class="col-sm-12 col-md-7"><?= $anggota->npm ?></div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Uang Kas</label>
                  <div class="col-sm-12 col-md-7">
                   <select class="custom-select" name="kas" id="kas">
                    <?php foreach($kas->result() as $data): ?>
                      <option value="<?= $data->id_kas ?>"<?php if($data->id_kas == $anggota->kas )echo 'selected';?>><?= rupiah($data->uang_kas) ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Uang Pangkal</label>
              <div class="col-sm-12 col-md-7">
               <select class="custom-select" name="pangkal" id="pangkal">
                <?php foreach($pangkal->result() as $data): ?>
                  <option value="<?= $data->id_pangkal ?>"<?php if($data->id_pangkal == $anggota->pangkal )echo 'selected';?>><?= rupiah($data->uang_pangkal) ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan Kas dan Pangkal</label>
          <div class="col-sm-12 col-md-7">
           <select class="custom-select" name="ket_uang" id="ket_uang">
            <?php foreach($ket_uang->result() as $data): ?>
              <option value="<?= $data->id_ket_uang ?>"<?php if($data->id_ket_uang  == $anggota->ket_uang )echo 'selected';?>><?= $data->nama_ket_uang ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    <div class="text-right">
      <?php echo anchor('laporan','<div class="btn btn-danger waves-effect"><i class="fas fa-undo"></i> Kembali</div>'); ?>
      <button class="btn btn-success waves-effect" type="submit" ><i class="fas fa-edit"></i> Update</button>
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
