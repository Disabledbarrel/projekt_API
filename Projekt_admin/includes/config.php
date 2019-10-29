<?php
/*Webbutveckling III DT173G
Elin Larsson HT-19
*/

$site_title = "Admin";
$divider = " | ";

error_reporting(-1);
ini_set("display_errors", 1);

// Autoload of classes
spl_autoload_register(function ($class) {
    include "classes/" . $class . ".class.php";
});

//DB-Settings studentserver
define("DBHOST", "localhost");
define("DBUSER", "portfolio");
define("DBPASS", "password");
define("DBDATABASE", "portfolio");