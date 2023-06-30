<!DOCTYPE html>
<html>
    <head>
        
    <link rel="stylesheet" href="style3.css">

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
    </body>

</html>