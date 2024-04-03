<!-- Connect to databse -->
<?php 
include('components/DBconnect.php');

session_start();

if(isset($_SESSION['user_email'])){

}
else
{
 header("Location: login.php"); 
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jerry's meat shop-Cart</title>
    <link href="css/UserStyle.css?<?=filemtime("css/UserStyle.css")?>" rel="stylesheet" type="text/css"/>
    <link href="css/cartStyle.css?<?=filemtime("css/cartStyle.css")?>" rel="stylesheet" type="text/css"/>
</head>
<body>
       <!-- FIXME:BETTER WAY TO FIX -->
<?php
    if(isset($_SESSION['user_email'])){
         echo $_SESSION['user_email'];
       echo"<a href = 'components/logout.php'>Logout</a>";
    }
?>

    <?php include('components/UserHeader.php')?>

    <h1 class = "WelcomeMessage">CART</h1>
    <div class = "Cart-container">
        <div class="cart-wrapper">
            <div class = "CartHeader">ID</div>
            <div class = "CartHeader">Name</div>
            <div class = "CartHeader">Price</div>
            <div class = "CartHeader">Quaintity</div>
        </div>
        <?php
    $UserArray = array();
    $UserID = $_SESSION['user_id'];
    $sql = "SELECT * FROM  cart WHERE userID = $UserID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
           array_push($UserArray,$row['ProductID']); 
        }
    } else {
        echo "0 results";
    }

    foreach ($UserArray as $x) {
        $sql = "SELECT * FROM products where pID = $x ";
        $result = $conn->query($sql);

        while($row = $result->fetch_assoc()) {
            $p =$row['pID'];
            $w =$row['Name'];
            $r =$row['Price'];
            $y =$row['Quantity'];
           echo("
           <div class='cart-wrapper'>
           <div class = 'CartItem'>$p</div>
           <div class = 'CartItem'>$w</div>
           <div class = 'CartItem'>$r</div>
           <div class = 'CartItem'>$y</div>
           </div>
           ");
        }
    }
?>
    </div>
   
    <?php include('components/UserFooter.php')?>
</body>
</html>
