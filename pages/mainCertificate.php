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
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/mainCertif.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/main.css">
    <link rel="icon" href="<?= BASE_URL ?>assets/icon/logo.ico">
    <title>Home Page</title>
</head>
<body>
<div class="content">
<?php require_once __DIR__."/../layouts/mainHeader.php" ?>


        <div class="certificate" id="certificate" >
            <h1>Your Certificates</h1>

            
            <div class="cert-card">
                <img src="http://localhost/PrograCode/images&icons/html.png" alt="HTML Certificate">
                <div class="cert-details">
                    <div class="cert-title">HTML Basics</div>
                    <div class="cert-date">Completed: May 28, 2025</div>
                    <a href="download/html-certificate.pdf" download>Download</a>
                </div>
            </div>


            <div class="cert-card">
                <img src="http://localhost/PrograCode/images&icons/css.png" alt="CSS Certificate">
                <div class="cert-details">
                    <div class="cert-title">CSS Styling</div>
                    <div class="cert-date">Completed: June 1, 2025</div>
                    <a href="download/css-certificate.pdf" download>Download</a>
                </div>
            </div>


        </div>

<?php require_once __DIR__."/../layouts/mainFooter.php" ?>
</div>
<script src="<?= BASE_URL ?>assets/js/public.js"></script>
<script src="<?= BASE_URL ?>assets/js/main.js"></script>
</body>
</html>