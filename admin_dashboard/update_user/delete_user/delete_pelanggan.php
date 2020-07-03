<?php
    require '../../../konek.php';
    $id=$_GET['id'];
    $query2=mysqli_query($conn, "SELECT username, first_name, last_name from pelanggan where id='$id'");
    if($query2)
    {
        $result=mysqli_fetch_assoc($query2);
        $username=$result['username'];
        $first=$result['first_name'];
        $last=$result['last_name'];
        echo "
            <script>
                //alert('Berhasil menghapus data');
                document.location.href='../rubah_pelanggan.php';
            </script>
        ";
        mysqli_query($conn, "INSERT INTO log_delete_user(id, del_penjual, del_pelanggan, first_name, last_name) values('',null,'$username','$first','$last')");
        $query=mysqli_query($conn, "DELETE from pelanggan where id=$id");
    }
    else
    {
        echo "
            <script>
                alert('Gagal menghapus data');
                //document.location.href='index.php';
            </script>
        ";
    }
?>