<?php include '../inc/conn.php'?>
<?php

    if(!empty($_GET["sira"])) {
        $g_id = $_GET["sira"];
        $connection = $conn -> prepare("SELECT * FROM tbl_urunler WHERE id=?");

        $connection -> bind_param("s",$g_id);

        $connection -> execute();
      
        $cevap = $connection -> get_result();
      
        if($cevap -> num_rows > 0) {
            while($veri = $cevap -> fetch_assoc()) {
                $name= $veri["name"];
                $price = $veri["price"];
                $stock = $veri["stock"];
                $category = $veri["category"];
                $explanation =  $veri["explanation"];
            }
      } else {
        header("location: urun_list.php");
        exit;
      }
    } 
    else{
        echo("veri yok ");
    }
    ?>
<form class="w3-container" style="border-radius:20px;background-color: #202528;" action="./inc/urun_con.php"
    method="POST">
    <div class="w3-section">




        <label><b>Ürün Adı</b></label>
        <input class="w3-input w3-border w3-margin-bottom" style="border-radius:18px;" type="text"
            placeholder="Ürün Adı" name="urun_name" value="<?=$name?>" required>



        <label><b>Kategoriler</b></label>
        <select class="w3-input w3-border w3-margin-bottom" style="border-radius:18px;" placeholder="kategori"
            name="kategorys" value="<?=$category?>" required>
        
            <?php
            
                foreach ($dizi_category as $key => $değer  ) {
                ?>

            <option value="<?=$key?>" <?= ($key==$category)?'selected':'' ?>> <?=$değer?> </option>

            <?php
                }
                ?>
        </select>

        <label><b>Fiyat</b></label>
        <input class="w3-input w3-border w3-margin-bottom" style="border-radius:18px;" type="number" step="0.01"
            placeholder="Ürün fiyatı" name="price" value="<?=$price?>" required>
        <label><b>Stok</b></label>
        <input class="w3-input w3-border w3-margin-bottom" style="border-radius:18px;" type="number" step="1"
            placeholder="Ürün stok" name="stock" value="<?=$stock?>" required>


        <label><b>Açıklama</b></label>
        <textarea class="w3-input w3-border w3-margin-bottom" id="editor2" style="border-radius:18px;" type="text"
            placeholder="Açıklama" name="u_aciklama" required><?=$explanation?></textarea>

        <script>
        CKEDITOR.replace('editor2');
        </script>





        <br>
        <button class="w3-button w3-block w3-section w3-padding" style="border-radius:18px; background-color: #202528;"
            type="submit">Güncelle</button>
        <input type="hidden" name="islem" value="edit">
        <input type="hidden" name="sira" value="<?=$g_id?>">



    </div>
</form>