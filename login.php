<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin - Panel login</title>
    <link rel="stylesheet" href="assets/css/logincss/style.css">
</head>

<body>
    <?php 
$err = isset($_GET['status']) ? intval($_GET['status']) : 0;

if ($err === 1) { 
?>
    <script>
    alert("Hatalı kullanıcı adı veya şifre!");
    </script>
    <?php 
}
?>
    <div class="box">
        <form autocomplete="off" action="inc/login_kon.php" method="POST">
            <h2>Giriş</h2>
            <div class="inputBox">
                <input type="text" name="uname" required="required">
                <span>Userame</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password" name="psw" required="required">
                <span>Password</span>
                <i></i>
            </div>
            <input type="hidden" name="islem" value="login">
            <input type="submit" value="Giriş">
        </form>
    </div>
</body>

</html>