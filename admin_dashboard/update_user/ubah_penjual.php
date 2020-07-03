<?php
  require '../../konek.php';
  session_start();
  if(!isset($_SESSION['login1']))
  {
    header("location:../../login");
  }
  $id=$_GET['id'];
  $query=mysqli_query($conn, "SELECT *FROM user where id='$id'")
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
      <div class="page-announce valign-wrapper"><a href="#" data-activates="slide-out" class="button-collapse valign hide-on-large-only"><i class="material-icons">menu</i></a><h1 class="page-announce-text valign">Silahkan isi data-data berikut</h1></div>
      <div class="container">
        <div class="row">
        <?php while($result=mysqli_fetch_assoc($query)): ?>
          <form class="col s12" action="penjual_proses.php" method="POST">
            <div class="row">
              <input type="hidden" name="id" value=<?php echo $result['id']; ?> />
              <div class="input-field col s12">
                <input type="text" name="username" value=<?php echo $result['username']; ?> maxlength="20" placeholder="Username" autofocus>
              </div>
              <div class="input-field col s12">
                <input type="password" name="password" value="" placeholder="Password" required/>
              </div>
              <div class="input-field col s12">
                <input type="password" name="password2" value="" placeholder="Konfirmasi Password" required/>
              </div>
              <div class="input-field col s12">
                <input type="number" name="level" value=<?php echo $result['level']; ?> maxlength="2" placeholder="Level" />
              </div>
            </div>
            <div class="center-align"><input class="btn btn-success"type="submit" name=submit value="Submit" /></div>
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
        if(isset($_SESSION['unvailableuser']))
        {
          echo "Swal.fire({
            type:'error',
            title:'Username sudah digunakan',
            timer:2000
          })";
          unset($_SESSION['unvailableuser']);
        }
        else if(isset($_SESSION['unvailablepass']))
        {
          echo "Swal.fire({
            type:'error',
            title:'Konfirmasi password tidak sama',
            timer:2000
          })";
          unset($_SESSION['unvailablepass']);
        }else if(isset($_SESSION['level']))
        {
          echo "Swal.fire({
            type:'info',
            title:'level 1 untuk admin, level 2 untuk penjual. Tidak Lebih',
            timer:3000
          })";
          unset($_SESSION['level']);
        }else if(isset($_SESSION['invalidpass']))
        {
          echo "Swal.fire({
            type:'warning',
            title:'Password terlalu singkat',
            timer:2000
          })";
          unset($_SESSION['invalidpass']);
        }
        ?>
      });
    </script>
  </body>
</html>
