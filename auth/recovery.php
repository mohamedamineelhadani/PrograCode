<?php
define('SECURE_ACCESS', true);
require_once __DIR__."/../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        function safe_data($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if((isset($_POST["username"])&&!empty($_POST["username"])) && (isset($_POST["code"])&&!empty($_POST["code"]))){
        $username = safe_data($_POST["username"]);
        $code = safe_data($_POST["code"]);
        if(strlen($username)>=8 && preg_match("/^[a-zA-Z ]+$/",$username)){
            $getUser = "SELECT * FROM users WHERE NameUser = '$username'";
            $resUser = mysqli_query($conn,$getUser);
            $user = mysqli_fetch_assoc($resUser);
            if ($resUser &&  $user['CodeUser'] == $code) {
                $success = $user['PasswordUser'];
                echo "
                    <script>
                        setTimeout(function() {
                            window.location.href=\"login.php\";
                        }, 5000);
                    </script>
                ";

            } else {
                $error= "incorrect code !";
            };
        }else{
            $error= "Please enter correct user name";
        };
    }else{
        $error= "Please enter all info";
    }
    mysqli_close($conn);
}
?>


<?php require_once __DIR__ . '/../layouts/loginSystem/loginHeader.php' ?>

<section class="login-system">
    <article>
        <h1><i class="fa-solid fa-unlock-keyhole"></i><span>Recovery</span></h1>
    </article>

    <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">

        <div class="group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username">
        </div>

        <div class="group">
            <label for="code">Code</label>
            <input type="password" id="code" name="code">
            <button onclick="show(event,this)"><i class="fa-regular fa-eye"></i></button>
        </div>

        <input type="submit" value="SEND">

        <a href="login.php">Back to Login !</a>

        <?php if (isset($error)): ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>

        <?php if (isset($success)): ?>
            <input type="text" disabled class="recoveryCode" value="<?= $success ?>">
        <?php endif; ?>

    </form>
</section>
<?php require_once __DIR__ . '/../layouts/loginSystem/loginFooter.php' ?>