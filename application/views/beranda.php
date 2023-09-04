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

      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>SAKA KSAD</h1>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-primary">
                    <i class="fas fa-user-check"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Total anggota aktif</h4>
                    </div>
                    <div class="card-body">
                      <?= $anggota_aktif['anggota_aktif'] ?> orang
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-danger">
                    <i class="fas fa-user-times"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Anggota yang tidak aktif</h4>
                    </div>
                    <div class="card-body">
                     <?= $anggota_pasif['anggota_pasif'] ?> orang
                   </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-warning">
                    <i class="fas fa-user-plus"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Anggota baru</h4>
                    </div>
                    <div class="card-body">
                      <?= $anggota_baru['anggota_aktif'] ?> orang
                    </div>
                  </div>

                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-success">
                    <i class="fas fa-users"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Total Anggota</h4>
                    </div>
                    <div class="card-body">
                      <?= $total_anggota['total_anggota'] ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <canvas id="ChartKeuangan" width="400" height="100" aria-label="Hello ARIA World" role="img"></canvas>
          <?php foreach($pendapatan->result_array() as $value): ?>
            <?php $data_ta[] = $value['ta']; ?>
            <?php $data_jumlah[] = $value['jlh']; ?>
          <?php endforeach; ?>
          <?php foreach($pengeluaran->result_array() as $value): ?>
            <?php $data_jumlah[] = $value['jlh']; ?>
          <?php endforeach; ?>

        </section>
      </div>
  </div>
  <?php $this->load->view("partials/footer.php"); ?> 
</div>
<?php $this->load->view("partials/js.php"); ?> 
<?php $this->load->view("partials/modal.php"); ?>

<!-- char keuangan -->
<script>
  var ctx = document.getElementById("ChartKeuangan").getContext("2d");
  
  var data_ta = <?php echo json_encode($data_ta); ?>;
  var data_jumlah = <?php echo json_encode($data_jumlah); ?>;

  console.log(data_ta)
  var lineChart = new Chart(ctx, {
    type : 'line',
    data: {
      labels: data_ta,
      datasets: [{
        label: "Jumlah Keuangan",
        data: data_jumlah,
        backgroundColor: "rgba(0, 255, 127, 1 )",
        borderColor: "rgba(0, 255, 127, 1 )",
        pointBorderColor: "rgba(17,28,238,0.6)",
        pointBackgroundColor:  "rgba(28,185,14,0.7)",
        pointHoverBackgroundColor: "#fff",
        pointHoverBorderColor: "rgba(220,220,220,1)",
        pointBorderWidth: 1
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero:true,
            stepSize: 1
          }
        }]
      }
    }

  });
</script>
</body>
</html>

