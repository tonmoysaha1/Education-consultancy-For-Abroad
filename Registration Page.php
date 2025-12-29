<?php

@include 'config.php';

if (isset($_POST['submit'])) {
    
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $passportnumber = mysqli_real_escape_string($conn, $_POST['passportnumber']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $password = md5($_POST['pass']);
    $user_type = $_POST['user_type']; 

   
    $select = "SELECT * FROM information_db WHERE passportnumber = '$passportnumber' AND password = '$password'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $error[] = 'User already exists!';
    } else {
       
        $insert = "INSERT INTO information_db(`name`, `email`, `password`, `phone number`, `passportnumber`,`user_type`) 
                   VALUES('$name', '$email', '$password', '$number', '$passportnumber', '$user_type')";
        if (mysqli_query($conn, $insert)) {
            header('location:Login Page.php'); 
        } else {
            $error[] = 'Error while inserting data: ' . mysqli_error($conn);
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="css/Regstyle.css">
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
                       <li><a href="home.html">Home</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="Facilities.html">Our Facilities</a></li>
                        <li><a href="Registration Page.php">Log In</a></li>
                </span>
            </ul>
        </nav>
       </header>
    <div class="img">
        <img src="img/home.png" alt="">
    </div>
    <div class="container">
        <div class="form-box">
            <form action="#" method="post">
                <h2>Registration</h2>
                <?php
                if (isset($error)) {
                    foreach ($error as $err) {
                        echo '<span class="error-msg">' . $err . '</span>';
                    }
                }
                ?>
                <div class="input-box">
                    <input type="text" name="name" required>
                    <label>User Name</label>
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="input-box">
                    <input type="text" name="passportnumber" required>
                    <label>Passport Number</label>
                    <i class="fa-solid fa-passport"></i>
                </div>
                <div class="input-box">
                    <input type="email" name="email" required>
                    <label>Email</label>
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <div class="input-box">
                    <select  name="user_type">
                        <option class="user_type" value="user">Candidate</option>
                        <option class="user_type" value="admin">Admin</option>
                        
                     </select>
                     </div>
                <div class="input-box">
                    <input type="number" name="number" required>
                    <label>Phone Number</label>
                    <i class="fa-solid fa-phone"></i>
                </div>
                <div class="input-box">
                    <input type="password" name="pass" required>
                    <label>Password</label>
                    <i class="fa-solid fa-lock"></i>
                </div>
                <input type="submit" name="submit" value="Register Now" class="btn">
                <div class="account-creation">
                    <span>Already have an account? <a href="Login Page.php">Log in</a></span>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
