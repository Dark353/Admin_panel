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
    if ($_SESSION['is_admin'] & YetkiKontrol::CPOST){

        if(isset($_POST["ust"]) &&  !empty($_POST["kat_name"])){
            $ust = $_POST["ust"];
            $kat_name = $_POST["kat_name"];


            $sql = $conn -> prepare("INSERT INTO tbl_kat (kat_name,ust) VALUES (?,?)");
            $sql -> bind_param("ss", $kat_name, $ust );
            $sql -> execute();
            $conn->close();

            header("location: ../kat_list.php");
        }else{
            echo "Bişiler eksik gibi";
        }
    }else{
        header("location: ../403.php");
    }

    }elseif($islem == "edit"){

        if ($_SESSION['is_admin'] & YetkiKontrol::CUPDATE){
            if(isset($_POST["ust"]) &&  !empty($_POST["kat_name"]) && !empty($_POST["sira"])){
                $ust = $_POST["ust"];
                $kat_name = $_POST["kat_name"];
                $g_sira = $_POST["sira"];


                $sql = $conn->prepare("UPDATE tbl_kat SET kat_name=?, ust=? WHERE id=?");
                $sql -> bind_param("sss",$kat_name, $ust, $g_sira  );
                $sql -> execute();

                header("Location: ../kat_list.php");
            }else{
                echo "Bişiler eksik gibi";
            }
        }else{
            header("location: ../403.php");
        }
    }elseif($islem == "pasifakfif"){
        if ($_SESSION['is_admin'] & YetkiKontrol::CUPDATE){
            if(!empty($_GET["sira"]) && isset($_GET["durum"])){
                $g_durum = $_GET["durum"];
                $g_sira = $_GET["sira"];

                $sql = $conn->prepare("UPDATE tbl_kat SET durum=? WHERE id=?");

                $sql -> bind_param("ss",$g_durum, $g_sira);
                $sql->execute();
            
                header("Location: ../kat_list.php");


            }else{
                echo"eksik bişilker var";
            }
        }else{
            header("location: ../403.php");
        }
    }elseif($islem == "delete"){

        if ($_SESSION['is_admin'] & YetkiKontrol::CDELETE){

            if(!empty($_GET["id"])) {
                $g_id = $_GET["id"];
        
                $sql = $conn -> prepare("DELETE FROM tbl_kat WHERE id=?");
        
                $sql -> bind_param("s",$g_id);
        
                $sql -> execute();
            
                $conn -> close();
        
                header("Location: ../kat_list.php");
                exit;
            } else {
                echo"eksik bişilker var";
            }
        }else{
            header("location: ../403.php");
        }

    } elseif ($islem == "katsirala") {
        if ($_SESSION['is_admin'] & YetkiKontrol::CUPDATE){
            if(isset($_POST["f_siralar"])) {
                $g_siralar = $_POST["f_siralar"];
        
                $dizi_siralar = explode("-",$g_siralar);
        
                foreach ($dizi_siralar as $key => $value) {
        
                    $sql = $conn -> prepare("UPDATE tbl_kat SET yer=? WHERE id=?");
        
                    $sql -> bind_param("ss",$key,$value);
                    
                    $sql -> execute();
            
                
                }
        
                $conn -> close();
        
                header("location: ../kat_list.php");
                exit;
        
            } else {
                echo("eksik bişilker var");
            }
        }else{
            header("location: ../403.php");
        }
        
    
    }else{

        echo " böyle bir method yok knkm ";
    }


