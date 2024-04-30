<?php
include_once("DBconnect.php");
    $UserID = $_SESSION['user_id'];
    $sql = "SELECT products.Name, products.Price, products.Amount, products.UnitOfMeasurment, cart.Quantity FROM cart LEFT JOIN products ON cart.ProductID = products.pID WHERE customerID = '$UserID' ";
    $result = $conn->query($sql);
    $count = 0;
 
    echo"
    <div class = 'CartItem-container'>
        <div class = 'CartItem'>Name</div>
        <div class = 'CartItem'>Price</div>
        <div class = 'CartItem'>Amount</div>
        <div class = 'CartItem'>Quantity</div>
    </div>
    ";
//TODO: Cart loader
    while($row = $result->fetch_assoc()) {
        $PN = $row["Name"];
        $PP = $row["Price"];
        $PA = $row["Amount"];
        $PU = $row["UnitOfMeasurment"];
        $PQ = $row["Quantity"];
        
        echo"
        <div class = 'CartItem-container'>
            <div class = 'CartItem'>$PN</div>
            <div class = 'CartItem'>$PP</div>
            <div class = 'CartItem'>$PA $PU</div>
            <div class = 'CartItem'>$PQ</div>
        </div>
        ";
    }
?>