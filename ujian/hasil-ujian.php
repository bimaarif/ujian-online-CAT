<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
    header('location: ../otentikasi');
}

require "../config.php";

$title = "Hasil - ujian online";

require "../template/header.php";
require "../template/navbar.php";
require "../template/sidebar.php";

if ($_SESSION['ssRole'] != 2) {
    echo "<script>
            alert('halaman tidak ditemukan');
            document.location = '../';
        </script>";
    exit();
}

// cek apakah siswa sudah pernah mengikuti ujian
$idUser = $_SESSION['ssId'];
$queryHasil = mysqli_query($koneksi, "SELECT * FROM tbl_nilai WHERE id_user = '$idUser'");

$hasil    = mysqli_fetch_assoc($queryHasil);
$cekHasil = mysqli_num_rows($queryHasil);

if (!$cekHasil) {
    echo "<script>window.location = 'index.php'</script>";
    exit();
}


?>


<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin mb-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="font-weight-bold mb-0">Hasil ujian</h3>
                    </div>
                    <div>
                        <button type="button" class="btn btn-info fw-bold btn-rounded">
                            Tanggal <?= in_date($hasil['tgl']); ?>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="my-5 pb-5 text-center py-5">
                    <div class="my-5 pb-5">
                        <h4 class="mb-3">Anda telah selesai mengerjakan ujian</h4>
                        <div class="d-flex justify-content-center mt-5">
                            <span class="m-2">Jumlah jawaban benar : <span class="bg-primary text-white px-2 py-1 rounded-circle"><?= $hasil['benar']; ?></span></span>

                            <span class="m-2">Jumlah jawaban salah : <span class="bg-warning fw-bold px-2 py-1 rounded-circle"><?= $hasil['salah']; ?></span></span>

                            <span class="m-2">Jumlah jawaban kosong : <span class="border border-dark px-2 py-1 rounded-circle"><?= $hasil['kosong']; ?></span></span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center my-4">
                        <button class="btn btn-dark text-white mb-2 fs-6">Nilai :<?= $hasil['nilai']; ?></button>
                    </div>
                    <?php

                    if ($hasil['status'] == 'LULUS') {
                        echo '<h5>Selamat anda <span class="bg-success text-white px-2 py-1 rounded">lulus</span> dalam ujian ini</h5>';
                    } else {
                        echo '<h5>Maaf anda  <span class="bg-danger text-white px-2 py-1 rounded">gagal</span> dalam ujian ini</h5>';
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
</div>
<!-- main-panel ends -->

<?php

require "../template/footer.php";

?>