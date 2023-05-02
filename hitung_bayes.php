<?php
include('./total_bayes.php');
// Establish database connection
$connect = mysqli_connect("localhost", "root", "", "bikedatabase");
if (!$connect) {
    echo "Koneksi Gagal";
    die;
}

// Calculate the number of data points in each class
$sum000 = mysqli_query($connect, "SELECT COUNT(*) as count FROM data_bayes WHERE kombinasi_input = 000");
$sum000_row = mysqli_fetch_array($sum000) [0];

$sum001 = mysqli_query($connect, "SELECT COUNT(*) as count FROM data_bayes WHERE kombinasi_input = 001");
$sum001 = mysqli_fetch_array($sum001) [0];

$sum010 = mysqli_query($connect, "SELECT COUNT(*) as count FROM data_bayes WHERE kombinasi_input = 010");
$sum010 = mysqli_fetch_array($sum010) [0];

$sum100 = mysqli_query($connect, "SELECT COUNT(*) as count FROM data_bayes WHERE kombinasi_input = 100");
$sum100 = mysqli_fetch_array($sum100) [0];

$sum110 = mysqli_query($connect, "SELECT COUNT(*) as count FROM data_bayes WHERE kombinasi_input = 110");
$sum110 = mysqli_fetch_array($sum110) [0];

$sum111 = mysqli_query($connect, "SELECT COUNT(*) as count FROM data_bayes WHERE kombinasi_input = 111");
$sum111 = mysqli_fetch_array($sum111) [0];

$sum101 = mysqli_query($connect, "SELECT COUNT(*) as count FROM data_bayes WHERE kombinasi_input = 101");
$sum101 = mysqli_fetch_array($sum101) [0];

$sum011 = mysqli_query($connect, "SELECT COUNT(*) as count FROM data_bayes WHERE kombinasi_input = 011");
$sum011 = mysqli_fetch_array($sum011) [0];

$sum_data = mysqli_query($connect, "SELECT COUNT(purchased_bike) FROM data_bayes");
$sum_data_row = mysqli_fetch_array($sum_data)[0];

$sum_hasil_0 = mysqli_query($connect, "SELECT COUNT(purchased_bike) FROM data_bayes WHERE purchased_bike = 0");
$sum_hasil_1_row = mysqli_fetch_array($sum_hasil_0)[0];

$sum_hasil_1 = mysqli_query($connect, "SELECT COUNT(purchased_bike) FROM data_bayes WHERE purchased_bike = 1");
$sum_hasil_0_row = mysqli_fetch_array($sum_hasil_1)[0];

$income = isset($_GET['income']) ? (int)$_GET['income'] : null;
$commute_distance = isset($_GET['commute_distance']) ? (float)$_GET['commute_distance'] : null;
$age = isset($_GET['age']) ? (int)$_GET['age'] : null;

if ($income < 6000) {
$income_out = 0;
} else {
$income_out = 1;
}
if ($commute_distance < 6) {
$commute_out = 0;
} else {
$commute_out = 1;
}
if ($age < 43) {
$age_out = 0;
} else {
$age_out = 1;
}
$kombinasi_input = $income_out . $commute_out . $age_out;

