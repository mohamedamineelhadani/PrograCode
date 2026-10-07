<?php
define('SECURE_ACCESS', true);
include "../includes/db.php";
include "../config/config.php";
include "../middleware/auth.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="icon" href="<?=$BASE_URL?>images&icons/progracode.ico">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Quizes</title>
    <style>
        /* style */
    </style>
</head>
<body>
<?php include "../includes/header.php" ?>
<?php include "../includes/menu.php" ?>

<div class="content" id="content">
<!-- content -->
</div>


<?php mysqli_close($conn) ?>

<?php include "../includes/footer.php" ?>
<script src="../scripts/script.js"></script>

<script>
    const content = document.getElementById("content");
/// script
</script>

</body>
</html>