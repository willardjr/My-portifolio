<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style4.css">
  <title>Projects</title>

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
</body>
</html>