if ($kombinasi_input == "000") {
    $pA = $sum000_row / $sum_data_row;
    $query_b0 = mysqli_query($connect, "SELECT COUNT(input_output) FROM data_bayes WHERE input_output = '0000'");
    $pB1 = (int) mysqli_fetch_row($query_b0)[0] / $sum_hasil_0_row;
    $query_b1 = mysqli_query($connect, "SELECT COUNT(input_output) FROM data_bayes WHERE input_output = '1000'");
    $pB0 = (int) mysqli_fetch_row($query_b1)[0] / $sum_hasil_1_row;
    $pengali = $pA * $pB1;
    $pembagi = $pA * $pB0;
    $hasil = $pengali / ($pengali + $pembagi);
}elseif ($kombinasi_input == "001") {
    $pA = $sum000_row / $sum_data_row;
    $query_b0 = mysqli_query($connect, "SELECT COUNT(input_output) FROM data_bayes WHERE input_output = '0001'");
    $pB1 = (int) mysqli_fetch_row($query_b0)[0] / $sum_hasil_0_row;
    $query_b1 = mysqli_query($connect, "SELECT COUNT(input_output) FROM data_bayes WHERE input_output = '1001'");
    $pB0 = (int) mysqli_fetch_row($query_b1)[0] / $sum_hasil_1_row;
    $pengali = $pA * $pB1;
    $pembagi = $pA * $pB0;
    $hasil = $pengali / ($pengali + $pembagi);
}elseif ($kombinasi_input == "010") {
    $pA = $sum000_row / $sum_data_row;
    $query_b0 = mysqli_query($connect, "SELECT COUNT(input_output) FROM data_bayes WHERE input_output = '0010'");
    $pB1 = (int) mysqli_fetch_row($query_b0)[0] / $sum_hasil_0_row;
    $query_b1 = mysqli_query($connect, "SELECT COUNT(input_output) FROM data_bayes WHERE input_output = '1010'");
    $pB0 = (int) mysqli_fetch_row($query_b1)[0] / $sum_hasil_1_row;
    $pengali = $pA * $pB1;
    $pembagi = $pA * $pB0;
    $hasil = $pengali / ($pengali + $pembagi);
}elseif ($kombinasi_input == "011") {
    $pA = $sum000_row / $sum_data_row;
    $query_b0 = mysqli_query($connect, "SELECT COUNT(input_output) FROM data_bayes WHERE input_output = '0100'");
    $pB1 = (int) mysqli_fetch_row($query_b0)[0] / $sum_hasil_0_row;
    $query_b1 = mysqli_query($connect, "SELECT COUNT(input_output) FROM data_bayes WHERE input_output = '1100'");
    $pB0 = (int) mysqli_fetch_row($query_b1)[0] / $sum_hasil_1_row;
    $pengali = $pA * $pB1;
    $pembagi = $pA * $pB0;
    // if ($pembagi != 0) {
    //     $hasil = $pengali / ($pengali + $pembagi);
    //   } else {
    //     // Tindakan jika pembagi bernilai 0, misalnya memberikan nilai default pada $hasil
    //     $hasil = 0;
    //   }
    // $hasil = $pengali / ($pengali + $pembagi);
}elseif ($kombinasi_input == "100") {
    $pA = $sum000_row / $sum_data_row;
    $query_b0 = mysqli_query($connect, "SELECT COUNT(input_output) FROM data_bayes WHERE input_output = '0110'");
    $pB1 = (int) mysqli_fetch_row($query_b0)[0] / $sum_hasil_0_row;
    $query_b1 = mysqli_query($connect, "SELECT COUNT(input_output) FROM data_bayes WHERE input_output = '1110'");
    $pB0 = (int) mysqli_fetch_row($query_b1)[0] / $sum_hasil_1_row;
    $pengali = $pA * $pB1;
    $pembagi = $pA * $pB0;
    $hasil = $pengali / ($pengali + $pembagi);
}elseif ($kombinasi_input == "101") {
    $pA = $sum000_row / $sum_data_row;
    $query_b0 = mysqli_query($connect, "SELECT COUNT(input_output) FROM data_bayes WHERE input_output = '0111'");
    $pB1 = (int) mysqli_fetch_row($query_b0)[0] / $sum_hasil_0_row;
    $query_b1 = mysqli_query($connect, "SELECT COUNT(input_output) FROM data_bayes WHERE input_output = '1111'");
    $pB0 = (int) mysqli_fetch_row($query_b1)[0] / $sum_hasil_1_row;
    $pengali = $pA * $pB1;
    $pembagi = $pA * $pB0;
    $hasil = $pengali / ($pengali + $pembagi);
}elseif ($kombinasi_input == "110") {
    $pA = $sum000_row / $sum_data_row;
    $query_b0 = mysqli_query($connect, "SELECT COUNT(input_output) FROM data_bayes WHERE input_output = '0101'");
    $pB1 = (int) mysqli_fetch_row($query_b0)[0] / $sum_hasil_0_row;
    $query_b1 = mysqli_query($connect, "SELECT COUNT(input_output) FROM data_bayes WHERE input_output = '1101'");
    $pB0 = (int) mysqli_fetch_row($query_b1)[0] / $sum_hasil_1_row;
    $pengali = $pA * $pB1;
    $pembagi = $pA * $pB0;
    $hasil = $pengali / ($pengali + $pembagi);
}elseif ($kombinasi_input == "111") {
    $pA = $sum000_row / $sum_data_row;
    $query_b0 = mysqli_query($connect, "SELECT COUNT(input_output) FROM data_bayes WHERE input_output = '0011'");
    $pB1 = (int) mysqli_fetch_row($query_b0)[0] / $sum_hasil_0_row;
    $query_b1 = mysqli_query($connect, "SELECT COUNT(input_output) FROM data_bayes WHERE input_output = '1011'");
    $pB0 = (int) mysqli_fetch_row($query_b1)[0] / $sum_hasil_1_row;
    $pengali = $pA * $pB1;
    $pembagi = $pA * $pB0;
    $hasil = $pengali / ($pengali + $pembagi);
}

if ($hasil <= 0.5) {
    $hout = 0;
} else {
    $hout = 1;
}

