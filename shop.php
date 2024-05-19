<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jerry's meat shop-Shop</title>
    <link href="css/UserStyle.css?<?=filemtime("css/UserStyle.css")?>" rel="stylesheet" type="text/css"/>
    <link href="css/shopStyle.css?<?=filemtime("css/shopStyle.css")?>" rel="stylesheet" type="text/css"/>
    <link rel="icon" type="image/x-icon" href="assets/logoIcon.ico">
</head>
<body>
    <?php session_start();include('components/UserHeader.php');?>
    <div class = "searchForm">
        <form action="" method="get">
            <label for = "keyword">Search:</label>
            <input class = searchForm name = "keyword" type="search" id = "keyword" autocomplete="FALSE" placeholder="Search product">
            <label for = "inputfield">Sort:</label>
            <select class = searchForm  name="searchItems" id = "inputfield" ></select>
            <button class = searchForm  type="submit">Search</button>
        </form>
    </div>
    <div class="container">
    <?php include('components/LoadProducts.php')?>
    </div>
   
    <?php include('components/UserFooter.php')?>
    <script src="js/script.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>
</html>
