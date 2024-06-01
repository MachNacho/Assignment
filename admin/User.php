<?php
include('Components\DBconnect.php');
include('Components\CustomerClass.php');
$sql = "SELECT * FROM customer";
$result = $conn->query($sql);
$Customers = array();
$CustID = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    $CustomerID = $row["customerID"];
    $customerFName = $row["Firstname"];
    $customerLName = $row["Lastname"];
    $customerEmail = $row["email"];
    $customerPassword= $row["userpassword"];
    $Customers[$CustomerID] = new Customer($CustomerID, $customerFName,$customerLName,$customerEmail,$customerPassword);
    $CustID[] = $CustomerID;
    }
}
include('Components\customerEdits.php');
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
            <th>CustomerID</th>
            <th>First name</th>
            <th>Last Name</th>
            <th>email</th>
            <th>Password</th>

        </tr>
        <?php include('Components\loadCustomers.php') ?>
    </table>

    <div class='FormHandles'>
        <!-- Remove panel -->
        <form class="modal-content" action="User.php" method="POST">
            <div class="ADDcontainer">
                <h1>Remove entery</h1>
                <p>Please select the ID of the unwanted product.</p>
                <hr>

                <label for="PRODIDss"><b>Please select the ID</b></label>
                <select name="IDselector" id="PRODIDss">
                    <?php
                    foreach ($CustID as $x) {
                        echo "<option value='$x'>$x</option>";
                    } ?>
                </select>
                <Button class="cancelbtn" id='Deletebtn' name='Delete'>Delete</Button>
            </div>
        </form>
        <!-- Edit panel -->
        <form class="modal-content" action="User.php" method="POST">
            <div class="ADDcontainer">
                <h1>Edit entery</h1>
                <p>Please select the ID of the product that needs editing.</p>
                <hr>
                <label for="PRODIDss"><b>Please select the ID</b></label>
                <select name="IDselector" id="PRODIDss">
                    <?php
                    foreach ($CustID as $x) {
                        echo "<option value='$x'>$x</option>";
                    } ?>
                </select>
                <label for="CustFName"><b>First name</b></label>
                <input type="text" placeholder="Enter first name" name="CustFName">

                <label for="CustLName"><b>Last name</b></label>
                <input type="text" placeholder="Enter last name" name="CustLName">

                <label for="CustEmail"><b>Email</b></label>
                <input type="email" placeholder="Enter email" name="CustEmail">

                <label for="CustPass"><b>Password</b></label>
                <input type="password" placeholder="Enter password" name="CustPass">

                <button type="submit" class="signupbtn" name='Edit'>Insert Data</button>
            </div>
        </form>

    </div>



</body>

</html>
<?php

?>