<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style5.css">
  <title>Contacts</title>
</head>
<body>
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

  <div class="container">
    <form id="quotation-form" method="POST" action="">
      <h2>Request a Service</h2>
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" required>
      </div>
      <div class="form-group">
        <label for="quotation">Service name:</label>
        <input type="text" id="quotation" name="quotation" required>
      </div>
      <div class="form-group">
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required>
      </div>
      <div class="form-group">
        <label for="message">Requirements:</label>
        <textarea id="message" name="message" required></textarea>
      </div>
      <button type="submit">Submit</button>
    </form>
  </div>
</div>
<?php

 include 'connect.php';

 $query = "SELECT id, social_accounts, accounts_img FROM contacts";
 $result = mysqli_query($connect, $query);

 if (!$result) {
   die("Error: " . mysqli_error($connect));
 }
 ?>

</body>
</html>
