<?php
@include 'config.php';

if (isset($_POST['submit'])) {
    
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

   
    $check_user = "SELECT * FROM appointment_db WHERE email = '$email'";
    $result = mysqli_query($conn, $check_user);

    if (mysqli_num_rows($result) > 0) {
        $error = 'User already exists!';
    } else {
      
        $insert = "INSERT INTO appointment_db(`name`, `email`, `message`) 
                   VALUES('$name', '$email', '$message')";
        if (mysqli_query($conn, $insert)) {
            $success = "Appointment request submitted successfully!";
        } else {
            $error = "Failed to submit request: " . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOK AN APPOINTMENT</title>
    <link rel="stylesheet" href="css/appointment.css">
    <link rel="stylesheet" href="icon/css/all.css">
</head>
<body>
    <header>
        <nav>
            <ul class="nav-bar">
                <li class="logo"><a href="#"><img src="./img/logo.png" alt=""></a>
                    <h1>MASJT</h1>
                    <h3>Education Consultancy</h3>
                </li>
                <span class="menu">
                <li><a href="home.php">Home</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="Facilities.html">Our Facilities</a></li>
                    <li><a href="Registration Page.php">Log In</a></li>
            </span>
            </ul>
        </nav>
    </header>

    <div class="appointment-section">
        <div class="ap">
            <img src="./img/appointment.png" alt="Left Image" class="left">
            <img src="./img/appointment 01.jpg" alt="Right Image" class="right">
        </div>
        <div class="blur">
            <h1>BOOK AN APPOINTMENT</h1>
            <h2></h2>
        </div>
    </div>

    <div class="appointment-container">
        <h1>BOOK AN APPOINTMENT</h1>
        <p>Book an appointment with one of our expert consultants!</p>
        <div class="options">
            <div class="option">
               
                <?php if (isset($success)) { echo "<p style='color: green;'>$success</p>"; } ?>
                <?php if (isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>

                <form class="appointment-form" method="post">
                    <textarea name="message" placeholder="Enter your short information ." required></textarea>
                    <div class="form-row">
                        <input type="text" name="name" placeholder="Enter your full name" required>
                        <input type="email" name="email" placeholder="Enter a valid email account " required>
                    </div>
                    <button type="submit" name="submit" class="submit-button">REQUEST</button>
                </form>
            </div>
        </div>
    </div>


    <!-------------------------footer---------------->
    <footer class="footer">
        <div class="footer-container">
          <div class="footer-item">
            <i class="fa fa-phone"></i>
            <p>
              <strong>Call Us</strong><br>
              +8801775430498
            </p>
          </div>
          <div class="footer-item">
            <i class="fa fa-envelope"></i>
            <p>
              <strong>Email Us</strong><br>
              abdullaalmasud11111@gmail.com
            </p>
          </div>
          <div class="footer-item">
            <i class="fa fa-home"></i>
            <p>
              <strong>Location</strong><br>
              152/2A-2, Hasnabad Bazar , Raipura , Narsingdi , Bangladesh.
            </p>
          </div>
        </div>
        <div class="footer-bottom">
          <p>
            Copyright © MASJT | All rights reserved | 
          </p>
        </div>
      </footer>
</body>
</html>
