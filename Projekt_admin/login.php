<?php
/*Webbutveckling III DT173G
Elin Larsson HT-19
*/
$page_title = "Logga in";
require_once "includes/header.php";

if(isset($_POST['email'])) {
    $email = sanitizeString($_POST['email']);
    $password = sanitizeString($_POST['password']);

    $users = new User();
    if($users->loginUser($email, $password)) {
        header("Location: index.php");
        $_SESSION['email'] = $email;
    } else {
        $message = "<p class='error'>Felaktigt användarnamn eller lösenord!</p>";
    }

}
?>
<!--Sektion A-->
<section id="section-a" class="grid">
    <div id="myForm">
        <h2>Logga in</h2>
        <form action ="login.php" method="post" class="form-container">
            E-post:<br>
            <input type="email" name="email"><br>
            Lösenord:<br>
            <input type="password" name="password" size="20" required><br>
            <input type="submit" class="btn" value="Logga in">
        </form>
        <div>
            <?php
            if(isset($message)) { echo $message; }
            ?>
        </div>
    </div>

</section>
</body>
</html>

<!-- /*Webbutveckling III DT173G
Elin Larsson HT-19
*/-->