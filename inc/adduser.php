<?php include './conn.php'?>
<?php include './session_con.php'?>
<?php include './rolekontrol.php'?>
<?php checkSession();?>
<?php

    if(!empty($_POST["islem"])){
        $islem = $_POST["islem"];
    }
    elseif(!empty($_GET["islem"])) {
        $islem = $_GET["islem"];
    }else{
        echo "lütfen bir işlem belirtin ";
    }
  
if ($islem== "ekle") {

    if ($_SESSION['is_admin'] & YetkiKontrol::KPOST){

        if(!empty($_POST["usrname"]) && !empty($_POST["Kname"]) && !empty($_POST["psw"])){
            $adsoyad = $_POST["usrname"];
            $kullaniciadi = $_POST["Kname"];
            $g_sifre = $_POST["psw"];
            $yetkiler = $_POST["checkbox"];
            $userValue = 0;
            $sifre = md5($g_sifre);

            foreach($yetkiler as $yetki){
                $userValue = $userValue+$yetki;
            }

            $sql = $conn -> prepare("INSERT INTO tbl_kullanici (isim, k_ad,is_admin,k_sif) VALUES (?,?,?,?)");
            $sql -> bind_param("ssss", $adsoyad, $kullaniciadi, $userValue ,$sifre );
            $sql -> execute();
            $conn->close();
            header("location: ../kull_list.php");
        }else{
            echo "Bişiler eksik gibi";
        }
    }else{
        header("location: ../403.php");
    }
}elseif($islem == "edit"){
        if ($_SESSION['is_admin'] & YetkiKontrol::KUPDATE){

            if(!empty($_POST["usrname"]) && !empty($_POST["Kname"])
            && !empty($_POST["sira"])&& !empty($_POST["psw"])){

                $adsoyad = $_POST["usrname"];
                $kullaniciadi = $_POST["Kname"];

                    $psw = $_POST["psw"];
                $g_sifre = $_POST["sifre"];
                $g_sira = $_POST["sira"];

                $yetkiler = $_POST["checkbox"];
                $userValue = 0;
                foreach($yetkiler as $yetki){
                $userValue = $userValue+$yetki;
            }

                if (!empty($g_sifre)) {

                    $md5sifre = md5($g_sifre);
                } else {

                    $md5sifre = $psw; 
                }


                $sql = $conn->prepare("UPDATE tbl_kullanici SET isim=?, k_ad=?, is_admin=?,k_sif=? WHERE sira=?");
                $sql -> bind_param("sssss", $adsoyad, $kullaniciadi,$userValue ,$md5sifre, $g_sira  );
                $sql -> execute();

                header("Location: ../kull_list.php");
            }else{
                echo "Bişiler eksik gibi";
            }
        }else{
            header("location: ../403.php");
        }

    }elseif($islem == "pasifakfif"){
        if ($_SESSION['is_admin'] & YetkiKontrol::KUPDATE){

            if(!empty($_GET["sira"]) && isset($_GET["durum"])){
                $g_durum = $_GET["durum"];
                $g_sira = $_GET["sira"];

                $sql = $conn->prepare("UPDATE tbl_kullanici SET durum=? WHERE sira=?");

                $sql -> bind_param("ss",$g_durum, $g_sira);
                $sql->execute();
            
                header("Location: ../kull_list.php");


            }else{
                echo"eksik bişilker var";
            }
        }else{
            header("location: ../403.php");
        }

    }elseif($islem == "delete"){
        if ($_SESSION['is_admin'] & YetkiKontrol::KDELETE){
            if(!empty($_GET["sira"])) {
                $g_id = $_GET["sira"];
        
                $sql = $conn -> prepare("DELETE FROM tbl_kullanici WHERE sira=?");
        
                $sql -> bind_param("s",$g_id);
        
                $sql -> execute();
            
                $conn -> close();
        
                header("Location: ../kull_list.php");
                exit;
            } else {
                echo"eksik bişilker var";
            }
        }else{
            header("location: ../403.php");
        }

    }else{

        echo " böyle bir method yok knkm ";
    }