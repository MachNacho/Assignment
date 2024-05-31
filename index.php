<!-- Connect to databse -->
<?php
include('components/DBconnect.php');

session_start();

if (isset($_SESSION['user_email'])) {
   $user_id = $_SESSION['user_email'];
} else {
   $user_id = '';
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Jerry's meat shop-Home</title>
   <link href="css/UserStyle.css?<?= filemtime("css/UserStyle.css") ?>" rel="stylesheet" type="text/css" />
   <link rel="icon" type="image/x-icon" href="assets/logoIcon.ico">
</head>

<body>
   <?php
   include('components/UserHeader.php');
   ?>
   <h1 class="WelcomeMessage" id = "pageHead">Welcome to Jerry's meat shop</h1>
   
   
   <h1 class="WelcomeMessage" id = "pageHead">Frequently asked questions</h1>
      <!-- TODO: FIX FAQ THING -->
      <button class="accordion">How do we ensure that our meat is fresh and of the highest quality?</button>
      <div class="panel">
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus dolorum officia quam consectetur. Fugit veritatis eligendi harum, qui et obcaecati dolorem, numquam exercitationem excepturi quam tempore ab nisi non impedit.</p>
      </div>
      <button class="accordion">Do you accept returns or exchnages?</button>
      <div class="panel">
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus dolorum officia quam consectetur. Fugit veritatis eligendi harum, qui et obcaecati dolorem, numquam exercitationem excepturi quam tempore ab nisi non impedit.</p>
      </div>
      <button class="accordion">What are our operating hours?</button>
      <div class="panel">
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus dolorum officia quam consectetur. Fugit veritatis eligendi harum, qui et obcaecati dolorem, numquam exercitationem excepturi quam tempore ab nisi non impedit.</p>
      </div>
   </div>
   <script src="js/Indexscript.js"></script>

   <?php include('components/UserFooter.php') ?>
</body>

</html>