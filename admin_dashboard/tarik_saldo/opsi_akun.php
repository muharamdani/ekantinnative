<?php
  require '../../konek.php';
  session_start();
  if(!isset($_SESSION['login1']))
  {
    header("location:../../login");
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Control Panel</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="../files/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="../files/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../files/materialize.min.css">
    <link href="../files/icon.css" rel="stylesheet">
    <link href="../assets/css/custom.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <ul id="slide-out" class="side-nav fixed z-depth-4">
      <li>
        <div class="userView">
          <div class="background">
            <img src="../assets/img/photo1.png">
          </div>
          <img class="circle" src="../assets/img/avatar04.png">
          <span class="white-text name">Welcome back,</span>
          <span class="white-text email"><?php echo $_SESSION['username1']; ?></span>
        </div>
      </li>

      <li>
        <form class="sidebar-form">
        </form>
      </li>
      
      <li><a class="active" href="../index.php">Dashboard</a></li>
      <li><a class="active" href="../../logout">Logout</a></li>
      <li><div class="divider"></div></li>
      <li><a class="subheader">Manajemen Pengguna</a></li>
      <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
          <li>
              <ul>
                <li><a href="../buat_user/opsi_akun.php">Buat User Pelanggan/Penjual</a></li>
                <li><a href="../update_user/opsi_rubah.php">List User</a></li>
                <li><a href="../riwayat/list.php">Riwayat Transaksi</a></li>
                <li><a href="../print/list.php">Cetak kartu Pelanggan</a></li>
                <li><a href="../update_saldo/rubah_pelanggan.php">Tambah Saldo</a></li>
                <li><a href="../tarik_saldo/opsi_akun.php">Tarik Saldo</a></li>
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
      <div class="page-announce valign-wrapper"><a href="#" data-activates="slide-out" class="button-collapse valign hide-on-large-only"><i class="material-icons">menu</i></a><h1 class="page-announce-text valign">Tari saldo untuk..</h1></div>
        <div id="posttable" class="container">
          <div class="container">
            <div class="quick-links center-align">
              <h3>Pelanggan / Penjual</h3>
              <div class="row">
                <div class="col l4 offset-l2 s12 tooltipped" data-position="top" data-delay="50" data-tooltip="Pelanggan"><a class="waves-effect waves-light btn-large" href="rubah_pelanggan.php">Pelanggan</a></div>
                <div class="col l4 s12 tooltipped" data-position="top" data-delay="50" data-tooltip="Penjual"><a class="waves-effect waves-light btn-large" href="rubah_penjual.php">Penjual</a></div>
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
        <script src="../files/jquery.min.js"></script>
        <script src="../files/materialize.min.js"></script>
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
        <script src="../files/jquery.min.js"></script>
      </body>
    </html>