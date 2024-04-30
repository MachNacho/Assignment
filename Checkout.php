<?php 
$UserID;
session_start();
if(isset($_SESSION['user_email'])){
 global $UserID;
 $UserID = $_SESSION['user_id'];
}
else
{
 header("Location:  Userlogin.php"); 
};
// remove from Cart table in DB
include('components/DBconnect.php');
 if(isset($_POST['btnClear']))
  {
    global $UserID;
    $sql = "DELETE FROM cart where customerID = $UserID";
    if ($conn->query($sql) === TRUE) {
    } else {
      echo "Error deleting record: " . $conn->error;
    }
    header("Location:  checkout.php"); 
  } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jerry's meat shop-Cart</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="css/UserStyle.css?<?=filemtime("css/UserStyle.css")?>" rel="stylesheet" type="text/css"/>
    <link href="css/cartStyle.css?<?=filemtime("css/cartStyle.css")?>" rel="stylesheet" type="text/css"/>
</head>
<body>
<?php
    if(isset($_SESSION['user_email'])){
      echo $_SESSION['user_email'];
      echo"<a href = 'components/logout.php'>Logout</a>";
    }
    include('components/UserHeader.php')
?>

<h1 class = "WelcomeMessage">CART</h1>

<div class = "Cart-container">
<?php
include('components/loadCart.php');
?>
</div>

  <form action = 'checkout.php' method="post">
  <div class = "button-container">
    <input type="submit" value = "Clear" id = "btnClear" name = "btnClear">
    <input type="submit" value = "Purchase" id = "btnPurchase" name = "btnPurchase">
  </div>
  </form>
    <?php include('components/UserFooter.php')?>
</body>
</html>

