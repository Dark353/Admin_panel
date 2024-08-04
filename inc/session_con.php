<?php
session_start();

function checkSession() {
    if (!isset($_SESSION['sira'])) {
        header("Location: ./login.php");
        exit();
    }
}
?>
