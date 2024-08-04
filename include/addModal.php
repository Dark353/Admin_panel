<div class="w3-container">
    <div id="id01" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom"
            style=" border-radius:20px;background-color: #202528;width: 25%;">

            <div class="w3-center"><br>
                <span onclick="document.getElementById('id01').style.display='none'"
                    class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>

            </div>

            <form class="w3-container" style="border-radius:20px;background-color: #202528;" action="./inc/adduser.php"
                method="POST">
                <div class="w3-section">
                    <label><b>Ad Soyad </b></label>
                    <input class="w3-input w3-border w3-margin-bottom" style="border-radius:18px;" type="text"
                        placeholder="Ad Soyad Gir" name="usrname" required>
                    <label><b>Kullanıcı adı </b></label>
                    <input class="w3-input w3-border w3-margin-bottom" style="border-radius:18px;" type="text"
                        placeholder="Kullanıcı adı Gir" name="Kname" required>

                    <!-- <label>
                        <d> Kullanıcı Rol </b>
                    </label>
                    <select class="w3-input w3-border w3-margin-bottom" style="border-radius:18px;"
                        placeholder="rol sec" name="role" required>
                        <option value="">lütfen rol seçin</option>
                        <option value="admin">admin</option>
                        <option value="user">user</option>

                    </select> -->

                    <label><b>Şifre</b></label>
                    <input class="w3-input w3-border" style="border-radius:18px;" type="password"
                        placeholder="Şifre Gir" name="psw" required>
                    <br>
                    <label><b>Yetkliler</b></label>

                    <div class="w3-row">
                        <br>
                        <div class="w3-col m6">
                            <div class="checkbox-group">
                                <div class="checkbox-item">
                                    <input type="checkbox" id="checkbox1" name="checkbox[]" value="1">
                                    <label for="checkbox1">Kullanıcı Ekleme</label>
                                </div>
                                <div class="checkbox-item">
                                    <input type="checkbox" id="checkbox2" name="checkbox[]" value="2">
                                    <label for="checkbox3">Kullanıcı Silme</label>
                                </div>
                                <div class="checkbox-item">
                                    <input type="checkbox" id="checkbox3" name="checkbox[]" value="4">
                                    <label for="checkbox2">Kullanıcı Düzenleme</label>
                                </div>
                                <div class="checkbox-item">
                                    <input type="checkbox" id="checkbox4" name="checkbox[]" value="8">
                                    <label for="checkbox4">Kullanıcı Görüntüleme</label>
                                </div>
                                <br>

                                <div class="checkbox-item">
                                    <input type="checkbox" id="checkbox5" name="checkbox[]" value="16">
                                    <label for="checkbox5">Ürün Ekleme</label>
                                </div>

                                <div class="checkbox-item">
                                    <input type="checkbox" id="checkbox6" name="checkbox[]" value="32">
                                    <label for="checkbox6">Ürün Silme</label>
                                </div>

                                <div class="checkbox-item">
                                    <input type="checkbox" id="checkbox7" name="checkbox[]" value="64">
                                    <label for="checkbox7">Ürün Düzenleme</label>
                                </div>


                                <div class="checkbox-item">
                                    <input type="checkbox" id="checkbox8" name="checkbox[]" value="128">
                                    <label for="checkbox8">Ürün Görüntüleme</label>
                                </div>
                                <br>


                                <div class="checkbox-item">
                                    <input type="checkbox" id="checkbox17" name="checkbox[]" value="65536">
                                    <label for="checkbox17">Resim Ekleme</label>
                                </div>
                                <div class="checkbox-item">
                                    <input type="checkbox" id="checkbox18" name="checkbox[]" value="131072">
                                    <label for="checkbox18">Resim Silme</label>
                                </div>

                            </div>
                        </div>
                        <div class="w3-col m6">
                            <div class="checkbox-group">
                                <div class="checkbox-item">
                                    <input type="checkbox" id="checkbox9" name="checkbox[]" value="256">
                                    <label for="checkbox9">Haber Ekleme</label>
                                </div>

                                <div class="checkbox-item">
                                    <input type="checkbox" id="checkbox10" name="checkbox[]" value="512">
                                    <label for="checkbox10">Haber Silme</label>
                                </div>

                                <div class="checkbox-item">
                                    <input type="checkbox" id="checkbox11" name="checkbox[]" value="1024">
                                    <label for="checkbox11">Haber Düzenleme</label>
                                </div>

                                <div class="checkbox-item">
                                    <input type="checkbox" id="checkbox12" name="checkbox[]" value="2048">
                                    <label for="checkbox12">Haber Görüntüleme</label>
                                </div>
                                <br>
                                <div class="checkbox-item">
                                    <input type="checkbox" id="checkbox13" name="checkbox[]" value="4096">
                                    <label for="checkbox13">Kategori Ekleme</label>
                                </div>
                                <div class="checkbox-item">
                                    <input type="checkbox" id="checkbox14" name="checkbox[]" value="8192">
                                    <label for="checkbox14">Kategori Silme</label>
                                </div>
                                <div class="checkbox-item">
                                    <input type="checkbox" id="checkbox15" name="checkbox[]" value="16384">
                                    <label for="checkbox15">Kategori Düzenleme</label>
                                </div>

                                <div class="checkbox-item">
                                    <input type="checkbox" id="checkbox16" name="checkbox[]" value="32768">
                                    <label for="checkbox16">Kategori Görüntüleme</label>
                                </div>

                                <br>



                                <div class="checkbox-item">
                                    <input type="checkbox" id="checkbox19" name="checkbox[]" value="262144">
                                    <label for="checkbox19">Resim Düzenleme</label>
                                </div>

                                <div class="checkbox-item">
                                    <input type="checkbox" id="checkbox20" name="checkbox[]" value="524288">
                                    <label for="checkbox20">Resim Görüntüleme</label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <button class="w3-button w3-block w3-section w3-padding"
                        style="border-radius:18px; background-color: #202528;" type="submit">Ekle</button>
                    <input type="hidden" name="islem" value="ekle">

                </div>
            </form>



        </div>
    </div>
</div>