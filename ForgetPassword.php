<?php 
// Connect to databse 
include('components/DBconnect.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jerry's meat shop-Forget password</title>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/x-icon" href="assets/logoIcon.ico">
    <link href="css/UserStyle.css?<?=filemtime("css/UserStyle.css")?>" rel="stylesheet" type="text/css"/>
    <link href="css/loginStyle.css?<?=filemtime("css/loginStyle.css")?>" rel="stylesheet" type="text/css"/>
</head>

<body>
<?php include('components/UserHeader.php')?>
<form action="ForgetPassword.php" method="POST">
  <div class = "login-container">
    <h3>Change password</h3>
    <!-- Input wrappers -->
    <div class = "login-wrapper">
      <input type="email" name = "email" required placeholder="enter email">
      <box-icon name='envelope'></box-icon>
    </div>
    
    <div class = "login-wrapper">
    <input type="password" name = "password" required placeholder="enter password">
    <box-icon name='lock-alt' ></box-icon>
    </div>
   <!-- Error wrapper -->
   <div class = "Error-wrapper" id = "loginError">
      Invalid email or email not found
    </div>

    <!-- Button -->
    <input type = "submit" value = "Change" id="loginSubmit" name = "Change">
    
  </div>
</form>

<?php include('components/UserFooter.php')?>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>
</html>

<?php

if(isset($_POST['Change'])) {
  $user_pass= password_hash($_POST['password'], PASSWORD_DEFAULT);
  $user_email=$_POST['email'];
  $check_email_query="select * from customer WHERE email='$user_email'";  
    $run_query=mysqli_query($conn,$check_email_query);  
  
  if(mysqli_num_rows($run_query)==0)  
  { 
    echo "<script>
    document.getElementById('loginError').style.display = 'block';
    </script>"; 
    exit();  
  }
  $changeUserPass="update customer SET userpassword = '$user_pass' WHERE email = '$user_email'";
  if ($conn->query($changeUserPass) === TRUE) {
    header("Refresh:1; url=account.php");

} else {
  echo "<script>
  document.getElementById('loginError').style.display = 'block';
  document.getElementById('loginError').innerHTML = 'Can't reach service';
  </script>"; 
}
}
?>