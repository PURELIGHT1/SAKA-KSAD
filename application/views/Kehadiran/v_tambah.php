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
                        <h1>Tambah Absensi Anggota KSAD</h1>
                    </div>
                    <div class="section-body">
                        <div class="body">
                            <form class="in-line" action="<?php echo base_url('kehadiran/save_tambah') ?>" method="post">
                                <div class="card shadow mb-4 card-primary">
                                    <div class="card-body ">

                                        <div class="section-title mt-0">Nomor Pokok Mahasiswa (NPM)</div>
                                        <div class="form-group row mb-4">
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" class="form-control" placeholder="Masukkan Nomor Pokok Mahasiswa" name="npm" id="npm">
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

                                        <div class="section-title mt-0">Pertemuan</div>
                                        <div class="form-group row mb-4">
                                            <div class="col-sm-12 col-md-7">
                                                <select class="custom-select" name="pertemuan" id="pertemuan">
                                                    <?php foreach ($data_pertemuan->result() as $data) : ?>
                                                        <option value="<?= $data->id_pertemuan ?>"><?= $data->nama_pertemuan ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="section-title mt-0">Keterangan / Judul Pertemuan</div>
                                        <div class="form-group row mb-4">
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" class="form-control" placeholder="Masukkan Judul Pertemuan" name="keterangan" id="keterangan">
                                            </div>
                                        </div>

                                        <div class="section-title mt-0">Status</div>
                                        <div class="form-group row mb-4">
                                            <div class="col-sm-12 col-md-7">
                                                <select class="form-control" name="status" id="status">
                                                    <option value="Hadir">Hadir</option>
                                                    <option value="Izin">Izin</option>
                                                    <option value="Alpha">Alpha</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <input type="hidden" name="ta" id="ta" value="<?= $tahun_akademik[0]['id_tahun_akademik'] ?>"><br>
                                        <div class="text-right">
                                            <?php echo anchor('kehadiran', '<div class="btn btn-danger waves-effect"><i class="fas fa-undo"></i> Batal</div>'); ?>
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