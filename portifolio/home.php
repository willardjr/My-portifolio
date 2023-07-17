<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style2.css">
        <title>Home</title>
    </head>
    <body onload="alert('homepage')">
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
            <header>
            <h1>Feedback</h1>
        </header>
            
                <div class="row">
                        <h3 style="text-align:center" >I'd love to hear from you!</h3>
                </div>
                        </div>
          
         <form name="myForm" action="demo_form.asp" onsubmit="return validateForm()" method="post">
      <div class="container">
        Name: <input type="text" name="fname" placeholder="Enter your name">
        Email: <input type="text" name="email" placeholder="Enter your email addresss">
        Phone number: <input type="text" name="pnumber" placeholder="Enter your phone number">
        Message: <input type="text" name="msg">
        <div>
        <button type="submit">Submit</button>
        </div>
      </div>
    </form>
  </div>
  
  <script>
    function validateForm() {
      var fname = document.forms["myForm"]["fname"].value;
      var email = document.forms["myForm"]["email"].value;
      var pnumber = document.forms["myForm"]["pnumber"].value;
      var msg = document.forms["myForm"]["msg"].value;
      
      if (fname === "" || email === "" || pnumber === "" || msg === "") {
        alert("All fields must be filled out");
        return false;
      }
    }
  </script>

 </form>
        
</body>

</html>