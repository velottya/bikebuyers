<?php
include('./koneksi.php');
$connect = mysqli_connect("localhost", "root", "", "bikedatabase");

// hitung sum kombinasi_input yang memiliki kombinasi_inout tertentu
$sum000 = mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(kombinasi_input) FROM data_bayes WHERE kombinasi_input = '000'"))[0];
$sum001 = mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(kombinasi_input) FROM data_bayes WHERE kombinasi_input = '001'"))[0];
$sum010 = mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(kombinasi_input) FROM data_bayes WHERE kombinasi_input = '010'"))[0];
$sum011 = mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(kombinasi_input) FROM data_bayes WHERE kombinasi_input = '100'"))[0];
$sum100 = mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(kombinasi_input) FROM data_bayes WHERE kombinasi_input = '110'"))[0];
$sum101 = mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(kombinasi_input) FROM data_bayes WHERE kombinasi_input = '111'"))[0];
$sum110 = mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(kombinasi_input) FROM data_bayes WHERE kombinasi_input = '101'"))[0];
$sum111 = mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(kombinasi_input) FROM data_bayes WHERE kombinasi_input = '011'"))[0];

// hitung sum data dalam tabel data_bayes
$sum_total_data = mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(purchased_bike) FROM data_bayes"))[0];

// hitung jumlah purchased_bike yang bernilai 1 atau 0
$sum_output_1 = mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(purchased_bike) FROM data_bayes WHERE purchased_bike = 1"))[0];
$sum_output_0 = mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(purchased_bike) FROM data_bayes WHERE purchased_bike = 0"))[0];

mysqli_query($connect, "INSERT INTO sum_bayes (sum000, sum001, sum010, sum100, sum110, sum111, sum101, sum011, sum_data, sum_hasil0, sum_hasil1) 
VALUES ('$sum000', '$sum001', '$sum010', '$sum100', '$sum110', '$sum111', '$sum101', '$sum011', '$sum_total_data', '$sum_output_0', '$sum_output_1')");
?>

<!-- mysqli_query($connect, "INSERT INTO sum_bayes (sum000, sum001, sum010, sum100, sum110, sum111, sum101, sum011, sum_data, sum_hasil0, sum_hasil1)
 VALUES ('$sum000', '$sum001', '$sum010', '$sum100', '$sum110', '$sum111', '$sum101', '$sum011', '$sum_data_row', '$sum_hasil_0_row', '$sum_hasil_1_row')"); -->