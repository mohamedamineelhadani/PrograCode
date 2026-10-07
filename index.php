<?php require_once __DIR__."/config/config.php" ?>
<!DOCTYPE html>
<html lang="<?= DEFAULT_LANGUAGE ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="css javascript html php c#">
    <meta name="description" content="learn programmation">  
    <meta name="author" content="<?= ADMIN_NAME ?>">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= ASSETS_URL ?>css/public.css">
    <link rel="stylesheet" href="<?= ASSETS_URL ?>css/wellcome.css">
    <link rel="icon" href="<?= ASSETS_URL ?>icon/logo.ico">
    <title>Wellcome</title>
</head>
<body>
    <div class="container">
        <h1>Welcome to PrograCode!</h1>
        <p>Start your coding journey with us and master HTML, CSS, JavaScript, PHP, and more!</p>
        <a href="<?= BASE_URL ?>pages/mainHome.php"><button class="start-btn">Get Started</button></a>
    </div>
<script src="<?= ASSETS_URL ?>js/public.js"></script>
</body>
</html>