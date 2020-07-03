<?php
session_start();
require '../konek.php';
$username = $_POST['username'];
$password = $_POST['password'];
$query=mysqli_query($conn, "SELECT *from user where username='$username'");
$query2=mysqli_query($conn, "SELECT *from pelanggan where username='$username'");
if(mysqli_num_rows($query)===1)
{
    $result=mysqli_fetch_assoc($query);
    $level=$result['level'];
    if($level==1)
    {
        if(password_verify($password, $result['password']))
        {
            $_SESSION['login1']=true;
            $_SESSION['username1']=$result['username'];
            header("location:../admin_dashboard");
            return false;
        }
        else
        {
            echo
            "
                <script>
                    alert('Password salah');
                    document.location.href='index.php';
                </script>
            ";
        }
    }
    else
    {
        if(password_verify($password, $result['password']))
        {
            $_SESSION['login2']=true;
            $_SESSION['username2']=$result['username'];
            header("location:../penjual_dashboard");
            return false;
        }
        else
        {
            echo
            "
                <script>
                    alert('Password salah');
                    document.location.href='index.php';
                </script>
            ";
        }
    }
}
if(mysqli_num_rows($query2)===1)
{
    $result2=mysqli_fetch_assoc($query2);
    if(password_verify($password, $result2['password']))
    {
        $_SESSION['login3']=true;
        $_SESSION['username3']=$result2['username'];
        header("location:../pelanggan_dashboard");
        return false;
    }
    else
    {
        echo
        "
            <script>
                alert('Password salah');
                document.location.href='index.php';
            </script>
        ";
    }
}
else
{
    echo
        "
            <script>
                alert('Username/password salah');
                document.location.href='index.php';
            </script>
        ";
}
?>  