<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style2.css">
        <title>Home</title>
    </head>
    <body>
        <header>
            <h1>Featured Projects</h1>
        </header>
        <?php 
    include 'connect.php';

    $query = "SELECT name, project_img FROM projects";
    $result = mysqli_query($connect, $query);

    if (!$result) {
        die("Error: " . mysqli_error($connect));
    }
        ?>
     <div class="centre">
        
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
      <div class="wrapper">
      <div class="inner">
      <div class="card">
      <img src="data:image/jpeg;base64,<?php echo base64_encode($row['project_img']); ?>" alt="Project Image">
        <h1><?php echo $row['name']; ?></h1>
      </div>
    </div>
    </div>
    <?php } ?>
  </div>
  <?php
    mysqli_free_result($result);
    mysqli_close($connect);
  ?>
  
          </div>
          <form>
            <div class="container">
                <div class="row">
                        <h1>Feedback</h1>
                </div>
                <div class="row">
                        <h3 style="text-align:center" >I'd love to hear from you!</h3>
                </div>
                        </div>
                        <div class="text">
                            <div class="input wide">
                                <textarea required></textarea>
                                <label>Message</label>
                            </div>
                        </div>
                        <div class="submit">
                            <div class="btn-lrg submit-button">Send Message</div>
                        </div>
                </div>
            </div>
        </form>
        
    </body>

</html>