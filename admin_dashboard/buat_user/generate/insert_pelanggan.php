<?php
    session_start();
    require '../../../konek.php';
    require 'phpqrcode/qrlib.php';
    $direktori = dirname(__FILE__).DIRECTORY_SEPARATOR.'nis'.DIRECTORY_SEPARATOR;
    $webdir='nis/';
    //cek apakah direktori tidak ada. Jika tidak ada, buat direktorinya.
    if (!file_exists($direktori))
    {
        mkdir($direktori);
    }
    $nis=htmlspecialchars($_POST['nis']);
    $first=htmlspecialchars($_POST['first_name']);
    $last=htmlspecialchars($_POST['last_name']);
    $username=htmlspecialchars($_POST['username']);
    $password=htmlspecialchars($_POST['password']);
    $kelas=htmlspecialchars($_POST['kelas']);
    $telepon=htmlspecialchars($_POST['telepon']);
    $saldo=htmlspecialchars($_POST['saldo']);
    $fullname=$first.'_'.$last;
    if(isset($_POST['kembali'])){
        header("location:../../index.php");
        return false;
    }
    $query=mysqli_query($conn, "SELECT nis FROM pelanggan where nis='$nis'");
    $query2=mysqli_query($conn, "SELECT username FROM pelanggan where username='$username'");
    if(mysqli_fetch_assoc($query)>0){
        $_SESSION['unvailablenis'] = true;
        header("Location:../buat_pelanggan.php");
        return false;
    }
    if(mysqli_fetch_assoc($query2)>0){
        $_SESSION['unvailableuser'] = true;
        header("Location:../buat_pelanggan.php");
        return false;
    }
    else if(isset($_POST['submit']))
    {
        if(strlen($password)<5){
            $_SESSION['invalidpass'] = true;
            header("Location:../buat_pelanggan.php");
            return false;
        }
        // $filename = $direktori.$nis.'-'.$fullname.'.png';
        $filename = $webdir.$nis.'-'.$fullname.'.png';
        $direk = $nis.'-'.$fullname.'.png';
        QRcode::png($nis, $filename, QR_ECLEVEL_H, 10, 2);
        $password = password_hash($password, PASSWORD_DEFAULT);
        mysqli_query($conn, "INSERT INTO pelanggan values('','$nis','$first','$last','$username','$password','$kelas','$telepon','$saldo','$filename')");
        $_SESSION['sukses'] = true;
        header("Location:../../index.php");
    }
    else
    {
        echo "
            <script>
                alert('Gagal menambahkan data');
                //document.location.href='../buat_pelanggan.php';
            </script>
        ";
    }
?>