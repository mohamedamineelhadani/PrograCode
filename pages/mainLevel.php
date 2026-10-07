<?php
define('SECURE_ACCESS', true);
require_once __DIR__."/../config/config.php";
require_once __DIR__."/../config/database.php";
require_once __DIR__."/../middleware/middleware.php";
require_once __DIR__."/updatingLev/index.php";
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
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/mainLevel.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/main.css">
    <link rel="icon" href="<?= BASE_URL ?>assets/icon/logo.ico">
    <title>Home Page</title>
</head>
<body>
<div class="content">
<?php require_once __DIR__."/../layouts/mainHeader.php" ?>

    <div class="Level" id="Level">
        <h1>Your Level :</h1>
        <?php
        upditingLevelInfo($conn,$id);
        $getLev ="SELECT * FROM levels WHERE IdUser ='$id'";
        $resLev =mysqli_query($conn,$getLev);
        if($resLev){
            while($rows =mysqli_fetch_assoc($resLev)){
                $n = $rows["NumLev"]*10;
                echo "
                    <div class=\"level-card\" title=\"{$rows["NumLev"]}%\">
                        <div class=\"level-title\">{$rows["NameCour"]}</div>
                        <div class=\"progress-bar\">
                            <div class=\"progress\" style=\"width: $n%;\">{$rows["TitleLev"]}</div>
                        </div>
                        <p>{$rows["DescriptionLev"]}</p>
                    </div>
                ";
            };
        }else{
            echo "Error : ".mysqli_error($conn);
        };
        ?>
    </div>

<?php require_once __DIR__."/../layouts/mainFooter.php" ?>
</div>
<script src="<?= BASE_URL ?>assets/js/public.js"></script>
<script src="<?= BASE_URL ?>assets/js/main.js"></script>
</body>
</html>