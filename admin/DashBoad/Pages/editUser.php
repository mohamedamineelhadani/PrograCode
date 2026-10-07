<?php
define('SECURE_ACCESS', true);
include "../includes/db.php";
include "../config/config.php";
include "../middleware/auth.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="icon" href="<?=$BASE_URL?>images&icons/progracode.ico">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Edit Users</title>
    <style>
        .content .search-bar {
            padding: 8px;
            margin-bottom: 15px;
            width: 100%;
            max-width: 400px;
            border: 2px solid var(--primaryColor);
            border-radius: 10px;
            font-size: 18px;
            outline:none;
        }
        .content .search-bar:focus{
            padding-left:15px;
        }
        .content .users-title {
            color: var(--primaryColor);
            margin-bottom: 20px;
        }
        
        .content .users-table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            border: 1px solid #ccc;
        }
        
        .content .users-table thead {
            background-color: var(--primaryColor);
            color: white;
        }
        
        .content .users-table th, .users-table td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }
        
        .content .users-table img {
            border-radius: 50%;
            object-fit: cover;
        }
        .content .users-table .btn{
            text-decoration:none;
            color: white;
            font-weight: bold;
            padding:7px;
            border-radius: 10px;
        }
        .content .users-table .edit{
            background-color: var(--warningColor);
        }
        .content .users-table .delete{
            background-color: var(--errorColor);
        }
        .content .users-table .btn:hover{
            opacity: 0.7;
        }
    </style>
</head>
<body>
<?php include "../includes/header.php" ?>
<?php include "../includes/menu.php" ?>


<div class="content" id="content">
    <input type="text" id="userSearch" placeholder="Search by name.." class="search-bar">
    <?php
        $query = "SELECT * FROM Users";
        $result = mysqli_query($conn, $query);
        $num_rows = mysqli_num_rows($result);
    ?>
    <h2 class="users-title">Users List (<?=$num_rows?>):</h2>
    <table class="users-table" id="usersTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Profile</th>
                <th>Username</th>
                <th>Created At</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php
            if($result && $num_rows > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $profile = $row['ProfileSrcUser'] ? $BASE_URL."PorgraCode/{$row['ProfileSrcUser']}" : $BASE_URL."PorgraCode/profiles/default.png";
                    echo "
                        <tr>
                            <td>{$row['IdUser']}</td>
                            <td><img src=\"$profile\" alt=\"Profile\" width=\"40\" height=\"40\" style=\"border-radius: 50%;\"></td>
                            <td class=\"username\">{$row['NameUser']}</td>
                            <td>{$row['CreatedAt']}</td>
                            <td><a href=\"\" class=\"edit btn\">Edit</a></td>
                            <td><a href=\"functions/delete.php?table=users&id={$row['IdUser']}\" class=\"delete btn\">Delete</a></td>
                        </tr>
                    ";
                }
            }else{
                echo "<tr><td colspan=\"5\">".mysqli_error($conn)."</td></tr>";
            }
        ?>
        </tbody>
    </table>
</div>

<?php mysqli_close($conn) ?>
<?php include "../includes/footer.php" ?>
<script src="../scripts/script.js"></script>
<script>
    const parent = document.getElementById("content");
    const searchInput = parent.querySelector("#userSearch");

    searchInput.addEventListener("keyup", function () {
        const filter = this.value.toLowerCase();
        const rows = parent.querySelectorAll("#usersTable tbody tr");

        rows.forEach(row => {
            const name = row.querySelector(".username").textContent.toLowerCase();
            if (name.includes(filter)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    });
</script>
</body>
</html>
