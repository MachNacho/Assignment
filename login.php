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
    <title>Jerry's meat shop-Login</title>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link href="css/UserStyle.css?<?=filemtime("css/UserStyle.css")?>" rel="stylesheet" type="text/css"/>
    <link href="css/loginStyle.css?<?=filemtime("css/loginStyle.css")?>" rel="stylesheet" type="text/css"/>
</head>

<body>
<form action="login.php" method="POST">
  <div class = "login-container">
    <h3>Login</h3>
    <!-- Input wrappers -->
    <div class = "login-wrapper">
      <input type="email" name = "email" required placeholder="enter email">
      <box-icon name='envelope'></box-icon>
    </div>

    <div class = "login-wrapper">
    <input type="password" name = "password" required placeholder="enter password">
    <box-icon name='lock-alt' ></box-icon>
    </div>

    <!-- Button -->
    <input type = "submit" value = "Login" id="loginSubmit" name = "login">

    <!--Forget button  -->
    <div class = "forgetWrapper" >
    <p>Forgot Password <a href = "">Click here</a></p>
    </div>
    <div class = "forgetWrapper" >
    <p>Don't have an account <a href = "UserRegister.php">Click here</a></p>
    </div>
  </div>
</form>



<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>
</html>

<?php
if(isset($_POST['login']))  
  {  
    $user_pass= $_POST['password'];
    $user_email=$_POST['email'];
  
    $check_email_query="select * from customer WHERE email='$user_email'";  
    $run_query=mysqli_query($conn,$check_email_query);  
  
    if(mysqli_num_rows($run_query)<0)  
    { 
      echo "<script>alert('Invalid account details')</script>";  
      exit();  
    }
    else{
      while($row = mysqli_fetch_assoc($run_query)) {
        $password = $row["Password"];
        $check = password_verify($user_pass,$password);
        if($check == true)
        {
          $_SESSION['user_email'] = $user_email; 
          echo"<script>window.open('index.php','_self')</script>"; 
        }
        else{

        }
      }
    }
  }
?>