<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
  header('location: otentikasi');
  exit();
}


require "config.php";

$title = "dashboard - ujian online";

require "template/header.php";
require "template/navbar.php";
require "template/sidebar.php";

if ($_SESSION['ssRole'] != 1) {
  echo "<script>
          alert('halaman tidak ditemukan');
          document.location = 'ujian';
      </script>";
  exit();
}

$queryUser = mysqli_query($koneksi, "SELECT * FROM tbl_user");
$querySoal = mysqli_query($koneksi, "SELECT * FROM tbl_soal");
$queryNilai = mysqli_query($koneksi, "SELECT * FROM tbl_nilai");

$user = mysqli_num_rows($queryUser);
$soal = mysqli_num_rows($querySoal);
$nilai = mysqli_fetch_assoc($queryNilai);

?>


<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin mb-3">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h3 class="font-weight-bold mb-0">Dashboard</h3>
          </div>
          <div>
            <button type="button" class="btn btn-warning btn-icon-text btn-rounded">
              <i class="ti-clipboard btn-icon-prepend"></i> Report
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- cards -->
    <div class="row">
      <!-- <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title text-md-center text-xl-left">Sales</p>
            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
              <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">34040</h3>
              <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
            </div>
            <p class="mb-0 mt-2 text-danger">0.12% <span class="text-black ms-1"><small>(30 days)</small></span></p>
          </div>
        </div>
      </div> -->
      <!-- <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title text-md-center text-xl-left">Revenue</p>
            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
              <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">47033</h3>
              <i class="ti-wallet icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
            </div>
            <p class="mb-0 mt-2 text-danger">0.47% <span class="text-black ms-1"><small>(30 days)</small></span></p>
          </div>
        </div>
      </div> -->
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title text-md-center text-xl-left">Jumlah Pengguna</p>
            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
              <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
              <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?= $user ?></h3>
            </div>
            <!-- <p class="mb-0 mt-2 text-success">64.00%<span class="text-black ms-1"><small>(30 days)</small></span></p> -->
          </div>
        </div>
      </div>
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title text-md-center text-xl-left">Jumlah Soal</p>
            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
              <i class="ti-layers-alt icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
              <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?= $soal ?></h3>
            </div>
            <!-- <p class="mb-0 mt-2 text-success">23.00%<span class="text-black ms-1"><small>(30 days)</small></span></p> -->
          </div>
        </div>
      </div>
    </div>
    <!-- charts -->
    <div class="row">
      <!-- <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title">Sales details</p>
            <p class="text-muted font-weight-light">Received overcame oh sensible so at an. Formed do change merely to county it. Am separate contempt domestic to to oh. On relation my so addition branched.</p>
            <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
            <canvas id="sales-chart"></canvas>
          </div>
          <div class="card border-right-0 border-left-0 border-bottom-0">
            <div class="d-flex justify-content-center justify-content-md-end">
              <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                <button class="btn btn-lg btn-outline-light dropdown-toggle rounded-0 border-top-0 border-bottom-0" type="button" id="dropdownMenuDate2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  Today
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                  <a class="dropdown-item" href="#">January - March</a>
                  <a class="dropdown-item" href="#">March - June</a>
                  <a class="dropdown-item" href="#">June - August</a>
                  <a class="dropdown-item" href="#">August - November</a>
                </div>
              </div>
              <button class="btn btn-lg btn-outline-light text-primary rounded-0 border-0 d-none d-md-block" type="button"> View all </button>
            </div>
          </div>
        </div>
      </div> -->
      <!-- <div class="col-md-6 grid-margin stretch-card">
        <div class="card border-bottom-0">
          <div class="card-body pb-0">
            <p class="card-title">Purchases</p>
            <p class="text-muted font-weight-light mb-5">The argument in favor of using filler text goes something like this: If you use real content in the design process, anytime you reach a review and make an update</p>
            <canvas id="pieChart" class="mb-5"></canvas>
          </div>
        </div>
      </div> -->

    </div>
    <!-- icons -->

  </div>
  <!-- content-wrapper ends -->
</div>
<!-- main-panel ends -->

<?php

require "template/footer.php";

?>