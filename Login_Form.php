<?php

@include 'config.php';

if(isset($_POST['Submit'])){

    
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = md5($_POST['password']);
    


    $select = "SELECT * FROM  user_form WHERE email = '$email' && password ='$password' ";

    $result =mysqli_query($conn, $select);

    if(mysqli_num_rows($result) >0 ){
        $error ="User already exists!";
       
        $row =mysqli_fetch_array($result);
        if($row['user_type'] =='Admin'){
            $_SESSION['admin_name'] = $row['name'];
            header('location:Admin.php');
        }
        elseif($row['user_type'] =='User'){
            $_SESSION['User_name'] = $row['name'];
            header('location:User.php');

        };




    }
    
    else{
        $error[] ='incorrect email or password!';
    }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <form action="" method="post">
           
           <h3>Login Form</h3>

           <?php
if(isset($error)){
    foreach($error as $error){
        echo '<Span class="error-msg">'.$error.'</span>';

    };
};

?>

           
            <input type="email" name="email" id="" required placeholder="Enter Your Email">
            <input type="Password" name="password" id="" required placeholder="Enter Your Password">

            
            <input type="submit" name="Submit" value="Login Now" class="form-btn">

            <p>Don't have an Account? <a href="Register.php">Register Now</a></p>


        </form>
    </div>
</body>
</html>