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
          document.location = '../pengguna';
      </script>";
    exit();
}



$queryUser = mysqli_query($koneksi, "SELECT * FROM tbl_user");


?>


<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-12 grid-margin mb-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="font-weight-bold mb-0">Data Pengguna</h3>
                    </div>
                    <div>
                        <a href="add-user.php" class="btn btn-warning btn-icon-text btn-rounded">
                            <i class="ti-plus btn-icon-prepend"></i> Tambah Pengguna
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
                                    <th>Nama Lengkap</th>
                                    <th>username</th>
                                    <th>email</th>
                                    <th>Operasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($user = mysqli_fetch_assoc($queryUser)) {
                                ?>

                                    <tr>
                                        <td class="text-center" style="width: 5%;"><?= $no++; ?></td>
                                        <td><?= $user['user_id'] ?></td>
                                        <td><?= $user['fullname'] ?></td>
                                        <td><?= $user['username'] ?></td>
                                        <td><?= $user['email'] ?></td>
                                        <td style="width: 10%;">
                                            <!-- <a href="" title=" View soal" class="btn btn-primary btn-xs" onclick="window.open('view-soal.php?id=<?= $nilai['id'] ?>','','width=800,height=450,top=80,left=120')"><i class="ti-eye"></i></a> -->

                                            <a href="edit-user.php?id=<?= $user['id']; ?>" title="Update nilai" class="btn btn-warning btn-xs"><i class="ti-pencil-alt"></i></a>

                                            <a href="proses-user.php?id=<?= $user['id']; ?>&op=delete" title="Delete nilai" class="btn btn-danger btn-xs" onclick="return confirm('yakin ingin mengahapus')"><i class="ti-trash"></i></a>

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