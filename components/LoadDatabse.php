<!-- TODO: Load from database product itesms -->
<?php
$sql = "SELECT * FROM products ORDER BY lastUpdate ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>

<?php
           for ($x = 0; $x <= 30; $x++) {
            echo " 
            
            ";
           }
        ?>

<div class='product'>
  <img src='assets\productImages\Pork Texan Steak.jpg' alt='T-Shirt-Ladies'>
  <div class='product-info'>
    <div class='product-title'>Title placeholder</div>
    <div class='product-description'>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
    <div class='product-price'>R299.99</div>
    <div class='product-Discountprice'>R299.99</div>
  </div>
  <div class = 'purchaseButton'>
    <button class = 'btnPurch'>Add to cart</button>
  </div>
</div>