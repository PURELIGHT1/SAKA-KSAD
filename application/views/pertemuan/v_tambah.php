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
                        <h1>Tambah Pertemuan</h1>
                    </div>
                    <div class="section-body">
                        <div class="body">
                            <form class="in-line" action="<?php echo base_url('pertemuan/save'); ?>" method="post">
                                <div class="card shadow mb-4 card-primary">
                                    <div class="card-body ">
                                        <div class="section-title mt-0">Nama</div>
                                        <div class="form-group row mb-4">
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" class="form-control" placeholder="Masukkan Nama Pertemuan" name="nama" id="nama">
                                            </div>
                                        </div>

                                        <div class="section-title mt-0">Tanggal</div>
                                        <div class="form-group row mb-4">
                                            <div class="col-sm-12 col-md-7">
                                                <input type="date" class="form-control" name="tgl" id="tgl">
                                            </div>
                                        </div>

                                        <div class="section-title mt-0">Kelas</div>
                                        <div class="form-group row mb-4">
                                            <div class="col-sm-12 col-md-7">
                                                <select class="form-control" name="kelas" id="kelas">
                                                    <option value="Beginner">Beginner</option>
                                                    <option value="Intermediate">Intermediate</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="section-title mt-0">Materi</div>
                                        <div class="form-group row mb-4">
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" class="form-control" placeholder="Masukkan Materi Pertemuan" name="materi" id="materi">
                                            </div>
                                        </div>

                                        <div class="section-title mt-0">Open</div>
                                        <div class="form-group row mb-4">
                                            <div class="col-sm-12 col-md-7">
                                                <input type="time" class="form-control" name="open" id="open">
                                            </div>
                                        </div>

                                        <div class="section-title mt-0">Close</div>
                                        <div class="form-group row mb-4">
                                            <div class="col-sm-12 col-md-7">
                                                <input type="time" class="form-control" name="closed" id="closed">
                                            </div>
                                        </div>
                                        
                                        <div class="section-title mt-0">Status Pertemuan</div>
                                        <div class="form-group row mb-4">
                                            <div class="col-sm-12 col-md-7">
                                                <select class="custom-select" name="status" id="status">
                                                  <option value="1">Aktif</option>
                                                  <option value="0">Tidak Aktif</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="text-right">
                                            <?php echo anchor('pertemuan', '<div class="btn btn-danger waves-effect"><i class="fas fa-undo"></i> Batal</div>'); ?>
                                            <button class="btn btn-primary waves-effect" type="submit"><i class="fas fa-plus"></i> Tambah</button>
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