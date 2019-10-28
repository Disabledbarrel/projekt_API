/*Webbutveckling III
Elin Larsson HT-19
*/

document.getElementById("addWork").addEventListener("submit", addWork); // För att läsa in till databas
window.addEventListener("load", getWork); // Laddar in arbeten från databas

// API URL'er
const getUrlWork =
  "http://localhost/projekt_webbutvecklingIII/projekt_API/api/work/read.php";
const postUrlWork =
  "http://localhost/projekt_webbutvecklingIII/projekt_API/api/work/create.php";
const updateUrlWork =
  "http://localhost/projekt_webbutvecklingIII/projekt_API/api/work/update.php";
const deleteUrlWork =
  "http://localhost/projekt_webbutvecklingIII/projekt_API/api/work/delete.php";

// CRUD Work
// Read
function getWork() {
  fetch(getUrlWork) // Hämtar med get
    .then(msg => msg.json())
    .then(msg => {
      let output = '<h2>Mina arbeten:</h2><table class="courses">'; // Skriver ut till DOM
      if (msg.data != null) {
        msg.data.forEach(function(work) {
          output += `
                <tr>
                    <th>
                        <h4>Arbetsplats:</h4>
                    </th>
                    <th>
                        <h4>Befattning:</h4>
                    </th>
                    <th>
                        <h4>Arbetsuppgifter:</h4>
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
                        ${work.workplace}
                    </td>
                    <td>
                    ${work.title}
                    </td>
                    <td>
                    ${work.description}
                    </td>
                    <td>
                        ${work.startdate}
                    </td>
                    <td>
                        ${work.stopdate}
                    </td>
                    <td>
                    <button class="update" onclick="openForm(${work.id})">Uppdatera</button>
                    </td>
                    <td>
                    <button class="delete" onclick="deleteWork(${work.id})">Radera</button>
                    </td>
                </tr>
            `;
        });
        output += "</table>";
        document.getElementById("output").innerHTML = output;
      } else {
        document.getElementById("output").innerHTML =
          "<p>Inga arbeten hittades</p>";
      }
    })
    .catch(err => console.log(err));
}
//Create
function addWork(e) {
  // Lägga till arbete med POST
  e.preventDefault();

  let workplace = document.getElementById("workplace").value;
  let title = document.getElementById("title").value;
  let description = document.getElementById("description").value;
  let startdate = document.getElementById("startdate").value;
  let stopdate = document.getElementById("stopdate").value;

  if (
    workplace != "" &&
    title != "" &&
    description != "" &&
    startdate != "" &&
    stopdate != ""
  ) {
    fetch(postUrlWork, {
      method: "POST",
      headers: {
        Accept: "application/json",
        "Content-type": "application/json"
      },
      credentials: "include",
      body: JSON.stringify({
        workplace: workplace,
        title: title,
        description: description,
        startdate: startdate,
        stopdate: stopdate
      })
    }).then(msg => {
      document.getElementById("output").innerHTML = "";
      getWork();
      document.getElementById("workplace").value = "";
      document.getElementById("title").value = "";
      document.getElementById("description").value = "";
      document.getElementById("startdate").value = "";
      document.getElementById("stopdate").value = "";
    });
  }
}

// Delete
function deleteWork(id) {
  // Radera utbildning
  fetch(deleteUrlWork, {
    method: "DELETE",
    body: JSON.stringify({
      id: id
    })
  })
    .then(msg => msg.json())
    .then(data => {
      getWork(); // Läs in arbeten på nytt
    })
    .catch(error => console.log(error));
}

// Update
function updateWork(id) {
  let workplace = document.getElementById("edit_workplace").value;
  let title = document.getElementById("edit_title").value;
  let description = document.getElementById("edit_description").value;
  let startdate = document.getElementById("edit_startdate").value;
  let stopdate = document.getElementById("edit_stopdate").value;

  if (
    workplace != "" &&
    title != "" &&
    description != "" &&
    startdate != "" &&
    stopdate != ""
  ) {
    let json = JSON.stringify({
      id: id,
      workplace: workplace,
      title: title,
      description: description,
      startdate: startdate,
      stopdate: stopdate
    });

    fetch(updateUrlWork, {
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
    updateWork(id);
  };
}

// Dölj formulär
function closeForm() {
  document.getElementById("updateForm").style.display = "none";
}
