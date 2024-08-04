<div class="w3-container">
    <div id="id01" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom"
            style=" border-radius:20px;background-color: #202528;width: 40%;">

            <div class="w3-center"><br>
                <span onclick="document.getElementById('id01').style.display='none'"
                    class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>

            </div>

            <form class="w3-container" style="border-radius:20px;background-color: #202528;"
                action="./inc/kat_con.php" method="POST">
                <div class="w3-section">




                    <label><b>kategori adı</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" style="border-radius:18px;" type="text"
                        placeholder="kategori adı gir" name="kat_name" required>



                    <label><b>Üst Kategori</b></label>
                    <select class="w3-input w3-border w3-margin-bottom" style="border-radius:18px;"
                        placeholder="üst kategori" name="ust" required>
                        <?php
                                    foreach ($dizi_category as $key => $value) {
                                ?>

                                <option value="<?=$key?>"> <?=$value?> </option>

                                <?php
                                    }
                                ?>
                    </select>
                    <br>

                    <button class="w3-button w3-block w3-section w3-padding"
                        style="border-radius:18px; background-color: #202528;" type="submit">Ekle</button>
                    <input type="hidden" name="islem" value="ekle">
                </div>
            </form>



        </div>
    </div>
</div>