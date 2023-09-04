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
            <h1>Laporan Pengeluaran dan Pendapatan</h1>
          </div>

           <div class="section-body">
            <div class="row">
              <div class="col-lg-6"><?php echo $this->session->flashdata('message');?>
            </div>
            <div class="col-lg-3"></div>
            <div class="col-lg-3 text-right">
              <div class="btn-group mb-3 " role="group" aria-label="Basic example">
                <a type="button" class="btn btn-primary" href="<?php echo site_url('keuangan/tambah_keuangan') ?>"><i class="fas fa-plus"></i> Tambah</a>
              </div>
            </div>
          </div>
            <div class="table-responsive card card-body card-secondary">
              <div class="row mb-3">
                <div class="col-3">
                  <select class="custom-select" name="ta" id="ta">
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
                    <a href="<?= base_url('keuangan') ?>"></a>
                  </div>
                <?php endif; ?>
              </div>
                <div class="col-lg-12">
                  <table class="table align-items-center table-flush table-hover" id="table_id">
                    <thead class="thead-light">
                      <tr>
                        <th>No.</th>
                        <th>Bukti</th>
                        <th>Jumlah</th>
                        <th>Tahun Akademik</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no=1; foreach($data_keuangan->result_array() as $value): ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td>
                          <?php if($value['bukti'] != null): ?>
                            <img src="<?= $value['bukti'] ?>" alt="<?= $value['nama_jenis_keuangan'] ?>" width="400px">
                          <?php endif;?>
                        </td>
                        <td><?= rupiah($value['jumlah']) ?></td>
                        <td><?= $value['nama_ta'] ?></td>
                        <td><?= $value['ket_keuangan'] ?></td>
                        <td>
                            <div class="dropdown d-inline">
                              <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item has-icon" href="<?php echo site_url('keuangan/edit_keuangan/'.$value['id_keuangan'])?>"><i class="fas fa-edit text-success"></i> Update</a>
                                <a class="dropdown-item has-icon" href="<?php echo site_url('keuangan/hapus_keuangan/'.$value['id_keuangan'])?>" onclick = "return confirm ('Yakin ingin menghapus data keuangan ini?')"><i class="far fa-trash-alt text-danger"></i> Delete</a>
                              </div>
                            </div>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <div class="col-lg-12">
                  <div class="row">
                    <div class="col-sm-4" >
                      <div class="card" style="background: #F4F6F9;">
                        <div class="card-body">
                          <h5 class="card-title">Total Kas</h5>
                          <button class="btn btn-success"><?= rupiah($total_pendapatan->total - $total_pengeluaran->total)  ?></button>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="card" style="background: #F4F6F9;">
                        <div class="card-body">
                          <h5 class="card-title">Pendapatan</h5>
                          <button class="btn btn-primary"><?= rupiah($total_pendapatan->total) ?></button>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="card" style="background: #F4F6F9;">
                        <div class="card-body">
                          <h5 class="card-title">Pengeluaran</h5>
                            <button class="btn btn-danger"><?= rupiah($total_pengeluaran->total) ?></button>
                        </div>
                      </div>
                    </div>
                  </div>
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
    function filter(ta) {
      window.location.href = "<?= base_url('keuangan/filter/') ?>" + ta;
    } 

    $("#ta").change(function() {
      var ta = $("#ta").val();
      filter(ta);
    });

  </script>
</body>
</html>
