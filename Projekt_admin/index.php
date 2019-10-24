<?php
/*Webbutveckling III DT173G
Elin Larsson HT-19
*/
$page_title = "Startsida";
require_once "includes/header.php";

if(!isset($_SESSION['email'])) {
  header("Location: login.php");
}
?>

  <section id="section-a">
    <h2>Välj tabell att administrera</h2>
    <div>
      <ul>
        <li><a href="projects.php">Projekt</a></li>
      </ul>
    </div>
  </section>

<?php include("includes/footer.php"); ?>
        