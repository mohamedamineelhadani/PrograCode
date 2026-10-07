<?php
define('SECURE_ACCESS', true);
require_once __DIR__."/../config/config.php";
require_once __DIR__."/../config/database.php";
require_once __DIR__."/../middleware/middleware.php";
require_once __DIR__."/../functions/user.php";
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
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/mainProfile.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/main.css">
    <link rel="icon" href="<?= BASE_URL ?>assets/icon/logo.ico">
    <title>Home Page</title>
</head>
<body>
<div class="content">
<?php require_once __DIR__."/../layouts/mainHeader.php" ?>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){

    function safe_data($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    };

    function checkPass($pass) {
        global $error;
        if (strlen($pass) < 8) {
            $error ="The number of characters must be 8 or more in password !";
            return false;
        }elseif(!preg_match('/[A-Z]/', $pass)) {
            $error ="Please use capital letter in password !";
            return false;
        }elseif(!preg_match('/[a-z]/', $pass)) {
            $error ="Please use small letter in password !";
            return false;
        }elseif(!preg_match('/[0-9]/', $pass)) {
            $error ="Please use numbers in password !";
            return false;
        }elseif(!preg_match('/[^\w]/', $pass)) {
            $error ="please use symbols in password !";
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
                    $uploadDir = $_SERVER['DOCUMENT_ROOT'] . "/PrograCode/uploads/profile/";
                    $imageName = uniqid() . "_" . basename($_FILES['profile_image']['name']);
                    $uploadPath = $uploadDir . $imageName;

                    if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $uploadPath)) {
                        $profilePath = $imageName;
                    }
                }
                $updateUser = "UPDATE users SET NameUser = '$username', PasswordUser = '$password', CodeUser = '$code' " . (($profilePath)?", ProfileSrcUser = '$profilePath' " : "") . "WHERE IdUser = '$id'";
                if (mysqli_query($conn,$updateUser)) {
                    $success = "success!";
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
};

?>
<!-- FIX THIS SHIT -->
        <?php if (isset($error)): ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>

        <?php if (isset($success)): ?>
                <div class="success"><?= $success ?></div>
        <?php endif; ?>

        <div class="profile-page" id="profile-page" >
            
            <form class="profileForm" id="profileForm" enctype="multipart/form-data" method="post" action="<?= $_SERVER["PHP_SELF"]; ?>">

                <div class="update-image">
                    <img src="<?= ($profile !="") ? BASE_URL.'uploads/profile/'.$profile : BASE_URL.'uploads/profile/default.png' ;?>" alt="Profile Image" id="profilePreview">
                    <input type="file" name="profile_image" accept="image/*" onchange="previewImage(event)">
                </div>

                <div class="update-content">
                    <div class="focus">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" value="<?= $username ?>">
                    </div>
                    <div class="focus">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" value="<?= $password ?>">
                        <button onclick="show(event,this)"><i class="fa-regular fa-eye"></i></button>
                    </div>
                    <div class="focus">
                        <label for="code">Code</label>
                        <input type="password" id="code"  name="code" value="<?= $code ?>">
                        <button onclick="show(event,this)"><i class="fa-regular fa-eye"></i></button>
                    </div>
                    <input type="submit" value="UPDATE">
                </div>

            </form>
        </div>


<?php require_once __DIR__."/../layouts/mainFooter.php" ?>
</div>
<script src="<?= BASE_URL ?>assets/js/public.js"></script>
<script src="<?= BASE_URL ?>assets/js/mainPages.js"></script>
<script src="<?= BASE_URL ?>assets/js/forms.js"></script>
</body>
</html>