<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style5.css">
  <title>Contacts</title>
</head>
<body onload="alert('I love you customers For Hiring Me')">
<header>
  <h1>Contacts</h1>
</header>
<div class="container">
  <?php
  include 'connect.php';

  $query = "SELECT id, social_accounts, accounts_img FROM contacts";
  $result = mysqli_query($connect, $query);

  if (!$result) {
    die("Error: " . mysqli_error($connect));
  }
  ?>
  <div class="profile">
    <img src="profile5.jpg" alt="image">
  </div>
  <div class="container">
    <p id="text">Name: Willard Chati<br>
      Contact:<br>
      Airtel: +265998799408<br>
      Tnm: +265883325080
    </p>
  </div>

  <div class="icons">
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
      <div class="icon">
        <img src="data:image/jpeg;base64,<?php echo base64_encode($row['accounts_img']); ?>" alt="Account Image">
        <p><?php echo $row['social_accounts']; ?></p>
      </div>
    <?php } ?>
  </div>

  <form id="quotation-form" method="POST" action="" onsubmit="return validateForm()">

      <h2>Request a Service</h2>
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" >
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" >
      </div>
      <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" >
      </div>
      <div class="form-group">
        <label for="quotation">Service name:</label>
        <input type="text" id="quotation" name="quotation" >
      </div>
      <div class="form-group">
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" >
      </div>
      <div class="form-group">
        <label for="message">Requirements:</label>
        <textarea id="message" name="message" ></textarea>
      </div>
      <button type="submit">Submit</button>
    </form>
  </div>
</div>
<script>
  // Function to validate the form
function validateForm() {
  var name = document.getElementById('name').value;
  var email = document.getElementById('email').value;
  var phone = document.getElementById('phone').value;
  var quotation = document.getElementById('quotation').value;
  var date = document.getElementById('date').value;
  var message = document.getElementById('message').value;

  if (name === '' || email === '' || phone === '' || quotation === '' || date === '' || message === '') {
    alert('Please fill in all the required fields');
    return false;
  }
}
</script>


</body>
</html>
