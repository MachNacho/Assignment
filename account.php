<!-- Connect to databse -->
<?php 
include('components/DBconnect.php');

session_start();

if(isset($_SESSION['user_email'])){

}
else
{
 header("Location: login.php"); 
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jerry's meat shop-Login</title>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link href="css/UserStyle.css?<?=filemtime("css/UserStyle.css")?>" rel="stylesheet" type="text/css"/>
    <link href="css/accountStyle.css?<?=filemtime("css/accountStyle.css")?>" rel="stylesheet" type="text/css"/>
</head>
<body>
<?php
    if(isset($_SESSION['user_email'])){
         echo $_SESSION['user_email'];
       echo"<a href = 'components/logout.php'>Logout</a>";
    }
    ?>
   <?php include('components/UserHeader.php')?>
   <h1 class = "WelcomeMessage">Welcome back <?php echo $_SESSION['user_name']?></h1>
<!-- TODO: ACCOUNT CLASS CONTAINER FOR ACCOUNT INFORMATION -->
   <div class = "accountContainer">
      <div class = "HeaderWrapper">Account Information</div>

      <div class = "infoWrapper">
         <p class = "MainPart">First name:<p>
         <p class = "InfoPart"><?php echo $_SESSION['user_name']?><p>
      </div>

      <div class = "infoWrapper">
         <p class = "MainPart">Last name:<p>
         <p class = "InfoPart"><?php echo $_SESSION['user_surname']?><p>
      </div>

      <div class = "infoWrapper">
         <p class = "MainPart">Email:<p>
         <p class = "InfoPart"><?php echo $_SESSION['user_email']?><p>
      </div>
      <Button name = "btnChange" id = "btnChange" function ="Changes()">Change info</Button>
   </div>

   <?php include('components/UserFooter.php')?>
</body>
<script src = "js/script.js"></script>
</html>