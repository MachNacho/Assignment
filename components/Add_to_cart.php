<?php
   session_start();
   $_SESSION['CartCount'];
   include('DBconnect.php');
   if(empty($_SESSION['user_id'])){
      header('location:../login.php');
   }else{
    $pid = $_GET['btnProductID'];
    $insert_cart = $conn->prepare("INSERT INTO `cart`(Userid, ProductID) VALUES(?,?)");
    $insert_cart->execute([$_SESSION['user_id'], $pid]);
    header('location:../shop.php');
   }
?>