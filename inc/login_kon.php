<?php
include './conn.php';

session_start(); // Session'ı başlat

if (!empty($_POST["islem"])) {
    $islem = $_POST["islem"];
} elseif (!empty($_GET["islem"])) {
    $islem = $_GET["islem"];
} else {
    echo "Lütfen bir işlem belirtin ";
    exit;
}

if ($islem == "login") {
    $error = false;
    if (!empty($_POST["uname"]) && !empty($_POST["psw"])) {
        $username = $_POST["uname"];
        $password = $_POST["psw"];

        $sql = $conn->prepare("SELECT sira, is_admin,isim, k_ad, k_sif FROM tbl_kullanici WHERE k_ad=?");

        $sql -> bind_param("s",$username);
        $sql->execute();

        $result = $sql->get_result();

        if ($result) {
            $user = mysqli_fetch_assoc($result);

 
            if ($user && $user['k_sif'] == md5($password)) {
                
                $_SESSION['sira'] = $user['sira'];
                $_SESSION['k_ad'] = $user['k_ad'];
                $_SESSION['isim'] = $user['isim'];
                $_SESSION['is_admin'] = $user['is_admin']; 

                echo "Giriş başarılı!";
                header("location: ../index.php");
            } else {
                $error = true;
                header("location: ../login.php?status=$error");

            }
        } else {
            echo "Veritabanı hatası: " . mysqli_error($conn);
        }
    } else {
        echo "Eksik bilgiler";
    }
}
?>