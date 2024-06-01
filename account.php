<?php
session_start();
if (isset($_SESSION['user_email'])) {
} else {
   header("Location: Userlogin.php");
};
include_once("<components/DBconnect.php");

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
            <button>TEST 1</button>
         </nav>
         <div>
            <?php
            $UserID = $_SESSION['user_id'];
            $sql = "SELECT * FROM `orders` WHERE customerID = $UserID";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
               $ID = $row['OrderID'];
               $OF =$row['OrderFullName'];
               $OE = $row['OrderEmail'];   
               $OA= $row['OderAddress']; 
               $OC=$row['OrderCity'];
               $OP= $row['OrderProvince'];
               $OPC= $row['OrderPostalCode'];
               $OPO =$row['OrderPaymentOption'];
               $OCN= $row['OrderCardName'];   
               $OCNU= $row['OrderCardNum'];
               $OEM= $row['OrderExpMonth'];
               $OEY= $row['OrderExpYear'];
               $OCV= $row['OrderCVV'];
               $OD = $row['OrderDate'];
               $CID = $row['customerID'];
               $OSS= $row['OrderStatus'];
               echo"
               <div class = 'OrderForm' id = 'OrderForm$ID'>
                  <p>Order id: $ID</p>
                  <p>Order id: $OF</p>
                  <p>Order id: $OE</p>
                  <p>Order id: $OA</p>
                  <p>Order id: $OC</p>
                  <p>Order id: $OP</p>
                  <p>Order id: $OPC</p>
                  <p>Order id: $OPO</p>
                  <p>Order id: $OCN</p>
                  <p>Order id: $OCNU</p>
                  <p>Order id: $OEM</p>
                  <p>Order id: $OEY</p>
                  <p>Order id: $OCV</p>
                  <p>Order id: $OD</p>
                  <p>Order id: $CID</p>
                  <p id = 'PurchaseStat'>Order id: $OSS</p>
               </div>
               ";
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


   function openOrder() {
      document.getElementById('AccountDetails').style.display = 'none'
      document.getElementById('orderDetails').style.display = 'block'
   }
</script>

</html>