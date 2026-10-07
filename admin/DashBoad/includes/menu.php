<?php
if (!defined('SECURE_ACCESS')) {
    die('Access Denied');
}
?>
    <section>
        <aside>
            <ul>
                <li><b onclick="window.location.href='<?=$DASHBOARD_URL?>Pages/profile.php'"><i class="fa-solid fa-user"></i> Profile.</b></li>
                <li><b onclick="window.location.href='<?=$DASHBOARD_URL?>Pages/users.php'"><i class="fas fa-users"></i> Users.</b>
                    <span id="btnSubmenu">▲</span>
                    <div class="submenu">
                        <p onclick="window.location.href='<?=$DASHBOARD_URL?>Pages/editUser.php'">Edit User</p>
                    </div>
                </li>

                <li><b onclick="window.location.href='<?=$DASHBOARD_URL?>Pages/certificate.php'"><i class="fas fa-certificate"></i> Certificate.</b></li>
                <li><b onclick="window.location.href='<?=$DASHBOARD_URL?>Pages/levels.php'"><i class="fas fa-turn-up"></i> Levels.</b></li>
                <li><b onclick="window.location.href='<?=$DASHBOARD_URL?>Pages/exercices.php'"><i class="fas fa-vials"></i> Exercices.</b></li>
                <li><b onclick="window.location.href='<?=$DASHBOARD_URL?>Pages/quizes.php'"><i class="fas fa-graduation-cap"></i> Quizes.</b></li>
                <li><b onclick="window.location.href='<?=$DASHBOARD_URL?>Pages/courses.php'"><i class="fas fa-book"></i> Courses.</b></li>
                <li><b onclick="window.location.href='<?=$DASHBOARD_URL?>Pages/lessons.php'"><i class="fas fa-star"></i> Lessons.</b></li>
                <li><b onclick="window.location.href='<?=$DASHBOARD_URL?>Pages/aboutUs.php'"><i class="fa-solid fa-circle-question"></i> About us.</b></li>
            </ul>
            <button class="Logout"><b onclick="window.location.href='<?=$DASHBOARD_URL?>controllers/logout.php'"><i class="fa-solid fa-right-from-bracket"></i> Logout.</b></button>
        </aside>

        <div class="content-include" id="content-include">