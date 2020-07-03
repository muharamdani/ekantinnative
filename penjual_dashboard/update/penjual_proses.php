<?php
    session_start();
    require '../../konek.php';
    $nama = $_SESSION['username2'];
    $username=htmlspecialchars(strtolower($_POST['username']));
    $password=mysqli_real_escape_string($conn, $_POST['password']);
    $password2=mysqli_real_escape_string($conn, $_POST['password2']);
    $level=htmlspecialchars($_POST['level']);
    //chek apakah username sudah ada? Jika ada do this things.
    $use=mysqli_query($conn, "SELECT username from user where username='$username' AND username !='$nama'");
    if(mysqli_fetch_assoc($use))
    {
        $_SESSION['unvailableuser'] = true;
        header("Location:index.php");
        return false;
    }
    if(isset($_POST['submit']))
    {
        if($password!==$password2 )
        {
            $_SESSION['unvailablepass'] = true;
            header("Location:index.php");
            return false;
        }
        else if(strlen($password)<5 && strlen($password2)<5)
	    {
            $_SESSION['invalidpass'] = true;
            header("Location:index.php");
	        return false;
	    }
        else if($level>2)
        {
            $_SESSION['level'] = true;
            header("Location:index.php");
            return false;
        }
        else
        {
            $password = password_hash($password, PASSWORD_DEFAULT);
            mysqli_query($conn, "UPDATE user SET username='$username',password='$password',level='$level' where username='$nama'");
            mysqli_query($conn, "UPDATE transaksi SET penjual='$username' where penjual='$nama'");
            mysqli_query($conn, "UPDATE log_saldo SET penjual='$username' where penjual='$nama'");
            mysqli_query($conn, "INSERT INTO log_update_user (id, up_penjual, up_pelanggan, first_name, last_name) values('','$username',null,null,null)");
            // $_SESSION['sukses'] = true;
            // header("Location:../index.php");
            echo "
            <script>
                alert('Berhasil merubah data');
                document.location.href='../index.php';
            </script>
            ";
            unset($_SESSION['login2']);
            unset($_SESSION['username2']);
        }
    }

    else
    {
        echo "
            <script>
                alert('Gagal merubah data');
            </script>
        ";
    }
?>