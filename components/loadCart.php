<?php
include_once("DBconnect.php");
    $UserID = $_SESSION['user_id'];
    $sql = "SELECT cart.CartId, products.Name, products.Price, products.Amount, products.UnitOfMeasurment, cart.Quantity FROM cart LEFT JOIN products ON cart.ProductID = products.pID WHERE customerID = '$UserID' ";
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
    if ($result->num_rows > 0) {
        $total=0;
        while($row = $result->fetch_assoc()) {
            $PI = $row["CartId"];
            $PN = $row["Name"];
            $PP = $row["Price"];
            $PA = $row["Amount"];
            $PU = $row["UnitOfMeasurment"];
            $PQ = $row["Quantity"];
            $total =$total + ($PP*$PQ);
            $current = ($PP*$PQ);
            //TODO individual delete item CHANGE TO SLIDER INSTEAD
            echo"
            
            <div class = 'CartItem-container'>
                <div class = 'CartItem'>$PN</div>
                <div class = 'CartItem'>R $current</div>
                <div class = 'CartItem'>$PA $PU</div>
                <div class = 'CartItem'>$PQ</div>
                <div class = 'cartItemEdit'>
                <form action = '' method = 'post'>
                
                <button class = 'btnEdits' name = 'btnADDquantity' value = $PI>Add</button>
                <button class = 'btnEdits' name = 'btnRemoveItem' value = $PI>Remove</button>
                <button class = 'btnEdits' name = 'btnMinusquantity' value = $PI>Lower</button>
                </form>
                </div>
            </div>
            ";
        }
        echo"
            <div class = 'CartItem-container'>
                <div class = 'CartItem'>Total:</div>
                <div class = 'CartItem'>R$total</div>
            </div>
            ";
    }
    else{
        echo "Cart is empty";
    }

?>