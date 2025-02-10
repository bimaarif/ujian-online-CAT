<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
    header('location: ../otentikasi');
    exit();
}


require "../config.php";

$title = "Nilai - ujian online";

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



$queryNilai = mysqli_query($koneksi, "SELECT * FROM tbl_nilai");


?>


<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-12 grid-margin mb-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="font-weight-bold mb-0">Data Nilai ujian</h3>
                    </div>
                    <div>
                        <a href="add-nilai.php" class="btn btn-warning btn-icon-text btn-rounded">
                            <i class="ti-plus btn-icon-prepend"></i> Tambah nilai ujian
                        </a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="mytable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No induk siswa</th>
                                    <th>Jawaban benar</th>
                                    <th>Jawaban salah</th>
                                    <th>Jawaban kosong</th>
                                    <th>nilai akhir</th>
                                    <th>Tanggal ujian</th>
                                    <th>status</th>
                                    <th>Operasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($nilai = mysqli_fetch_assoc($queryNilai)) {
                                ?>

                                    <tr>
                                        <td class="text-center" style="width: 5%;"><?= $no++; ?></td>
                                        <td><?= $nilai['id_user'] ?></td>
                                        <td><?= $nilai['benar'] ?></td>
                                        <td><?= $nilai['salah'] ?></td>
                                        <td><?= $nilai['kosong'] ?></td>
                                        <td><?= $nilai['nilai'] ?></td>
                                        <td><?= in_date($nilai['tgl']); ?></td>
                                        <td><?= $nilai['status'] ?></td>
                                        <td style="width: 10%;">
                                            <!-- <a href="" title=" View soal" class="btn btn-primary btn-xs" onclick="window.open('view-soal.php?id=<?= $nilai['id'] ?>','','width=800,height=450,top=80,left=120')"><i class="ti-eye"></i></a> -->

                                            <a href="edit-nilai.php?id=<?= $nilai['id']; ?>" title="Update nilai" class="btn btn-warning btn-xs"><i class="ti-pencil-alt"></i></a>

                                            <a href="proses-nilai.php?id=<?= $nilai['id']; ?>&op=delete" title="Delete nilai" class="btn btn-danger btn-xs" onclick="return confirm('yakin ingin mengahapus')"><i class="ti-trash"></i></a>

                                        </td>
                                    </tr>


                                <?php } ?>
                            </tbody>
                        </table>
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