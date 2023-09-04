  <?php $template = base_url() . "assets/";?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; SAKA</title>

    <!-- General CSS Files -->
    <link href="<?php echo base_url('assets/ksad.png')?>" rel="icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="../node_modules/bootstrap-social/bootstrap-social.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= $template ?>css/style.css">
    <link rel="stylesheet" href="<?= $template ?>css/components.css">

    <style type="text/css">
      #message {
        z-index: 1000;
        position: fixed;
        top: 0;
        left: 0;
        width: 33.5%;
      }
      #inner-message {
        margin: 0 auto;
      }
    </style>
  </head>

  <body>
    <div id="app">
      <section class="section">
        <div class="d-flex flex-wrap align-items-stretch">
          <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
            <br><br><br><br><br>
            <div class="p-4 m-3">
            
              <h4 class="text-dark font-weight-normal">Welcome to <span class="font-weight-bold">SAKA</span></h4>
              <p class="text-muted">Before you get started, you must login if you already have an account.</p>

              <div id="message">
                
                  <div id="inner-message" class="alert alert-error">
                    <?= $this->session->flashdata('message'); ?>
                  </div>
                
              </div>
              <form method="POST" action="<?= base_url('auth'); ?>" class="needs-validation" novalidate="">
                <div class="form-group">

                  <label for="email">Username</label>
                  <input type="text" class="form-control" name="username" id="username"
                  placeholder="Username">
                  <div class="invalid-feedback">
                    Please fill in your username
                  </div>
                </div>

                <div class="form-group">
                  <div class="d-block">
                    <label for="password" class="control-label">Password</label>
                  </div>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                  <div class="invalid-feedback">
                    please fill in your password
                  </div>
                </div>
                <div class="form-group text-right">
                  <button type="submit" class="btn btn-lg btn-outline-primary btn-icon icon-right" tabindex="4">
                    Login
                  </button>
                </div>

                <div class="mt-5 text-center">
                    <a class="col-md-12 text-center text-danger mt-5" href="https://ksaduajy.com/">Back to website</a>
                  <p class="text-muted"> Kelompok Studi Application & Database <br> <?= date('Y')  ?></a></p>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="<?= $template ?>img/cok.jpg">
            <div class="absolute-bottom-left index-2">
              <div class="text-light p-5 pb-2">
                <div class="mb-5 pb-3">
                  <h1 class="mb-2 display-4 font-weight-bold">Hello Admin</h1>
                  <h5 class="font-weight-normal text-muted-transparent">Sistem informasi | Universitas Atma Jaya Yogyakarta</h5>
                </div>
                Photo by <a class="text-light bb" target="_blank" href="https://unsplash.com/@maybejensen?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Lasse Jensen</a> on <a class="text-light bb" target="_blank" href="https://unsplash.com">Unsplash</a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <?php $this->load->view("partials/js.php"); ?> 
  </body>
  </html>
