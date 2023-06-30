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
  <div class="map">
              <button class="active first"></button>
              <button class="second"></button>
              <button class="third"></button>
            </div>
          </div>
          <form>
            <div class="container">
                <div class="row">
                        <h1>Feedback</h1>
                </div>
                <div class="row">
                        <h3 style="text-align:center" >I'd love to hear from you!</h3>
                </div>
                <div class="row input-container">
                        <div class="col-xs-12"> 
                            <div class="styled-input wide">
                                <input type="text" required />
                                <label>Name</label> 
                            </div>
                        </div>
                        <div class="email">
                            <div class="styled-input">
                                <input type="text" required />
                                <label>Email</label> 
                            </div>
                        </div>
                        <div class="phone">
                            <div class="styled-input" style="float:right;">
                                <input type="text" required />
                                <label>Phone Number</label> 
                            </div>
                        </div>
                        <div class="text">
                            <div class="styled-input wide">
                                <textarea required></textarea>
                                <label>Message</label>
                            </div>
                        </div>
                        <div class="submit">
                            <div class="btn-lrg submit-btn">Send Message</div>
                        </div>
                </div>
            </div>
        </form>
        <script>
            window.addEventListener("DOMContentLoaded", function() {
                const slides = document.querySelectorAll(".card");
                const buttons = document.querySelectorAll(".map button");
        
                let currentSlide = 0;
        
                function showSlide(n) {
                    slides.forEach(function(slide) {
                        slide.style.transform = `translateX(-${n * 100}%)`;
                    });
                }
        
                function activateButton(n) {
                    buttons.forEach(function(button) {
                        button.classList.remove("active");
                    });
                    buttons[n].classList.add("active");
                }
        
                function nextSlide() {
                    currentSlide = (currentSlide + 1) % slides.length;
                    showSlide(currentSlide);
                    activateButton(currentSlide);
                }
        
                function prevSlide() {
                    currentSlide = (currentSlide - 1 + slides.length) % slides.length;
                    showSlide(currentSlide);
                    activateButton(currentSlide);
                }
        
                buttons.forEach(function(button, index) {
                    button.addEventListener("click", function() {
                        showSlide(index);
                        activateButton(index);
                        currentSlide = index;
                    });
                });
        
                setInterval(nextSlide, 5000); 
            });

            //form validation
            function validateForm() {
                var nameInput = document.getElementById("nameInput");
                var emailInput = document.getElementById("emailInput");
                var phoneInput = document.getElementById("phoneInput");
                var messageInput = document.getElementById("messageInput");
                
                if (nameInput.value.trim() === "") {
                    alert("Please enter your name");
                    return false;
                }
                
                if (emailInput.value.trim() === "") {
                    alert("Please enter your email");
                    return false;
                } else if (!isValidEmail(emailInput.value.trim())) {
                    alert("Please enter a valid email");
                    return false;
                }
                
                if (phoneInput.value.trim() === "") {
                    alert("Please enter your phone number");
                    return false;
                }
                
                if (messageInput.value.trim() === "") {
                    alert("Please enter a message");
                    return false;
                }
                
                alert("Form submitted successfully!");
                return true;
            }
            
            function isValidEmail(email) {
                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailRegex.test(email);
            }


        </script>
        
    </body>

</html>