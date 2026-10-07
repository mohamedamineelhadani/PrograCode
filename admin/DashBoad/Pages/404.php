<?php
include "../config/config.php";
include "../middleware/auth.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="icon" href="<?=$BASE_URL?>images&icons/progracode.ico">
    <link rel="stylesheet" href="../styles/style.css">
    <title>404 - Page Not Found</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: var(--lightPrimaryColor);
            color: #333;
        }
        .container {
            text-align: center;
            padding: 20px;
        }
        h1 {
            font-size: 48px;
            margin-bottom: 10px;
        }
        p {
            font-size: 18px;
            margin-bottom: 20px;
        }
        a {
            text-decoration: none;
            color: var(--lightColor);
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>404 - Page Not Found</h1>
        <p>Sorry, the page you're looking for doesn't exist.</p>
        <p><a href="<?= $DASHBOARD_URL ?>">Return to Home</a></p>
    </div>
</body>
</html>