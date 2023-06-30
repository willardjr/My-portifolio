<!DOCTYPE html>
<html>
    <head>
        <script src="javascript.js"></script>
        <style>
            header {
                background-color: darkblue;
                padding: 10px;
                text-align: center;
              }
              
              .heading {
                color: white;
                font-size: 36px;
                margin-bottom: 10px;
                font-family: Verdana, Geneva, Tahoma, sans-serif;
              }
              


            .container {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                background-color: seashell;
              }

              .box {
                transition: background-color 0.3s;
                display: flex;
                flex-direction: column;
                align-items: center;
                margin: 20px;
                padding: 20px;
                border: 5px solid brown;
                border-radius: 5px;
                cursor: pointer;
              }
              
              .box:hover {
                background-color: darkblue;
                transition: background-color 0.3s;
              }
              
              .box img {
                width: 150px;
                height: 150px;
              }
              .box.content {
                background-color: darkblue;
                transition: background-color 0.3s;
                display: block;
                margin-top: 10px;
                text-align: center;
              }
              
              .hidden {
                display: none;
              }
              
              .graph {
                position: relative;
                width: 100%;
                height: 30px;
                margin-bottom: 20px;
                background-color: #f2f2f2;
              }
              
              .graph p {
                position: relative;
                text-align: right;
                font-weight: bold;
                font-size: 16px;
                line-height: 30px;
                margin: 0;
                padding: 0 10px;
              }
              
              .graph span {
                position: absolute;
                top: 0;
                left: 0;
                height: 100%;
                background-color: brown;
                transition: transform 0.3s;
              }
              
              .graph:nth-child(1) span {
                width: 30%;
              }
              
              .graph:nth-child(2) span {
                width: 70%;
              }
              
              .graph:nth-child(3) span {
                width: 20%;
              }
              
              .graph:nth-child(4) span {
                width: 60%;
              }
              .graph.active span {
                animation: colorMovement 2s infinite;
              }
              
              @keyframes colorMovement {
                0% {
                  transform: translateX(0%);
                }
                50% {
                  transform: translateX(100%);
                }
                100% {
                  transform: translateX(0%);
                }
              }
              

            
              
              
        </style>
        <title>Skills</title>
    </head>
    <body>
        <header>
            <h1 class="heading">My Knowledge Skills</h1>
          </header>
        
  <?php 
    include 'connect.php';

    $query = "SELECT id, name, description, skill_img FROM skills";
    $result = mysqli_query($connect, $query);

    if (!$result) {
        die("Error: " . mysqli_error($connect));
    }
  ?>
  <div class="container">
  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <div class="box">
      <img src="data:image/jpeg;base64,<?php echo base64_encode($row['skill_img']); ?>" alt="skills Image">
      <h3><?php echo $row['name']; ?></h3>
      <p><?php echo $row['description']; ?></p>
    </div>
  <?php } ?>
</div>

<?php
mysqli_free_result($result);
mysqli_close($connect);
?>
          <header>
            <h1 class="heading">My Skills Graph</h1>
          </header> 
          <main>
            <section id="skills" class="toad-fullscreen">
                 <article class="skills">
                     <div class="graph">
                         <p>Pc Maintanance 30%<span></span><span class="skills"></span></p>
                     </div>
                     <div class="graph">
                         <p>Website Development 70%<span></span><span class="skills"></span></p>
                     </div>
                     
                     <div class="graph">
                         <p>Graphic Design 20%<span></span><span class="skills"></span></p>
                     </div>
                     <div class="graph">
                         <p>Software Development 60%<span></span><span class="skills"></span></p>
                     </div>
                                     </article>
             </section>
         </main>
          <script>
var boxes = document.querySelectorAll('.box');

boxes.forEach(function(box) {
  box.addEventListener('click', function() {
    this.classList.toggle('content');
    var sibling = this.nextElementSibling;
    if (sibling.classList.contains('content')) {
      sibling.classList.remove('content');
    } else {
      sibling.classList.add('content');
    }
  });
});

          </script>
          <script>
            var graphs = document.querySelectorAll('.graph');
graphs.forEach(function(graph) {
  graph.addEventListener('click', function() {
    this.classList.toggle('active');
  });
})
          </script>
    </body>

</html>