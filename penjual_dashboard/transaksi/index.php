<?php
  require 'fungsi.php';
  require '../../konek.php';
  session_start();
  if(!isset($_SESSION['username2']))
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
          <span class="white-text email"><?php echo $_SESSION['username2']; ?></span>
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
                <li><a href="../transaksi/">Lakukan Transaksi</a></li>
                <li><a href="../index.php">Saldo Saya</a></li>
                <li><a href="../riwayat/">Riwayat Transaksi</a></li>
                <li><a href="../update/">Rubah Profile</a></li>
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
      <div class="page-announce valign-wrapper"><a href="#" data-activates="slide-out" class="button-collapse valign hide-on-large-only"><i class="material-icons">menu</i></a><h1 class="page-announce-text valign">Total Rp. yang harus dibayar</h1></div>
      <div class="container">
        <div class="row">
          <form class="col s12" action="" method="POST">
            <div class="row">
              <div class="input-field col s12">
                 Bayar:
                <input type="number" name="bayar" maxlength="200" placeholder="saldo" autofocus />
              </div>
            </div>
            <div class="center-align"><input class="btn btn-success" type="submit" name=sendbayar value="Submit" /></div>
            <?php bayar(); ?>
          </form>
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
        <script src="../files/sweetalert2.all.min.js"></script>
        <script>
          $(document).ready(function(){ 
            <?php
            if(isset($_SESSION['kokminus']))
            {
              echo "Swal.fire({
                type:'warning',
                title:'Jangan minus dong!',
                timer:2000
              })";
              unset($_SESSION['kokminus']);
            }else if(isset($_SESSION['kokkosong']))
            {
              echo "Swal.fire({
                type:'info',
                title:'Tidak boleh kosong',
                timer:2000
              })";
              unset($_SESSION['kokkosong']);
            }else if(isset($_SESSION['gagal']))
            {
              echo "Swal.fire({
                type:'warning',
                title:'Saldo anda tidak mencukupi',
                timer:2000
              })";
              unset($_SESSION['gagal']);
            }
            ?>
          });
        </script>
      </body>
    </html>