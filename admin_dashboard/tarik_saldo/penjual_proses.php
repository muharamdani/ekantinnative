<?php
    session_start();
    require '../../konek.php';
    $id=$_POST['id'];
    $saldo=htmlspecialchars($_POST['saldo']);
    $query=mysqli_query($conn, "SELECT username from user where id='$id'");
    if(isset($_POST['submit']))
    {
        $result=mysqli_fetch_assoc($query);
        $username=$result['username'];
        if($saldo<2000)
        {
            $_SESSION['minsaldo'] = true;
            header("Location:ubah_penjual.php?id=$id");
            return false;
        }
        else if($saldo>=2000)
        {
            mysqli_query($conn, "INSERT INTO log_saldo(id, penjual, pelanggan, first_name, last_name, add_saldo) values('','$username',null,null,null,'-$saldo')");
            mysqli_query($conn, "UPDATE user set saldo=saldo-'$saldo' where id='$id'");
            $_SESSION['sukses'] = true;
            header("Location:rubah_penjual.php");
        }
    }
?>