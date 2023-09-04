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
            <h1>List anggota KSAD</h1>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-lg-6"><?php echo $this->session->flashdata('message');?>
              </div>
              <div class="col-lg-3"></div>
              <div class="col-lg-3 text-right">
                <div class="btn-group mb-3 " role="group" aria-label="Basic example">
                  <a type="button" class="btn btn-primary" href="<?php echo site_url('anggota/tambah_anggota')?>"><i class="fas fa-plus"></i> Tambah</a>
                  <button type="button" class="btn btn-success" onclick="export_file('excel')" ><i class="far fa-file-excel"></i>  Excel</button>
                </div>
              </div>
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
                <div class="col-3">
                  <select class="custom-select" id="status">
                    <option value="all">Semua</option>
                    <?php foreach($status_anggota as $value): ?>
                      <option value="<?= $value->id_status ?>"
                        <?php if($this->uri->segment(4) == $value->id_status) echo "selected"; ?>>
                        <?= $value->status_anggota ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <?php if($this->uri->segment(2) == "filter"): ?>
                  <div class="col-sm-2">
                    <a href="<?= base_url('anggota') ?>"></a>
                  </div>
                <?php endif; ?>
              </div>
              <table class="table align-items-center table-flush table-hover" id="table_id">
                <thead class="thead-light">
                  <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>NPM</th>
                    <th>Program Studi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $x=1; 
                  foreach($data_anggota->result_array() as $i): 
                  $nama = $i['nama'];
                  $npm = $i['npm'];
                  $prodi = $i['nama_prodi'];
                  $status = $i['id_status'];
                  ?>
                  <tr>
                    <td><?php echo $x ?></td>
                    <td><?php echo $nama ?></td>
                    <td><?php echo $npm ?></td>
                    <td><?php echo $prodi ?></td>
                    <td><?php echo $status == 0? '<span class="badge badge-danger">Tidak aktif</span>':'<span class="badge badge-success">Aktif</span>'?></td>
                    <td>
                      <div class="dropdown d-inline">
                        <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Action
                        </button>
                        <div class="dropdown-menu">
                            <?php if($this->session->userdata('id_role') == 1 or 2): ?>
                          <a class="dropdown-item has-icon" href="<?php echo site_url('anggota/detail_anggota/'.$i['id_anggota'])?>"><i class="fas fa-info text-info"></i> Detail</a>
                          <?php endif; ?>
                          <?php if($this->session->userdata('id_role') == 1): ?>
                          <a class="dropdown-item has-icon" href="<?php echo site_url('anggota/edit_anggota/'.$i['id_anggota'])?>"><i class="fas fa-edit text-success"></i> Update</a>
                          <a class="dropdown-item has-icon" href="<?php echo site_url('anggota/hapus_anggota/'.$i['id_anggota'])?>" onclick = "return confirm ('Yakin ingin menghapus data anggota ini?')"><i class="far fa-trash-alt text-danger"></i> Delete</a>
                          <?php endif; ?>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <?php $x++; endforeach; ?>
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
      window.location.href = "<?= base_url('anggota/filter/') ?>" + ta + "/" + status;
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
      window.location.href = "<?= base_url('anggota/excel/') ?>" + ta + "/" + status;
    } 
  </script>
</body>
</html>
