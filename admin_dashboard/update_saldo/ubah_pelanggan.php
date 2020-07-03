<?php
  require '../../konek.php';
  include 'pelanggan_proses.php';
  session_start();
  if(!isset($_SESSION['login1']))
  {
    header("location:../../login");
  }
  $id=$_GET['id'];
  $query=mysqli_query($conn, "SELECT *FROM pelanggan where id='$id'");
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
    <script src="generate/script/jquery-3.1.1.min.js"></script>
 		<script type="text/javascript" src="generate/script/jquery-qrcode-0.14.0.js"></script>
		<script type="text/javascript" src="generate/script/qrcode.js"></script>
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
                <li><a href="../update_saldo/opsi_rubah.php">Tambah Saldo</a></li>
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
      <div class="page-announce valign-wrapper"><a href="#" data-activates="slide-out" class="button-collapse valign hide-on-large-only"><i class="material-icons">menu</i></a><h1 class="page-announce-text valign">Silahkan isi data-data berikut</h1></div>
      <div class="container">
        <div class="row">
        <?php while($result=mysqli_fetch_assoc($query)): ?>
          <form class="col s12" action="" method="POST">
            <div class="row">
              <div class="input-field col s12">
              <input type="hidden" name="id" value=<?php echo $result['id']; ?> />
              <div class="input-field col s12">
                <input type="number" name="saldo" maxlength="200" placeholder='Saldo' autofocus/>
              </div>
            </div>
            <br>
            <div class="center-align"><input class="btn btn-success"type="submit" name=submit value="Submit" /></div>
            <?php tambah_saldo(); ?>
          </form>
          <?php endwhile; ?>
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
    menuWidth: 300, // Default is 300
    edge: 'left', // Choose the horizontal origin
    closeOnClick: false, // Closes side-nav on <a> clicks, useful for Angular/Meteor
      draggable: true // Choose whether you can drag to open on touch screens
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
        if(isset($_SESSION['minsaldo']))
        {
          echo "Swal.fire({
            type:'warning',
            title:'Masukkan minimal saldo (2000)',
            timer:2000
          })";
          unset($_SESSION['minsaldo']);
        }
        ?>
      });
    </script>
  </body>
</html>