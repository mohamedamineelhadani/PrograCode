<?php
define('SECURE_ACCESS', true);
include "../includes/db.php";
include "../config/config.php";
include "../middleware/auth.php";


if($_SERVER["REQUEST_METHOD"]=="POST"){
    function safe_data($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    };
    function checkPass($password) {
        global $error;
        if (strlen($password) < 8) {
            $error = "The number of characters must be 8 or more in password !";
            return false;
        }elseif(!preg_match('/[A-Z]/', $password)) {
            $error = "Please use capital letter in password !";
            return false;
        }elseif(!preg_match('/[a-z]/', $password)) {
            $error = "Please use small letter in password !";
            return false;
        }elseif(!preg_match('/[0-9]/', $password)) {
            $error = "Please use numbers in password !";
            return false;
        }elseif(!preg_match('/[^\w]/', $password)) {
            $error = "please use symbols in password !";
            return false;
        }else{
            return true;
        }
    };
    if((isset($_POST["username"]) && !empty($_POST["username"]))&&(isset($_POST["password"]) && !empty($_POST["password"]))&&(isset($_POST["code"]) && !empty($_POST["code"]))){
        $username =safe_data($_POST["username"]);
        $password =safe_data($_POST["password"]);
        $code =safe_data($_POST["code"]);
        if(strlen($username)>=8 && preg_match("/^[a-zA-Z ]+$/",$username)){
            if(checkPass($password)){
                $profilePath = null;
                if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === 0) {
                    $uploadDir = $_SERVER['DOCUMENT_ROOT'] . "/PrograCode/DashBoad/profile/";
                    $imageName = uniqid() . "_" . basename($_FILES['profile_image']['name']);
                    $uploadPath = $uploadDir . $imageName;

                    if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $uploadPath)) {
                        $profilePath = "profile/". $imageName;
                    }
                }

                $updateUser = "UPDATE admin SET NameAdmin = '$username', PasswordAdmin = '$password', CodeAdmin = '$code' " . (($profilePath)?", ProfileSrcAdmin = '$profilePath' " : "") . "WHERE IdAdmin = '$id'";
                if (mysqli_query($conn,$updateUser)) {
                    $nice = "success!";
                } else {
                    $error = "Error : ".mysqli_error($conn);
                }
            };
        }else{
            $error = "Please enter correct user name";
        };
    }else{
        $error = "Please enter all info";
    };
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="icon" href="<?=$BASE_URL?>images&icons/progracode.ico">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Profile</title>
    <style>
        .content{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .content .profileForm{
            max-width: 750px;
            width: 80%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .content .profileForm .profileImage{
            position: relative;
            border-radius: 100%;
            border: 3px solid var(--primaryColor);
            overflow: hidden;
            width: 250px;
            height: 250px;
            margin-right: 10px;
        }
        .content .profileForm .profileImage img{
            width: 100%;
            height: 100%;
            border-radius: 100%;
            object-fit: cover;
        }
        .content .profileForm .profileImage input{
            position: absolute;
            z-index: 5;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%) scale(1.2);
            width: 90px;
        }
        .content .profileForm .profileContent{
            width: 450px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        
        }
        .content .profileForm .profileContent .profileInput{
            width: 100%;
            height: 55px;
            position: relative;
            margin-bottom: 20px;
        }
        
        .content .profileForm .profileContent .profileInput input[type="text"],
        .content .profileForm .profileContent .profileInput input[type="password"]{
            height: 100%;
            width: 100%;
            border:3px solid var(--primaryColor);
            outline: none;
            border-radius: 10px;
            font-size: 18px;
            padding-left: 7px;
            color: var(--primaryColor);
        }
        .content .profileForm .profileContent .profileInput input[type="text"]:focus,
        .content .profileForm .profileContent .profileInput input[type="password"]:focus{
            padding-left: 20px;
        }
        
        .content .profileForm .profileContent .profileInput label{
            position: absolute;
            z-index: 5;
            top: 50%;
            left: 20px;
            transform: translateY(-50%);
            font-size: 18px;
            color: var(--primaryColor);
            padding: 0 5px;
        }
        .content .profileForm .profileContent .profileInput label.active{
            top: 0px;
            background-color: white;
        }
        .content .profileForm .profileContent .profileInput button{
            padding: 5px;
            font-size: 23px;
            color: var(--primaryColor);
            border: none;
            border-radius: 10px;
            background-color: transparent;
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }
        .content .profileForm .profileContent .profileInput button:hover{
            background-color: var(--lightPrimaryColor);
        }
        
        .content .profileForm .profileContent input[type="submit"]{
            border: 3px solid var(--primaryColor);
            border-radius: 10px;
            background-color: transparent;
            font-size: 23px;
            font-weight: bold;
            width: 100%;
            height: 60px;
            cursor: pointer;
            margin-bottom:15px ;
            color: var(--primaryColor);
        }
        .content .profileForm .profileContent input[type="submit"]:hover{
            background-color: var(--primaryColor);
            color: white;
        }
        .message{
            color: white;
            font-size: 17px;
            border-radius: 10px;
            padding: 10px 20px;
            text-align: center;
            margin-bottom: 10px;
        }
        .error{
            background-color: var(--errorColor);
        }
        .nice{
            background-color: var(--successColor);
        }
    </style>
</head>
<body>
<?php include "../includes/header.php" ?>
<?php include "../includes/menu.php" ?>
<div class="content" id="content">
    <?php
        $getProfile ="SELECT * FROM admin WHERE IdAdmin =$id";
        $resProfile = mysqli_query($conn, $getProfile);
        $profile = mysqli_fetch_assoc($resProfile);
    ?>
    <form class="profileForm" id="profileForm" enctype="multipart/form-data" method="post" action="<?=$_SERVER["PHP_SELF"]?>">
        <div class="profileImage">
            <img src="<?= $profile["ProfileSrcAdmin"] ? $DASHBOARD_URL.$profile["ProfileSrcAdmin"] : $DASHBOARD_URL."profile/default.png" ?>" alt="Profile Image" id="profilePreview">
            <input type="file" name="profile_image" accept="image/*" onchange="previewImage(event)">
        </div>
        <div class="profileContent">

            <?php if (isset($error)): ?>
                <div class="error message"><?= $error ?></div>
            <?php endif; ?>

            <?php if (isset($nice)): ?>
                <div class="nice message"><?= $nice ?></div>
            <?php endif; ?>

            <div class="profileInput">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="<?= $profile["NameAdmin"] ?>">
            </div>
            <div class="profileInput">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" value="<?= $profile["PasswordAdmin"] ?>">
                <button onclick="show(event,this)"><i class="fa-regular fa-eye"></i></button>
            </div>
            <div class="profileInput">
                <label for="code">Code</label>
                <input type="password" id="code"  name="code" value="<?= $profile["CodeAdmin"] ?>">
                <button onclick="show(event,this)"><i class="fa-regular fa-eye"></i></button>
            </div>
                <input type="submit" value="UPDATE">
        </div>
    </form>
</div>
<?php include "../includes/footer.php" ?>
<script src="../scripts/script.js"></script>
<script>
    const content = document.getElementById("content");
    const inputPass =content.querySelectorAll('input[type="password"]');
    const inputText =content.querySelector('input[type="text"]');

    document.addEventListener("DOMContentLoaded",function(){
        inputPass.forEach(input =>{
            if(input.value!=""){
                focusInp(input)
            }
        })
        if(inputText.value!=""){
            focusInp(inputText)
        }
    })

    function focusInp(input){
        let parent=input.parentElement;
        let label =parent.querySelector('label');
        label.classList.add("active");
    }

    function blurInp(input){
        let parent=input.parentElement;
        let label =parent.querySelector('label');
        label.classList.remove("active");
    }

    inputPass.forEach( inputP=> {
       inputP.addEventListener("focus",function(){
        focusInp(inputP);
       }) 
    });
    inputText.addEventListener("focus",function(){
        focusInp(inputText);
    });
    inputPass.forEach( inputP=> {
        inputP.addEventListener("blur",function(){
        if(inputP.value==""){
            blurInp(inputP);
        }
       }) 
    });
    inputText.addEventListener("blur",function(){
        if(inputText.value==""){
            blurInp(inputText);
        }
    });

    function show(event,btn){
        event.preventDefault();
        let parent =btn.parentElement;
        let input = parent.querySelector('input');
        if(input.type=="password"){
            input.type="text";
            btn.firstElementChild.className="fa-regular fa-eye-slash";
        }else{
            input.type="password";
            btn.firstElementChild.className="fa-regular fa-eye";
        }
    }

    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = content.querySelector('#profilePreview');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    };
</script>
</body>
</html>




