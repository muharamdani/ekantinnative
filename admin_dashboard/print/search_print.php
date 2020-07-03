<?php
    require '../../konek.php';    
    $keywords=$_GET['keywords'];
    $jumlahdataperhalaman=5;
    $result=mysqli_query($conn, "SELECT *FROM pelanggan");
    $jumlahdata=mysqli_num_rows($result);
    $jumlahhalaman=ceil($jumlahdata/$jumlahdataperhalaman);
    $halamanaktif = (isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
    $awaldata=($jumlahdataperhalaman * $halamanaktif) - $jumlahdataperhalaman;
    $query=mysqli_query($conn, "SELECT *FROM pelanggan where id LIKE '%$keywords%' OR nis LIKE '%$keywords%' OR first_name LIKE '%$keywords%' OR last_name LIKE '%$keywords%' OR kelas LIKE '%$keywords%' OR telepon LIKE '%$keywords%' OR saldo LIKE '%$keywords%' ORDER BY id DESC LIMIT $awaldata, $jumlahdataperhalaman");
?>
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
    <a href="../buat_user/generate/print.php?id=<?php echo $result['id']; ?>" target="_blank">
        <button class="btn green" type="submit">
            Print
        </button>
        </a>
    </div>
    </td>
</tr>
<?php $a++; ?>
<?php endwhile; ?>
</tbody>
</table>