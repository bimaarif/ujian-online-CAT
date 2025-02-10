<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
    header('location: ../ujian');
    exit();
}


require "../config.php";

if (isset($_POST['save'])) {
    $user_id = htmlspecialchars($_POST['user_id']);
    $fullname = htmlspecialchars($_POST['fullname']);
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];
    $hak_akses = $_POST['role'];

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // if ($password_hash != null) {
    //     $pass   = 'add-user.php';
    //     $password = $pass;
    // } else {
    //     $password = '';
    // }

    $query = mysqli_query($koneksi, "INSERT INTO tbl_user VALUES(null,
                                    '$user_id','$fullname','$username','$email','$password_hash','$hak_akses')");


    echo "<script>
          alert('data pengguna berhasil ditambahkan');
          document.location = 'index.php';
      </script>";
    return;
}

// hapus soal
if (@$_GET['op'] == 'delete') {
    $id = htmlspecialchars($_GET['id']);
    // $gbr = htmlspecialchars($_GET['gbr']);

    mysqli_query($koneksi, "DELETE FROM tbl_user WHERE id='$id'");

    // if ($gbr != "") {
    //     unlink('../images/soal/' . $gbr);
    // }

    echo "<script>
          alert('data pengguna berhasil dihapus');
          document.location = 'index.php';
      </script>";
    return;
}

// update soal
if (isset($_POST['update'])) {

    $id = $_POST['id'];

    $user_id = htmlspecialchars($_POST['user_id']);
    $fullname = htmlspecialchars($_POST['fullname']);
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];
    $hak_akses =  htmlspecialchars($_POST['role']);

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // if ($gambar != null) {
    //     $page   = 'index.php';
    //     $gbrSoal = uploadImg($page);
    //     @unlink('../images/soal/' . $gbrLama);
    // } else {
    //     $gbrSoal = $gbrLama;
    // }

    $query = mysqli_query($koneksi, "UPDATE tbl_user SET 
                                                        user_id    = '$user_id',
                                                        fullname   = '$fullname',
                                                        username   = '$username',
                                                        email      = '$email',
                                                        password   = '$password_hash',
                                                        role = '$hak_akses' WHERE id = '$id'");


    echo "<script>
            alert('data pengguna berhasil diperbaharui');
            document.location = 'index.php';
        </script>";
    return;
}
