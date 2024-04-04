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
$UserID = $_SESSION['user_id'];
 if(isset($_POST['btnClear']))
{
    $user =$_SESSION['user_id'];
    $sql = "DELETE FROM cart where userID = $user";
    if ($conn->query($sql) === TRUE) {
      } else {
        echo "Error deleting record: " . $conn->error;
      }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jerry's meat shop-Cart</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
    <table class = "Cart-container">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quaintity</th>
</tr>
        <?php
    $UserArray = array();
    $sql = "SELECT * FROM  cart WHERE userID = $UserID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
           array_push($UserArray,$row['ProductID']); 
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
               <tr>
               <td class = 'CartItem'>$w</td>
               <td class = 'CartItem'>$p</td>
               <td class = 'CartItem'>$r</td>
               <td class = 'CartItem'>$y</td>
               </tr>
               ");
            }
        }
    } else {
        echo "0 results";
    }
?>
  </table>
  <form action = 'cart.php' method="post">
  <div class = "button-container">


    <input type="submit" value = "Clear" id = "btnClear" name = "btnClear">
    <input type="submit" value = "Purchase" id = "btnPurchase" name = "btnPurchase">


  </div>
  </form>
    <?php include('components/UserFooter.php')?>
</body>
</html>

