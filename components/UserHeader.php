
<header class ="PageHeader">

        <div class="PageLogo">
        <object data="assets\2XBtGb01.svg" type="image/svg+xml"></object>
        </div>
        <nav class="UserNavBar">
            <a href = "index.php" alt = "Home page">Home</a>
            <a href = "shop.php">Shop</a>
            <a href = "account.php">Account</a>
            <a href = "Checkout.php" class= "leftItem">
            <box-icon type='solid' name='cart' class ='cart-add'></box-icon>
                <?php include("components/cartCount.php");?>
            </a>
        </nav>
</header>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<?php
    if(isset($_SESSION['user_email'])){
        echo $_SESSION['user_email'];
        echo"<a href = 'components/logout.php'>Logout</a>";
    }
?>