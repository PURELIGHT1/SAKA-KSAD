<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="<?php echo base_url('assets/logo.png')?>" rel="icon">
  <title>Pendaftaran Anggota KSAD</title>
  <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/css/ruang-admin.min.css') ?>" rel="stylesheet">

</head>

<body style="background: url('../assets/img/background.png');
             background-repeat: no-repeat;
             background-attachment: fixed;
             background-position: center center;
             -webkit-background-size: cover;
             -moz-background-size: cover;
             -o-background-size: cover;
             background-size: cover;">
  <!-- Register Content -->
  <div class="col-sm-12">
    <div class="row justify-content-center">
      <div class="col-xl-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-md-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Pendaftaran Anggota KSAD <br><?= $tahun_akademik[0]['tahun_akademik'] ?></h1>
                  </div><br>
                  <form class="anggota" method="post" action="<?= base_url('anggota/save_daftar'); ?>">
                    <div class="row">
                      <div class="col-md-6"><br>
                        <label style="font-weight: bold;">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama lengkap" required="">
                      </div>
                      <div class="col-md-6"><br>
                        <label style="font-weight: bold;">Nomor Pokok Mahasiswa (NPM)</label>
                        <input type="text" class="form-control" name="npm" id="npm" placeholder="Masukkan Nomor Pokok Mahasiswa" required="">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6"><br>
                        <label style="font-weight: bold;">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                          <option value="Laki-laki">Laki-laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                      </div>
                      <div class="col-md-6"><br>
                        <label style="font-weight: bold;">Program Studi</label>
                        <select class="form-control" name="prodi" id="prodi">
                          <?php foreach ($data_prodi->result() as $data) : ?>
                            <option value="<?= $data->id_prodi ?>"><?= $data->nama_prodi ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6"><br>
                        <label style="font-weight: bold;">Nomor Handphone</label>
                        <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="Masukkan nomor handphone" required="">
                      </div>
                      <div class="col-md-6"><br>
                        <label style="font-weight: bold;">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan email" required="">
                      </div>
                    </div><br>
                    <div class="form-group">
                      <label style="font-weight: bold;">Keterangan</label>
                      <select class="form-control" name="keterangan" id="keterangan">
                        <option value="Belum memiliki basic sama sekali">Belum memiliki basic programming sama sekali</option>
                        <option value="Sudah memiliki basic programming namun tidak optimal">Sudah memiliki basic database atau PHP namun tidak optimal</option>
                        <option value="Sudah memiliki basic programming">Sudah memiliki basic database dan PHP</option>
                      </select>
                    </div>
                    <input type="hidden" name="ta" id="ta" value="<?= $tahun_akademik[0]['id_tahun_akademik'] ?>"><br>
                    <div class="form-group">
                      <button type="submit" class="btn btn-secondary btn-block">Daftar</button>
                    </div>
                  </form>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Register Content -->
  <?php $this->load->view("partials/js.php"); ?>
</body>

</html>