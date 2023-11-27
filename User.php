<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['User_name'])){
    header('location:Login_Form.php');
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<div class="container">
    <div class="content">
        <h3>Hi, User 🖐🖐</h3>
        
        <h1><i>Welcome</i> <span><?php echo $_SESSION['User_name'] ?> </span></h1>

        <p>This is an User Page</p>

        <a href="Login_Form.php" class="btn">Log In</a>

        <a href="Register.php" class="btn">Register</a>

        <a href="Forget.php" class="btn">Forget</a>





    </div>
</div>

</body>
</html>