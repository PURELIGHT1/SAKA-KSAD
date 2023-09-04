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
            <div class="col-xl-4">
                <div class="card shadow-sm my-5" style="background: #0000;">
                    <div class="card-body p-4 ">
                        <div class="row">
                            <div class="col-md-12" style="background: #aefd6c;">
                                <div class="login-form">
                                    <center>
                                        <!-- <div class="card p-2" style="width: 26rem;"> -->
                                        <img src="<?= base_url('assets/img/selamat.jpg') ?>" class="card-img-top" alt="...">
                                        <!-- <div class="card-body"> -->
                                        <br><br>
                                        <h5 class="card-title">Thanks For Your Registration</h5>
                                        <p class="card-text">Terima Kasih sudah mendaftakan diri menjadi anggota KSAD <?= $tahun_akademik[0]['tahun_akademik'] ?>
                                        </p>
                                        <a href="https://chat.whatsapp.com/LOAwkeG8OxwBGxuDLVjUtu" class="btn btn-primary">JOIN WA GRUPS</a>
                                        <!-- </div>
                                        </div> -->
                                    </center>
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