<?php
/*Webbutveckling III DT173G
Elin Larsson HT-19
*/
$page_title = "Arbete";
require_once "includes/header.php";

if(!isset($_SESSION['email'])) {
  header("Location: login.php");
}
?>

<section id="section-a">
          <div id="output"></div>
          <div id="myForm">
            <h2>Lägg till arbete:</h2>
            <form action="" method="" class="form-container" id="addWork">
              <table id="table">
                <tr>
                  <td>
                    <h4>Arbetsplats</h4>
                    <input id="workplace" type="text" name="workplace" required />
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4>Befattning</h4>
                    <input id="title" type="text" name="title" required />
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4>Arbetsuppgifter</h4>
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
                    <h4>Startdatum</h4>
                    <input
                      id="startdate"
                      type="date"
                      name="start"
                      required
                    />
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4>Stopddatum</h4>
                    <input id="stopdate" type="date" name="stop" required />
                  </td>
                </tr>
                <tr>
                  <td>
                    <input
                      type="submit"
                      id="submit"
                      name="submit"
                      class="btn"
                      value="Lägg till arbete"
                    />
                  </td>
                </tr>
              </table>
            </form>
          </div>

          <!-- Uppdatera -->
          <div id="updateForm" class="form-popup">
            <h2>Uppdatera arbete:</h2>
            <form id="updateWork">
              <table id="table2">
                <tr>
                  <td>
                    <h4>Arbetsplats</h4>
                    <input id="edit_workplace" type="text" name="workplace" required />
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4>Befattning</h4>
                    <input id="edit_title" type="text" name="title" required />
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4>Arbetsuppgifter</h4>
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
                    <h4>Startdatum</h4>
                    <input
                      id="edit_startdate"
                      type="date"
                      name="start"
                      required
                    />
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4>Stopddatum</h4>
                    <input id="edit_stopdate" type="date" name="stop" required />
                  </td>
                </tr>
                <tr>
                  <td>
                    <input
                      type="submit"
                      id="edit"
                      name="submit"
                      class="btn"
                      value="Uppdatera arbete"
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

    <script src="js/work.js"></script>
  </body>
</html>

<!-- /*Webbutveckling III DT173G
Elin Larsson HT-19
*/-->
        