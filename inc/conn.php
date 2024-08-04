<?php

$servername = "localhost";

$username = "root";
$pass= "";
$dbname="deneme_db";

$conn = new mysqli($servername, $username, $pass, $dbname);


$dizi_category[0] = "Ana Kategori";
$query = $conn -> prepare("SELECT * FROM tbl_kat");

$query -> execute();

$cevap = $query -> get_result();

if($cevap -> num_rows > 0) {
while($veri = $cevap -> fetch_assoc()) {
    $dizi_category[$veri["id"]] = $veri["kat_name"];
    }
}
