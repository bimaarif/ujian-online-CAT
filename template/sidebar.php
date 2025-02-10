 <!-- partial:partials/_sidebar.html -->
 <nav class="sidebar sidebar-offcanvas" id="sidebar">
     <ul class="nav">

         <?php if ($_SESSION['ssRole'] == 2) {  ?>

             <li class="nav-item">
                 <a class="nav-link" href="#">
                     <i class="ti-crown menu-icon"></i>
                     <span class="menu-title">Ujian</span>
                 </a>
             </li>

         <?php } ?>


         <?php if ($_SESSION['ssRole'] == 1) {  ?>

             <li class="nav-item">
                 <a class="nav-link" href="../index.php">
                     <i class="ti-dashboard menu-icon"></i>
                     <span class="menu-title">Dashboard</span>
                 </a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="<?= $main_url ?>pengaturan">
                     <i class="ti-settings menu-icon"></i>
                     <span class="menu-title">Pengaturan</span>
                 </a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="<?= $main_url ?>soal">
                     <i class="ti-file menu-icon"></i>
                     <span class="menu-title">Soal</span>
                 </a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="<?= $main_url ?>ujian/nilai-ujian.php">
                     <i class="ti-bar-chart-alt menu-icon"></i>
                     <span class="menu-title">Nilai Ujian</span>
                 </a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="<?= $main_url ?>pengguna/index.php">
                     <i class="ti-user menu-icon"></i>
                     <span class="menu-title">Pengaturan Pengguna</span>
                 </a>
             </li>

         <?php } ?>
     </ul>
 </nav>