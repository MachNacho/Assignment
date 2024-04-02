<!-- Connect to databse -->
<?php 
include('components/DBconnect.php');

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jerry's meat shop-Register</title>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link href="css/UserStyle.css?<?=filemtime("css/UserStyle.css")?>" rel="stylesheet" type="text/css"/>
    <link href="css/loginStyle.css?<?=filemtime("css/loginStyle.css")?>" rel="stylesheet" type="text/css"/>
</head>

<body>
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
    <p>Forgot Password <a href = "">Click here</a></p>
    </div>
    <div class = "forgetWrapper" >
    <p>Have an account <a href = "login.php">Click here</a></p>
    </div>
  </div>
</form>



<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>
</html>


<?php  
if(isset($_POST['register']))  
{  
    $user_firstName=$_POST['firstName'];   
    $user_lastName=$_POST['lastName'];
    $user_pass= password_hash($_POST['password'], PASSWORD_DEFAULT);
    $user_email=$_POST['email'];
  
  //here query check weather if user already registered so can't register again.  
    $check_email_query="select * from customer WHERE email='$user_email'";  
    $run_query=mysqli_query($conn,$check_email_query);  
  
    if(mysqli_num_rows($run_query)>0)  
    {  
      echo "<script>alert('Email $user_email is already exist in our database, Please try another one!')</script>";  
      exit();  
    }  
//insert the user into the database.  
    $insert_user="insert into customer(Firstname,Lastname,email,Password) VALUE ('$user_firstName','$user_lastName','$user_email','$user_pass')";  
    if(mysqli_query($conn,$insert_user))  
    {  
        $_SESSION['user_email'] = $user_email; 
        echo"<script>window.open('index.php','_self')</script>";  
    }  
} 
?>  