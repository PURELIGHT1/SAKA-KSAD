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
                        <h1>Update Absensi Anggota </h1>
                    </div>
                    <div class="section-body">
                        <div class="body">
                            <form class="in-line" action="<?php echo base_url('kehadiran/save_ubah/' . $data_presensi->id) ?>" method="post">
                                <div class="card shadow mb-4 card-success">
                                    <div class="card-body">
                                        <div class="section-title mt-0">Nomor Pokok Mahasiswa (NPM)</div>
                                        <div class="form-group row mb-4">
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" class="form-control" placeholder="Masukkan Nomor Pokok Mahasiswa" name="npm" id="npm" value="<?= $data_presensi->npm ?>">
                                            </div>
                                        </div>

                                        <div class="section-title mt-0">Kelas</div>
                                        <div class="form-group row mb-4">
                                            <div class="col-sm-12 col-md-7">
                                                <select class="form-control" name="kelas" id="kelas">
                                                    <option value="Beginner" <?php if ($data_presensi->kelas == "Beginner") echo "selected"; ?>>Beginner</option>
                                                    <option value="Intermediate" <?php if ($data_presensi->kelas == "Intermediate") echo "selected"; ?>>Intermediate</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="section-title mt-0">Pertemuan</div>
                                        <div class="form-group row mb-4">
                                            <div class="col-sm-12 col-md-7">
                                                <select class="custom-select" name="pertemuan" id="pertemuan">
                                                    <?php foreach ($data_pertemuan->result() as $data) : ?>
                                                        <option value="<?= $data->id_pertemuan ?>" <?php if ($data->id_pertemuan == $data_presensi->pertemuan) echo 'selected'; ?>><?= $data->nama_pertemuan ?>
                                                        <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="section-title mt-0">Status Kehadiran</div>
                                        <div class="form-group row mb-4">
                                            <div class="col-sm-12 col-md-7">
                                                <select class="custom-select" name="ta" id="ta">
                                                    <?php foreach ($tahun_akademik->result() as $data) : ?>
                                                        <option value="<?= $data->id_tahun_akademik ?>" <?php if ($data->id_tahun_akademik == $data_presensi->tahun_akademik) echo 'selected'; ?>><?= $data->tahun_akademik ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="section-title mt-0">Keterangan / Judul Pertemuan</div>
                                        <div class="form-group row mb-4">
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" class="form-control" placeholder="Masukkan Judul Pertemuan" name="keterangan" id="keterangan" value="<?= $data_presensi->keterangan ?>">
                                            </div>
                                        </div>
                                        <div class="section-title mt-0">Tahun akademik</div>
                                        <div class="form-group row mb-4">
                                            <div class="col-sm-12 col-md-7">
                                                <select class="custom-select" name="status_kehadiran" id="status_kehadiran">
                                                    <option value="Hadir" <?php if ($data_presensi->status_kehadiran == "Hadir") echo "selected"; ?>>Hadir</option>
                                                    <option value="Izin" <?php if ($data_presensi->status_kehadiran == "Izin") echo "selected"; ?>>Izin</option>
                                                    <option value="Alpha" <?php if ($data_presensi->status_kehadiran == "Alpha") echo "selected"; ?>>Alpha</option>
                                                </select>
                                            </div>
                                        </div>
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