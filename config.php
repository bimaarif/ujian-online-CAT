<?php


$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_ujian";

$koneksi = mysqli_connect($host, $user, $pass, $db);

$main_url = "http://localhost/ujian-online/";

// $pass = password_hash('abcd', PASSWORD_DEFAULT);

// echo $pass;

// fungsi upload gambar
function uploadImg($page)
{
    $fileName = $_FILES['gambar']['name'];
    $size = $_FILES['gambar']['size'];
    $tmp = $_FILES['gambar']['tmp_name'];

    $validEks = ['jpg', 'jpeg', 'png', 'gif'];
    $fileEks = explode('.', $fileName);
    $fileEks = strtolower(end($fileEks));

    if (!in_array($fileEks, $validEks)) {

        echo "<script>
                alert('input soal gagal, file yang anda upload bukan gambar');
                document.location = '$page';
            </script>";
        die();
    }


    if ($size > 1000000) {

        echo "<script>
                alert('maksimal ukuran gambar 1 MB');
                document.location = '$page';
            </script>";
        die();
    }

    $newName = time() . '-' . $fileName;

    move_uploaded_file($tmp, '../images/soal/' . $newName);

    return $newName;
}

function short($teks)
{
    if (strlen($teks) > 100) {
        $result = substr($teks, 0, 100) . "....";
    } else {
        $result = $teks;
    }

    return $result;
}

function in_date($tgl)
{
    $d = substr($tgl, 8, 2);
    $m = substr($tgl, 5, 2);
    $y = substr($tgl, 0, 4);

    return $d . '-' . $m . '-' . $y;
}

function durasi($waktu)
{
    if ($waktu < 60) {
        $jam = 0;
        $menit = ($waktu < 10 && $waktu >= 0) ? $waktu = '0' . $waktu : $waktu;
        $detik = '00';
    } else {
        $jam = floor($waktu / 60);
        $menit = $waktu - ($jam * 160);
        $menit = ($menit < 10 && $menit >= 0) ? $menit = '0' . $menit : $menit;
        $detik = '00';
    }

    return $jam . ':' . $menit . ':' . $detik;
}

function selectUser1($level)
{
    $result = null;

    if ($level == 1) {
        $result = 'selected';
    }

    return $result;
}

function selectUser2($level)
{
    $result = null;

    if ($level == 2) {
        $result = 'selected';
    }

    return $result;
}
