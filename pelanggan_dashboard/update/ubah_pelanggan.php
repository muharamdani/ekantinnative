<?php
  require '../../konek.php';
  session_start();
  if(!isset($_SESSION['login3']))
  {
    header("location:../../login");
  }
  $username = $_SESSION['username3'];
  $query=mysqli_query($conn, "SELECT *FROM pelanggan where username='$username'");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <title>Control Panel</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
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
                <li><a href="../riwayat/">Riwayat Transaksi</a></li>
                <li><a href="../riwayat/tambah.php">Riwayat Saldo</a></li>
                <li><a href="../update/ubah_pelanggan.php">Rubah Profile</a></li>
                <li><a href="../print/">Cetak Kartu</a></li>
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
          <form class="col s12" action="pelanggan_proses.php" method="POST">
            <div class="row">
              <div class="input-field col s6 holder">
                <input type="text" name="first_name" value=<?php echo $result['first_name']; ?> maxlength="200" autofocus placeholder='Nama Depan' />
              </div>
              <div class="input-field col s6">
                <input type="text" name="last_name" value=<?php echo $result['last_name']; ?> maxlength="200" placeholder='Nama Belakang' />
              </div>
              <div class="input-field col s6 holder">
                <input type="text" name="username" value=<?php echo $result['username']; ?> maxlength="200" placeholder='Username' />
              </div>
              <div class="input-field col s6">
                <input type="password" name="password" value="" maxlength="200" placeholder='Password' required/>
              </div>
              <div class="input-field col s12">
                <input type="number" name="telepon" value=<?php echo $result['telepon']; ?> maxlength="200" placeholder='Telepon' />                
              </div>
            </div>
            <br>
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
        if(isset($_SESSION['unvailableuser']))
        {
          echo "Swal.fire({
            type:'error',
            title:'Username sudah digunakan',
            timer:2000
          })";
          unset($_SESSION['unvailableuser']);
        }else if(isset($_SESSION['invalidpass']))
        {
          echo "Swal.fire({
            type:'warning',
            title:'Password terlalu singkat',
            timer:3000
          })";
          unset($_SESSION['invalidpass']);
        }
        ?>
      });
    </script>
  </body>
</html>