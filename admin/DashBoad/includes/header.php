<?php
if (!defined('SECURE_ACCESS')) {
    die('Access Denied');
}
$getAdmin = "SELECT * FROM admin WHERE IdAdmin = $id";
$resAdmin = mysqli_query($conn,$getAdmin);
if($resAdmin){
    $admin = mysqli_fetch_assoc($resAdmin);
}
?>
<main>
    <header>
        <h1 class="title"><b onclick="window.location.href='<?=$DASHBOARD_URL?>'">PrograCode</b><button id="theme" ><i class="fa-regular fa-sun"></i></button></h1>
        <div class="minProfile" onclick="window.location.href='<?=$DASHBOARD_URL?>Pages/profile.php'">
            <div class="imagePro">
                <img src="<?= $admin["ProfileSrcAdmin"] ? $DASHBOARD_URL.$admin["ProfileSrcAdmin"] : $DASHBOARD_URL."profile/default.png" ?>" alt="profile">
            </div>
            <div class="infoPro">
                <p>Hello !</p>
                <h1 translate="no"><?=$admin["NameAdmin"]?></h1>
            </div>
        </div>
    </header>