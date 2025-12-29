<?php
@include 'config.php';

$message = '';

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $feedback = mysqli_real_escape_string($conn, $_POST['feedback']);

    
    $insert = "INSERT INTO question (email, feedback) 
               VALUES ('$email', '$feedback')";
    if (mysqli_query($conn, $insert)) {
        $message = 'Your Question for MASJT submitted successfully!';
    } else {
        $message = 'Failed to submit your question. Please try again.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MASJT Education Consultancy</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="icon/css/all.css">
</head>
<body>
    <!-------------------------Header----------------->
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
   <!----------------------------body------------------------->
   <div class="container">
    <a href="#"><img src="./img/1.png" alt="Example Image"></a>
    <div class="msg">
        <h2>Welcome <samp>to</samp></h2>
        <h1>M.A.S.J.T</h1>
        <h3>Education Consultancy</h3>
        <h4>MASJT Education Consultants is one of the best leading Education Consultancy Firms in Dhaka , Bangladeesh. </h4>
     </div>
</div>
</body>
<!----------------------------------scholarship----------------->
<div class="scholarship">
  <h1><span></span> MASJT  Unlocking Doors to Global Education!</h1>
  <h2>Dream big, and we’ll take the responsibility!</h2>
  <h3>📢 Great News! 🎉</h3>
  <p>Enroll through us and get an assured <strong>2% extra scholarship on your tuition fees</strong> <br>
    along with exclusive career counseling absolutely free!</p>
  <p>Leave the responsibility of reaching your dream destination to us. <br>Contact us today and find the right path to building your future!</p>
  <a href="contact.html" class="contact-button">Contact Here</a>
</div>
<!------------------------appointment------------------>
<div class="consultation-banner">
    <div class="consultation-content">
        <div class="text">
            <h1>Get a free consultation</h1>
            <p>Book an appointment with our experienced consultants to discuss your study abroad options.</p>
        </div>
        <div class="button-container">
            <a href="appointment.php" class="btn">BOOK AN APPOINTMENT</a>
        </div>
    </div>
</div>
<!--------------------our characteristics-------------->
<section class="why-choose-us">
    <div class="header">
        <h1>Why Choose MASJT?</h1>
        <p>In confusion, many can't decide where to get proper guidance for their desired aim, and sometimes it can be an unwise decision.</p>
    </div>
    <div class="features">
        <div class="feature-box">
            <h3>Experience</h3>
            <p>Experience - all that matters! Having more than 16+ years of experience in education consultancy, MASJT Education Consultants...</p>
        </div>
        <div class="feature-box">
            <h3>Transparency</h3>
            <p>Straight Talk is Good Business! Our services are our commitments to you, and we deliver what we commit...</p>
            
        </div>
        <div class="feature-box">
            <h3>Pastoral Care</h3>
            <p>We look at consultancy differently! We are highly clinical to take care of your problems and remain focused...</p>
            
        </div>
        <div class="feature-box">
            <h3>Authorized Agent</h3>
            <p>Our excellent network with universities helps us to deliver superlative services to our students. We provide end-to-end...</p>
            
        </div>
        <div class="feature-box">
            <h3>Intelligence and Skill</h3>
            <p>Practical wisdom, trusted advice! Our success rate with visa applications and admissions is one of the highest...</p>
           
        </div>
        <div class="feature-box">
            <h3>Long-Term Relationship</h3>
            <p>Business is our signature! At MASJT, we are committed to providing much more than excellent education consultancy...</p>
            
        </div>
    </div>
</section>
<!------------------our quality----------->
<section class="stats-section">
    <div class="stat-item">
        <i class="fa-regular fa-pen-to-square"></i>
      <h2>16+</h2>
      <p>Years of Experience</p>
    </div>
    <div class="stat-item">
        <i class="fa-solid fa-earth-americas"></i>
      <h2>30+</h2>
      <p>Countries</p>
    </div>
    <div class="stat-item">
        <i class="fa-solid fa-landmark"></i>
      <h2>100+</h2>
      <p>Universities</p>
    </div>
    <div class="stat-item">
        <i class="fa-solid fa-user-graduate"></i>
      <h2>2000+</h2>
      <p>Success Story</p>
    </div>
  </section>
<!----------------Why are different-------------->
<section class="why-different">
    <h1>Why we are different?</h1>
    <p class="tagline">What makes us different makes us better.</p>
    <p class="description">
      We are distinctive in the quality of our services and stand out of the crowd. Unlike other consultancy firms in Bangladesh, we really care for our students. We always strive to give the best possible guidelines and solutions that a student may require. Our experienced consultants and in-house lawyer are always at hand to prepare your visa application documents in a perfect way.
    </p>
    <div class="stats">
      <div class="stat-item">
        <div class="circle">100%</div>
        <p>Free Advice</p>
      </div>
      <div class="stat-item">
        <div class="circle">100%</div>
        <p>Satisfied Clients</p>
      </div>
      <div class="stat-item">
        <div class="circle">93%</div>
        <p>Visa Success</p>
      </div>
    </div>
  </section>
  <!--------------------------comment------------------>
  <div class="main">
    <div class="feedback-form">
        <h1>For any question</h1>
        <?php if ($message): ?>
        <div class="message <?php echo (strpos($message, 'successfully') !== false) ? '' : 'error'; ?>">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>
        <form id="feedbackForm" action="#" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            
            <label for="feedback">For Question: </label>
            <textarea id="feedback" name="feedback" rows="5" placeholder="Enter your question what you want to know?" required></textarea>

            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</div>
  <!------------------footer----------------------->
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
