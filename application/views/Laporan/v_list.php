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
            <h1>Laporan Kas dan Pangkal</h1>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-lg-6"><?php echo $this->session->flashdata('message');?>
            </div>
            <div class="col-lg-3"></div>
          </div>
          <div class="table-responsive card card-body card-secondary">
            <div class="row mb-3">
              <div class="col-3">
                <select class="custom-select" id="ta"  >
                  <?php foreach($tahun_akademik as $value): ?>
                    <option value="<?= $value->id_tahun_akademik ?>"
                      <?php if($this->uri->segment(3) == $value->id_tahun_akademik) echo "selected"; ?>>
                      <?= $value->tahun_akademik ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
              <?php if($this->uri->segment(2) == "filter"): ?>
                <div class="col-sm-2">
                  <a href="<?= base_url('laporan') ?>"></a>
                </div>
              <?php endif; ?>
            </div>
            <table class="table align-items-center table-flush table-hover" id="table_id">
              <thead class="thead-light">
                <tr>
                  <th>No.</th>
                  <th>Nama</th>
                  <th>NPM</th>
                  <th>Uang Kas</th>
                  <th>Uang Pangkal</th>
                  <th>Subtotal</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>

                <?php $x=1; foreach($data_anggota->result_array() as $i):
                $nama = $i['nama'];
                $npm = $i['npm'];
                $kas = $i['uang_kas'];
                $pangkal = $i['uang_pangkal'];
                $total = $i['uang_pangkal'] + $i['uang_kas'];
                $keterangan = $i['nama_ket_uang'];
                ?>
                <tr>
                  <td><?= $x ?></td>
                  <td><?= $nama ?></td>
                  <td><?= $npm ?></td>
                  <td><?= rupiah($kas) ?></td>
                  <td><?= rupiah($pangkal) ?></td>
                  <td><?= rupiah($total) ?></td>
                  <td><?= $keterangan?></td>
                  <td>
                    <div class="dropdown d-inline">
                      <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                      </button>
                      <div class="dropdown-menu">
                        <?php if($this->session->userdata('id_role') == 2): ?>
                          <a class="dropdown-item has-icon" href="<?php echo site_url('laporan/detail_laporan/'.$i['id_anggota'])?>"><i class="fas fa-edit text-success"></i> Detail</a>
                        <?php endif; ?>
                        <a class="dropdown-item has-icon" href="<?php echo site_url('laporan/edit_laporan/'.$i['id_anggota'])?>"><i class="fas fa-edit text-success"></i> Update</a>
                      </div>
                    </div>
                  </td>
                </tr>
                <?php $x++; endforeach;?>
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