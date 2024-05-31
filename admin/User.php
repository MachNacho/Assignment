<?php
include('Components\DBconnect.php');
include('Components\Productclass.php');
$sql = "SELECT * FROM customer";
$result = $conn->query($sql);
$Customers = array();
$CustID = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    $CustomerID = $row["CustomerID"];
    $customerFName = $row["Firstname"];
    $customerLName = $row["Lastname"];
    $customerEmail = $row["email"];
    $customerPassword= $row["userpassword"];
    $Customers[$CustomerID] = new Customer($CustomerID, $customerFName,$customerLName,$customerEmail,$customerPassword);
    $CustID[] = $CustomerID;
    }
}
include('Components\ProductEdits.php');
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
            <th>ProductID</th>
            <th>Product name</th>
            <th>Product price</th>
            <th>Product amount</th>
            <th>Unit of measurment</th>
            <th>Product update</th>
            <th>Product image</th>
        </tr>
        <?php include('Components\loadProducts.php') ?>
    </table>

    <div class='FormHandles'>
        <!-- Add panel -->
        <form class="modal-content" action="product.php" method="POST" enctype="multipart/form-data">
            <div class="ADDcontainer">
                <h1>Input the data</h1>
                <p>Please fill in this form to add a product.</p>
                <hr>
                <label for="ProdName"><b>Product name</b></label>
                <input type="text" placeholder="Enter Product name" name="ProdName" required>

                <label for="ProdPrice"><b>Product Price</b></label>
                <input type="number" placeholder="Enter Product Price" name="ProdPrice" required>

                <label for="ProdAMT"><b>Product amount</b></label>
                <input type="number" placeholder="Enter Product amount" name="ProdAMT" required>

                <label for="ProdUOM"><b>Product unit of measurment</b></label>
                <select name="ProdUOM" id="UOM">
                    <option value="mg">mg</option>
                    <option value="kg">kg</option>
                    <option value="g">g</option>
                    <option value="L">L</option>
                    <option value="ml">ml</option>
                </select>

                <label for="ProdImage"><b>Product Image</b></label>
                <input type="file" id="myfile" name="myfile" name="ProdImage" required>



                <div class="clearfix">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                    <button type="submit" class="signupbtn" name='Insert'>Insert Data</button>
                </div>
            </div>
        </form>
        <!-- Remove panel -->
        <form class="modal-content" action="product.php" method="POST">
            <div class="ADDcontainer">
                <h1>Remove entery</h1>
                <p>Please select the ID of the unwanted product.</p>
                <hr>

                <label for="PRODIDss"><b>Please select the ID</b></label>
                <select name="IDselector" id="PRODIDss">
                    <?php
                    foreach ($ProdIDs as $x) {
                        echo "<option value='$x'>$x</option>";
                    } ?>
                </select>
                <Button class="cancelbtn" id='Deletebtn' name='Delete'>Delete</Button>
            </div>
        </form>
        <!-- Edit panel -->
        <form class="modal-content" action="product.php" method="POST" enctype="multipart/form-data">
            <div class="ADDcontainer">
                <h1>Edit entery</h1>
                <p>Please select the ID of the product that needs editing.</p>
                <hr>
                <label for="PRODIDss"><b>Please select the ID</b></label>
                <select name="IDselector" id="PRODIDss">
                    <?php
                    foreach ($ProdIDs as $x) {
                        echo "<option value='$x'>$x</option>";
                    } ?>
                </select>
                <label for="ProdName"><b>Product name</b></label>
                <input type="text" placeholder="Enter Product name" name="ProdName">

                <label for="ProdPrice"><b>Product Price</b></label>
                <input type="number" placeholder="Enter Product Price" name="ProdPrice">

                <label for="ProdAMT"><b>Product amount</b></label>
                <input type="number" placeholder="Enter Product amount" name="ProdAMT">

                <label for="ProdUOM"><b>Product unit of measurment</b></label>
                <select name="ProdUOM" id="UOM">
                    <option value="mg">mg</option>
                    <option value="kg">kg</option>
                    <option value="g">g</option>
                    <option value="L">L</option>
                    <option value="ml">ml</option>
                </select>

                <label for="ProdImage"><b>Product Image</b></label>
                <input type="file" id="myfile" name="myfile" name="ProdImage">

                <button type="submit" class="signupbtn" name='Edit'>Insert Data</button>
            </div>
        </form>

    </div>



</body>

</html>
<?php

?>