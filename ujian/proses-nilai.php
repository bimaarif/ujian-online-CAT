<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
    header('location: ../ujian');
    exit();
}


require "../config.php";

if (isset($_POST['save'])) {
    $id_user = $_POST['id_user'];
    $benar = $_POST['benar'];
    $salah = $_POST['salah'];
    $kosong = $_POST['kosong'];
    $nilai = $_POST['nilai'];
    $tgl = $_POST['tgl'];
    $status = $_POST['status'];

    // if ($gambar != null) {
    //     $page   = 'add-soal.php';
    //     $gambar = uploadImg($page);
    // } else {
    //     $gambar = '';
    // }

    $query = mysqli_query($koneksi, "INSERT INTO tbl_nilai VALUES(null,
                                    '$id_user','$benar','$salah','$kosong','$nilai','$tgl','$status')");


    echo "<script>
          alert('data nilai berhasil ditambahkan');
          document.location = 'nilai-ujian.php';
      </script>";
    return;
}

// hapus soal
if (@$_GET['op'] == 'delete') {
    $id = htmlspecialchars($_GET['id']);
    // $gbr = htmlspecialchars($_GET['gbr']);

    mysqli_query($koneksi, "DELETE FROM tbl_nilai WHERE id='$id'");

    // if ($gbr != "") {
    //     unlink('../images/soal/' . $gbr);
    // }

    echo "<script>
          alert('nilai berhasil dihapus');
          document.location = 'nilai-ujian.php';
      </script>";
    return;
}

// update soal
if (isset($_POST['update'])) {

    $id = $_POST['id'];

    $id_user = htmlspecialchars($_POST['id_user']);
    $benar = htmlspecialchars($_POST['benar']);
    $salah = htmlspecialchars($_POST['salah']);
    $kosong = htmlspecialchars($_POST['kosong']);
    $nilai = htmlspecialchars($_POST['nilai']);
    $tgl = htmlspecialchars($_POST['tgl']);
    $status = htmlspecialchars($_POST['status']);

    // if ($gambar != null) {
    //     $page   = 'index.php';
    //     $gbrSoal = uploadImg($page);
    //     @unlink('../images/soal/' . $gbrLama);
    // } else {
    //     $gbrSoal = $gbrLama;
    // }

    $query = mysqli_query($koneksi, "UPDATE tbl_nilai SET 
                                                        id_user = '$id_user',
                                                        benar   = '$benar',
                                                        salah   = '$salah',
                                                        kosong  = '$kosong',
                                                        nilai   = '$nilai',
                                                        tgl     = '$tgl',
                                                        status  = '$status' WHERE id = '$id'");


    echo "<script>
            alert('data nilai berhasil diperbaharui');
            document.location = 'nilai-ujian.php';
        </script>";
    return;
}
