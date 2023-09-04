<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view("partials/header.php"); ?> 
</head>
<!-- PANGGIL SWEETALERT -->
<body>
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash')?>">
    <?php if($this->session->flashdata('flash')):?>
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
            <h1>List Tahun akademik</h1>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-lg-6"> <?php echo $this->session->flashdata('message');?>
          </div>
          <div class="col-lg-3"></div>
          <div class="col-lg-3 text-right" align="right">
            <div class="btn-group mb-3 " role="group" aria-label="Basic example">
              <a type="button" class="btn btn-primary" href="<?php echo site_url('tahun_akademik/tambah_tahun_akademik')?>"><i class="fas fa-plus"></i> Tambah</a>
            </div>
          </div>
        </div><br>
        <div class="table-responsive card card-body card-secondary">
          <table class="table align-items-center table-flush table-hover" id="table_id">
            <thead class="thead-light">
              <tr>
                <th>No.</th>
                <th>Tahun Akademik</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $x=1; foreach($ta->result_array() as $i): 
              $ta = $i['tahun_akademik'];
              ?>
              <tr>
                <td><?php echo $x ?></td>
                <td><?php echo $ta ?></td>
                <td>
                  <div class="dropdown d-inline">
                    <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Action
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item has-icon" href="<?php echo site_url('tahun_akademik/edit_tahun_akademik/'.$i['id_tahun_akademik'])?>"><i class="fas fa-edit text-success"></i> Update</a>
                      <a class="dropdown-item has-icon" href="<?php echo site_url('tahun_akademik/hapus/'.$i['id_tahun_akademik'])?>" onclick = "return confirm ('Yakin ingin menghapus data tahun akademik ini?')"><i class="far fa-trash-alt text-danger"></i> Delete</a>
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
