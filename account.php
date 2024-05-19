<?php 
session_start();
if(isset($_SESSION['user_email'])){
}
else
{
 header("Location: Userlogin.php"); 
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="icon" type="image/x-icon" href="assets/logoIcon.ico">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jerry's meat shop-Account</title>
    <link href="css/UserStyle.css?<?=filemtime("css/UserStyle.css")?>" rel="stylesheet" type="text/css"/>
    <link href="css/accountStyle.css?<?=filemtime("css/accountStyle.css")?>" rel="stylesheet" type="text/css"/>
</head>
<body>
   <?php include('components/UserHeader.php')?>
   <h1 class = "WelcomeMessage">Welcome back <?php echo $_SESSION['user_name']?></h1>
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
      <form method = "post" action="account.php">
      <Button class = "btnModify" name = "btnChange" id = "btnChange">Change info</Button>
      <Button class = "btnModify"  name = "btnDelete" id = "btnDelete" >Delete Account</Button>
      </form>

      <?php
         include("components/userEdit.php");
         if(isset($_POST['btnDelete']))
         {
            userRemoval($_SESSION['user_id']);
         }
         if(isset($_POST['btnChange']))
         {
           header("Location:Changepage.php");
         }
      ?>
   </div>

   <?php include('components/UserFooter.php')?>
</body>
<script src = "js/script.js"></script>
</html>

