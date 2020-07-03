<?php
  require '../../konek.php';
  session_start();
  if(!isset($_SESSION['username2']))
  {
    header("location:../../login");
  }
  $username2=$_SESSION['username2'];
  $result=mysqli_query($conn, "SELECT *FROM transaksi where penjual='$username2'");
  $query=mysqli_query($conn, "SELECT id,nis,concat(first_name,' ',last_name) as 'nama', penjual, saldo, waktu FROM transaksi where penjual='$username2'");
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
    <title>Print</title>
  </head>
  <body>
      <table border="1" cellspacing=0 cellpadding=10 align="center">
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
            <td><?php echo $result['nama'] ?></td>
            <td><?php echo $result['penjual'] ?></td>
            <td><?php echo 'Rp. '.number_format($result['saldo'], 0,'.','.') ?></td>
            <td><?php echo $result['waktu'] ?></td>
            </td>
          </tr>
          <?php $a++; ?>
          <?php endwhile; ?>
        </tbody>
      </table>
  </body>
  <script>
    window.print();
  </script>
</html>