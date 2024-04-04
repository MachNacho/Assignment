<!-- FIXME Repair the header to update to all pages  -->
<header class ="PageHeader">
        <h1 >Jerry's meat shop</h1>
        <nav class="UserNavBar">
            <a href = "index.php">Home</a>
            <a href = "shop.php">Shop</a>
            <a href = "account.php">Account</a>
            <a href = "cart.php" id = "leftItem">Cart
                <?php
                 if(isset($_SESSION['user_email'])){
                    include('components\cartCount.php');
                 }             
                 ?>
            </a>
           </nav>
</header>
