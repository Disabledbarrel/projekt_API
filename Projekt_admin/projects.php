<?php
/*Webbutveckling III DT173G
Elin Larsson HT-19
*/
$page_title = "Projekt";
require_once "includes/header.php";

if(!isset($_SESSION['email'])) {
  header("Location: login.php");
}
?>

<section id="section-a">
          <div id="output"></div>
          <div id="myForm">
            <h2>Lägg till projekt:</h2>
            <form action="" method="" class="form-container" id="addProject">
              <table id="table">
                <tr>
                  <td>
                    <h4>Titel</h4>
                    <input id="title" type="text" name="title" required />
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4>Webblänk</h4>
                    <input id="url" type="text" name="url" required />
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4>Beskrivning</h4>
                    <input
                      id="description"
                      type="text"
                      name="description"
                      required
                    />
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4>Bildlänk</h4>
                    <input id="image" type="text" name="image" required />
                  </td>
                </tr>
                <tr>
                  <td>
                    <input
                      type="submit"
                      id="submit"
                      name="submit"
                      class="btn"
                      value="Lägg till projekt"
                    />
                  </td>
                </tr>
              </table>
            </form>
          </div>

          <!-- Uppdatera -->
          <div id="updateForm" class="form-popup">
            <h2>Uppdatera projekt:</h2>
            <form id="updateProject">
              <table id="table2">
                <tr>
                  <td>
                    <h4>Titel</h4>
                    <input id="edit_title" type="text" name="title" required />
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4>Webblänk</h4>
                    <input id="edit_url" type="text" name="url" required />
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4>Beskrivning</h4>
                    <input
                      id="edit_description"
                      type="text"
                      name="description"
                      required
                    />
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4>Bildlänk</h4>
                    <input id="edit_image" type="text" name="image" required />
                  </td>
                </tr>
                <tr>
                  <td>
                    <input
                      type="submit"
                      id="edit"
                      name="submit"
                      class="btn"
                      value="Uppdatera projekt"
                    />
                  </td>
                </tr>
                <tr>
                <td>
                  <input type="submit" class="delete" onclick="closeForm()" value="Ångra"/>
                  <td>
                </tr>
              </table>
            </form>
          </div>
        </section>

        </main>
    </div>
    <!-- Slut container-->

    <script src="js/projects.js"></script>
  </body>
</html>

<!-- /*Webbutveckling III DT173G
Elin Larsson HT-19
*/-->
        