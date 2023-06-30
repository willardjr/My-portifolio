<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Projects</title>
  <style>
     body {
      font-family: Verdana, Geneva, Tahoma, sans-serif;
      background-color:seashell;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: darkblue;
      color: #fff;
      padding: 20px;
      text-align: center;
    }

    h1 {
      margin: 0;
      font-size: 28px;
    }

    .project-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 20px;
      padding: 20px;
    }

    .project-card {
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 4px 5px rgba(0, 0, 0, 0.1);
      padding: 20px;
    }

    .project-card img {
      max-width: 100%;
      height: auto;
      border-radius: 5px;
      margin-bottom: 10px;
    }

    .project-card h2 {
      font-size: 20px;
      margin: 0;
      margin-bottom: 10px;
    }

    .project-card p {
      margin: 0;
      text-transform: capitalize;
      text-decoration-color: black
    }
    .buttons{
        text-align: center;
        background-color:seashell;
        background: brown;

    }
    .buttons button{
        border-radius: 10px; 
        padding: 10px 20px; 
        font-size: 16px;
    }
    form {
        margin-bottom: 20px;
      }
      
      form label {
        display: block;
        margin-bottom: 5px;
      }
      
      form input[type="search"] {
        width: 200px;
        padding: 10px;
      }
      
      form button {
        padding: 5px 10px;
        background-color:darkblue;
      }
      
      .project-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
      }
      
      .project-card {
        border: 1px solid #ccc;
        padding: 10px;
      }
    .hide {
      display: none;
    }

  </style>
</head>
<body>
  <header>
    <h1>Projects</h1>
  </header>

  <form id="search-form" onsubmit="event.preventDefault();" role="search">
    <label for="search">Search for Projects</label>
    <input id="search" type="search" placeholder="Search..." autofocus required />
    <button type="submit">Go</button>
  </form>

  <?php 
    include 'connect.php';

    $query = "SELECT id, name, description, start_date, end_date, project_img FROM projects";
    $result = mysqli_query($connect, $query);

    if (!$result) {
        die("Error: " . mysqli_error($connect));
    }
  ?>

  <div class="project-container">
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
      <div class="project-card" data-category="all">
        <img src="data:image/jpeg;base64,<?php echo base64_encode($row['project_img']); ?>" alt="Project Image">
        <h3><?php echo $row['name']; ?></h3>
        <p><?php echo $row['description']; ?></p>
        <p><strong>Start Date:</strong> <?php echo $row['start_date']; ?></p>
        <p><strong>End Date:</strong> <?php echo $row['end_date']; ?></p>
      </div>
    <?php } ?>
  </div>

  <?php
    mysqli_free_result($result);
    mysqli_close($connect);
  ?>

  <div class="buttons">
    <button onclick="filterProjects('all')">All</button>
    <button onclick="filterProjects('web')">Web</button>
    <button onclick="filterProjects('mobile')">Mobile</button>
  </div>

  <script>
    function filterProjects(category) {
      const projectCards = document.querySelectorAll('.project-card');
      projectCards.forEach(card => {
        if (category === 'all' || card.dataset.category === category) {
          card.classList.remove('hide');
        } else {
          card.classList.add('hide');
        }
      });
    }

    document.getElementById("search-form").addEventListener("submit", function(event) {
      event.preventDefault();

      var searchTerm = document.getElementById("search").value.toLowerCase();
      var projectCards = document.querySelectorAll(".project-card");

      projectCards.forEach(function(card) {
        var projectTitle = card.querySelector("h3").textContent.toLowerCase();
        var projectDescription = card.querySelector("p").textContent.toLowerCase();

        if (projectTitle.includes(searchTerm) || projectDescription.includes(searchTerm)) {
          card.classList.remove("hide");
        } else {
          card.classList.add("hide");
        }
      });
    });
  </script>
</body>
</html>
