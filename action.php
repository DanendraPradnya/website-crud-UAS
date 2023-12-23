<?php
include 'koneksi.php';


if(isset($_POST["hapus"])){
    $delete = mysqli_query($mysqli,"DELETE FROM absensi");
    if(!$delete){
        echo "<script>alert('Gagal menghapus data !')</script>";
    }else{
        echo "<script>window.location.href = 'index.php'</script>";
    }
}

?>