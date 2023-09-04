<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="<?php echo base_url('assets/logo.png') ?>" rel="icon">
    <title>Pendaftaran Anggota KSAD</title>
    <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/css/ruang-admin.min.css') ?>" rel="stylesheet">

</head>

<body style="background: #b0e0e6;>
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
                                        <h1 class="h4 text-gray-900 mb-4">Absensi Anggota KSAD <br><?= $tahun_akademik[0]['tahun_akademik'] ?></h1>
                                    </div><br>
                                    <form class="anggota" method="post" action="<?= base_url('kehadiran/submit/'); ?>">
                                        <div class="row">
                                            <div class="col-md-6"><br>
                                                <label style="font-weight: bold;">Nomor Pokok Mahasiswa (NPM)</label>
                                                <input type="text" class="form-control" name="npm" id="npm" placeholder="Masukkan Nomor Pokok Mahasiswa" required="">
                                            </div>
                                            <div class="col-md-6"><br>
                                                <label style="font-weight: bold;">Kelas</label>
                                                <select class="form-control" name="kelas" id="kelas">
                                                    <option value="Beginner">Beginner</option>
                                                    <option value="Intermediate">Intermediate</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6"><br>
                                                <label style="font-weight: bold;">Pertemuan</label>
                                                <select class="custom-select" name="pertemuan" id="pertemuan">
                                                    <?php foreach ($data_pertemuan->result() as $data) : ?>
                                                        <option value="<?= $data->id_pertemuan ?>"><?= $data->nama_pertemuan ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6"><br>
                                                <label style="font-weight: bold;">Keterangan / Judul Pertemuan</label>
                                                <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Masukkan Judul Pertemuan" required="">
                                            </div>
                                        </div>
                                        <input type="hidden" name="ta" id="ta" value="<?= $tahun_akademik[0]['id_tahun_akademik'] ?>"><br>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-secondary btn-block">Absen</button>
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