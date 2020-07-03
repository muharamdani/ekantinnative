<?php
  require '../../konek.php';
  session_start();
  if(!isset($_SESSION['username3']))
  {
    header("location:../../login");
  }
  $username3=$_SESSION['username3'];
  $jumlahdataperhalaman=6;
  $result=mysqli_query($conn, "SELECT *FROM transaksi where username='$username3'");
  $jumlahdata=mysqli_num_rows($result);
  $jumlahhalaman=ceil($jumlahdata/$jumlahdataperhalaman);
  $halamanaktif = (isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
  $awaldata=($jumlahdataperhalaman * $halamanaktif) - $jumlahdataperhalaman;
  $query=mysqli_query($conn, "SELECT id, nis, first_name, last_name, penjual, saldo, waktu FROM transaksi where username='$username3' ORDER BY id DESC LIMIT $awaldata, $jumlahdataperhalaman");
  //$query=mysqli_query($conn, "SELECT transaksi.id, transaksi.nis, transaksi.first_name, transaksi.last_name, transaksi.penjual,transaksi.saldo ,log_saldo.add_saldo, transaksi.waktu FROM transaksi INNER JOIN log_saldo ON transaksi.username = log_saldo.pelanggan where username='$username3' LIMIT $awaldata, $jumlahdataperhalaman");
  
?>
<style>
  .none{
    display: none;
  }
  .kanan{
    text-align:right;
  }
</style>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Control Panel</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <script src="../files/jquery.min.js"></script>
    <script src="../files/live_transaksi.js"></script>
    <link href="../../admin_dashboard/files/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="../../admin_dashboard/files/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../../admin_dashboard/files/materialize.min.css">
    <link href="../../admin_dashboard/files/icon.css" rel="stylesheet">
    <link href="../../admin_dashboard/assets/css/custom.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <ul id="slide-out" class="side-nav fixed z-depth-4">
      <li>
        <div class="userView">
          <div class="background">
            <img src="../../admin_dashboard/assets/img/photo1.png">
          </div>
          <img class="circle" src="../../admin_dashboard/assets/img/avatar04.png">
          <span class="white-text name">Welcome back,</span>
          <span class="white-text email"><?php echo $_SESSION['username3']; ?></span>
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
                <li><a href="../riwayat">Riwayat Transaksi</a></li>
                <li><a href="../riwayat/tambah.php">Riwayat Saldo</a></li>
                <li><a href="../update/ubah_pelanggan.php">Rubah Profile</a></li>
                <li><a href="../print">Cetak Kartu</a></li>
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
      
      <div class="page-announce valign-wrapper"><a href="#" data-activates="slide-out" class="button-collapse valign hide-on-large-only"><i class="material-icons">menu</i></a><h1 class="page-announce-text valign">Riwayat transaksis</h1></div>
      <div id="posttable" class="container">
      <!-- PENCARIAN 
      <form class="col s12" action="" method="POST">
        <div class="row">
          <div class="input-field col s6">
            <input type="text" name="keywords" id="keywords" placeholder='Cari'autocomplete="off" autofocus/>
            <button type="submit" name="search" id="search" value="Submit">Cari</button>
          </div>
        </div>
      </form>-->

        <div id="tabel">
        <table class="responsive-table striped hover centered" id="names-table">
          <thead>
            <tr>
                <th>No.</th>
                <th>ID</th>
                <th>NIS</th>
                <th>Nama Lengkap</th>
                <th>Penjual</th>
                <th>Saldo</th>
                <th>Waktu</th>
            </tr>
          </thead>
          <tbody>
          <div class="none">
          <?php $a=1+$awaldata; ?>
            <?php while($result=mysqli_fetch_assoc($query)): ?>
            </div>
            <tr>
              <td><?php echo $a; ?></td>
              <td><?php echo $result['id'] ?></td>
              <td><?php echo $result['nis'] ?></td>
              <td><?php echo $result['first_name'].' '.$result['last_name'] ?></td>
              <td><?php echo $result['penjual'] ?></td>
              <td><?php echo 'Rp. '.number_format($result['saldo'], 0,'.','.') ?></td>
              <td><?php echo $result['waktu'] ?></td>
                <td>
                <div class="btn-toolbar">
                  </a>
                </div>
              </td>
            </tr>
            <?php $a++; ?>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
  <center>
    <br>
    Halaman : 
        <?php if($halamanaktif>1): ?>
          <a href="?halaman=<?php echo $halamanaktif - 1; ?>">&laquo;</a>
        <?php endif; ?>
        <?php for($i=1; $i<=$jumlahhalaman; $i++) : ?>
          <?php if($i == $halamanaktif) :?>
            <a href="?halaman=<?php echo $i; ?>" style="font-weight:bold; color:red;"><?php echo $i; ?></a>
          <?php else : ?>
            <a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
          <?php endif; ?>
        <?php endfor; ?>
        <?php if($halamanaktif < $jumlahhalaman) : ?>
          <a href="?halaman=<?php echo $halamanaktif + 1; ?>">&raquo;</a>
        <?php endif; ?>
  </center>
  </main>
  <footer class="page-footer">
    <div class="footer-copyright">
        <div class="container">
          © 2019 Redesign and Edited By Ramdani. All Rights Reserved.
        </div>
      </div>
    </footer>
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
  </body>
</html>