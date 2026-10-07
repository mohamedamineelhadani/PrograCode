<?php
define('SECURE_ACCESS', true);
require_once __DIR__."/../config/database.php";

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
    function createId($name){
        $cId = base64_encode($name);
        $cId="U".rand(0,100).strtoupper(substr($cId,0,4));
        return $cId;
    };

    if((isset($_POST["username"]) && !empty($_POST["username"]))&&(isset($_POST["password"]) && !empty($_POST["password"]))&&(isset($_POST["code"]) && !empty($_POST["code"]))){
        $username =safe_data($_POST["username"]);
        $password =safe_data($_POST["password"]);
        $code =safe_data($_POST["code"]);

        if(strlen($username)>=8 && preg_match("/^[a-zA-Z ]+$/",$username)){
            if(checkPass($password)){
                $check ="SELECT * FROM users WHERE NameUser = '$username'";
                $resultChe =mysqli_query($conn,$check);
                if (mysqli_num_rows($resultChe) > 0) {
                    $error= "$username is already have account! ❌ ";
                }else {
                    $id = createId($username);
                    $insertUser = "INSERT INTO users (IdUser, NameUser, PasswordUser, CodeUser) VALUES ('$id', '$username', '$password', '$code')";
                    if (mysqli_query($conn,$insertUser)) {
                        $getCour ="SELECT * FROM courses";
                        $resCour =mysqli_query($conn,$getCour);

                        while($rowsCour =mysqli_fetch_assoc($resCour)){
                            $insertLev ="INSERT INTO levels(IdUser,NameCour,NumLev,TitleLev,DescriptionLev)VALUES('$id','{$rowsCour["NameCour"]}',1,'Beginner','Never Give Up!!')";
                            mysqli_query($conn,$insertLev);
                            $insertUpLev="INSERT INTO UpdateLevel(IdUser,NameCour)VALUES('$id','{$rowsCour["NameCour"]}')";
                            mysqli_query($conn,$insertUpLev);
                        };
                        header("location:login.php");
                    } else {
                       $error = mysqli_error($conn);
                    };
                };
            };
        }else{
            $error = "Please enter correct user name";
        };
    }else{
        $error= "Please enter all info";
    };
    mysqli_close($conn);
};

?>


<?php require_once __DIR__ . '/../layouts/loginSystem/loginHeader.php' ?>
<section class="login-system">
    <article>
        <h1><i class="fa-solid fa-unlock-keyhole"></i><span>Register</span></h1>
    </article>

    <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">

        <?php if (isset($error)): ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>

        <div class="group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username">
        </div>

        <div class="group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
            <button onclick="show(event,this)"><i class="fa-regular fa-eye"></i></button>
        </div>

        <div class="group">
            <label for="code">Code</label>
            <input type="password" id="code"  name="code">
            <button onclick="show(event,this)"><i class="fa-regular fa-eye"></i></button>
        </div>

        <input type="submit" value="REGISTER">

        <a href="login.php">Login to your account !</a>
    </form>
</section>
<?php require_once __DIR__ . '/../layouts/loginSystem/loginFooter.php' ?>