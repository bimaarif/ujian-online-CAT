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

$queryUser = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE id = '$id'");

$user = mysqli_fetch_assoc($queryUser);





?>


<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <form action="proses-user.php" method="post">
            <div class="row">
                <div class="col-md-12 grid-margin mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="font-weight-bold mb-0">Ubah Pengguna</h3>
                        </div>
                        <div>
                            <a href="index.php" class="btn btn-warning btn-icon-text btn-rounded">
                                <i class="ti-back-left btn-icon-prepend"></i> kembali
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <p class="card-title"></p>
                        <div class="col-md-9">
                            <input type="hidden" name="id" value="<?= $user['id']; ?>">
                            <div class="form-group row mb-2">
                                <label for="a" class="col-sm-3 col-form-label-sm">Nomor Induk Siswa</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" placeholder="Nomor Induk Siswa" name="user_id" value="<?= $user['user_id'] ?>" required>
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="b" class="col-sm-3 col-form-label-sm">Nama Lengkap</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" placeholder="Nama Lengkap" name="fullname" value="<?= $user['fullname'] ?>" required>

                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="c" class="col-sm-3 col-form-label-sm">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" placeholder="Username" name="username" value="<?= $user['username'] ?>" required>

                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="D" class="col-sm-3 col-form-label-sm">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" placeholder="Email" name="email" value="<?= $user['email'] ?>" required>

                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="D" class="col-sm-3 col-form-label-sm">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control form-control-sm" placeholder="Password" name="password" value="<?= short($user['password']); ?>" required>

                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="#" class="col-sm-3 col-form-label-sm">Hak akses</label>
                                <div class="col-sm-9">
                                    <!-- <input type="date" class="form-control form-control-sm" placeholder="tanggal" name="tgl" required> -->

                                    <select id="" name="role" class="form-control form-control-sm">
                                        <option value="1" <?= selectUser1($user['role']) ?>>Admin</option>
                                        <option value="2" <?= selectUser2($user['role']) ?>>user</option>
                                    </select>

                                </div>
                            </div>




                            <div class="form-group row mb-2">
                                <label for="" class="col-sm-3 col-form-label-sm"></label>
                                <div class="col-sm-9">

                                    <button type="submit" class="btn btn-primary text-white btn-icon-text btn-rounded" name="update"><i class="ti-save-alt btn-icon-prepend"></i>Simpan</button>

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