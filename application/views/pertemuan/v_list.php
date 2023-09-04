<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("partials/header.php"); ?>
</head>
<!-- PANGGIL SWEETALERT -->

<body>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash') ?>">
        <?php if ($this->session->flashdata('flash')) : ?>
        <?php endif; ?>
    </div>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <?php $this->load->view("partials/topbar.php"); ?>
            <?php $this->load->view("partials/sidebar.php"); ?>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>List Pertemuan KSAD</h1>
                    </div>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-lg-6"> <?php echo $this->session->flashdata('message'); ?>
                            </div>
                            <div class="col-lg-3"></div>
                            <div class="col-lg-3 text-right" align="right">
                                <div class="btn-group mb-3 " role="group" aria-label="Basic example">
                                    <a type="button" class="btn btn-primary" href="<?php echo site_url('pertemuan/tambah_pertemuan') ?>"><i class="fas fa-plus"></i> Tambah</a>
                                </div>
                            </div>
                        </div><br>
                        <div class="table-responsive card card-body card-secondary">
                            <div class="row mb-3">
                                <div class="col-3">
                                    <select class="custom-select" name="kelas" id="kelas">
                                        <option value="all">Semua</option>
                                        <option value="Beginner">Beginner</option>
                                        <option value="Intermediate">Intermediate</option>
                                    </select>
                                </div>
                                <?php if ($this->uri->segment(2) == "filter") : ?>
                                    <div class="col-sm-2">
                                        <a href="<?= base_url('pertemuan') ?>"></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <table class="table align-items-center table-flush table-hover" id="table_id">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Tangal</th>
                                        <th>Kelas</th>
                                        <th>Materi</th>
                                        <th>Open</th>
                                        <th>Close</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $x = 1;
                                    foreach ($data_pertemuan->result_array() as $i) :
                                        $nama = $i['nama_pertemuan'];
                                        $tgl = $i['tanggal_pertemuan'];
                                        $kelas = $i['kelas'];
                                        $materi = $i['materi'];
                                        $open = $i['open'];
                                        $closed = $i['closed'];
                                        $status = $i['status_pertemuan'];
                                    ?>
                                        <tr>
                                            <td><?php echo $x ?></td>
                                            <td><?php echo $nama ?></td>
                                            <td><?php echo $tgl ?></td>
                                            <td><?php echo $kelas ?></td>
                                            <td><?php echo $materi ?></td>
                                            <td><?php echo $open ?></td>
                                            <td><?php echo $closed ?></td>
                                            <td><?php echo $status == 1 ? 'Aktif':'Tidak Aktif' ?></td>
                                            <td>
                                                <div class="dropdown d-inline">
                                                    <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item has-icon" href="<?php echo site_url('pertemuan/edit_pertemuan/' . $i['id_pertemuan']) ?>"><i class="fas fa-edit text-success"></i> Update</a>
                                                        <a class="dropdown-item has-icon" href="<?php echo site_url('pertemuan/hapus_pertemuan/' . $i['id_pertemuan']) ?>" onclick="return confirm ('Yakin ingin menghapus data tahun akademik ini?')"><i class="far fa-trash-alt text-danger"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php $x++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </section>
            </div>
            <?php $this->load->view("partials/footer.php"); ?>
        </div>
    </div>
    <?php $this->load->view("partials/modal.php"); ?>
    <?php $this->load->view("partials/js.php"); ?>

    <script type="text/javascript">
        function filter(kelas) {
            window.location.href = "<?= base_url('pertemuan/filter/') ?>" + kelas;
        }

        $("#kelas").change(function() {
            var pert = $("#kelas").val();
            filter(pert);
        });

        function export_file(ta, status) {
            var ta = $("#ta").val();
            var status = $("#status").val();
            window.location.href = "<?= base_url('anggota/excel/') ?>" + ta + "/" + status;
        }
    </script>
</body>

</html>