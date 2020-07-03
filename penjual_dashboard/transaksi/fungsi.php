<?php
    function hasil()
    {
        require '../../konek.php';
        if(!isset($_SESSION['nis']))
        {
            header("location:bayar.php");
            return false;
        }
        else
        {
            $sesisaldo=$_SESSION['saldo']; //saldo pelanggan
            $user=$_SESSION['username2']; //penjual
            $nis=$_SESSION['nis'];  //nis_pelanggan
            $bayar=$_SESSION['bayar'];  //total_pembayaran
            $fs=$_SESSION['first_name']; //fs pelanggan
            $ls=$_SESSION['last_name']; //ls pelanggan
            if($sesisaldo<$bayar)
            {
                unset($_SESSION['bayar']);
                unset($_SESSION['nis']);
                unset($_SESSION['saldo']);
                unset($_SESSION['first_name']);
                unset($_SESSION['last_name']);
                $_SESSION['gagal'] = true;
                header("Location:index.php");
                // echo "
                //     <script>
                //         alert('Transaksi Gagal, Saldo tidak mencukupi');
                //         document.location.href='index.php';
                //     </script>
                // ";
                return false;
            }
            else
            {
                $data=mysqli_query($conn, "SELECT username from pelanggan where nis='$nis'");
                $hasil=mysqli_fetch_assoc($data);
                $userpelanggan=$hasil['username'];
                mysqli_query($conn, "INSERT INTO transaksi (nis, username, first_name, last_name, penjual, saldo) values('$nis','$userpelanggan','$fs','$ls','$user','$bayar')");
                mysqli_query($conn, "UPDATE pelanggan set saldo=$sesisaldo-$bayar where nis=$nis");
                mysqli_query($conn, "UPDATE user set saldo=saldo+$bayar where username='$user'");
                echo "<center>";
                echo "<h4>Transaksi berhasil</h4>";
                echo "Total yang harus anda bayar: ";
                echo $bayar;
                echo "<br>";
                echo "Saldo anda: ";
                echo $sesisaldo;
                echo "<br>";
                echo "Sisa saldo anda adalah: ";
                echo $sesisaldo-$bayar;
                echo "<br>";
                echo "<br>";
                echo "<h4>Terima Kasih $fs $ls</h4>";
                echo "</center>";
                unset($_SESSION['nis']);
                unset($_SESSION['saldo']);
                unset($_SESSION['bayar']);
                unset($_SESSION['first_name']);
                unset($_SESSION['last_name']);
            }
        }
    }
    function sendnis()
    {
        require '../../konek.php';
        if(isset($_POST['sendnis']))
        {
            $nis=$_POST['nis']; //ambil data nis
            $query=mysqli_query($conn, "SELECT *FROM pelanggan where nis='$nis'");
            $result=mysqli_fetch_assoc($query);
            if($result>0)
            {
                $_SESSION['nis']=$nis; //menjadikan nis var sesi
                $_SESSION['saldo']=$result['saldo'];  //ambil data saldo pelanggan
                $sesisaldo=$_SESSION['saldo'];
                $_SESSION['first_name']=$result['first_name']; //ambil data fs pelanggan
                $_SESSION['last_name']=$result['last_name']; //ambil data ls pelanggan
                $_SESSION['sukses'] = true;
                header("location:berhasil.php");
                return false;
            }
            if($nis==null)
            {
                echo '<br>';
                echo "<center><font color=red>Isi nis terlebih dahulu</font></center>";
            }
            else if($nis!==$result['nis'])
            {   echo '<br>';
                echo "<center><font color=red>NIS tidak terdaftar</font></center>";
            }
        }
    }
    
    function bayar()
    {
        require '../../konek.php';
        //$sesisaldo=$_SESSION['saldo']; //saldo pelanggan
        if(isset($_POST['sendbayar']))
        {
            $bayar=$_POST['bayar'];
            if($bayar<0)
            {
                $_SESSION['kokminus'] = true;
                // echo "
                //     <script>
                //         alert('Pembayaran KOK MINUS uangnya.');
                //     </script>
                // ";
                //echo mysqli_error($conn);
            }
            else if($bayar==0)
            {
                $_SESSION['kokkosong'] = true;
                // echo "
                //     <script>
                //         alert('Tidak boleh kosong.');
                //     </script>
                // ";
                // echo mysqli_error($conn);
            }
            else
            {
                $_SESSION['bayar']=$_POST['bayar'];
                header("location:bayar.php");
            }
        }
    }
?>