<?php
	session_start();
	if(!isset($_SESSION['login1']))
	{
		header("location:../../../login");
	}
    require 'konek.php';
    $id=$_GET['id'];
    $query=mysqli_query($conn, "SELECT *FROM pelanggan WHERE id='$id'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="script/print.css"> 
	<script src="script/print.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PRINT</title>
</head>
<body>
    <table border=1 height=230px width=410px cellspacing=0>
    <?php while($result=mysqli_fetch_assoc($query)): ?>
        <tr>
            <th bgcolor=#337ab7 colspan=2>Kartu Pelanggan</th>
        </tr>
        <tr>
            <td width=380>
                <table width=272 border=0 cellspacing=0>
                    <tr>
                        <td style="font-size:20px; padding-left:10px">NIS &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $result['nis'] ?></td>
                    </tr>
                    <tr>
                        <td style="font-size:20px; padding-left:10px">Nama &nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $result['first_name'].' '.$result['last_name']; ?></td>
                    </tr>
                    <tr>
                        <td style="font-size:20px; padding-left:10px;">Kelas &nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $result['kelas'] ?></td>
                    </tr>
                    <tr>
                        <td style="font-size:20px; padding-left:10px">Telepon &nbsp;: <?php echo $result['telepon'] ?></td>
                    </tr>
                </table>
            <td>
                <img style="padding-left:15px; padding-right:15px;" width=110px height=110px src="<?php echo $result['qrname']; ?>"></td>
            </tr>
        <tr>
            <th align=center colspan=2 style="color:red;">*Kartu jangan sampai hilang</th>
        </tr>
        <?php endwhile; ?>
    </table>
    <button type=submit class=print name=print onclick=printWindow();>PRINT Kartu</button>
</body>
</html>
