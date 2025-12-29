<?php

@include 'config.php';

session_start();

if (isset($_POST['submit'])) {
    
    $name = isset($_POST['name']) ? mysqli_real_escape_string($conn, $_POST['name']) : '';
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
    $passportnumber = isset($_POST['passportnumber']) ? mysqli_real_escape_string($conn, $_POST['passportnumber']) : '';
    $number = isset($_POST['number']) ? mysqli_real_escape_string($conn, $_POST['number']) : '';
    $password = isset($_POST['pass']) ? md5($_POST['pass']) : '';
    $user_type = isset($_POST['user_type']) ? $_POST['user_type'] : '';
    $verified_id = isset($_POST['verified_id']) ? mysqli_real_escape_string($conn, $_POST['verified_id']) : '';

    
    $select = "SELECT * FROM information_db WHERE passportnumber = '$passportnumber' AND password = '$password' AND verified_id = '$verified_id'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

       
        if ($row['user_type'] == 'admin') {
            $_SESSION['admin_name'] = $row['name'];
            header('location:admin_page.php');
        } elseif ($row['user_type'] == 'user') {
            $_SESSION['user_name'] = $row['name'];
            header('location:user_page.php');
        }
    } else {
        $error[] = 'incorrect passportnumber or password or verified_id!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/Loginstyle.css">
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
    <div class="img">
        <img src="img/home.png" alt="">
    </div>
    <!-----------------login------------------>
    <div class="container">
        <div class="form-box">
            <form action="#" method="post" class="Loginform">
                <h2>Log In</h2>
                <?php
                if (isset($error)) {
                    foreach ($error as $err) {
                        echo '<span class="error-msg">' . $err . '</span>';
                    }
                }
                ?>
                <div class="input-box">
                    <input type="text" name="passportnumber" required>
                    <label>Passport Number</label>
                    <i class="fa-solid fa-passport"></i>
                </div>
                <div class="input-box">
                    <input type="password" name="pass" required>
                    <label>Password</label>
                    <i class="fa-solid fa-lock"></i>
                </div>
                <div class="input-box">
                    <input type="text" name="verified_id" required>
                    <label>Verified Code</label>
                    <i class="fa-solid fa-user-check"></i>
                </div>
                <input type="submit" name="submit" value="Sign In" class="btn">
                <div class="account-creation">
                    <span>Don't have an account? <a href="Registration Page.php">Register Here</a></span>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
