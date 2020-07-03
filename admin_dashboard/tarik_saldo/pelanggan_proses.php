<?php
    function tambah_saldo()
    {
        require '../../konek.php';
        if(isset($_POST['submit']))
        {
            $id=$_POST['id'];
            $saldo=htmlspecialchars($_POST['saldo']);
            $query=mysqli_query($conn, "SELECT username, first_name, last_name from pelanggan where id='$id'");
            $result=mysqli_fetch_assoc($query);
            $username=$result['username'];
            $first=$result['first_name'];
            $last=$result['last_name'];
            if($saldo<2000)
            {
                $_SESSION['minsaldo'] = true;
                return false;
            }
            else if($saldo>=2000)
            {
                mysqli_query($conn, "INSERT INTO log_saldo(id, penjual, pelanggan, first_name, last_name, add_saldo) values('',null,'$username','$first','$last','-$saldo')");
                mysqli_query($conn, "UPDATE pelanggan set saldo=saldo-'$saldo' where id='$id'");
                $_SESSION['sukses'] = true;
                header("Location:rubah_pelanggan.php");
            }
        }
    }
?>