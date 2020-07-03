<?php
    require '../../konek.php';    
    $keywords=$_GET['keywords'];
    $jumlahdataperhalaman=6;
    $result=mysqli_query($conn, "SELECT *FROM user");
    $jumlahdata=mysqli_num_rows($result);
    $jumlahhalaman=ceil($jumlahdata/$jumlahdataperhalaman);
    $halamanaktif = (isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
    $awaldata=($jumlahdataperhalaman * $halamanaktif) - $jumlahdataperhalaman;
    $query=mysqli_query($conn, "SELECT *FROM user where id LIKE '%$keywords%' OR username LIKE '%$keywords%' OR level LIKE '%$keywords%' OR saldo LIKE '%$keywords%' ORDER BY id DESC LIMIT $awaldata, $jumlahdataperhalaman");
?>
<table class="responsive-table striped hover centered" id="names-table">
<thead>
<tr>
    <th>No.</th>
    <th>ID</th>
    <th>Username</th>
    <th>Level</th>
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
    <td><a><b><?php echo $a; ?></b></a></td>
    <td><a><?php echo $result['id']; ?></a></td>
    <td><a><?php echo $result['username']; ?></a></td>
    <td><a><?php echo $result['level']; ?></a></td>
    <td><a>Rp. <?php echo number_format($result['saldo'],0,'.','.'); ?></a></td>
    <td>
    <div class="btn-toolbar">
        <a href="ubah_penjual.php?id=<?php echo $result['id']; ?>">
        <button class="btn blue" type="submit">
        Update
        </button>
        </a>
    </div>
    </td>
</tr>
<?php $a++; ?>
<?php endwhile; ?>
</tbody>
</table>