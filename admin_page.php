<?php

@include 'config.php';

session_start();

if (!isset($_SESSION['admin_name'])) {
   header('location:Login Page.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>
   <link rel="stylesheet" href="css/admin.css">

</head>
<body>
<div class="welcome">
      <div class="msg">
      <h2>Welcome <samp>to</samp></h2>
      <h1>M.A.S.J.T</h1>
      <h3>Education Consultancy</h3>
      <h4>Thank you for joining us and helping our Candidates <br> with your best efforts and suggestions.</h4>
   </div>

   </div>
   
<div class="container">

   <div class="content">
      <h3>Hello <span>admin</span></h3>
      <h1>welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
      <p>this is an admin page</p>
      <a href="Registration Page.php" class="btn">Continue</a>

 </div>
 </div>

</body>
</html>