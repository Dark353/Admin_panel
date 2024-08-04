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
    if ($_SESSION['is_admin'] & YetkiKontrol::HPOST){

        if(!empty($_POST["baslik"]) && !empty($_POST["h_icerik"]) && !empty($_POST["h_konu"])){
            $baslik = $_POST["baslik"];
            $h_icerik = $_POST["h_icerik"];
            $h_konu = $_POST["h_konu"];
            $yazar =    $_SESSION['k_ad'];

            $sql = $conn -> prepare("INSERT INTO tbl_haber (baslik, h_icerik,h_konu,yazar) VALUES (?,?,?,?)");
            $sql -> bind_param("ssss", $baslik, $h_icerik, $h_konu ,$yazar );
            $sql -> execute();
            $conn->close();

            header("location: ../haber_list.php");
        }else{
            echo "Bişiler eksik gibi";
        }
    }else{
        header("location: ../403.php");
    }

    }elseif($islem == "edit"){
        if ($_SESSION['is_admin'] & YetkiKontrol::HUPDATE){

            if(!empty($_POST["baslik"]) && !empty($_POST["h_icerik"]) && !empty($_POST["h_konu"])){
                $baslik = $_POST["baslik"];
                $h_icerik = $_POST["h_icerik"];
                $h_konu = $_POST["h_konu"];
                $yazar =    $_SESSION['k_ad'];
                $g_sira = $_POST["sira"];


                $sql = $conn->prepare("UPDATE tbl_haber SET baslik=?, h_icerik=?, h_konu=?,yazar=? WHERE sira=?");
                $sql -> bind_param("sssss",$baslik, $h_icerik, $h_konu ,$yazar , $g_sira  );
                $sql -> execute();

                header("Location: ../haber_list.php");
            }else{
                echo "Bişiler eksik gibi";
            }
        }else{
            header("location: ../403.php");
        }

    }elseif($islem == "pasifakfif"){
        if ($_SESSION['is_admin'] & YetkiKontrol::HUPDATE){
            if(!empty($_GET["sira"]) && isset($_GET["durum"])){
                $g_durum = $_GET["durum"];
                $g_sira = $_GET["sira"];

                $sql = $conn->prepare("UPDATE tbl_haber SET durum=? WHERE sira=?");

                $sql -> bind_param("ss",$g_durum, $g_sira);
                $sql->execute();
            
                header("Location: ../haber_list.php");


            }else{
                echo"eksik bişilker var";
            }
        }else{
            header("location: ../403.php");
        }
    }elseif($islem == "delete"){
        if ($_SESSION['is_admin'] & YetkiKontrol::HDELETE){
            if(!empty($_GET["sira"])) {
                $g_id = $_GET["sira"];
        
                $sql = $conn -> prepare("DELETE FROM tbl_haber WHERE sira=?");
        
                $sql -> bind_param("s",$g_id);
        
                $sql -> execute();
            
                $conn -> close();
        
                header("Location: ../haber_list.php");
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