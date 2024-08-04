<?php include '../inc/conn.php'?>
<?php

    if(!empty($_GET["sira"])) {
        $g_id = $_GET["sira"];
        $connection = $conn -> prepare("SELECT * FROM tbl_kat WHERE id=?");

        $connection -> bind_param("s",$g_id);

        $connection -> execute();
      
        $cevap = $connection -> get_result();
      
        if($cevap -> num_rows > 0) {
            while($veri = $cevap -> fetch_assoc()) {
                $name = $veri["kat_name"];
                $ust =  $veri["ust"];
            }
      } else {
        header("location: kat_list.php");
        exit;
      }
    } 
    else{
        echo("veri yok ");
    }
    ?>
 <form class="w3-container" style="border-radius:20px;background-color: #202528;"
                action="./inc/kat_con.php" method="POST">
                <div class="w3-section">
                    <label><b>kategori adı</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" style="border-radius:18px;" type="text"
                        placeholder="kategori adı gir" name="kat_name" value="<?=$name?>" required>




                    <label><b>Üst Kategori</b></label>
                    <select class="w3-input w3-border w3-margin-bottom" style="border-radius:18px;" placeholder="kategori"
            name="ust" value="<?=$ust?>" required>
        
            <?php
            
                foreach ($dizi_category as $key => $değer  ) {
                ?>

            <option value="<?=$key?>" <?= ($key==$ust)?'selected':'' ?>> <?=$değer?> </option>

            <?php
                }
                ?>
        </select>


                    <button class="w3-button w3-block w3-section w3-padding"
                        style="border-radius:18px; background-color: #202528;" type="submit">Güncelle</button>
                    <input type="hidden" name="islem" value="edit">
                    <input type="hidden" name="sira" value="<?=$g_id?>">
                </div>
            </form>