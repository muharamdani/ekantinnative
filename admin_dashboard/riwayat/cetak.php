<?php
  require '../../konek.php';
  session_start();
  if(!isset($_SESSION['login1']))
  {
    header("location:../../login");
  }
  $result=mysqli_query($conn, "SELECT *FROM transaksi");
  $query=mysqli_query($conn, "SELECT id,nis, first_name, last_name, penjual, saldo, waktu FROM transaksi");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Riwayat Transaksi</title>    
</head>
<body>
    <table border="1" cellspacing=0 cellpadding=20 align=center>
    <thead>
        <tr>
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
        <?php while($result=mysqli_fetch_assoc($query)): ?>
        </div>
        <tr>
        <td><?php echo $result['id']; ?></td>
        <td><?php echo $result['nis']; ?></td>
        <td><?php echo $result['first_name'].' '.$result['last_name']; ?></td>
        <td><?php echo $result['penjual']; ?></td>
        <td>Rp. <?php echo number_format($result['saldo'],0,'.','.'); ?></td>
        <td><?php echo $result['waktu']; ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
    </table>
</body>
<script>
    window.print();
</script>
</html>