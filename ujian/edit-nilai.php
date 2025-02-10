<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
    header('location: ../otentikasi');
    exit();
}


require "../config.php";

$title = "Pengaturan - ujian online";

require "../template/header.php";
require "../template/navbar.php";
require "../template/sidebar.php";

if ($_SESSION['ssRole'] != 1) {
    echo "<script>
          alert('halaman tidak ditemukan');
          document.location = '../ujian';
      </script>";
    exit();
}

$id = $_GET['id'];

$queryNilai = mysqli_query($koneksi, "SELECT * FROM tbl_nilai WHERE id = '$id'");

$nilai = mysqli_fetch_assoc($queryNilai);


?>


<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <form action="proses-nilai.php" method="post">
            <div class="row">
                <div class="col-md-12 grid-margin mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="font-weight-bold mb-0">edit nilai</h3>
                        </div>
                        <div>
                            <a href="nilai-ujian.php" class="btn btn-warning btn-icon-text btn-rounded">
                                <i class="ti-back-left btn-icon-prepend"></i> kembali
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <p class="card-title"></p>
                        <div class="col-md-9">
                            <input type="hidden" name="id" value="<?= $nilai['id']; ?>">
                            <div class="form-group row mb-2">
                                <label for="a" class="col-sm-3 col-form-label-sm">Nomor Induk Siswa</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" placeholder="Nomor Induk Siswa" name="id_user" value="<?= $nilai['id_user']; ?>" required>

                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="b" class="col-sm-3 col-form-label-sm">Jawaban Benar</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" placeholder="Jawaban Benar" name="benar" value="<?= $nilai['benar']; ?>" required>

                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="c" class="col-sm-3 col-form-label-sm">Jawaban Salah</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" placeholder="Jawaban Salah" name="salah" value="<?= $nilai['salah']; ?>" required>

                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="D" class="col-sm-3 col-form-label-sm">Jawaban Kosong</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" placeholder="Jawaban Kosong" name="kosong" value="<?= $nilai['kosong']; ?>" required>

                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="D" class="col-sm-3 col-form-label-sm">Nilai</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" placeholder="Nilai" name="nilai" value="<?= $nilai['nilai']; ?>" required>

                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="D" class="col-sm-3 col-form-label-sm">Nilai</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control form-control-sm" placeholder="tanggal" name="tgl" value="<?= $nilai['tgl']; ?>" required>

                                </div>
                            </div>


                            <div class="form-group row mb-2">
                                <label for="D" class="col-sm-3 col-form-label-sm">Status</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" placeholder="Status" name="status" value="<?= $nilai['status']; ?>" required>
                                </div>
                            </div>



                            <div class="form-group row mb-2">
                                <label for="" class="col-sm-3 col-form-label-sm"></label>
                                <div class="col-sm-9">

                                    <button type="submit" class="btn btn-primary text-white btn-icon-text btn-rounded" name="update"><i class="ti-save-alt btn-icon-prepend"></i>Edit</button>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- content-wrapper ends -->
</div>
<!-- main-panel ends -->

<?php

require "../template/footer.php";

?>