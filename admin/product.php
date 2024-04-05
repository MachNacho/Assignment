<?php 
    include('../components/DBconnect.php');
   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test login</title>
    <link href="css/adminStyle.css?<?=filemtime("css/adminStyle.css")?>" rel="stylesheet" type="text/css"/>
</head>
<body>
    <!-- Wrapper for the CRUD application -->
  <div class="crudApplication-wrapper">
    <!-- Wrapper for inputs -->
    <div class="inputWrapper">
    <form action ="product.php" method = "POST"  autocomplete="off" enctype = "multipart/form-data">
         <!-- For the name -->
         <div class="Input-container">
            <label for="productName">Product name</label>
            <input type="text" name = "productName" placeholder="please enter a Product Name" required min="0" max="100">
        </div>
        <!-- For the price -->
        <div class="Input-container">
            <label for="productPrice">Product price</label>
            <input type="number" name="productPrice" placeholder="please enter the Product price" required min="0">
        </div>
        <!-- Unit amount -->
        <div class="Input-container">
            <label for="productAmount">Amount</label>
            <input type="number"name="productAmount" placeholder="please enter the Product unit amount" required min="0">
        </div>
        <!-- Unit of measurment -->
        <div class="Input-container">
            <label for="UnitsOfMeasurment">Units of measurment</label>
            <select name="UnitsOfMeasurment" id="UnitsOfMeasurment">
              <option value="KG">Kilogram</option>
              <option value="G">Gram</option>
              <option value="MG">Milligram</option>
              <option value="L">Liter</option>
              <option value="ML">Milliliter</option>
            </select>
        </div>
        <!-- Product quantity -->
        <div class="Input-container">
            <label for="productQuantity">Quantity</label>
            <input type="number" id = "productQuantity" name = "productQuantity" value="0" required min="0">
        </div>

        <!-- Product picture -->
        <div class="Input-container">
            <label for="productfile">Select a file:</label>
            <input type="file" id="productfile" name="productfile" required>
        </div>
        <div class="Input-container">
            <input type="submit" value="submit" name = "submit" onsubmit="">
            <input type="reset" value="reset">
        </div>
    </form> 
    </div>
    <!-- Wrapper for edit and delete -->
    <div class="OutputWrapper">
        <div class = "itemWrapper">
            <div class = "idContainer">ID</div>
            <div class = "nameContainer">Name</div>
            <div class = "priceContainer">Price</div>
            <div class = "amountContainer">amount</div>
            <div class = "uomContainer">UnitsOfMeasurment</div>
            <div class = "quantityContainer">Quantity</div>
            <div class = "dateContainer">Date</div>
            <div class = "imageContainer">Image</div>
            <div class = "buttonOption">Options</div>
        </div>
        <?php include('components/loadProducts.php')?>
    </div>
  </div>
</body>
</html>

<?php
 if(isset($_POST['submit'])){
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productAmount = $_POST['productAmount'];
    $productUOM = $_POST['UnitsOfMeasurment'];
    $productQuantity = $_POST['productQuantity'];
    $productImage = $_POST['productfile'];


    //insert the user into the database.  
    $insert_user="insert into products(Name, Price, Amount, UnitOfMeasurment, Quantity, imageName) VALUE ('$productName','$productPrice','$productAmount','$productUOM','$productQuantity','$productImage')"; 
    if(mysqli_query($conn,$insert_user))  
    {  
        echo "<script>alert('Product succss added')</script>";  
    }

    //TODO:Figure out how to uplaod files to server
    mysqli_close($conn);
}

?>