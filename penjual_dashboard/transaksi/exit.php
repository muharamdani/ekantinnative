<?php
    function logout()
    {
        if(isset($_POST['logout']))
        {
            header("location:../logout");
        }
    }

    function tunai()
    {
        if(isset($_POST['tunai']))
        {
            unset($_SESSION['nis']);
            unset($_SESSION['bayar']);
            unset($_SESSION['saldo']);
            unset($_SESSION['first_name']);
            unset($_SESSION['last_name']);
            header("location:index.php");
        }
    }

    function kembali()
    {
        if(isset($_POST['kembali']))
        {
            unset($_SESSION['nis']);
            unset($_SESSION['bayar']);
            unset($_SESSION['saldo']);
            unset($_SESSION['first_name']);
            unset($_SESSION['last_name']);
            header("location:index.php");
        }
    }

    function dashboard()
    {
        if(isset($_POST['kembali']))
        {
            unset($_SESSION['nis']);
            unset($_SESSION['bayar']);
            unset($_SESSION['saldo']);
            unset($_SESSION['first_name']);
            unset($_SESSION['last_name']);
            header("location:../penjual_dashboard");
        }
    }
?>