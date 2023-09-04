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
                        <h1>List Tentor KSAD</h1>
                    </div>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-lg-6"><?php echo $this->session->flashdata('message'); ?>
                            </div>
                            <div class="col-lg-3"></div>
                            <div class="col-lg-3 text-right">
                                <div class="btn-group mb-3 " role="group" aria-label="Basic example">
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
                                    <select class="custom-select" id="status">
                                        <option value="all">Semua</option>
                                        <?php foreach ($status_anggota as $value) : ?>
                                            <option value="<?= $value->id_status ?>" <?php if ($this->uri->segment(4) == $value->id_status) echo "selected"; ?>>
                                                <?= $value->status_anggota ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <?php if ($this->uri->segment(2) == "filter") : ?>
                                    <div class="col-sm-2">
                                        <a href="<?= base_url('tentor') ?>"></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <table class="table align-items-center table-flush table-hover" id="table_id">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>NPM</th>
                                        <th>Jabatan</th>
                                        <th>Program Studi</th>
                                        <th>Angkatan</th>
                                        <th>Alasan</th>
                                        <th>Proses</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $x = 1;
                                    foreach ($data_tentor->result_array() as $i) :
                                        $nama = $i['nama'];
                                        $npm = $i['npm'];
                                        $prodi = $i['nama_prodi'];
                                        $pengurus = $i['pengurus'];
                                        $alasan = $i['alasan'];
                                        $angkatan = $i['angkatan'];
                                        $status = $i['status'];
                                    ?>
                                        <tr>
                                            <td><?php echo $x ?></td>
                                            <td><?php echo $nama ?></td>
                                            <td><?php echo $npm ?></td>
                                            <td><?php echo $pengurus == "Tentor" ? '<span class="badge badge-success">COO</span>' : '<span class="badge badge-danger">Anggota</span>' ?></td>
                                            <td><?php echo $prodi ?></td>
                                            <td><?php echo $angkatan ?></td>
                                            <td><?php echo $alasan ?></td>
                                            <td><?php echo $status == 1? '<span class="badge badge-success">Diterima</span>':'<span class="badge badge-warning">Proses</span>'?></td>
                                            <td>
                                                <div class="dropdown d-inline">
                                                    <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <?php if ($this->session->userdata('id_role') == 1) : ?>
                                                            <a class="dropdown-item has-icon" href="<?php echo site_url('tentor/save_ubah/' . $i['id_anggota']) ?>" onclick="return confirm ('Yakin ingin menerima tentor ini?')"><i class="fas fa-edit text-success"></i> Terima</a>
                                                            <a class="dropdown-item has-icon" href="<?php echo site_url('tentor/hapus_anggota/' . $i['id_anggota']) ?>" onclick="return confirm ('Yakin ingin menghapus data tentor ini?')"><i class="far fa-trash-alt text-danger"></i> Tolak</a>
                                                        <?php endif; ?>
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
        function filter(ta, status) {
            window.location.href = "<?= base_url('tentor/filter/') ?>" + ta + "/" + status;
        }

        $("#ta").change(function() {
            var ta = $("#ta").val();
            var status = $("#status").val();
            filter(ta, status);
        });

        $("#status").change(function() {
            var ta = $("#ta").val();
            var status = $("#status").val();
            filter(ta, status);
        });

        function export_file(ta, status) {
            var ta = $("#ta").val();
            var status = $("#status").val();
            window.location.href = "<?= base_url('tentor/excel/') ?>" + ta + "/" + status;
        }
    </script>
</body>

</html>