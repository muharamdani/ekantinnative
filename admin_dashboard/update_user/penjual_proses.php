<?php
    session_start();
    require '../../konek.php';
    $id=$_POST['id'];
    $username=htmlspecialchars(strtolower($_POST['username']));
    $password=mysqli_real_escape_string($conn, $_POST['password']);
    $password2=mysqli_real_escape_string($conn, $_POST['password2']);
    $level=htmlspecialchars($_POST['level']);
    // $saldo=htmlspecialchars($_POST['saldo']);
    //chek apakah username sudah ada? Jika ada do this things.
    $use=mysqli_query($conn, "SELECT username from user where username='$username' AND id!='$id'");
    if(mysqli_fetch_assoc($use))
    {
        $_SESSION['unvailableuser'] = true;
        header("Location:ubah_penjual.php?id=$id");
        return false;
    }
    //Maksa ngadain if(sebenernya saya kurang suka pake isset button.
    //Ya namanya juga maksain ada kondisi).
    //Jika tombol ditekan, cek apakah password sesuai? Dst. ngerti lah
    if(isset($_POST['submit']))
    {
        if($password!==$password2 )
        {
            $_SESSION['unvailablepass'] = true;
            header("Location:ubah_penjual.php?id=$id");
        }
        else if(strlen($password)<5 && strlen($password2)<5)
	    {
	        $_SESSION['invalidpass'] = true;
            header("Location:ubah_penjual.php?id=$id");
	        return false;
	    }
        else if($level>2)
        {
            $_SESSION['level'] = true;
            header("Location:ubah_penjual.php?id=$id");
        }
        else
        {
            $password = password_hash($password, PASSWORD_DEFAULT);
            mysqli_query($conn, "UPDATE user SET username='$username',password='$password',level='$level' where id='$id'");
            mysqli_query($conn, "INSERT INTO log_update_user (id, up_penjual, up_pelanggan, first_name, last_name) values('','$username',null,null,null)");
            $_SESSION['sukses'] = true;
            header("Location:rubah_penjual.php");
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