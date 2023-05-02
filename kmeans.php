<?php 
include('./koneksi.php');

if(isset($_POST['save'])){
    $income = $_POST['income'];
    $commue_distance = $_POST['commue_distance'];
    $age = $_POST['age'];

    $save = mysqli_query($connect, "INSERT INTO cluster (income,commute_distance,age)
    VALUES ('$_POST[income]',
            '$_POST[commute_distance]',
            '$_POST[age]')
            ");

    if($save){
        echo "<script>
                alert('Simpan Sukses!');
                document.location='kmeans.php';
                </script>";
    } else {
        echo "<script>
                alert('Simpan Gagal!');
                document.location='kmeans.php';
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
    <title>Bike Buyers</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,700;1,600&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/react-dom/18.2.0/umd/react-dom.production.min.js" 
            integrity="sha512-pAsRTl9rmH5O5qdLMlVnkjl+Y1HiB11CAm7A00tBO3R0tiJKabau78ylMf2izyej6osN490WwB1I/WQ4bMzz/Q==" 
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

</head>
<body>
<style>
  *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    scroll-behavior: smooth;
    font-family: 'Jost', sans-serif;
    list-style: none
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
    font-size: 15px;
    font-family: monospace;
    text-transform: capitalize;
    padding: 10px 20px;
    font-weight: 400;
    transition: all .42s ease;
    text-decoration: none;
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
    height: 100vh;
    background-color: pink;
    background-position: center;
    background-size: cover;
}
.main-text h5{
    color: #9C254D;
    font-size: 18px;
    text-transform: capitalize;
    font-weight: 500;
}
.main-text h1{
    color: black;
    font-size: 65px;
    text-transform: capitalize;
    line-height: 1.1;
    font-weight: 600;
    margin: 6px 0 10px;
}
.main-text p{
    color: #333c56;
    font-size: 20px;
    font-style: italic;
    margin-bottom: 20px;
}
.main-btn{
    display: inline-block;
    color: #111;
    font-size: 16px;
    font-weight: 500;
    text-transform: capitalize;
    border: 2px solid #111;
    border-radius: 25px;
    padding: 12px 25px;
    transition: all .42s ease;
}
.main-btn:hover{
    background-color: black;
    color: #FF9494;
}
.main-btn i{
    vertical-align: middle;
}
.down-arrow{
    position: absolute;
    top: 85%;
    right: 11%;
}
.down i{
    font-size: 30px;
    color: #2c2c2c;
    border: 2px solid #2c2c2c;
    border-radius: 50px;
    padding: 12px 12px;
}
.down i:hover{
    background-color: #2c2c2c;
    color: #FF9494;
    transition: all .42s ease;
}
header.sticky{
    background: #fff;
    padding: 20px 10%;
    box-shadow: 0px 0px 10px rgb(0 0 0 / 10%);
}

/* trending-css */
.center-text h2{
    color: #111;
    font-size: 28px;
    text-transform: capitalize;
    text-align: center;
    margin-bottom: 30px;
}
.center-text span{
    color: #9C254D;
}
.products{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, auto));
    gap: 2rem;
}
.row{
    position: relative;
    transition: all .40s;
}
.row img{
    width: 100%;
    height: auto;
    transition: all .40s;
}
.row img:hover{
    transform: scale(0.9);
}
.products-text h5{
    position: absolute;
    top: 13px;
    left: 13px;
    color: #fff;
    font-size: 12px;
    font-weight: 500;
    text-transform: uppercase;
    background-color: aquamarine;
    padding: 3px 10px;
    border-radius: 2px;
}
.heart-icon{
    position: absolute;
    right: 0;
    font-size: 20px;
}
.heart-icon:hover{
    color: red;
}
.rating i{
    color: rgb(181, 129, 33);
    font-size: 18px;
}
.price h4{
    color: #111;
    font-size: 16px;
    text-transform: capitalize;
    font-weight: 400;
}
.price p{
    color: #151515;
    font-size: 14px;
    font-weight: 600;
}

