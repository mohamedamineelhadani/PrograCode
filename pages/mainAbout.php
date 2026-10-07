<?php
define('SECURE_ACCESS', true);
require_once __DIR__."/../config/config.php";
require_once __DIR__."/../config/database.php";
require_once __DIR__."/../middleware/middleware.php";
?>
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
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/mainAbout.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/main.css">
    <link rel="icon" href="<?= BASE_URL ?>assets/icon/logo.ico">
    <title>Home Page</title>
</head>
<body>
<div class="content">
<?php require_once __DIR__."/../layouts/mainHeader.php" ?>

<div class="aboutUs" id="aboutUs">
    <main>
        <div class="aboutImg">
            <img src="<?= BASE_URL ?>assets/images/logo.png" alt="lofo">
        </div> 
        <div class="aboutMedia">
            <h1>Information :</h1>
            <div>
                <a href=""><i class="fa-brands fa-facebook"></i></a>
                <a href=""><i class="fa-brands fa-instagram"></i></a>
                <a href=""><i class="fa-brands fa-github"></i></a>
                <a href=""><i class="fa-solid fa-user-tie"></i></a>
            </div>
        </div>
    </main>
    <div class="aboutInfo">
        <h1>Welcome to PrograCode !!</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi officia perspiciatis fugit, inventore corporis porro recusandae debitis sint optio ipsum consequuntur iusto alias incidunt omnis, nam soluta accusantium labore autem! Access beginner-friendly courses, practice with real coding exercises, and test your skills through interactive quizzes. Learn at your own pace and build your confidence step by step!</p>
    </div>        
</div>

<?php require_once __DIR__."/../layouts/mainFooter.php" ?>
</div>
<script src="<?= BASE_URL ?>assets/js/public.js"></script>
<script src="<?= BASE_URL ?>assets/js/main.js"></script>
</body>
</html>