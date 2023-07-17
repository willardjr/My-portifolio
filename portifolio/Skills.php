<!DOCTYPE html>
<html>
    <head>
        
    <link rel="stylesheet" href="Style3.css">

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

<header>
  <h1 class="heading">Skills graph</h1>
 </header>

<div class="container">
<div class="skill">
  <h1>  skills</h1>

  <li><h3>html 70%</h3>
    <span class="bar"><span class="html"></span></span>
  </li>
  <li><h3>Css 50%
  </h3>
    <span class="bar"><span class="css"></span></span>
  </li>
  <li><h3>javascript 30%</h3>
    <span class="bar"><span class="javascript"></span></span>
  </li>
  <li><h3>php 60%</h3>
    <span class="bar"><span class="php"></span></span>
  </li>
  </div>
  </div>

<?php
mysqli_free_result($result);
mysqli_close($connect);
?>     
    </body>

</html>