/* owner */
.owner-tatya{
    background-color: #cfb6ac;
}
.owner{
    text-align: center;
}
.owner h3{
    color: #111;
    font-size: 25px;
    text-transform: capitalize;
    text-align: center;
    font-weight: 700;
}
.owner img{
    width: 100px;
    height: auto;
    border-radius: 50%;
    margin: 10px 0;
}
.owner p{
    color: #707070;
    font-size: 16px;
    font-weight: 400;
    line-height: 25px;
    margin-bottom: 10px;
}
.owner h2{
    font-size: 22px;
    color: #000;
    font-weight: 400;
    text-transform: capitalize;
    margin-bottom: 2px;
}
.form1{
    font-family: monospace;
    text-align: left;
    margin-top: 60px;
}
.form2{
    font-family: monospace;
    text-align: left;
    margin-bottom: 3px;
    margin-top: 3px;
}
.button2{
    margin-top: 15px;
}
.end-text{
    background-color: #cfb6ac;
    text-align: center;
    padding: 20px;
}
.end-text p{
    color: #000;
    text-transform: capitalize;
}
.logo2 img{
    margin-top: 90px;
    width: 160px;
    height: auto;
    align-items: center;
}
.contact2 p{
    align-items: center;
    color: #000;
    font-size: small;
}
.social i{
    color: #000;
    font-size: 20px;
    transition: all .42s;
}
.social i:hover{
    transform: scale(1.3);
}

/* responsive */
@media(max-width:890px){
    header{
        padding: 20px 3%;
        transition: .4s;
    }
}
@media(max-width:630px){
    .main-text h1{
        font-size: 50px;
        transition: .4s;
    }
    .main-text p{
        font-size: 18px;
        transition: .4s;
    }
    .main-btn{
        padding: 10px 20px;
        transition: .4s;
    }
}

@media(max-width:750px){
    .navmenu{
        position: absolute;
        top: 100%;
        right: -100%;
        width: 300px;
        height: 130vh;
        background: white;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 120px 30px;
        transition: all .42s;
    }
    .navmenu a{
        display: block;
        margin: 18px 0;
    }
    .navmenu.open{
        right: 0;
    }
}

.card{
    font-family: monospace;
}
.card-header{
    background-color: #f7b0b0;
}
</style>
    <header>
        <a href="#" class="logo"><img src="bike.png" alt=""></a>
       
        <ul class="navmenu">
            <li><a href="home.php"><b>Home</b></a></li>
            <li><a href="kmeans.php"><b>K-Means dan Naive Bayes</b></a></li>
            <li><a href="matrix.php"><b>Confusion Matrix</b></a></li>
        </ul>
        <div class="nav-icon">
            <a href="#"><i class='bx bx-search' class='bx bx-cart'></i></a>
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>
    </header>

    <section class="main-home">
    <div class="container">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <form action="looping.php" method="get">
        <div class="card">
        <div class="card-header text-center"> <b> K-Means Bike Buyers </b></div>
        <div class="card-body">
            <label>Income</label>
            <input type="text" class="form-control" name="income" id="income" placeholder="Masukkan Income">
            <label>Commute Distance</label>
            <input type="text" class="form-control" name="commute_distance" id="commute_distance"ce placeholder="Masukkan Commute Distance">
            <label>Age</label>
            <input type="text" class="form-control" name="age" id="age" placeholder="Masukkan Age">
            <label>Purchased Bike (0/1)</label>
            <input type="text" class="form-control" name="purchased bike" id="purchased bike" placeholder="Masukkan Purchased Bike">
            <div class="pt-3">
                <div class="col">
            <button class="btn btn-success" type="submit" value="Submit" name="save">Simpan</button>
            <button class="btn btn-danger" type="reset">Hapus</button>
            </div>
         </div>
      </div>
      </div>
      </form>
    </div>
    <script>
        const header = document.querySelector("header");
        window.addEventListener ("scroll", function(){
            header.classList.toggle ("sticky", this.window.scrollY > 0);
        })
        let menu = document.querySelector('#menu-icon');
        let navmenu = document.querySelector('.navmenu');
        menu.onclick = () => {
            menu.classList.toggle('bx-x');
            navmenu.classList.toggle('open');
        }
    </script>
</body>
</html>

<?php 
