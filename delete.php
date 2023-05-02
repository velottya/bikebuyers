<?php
include('./membership.php');

if(isset($_POST['hapus'])){
    $nim = $_POST['nim'];
    $hapus = mysqli_query($connect, "DELETE FROM mahasiswa WHERE nim = $nim");

    if($hapus){
        echo "<script>
        alert('Data Berhasil Dihapus!');
        document.location='membership.php';
    </script>";
    }else {
        echo "<script>
        alert('Data Gagal Dihapus!');
        document.location='membership.php';
        </script>";
    }
}
?>