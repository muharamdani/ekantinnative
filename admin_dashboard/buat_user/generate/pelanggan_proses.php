<?php
    session_start();
    require '../../../konek.php';
    require 'phpqrcode/qrlib.php';
    //simpan data di buat_user(pelanggan)
    $direktori = dirname(__FILE__).DIRECTORY_SEPARATOR.'update_nis'.DIRECTORY_SEPARATOR;
    $webdir='update_nis/';
    //versi2, simpan data di update_user
    //$direktori = dirname(__FILE__).DIRECTORY_SEPARATOR.'update_nis'.DIRECTORY_SEPARATOR;
    //$webdir='update_nis/';
    if (!file_exists($direktori))
    {
        mkdir($direktori);
    }
    
    $id=$_POST['id'];
    $nis=htmlspecialchars($_POST['nis']);
    $username=htmlspecialchars($_POST['username']);
    $password=mysqli_real_escape_string($conn, $_POST['password']);
    $first=htmlspecialchars($_POST['first_name']);
    $last=htmlspecialchars($_POST['last_name']);
    $kelas=htmlspecialchars($_POST['kelas']);
    $telepon=htmlspecialchars($_POST['telepon']);
    $fullname=$first.'_'.$last;
    $query=mysqli_query($conn, "SELECT *FROM pelanggan where nis='$nis' AND id!='$id'");
    $query2=mysqli_query($conn, "SELECT username FROM pelanggan where username='$username' AND id!='$id'");
    if(mysqli_fetch_assoc($query)>0)
    {
        $_SESSION['unvailablenis'] = true;
        header("Location:../../update_user/ubah_pelanggan.php?id=$id");
        return false;
    }
    else if(mysqli_fetch_assoc($query2)>0)
    {
        $_SESSION['unvailableuser'] = true;
        header("Location:../../update_user/ubah_pelanggan.php?id=$id");
        return false;
    }
    else if(isset($_POST['submit']))
    {
        if(strlen($password)<5)
	    {
	        $_SESSION['invalidpass'] = true;
            header("Location:../../update_user/ubah_pelanggan.php?id=$id");
	        return false;
	    }
        $filename = $webdir.$nis.'-'.$fullname.'.png';
        $direk = $nis.'-'.$fullname.'.png';
        QRcode::png($nis, $filename, QR_ECLEVEL_H, 10, 2);
        $password = password_hash($password, PASSWORD_DEFAULT);
        mysqli_query($conn, "UPDATE pelanggan SET nis='$nis',username='$username',password='$password',first_name='$first',last_name='$last',kelas='$kelas',telepon='$telepon', qrname='$filename' where id='$id'");
        mysqli_query($conn, "INSERT INTO log_update_user (id, up_penjual, up_pelanggan, first_name, last_name) values('',null,'$username','$first','$last')");
        $_SESSION['sukses'] = true;
        header("Location:../../update_user/rubah_pelanggan.php");
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