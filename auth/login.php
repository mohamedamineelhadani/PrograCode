<?php
define('SECURE_ACCESS', true);
require_once __DIR__."/../config/database.php";
require_once __DIR__."/../config/config.php";

session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
    function safe_data($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if((isset($_POST["username"]) && !empty($_POST["username"])) && (isset($_POST["password"]) && !empty($_POST["password"]))){
        $username = safe_data($_POST["username"]);
        $password = safe_data($_POST["password"]);
        if(strlen($username)>=8 && preg_match("/^[a-zA-Z ]+$/",$username)){
            $getUser = "SELECT IdUser, NameUser, PasswordUser FROM users WHERE NameUser = '$username'";
            $resUser =mysqli_query($conn,$getUser);
            if($resUser && mysqli_num_rows($resUser) > 0){
                $user =mysqli_fetch_assoc($resUser);
                if ($password === $user['PasswordUser']) {
                    $_SESSION['IdUser'] = $user['IdUser'];
                    $_SESSION['loggedinapp'] =true;

                    if(isset($_POST["remember"])){
                        setcookie("username", $username, time() + 86400, "/");
                        setcookie("password", $password, time() + 86400, "/");
                    };
                    header("location:".BASE_URL."pages/mainHome.php");
                } else {
                    $error= "Incorrect ! password";
                }
            }else{
                $error ="Incorrect ! username";
            }
        }else{
            $error= "Please enter correct forma of username";
        };
    }else{
        $error= "Please enter all info";
    };
}

?>
<?php require_once __DIR__ . '/../layouts/loginSystem/loginHeader.php' ?>
<section class="login-system">
    <article>
        <h1><i class="fa-solid fa-unlock-keyhole"></i><span>Login</span></h1>
    </article>

    <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">

        <?php if (isset($error)): ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>

        <div class="group">
            <label for="username">Username</label>
            <input type="text" id="username"  name="username" value="<?= isset($_COOKIE["username"]) ? $_COOKIE["username"] : "" ?>">
        </div>

        <div class="group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password"  value="<?= isset($_COOKIE["password"]) ? $_COOKIE["password"] : "" ?>">
            <button onclick="show(event,this)"><i class="fa-regular fa-eye"></i></button>
        </div>

        <div class="remember">
            <input type="checkbox" name="remember">
            <label for="remember">Remember Me</label>
        </div>

        <input type="submit" value="LOGIN">
        <a href="register.php">Create a new account !</a>
        <a href="recovery.php">forget the password !!</a>
    </form>
</section>

<?php require_once __DIR__ . '/../layouts/loginSystem/loginFooter.php'; ?>