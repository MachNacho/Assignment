<?php
include("search.php");

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    $prodName = $row["Name"];
    $prodPrice = $row["Price"];
    $prodMeasurment = $row["UnitOfMeasurment"];
    $prodAmount = $row["Amount"];
    $prodID = $row["pID"];
    $image = $row["imageName"];
    echo(" 
    <div class='product'>
    <img src='assets\productImages\\$image' alt='image of $prodName'>
    <div class='product-info'>
      <div class='product-title'>$prodName</div>
      <div class='product-description'>Lorem ipsum dolor sit amet, consectetur adipiscing elit.$prodAmount  $prodMeasurment</div>
      <div class='product-price'>$prodPrice</div>
      <div class='product-Discountprice'>R299.99</div>
    </div>
    <div class = 'purchaseButton'>
      <form action = 'components/Add_to_cart.php' method ='get'>
      <button class = 'btnPurch' type='submit' name = 'btnProductID' value = $prodID  >Add to cart<box-icon class ='cart-add' name='cart-add' ></box-icon></button>
      </form>
    </div>
  </div>
    ");
  }
} else {
  echo "0 results";
}
$conn->close();
?>


