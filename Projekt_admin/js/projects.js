/*Webbutveckling III
Elin Larsson HT-19
*/

document.getElementById("addProject").addEventListener("submit", addProject); // För att läsa in till databas
window.addEventListener("load", getProject); // Laddar in kurser från databas

// API URL'er
const getUrlProject =
  "http://localhost/projekt_webbutvecklingIII/projekt_API/api/project/read.php";
const postUrlProject =
  "http://localhost/projekt_webbutvecklingIII/projekt_API/api/project/create.php";
const updateUrlProject =
  "http://localhost/projekt_webbutvecklingIII/projekt_API/api/project/update.php";
const deleteUrlProject =
  "http://localhost/projekt_webbutvecklingIII/projekt_API/api/project/delete.php";

// CRUD Projects
// Read
function getProject() {
  fetch(getUrlProject) // Hämtar med get
    .then(msg => msg.json())
    .then(msg => {
      let output = '<h2>Mina projekt:</h2><table class="courses">'; // Skriver ut till DOM
      if (msg.data != null) {
        msg.data.forEach(function(project) {
          output += `
                <tr>
                    <th>
                        <h4>Titel:</h4>
                    </th>
                    <th>
                        <h4>Webblänk:</h4>
                    </th>
                    <th>
                        <h4>Beskrivning:</h4>
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
                        ${project.title}
                    </td>
                    <td>
                    <a href="${project.url}" target="_blanc">Webblänk</a>
                    </td>
                    <td>
                        ${project.description}
                    </td>
                    <td>
                    <button class="update" onclick="openForm(${project.id})">Uppdatera</button>
                    </td>
                    <td>
                    <button class="delete" onclick="deleteProject(${project.id})">Radera</button>
                    </td>
                </tr>
            `;
        });
        output += "</table>";
        document.getElementById("output").innerHTML = output;
      } else {
        document.getElementById("output").innerHTML =
          "<p>Inga projekt hittades</p>";
      }
    })
    .catch(err => console.log(err));
}
//Create
function addProject(e) {
  // Lägga till projekt med POST
  e.preventDefault();

  let title = document.getElementById("title").value;
  let url = document.getElementById("url").value;
  let description = document.getElementById("description").value;
  let image = document.getElementById("image").value;

  if (title != "" && url != "" && description != "" && image != "") {
    fetch(postUrlProject, {
      method: "POST",
      headers: {
        Accept: "application/json",
        "Content-type": "application/json"
      },
      credentials: "include",
      body: JSON.stringify({
        title: title,
        url: url,
        description: description,
        image: image
      })
    }).then(msg => {
      document.getElementById("output").innerHTML = "";
      getProject();
      document.getElementById("title").value = "";
      document.getElementById("url").value = "";
      document.getElementById("description").value = "";
      document.getElementById("image").value = "";
    });
  }
}

// Delete
function deleteProject(id) {
  // Radera projekt
  fetch(deleteUrlProject, {
    method: "DELETE",
    body: JSON.stringify({
      id: id
    })
  })
    .then(msg => msg.json())
    .then(data => {
      getProject(); // Läs in projekt på nytt
    })
    .catch(error => console.log(error));
}

// Update
function updateProject(id) {
  console.log("bajsröv", id);

  let title = document.getElementById("edit_title").value;
  let url = document.getElementById("edit_url").value;
  let description = document.getElementById("edit_description").value;
  let image = document.getElementById("edit_image").value;

  if (title != "" && url != "" && description != "" && image != "") {
    let json = JSON.stringify({
      id: id,
      title: title,
      url: url,
      description: description,
      image: image
    });

    fetch(updateUrlProject, {
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
    updateProject(id);
  };
}

// Dölj formulär
function closeForm() {
  document.getElementById("updateForm").style.display = "none";
}
