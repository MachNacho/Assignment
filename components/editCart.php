<?php
include('DBconnect.php');
session_start();
  if(isset($_POST['btnADDquantity']))
  {
    $id = $_POST['btnADDquantity'];
    $sql = "UPDATE cart SET quantity=quantity+1 WHERE cartID = $id";
    if ($conn->query($sql) === TRUE) {
    }
    mysqli_close($conn);
  }

  if(isset($_POST['btnMinusquantity']))
  {
    $id = $_POST['btnMinusquantity'];
    $sql = "UPDATE cart SET quantity=quantity-1 WHERE cartID = $id";
    if ($conn->query($sql) === TRUE) {
    }
    mysqli_close($conn);
  }

  if(isset($_POST['btnRemoveItem'])){
    $id = $_POST['btnRemoveItem'];
    $sql = "DELETE FROM cart WHERE cartID = $id";
    if ($conn->query($sql) === TRUE) {
    }
    mysqli_close($conn);
  }
  header('location:../Checkout.php');
?>