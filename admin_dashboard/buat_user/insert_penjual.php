<?php
    session_start();
    require '../../konek.php';
    $username=htmlspecialchars(strtolower(stripslashes($_POST['username'])));
    $password=mysqli_real_escape_string($conn, $_POST['password']);
    $password2=mysqli_real_escape_string($conn, $_POST['password2']);
    $level=htmlspecialchars($_POST['level']);
    $use=mysqli_query($conn, "SELECT username from user where username='$username'");
    if(mysqli_fetch_assoc($use))
    {
        $_SESSION['unvailable'] = true;
        header("Location:buat_penjual.php");
        return false;
    }
    if(isset($_POST['submit']))
    {
        if(strlen($password)<5 && strlen($password2)<5)
	    {
	        $_SESSION['invalidpass'] = true;
            header("Location:buat_penjual.php");
	        return false;
	    }
        else if($password!==$password2)
    	{
            $_SESSION['diff'] = true;
            header("Location:buat_penjual.php");
	        return false;
        }
        else if($level>2)
        {
            $_SESSION['level'] = true;
            header("Location:buat_penjual.php");
	        return false;
        }
        $password = password_hash($password, PASSWORD_DEFAULT);
        mysqli_query($conn, "INSERT INTO user (id, username, password, level) values ('','$username','$password','$level')");
        $_SESSION['sukses'] = true;
        header("Location:../index.php");
    }
?>