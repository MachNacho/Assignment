
<header class ="PageHeader">
        <h1>Jerry's meat shop</h1>
        <nav class="UserNavBar">
            <a href = "index.php">Home</a>
            <a href = "shop.php">Shop</a>
            <a href = "account.php">Account</a>
            <a href = "Checkout.php" id = "leftItem">Cart
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