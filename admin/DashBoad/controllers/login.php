<?php

include "../includes/db.php";
include "../config/config.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $getAdmin = "SELECT * FROM admin WHERE NameAdmin = '$username'";
    $resAdmin = mysqli_query($conn,$getAdmin);
    if($resAdmin && mysqli_num_rows($resAdmin) > 0){
        $admin = mysqli_fetch_assoc($resAdmin);
        if($password == $admin["PasswordAdmin"]){
            $_SESSION['loggedin'] = true;
            $_SESSION["id"] =$admin["IdAdmin"];
            header("Location:$DASHBOARD_URL");
            exit;
        }else{
            $error = "Invalid password";
        }
    }else{
        $error = "Invalid username";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="icon" href="<?=$BASE_URL?>images&icons/progracode.ico">
    <title>Admin Login</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <?php if (isset($error)): ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>
        <form method="POST" action="<?= $_SERVER["PHP_SELF"] ?>">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="submit-btn">Login</button>
        </form>
    </div>
<script>
    const rootElement = document.documentElement;
    document.addEventListener("DOMContentLoaded",()=>{
        let theme = localStorage.getItem("theme");
        if(theme == "sun"){
            rootElement.classList.remove('active');
        }else{
            rootElement.classList.add('active');
        }
    });
</script>
</body>
</html>