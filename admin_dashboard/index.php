<?php
  require '../konek.php';
  session_start();
  if(!isset($_SESSION['login1']))
  {
    header("location:../login");
  }
  $query=mysqli_query($conn, "SELECT count(username) as jumlah FROM user where level=2");
  $result=mysqli_fetch_assoc($query);
  $jumlah=$result['jumlah'];

  $akun3=mysqli_query($conn, "SELECT count(nis) as jmhpelanggan FROM pelanggan");
  $result2=mysqli_fetch_assoc($akun3);
  $jmhpelanggan=$result2['jmhpelanggan'];

  $saldopelanggan=mysqli_query($conn, "SELECT sum(saldo) as saldopelanggan FROM pelanggan");
  $result3=mysqli_fetch_assoc($saldopelanggan);
  $saldopelanggan=$result3['saldopelanggan'];

  $saldopenjual=mysqli_query($conn, "SELECT sum(saldo) as saldopenjual FROM user");
  $result4=mysqli_fetch_assoc($saldopenjual);
  $saldopenjual=$result4['saldopenjual'];
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
          <span class="white-text email"><?php echo $_SESSION['username1']; ?></span>
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
                <li><a href="buat_user/opsi_akun.php">Buat User Pelanggan/Penjual</a></li>
                <li><a href="update_user/opsi_rubah.php">List User</a></li>
                <li><a href="riwayat/list.php">Riwayat Transaksi</a></li>
                <li><a href="print/list.php">Cetak kartu Pelanggan</a></li>
                <li><a href="update_saldo/rubah_pelanggan.php">Tambah Saldo</a></li>
                <li><a href="tarik_saldo/opsi_akun.php">Tarik Saldo</a></li>
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
      <div class="page-announce valign-wrapper"><a href="#" data-activates="slide-out" class="button-collapse valign hide-on-large-only"><i class="material-icons">menu</i></a><h1 class="page-announce-text valign">Administrator Only</h1></div>
      <!-- Stat Boxes -->
      <div class="row">
        <div class="col l3 s6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $jumlah ?></h3>
              <p>Akun Penjual</p>
            </div>
            <a class="small-box-footer" class="animsition-link">--</a>
          </div>
          </div><!-- ./col -->
          <div class="col l3 s6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3><?php echo $jmhpelanggan; ?></h3>
                <p>Akun Pelanggan</p>
              </div>
              <a class="small-box-footer" class="animsition-link">--</a>
            </div>
            </div><!-- ./col -->
            <div class="col l3 s6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>Rp.<?php echo number_format($saldopelanggan, 0, '.','.'); ?></h3>
                  <p>Total Saldo Siswa</p>
                </div>
                <a class="small-box-footer" class="animsition-link">--</a>
              </div>
              </div><!-- ./col -->
              <div class="col l3 s6">
                <!-- small box -->
                <div class="small-box bg-red">
                  <div class="inner">
                    <h3>Rp.<?php echo number_format($saldopenjual,0,'.','.'); ?></h3>
                    <p>Total Saldo Penjual</p>
                  </div>
                  <a class="small-box-footer" class="animsition-link">--</a>
                </div>
              </div>
              <div class="container">
                <div class="quick-links center-align">
                  <h3>Quick Links</h3>
                  <div class="row">
                    <div class="col l4 offset-l2 s12 tooltipped" data-position="top" data-delay="50" data-tooltip="Data Pelanggan"><a class="waves-effect waves-light btn-large" href="update_user/rubah_pelanggan.php">Data Pelanggan</a></div>
                    <div class="col l4 s12 tooltipped" data-position="top" data-delay="50" data-tooltip="Data Penjual"><a class="waves-effect waves-light btn-large" href="update_user/rubah_penjual.php">Data Penjual</a></div>
                    <div class="col l4 offset-l4 s12 tooltipped" data-position="top" data-delay="50" data-tooltip="Buat User"><a class="waves-effect waves-light btn-large" href="buat_user/opsi_akun.php">Buat User</a></div>
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
    <script src="files/sweetalert2.all.min.js"></script>
        <script>
          $(document).ready(function(){ 
            <?php
            if(isset($_SESSION['sukses']))
            {
              echo "Swal.fire({
                type:'success',
                title:'Pendaftaran berhasil',
                timer:2000
              })";
              unset($_SESSION['sukses']);
            }
            ?>
          });
        </script>
  </body>
</html>