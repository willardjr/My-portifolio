//javascript for skiills graph

document.addEventListener("DOMContentLoaded", function() {
    var skills = [
      { skill: "Pc Maintenance", level: "80%" },
      { skill: "Website Development", level: "90%" },
      { skill: "Graphic Design", level: "50%" },
      { skill: "Software Development", level: "85%" }
    ];
  
    var skillsContainer = document.querySelector(".skills");
  
    skills.forEach(function(skill) {
      var skillDiv = document.createElement("div");
      skillDiv.className = "graph";
      skillDiv.innerHTML = `
        <p>${skill.skill}<span class="bar" style="width: ${skill.level};"></span><span class="skills"></span></p>
      `;
      skillsContainer.appendChild(skillDiv);
    });
  });
  
  v
  