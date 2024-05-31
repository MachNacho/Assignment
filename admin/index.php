<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>
    <link href="css/adminStyle.css?<?=filemtime("css/adminStyle.css")?>" rel="stylesheet" type="text/css"/>
</head>
<body>
    <h1>Welcome to the Admin Panel</h1>
    <div class = 'tableCountContainer'>
   <?php include('Components\loadDB.php');?>
    </div>
    <nav class = 'NavBar'>
        <a href ='User.php'>Users</a>
        <a href = 'product.php'>Product</a>
        <a href = 'product.php'>Orders</a>
    </nav>
</body>
</html>