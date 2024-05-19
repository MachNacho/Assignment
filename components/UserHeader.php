
<header class ="PageHeader">
        <div class="PageLogo">
            <img src = "assets/Logo.png">
        </div>
        <nav class="UserNavBar">
            <a href = "index.php">Home</a>
            <a href = "shop.php">Shop</a>
            <a href = "account.php">Account</a>
            <a href = "Checkout.php" class= "leftItem">Cart
                <?php include("components/cartCount.php");?>
            </a>
        </nav>
</header>
<?php
    if(isset($_SESSION['user_email'])){
        echo $_SESSION['user_email'];
        echo"<a href = 'components/logout.php'>Logout</a>";
    }
?>