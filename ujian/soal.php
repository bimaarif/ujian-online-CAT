<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
    header('location: ../otentikasi');
}

require "../config.php";

$title = "Soal - ujian online";

$queryUjian = mysqli_query($koneksi, "SELECT * FROM tbl_pengaturan");

$ujian = mysqli_fetch_assoc($queryUjian);

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


$querySoal = mysqli_query($koneksi, "SELECT * FROM tbl_soal");

$jmlSoal = mysqli_num_rows($querySoal);

$no = 1;



?>

<style>
    .blink {
        animation: blinker .6s linear infinite;
    }

    @keyframes blinker {
        50% {
            opacity: 0;
        }
    }
</style>

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <form action="jawaban.php" method="post">
            <div class="row">
                <div class="col-lg-9 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <b>Soal No Ujian </b><span id="no_soal" class="bg-primary text-white px-2 py-1 rounded-circle"><?= $no; ?></span>
                        </div>
                        <div class="card-body">
                            <?php
                            while ($soal = mysqli_fetch_assoc($querySoal)) {
                            ?>

                                <div class="soal2">
                                    <input type="hidden" name="id_soal[]" value="<?= $soal['id']; ?>">
                                    <input type="hidden" name="jml_soal" value="<?= $jmlSoal; ?>">
                                    <div class="row">
                                        <?php

                                        if ($soal['gambar'] != '') { ?>

                                            <img src="../images/soal/<?= $soal['gambar'] ?>" alt="" class="col-lg-3 col-md-4 col-sm-6 mb-2 pe-0">

                                        <?php
                                        }
                                        ?>
                                        <div class="col-lg col-md col-sm">
                                            <?= html_entity_decode($soal['pertanyaan']); ?>
                                        </div>
                                    </div>
                                    <p>
                                        <input type="radio" class="form-check-input" name="pilihan[<?= $soal['id'] ?>]" id="jawaban_a" value="A" onclick="jawab(<?= $no; ?>)"> A. <?= $soal['a']; ?>
                                    </p>
                                    <p>
                                        <input type="radio" class="form-check-input" name="pilihan[<?= $soal['id'] ?>]" id="jawaban_b" value="B" onclick="jawab(<?= $no; ?>)"> B. <?= $soal['b']; ?>
                                    </p>
                                    <p>
                                        <input type="radio" class="form-check-input" name="pilihan[<?= $soal['id'] ?>]" id="jawaban_c" value="C" onclick="jawab(<?= $no; ?>)"> C. <?= $soal['c']; ?>
                                    </p>
                                    <p>
                                        <input type="radio" class="form-check-input" name="pilihan[<?= $soal['id'] ?>]" id="jawaban_d" value="D" onclick="jawab(<?= $no; ?>)"> D. <?= $soal['d']; ?>
                                    </p>
                                    <span hidden><?= $no++ ?></span>
                                </div>

                            <?php
                            }
                            ?>
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-dark btn-icon-text btn-rounded float-start my-1" id="previous"><i class="ti-arrow-circle-left"></i> sebelumnya</button>
                            <button type="button" class="btn btn-dark btn-icon-append btn-rounded float-end my-1" id="next"><i class="ti-arrow-circle-right"></i> selanjutnya</button>
                            <button type="submit" name="submit" class="btn btn-success btn-icon-append btn-rounded float-end my-1" id="end" onclick="return confirm('anda yain ingin mengakhiri ujian ini ?')" hidden><i class="ti-crown btn-icon-append"></i> selesai</button>

                            <button type="submit" name="timeout" class="btn btn-success btn-icon-append btn-rounded float-end my-1" id="timeOut" hidden>Time Out</button>

                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-header">
                            pilih soal
                        </div>
                        <div class="card-body ps-3 pe-1">
                            <?php

                            for ($i = 1; $i <= $jmlSoal; $i++) { ?>

                                <button type="button" class="btn btn-outline-dark no-soal btn-icon mb-2 me-1" onclick="pilihSoal(<?= $i; ?>)"><?= $i; ?></button>

                            <?php
                            }

                            ?>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
    <!-- content-wrapper ends -->
</div>
<!-- main-panel ends -->

<script src="script.js"></script>

<?php

require "../template/footer.php";

?>