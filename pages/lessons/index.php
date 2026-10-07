<?php
require_once __DIR__."/../../config/config.php";
require_once __DIR__."/../../config/database.php";
require_once __DIR__."/../../middleware/middleware.php";
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
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/lessons/lessons.css">
    <link rel="icon" href="<?= BASE_URL ?>assets/icon/logo.ico">
    <title>Lessons</title>
</head>
<body>
<?php
  function safe($data){
      $data = trim($data);
      $data = stripcslashes($data);
      $data = htmlspecialchars($data);
      return $data;
  };
  if(isset($_GET["name"])){
      $NameLess= safe($_GET["name"]);
      echo "<h1>$NameLess Lessons</h1>";
      echo "<div class=\"lesson-grid\">";
      $getLessons ="SELECT * FROM lessons WHERE NameCour ='$NameLess'";
      $resLessons = mysqli_query($conn,$getLessons);
      while($rows = mysqli_fetch_assoc($resLessons)){
        echo "
          <div class=\"lesson-card\">
            <h2>Lesson {$rows["NLess"]} : {$rows["TitleLess"]}</h2>
            <p>{$rows["DescriptionLess"]}</p>
            <a href=\"".BASE_URL."pages/lessons/Lesson/index.php?name={$rows["NameCour"]}&code={$rows["CodeLess"]}\">Read Lesson</a>
          </div>
        ";
      }
      echo "</div>";
      mysqli_close($conn);
  }else{
    echo "there's no data";
  }
?>
</body>
</html>
