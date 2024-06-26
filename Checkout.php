<?php
$UserID;
session_start();
// verifies if user is logged in
if (isset($_SESSION['user_email'])) {
  global $UserID;
  $UserID = $_SESSION['user_id'];
} else {
  header("Location:  Userlogin.php");
};
// remove from Cart table in DB
include('components/DBconnect.php');
if (isset($_POST['btnClear'])) {
  global $UserID;
  $sql = "DELETE FROM cart where customerID = $UserID";
  if ($conn->query($sql) === TRUE) {
  } else {
    echo "Error deleting record: " . $conn->error;
  }
  header("Location:  checkout.php");
}
if (isset($_POST['btnPurchase'])) {
  header("Location:Payment.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jerry's meat shop-Cart</title>
  <link rel="icon" type="image/x-icon" href="assets/logoIcon.ico">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link href="css/UserStyle.css?<?= filemtime("css/UserStyle.css") ?>" rel="stylesheet" type="text/css" />
  <link href="css/cartStyle.css?<?= filemtime("css/cartStyle.css") ?>" rel="stylesheet" type="text/css" />
</head>

<body>
  <?php
  include('components/UserHeader.php');
  ?>

  <h1 class="WelcomeMessage">CART</h1>

  <div class="Cart-container">
    <?php
    include('components/loadCart.php');
    ?>
  </div>


  <div class="button-container">
    <form action='checkout.php' method="post">
      <input type="submit" value="Clear" id="btnClear" name="btnClear">
      <input type="submit" value="Purchase" id="btnPurchase"  name="btnPurchase"<?php if ($a== '0'){ ?> disabled <?php   } ?>>
    </form>

  </div>

  <?php include('components/UserFooter.php') ?>
</body>

</html>