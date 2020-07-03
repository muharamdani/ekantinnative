<?php
  require '../konek.php';
  session_start();
  $username2 = $_SESSION['username2'];
  if(!isset($_SESSION['login2']))
  {
    header("location:../login");
  }

  $akun3=mysqli_query($conn, "SELECT count(nis) as jmhpelanggan FROM transaksi where penjual='$username2'");
  $result2=mysqli_fetch_assoc($akun3);
  $jmhpelanggan=$result2['jmhpelanggan'];

  $saldopenjual=mysqli_query($conn, "SELECT saldo from user where username='$username2'");
  $result4=mysqli_fetch_assoc($saldopenjual);
  $saldopenjual=$result4['saldo'];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Control Panel</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="files/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="files/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="files/materialize.min.css">
    <link href="files/icon.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <ul id="slide-out" class="side-nav fixed z-depth-4">
      <li>
        <div class="userView">
          <div class="background">
            <img src="assets/img/photo1.png">
          </div>
          <img class="circle" src="assets/img/avatar04.png">
          <span class="white-text name">Welcome back,</span>
          <span class="white-text email"><?php echo $_SESSION['username2']; ?></span>
        </div>
      </li>

      <li>
        <form class="sidebar-form">
        </form>
      </li>
      
      <li><a class="active" href="index.php">Dashboard</a></li>
      <li><a class="active" href="../logout">Logout</a></li>
      <li><div class="divider"></div></li>
      <li><a class="subheader">Manajemen Pengguna</a></li>
      <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
          <li>
              <ul>
                <li><a href="transaksi/">Lakukan Transaksi</a></li>
                <li><a href="index.php">Saldo Saya</a></li>
                <li><a href="riwayat/">Riwayat Transaksi</a></li>
                <li><a href="update/">Rubah Profile</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </li>

      <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
        </ul>
      </li>
    </ul>
    <main>
    <section class="content">
      <div class="page-announce valign-wrapper"><a href="#" data-activates="slide-out" class="button-collapse valign hide-on-large-only"><i class="material-icons">menu</i></a><h1 class="page-announce-text valign">Selamat Datang di toko <?php echo $_SESSION['username2']; ?></h1></div>
      <!-- Stat Boxes -->
      <div class="row">
        <div class="col l3 s6">
          <!-- small box -->
          <div class="small-box bg-aqua">
          </div>
          </div><!-- ./col -->
          <div class="col l3 s6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3><?php echo $jmhpelanggan.'x'; ?></h3>
                <p>Transaksi Berhasil</p>
              </div>
              <a class="small-box-footer" class="animsition-link">--</a>
            </div>
            </div><!-- ./col -->
            <div class="col l3 s6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>Rp. <?php echo number_format($saldopenjual, 0, '.','.'); ?></h3>
                  <p>Total Saldo Anda</p>
                </div>
                <a class="small-box-footer" class="animsition-link">--</a>
              </div>
              </div><!-- ./col -->
              <div class="col l3 s6">
                <!-- small box -->
                <div class="small-box bg-red">
                </div>
              </div>
              <div class="container">
                <div class="quick-links center-align">
                  <h3>Quick Links</h3>
                  <div class="row">
                    <div class="col l4 offset-l2 s12 tooltipped" data-position="top" data-delay="50" data-tooltip="Transaksi"><a class="waves-effect waves-light btn-large" href="transaksi/">Lakukan Transaksi</a></div>
                    <div class="col l4 s12 tooltipped" data-position="top" data-delay="50" data-tooltip="Riwayat"><a class="waves-effect waves-light btn-large" href="riwayat/">Riwayat Transaksi</a></div>
                    <div class="col l4 offset-l4 s12 tooltipped" data-position="top" data-delay="50" data-tooltip="Logout"><a class="waves-effect waves-light btn-large" href="../logout">Logout</a></div>
                  </div>
              </div>
            </div>
          </div>
        </section>
        </main>
        <footer class="page-footer">
          <div class="footer-copyright">
            <div class="container">
              © 2019 Redesign and Edited By Ramdani. All Rights Reserved.
            </div>
          </div>
        </footer>
        <script src="files/jquery.min.js"></script>
        <script src="files/materialize.min.js"></script>
        <script>
        // Hide sideNav
        $('.button-collapse').sideNav({
        menuWidth: 300, // Default = 300
        edge: 'left', // Pilig Origin Horizontal
        closeOnClick: false, // Tutup Side nav (Click)
          draggable: true
          });
          $(document).ready(function(){
          $('.tooltipped').tooltip({delay: 50});
          });
          $('select').material_select();
          $('.collapsible').collapsible();
        </script>
      </div>
    <script src="files/jquery.min.js"></script>
  </body>
</html>