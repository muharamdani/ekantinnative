<?php
  require '../../konek.php';
  session_start();
  if(!isset($_SESSION['login1']))
  {
    header("location:../../login");
  }
  $jumlahdataperhalaman=6;
  $result=mysqli_query($conn, "SELECT *FROM pelanggan");
  $jumlahdata=mysqli_num_rows($result);
  $jumlahhalaman=ceil($jumlahdata/$jumlahdataperhalaman);
  $halamanaktif = (isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
  $awaldata=($jumlahdataperhalaman * $halamanaktif) - $jumlahdataperhalaman;
  $query=mysqli_query($conn, "SELECT *FROM pelanggan ORDER BY ID DESC LIMIT $awaldata, $jumlahdataperhalaman");
  /*if(isset($_POST['search']))
  {
    $keywords=$_POST['keywords'];
    $query=mysqli_query($conn, "SELECT *FROM pelanggan where nis LIKE '%$keywords%' OR first_name LIKE '%$keywords%' OR last_name LIKE '%$keywords%' OR kelas LIKE '%$keywords%' OR telepon LIKE '%$keywords%'");
  }
  */
?>
<style>
  .none{
    display: none;
  }
</style>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Control Panel</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <script src="../files/jquery.min.js"></script>
    <script src="../files/live_pelanggan.js"></script>
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
      
      <div class="page-announce valign-wrapper"><a href="#" data-activates="slide-out" class="button-collapse valign hide-on-large-only"><i class="material-icons">menu</i></a><h1 class="page-announce-text valign">Data Pelanggan</h1></div>
      <div id="posttable" class="container">
      <!-- PENCARIAN -->
        <form class="col s12" action="" method="POST">
          <div class="row">
            <div class="input-field col s6">
              <input type="text" name="keywords" id="keywords" placeholder='Cari'autocomplete="off" autofocus/>
              <button type="submit" name="search" id="search" value="Submit">Cari</button>
            </div>
          </div>
        </form>
        <div id="tabel">
        <table class="responsive-table striped hover centered" id="names-table">
          <thead>
            <tr>
              <th>No.</th>
              <th>ID</th>
              <th>NIS</th>
              <th>Nama</th>
              <th>Kelas</th>
              <th>Telepon</th>
              <th>Saldo</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          <div class="none">
          <?php $a=1+$awaldata; ?>
            <?php while($result=mysqli_fetch_assoc($query)): ?>
            </div>
            <tr>
                <td><b><?php echo $a; ?></b></td>
                <td><a><?php echo $result['id']; ?></a></td>
                <td><a><?php echo $result['nis']; ?></a></td>
                <td><a><?php echo $result['first_name'].' '.$result['last_name']; ?></a></td>
                <td><a><?php echo $result['kelas']; ?></a></td>
                <td><a><?php echo $result['telepon']; ?></a></td>
                <td><a>Rp. <?php echo number_format($result['saldo'],0,'.','.'); ?></a></td>
                <td>
                <div class="btn-toolbar">
                  <a href="ubah_pelanggan.php?&id=<?php echo $result['id']; ?>">
                    <button class="blue" type="submit" value="UPDATE">
                    <font color=white>Update</font>
                    </button>
                  </a>
                  <a href="delete_user/delete_pelanggan.php?id=<?php echo $result['id']; ?>" onclick="return confirm('Yakin Hapus Data?')">
                    <button class="red" type="submit" name="submit" >
                    <font color=white>Delete</font>
                    </button>
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
    </div>
  </section>
  <center>
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
    <script src="../files/jquery.min.js"></script>
    <script src="../files/sweetalert2.all.min.js"></script>
    <script>
      $(document).ready(function(){ 
        <?php
        if(isset($_SESSION['sukses']))
        {
          echo "Swal.fire({
            type:'success',
            title:'Rubah data berhasil',
            timer:2000
          })";
          unset($_SESSION['sukses']);
        }
        ?>
      });
    </script>
  </body>
</html>