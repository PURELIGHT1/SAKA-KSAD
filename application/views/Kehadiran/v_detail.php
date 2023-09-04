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
                        <h1>Detail Absensi Anggota</h1>
                    </div>
                    <div class="section-body">

                        <div class="body">
                            <form class="in-line">
                                <div class="card card-info shadow mb-4">
                                    <div class="card-body">
                                        <div class="row clearfix">
                                            <div class="col-lg-5">
                                                <label>Nama Anggota</label>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <span>: <?= $data_presensi->nama ?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-lg-5">
                                                <label>NPM</label>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <span>: <?= $data_presensi->npm ?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-lg-5">
                                                <label>Total Hadir</label>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <span>: <?= $data_presensi->total_hadir ?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-lg-5">
                                                <label>Total Tidak Hadir</label>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <span>: <?= $data_presensi->total_tidak_hadir ?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-lg-5">
                                                <label>Total Izin</label>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <span>: <?= $data_presensi->total_izin ?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-right">
                                            <?php echo anchor('Kehadiran', '<div class="btn btn-danger waves-effect">Kembali</div>'); ?>
                                        </div>
                                    </div>
                                </div>
                            </form>
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

    <script type="text/javascript">
        function filter(ta, status) {
            window.location.href = "<?= base_url('laporan/filter/') ?>" + ta + "/" + status;
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
    </script>
</body>

</html>