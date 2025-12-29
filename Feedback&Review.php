<?php
@include 'config.php'; 

$message = '';

if (isset($_POST['submit'])) {
    
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $rating = (int)$_POST['rating'];  
    $feedback = mysqli_real_escape_string($conn, $_POST['feedback']);

   
    $select = "SELECT * FROM feedback_review WHERE email = '$email'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $message = 'You already submitted your valuable feedback for MASJT.'; 
    }
    else {
       
        $insert = "INSERT INTO feedback_review (email, rating, feedback) 
                   VALUES ('$email', '$rating', '$feedback')";
        if (mysqli_query($conn, $insert)) {
            $message = 'Your valuable feedback for MASJT submitted successfully!';
        } else {
            $message = 'Error while inserting data: ' . mysqli_error($conn); 
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback & Review</title>
    <link rel="stylesheet" href="css/Feedback&Review.css">
  
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
    <!---------------img-------------->
    <div class="box">
        <img src="img/f&r1.png" alt="Image 1">
        
        <img src="img/f&r2.png" alt="Image 3">
    </div>
    <div class="blur">
        <h1>F&R </h1>
        <h3>MASJT</h3>
    </div>
</div>
    <!--------------------------main---------------->
    
    
    <div class="feedback-form">
        <h1>Feedback & Review</h1>
        <?php if ($message): ?>
        <div class="message <?php echo (strpos($message, 'successfully') !== false) ? '' : 'error'; ?>">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>
        <form id="feedbackForm" action="#" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <label for="rating">Star Rating:</label>
            <div class="stars" id="stars">
                <i class="fa-regular fa-star star" data-value="1"></i>
                <i class="fa-regular fa-star star" data-value="2"></i>
                <i class="fa-regular fa-star star" data-value="3"></i>
                <i class="fa-regular fa-star star" data-value="4"></i>
                <i class="fa-regular fa-star star" data-value="5"></i>
            </div>
            <input type="hidden" id="rating" name="rating" required>

            <label for="feedback">Feedback:</label>
            <textarea id="feedback" name="feedback" rows="5" placeholder="Write your valuable feedback for MASJT" required></textarea>

            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</div>
    <script src="Feedback&Review.js"></script>
<!------------footer----------->
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