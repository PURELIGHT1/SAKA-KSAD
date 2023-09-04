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
                    <h1 class="h4 text-gray-900 mb-4">Presensi <br><?= $tahun_akademik[0]['tahun_akademik'] ?></h1>
                  </div><br>
                  <form class="anggota" method="post" action="<?= base_url('anggota/save_daftar'); ?>">
                    <div class="row">
                      <div class="col-md-12"><br>
                        <label style="font-weight: bold;">NPM</label>
                        <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="Masukan NPM" required="">
                      </div>
                    </div>
                    <br>
                    <div class="form-group">
                      <button type="submit" class="btn btn-secondary btn-block">Hadir</button>
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