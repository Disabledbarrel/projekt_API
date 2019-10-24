<?php
/*Webbutveckling III DT173G
Elin Larsson HT-19
*/

// Avsluta session
function destroySession() {
    $_SESSION=array();

    if(session_id() !="" || isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time()-2592000, '/');
    }

    session_destroy();
}

// Funktion för att förhindra HTML-injektioner
function sanitizeString($var) {
    if(get_magic_quotes_gpc()) {
        $var = stripslashes($var);
    }
    $var = strip_tags($var);
    $var = htmlentities($var);
    return $var;
}