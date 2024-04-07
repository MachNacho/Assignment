<!-- TODO: Load from database product itesms -->
<?php
$sql = "SELECT * FROM products ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    $prodName = $row["Name"];
    $prodPrice = $row["Price"];
    $prodMeasurment = $row["UnitOfMeasurment"];
    $prodAmount = $row["Amount"];
    $prodID = $row["pID"];
    $image = $row["imageName"];
    $Quantity = $row["Quantity"];
    $date = $row["LastUpdate"];

    echo(" 
    <div class = 'itemWrapper'>
    <div class = 'idContainer'>$prodID</div>
    <div class = 'nameContainer'>$prodName</div>
    <div class = 'priceContainer'>$prodPrice</div>
    <div class = 'amountContainer'>$prodAmount</div>
    <div class = 'uomContainer'>$prodMeasurment</div>
    <div class = 'quantityContainer'>$Quantity</div>
    <div class = 'dateContainer'>$date</div>
    <div class = 'imageContainer'> <img src='..\assets\productImages\\$image' alt='image of $prodName'></div>
    <div class = 'buttonOption'>
    <input type = 'submit' class = 'formButton' name = 'deleteRecord'>
    <input type = 'button' class = 'formButton' name = 'editRecord'>
    </div>
</div>
        ");
  }
} else {
  echo "0 results";
}
$conn->close();
?>


