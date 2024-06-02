<?php
session_start();
if (isset($_SESSION['user_email'])) {
} else {
   header("Location: Userlogin.php");
};
include_once("components/DBconnect.php");
include_once("components/LoadOrders.php");
include("components/OrderClass.php");
$OrdersARR = array();
$OrdersItems = array();

while ($row = $result->fetch_assoc()) {
   $order = new Order(
      $row['OrderID'],
      $row['OrderFullName'],
      $row['OrderEmail'],
      $row['OderAddress'],
      $row['OrderCity'],
      $row['OrderProvince'],
      $row['OrderPostalCode'],
      $row['OrderPaymentOption'],
      $row['OrderCardName'],
      $row['OrderCardNum'],
      $row['OrderExpMonth'],
      $row['OrderExpYear'],
      $row['OrderCVV'],
      $row['OrderDate'],
      $row['customerID'],
      $row['OrderStatus']
   );
   $OrdersARR[$row['OrderID']] = $order;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <link rel="icon" type="image/x-icon" href="assets/logoIcon.ico">
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Jerry's meat shop-Account</title>
   <link href="css/UserStyle.css?<?= filemtime("css/UserStyle.css") ?>" rel="stylesheet" type="text/css" />
   <link href="css/accountStyle.css?<?= filemtime("css/accountStyle.css") ?>" rel="stylesheet" type="text/css" />
</head>

<body>
   <?php include('components/UserHeader.php') ?>
   <nav class='accountNav'><button id='orderAccount' onclick="openAccount()">Account info</button><button id='orderInfo' onclick="openOrder()">Order info</button></nav>
   <div class='AccountDetails' id='AccountDetails'>
      <h1 class="WelcomeMessage">Welcome back <?php echo $_SESSION['user_name'] ?></h1>

      <div class="accountContainer">
         <div class="HeaderWrapper">Account Information</div>

         <div class="infoWrapper">
            <p class="MainPart">First name:
            <p>
            <p class="InfoPart"><?php echo $_SESSION['user_name'] ?>
            <p>
         </div>

         <div class="infoWrapper">
            <p class="MainPart">Last name:
            <p>
            <p class="InfoPart"><?php echo $_SESSION['user_surname'] ?>
            <p>
         </div>

         <div class="infoWrapper">
            <p class="MainPart">Email:
            <p>
            <p class="InfoPart"><?php echo $_SESSION['user_email'] ?>
            <p>
         </div>
         <form method="post" action="account.php">
            <Button class="btnModify" name="btnChange" id="btnChange">Change info</Button>
            <Button class="btnModify" name="btnDelete" id="btnDelete">Delete Account</Button>
         </form>

         <?php
         include("components/userEdit.php");
         if (isset($_POST['btnDelete'])) {
            userRemoval($_SESSION['user_id']);
         }
         if (isset($_POST['btnChange'])) {
            header("Location:Changepage.php");
         }
         ?>
      </div>

   </div>
   <div id='orderDetails' class='orderDetails'>
      <div class='divWrapper'>
         <nav>
            <?php
            foreach ($OrdersARR as $x) {
               $y = $x->getOrderID();
               echo "<button onclick='openOrderInfo($y)'>Order # $y</button>";
            } ?>
         </nav>
         <div>
            <?php
            foreach ($OrdersARR as $x) {
               $y = $x->displayOrderDetails();
               $w = $x->getOrderID();
               $sql = "SELECT * FROM `orderitems` WHERE OrderID = $w";
               $result = $conn->query($sql);
               echo "<div class = 'contItems' id = 'Items$w'>";
               echo"<h4>List items</h4>";
               while ($row = $result->fetch_assoc()) {
                  $x = $row['OrderitemsID'];
                  $l = $row['OrderID'];
                  $o = $row['Quantity'];
                  $y = $row['Price'];
                  $z = $row['Name'];
                  echo "<div>$l $x $y $z</div>";
               }
               echo"</div>";

            }
            ?>
         </div>
      </div>

   </div>

   <?php include('components/UserFooter.php') ?>
</body>

<script>
   function openAccount() {
      document.getElementById('AccountDetails').style.display = 'block'
      document.getElementById('orderDetails').style.display = 'none'
   }

   function openOrderInfo(P) {
      const collection = document.getElementsByClassName("OrderForm");
      const collection1 = document.getElementsByClassName("contItems");
      for (let x of collection) {
         x.style.display = 'none'
      }
      
      for (let x of collection1) {
         x.style.display = 'none'
      }
      let s = 'order-details' + P;
      let r = 'Items' + P;
      document.getElementById(s).style.display = 'block'
      document.getElementById(r).style.display = 'block'
   }

   function openOrder() {
      document.getElementById('AccountDetails').style.display = 'none'
      document.getElementById('orderDetails').style.display = 'block'
   }
</script>

</html>