<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Verdana, Geneva, Tahoma, sans-serif;
      background-color: #f1f1f1;
    }

    header {
      background-color: darkblue;
      color: #fff;
      padding: 10px;
      text-align: center;
    }

    .container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: center;
      padding: 20px;
      background-color: seashell;
      border: 2px solid brown;
      border-radius: 5px;
      margin: 10px;
    }

    .profile {
      text-align: center;
      margin-bottom: 20px;
    }

    .profile img {
      width: 300px;
      height: 300px;
      border-radius: 50%;
    }

    #text {
      text-align: center;
      margin-bottom: 20px;
      font-size: 20px;
    }

    .icons {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: center;
      margin-top: 10px;
    }

    .icons .icon {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin: 10px;
      color: darkblue;
    }

    .icons img {
      width: 30px;
      height: 30px;
      margin-bottom: 5px;
    }

    form {
      max-width: 400px;
      margin: 0 auto;
    }

    h2 {
      text-align: center;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      font-weight: bold;
    }

    input[type="date"],
    input[type="text"],
    input[type="email"],
    input[type="tel"],
    textarea {
      width: 100%;
      padding: 10px;
      border: 2px solid brown;
      border-radius: 5px;
    }

    button[type="submit"] {
      display: block;
      width: 100%;
      padding: 10px;
      background-color: darkblue;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    button[type="submit"]:hover {
      background-color: #0056b3;
    }
  </style>
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
<?php


$query = "CREATE TABLE IF NOT EXISTS quotation_info (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  phone VARCHAR(20) NOT NULL,
  quotation VARCHAR(255) NOT NULL,
  date DATE NOT NULL,
  message TEXT NOT NULL
)";

$result = mysqli_query($connect, $query);

if (!$result) {
  echo "Error creating table: " . mysqli_error($connect);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Retrieve form data
  $name = $_POST["name"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $quotation = $_POST["quotation"];
  $date = $_POST["date"];
  $message = $_POST["message"];

  // Insert the form data into the "quotation_info" table
  $query = "INSERT INTO quotation_info (name, email, phone, quotation, date, message) VALUES ('$name', '$email', '$phone', '$quotation', '$date', '$message')";
  $result = mysqli_query($connect, $query);

  if ($result) {
    // Data inserted successfully
    echo "Data has been submitted successfully!";
  } else {
    // Error occurred while inserting data
    echo "Error: " . mysqli_error($connect);
  }
}
?>

</body>
</html>
