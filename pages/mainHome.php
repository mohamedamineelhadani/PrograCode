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
    <link rel="stylesheet" href="<?= ASSETS_URL ?>css/public.css">
    <link rel="stylesheet" href="<?= ASSETS_URL ?>css/mainHome.css">
    <link rel="stylesheet" href="<?= ASSETS_URL ?>css/main.css">
    <link rel="icon" href="<?= ASSETS_URL ?>icon/logo.ico">
    <title>Home Page</title>
</head>
<body>
<div class="content">
<?php require_once __DIR__."/../layouts/mainHeader.php" ?>


<div class="search" id="searchFather">
    <input type="search" placeholder="Search">
    <button id="searchBtn"><i class="fa-solid fa-magnifying-glass"></i></button>
</div>

<div class="cards" id="cards">
    <?php
    upditingLevelInfo($conn,$id);
    $getCour ="SELECT * FROM courses";
    $resCour =mysqli_query($conn,$getCour);
    if($resCour){
        while($rows =mysqli_fetch_assoc($resCour)){
            $getLev ="SELECT * FROM levels WHERE IdUser ='$id' AND NameCour ='{$rows["NameCour"]}'";
            $resLev =mysqli_query($conn,$getLev);
            $level =mysqli_fetch_assoc($resLev);
            echo "<div class=\"card\">";
            echo "
                <h3>Level : {$level["NumLev"]} %</h3>
                <h1>{$rows["NameCour"]}</h1>
                <p>{$rows["DescriptionCour"]}</p>
                <button onclick=\"window.location.href='".BASE_URL."pages/lessons/index.php?name=".$rows["NameCour"]."'\">Lessons</button>
                <button onclick=\"window.location.href='".BASE_URL."pages/exercice/index.php?name=".$rows["NameCour"]."'\">Exercices</button>
                <button onclick=\"window.location.href='".BASE_URL."pages/quiz/index.php?name=".$rows["NameCour"]."'\">Quiz</button>
                <h4>{$level["DescriptionLev"]}</h4>
            ";
            echo "</div>";
        }
    }else{
        echo "Error : ".mysqli_error($conn);
    }
    mysqli_close($conn);
    ?>
</div>

<?php require_once __DIR__."/../layouts/mainFooter.php" ?>
</div>
<script src="<?= ASSETS_URL ?>js/public.js"></script>
<script src="<?= ASSETS_URL ?>js/mainHome.js"></script>
<script src="<?= ASSETS_URL ?>js/mainPages.js"></script>

</body>
</html>