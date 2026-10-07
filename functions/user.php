<?php
require_once __DIR__."/../config/config.php";
require_once __DIR__."/../config/database.php";
$getUser ="SELECT * FROM users WHERE IdUser ='{$_SESSION['IdUser']}'";
$resUser =mysqli_query($conn,$getUser);
if($resUser){
    $user =mysqli_fetch_assoc($resUser);
    $id = $user["IdUser"];
    $username = $user["NameUser"];
    $password = $user["PasswordUser"];
    $code = $user["CodeUser"];
    $profile = $user["ProfileSrcUser"];
    $date = $user["CreatedAt"];
}else{
    $error ="can't get information".mysqli_error($conn);
}
?>