<?php
/*Webbutveckling III DT173G
Elin Larsson HT-19
*/
$page_title = "Utbildning";
require_once "includes/header.php";

if(!isset($_SESSION['email'])) {
  header("Location: login.php");
}
?>

<section id="section-a">
          <div id="output"></div>
          <div id="myForm">
            <h2>Lägg till Utbildning:</h2>
            <form action="" method="" class="form-container" id="addEducation">
              <table id="table">
                <tr>
                  <td>
                    <h4>Kurs</h4>
                    <input id="course" type="text" name="course" required />
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4>Lärosäte</h4>
                    <input id="school" type="text" name="school" required />
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4>Startdatum</h4>
                    <input id="startdate" type="date" name="startdate" required />
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4>Slutdatum</h4>
                    <input id="stopdate" type="date" name="stopdate" required />
                  </td>
                </tr>
                <tr>
                  <td>
                    <input
                      type="submit"
                      id="submit"
                      name="submit"
                      class="btn"
                      value="Lägg till utbildning"
                    />
                  </td>
                </tr>
              </table>
            </form>
          </div>

          <!-- Uppdatera -->
          <div id="updateForm" class="form-popup">
            <h2>Uppdatera utbildning:</h2>
            <form id="updateEducation">
              <table id="table2">
                <tr>
                  <td>
                    <h4>Kurs</h4>
                    <input id="edit_course" type="text" name="course" required />
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4>Lärosäte</h4>
                    <input id="edit_school" type="text" name="school" required />
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
                      value="Uppdatera utbildning"
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

    <script src="js/education.js"></script>
  </body>
</html>

<!-- /*Webbutveckling III DT173G
Elin Larsson HT-19
*/-->
        