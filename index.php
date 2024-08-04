<!DOCTYPE html>
<?php include './inc/rolekontrol.php'?>
<?php include './inc/conn.php'?>
<?php include './inc/session_con.php'?>
<?php checkSession();?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Panel</title>

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script> -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body class="dark-mode-variables">






    <div class="container">
        <?php include './include/sidebar.php'?>
        <main>
            <?php

$sorguKullanici = $conn->prepare("SELECT COUNT(*) as toplamKullanici FROM tbl_kullanici");
$sorguKullanici->execute();
$responsKullanici = $sorguKullanici->get_result();

$sorguUrun = $conn->prepare("SELECT COUNT(*) as toplamUrun FROM tbl_urunler");
$sorguUrun->execute();
$responsUrun = $sorguUrun->get_result();

$sorguHaber = $conn->prepare("SELECT COUNT(*) as toplamHaber FROM tbl_haber");
$sorguHaber->execute();
$responsHaber = $sorguHaber->get_result();

$sorguKat = $conn->prepare("SELECT COUNT(*) as toplamKat FROM tbl_kat");
$sorguKat->execute();
$responsKat = $sorguKat->get_result();

$sorguResim = $conn->prepare("SELECT COUNT(*) as toplamResim FROM tbl_resim");
$sorguResim->execute();
$responsResim = $sorguResim->get_result();

if ($responsKullanici->num_rows > 0 && $responsUrun->num_rows > 0 && $responsHaber->num_rows > 0 && $responsResim->num_rows > 0 && $responsKat->num_rows > 0) {
    
    $rowKullanici = $responsKullanici->fetch_assoc();
    $rowUrun = $responsUrun->fetch_assoc();
    $rowHaber = $responsHaber->fetch_assoc();
    $rowKat = $responsKat->fetch_assoc();
    $rowResim = $responsResim->fetch_assoc();

    
    $toplamKullanici = $rowKullanici['toplamKullanici'];
    $toplamUrun = $rowUrun['toplamUrun'];
    $toplamHaber = $rowHaber['toplamHaber'];
    $toplamKat = $rowKat['toplamKat'];
    $toplamResim = $rowResim['toplamResim'];
    ?>
    <h1>İstatistikler</h1>
    <div class="analyse">
        <div class="sales">
            <div class="info" style="text-align: center;">
                <h3>Toplam Kullanıcı</h3>
                <h1><?= $toplamKullanici ?></h1>
            </div>
        </div>
        <div class="sales">
            <div class="info" style="text-align: center;">
                <h3>Toplam Ürün</h3>
                <h1><?= $toplamUrun ?></h1>
            </div>
        </div>
        <div class="sales">
            <div class="info" style="text-align: center;">
                <h3>Toplam Haber</h3>
                <h1><?= $toplamHaber ?></h1>
            </div>
        </div>
        <div class="sales">
            <div class="info" style="text-align: center;">
                <h3>Toplam Kategori</h3>
                <h1><?= $toplamKat ?></h1>
            </div>
        </div>
        <div class="sales">
            <div class="info" style="text-align: center;">
                <h3>Toplam Resimler</h3>
                <h1><?= $toplamResim ?></h1>
            </div>
        </div>
    </div>
    <?php
} else {
    echo 'veri yok';
}
?>
        </main>
        <?php include './include/userlayots.php'?>





    </div>



    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script src="assets/js/index.js"></script>
    <script src="assets/js/orders.js"></script>



</body>

</html>