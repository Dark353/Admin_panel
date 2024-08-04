<?php include './inc/rolekontrol.php'?>
<?php include './inc/session_con.php'?>
<?php include './inc/substr.php'?>
<?php checkSession();?>
<?php
YetkiKontrol::kullkont($_SESSION['is_admin'], YetkiKontrol::HREAD);

// if ($_SESSION['is_admin'] !== "admin") {
//     header("Location: ./index.php");
//     exit();
// }
?>

<!DOCTYPE html>
<?php include './inc/conn.php'?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Panel</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script> -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
</head>

<body class="dark-mode-variables">

    <div class="container">

        <?php include './include/sidebar.php'?>
        <!-- Recent Orders Table -->
        <main>
            <div class="recent-orders">
                <h2>Haberler Tablosu</h2>
                <?php
                     if ($_SESSION['is_admin'] & YetkiKontrol::HPOST) {?>
                <button onclick="document.getElementById('id01').style.display='block'" class="w3-button  w3-large"
                    style="border-radius: 18px; background-color: #202528;">Haber Ekle</button>
                <?php }?>
                <hr>

                <table>
                    <thead>
                        <tr>
                            <th scope="col">sira</th>
                            <th scope="col">baslik</th>
                            <th scope="col">Haber içeriği</th>
                            <th scope="col">konusu</th>
                            <th scope="col">yazar</th>
                            <th scope="col">tarih</th>
                            <th scope="col">Eylem</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                           $sorgu = $conn -> prepare("select * from tbl_haber");

                               $sorgu -> execute();

                               $respons = $sorgu -> get_result();

                            if($respons -> num_rows > 0){
            while($veri = $respons->fetch_assoc()){
                ?>


                        <tr>
                            <th scope="row"><?=$veri['sira']?></th>
                            <td><?= $veri['baslik']?></td>
                            <?php
                            $yazi = $veri['h_icerik'];
                                echo "<td>",kisalt($yazi,20),"</td>";
                            ?>
                            <td><?=$veri['h_konu']?></td>
                            <td><?=$veri['yazar']?></td>
                            <td><?=$veri['tarih']?></td>
                            <td style="display: inline-flex;">
                                <?php
                                if ($_SESSION['is_admin'] & YetkiKontrol::HUPDATE) {?>
                                <?php if($veri["durum"]) {?>
                                <a href="./inc/haber_con.php?islem=pasifakfif&sira=<?=$veri['sira']?>&durum=0"
                                    class="bi bi-eye" style="color: green; margin-right: 7px;"></a>

                                <?php } else {?>
                                <a href="./inc/haber_con.php?islem=pasifakfif&sira=<?=$veri['sira']?>&durum=1"
                                    class="bi bi-eye-slash" style="color: red; margin-right: 7px;"> </a>
                                <?php }?>

                                <a href="#" onclick="openModal(<?php echo $veri['sira']; ?>)"><i
                                        class="bi bi-pencil-square" style="color: blue; margin-right: 7px;"></i> </a>
                                <?php }?>
                                <?php
                        if ($_SESSION['is_admin'] & YetkiKontrol::HDELETE) {?>
                                <a href="./inc/haber_con.php?islem=delete&sira=<?=$veri['sira']?>"><i
                                        class="bi bi-trash3" style="color: red; "></i></a>
                                <?php }?>


                            </td>
                        </tr>
                        <script>
                        function openModal(sira) {

                            document.getElementById('id02').style.display = 'block';

                            $.ajax({
                                type: "GET",
                                url: "./include/haber_editM.php",
                                data: {
                                    sira: sira
                                },
                                success: function(response) {

                                    $("#g_modal").html(response);
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    console.error("AJAX Hatası: " + textStatus, errorThrown);
                                }
                            });
                        }
                        </script>

                        <?php
                        }
                        }else{

                        echo '<tr>Tablo Boş</tr>';
                        } ?>




                    </tbody>
                </table>

            </div>
            <!-- End of Recent Orders -->

        </main>
        <?php include './include/userlayots.php'?>


    </div>
    <?php include './include/haber_ekleM.php'?>



    <div class="w3-container">
        <div id="id02" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom"
                style=" border-radius:20px;background-color: #202528;width: 40%;">

                <div class="w3-center"><br>
                    <span onclick="document.getElementById('id02').style.display='none'"
                        class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>

                </div>
                <div id="g_modal"></div>
            </div>
        </div>
    </div>


    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    <script src="assets/js/index.js"></script>
    <script src="assets/js/orders.js"></script>

</body>

</html>