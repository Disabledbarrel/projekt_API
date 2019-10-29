<?php
/*Webbutveckling III DT173G
Elin Larsson HT-19
*/
$page_title = "Startsida";
require_once "includes/header.php";

if(!isset($_SESSION['portfolio'])) {
  header("Location: login.php");
}
?>

  <section id="section-a">
    <h2>Välj tabell att administrera</h2>
    <div id="portfolio_list">
      <ul>
        <li><a href="projects.php">Projekt</a></li>
        <li><a href="education.php">Utbildning</a></li>
        <li><a href="work.php">Arbeten</a></li>
      </ul>
    </div>
  </section>

  </body>
</html>

<!-- /*Webbutveckling III DT173G
Elin Larsson HT-19
*/-->
        