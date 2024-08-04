<?php include './inc/rolekontrol.php'?>
<?php include './inc/session_con.php'?>
<?php checkSession();?>
<?php
YetkiKontrol::kullkont($_SESSION['is_admin'], YetkiKontrol::RREAD);
// if ($_SESSION['is_admin'] !== "admin") {
//     header("Location: ./403.php");
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
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
</head>

<body class="dark-mode-variables">

    <div class="container">

        <?php include './include/sidebar.php'?>
        <?php if(!empty($_GET["urunID"])) {
            $urunID = $_GET["urunID"];
        } else {
            header("location: urun_list.php");
        }
        ?>



        <!-- Recent Orders Table -->
        <main>
            <h2>Ürün Görsel</h2>
            <?php
                     if ($_SESSION['is_admin'] & YetkiKontrol::RPOST) {?>

            <button onclick="document.getElementById('id01').style.display='block'" class="w3-button  w3-large"
                style="border-radius: 18px; background-color: #202528;">Görsel Ekle</button>

            <?php }?>
            <hr>



            <div class="new-users">

                <div class="user-list" id="surukle">

                    <?php

                    $sorgu = $conn -> prepare("SELECT * FROM tbl_resim WHERE urunID=? order by yer");

                    $sorgu -> bind_param("s",$urunID);

                    $sorgu -> execute();

                    $cevap = $sorgu -> get_result();

                    if($cevap -> num_rows > 0) {
                        while($veri = $cevap -> fetch_assoc()) {

                    ?>
                    <div id="<?=$veri['id']?>" class="user">
                        <?php

                        if ($_SESSION['is_admin'] & YetkiKontrol::RDELETE) {?>

                        <a href="./inc/resim_con.php?islem=delete&id=<?=$veri['id']?>&urunID=<?=$veri["urunID"]?>"
                            class="bi bi-trash" style="position: absolute;"></a>
                        <?php }?>
                        <img src="assets/images/<?=$veri["resim"]?>" height="100">
                    </div>
                    <?php
                        }
                    } else {
                        echo('Herhangi bir fotoğraf bulunamadı.');
                    }
                ?>
                </div>

            </div>
            <!-- End of New Users Section -->
            <form action="./inc/resim_con.php" method="post" id="yeni_yerler">
                <input type="hidden" name="r_siralar" id="r_siralar">
                <input type="hidden" name="islem" value="resimsirala">
                <input type="hidden" name="urunID" value="<?=$urunID?>">
            </form>
        </main>
        <?php include './include/userlayots.php'?>


    </div>
    <?php include './include/gorsel_ekleM.php'?>



    <div class="w3-container">
        <div id="id02" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom"
                style=" border-radius:20px;background-color: #202528;width: 23%;">

                <div class="w3-center"><br>
                    <span onclick="document.getElementById('id02').style.display='none'"
                        class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>

                </div>
                <div id="g_modal"></div>
            </div>
        </div>
    </div>
    <script>
        <?php if ($_SESSION['is_admin'] & YetkiKontrol::RUPDATE) {?>
            $(function() {
        $("#surukle").sortable({
            stop: function(event, ui) {
                siralar = "0";
                $("#surukle div").each(function(i, el) {
                    siralar += '-' + (el.id);

                });
                $("#r_siralar").val(siralar);
                $("#yeni_yerler").submit();
            }
        });
    });
         <?php }?>
   
    </script>

    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>



    <script src="assets/js/index.js"></script>
    <script src="assets/js/orders.js"></script>

</body>

</html>