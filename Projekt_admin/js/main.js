/*Webbutveckling III
Elin Larsson HT-19
*/

document.getElementById("addProject").addEventListener("submit", addProject); // För att läsa in till databas
window.addEventListener("load", getText); // Laddar in kurser från databas

function getText() {
  fetch(
    "http://localhost/projekt_webbutvecklingIII/projekt_API/api/project/read.php"
  ) // Hämtar med get
    .then(msg => msg.json())
    .then(msg => {
      let output = '<h2>Mina projekt:</h2><table class="courses">'; // Skriver ut till DOM
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
                        <h4>Beskrivning</h4>
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
                </tr>
            `;
      });
      output += "</table>";
      document.getElementById("output").innerHTML = output;
    })
    .catch(err => console.log(err));
}

function addProject(e) {
  // Lägga till kurser med POST
  e.preventDefault();

  let title = document.getElementById("title").value;
  let url = document.getElementById("url").value;
  let description = document.getElementById("description").value;
  let image = document.getElementById("image").value;

  if (title != "" && url != "" && description != "" && image != "") {
    fetch(
      "http://localhost/projekt_webbutvecklingIII/projekt_API/api/project/create.php",
      {
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
      }
    ).then(msg => {
      document.getElementById("output").innerHTML = "";
      getText();
      document.getElementById("title").value = "";
      document.getElementById("url").value = "";
      document.getElementById("description").value = "";
      document.getElementById("image").value = "";
    });
  }
}
