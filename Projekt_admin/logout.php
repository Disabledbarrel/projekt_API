<?php
/*Webbutveckling II DT093G
Elin Larsson VT-19
*/

require_once "includes/header.php";

if(isset($_SESSION['portfolio'])) {
    destroySession();
    header("Location: login.php");
}

?>