<?php

@include 'config.php';

if(isset($_POST['Submit'])){

    $FirstName = mysqli_real_escape_string($conn,$_POST['FirstName']);
    $LastName = mysqli_real_escape_string($conn,$_POST['LastName']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];


    $select = "SELECT * FROM  user_form WHERE email = '$email' && password ='$password' ";

    $result =mysqli_query($conn, $select);

    if(mysqli_num_rows($result) >0 ){
        $error ="User already exists!";
    }else{
        if($password != $cpassword){
            $error[] ="password does not match!";
        }else{
            $insert = "INSERT INTO user_form(FirstName, LastName, email, password, user_type ) VALUES('$FirstName', '$LastName', '$email', '$password', '$user_type')";
            mysqli_query($conn,$insert);
            header('location:Login_Form.php');
        }
    }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <form action="" method="post">
           
           <h3>Register Form</h3>
<?php
if(isset($error)){
    foreach($error as $error){
        echo '<Span class="error-msg">'.$error.'</span>';

    };
};

?>
            <input type="text" name="FirstName" id="" required placeholder="Enter Your First Name">
            <input type="text" name="LastName" id="" required placeholder="Enter Your Last Name">
            <input type="email" name="email" id="" required placeholder="Enter Your Email">
            <input type="Password" name="password" id="" required placeholder="Enter Your Password">
            <input type="Password" name="cpassword" id="" required placeholder="Confirm Your Password">

            <select name="user_type" id="">
                <option value="User">Register as a User</option>
                <option value="Admin">Register as an Admin</option>

            </select>
            <input type="submit" name="Submit" value="Register Now" class="form-btn">

            <p>Already have an Account? <a href="Login_Form.php">Login Now</a></p>


        </form>
    </div>
</body>
</html>