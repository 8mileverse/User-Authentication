<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
    header('location:Admin.php');
};

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<div class="container">
    <div class="content">
        <h3>Hi, Admin 🖐🖐</h3>
        
        <h1><i>Welcome</i> <span><?php echo $_SESSION['admin_name']?></span></h1>

        <p>This is an Admin Page</p>

        <a href="Login_Form.php" class="btn">Log In</a>

        <a href="Register.php" class="btn">Register</a>

        <a href="Forget.php" class="btn">Forget</a>





    </div>
</div>

</body>
</html>