<?php include '../inc/conn.php'?>
<?php

    if(!empty($_GET["sira"])) {
        $g_id = $_GET["sira"];
        $connection = $conn -> prepare("SELECT * FROM tbl_haber WHERE sira=?");

        $connection -> bind_param("s",$g_id);

        $connection -> execute();
      
        $cevap = $connection -> get_result();
      
        if($cevap -> num_rows > 0) {
            while($veri = $cevap -> fetch_assoc()) {
                $baslik = $veri["baslik"];
                $h_icerik = $veri["h_icerik"];
                $h_konu =  $veri["h_konu"];
            }
      } else {
        header("location: haber_list.php");
        exit;
      }
    } 
    else{
        echo("veri yok ");
    }
    ?>
 <form class="w3-container" style="border-radius:20px;background-color: #202528;"
                action="./inc/haber_con.php" method="POST">
                <div class="w3-section">
                    <label><b>baslık</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" style="border-radius:18px;" type="text"
                        placeholder="Başlık Gir" name="baslik" value="<?=$baslik?>" required>




                    <label><b>Haber Konusu</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" style="border-radius:18px;" type="text"
                        placeholder="Başlık Gir" name="h_konu" value="<?=$h_konu?>" required>



                    <label><b>İçerik</b></label>
                    <textarea class="w3-input w3-border w3-margin-bottom" id="editor2" style="border-radius:18px;"
                        type="text" placeholder="Haber İçeriğini gir" name="h_icerik" required><?=$h_icerik?></textarea>
                    <br>
                    <script>
                    CKEDITOR.replace('editor2');
                    </script>
                    <button class="w3-button w3-block w3-section w3-padding"
                        style="border-radius:18px; background-color: #202528;" type="submit">Güncelle</button>
                    <input type="hidden" name="islem" value="edit">
                    <input type="hidden" name="sira" value="<?=$g_id?>">
                </div>
            </form>