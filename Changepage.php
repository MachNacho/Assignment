<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jerry's meat shop-Change Information</title>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link href="css/UserStyle.css?<?=filemtime("css/UserStyle.css")?>" rel="stylesheet" type="text/css"/>
    <link href="css/loginStyle.css?<?=filemtime("css/loginStyle.css")?>" rel="stylesheet" type="text/css"/>
</head>

<body>
<?php include('components/UserHeader.php')?>
<form action="changepage.php" method="POST">
  <div class = "login-container">
    <h3>Edit Information</h3>
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
    <input type = "submit" value = "Change" id="loginSubmit" name = "Change">
  </div>
</form>


<?php include('components/UserFooter.php')?>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>
</html>


<?php 
if(isset($_POST['Change']))  {
  include("components/DBconnect.php");
  session_start();
  $user_firstName=$_POST['firstName'];   
  $user_lastName=$_POST['lastName'];
  $user_pass= password_hash($_POST['password'], PASSWORD_DEFAULT);// password hashed for security
  $user_email=$_POST['email'];
  $USERID = $_SESSION['user_id'];

  $sql = "UPDATE customer SET Firstname='$user_firstName',Lastname='$user_lastName',email='$user_email',userpassword = '$user_pass' WHERE customerID='$USERID'";
  if ($conn->query($sql) === TRUE) {
    $_SESSION['user_email'] = $user_email; 
    $_SESSION['user_name'] = $user_firstName; 
    $_SESSION['user_surname'] =  $user_lastName;
    header("Location:account.php");
  } else {
    echo "Error updating record: " . $conn->error;
  }
 
}

?>  