<?php
session_start();
if(!isset($_SESSION['loggedin'])){
    header("Location:{$DASHBOARD_URL}controllers/login.php");
    exit;
}
$id = $_SESSION["id"];
?>