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
    <link rel="stylesheet" href="css/appointmentmain.css">
    <link rel="stylesheet" href="icon/css/all.css">
</head>
<body>
<header>
        <div class="logo">
            <img src="img/logo.png" alt="">
            <h1>MASJT</h1>
            <h3>Education Consultancy</h3>
        </div>
        <nav>
            <ul class="menu">
                <li><a href="homemain.html">Home</a></li>
                <li class="dropdown">
                    <a href="studyabroad.html" class="dropdown-toggle">Study Abroad</a>
                    <ul class="dropdown-menu">
                        <li><a href="stduk.html">Study in UK</a></li>
                        <li><a href="stdusa.html">Study in USA</a></li>
                        <li><a href="stdcanada.html">Study in CANADA</a></li>
                        <li><a href="stdaustralia.html">Study in AUSTRALIA</a></li>
                        <li><a href="stdrussia.html">Study in RUSSIA</a></li>
                        <li><a href="stdgarmany.html">Study in GERMANY</a></li>
                        <li><a href="stdfrance.html">Study in FRANCE</a></li>
                        <li><a href="stdnetherlands.html">Study in NETHERLANDS</a></li>
                        <li><a href="stdsingapore.html">Study in SINGAPORE</a></li>
                        <li><a href="stdchina.html">Study in CHINA</a></li>
                        <li><a href="stdjapan.html">Study in JAPAN</a></li>
                        <li><a href="stdsouthkorea.html">Study in SOUTH KOREA</a></li>
                        <li><a href="stddubai.html">Study in DUBAI</a></li>
                        <li><a href="stdhungary.html">Study in HUNGARY</a></li>
                        <li><a href="stdmalaysia.html">Study in MALAYSIA</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="scholarship.html" class="dropdown-toggle">Scholarship</a>
                    <ul class="dropdown-menu">
                        <li><a href="scholarshipoffers.html">Scholarship Offers</a></li>
                        <li><a href="scholarshipassistance.html">Scholarship Assistance</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="uni.html" class="dropdown-toggle">Universities</a>
                    <ul class="dropdown-menu">
                        <li><a href="foruk.html">For UK</a></li>
                        <li><a href="forusa.html">For USA</a></li>
                        <li><a href="forcanada.html">For CANADA</a></li>
                        <li><a href="foraustralia.html">For AUSTRALIA</a></li>
                        <li><a href="forrussia.html">For RUSSIA</a></li>
                        <li><a href="forgermany.html">For GERMANY</a></li>
                        <li><a href="forfrance.html">For FRANCE</a></li>
                        <li><a href="fornetherland.html">For NETHERLANDS</a></li>
                        <li><a href="forsingapore.html">For SINGAPORE</a></li>
                        <li><a href="forchina.html">For CHINA</a></li>
                        <li><a href="forjapan.html">For JAPAN</a></li>
                        <li><a href="forsouthkorea.html">For SOUTH KOREA</a></li>
                        <li><a href="fordubai.html">For DUBAI</a></li>
                        <li><a href="forhungary.html">For HUNGARY</a></li>
                        <li><a href="formalaysia.html">For MALAYSIA</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle">Application</a>
                  <ul class="dropdown-menu">
                      <li><a href="#">UNDERGRADUATE</a></li>
                      <li><a href="#">GRADUATE</a></li>
                  </ul>
              </li>
                
                
                <li class="dropdown1">
                    <a href="#" class="dropdown-toggle">About</a>
                    <ul class="dropdown-menu">
                        <li><a href="Aboutus.html">About Us</a></li>
                        <li><a href="#">Check Application Status</a></li>
                        <li><a href="Contactmain.html">Contact</a></li>
                        <li><a href="Predeparturesupport.html">Pre Departure Support</a></li>
                        <li><a href="helpdisk.html">Help Desk</a></li>
                        <li><a href="Feedback&Review.php">Feedback and Review</a></li>
                        <li><a href="logout.php">Log Out</a></li>
                    </ul>
                </li>
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
