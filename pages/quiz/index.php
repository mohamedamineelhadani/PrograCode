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
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/quiz/quiz.css">
    <link rel="icon" href="<?= BASE_URL ?>assets/icon/logo.ico">
    <title>Quiz</title>
</head>
<body>
<?php 
$getUser =mysqli_query($conn,"SELECT * FROM users WHERE IdUser = '$id'");
$user= mysqli_fetch_assoc($getUser);
$nameUser =$user["NameUser"];
?>
    <nav>
        <div class="logo"><a href="">QUIZ<i class="fa-solid fa-gamepad"></i></a></div>  
    </nav>



    <div class="start box">
        <h1>Quiz Rules</h1>
        <div class="rules">
            <p> 1_You have only one chance to choose the correct answer.</p>
            <p> 2_No going back once you select an answer.</p>
            <p> 3_Your final score will be displayed at the end of the quiz.</p>
            <p> 4_Make sure to read carefully and do your best!</p>
        </div>
        <button id="start-btn">START QUIZ</button>
    </div>

    <div class="quiz-content" id="quiz-content">
        <?php
        function safe($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        };
        if(isset($_GET["name"])){
            $index = 1;
            $name= safe($_GET["name"]);
            $json = file_get_contents(BASE_URL."assets/json/quiz/$name.json");
            $array = json_decode($json , true);
            $length = count($array);
            foreach($array as $element){
                echo "<div id=\"quiz\" class=\"quiz box\">
                        <div id=\"timer\">Time: 15s</div>
                        <div class=\"quiz-num\">$index/".count($array)."</div>
                        <div class=\"question\">".$element["question"]."</div>
                    ";
                foreach($element["options"] as $answer){
                    echo "<button class=\"answer-btn\" data-correct=\"".$answer["correct"]."\">".$answer["text"]."</button>";
                };
                echo "<button class=\"next-btn\">Next</button></div>";
                $index++;
            };
        }else{
            echo "there's no data";
        }
        ?>
    </div>


    <div id="result-div" class="result box">
        <h1 style="text-transform: capitalize"><?= $nameUser ?></h1>
        <h1>your quiz is Complet.</h1>
        <div class="score">Your Score: <span id="res"></span>/ <?php echo $length; ?></div>
        <div class="feedback" id="feedback"></div>
        <div class="btns">
            <a href="index.html">Retry</a>
            <a href="#">Back to Lessons</a>
        </div>
    </div>
<?php mysqli_close($conn);?>
<script src="<?= BASE_URL ?>assets/js/quiz/quiz.js"></script>
</body>
</html>
