<?php
define("ROOT", dirname(__DIR__));

define("IS_LOCALHOST", in_array($_SERVER['HTTP_HOST'], ['localhost', '127.0.0.1']));
define("SSL", !IS_LOCALHOST);
define("DOMAIN", $_SERVER['HTTP_HOST']);


define("FILE_NAME", IS_LOCALHOST ? basename(ROOT) : "");


define("DEBUG", true);
ini_set("display_errors", DEBUG ? 1 : 0);
error_reporting(DEBUG ? E_ALL : 0);

$protocol = SSL ? "https" : "http";
$docRoot = str_replace('\\', '/', realpath($_SERVER['DOCUMENT_ROOT']));
$projectRoot = str_replace('\\', '/', realpath(ROOT));
$basePath = str_replace($docRoot, '', $projectRoot);


define("BASE_URL", "$protocol://" . DOMAIN . $basePath . "/"); 
define("ASSETS_URL", "$protocol://" . DOMAIN . $basePath . "/assets/");
define("UPLOADS_URL", "$protocol://" . DOMAIN . $basePath . "/uploads/");


define("APP_NAME", "Winning Products");
define('SITE_NAME', 'PrograCode');
define("ADMIN_NAME", "Mohamed Amine El Hadani");
define("ADMIN_EMAIL", "elhadanimohamedamine@gmail.com");
define('DEFAULT_LANGUAGE', 'en');



define('DB_HOST', 'localhost');
define('DB_NAME', 'progracode');
define('DB_USER', 'root');
define('DB_PASS', '');






define("UPLOAD_DIR", ROOT . "/uploads/");
define("ASSETS_DIR", ROOT . "/assets/");
define('MAX_FILE_SIZE', 2 * 1024 * 1024);
define('ALLOWED_TYPES', ['image/jpeg', 'image/png', 'image/gif']);




?>