mysqli_query($connect, "INSERT INTO form_bayes (income, commute_distance, age, hasil) VALUES ($income, $commute_distance, $age, $hout)");


echo "<script>";
echo "alert('Kemungkinan anda memerlukan sepeda adalah sebesar " . $hasil . "%');";
echo "</script>";

// Query untuk mengambil data dari tabel
$sql = "SELECT hasil, hasil FROM form_bayes";
$result = $connect->query($sql);

$trueLabels = array();
$predictions1 = array();

// Memasukkan data dari tabel ke dalam array
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $trueLabels[] = $row["hasil"];
        $predictions1[] = $row["hasil"];
    }
} else {
    echo "Tidak ada data pada tabel.";
    die;
}

// Menghitung akurasi
$correct1 = 0;
$correct2 = 0;
$totalCorrect = 0;
$rows = array();
for ($i = 0; $i < count($trueLabels); $i++) {
    $row = array();
    $row["class"] = $trueLabels[$i];
    $row["class"] = $predictions1[$i];
    $row["correct1"] = ($trueLabels[$i] == $predictions1[$i]) ? 1 : 0;
    $row["totalCorrect"] = $row["correct1"];
    $rows[] = $row;

    $correct1 += $row["correct1"];
    $totalCorrect += $row["totalCorrect"];
}

$accuracy1 = ($correct1 / count($trueLabels)) * 100 . '%';
$accuracy2 = ($correct2 / count($trueLabels)) * 100 . '%';
$totalAccuracy = ($totalCorrect / (2 * count($trueLabels))) * 100 . '%';

// Menghitung true positive, false positive, dan false negative untuk Bayes
$tpBayes = 0;
$fpBayes = 0;
$fnBayes = 0;
for ($i = 0; $i < count($trueLabels); $i++) {
    if ($trueLabels[$i] == 1 && $predictions1[$i] == 1) {
        $tpBayes++;
    } elseif ($trueLabels[$i] == 0 && $predictions1[$i] == 1) {
        $fpBayes++;
    } elseif ($trueLabels[$i] == 1 && $predictions1[$i] == 0) {
        $fnBayes++;
    }
}


// Menghitung presisi dan recall untuk Bayes
if (($tpBayes + $fpBayes) > 0) {
   $precisionBayes = round(($tpBayes / ($tpBayes + $fpBayes)) * 100, 2) . '%';
 } else {
   $precisionBayes = '0%';
 }
 
 if (($tpBayes + $fnBayes) > 0) {
   $recallBayes = round(($tpBayes / ($tpBayes + $fnBayes)) * 100, 2) . '%';
 } else {
   $recallBayes = '0%';
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
    background-color: pink;
    background-position: center;
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
            <li><a href="kmeans.php"><b>K-Means</b></a></li>
            <li><a href="bayes.php"><b>Naive Bayes</b></a></li>
        </ul>
        <div class="nav-icon">
            <a href="#"><i class='bx bx-search' class='bx bx-cart'></i></a>
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>
    </header>
    <section class="main-home">
    <div class="container">
        <div class="container pt-4">
            <div class="card">
                <div class="card-header text-center"><b>Hasil Naive Bayes Bike Buyers</b></div>
                <div class="m-3">
                    <table class="table table-bordered table-striped text-center">
                        <tbody>
                            <tr>
                                <th>No</th>
                                <th>Income</th>
                                <th>Commute Distance</th>
                                <th>Age</th>
                                <th>Hasil</th>
                            </tr>
    </section>
    <?php
    $no = 1;
    $cluster = mysqli_query($connect, "SELECT * FROM form_bayes");
    while ($row = mysqli_fetch_assoc($cluster)) :
    ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['income']; ?></td>
            <td><?= $row['commute_distance']; ?></td>
            <td><?= $row['age']; ?></td>
            <td><?= $row['hasil']; ?></td>
        </tr>
    <?php endwhile; ?>
    </tbody>
    </table>
    <section>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
            <div class="alert alert-primary" role="alert">
                <p>Akurasi: <?php echo $accuracy1; ?></p>
            </div>
            </div>
            <div class="col-md-4">
            <div class="alert alert-info" role="alert">
              <p><?php echo "Presisi: " . $precisionBayes ;?></p>
            </div>
            </div>
            <div class="col-md-4">
            <div class="alert alert-warning" role="alert">
              <p><?php echo "Recall: " . $recallBayes; ?></p>
            </div>
            </div>
        </div>
    </div>
  </section>
    </div>
    </div>
    </div>
    <script>
        const header = document.querySelector("header");
        window.addEventListener("scroll", function() {
            header.classList.toggle("sticky", this.window.scrollY > 0);
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