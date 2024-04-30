<?php
   session_start();
   include('DBconnect.php');
   if(empty($_SESSION['user_id'])){
      header('location:../Userlogin.php');
   }else{
    $pid = $_GET['btnProductID'];

    $check_product_query="select * from cart WHERE ProductID='$pid'";
    $run_query=mysqli_query($conn,$check_product_query);

    if(mysqli_num_rows($run_query)>0)  
    {  
      $sql = "UPDATE cart SET quantity=quantity+1 WHERE ProductID = $pid";
      if ($conn->query($sql) === TRUE) {
      }
    }
    else{
      $insert_cart = $conn->prepare("INSERT INTO `cart`(customerID, ProductID,quantity) VALUES(?,?,?)");
      $insert_cart->execute([$_SESSION['user_id'], $pid,1]);
    }
  
    header('location:../shop.php');
   }
?>