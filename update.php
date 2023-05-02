<?php 
include('./koneksi.php');

$tampil = mysqli_query($connect, "SELECT * FROM mahasiswa WHERE id = '$_GET[id]'");
$data = mysqli_fetch_assoc($tampil);
if($data){
    $nim = $data['nim'];
    $nama = $data['nama'];
    $alamat = $data['alamat'];
    $prodi = $data['prodi'];
}
if(isset($_POST['save'])){
    $save = mysqli_query($connect, "UPDATE mahasiswa SET
    nim ='$_POST[nim]',
    nama ='$_POST[nama]',
    alamat ='$_POST[alamat]',
    prodi ='$_POST[prodi]'
    WHERE id = '$_GET[id]'
    ");
if($save){
    echo "<script>
    alert('Update Sukses!');
    document.location='membership.php';
    </script>";
}else {
    echo "<script>
    alert('Update Gagal!');
    document.location='membership.php';
    </script>";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <title>Membership</title>
</head>
<style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    scroll-behavior: smooth;
    font-family: monospace;
    font-size: 15px;
    list-style: none
}
.card{
    font-family: monospace;
}
.card-header{
    background-color: #f7b0b0;
}
header{
    position: fixed;
    width: 100%;
    top: 0;
    right: 0;
    z-index: 1000;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px 10%;
}
.logo img{
    max-width: 120px;
    height: auto;
}
.navmenu{
    display: flex;
}
.navmenu a{
    color: #2c2c2c;
    font-size: 16px;
    font-family: monospace;
    text-transform: capitalize;
    padding: 10px 20px;
    font-weight: 400;
    transition: all .42s ease;
}
.navmenu a:hover{
    color: #FF9494;
}
.nav-icon{
    display: flex;
    align-items: center;
}
.nav-icon i{
    margin-right: 20px;
    color: #2c2c2c;
    font-size: 25px;
    font-weight: 400;
    transition: all .42s ease;
}
.nav-icon i:hover{
    transform: scale(1.1);
    color: #FF9494;
}
#menu-icon{
    font-size: 35px;
    color: #2c2c2c;
    z-index: 10001;
    cursor: pointer;
}
section{
    padding: 5% 10%;
}
.main-home{
    width: 100%;
    height: 100vh;
    background-image: url(2.jpeg);
    background-position: center;
    background-size: cover;
    display: grid;
    grid-template-columns: repeat(1, 1fr);
    align-items: center;
}
</style>
<body>
        <header>
        <a href="#" class="logo"><img src="ichigofoto.png" alt=""></a>
       
        <ul class="navmenu">
            <li><a href="tampilan.php">Home</a></li>
            <li><a href="">Products</a></li>
            <li><a href="membership.php">Membership</a></li>
            <li><a href="">About</a></li>
        </ul>
        <div class="nav-icon">
            <a href="#"><i class='bx bx-search' class='bx bx-cart'></i></a>
            <a href="#"><i class='bx bx-cart'></i></a>
            <a href="logout.php"><i class='bx bx-log-out'></i></a>

            <div class="bx bx-menu" id="menu-icon"></div>
        </div>
    </header>
    <section class="main-home">
    <div class="container">
        <br>
        <form action="" method="post">
        <div class="card">
        <div class="card-header text-center"> <b> Input Data Mahasiswa </b></div>
        <div class="card-body">
            <label for="nim">NIM</label>
            <input type="text" class="form-control" name="nim" placeholder="Masukkan NIM" value="<?= $nim ?>" required>
            <label for="nama">Nama</label>
            <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" value="<?= $nama ?>" required>
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat" value="<?= $alamat ?>" required>
            <label for="prodi">Prodi</label>
            <select type="text" class="form-control" name="prodi" value="<?= $prodi ?>" required>
                <option value="">Select Prodi</option>
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Teknik Elektro">Teknik Elektro</option>
                <option value="Teknik Mesin">Teknik Mesin</option>
                <option value="Teknik Sipil">Teknik Sipil</option>
            </select>
            <div class="pt-3">
                <div class="col">
            <button class="btn btn-success" type="submit" value="Submit" name="save">Simpan</button>
            <a href="./membership.php" class="btn btn-danger">Kembali</a>
            </div>
         </div>
      </div>
      </div>
      </form>
    </div>
