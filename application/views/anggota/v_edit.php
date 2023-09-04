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
             <form class="in-line" action="<?php echo base_url('anggota/save_ubah/'.$anggota->id_anggota)?>" method="post">
              <div class="card shadow mb-4 card-success">
                <div class="card-body">
                 <div class="section-title mt-0">Data diri</div>
                 <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama anggota</label>
                  <div class="col-sm-12 col-md-7">
                   <input type="text" id="nama" name="nama" class="form-control" value="<?= $anggota->nama ?>">
                 </div>
               </div>
               <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NPM</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" id="npm" name="npm" class="form-control" value="<?= $anggota->npm ?>">
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis kelamin</label>
                <div class="col-sm-12 col-md-7">
                 <select class="custom-select" name="jenis_kelamin" id="jenis_kelamin">
                  <option value="Laki-laki" <?php if($anggota->jenis_kelamin == "Laki-laki") echo "selected";?>>Laki-laki</option>
                  <option value="Perempuan" <?php if($anggota->jenis_kelamin == "Perempuan") echo "selected";?>>Perempuan</option>
                </select>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Program studi</label>
              <div class="col-sm-12 col-md-7">
               <select class="custom-select" name="prodi" id="prodi">
                <?php foreach($prodi->result() as $data): ?>
                  <option value="<?= $data->id_prodi ?>"<?php if($data->id_prodi == $anggota->prodi )echo 'selected';?>><?= $data->nama_prodi ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tahun akademik</label>
          <div class="col-sm-12 col-md-7">
            <select class="custom-select" name="tahun_akademik" id="tahun_akademik">
              <?php foreach($tahun_akademik->result() as $data): ?>
                <option value="<?= $data->id_tahun_akademik ?>"<?php if($data->id_tahun_akademik == $anggota->tahun_akademik)echo 'selected';?>><?= $data->tahun_akademik ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
      <div class="section-title mt-0">Contact</div>
      <div class="form-group row mb-4">
        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No.hp</label>
        <div class="col-sm-12 col-md-7">
         <input type="text" id="no_hp" name="no_hp" class="form-control" value="<?= $anggota->no_hp ?>">
       </div>
     </div>

     <div class="form-group row mb-4">
      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
      <div class="col-sm-12 col-md-7">
        <input type="text" id="email" name="email" class="form-control" value="<?= $anggota->email ?>">
      </div>
    </div>
    <div class="section-title mt-0">Lain-lain</div>
    <div class="form-group row mb-4">
      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan</label>
      <div class="col-sm-12 col-md-7">
        <select class="custom-select" name="keterangan" id="keterangan">
          <option value="Belum memiliki basic sama sekali" <?php if($anggota->keterangan == "Belum memiliki basic sama sekali") echo "selected";?>>Belum memiliki basic programming sama sekali</option>
          <option value="Sudah memiliki basic programming namun tidak optimal" <?php if($anggota->keterangan == "Sudah memiliki basic programming namun tidak optimal") echo "selected";?>>Sudah memiliki basic database atau PHP namun tidak optimal</option>
          <option value="Sudah memiliki basic programming" <?php if($anggota->keterangan == "Sudah memiliki basic programming") echo "selected";?>>Sudah memiliki basic database dan PHP</option>
        </select>
      </div>
    </div>

    <div class="form-group row mb-4">
      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
      <div class="col-sm-12 col-md-7">
       <select class="custom-select" name="status" id="status">
        <?php foreach($status as $data): ?>
          <option value="<?= $data->id_status ?>"<?php if($data->id_status == $anggota->status)echo 'selected';?>><?= $data->status_anggota ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>
</div>
<div class="text-right">
  <?php echo anchor('anggota','<div class="btn btn-danger waves-effect"><i class="fas fa-undo"></i> Kembali</div>'); ?>
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
