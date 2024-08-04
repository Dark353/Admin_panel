<div class="w3-container">
    <div id="id01" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom"
            style=" border-radius:20px;background-color: #202528;width: 40%;">

            <div class="w3-center"><br>
                <span onclick="document.getElementById('id01').style.display='none'"
                    class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>

            </div>

            <form class="w3-container" style="border-radius:20px;background-color: #202528;"
                action="./inc/haber_con.php" method="POST">
                <div class="w3-section">
                    <label><b>baslık</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" style="border-radius:18px;" type="text"
                        placeholder="Başlık Gir" name="baslik" required>




                    <label><b>Haber Konusu</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" style="border-radius:18px;" type="text"
                        placeholder="Başlık Gir" name="h_konu" required>



                    <label><b>İçerik</b></label>
                    <textarea class="w3-input w3-border w3-margin-bottom" id="editor1" style="border-radius:18px;"
                        type="text" placeholder="Haber İçeriğini gir" name="h_icerik" required></textarea>
                    <br>
                    <script>
                    CKEDITOR.replace('editor1');
                    </script>
                    <button class="w3-button w3-block w3-section w3-padding"
                        style="border-radius:18px; background-color: #202528;" type="submit">Ekle</button>
                    <input type="hidden" name="islem" value="ekle">
                </div>
            </form>



        </div>
    </div>
</div>