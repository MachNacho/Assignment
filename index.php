<!-- Connect to databse -->
<?php 
include('components/DBconnect.php');

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jerry's meat shop-HOME</title>
    <link rel="stylesheet" type="text/css" href="css/UserStyle.css">
    
</head>
<body>
    <?php include('components/UserHeader.php')?>
    <h1 class = "WelcomeMessage">Welcome to Jerry's meat shop</h1>

</body>
</html>