<?php
require_once __DIR__."/../../../config/config.php";
require_once __DIR__."/../../../config/database.php";
require_once __DIR__."/../../../middleware/middleware.php";
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
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/lesson/lesson.css">
    <link rel="icon" href="<?= BASE_URL ?>assets/icon/logo.ico">
    <title>Lesson</title>
</head>
<body>
<div class="lesson-box">
<?php
  function safe($data){
      $data = trim($data);
      $data = stripcslashes($data);
      $data = htmlspecialchars($data);
      return $data;
  };
  if(isset($_GET["name"]) && isset($_GET["code"])){
      $name= safe($_GET["name"]);
      $code= safe($_GET["code"]);
      $getLesson = "SELECT * FROM Lessonshow WHERE NameCour ='$name' AND CodeLesShow ='$code'";
      $resLesson =mysqli_query($conn,$getLesson);
      if($resLesson){
        $Lesson =mysqli_fetch_assoc($resLesson);
        echo "<h1>Lesson {$Lesson["NLesShow"]}: {$Lesson["TitleLesShow"]}</h1>";
        echo "
          <div class=\"video-section\">
              <iframe src=\"{$Lesson["VideoSrcLesShow"]}\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>
          </div>
          <div class=\"pdf-download\">
              <a href=\"".BASE_URL."pages/validate/index.php?name=$name&code={$Lesson["CodeLesShow"]}&type=LS\">I'm done lessons</a>
              <a href=\"{$Lesson["PdfSrcLesShow"]}\" download>📄 Download the course PDF</a>
          </div>
          <div class=\"resources\">
              <h3>🌐 Useful Links :</h3>
              <ul>
                <li><a href=\"{$Lesson["LinkLesA"]}\" target=\"_blank\">$name Link A</a></li>
                <li><a href=\"{$Lesson["LinkLesB"]}\" target=\"_blank\">$name Link B</a></li>
              </ul>
          </div>
        ";
      }else{
        echo "Error : ".mysqli_error($conn);
      }
      mysqli_close($conn);
  }else{
    echo "there's no data";
  };
?>
</div>
</body>
</html>
