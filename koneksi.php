<?php 
$connect=mysqli_connect("localhost", "root", "", "bikedatabase");
    if(!$connect){
        echo "Koneksi Gagal";
        die;
    }
?>