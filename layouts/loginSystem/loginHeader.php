<?php
if (!defined('SECURE_ACCESS')) {
    die('Access Denied');
}
?>
<?php require_once __DIR__."/../../config/config.php" ?>
<!DOCTYPE html>
<html lang="<?= DEFAULT_LANGUAGE ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="css javascript html php c#">
    <meta name="description" content="learn programmation">  
    <meta name="author" content="<?= ADMIN_NAME ?>">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/public.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/loginSystem/loginSystem.css">
    <link rel="icon" href="<?= BASE_URL ?>assets/icon/logo.ico">
    <title>login system</title>
</head>
<body>

<aside class="welcome">
    <div class="logo">
        <img src="<?= BASE_URL ?>assets/images/logo.png" alt="logo">
    </div>
    <h1>Welcome to PrograCode !!</h1>
    <p>Access beginner-friendly courses, practice with real coding exercises, and test your skills through interactive quizzes. Learn at your own pace and build your confidence step by step!</p>
</aside>