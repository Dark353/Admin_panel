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
    if ($_SESSION['is_admin'] & YetkiKontrol::RPOST){

        if(isset($_FILES["resim"]) &&  !empty($_POST["r_aciklama"]) && !empty($_POST["urunID"])){
            $resim = $_FILES["resim"];
            $r_aciklama = $_POST["r_aciklama"];
            $urunID = $_POST["urunID"];

            $resim_name = date("YdmHis").'_'.$resim["name"];

            copy($resim["tmp_name"],"../assets/images/"."$resim_name");

            $sql = $conn -> prepare("INSERT INTO tbl_resim (resim,explanation,urunID) VALUES (?,?,?)");
            $sql -> bind_param("sss", $resim_name, $r_aciklama,$urunID );
            $sql -> execute();
            $conn->close();

            header("location: ../urun_galery.php?urunID=".$urunID);
        }else{
            echo "Bişiler eksik gibi";
        }
    }else{
        header("location: ../403.php");
    }

    }
    elseif ($islem == "resimsirala") {

        if ($_SESSION['is_admin'] & YetkiKontrol::RUPDATE){
            if(isset($_POST["r_siralar"]) && isset($_POST["urunID"])) {
                $siralar = $_POST["r_siralar"];
                $urunID = $_POST["urunID"];
        
                $dizi_siralar = explode("-",$siralar);
        
                foreach ($dizi_siralar as $key => $value) {
        
                    $sql = $conn -> prepare("UPDATE tbl_resim SET yer=? WHERE id=?");
        
                    $sql -> bind_param("ss",$key,$value);
                    
                    $sql -> execute();
            
                
                }
                $conn -> close();
        
                header("location: ../urun_galery.php?urunID=".$urunID);
                exit;
        
            } else {
                echo("Bilgiler eksik");
            }
    
        }else{
            header("location: ../403.php");
        }
    
    } elseif($islem == "delete"){
        
        if ($_SESSION['is_admin'] & YetkiKontrol::RDELETE){

            if(!empty($_GET["id"])  && !empty($_GET["urunID"])) {
                $g_id = $_GET["id"];
                $g_urunID = $_GET["urunID"];

                $sql = $conn -> prepare("SELECT * FROM tbl_resim WHERE id=? order by yer");

                $sql -> bind_param("s",$g_id);
        
                $sql -> execute();
        
                $cevap = $sql -> get_result();
        
                if($cevap -> num_rows > 0) {
                    while($veri = $cevap -> fetch_assoc()) {
                        unlink("../assets/images/".$veri["resim"]);
                    }
                }

                $sql = $conn -> prepare("DELETE FROM tbl_resim WHERE id=?");
        
                $sql -> bind_param("s",$g_id);
        
                $sql -> execute();
            
                $conn -> close();
        
                header("Location: ../urun_galery.php?urunID=".$urunID);
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


