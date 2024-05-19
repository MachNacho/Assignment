<!-- Connect to databse -->
<?php 
include('components/DBconnect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jerry's meat shop-Register</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/x-icon" href="assets/logoIcon.ico">
    <link href="css/UserStyle.css?<?=filemtime("css/UserStyle.css")?>" rel="stylesheet" type="text/css"/>
    <link href="css/loginStyle.css?<?=filemtime("css/loginStyle.css")?>" rel="stylesheet" type="text/css"/>
</head>

<body>
<?php include('components/UserHeader.php')?>
<form action="UserRegister.php" method="POST">
  <div class = "login-container">
    <h3>Register</h3>
    <!-- Input wrappers -->
    <div class = "login-wrapper">
      <input type="Text" name = "firstName" required placeholder="Enter First Name">
      <box-icon name='id-card'></box-icon>
    </div>

    <div class = "login-wrapper">
      <input type="Text" name = "lastName" required placeholder="Enter surname">
      <box-icon name='id-card' ></box-icon></box-icon>
    </div>

    <div class = "login-wrapper">
      <input type="email" name = "email" required placeholder="Enter email">
      <box-icon name='envelope'></box-icon>
    </div>

    <div class = "login-wrapper">
    <input type="password" name = "password" required placeholder="Enter password">
    <box-icon name='lock-alt' ></box-icon>
    </div>

    <!-- Button -->
    <input type = "submit" value = "Register" id="loginSubmit" name = "register">
    <!--Forget button  -->
    <div class = "forgetWrapper" >
    <p>Forgot Password <a href = "ForgetPassword.php">Click here</a></p>
    </div>
    <div class = "forgetWrapper" >
    <p>Have an account <a href = "Userlogin.php">Click here</a></p>
    </div>
  </div>
</form>


<?php include('components/UserFooter.php')?>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>
</html>


<?php  
if(isset($_POST['register']))  
{  
  //variables for values to be inserted
  $user_firstName=$_POST['firstName'];   
  $user_lastName=$_POST['lastName'];
  $user_pass= password_hash($_POST['password'], PASSWORD_DEFAULT);// password hashed for security
  $user_email=$_POST['email'];
  
  //here query check weather if user already registered so can't register again.  
  $check_email_query="select * from customer WHERE email='$user_email'";  
  $run_query=mysqli_query($conn,$check_email_query);  
  
  if(mysqli_num_rows($run_query)>0)  
  {  
    // script to alert user of used email
    echo "<script>alert('Email $user_email is already exist in our database, Please try another one!')</script>";  
    exit();  
  }  
  //insert the user into the database.  
  $insert_user="insert into customer(Firstname,Lastname,email,userpassword) VALUE ('$user_firstName','$user_lastName','$user_email','$user_pass')";  
  if(mysqli_query($conn,$insert_user))  
  {  
    // switches to login for user to log in with information
    echo"<script>window.open('Userlogin.php','_self')</script>";  
  }  
} 
?>  