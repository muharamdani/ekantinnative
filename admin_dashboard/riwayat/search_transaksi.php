<?php
    require '../../konek.php';    
    $keywords=$_GET['keywords'];
    $jumlahdataperhalaman=6;
    $result=mysqli_query($conn, "SELECT *FROM transaksi");
    $jumlahdata=mysqli_num_rows($result);
    $jumlahhalaman=ceil($jumlahdata/$jumlahdataperhalaman);
    $halamanaktif = (isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
    $awaldata=($jumlahdataperhalaman * $halamanaktif) - $jumlahdataperhalaman;
    $query=mysqli_query($conn, "SELECT *FROM transaksi where id LIKE '%$keywords%' OR nis LIKE '%$keywords%' OR first_name LIKE '%$keywords%' OR last_name LIKE '%$keywords%' OR penjual LIKE '%$keywords%' OR waktu LIKE '%$keywords%' ORDER BY id DESC LIMIT $awaldata, $jumlahdataperhalaman");
?>
<table class="responsive-table striped hover centered" id="names-table">
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
    <td>
    <div class="btn-toolbar">
        </a>
    </div>
    </td>
</tr>
<?php endwhile; ?>
</tbody>
</table>