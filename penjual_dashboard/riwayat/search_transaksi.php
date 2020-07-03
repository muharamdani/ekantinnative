<?php
    require '../../konek.php';    
    session_start();
    $username2=$_SESSION['username2'];
    $keywords=$_GET['keywords'];
    $jumlahdataperhalaman=6;
    $result=mysqli_query($conn, "SELECT *FROM transaksi where penjual='$username2'");
    $jumlahdata=mysqli_num_rows($result);
    $jumlahhalaman=ceil($jumlahdata/$jumlahdataperhalaman);
    $halamanaktif = (isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
    $awaldata=($jumlahdataperhalaman * $halamanaktif) - $jumlahdataperhalaman;
    $query=mysqli_query($conn, "SELECT *FROM transaksi where penjual='$username2' AND id LIKE '%$keywords%' OR nis LIKE '%$keywords%' OR first_name LIKE '%$keywords%' OR last_name LIKE '%$keywords%' OR penjual LIKE '%$keywords%' OR saldo LIKE '%$keywords%' OR waktu LIKE '%$keywords%' LIMIT $awaldata, $jumlahdataperhalaman");
?>
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
    <td><?php echo $result['id']; ?></td>
    <td><?php echo $result['nis']; ?></td>
    <td><?php echo $result['first_name'].' '.$result['last_name']; ?></td>
    <td><?php echo $result['penjual']; ?></td>
    <td><?php echo 'Rp. '.number_format($result['saldo'], 0,'.','.') ?></td>
    <td><?php echo $result['waktu']; ?></td>
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