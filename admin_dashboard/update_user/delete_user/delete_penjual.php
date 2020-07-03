<?php
    require '../../../konek.php';
    $id=$_GET['id'];
    $query2=mysqli_query($conn, "SELECT username from user where id='$id'");
    if($query2)
    {
        $result=mysqli_fetch_assoc($query2);
        $username=$result['username'];
        echo "
            <script>
                //alert('Berhasil menghapus data');
                document.location.href='../rubah_penjual.php';
            </script>
        ";
        mysqli_query($conn, "INSERT INTO log_delete_user(id, del_penjual, del_pelanggan, first_name, last_name) values('','$username',null,null,null)");
        $query=mysqli_query($conn, "DELETE from user where id='$id'");
    }
    else
    {
        echo "
            <script>
                alert('Gagal menghapus data');
                document.location.href='index.php';
            </script>
        ";
    }
?>