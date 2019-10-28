/*Webbutveckling III
Elin Larsson HT-19
*/

document
  .getElementById("addEducation")
  .addEventListener("submit", addEducation); // För att läsa in till databas
window.addEventListener("load", getEducation); // Laddar in utbildning från databas

// API URL'er
const getUrlEducation =
  "http://localhost/projekt_webbutvecklingIII/projekt_API/api/education/read.php";
const postUrlEducation =
  "http://localhost/projekt_webbutvecklingIII/projekt_API/api/education/create.php";
const updateUrlEducation =
  "http://localhost/projekt_webbutvecklingIII/projekt_API/api/education/update.php";
const deleteUrlEducation =
  "http://localhost/projekt_webbutvecklingIII/projekt_API/api/education/delete.php";

// CRUD Education
// Read
function getEducation() {
  fetch(getUrlEducation) // Hämtar med get
    .then(msg => msg.json())
    .then(msg => {
      let output = '<h2>Mina utbildningar:</h2><table class="courses">'; // Skriver ut till DOM
      if (msg.data != null) {
        msg.data.forEach(function(education) {
          output += `
                <tr>
                    <th>
                        <h4>Kurs:</h4>
                    </th>
                    <th>
                        <h4>Lärosäte:</h4>
                    </th>
                    <th>
                        <h4>Startdatum:</h4>
                    </th>
                    <th>
                        <h4>Slutdatum:</h4>
                    </th>
                    <th>
                    <h4>Uppdatera</h4>
                    </th>
                    <th>
                    <h4>Radera</h4>
                    </th>
                </tr>
                <tr>
                    <td>
                        ${education.course}
                    </td>
                    <td>
                    ${education.school}
                    </td>
                    <td>
                        ${education.startdate}
                    </td>
                    <td>
                        ${education.stopdate}
                    </td>
                    <td>
                    <button class="update" onclick="openForm(${education.id})">Uppdatera</button>
                    </td>
                    <td>
                    <button class="delete" onclick="deleteEducation(${education.id})">Radera</button>
                    </td>
                </tr>
            `;
        });
        output += "</table>";
        document.getElementById("output").innerHTML = output;
      } else {
        document.getElementById("output").innerHTML =
          "<p>Inga utbildningar hittades</p>";
      }
    })
    .catch(err => console.log(err));
}
//Create
function addEducation(e) {
  // Lägga till utbildning med POST
  e.preventDefault();

  let course = document.getElementById("course").value;
  let school = document.getElementById("school").value;
  let startdate = document.getElementById("startdate").value;
  let stopdate = document.getElementById("stopdate").value;

  if (course != "" && school != "" && startdate != "" && stopdate != "") {
    fetch(postUrlEducation, {
      method: "POST",
      headers: {
        Accept: "application/json",
        "Content-type": "application/json"
      },
      credentials: "include",
      body: JSON.stringify({
        course: course,
        school: school,
        startdate: startdate,
        stopdate: stopdate
      })
    }).then(msg => {
      document.getElementById("output").innerHTML = "";
      getEducation();
      document.getElementById("course").value = "";
      document.getElementById("school").value = "";
      document.getElementById("startdate").value = "";
      document.getElementById("stopdate").value = "";
    });
  }
}

// Delete
function deleteEducation(id) {
  // Radera utbildning
  fetch(deleteUrlEducation, {
    method: "DELETE",
    body: JSON.stringify({
      id: id
    })
  })
    .then(msg => msg.json())
    .then(data => {
      getEducation(); // Läs in utbildning på nytt
    })
    .catch(error => console.log(error));
}

// Update
function updateEducation(id) {
  let course = document.getElementById("edit_course").value;
  let school = document.getElementById("edit_school").value;
  let startdate = document.getElementById("edit_startdate").value;
  let stopdate = document.getElementById("edit_stopdate").value;

  if (course != "" && school != "" && startdate != "" && stopdate != "") {
    let json = JSON.stringify({
      id: id,
      course: course,
      school: school,
      startdate: startdate,
      stopdate: stopdate
    });

    fetch(updateUrlEducation, {
      method: "PUT",
      headers: {
        Accept: "application/json",
        "Content-type": "application/json"
      },
      body: json
    }).then(msg => {
      closeForm();
    });
  }
}

// Öppna formulär
function openForm(id) {
  document.getElementById("updateForm").style.display = "block";
  document.getElementById("edit").onclick = function() {
    updateEducation(id);
  };
}

// Dölj formulär
function closeForm() {
  document.getElementById("updateForm").style.display = "none";
}
