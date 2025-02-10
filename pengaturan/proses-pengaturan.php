<?php


session_start();

if (!isset($_SESSION['ssLogin'])) {
    header('location: ../otentikasi');
    exit();
}


require "../config.php";

if (isset($_POST['save'])) {
    $nama = trim(htmlspecialchars($_POST['nama']));
    $waktu = trim(htmlspecialchars($_POST['waktu']));
    $min = trim(htmlspecialchars($_POST['minimum']));
    $peraturan = trim(htmlspecialchars($_POST['peraturan']));

    $query = mysqli_query($koneksi, "UPDATE tbl_pengaturan SET 
                                        nama_ujian = '$nama',
                                        waktu      = '$waktu',
                                        nilai_minimal = '$min',
                                        peraturan = '$peraturan'
                                    ");

    echo "<script>
          alert('data pengaturan berhasil diperbaharui');
          document.location = '../index.php';
      </script>";
    return;
}
