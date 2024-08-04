<?php include '../inc/conn.php'?>
<?php include '../inc/rolekontrol.php'?>
<?php

    if(!empty($_GET["sira"])) {
        $g_id = $_GET["sira"];
        $connection = $conn -> prepare("SELECT * FROM tbl_kullanici WHERE sira=?");

        $connection -> bind_param("s",$g_id);

        $connection -> execute();
      
        $cevap = $connection -> get_result();
      
        if($cevap -> num_rows > 0) {
            while($veri = $cevap -> fetch_assoc()) {
                $usrname = $veri["isim"];
                $Kname = $veri["k_ad"];
                $krole =  $veri["is_admin"];
                $psw = $veri["k_sif"];
                YetkiKontrol::kontrolEt($krole);
                $useryerki =  YetkiKontrol::kontrolEt($krole);
            }
      } else {
        header("location: kull_list.php");
        exit;
      }
    } 
    else{
        echo("veri yok kek");
    }
    ?>


<form class="w3-container" style="border-radius:20px;background-color: #202528;" action="./inc/adduser.php"
    method="POST">
    <div class="w3-section">
        <label>Ad Soyad</label>
        <input class="w3-input w3-border w3-margin-bottom" style="border-radius:18px;" type="text"
            placeholder="Ad Soyad Gir" name="usrname" value="<?=$usrname?>" required>
        <label><b>Kullanıcı adı</b></label>
        <input class="w3-input w3-border w3-margin-bottom" style="border-radius:18px;" type="text"
            placeholder="Kullanıcı adı Gir" name="Kname" value="<?=$Kname?>" required>

        <label>
            <d> Kullanıcı Rol </b>
        </label>

        <label><b>Şifre</b></label>
        <input class="w3-input w3-border" style="border-radius:18px;" type="password" placeholder="Şifre Gir"
            name="sifre">

            

        <div class="w3-row">
            <br>
            <div class="w3-col m6">
                <div class="checkbox-group">
                    <div class="checkbox-item">
                        <input type="checkbox" id="checkbox1" name="checkbox[]" value="1" <?= ($useryerki[0]==1)?'checked':'' ?>>
                        <label for="checkbox1">Kullanıcı Ekleme</label>
                    </div>
                    <div class="checkbox-item">
                        <input type="checkbox" id="checkbox2" name="checkbox[]" value="2" <?= ($useryerki[1]==2)?'checked':'' ?>>
                        <label for="checkbox3">Kullanıcı Silme</label>
                    </div>
                    <div class="checkbox-item">
                        <input type="checkbox" id="checkbox3" name="checkbox[]" value="4"<?= ($useryerki[2]==4)?'checked':'' ?>>
                        <label for="checkbox2">Kullanıcı Düzenleme</label>
                    </div>
                    <div class="checkbox-item">
                        <input type="checkbox" id="checkbox4" name="checkbox[]" value="8" <?= ($useryerki[3]==8)?'checked':'' ?>>
                        <label for="checkbox4">Kullanıcı Görüntüleme</label>
                    </div>
                    <br>

                    <div class="checkbox-item">
                        <input type="checkbox" id="checkbox5" name="checkbox[]" value="16" <?= ($useryerki[4]==16)?'checked':'' ?>>
                        <label for="checkbox5">Ürün Ekleme</label>
                    </div>

                    <div class="checkbox-item">
                        <input type="checkbox" id="checkbox6" name="checkbox[]" value="32"<?= ($useryerki[5]==32)?'checked':'' ?>>
                        <label for="checkbox6">Ürün Silme</label>
                    </div>

                    <div class="checkbox-item">
                        <input type="checkbox" id="checkbox7" name="checkbox[]" value="64"<?= ($useryerki[6]==64)?'checked':'' ?>>
                        <label for="checkbox7">Ürün Düzenleme</label>
                    </div>


                    <div class="checkbox-item">
                        <input type="checkbox" id="checkbox8" name="checkbox[]" value="128"<?= ($useryerki[7]==128)?'checked':'' ?>>
                        <label for="checkbox8">Ürün Görüntüleme</label>
                    </div>
                    <br>

                    
                    <div class="checkbox-item">
                        <input type="checkbox" id="checkbox17" name="checkbox[]" value="65536"<?= ($useryerki[16]==65536)?'checked':'' ?>>
                        <label for="checkbox17">Resim Ekleme</label>
                    </div>


                    <div class="checkbox-item">
                        <input type="checkbox" id="checkbox18" name="checkbox[]" value="131072"<?= ($useryerki[17]==131072)?'checked':'' ?>>
                        <label for="checkbox18">Resim Silme</label>
                    </div>

                </div>
            </div>
            <div class="w3-col m6">
                <div class="checkbox-group">
                    <div class="checkbox-item">
                        <input type="checkbox" id="checkbox9" name="checkbox[]" value="256"<?= ($useryerki[8]==256)?'checked':'' ?>>
                        <label for="checkbox9">Haber Ekleme</label>
                    </div>

                    <div class="checkbox-item">
                        <input type="checkbox" id="checkbox10" name="checkbox[]" value="512"<?= ($useryerki[9]==512)?'checked':'' ?>>
                        <label for="checkbox10">Haber Silme</label>
                    </div>

                    <div class="checkbox-item">
                        <input type="checkbox" id="checkbox11" name="checkbox[]" value="1024"<?= ($useryerki[10]==1024)?'checked':'' ?>>
                        <label for="checkbox11">Haber Düzenleme</label>
                    </div>

                    <div class="checkbox-item">
                        <input type="checkbox" id="checkbox12" name="checkbox[]" value="2048"<?= ($useryerki[11]==2048)?'checked':'' ?>>
                        <label for="checkbox12">Haber Görüntüleme</label>
                    </div>
                    <br>
                    <div class="checkbox-item">
                        <input type="checkbox" id="checkbox13" name="checkbox[]" value="4096"<?= ($useryerki[12]==4096)?'checked':'' ?>>
                        <label for="checkbox13">Kategori Ekleme</label>
                    </div>
                    <div class="checkbox-item">
                        <input type="checkbox" id="checkbox14" name="checkbox[]" value="8192"<?= ($useryerki[13]==8192)?'checked':'' ?>>
                        <label for="checkbox14">Kategori Silme</label>
                    </div>
                    <div class="checkbox-item">
                        <input type="checkbox" id="checkbox15" name="checkbox[]" value="16384"<?= ($useryerki[14]==16384)?'checked':'' ?>>
                        <label for="checkbox15">Kategori Düzenleme</label>
                    </div>

                    <div class="checkbox-item">
                        <input type="checkbox" id="checkbox16" name="checkbox[]" value="32768"<?= ($useryerki[15]==32768)?'checked':'' ?>>
                        <label for="checkbox16">Kategori Görüntüleme</label>
                    </div>
                    <br>
                    <div class="checkbox-item">
                        <input type="checkbox" id="checkbox19" name="checkbox[]" value="262144"<?= ($useryerki[18]==262144)?'checked':'' ?>>
                        <label for="checkbox19">Resim Düzenleme</label>
                    </div>

                    <div class="checkbox-item">
                        <input type="checkbox" id="checkbox20" name="checkbox[]" value="524288"<?= ($useryerki[19]==524288)?'checked':'' ?>>
                        <label for="checkbox20">Resim Görüntüleme</label>
                    </div>
                </div>
            </div>

        </div>


        <button class="w3-button w3-block w3-section w3-padding" style="border-radius:18px; background-color: #202528;"
            type="submit">Güncelle</button>
        <input type="hidden" name="islem" value="edit">
        <input type="hidden" name="psw" value="<?=$psw?>">
        <input type="hidden" name="sira" value="<?=$g_id?>">
    </div>
</form>