<?php
include('Components\DBconnect.php');
include('Components\Orderclass.php');
$sql = "SELECT * FROM orders ";
$result = $conn->query($sql);
$Orders = array();
$OrderIDs = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $Order = new Order(
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
    $Ordes[$row['OrderID']] = $Order;
    $OrderIDs[] = $row['OrderID'];
    }
}
include('Components\OredEdits.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="css/adminStyle.css?<?= filemtime("css/adminStyle.css") ?>" rel="stylesheet" type="text/css" />
</head>

<body>
    <a href="index.php">GO BACK</a>
    <table class='InfoTable'>
        <tr>
        <th>OrderID</th>
            <th>FullName</th>
            <th>Email</th>
            <th>Address</th>
            <th>City</th>
            <th>Province</th>
            <th>Postal code</th>
            <th>Payment Option</th>
            <th>Card Name</th>
            <th>Card Number</th>
            <th>Exp Month</th>
            <th>Exp Year</th>
            <th>CVV</th>
            <th>Date</th>
            <th>customerID</th>
            <th>Status</th>

        </tr>
        <?php include('Components\loadOrders.php') ?>
    </table>

    <div class='FormHandles'>
        <!-- Remove panel -->
        <form class="modal-content" action="order.php" method="POST">
            <div class="ADDcontainer">
                <h1>Remove entery</h1>
                <p>Please select the ID of the unwanted order.</p>
                <hr>

                <label for="PRODIDss"><b>Please select the ID</b></label>
                <select name="IDselector" id="PRODIDss">
                    <?php
                    foreach ($OrderIDs as $x) {
                        echo "<option value='$x'>$x</option>";
                    } ?>
                </select>
                <Button class="cancelbtn" id='Deletebtn' name='Delete'>Delete</Button>
            </div>
        </form>
        <!-- Edit panel -->
        <form class="modal-content" action="order.php" method="POST" enctype="multipart/form-data">
            <div class="ADDcontainer">
                <h1>Edit entery</h1>
                <p>Please select the ID of the product that needs editing.</p>
                <hr>
                <label for="PRODIDss"><b>Please select the ID</b></label>
                <select name="IDselector" id="PRODIDss">
                    <?php
                    foreach ($OrderIDs as $x) {
                        echo "<option value='$x'>$x</option>";
                    } ?>
                </select>
                <label for="StatOptions"><b>Order satus</b></label>
                <select name="OrderStatselector" id="StatOptions">
                    <option value ='Order Placed'>Order Placed</option>
                    <option value ='Order Confirmed'>Order Confirmed</option>
                    <option value ='Order Processing'>Order Processing</option>
                    <option value ='Shipped/Dispatched'>Shipped/Dispatched</option>
                    <option value ='In Transit'>In Transit</option>
                    <option value ='Out for Delivery'>Out for Delivery</option>
                    <option value ='Delivered'>Delivered</option>
                    <option value ='Attempted Delivery'>Attempted Delivery</option>
                    <option value ='Canceled'>Canceled</option>
                    <option value ='Held at Customs'>Held at Customs</option>
                    <option value ='Awaiting Pickup'>Awaiting Pickup</option>
                    <option value ='Delayed'>Delayed</option>
                    <option value ='Lost'>Lost</option>
                </select>
                <button type="submit" class="signupbtn" name='Edit'>Insert Data</button>
            </div>
        </form>

    </div>



</body>

</html>