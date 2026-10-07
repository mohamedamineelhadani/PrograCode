<?php
define('SECURE_ACCESS', true);
include "config/config.php";
include "includes/db.php";
include "middleware/auth.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="icon" href="<?=$BASE_URL?>images&icons/progracode.ico">
    <link rel="stylesheet" href="styles/style.css">
    <title>Dashboard</title>
    <style>
        .content {
            display:flex;
            align-items:center;
            justify-content: center;
            text-align:center;
        }
        .content h1 {
            font-size: 2.5em;
            color: var(--primaryColor);
            margin-bottom: 30px;
        }
        .content p {
            font-size: 1.2em;
            color: var(--primaryColor);
            margin: 20px 0;
        }
        .content .admin-actions {
            margin-top: 30px;
        }
        .content .dashboard-btn {
            margin: 10px;
            padding: 12px 25px;
            font-size: 18px;
            font-weight:bold;
            color: #fff;
            background-color: var(--primaryColor);
            border-radius: 10px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .content .dashboard-btn:hover {
            background-color:var(--darkPrimaryColor);
        }
    </style>
</head>
<body>
<?php include "includes/header.php" ?>
<?php include "includes/menu.php" ?>

<div class="content" id="content">
    <div class="welcome-content">
        <h1>Welcome, admin!</h1>
        <p>We're glad you're back on your dashboard.</p>
        <p>From here you can manage users, view statistics, and see the full screen of your system.</p>
        <div class="admin-actions">
            <button onclick="window.location.href='<?=$DASHBOARD_URL?>Pages/users.php'" class="dashboard-btn">Manage Users</button>
            <button onclick="window.location.href='<?=$DASHBOARD_URL?>Pages/courses.php'" class="dashboard-btn">Manage Courses</button>
        </div>
    </div>
</div>

<?php include "includes/footer.php" ?>
<script src="scripts/script.js"></script>
</body>
</html>