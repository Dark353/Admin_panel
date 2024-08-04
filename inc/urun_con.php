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
    if ($_SESSION['is_admin'] & YetkiKontrol::UPOST){

        if(!empty($_POST["urun_name"]) &&  isset($_POST["kategorys"]) &&  !empty($_POST["price"]) &&  
            !empty($_POST["stock"]) &&  !empty($_POST["u_aciklama"])){
            $urun_name = $_POST["urun_name"];
            $kategorys = $_POST["kategorys"];
            $price = $_POST["price"];
            $stock = $_POST["stock"];
            $u_aciklama = $_POST["u_aciklama"];

            $sql = $conn -> prepare("INSERT INTO tbl_urunler (name,price,stock,category,explanation) VALUES (?,?,?,?,?)");
            $sql -> bind_param("sssss", $urun_name, $price,$stock,$kategorys,$u_aciklama );
            $sql -> execute();
            $conn->close();

            header("location: ../urun_list.php");
        }else{
            echo "Bişiler eksik gibi";
        }
    }else{
        header("location: ../403.php");
    }
    }elseif($islem == "edit"){
        if ($_SESSION['is_admin'] & YetkiKontrol::UUPDATE){

            if(!empty($_POST["urun_name"]) &&  isset($_POST["kategorys"]) &&  !empty($_POST["price"]) &&  
            !empty($_POST["stock"]) &&  !empty($_POST["u_aciklama"])){
                $urun_name = $_POST["urun_name"];
                $kategorys = $_POST["kategorys"];
                $price = $_POST["price"];
                $stock = $_POST["stock"];
                $u_aciklama = $_POST["u_aciklama"];
                $g_sira = $_POST["sira"];


                $sql = $conn->prepare("UPDATE tbl_urunler SET name=?,price=?, stock=?,category=?, explanation=? WHERE id=?");
                $sql -> bind_param("ssssss",$urun_name, $price,$stock,$kategorys,$u_aciklama  , $g_sira  );
                $sql -> execute();

                header("Location: ../urun_list.php");
            }else{
                echo "Bişiler eksik gibi";
            }
        }else{
            header("location: ../403.php");
        }
    }elseif($islem == "pasifakfif"){

        if ($_SESSION['is_admin'] & YetkiKontrol::UUPDATE){

            if(!empty($_GET["sira"]) && isset($_GET["durum"])){
                $g_durum = $_GET["durum"];
                $g_sira = $_GET["sira"];

                $sql = $conn->prepare("UPDATE tbl_urunler SET durum=? WHERE id=?");

                $sql -> bind_param("ss",$g_durum, $g_sira);
                $sql->execute();
            
                header("Location: ../urun_list.php");


            }else{
                echo"eksik bişilker var";
            }
        }else{
            header("location: ../403.php");
        }
    }elseif($islem == "delete"){

        if ($_SESSION['is_admin'] & YetkiKontrol::UDELETE){

            if(!empty($_GET["id"])) {
                $g_id = $_GET["id"];

    
            
                $sqlresim = $conn -> prepare("SELECT * FROM tbl_resim WHERE urunID=? ");

                $sqlresim -> bind_param("s",$g_id);
        
                $sqlresim -> execute();
        
                $cevap = $sqlresim -> get_result();
        
                if($cevap -> num_rows > 0) {
                    while($veri = $cevap -> fetch_assoc()) {
                        unlink("../assets/images/".$veri["resim"]);
                    }
                }
            
                $sqldelete = $conn->prepare("DELETE FROM tbl_resim WHERE urunid=?");
            
                $sqldelete->bind_param("s", $g_id);
            
                $sqldelete->execute();
        
                $sql = $conn -> prepare("DELETE FROM tbl_urunler WHERE id=?");
        
                $sql -> bind_param("s",$g_id);
        
                $sql -> execute();
            
                $conn -> close();
        
                header("Location: ../urun_list.php");
                exit;
            } else {
                echo"eksik bişilker var";
            }
        }else{
            header("location: ../403.php");
        }

    } elseif ($islem == "urunsirala") {

        if ($_SESSION['is_admin'] & YetkiKontrol::UUPDATE){

            if(isset($_POST["f_siralar"])) {
                $g_siralar = $_POST["f_siralar"];
        
                $dizi_siralar = explode("-",$g_siralar);
        
                foreach ($dizi_siralar as $key => $value) {
        
                    $sql = $conn -> prepare("UPDATE tbl_urunler SET yer=? WHERE id=?");
        
                    $sql -> bind_param("ss",$key,$value);
                    
                    $sql -> execute();
            
                
                }
        
                $conn -> close();
        
                header("location: ../urun_list.php");
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