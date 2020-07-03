<?php
    session_start();
    require '../../konek.php';
    $nama = $_SESSION['username3'];
    $username=htmlspecialchars($_POST['username']);
    $password=mysqli_real_escape_string($conn, $_POST['password']);
    $first=htmlspecialchars($_POST['first_name']);
    $last=htmlspecialchars($_POST['last_name']);
    $telepon=htmlspecialchars($_POST['telepon']);
    $fullname=$first.'_'.$last;
    $query=mysqli_query($conn, "SELECT username FROM pelanggan where username='$username' AND username!='$nama'");
    if(mysqli_fetch_assoc($query)>0)
    {
        $_SESSION['unvailableuser'] = true;
        header("Location:ubah_pelanggan.php");
        return false;
    }
    else if(isset($_POST['submit']))
    {
        if(strlen($password)<5){
            $_SESSION['invalidpass'] = true;
            header("Location:ubah_pelanggan.php");
            return false;
        }
        $password = password_hash($password, PASSWORD_DEFAULT);
        mysqli_query($conn, "UPDATE pelanggan SET username='$username',password='$password',first_name='$first',last_name='$last',telepon='$telepon' where username='$nama'");
        mysqli_query($conn, "UPDATE transaksi SET username='$username',first_name='$first',last_name='$last' where username='$nama'");
        mysqli_query($conn, "UPDATE log_saldo SET pelanggan='$username',first_name='$first',last_name='$last' where pelanggan='$nama'");
        mysqli_query($conn, "INSERT INTO log_update_user (id, up_penjual, up_pelanggan, first_name, last_name) values('',null,'$username','$first','$last')");
        echo "
            <script>
                alert('Berhasil merubah data');
                document.location.href='../index.php';
            </script>
            ";
            unset($_SESSION['login3']);
            unset($_SESSION['username3']);
    }
    else
    {
        echo "
            <script>
                alert('Gagal merubah data');
                document.location.href='../rubah_pelanggan.php';
            </script>
        ";
    }
?>