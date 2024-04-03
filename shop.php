<!-- Connect to databse -->
<?php 
include('components/DBconnect.php');

session_start();

if(isset($_SESSION['user_email'])){
   $user_id = $_SESSION['user_email'];
}else{
   $user_id = '';
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jerry's meat shop-Shop</title>
    <link href="css/UserStyle.css?<?=filemtime("css/UserStyle.css")?>" rel="stylesheet" type="text/css"/>
    <link href="css/shopStyle.css?<?=filemtime("css/shopStyle.css")?>" rel="stylesheet" type="text/css"/>
</head>
<body>
    <!-- FIXME:BETTER WAY TO FIX -->
<?php
    if(isset($_SESSION['user_email'])){
         echo $_SESSION['user_email'];
       echo"<a href = 'components/logout.php'>Logout</a>";
    }
    ?>
    <?php include('components/UserHeader.php')?>
<!-- TODO Remove loop and make it add to the website database --> 

    <div class="container">
    <?php include('components/LoadDatabse.php')?>
    </div>
   
    <?php include('components/UserFooter.php')?>
</body>
</html>
