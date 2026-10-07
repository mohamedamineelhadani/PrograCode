<?php
if (!defined('SECURE_ACCESS')) {
    die('Access Denied');
}
require_once __DIR__."/../config/config.php";
require_once __DIR__."/../config/database.php";
require_once __DIR__."/../functions/user.php";
?>

<div class="header">
    <h1 class="title"><?= SITE_NAME ?><button id="theme"><i class="fa-regular fa-sun"></i></button></h1>
    <div class="minProfile" onclick="window.location.href='<?= BASE_URL ?>pages/mainProfile.php'">
        <div class="imagePro">
            <img src="<?= ($profile !="") ? $profile : BASE_URL.'uploads/profile/default.png' ;?>" alt="profile">
        </div>
        <div class="infoPro">
            <p>Hello !</p>
            <h1><?= $username ?></h1>
        </div>
    </div>
</div>

<div class="menu">
    <div class="home" onclick="window.location.href='<?= BASE_URL ?>pages/mainHome.php'"><i class="fa-solid fa-house"></i></div>
    <ul id="ul">
        <li onclick="window.location.href='<?= BASE_URL ?>pages/mainAbout.php'">About us</li>
        <li onclick="window.location.href='<?= BASE_URL ?>pages/mainLevel.php'">level</li>
        <li onclick="window.location.href='<?= BASE_URL ?>pages/mainCertificate.php'">Certificate</li>
        <li onclick="window.location.href='<?= BASE_URL ?>pages/mainProfile.php'">Profile</li>
        <li onclick="window.location.href='<?= BASE_URL ?>auth/logout.php'">Log out</li>
    </ul>
    <button class="btn_menu" id="menuBtn">
        <span></span>
        <span></span>
        <span></span>
    </button>
</div>
