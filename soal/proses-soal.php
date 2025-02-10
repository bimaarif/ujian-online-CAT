<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
    header('location: ../soal');
    exit();
}


require "../config.php";

if (isset($_POST['save'])) {
    $soal = htmlspecialchars($_POST['soal']);
    $gambar = htmlspecialchars($_FILES['gambar']['name']);
    $a = htmlspecialchars($_POST['a']);
    $b = htmlspecialchars($_POST['b']);
    $c = htmlspecialchars($_POST['c']);
    $d = htmlspecialchars($_POST['d']);
    $kunci = htmlspecialchars($_POST['kunci']);

    if ($gambar != null) {
        $page   = 'add-soal.php';
        $gambar = uploadImg($page);
    } else {
        $gambar = '';
    }

    $query = mysqli_query($koneksi, "INSERT INTO tbl_soal VALUES(null,
                                    '$soal','$gambar','$a','$b','$c','$d','$kunci')");

    echo "<script>
          alert('data soal berhasil ditambahkan');
          document.location = 'add-soal.php';
      </script>";
    return;
}

// hapus soal
if (@$_GET['op'] == 'delete') {
    $id = htmlspecialchars($_GET['id']);
    $gbr = htmlspecialchars($_GET['gbr']);

    mysqli_query($koneksi, "DELETE FROM tbl_soal WHERE id='$id'");

    if ($gbr != "") {
        unlink('../images/soal/' . $gbr);
    }

    echo "<script>
          alert('soal berhasil dihapus');
          document.location = 'index.php';
      </script>";
    return;
}

// update soal
if (isset($_POST['update'])) {

    $id = $_POST['id'];

    $soal = htmlspecialchars($_POST['soal']);
    $gambar = htmlspecialchars($_FILES['gambar']['name']);
    $gbrLama = htmlspecialchars($_POST['gambarlama']);
    $a = htmlspecialchars($_POST['a']);
    $b = htmlspecialchars($_POST['b']);
    $c = htmlspecialchars($_POST['c']);
    $d = htmlspecialchars($_POST['d']);
    $kunci = htmlspecialchars($_POST['kunci']);

    if ($gambar != null) {
        $page   = 'index.php';
        $gbrSoal = uploadImg($page);
        @unlink('../images/soal/' . $gbrLama);
    } else {
        $gbrSoal = $gbrLama;
    }

    $query = mysqli_query($koneksi, "UPDATE tbl_soal SET 
                                                        pertanyaan = '$soal',
                                                        gambar = '$gbrSoal',
                                                        a      = '$a',
                                                        b      = '$b',
                                                        c      = '$c',
                                                        d      = '$d',
                                                        kunci_jawaban = '$kunci' WHERE id = '$id'");

    echo "<script>
          alert('data soal berhasil diperbaharui');
          document.location = 'index.php';
      </script>";
    return;
}
