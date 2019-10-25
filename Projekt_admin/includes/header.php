<?php
/*Webbutveckling III DT173G
Elin Larsson HT-19
*/
// Start session
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

include("includes/config.php");
include("includes/functions.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="css/main.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Amatic+SC"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Cutive+Mono"
      rel="stylesheet"
    />
    <title><?= $site_title . $divider . $page_title; ?></title>
  </head>
  <body>
    <!-- Container-->
    <div id="container">
      <!-- Headerområde-->
      <header id="header">
        <div id="welcome">
          <h1>Administrering</h1>
          <?php 
                if(!isset($_SESSION['email'])) {
                    echo "<a href='index.php' id='login'>Startsida</a>";
                } else {
                  echo "<a href='index.php' id='login'>Startsida</a>";
                    echo "<a href='logout.php' id='login'>Logga ut</a>";
                }
                ?>
        </div>
      </header>
      <!-- Slut Headerområde-->

      <!-- Mainområde-->
      <main id="main">