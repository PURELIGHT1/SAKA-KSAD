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
                        <h1>ABSENSI ANGGOTA KSAD</h1>
                    </div>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-lg-6"><?php echo $this->session->flashdata('message'); ?></div>
                            <div class="col-lg-3"></div>
                            <div class="col-lg-3 text-right">
                                <div class="btn-group mb-3 " role="group" aria-label="Basic example">
                                    <a type="button" class="btn btn-primary" href="<?php echo site_url('kehadiran/tambah_presensi') ?>"><i class="fas fa-plus"></i> Tambah</a>
                                    <button type="button" class="btn btn-success" onclick="export_file('excel')"><i class="far fa-file-excel"></i> Excel</button>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive card card-body card-secondary">
                            <div class="row mb-3">
                                <div class="col-3">
                                    <select class="custom-select" id="ta">
                                        <?php foreach ($tahun_akademik as $value) : ?>
                                            <option value="<?= $value->id_tahun_akademik ?>" <?php if ($this->uri->segment(3) == $value->id_tahun_akademik) echo "selected"; ?>>
                                                <?= $value->tahun_akademik ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <select class="custom-select" id="pert">
                                        <option value="all">Semua</option>
                                        <?php foreach ($data_pertemuan->result() as $value_pert) : ?>
                                            <option value="<?= $value_pert->id_pertemuan ?>" <?php if ($this->uri->segment(4) == $value_pert->id_pertemuan) echo "selected"; ?>>
                                                <?= $value_pert->nama_pertemuan ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <?php if ($this->uri->segment(2) == "filter") : ?>
                                    <div class="col-sm-2">
                                        <a href="<?= base_url('kehadiran') ?>"></a>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <table class="table align-items-center table-flush table-hover" id="table_id">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Class</th>
                                        <th>Meeting</th>
                                        <th>Status</th>
                                        <th>Created</th>
                                        <th>Verification</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $x = 1;
                                    foreach ($data_presensi->result_array() as $value) :
                                        $nama = $value['nama'];
                                        $kelas = $value['kelas'];
                                        $pertemuan = $value['nama_pertemuan'];
                                        $status = $value['status_kehadiran'];
                                        $tgl = $value['tgl'];
                                        $verifikasi = $value['verifikasi'];
                                    ?>
                                        <tr>
                                            <td><?= $x++ ?></td>
                                            <td><?= $nama ?></td>
                                            <td><?= $kelas ?></td>
                                            <td><?= $pertemuan ?></td>
                                            <td><?= $status ?></td>
                                            <td><?= $tgl ?></td>
                                            <td><?= $verifikasi ?></td>
                                            <td>
                                                <div class="dropdown d-inline">
                                                    <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item has-icon" href="<?php echo site_url('kehadiran/verifikasi_kehadiran/' . $value['id']) ?>"><i class="fas fa-info text-info"></i> Verfication</a>

                                                        <a class="dropdown-item has-icon" href="<?php echo site_url('kehadiran/edit_kehadiran/' . $value['id']) ?>"><i class="fas fa-edit text-success"></i> Update</a>
                                                        <?php if ($this->session->userdata('id_role') == 1) : ?>
                                                            <a class="dropdown-item has-icon" href="<?php echo site_url('kehadiran/hapus_kehadiran/' . $value['id']) ?>" onclick="return confirm ('Yakin ingin menghapus data anggota ini?')"><i class="far fa-trash-alt text-danger"></i> Delete</a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                    <?php endforeach ?>
                                    <!--Development tbody-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

                <?php $this->load->view("partials/footer.php"); ?>
            </div>
        </div>
        <?php $this->load->view("partials/modal.php"); ?>
        <?php $this->load->view("partials/js.php"); ?>

        <script type="text/javascript">
            function filter(ta, pert) {
                window.location.href = "<?= base_url('kehadiran/filter/') ?>" + ta + "/" + pert;
            }

            $("#ta").change(function() {
                var ta = $("#ta").val();
                var pert = $("#pert").val();
                filter(ta, pert);
            });

            $("#pert").change(function() {
                var ta = $("#ta").val();
                var pert = $("#pert").val();
                filter(ta, pert);
            });


            function export_file(ta, pert) {
                var ta = $("#ta").val();
                var pert = $("#pert").val();
                window.location.href = "<?= base_url('kehadiran/excel/') ?>" + ta + "/" + pert;
            }

            function exportlaporan() {
                var ta = $("#ta").val();
                var status = $("#status").val();
                window.location.href = "<?= base_url('kehadiran/exportpdf/') ?>" + ta + "/" + status;
            }
        </script>
</body>

</html>