<?php
define('SECURE_ACCESS', true);
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
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/exercice/exercice.css">
    <link rel="icon" href="<?= BASE_URL ?>assets/icon/logo.ico">
    <title>Exrcice</title>
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
      $name= safe($_GET["name"]);
      echo "<h1>$name Exercices</h1>";
      echo "<div class=\"exercise-container\">";
      $getEx ="SELECT * FROM Exercices WHERE NameCour ='$name'";
      $resEx = mysqli_query($conn,$getEx);
      if($resEx){
        while($rows = mysqli_fetch_assoc($resEx)){
        echo "
          <div class=\"exercise-card\" title=\"{$rows["DescriptionEx"]}\">
            <h2>Exercice {$rows["numEx"]}: {$rows["TitleEx"]}</h2>
            <iframe src=\"{$rows["VideoSrcEx"]}\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>
            <a class=\"download\" href=\"{$rows["PdfSrcEx"]}\" download>📄 Download PDF</a>
            <button onclick=\"window.location.href='validate/validateEX.php?name=$name&code={$rows["CodeEx"]}'\">I'm done exercising</button>
          </div>
        ";
      }
      }else{
        echo "Error : ".mysqli_error($conn);
      };
      echo "</div>";
      mysqli_close($conn);
  }else{
    echo "there's no data";
  }
?>      
</body>
</html>
