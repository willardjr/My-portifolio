<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
<body >
<header>
    <header>
        <div class="toggle-btn" onclick="toggleMenu()">
          <div class="bar"></div>
          <div class="bar"></div>
          <div class="bar"></div>
        </div>
      </header>
      <nav id="menu">
        <ul>
          <li><a href="home.php">Home</a></li>
          <li><a href="projects.php">Projects</a></li>
          <li><a href="Skills.php">Skills</a></li>
          <li><a href="Contacts.php">Contact</a></li>
        </ul>
      </nav>

      <main>
         <div class="wrap">
          <h1 class="title">Welcome To Willard's Portifolio</h1>
          <p class="content">Hello there! My name is Willard Chati, and I'm a passionate <br>
                        ICT speacialist with a love for <br>
        Software development , web development and cybersecurity. 
            Welcome to my portfolio, where you can explore my work and learn more about me.</p>
        </div>
      </main>
  <script>
    function toggleMenu() {
      var menu = document.getElementById("menu");
      menu.classList.toggle("open");
    }
  </script>
 </body>
  </html>