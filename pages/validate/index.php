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
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/validate/validate.css">
    <link rel="icon" href="<?= BASE_URL ?>assets/icon/logo.ico">
    <style>
        .message {
  padding: 15px 20px;
  margin: 20px auto;
  border-radius: 8px;
  width: fit-content;
  max-width: 90%;
  font-family: Arial, sans-serif;
  font-size: 16px;
  font-weight: 500;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease;
}

.message.success {
  background-color: #e8f9e9;
  border-left: 5px solid #2ecc71;
  color: #2c662d;
}

.message.warning {
  background-color: #fff8e5;
  border-left: 5px solid #f1c40f;
  color: #7a5e00;
}

.message.error {
  background-color: #fdecea;
  border-left: 5px solid #e74c3c;
  color: #a94442;
}

.message:hover {
  transform: translateY(-2px);
  opacity: 0.95;
}

    </style>
    <title>validate</title>
</head>
<body>
<?php
  function safe($data){
      $data = trim($data);
      $data = stripcslashes($data);
      $data = htmlspecialchars($data);
      return $data;
  };
  if(isset($_GET["name"]) && isset($_GET["code"]) && isset($_GET["type"])){
      $name= safe($_GET["name"]);
      $code= safe($_GET["code"]);
      $type= safe($_GET["type"]);
      $table = ($type == "LS") ? "lessons" : "exercices";
      $update =($type == "LS") ? "UpLessons" : "UpExercice";

      $checkComp = mysqli_query($conn,"SELECT * FROM completed WHERE IdUser ='$id' AND NameCour ='$name' AND CodeComp ='$code' AND TypeComp ='$type' AND Completed =TRUE");
      if($checkComp && mysqli_num_rows($checkComp) > 0){
        echo "<div class=\"message error\">";
        echo ($type == "LS")?"the Lesson is already completed":"the Exercice is already completed";
        echo "<div>";
      }else{
        $insetCom =mysqli_query($conn,"INSERT INTO completed(IdUser,NameCour,CodeComp,TypeComp,Completed)VALUES('$id','$name','$code','$type',TRUE)");
        echo "<div class=\"message success\">";
        echo ($type == "LS")?"the Lesson is completed":"the Exercice is completed";
        echo "<div>";

        $getCount =mysqli_query($conn,"SELECT COUNT(*) AS count FROM $table WHERE NameCour ='$name'");
        $getCountComp =mysqli_query($conn,"SELECT COUNT(*) AS count FROM completed WHERE IdUser = '$id' AND NameCour = '$name' AND TypeComp ='$type'") ;
        $count = mysqli_fetch_assoc($getCount);
        $countComp = mysqli_fetch_assoc($getCountComp);
        if($getCount && $getCountComp && $count["count"] == $countComp["count"] ){
            $checkUpLev = mysqli_query($conn,"SELECT $update FROM updatelevel WHERE IdUser = '$id' AND NameCour ='$name'");
            if($checkUpLev){
                $poinLev =mysqli_fetch_assoc($checkUpLev);
                if($poinLev["$update"]){
                    echo "<div class=\"message error\">
                        the level is already updated.
                    <div>";
                }else{
                    $upPointLev = mysqli_query($conn,"UPDATE updatelevel SET $update = TRUE WHERE IdUser = '$id' AND NameCour ='$name'");
                    $updateLevel = mysqli_query($conn,"UPDATE levels SET NumLev = NumLev +3 WHERE IdUser ='$id' AND NameCour = '$name'");
                    if($upPointLev && $updateLevel){
                        echo "<div class=\"message success\">
                            the level is updated.
                        <div>";
                    }else{
                        echo "<div class=\"message error\">
                            there's error in upditing the level.
                        <div>";
                    }
                }
            }
        }else{
            echo "<div class=\"message warning\">
                let's go to complet all
            <div>";
        }
  }
}
?>
</body>
</html>