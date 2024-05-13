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
</head>

<body>
   <?php
   include('components/UserHeader.php');
   ?>
   <h1 class="WelcomeMessage">Welcome to Jerry's meat shop</h1>
   <div class="indexWords">
      <h2 class="indexPara">Our history</h2>

      <div class="indexText">
         Jeff's Butchery, nestled in the heart of Durbanville, has been a cherished institution for nearly five decades. Founded by the visionary Jeff and his wife, Anne, the small shop began as a humble endeavor, driven by a passion for providing quality meats to their community. What started as a modest operation soon blossomed into a renowned establishment, beloved by locals and acclaimed by connoisseurs far and wide.
      </div>

      <div class="indexText">
      Jeff, a master butcher with an unwavering commitment to his craft, learned the art of meat processing from his father, who ran a small butcher shop in their hometown. With an innate understanding of cuts, flavors, and traditions, Jeff elevated the family business to new heights, infusing it with his own expertise and innovation.
      </div>

      <div class="indexText">
      Anne, the heart and soul of the operation, brought warmth and hospitality to every interaction. Her genuine care for customers and dedication to service transformed Jeff's Butchery into more than just a place to buy meat; it became a cornerstone of the community, where friendships were forged over the counter and stories exchanged.
      </div>

      <div class="indexText">
      Over the years, Jeff's Butchery garnered numerous accolades, winning awards for their exceptional products and outstanding service. Their secret recipes, handed down through generations, became legendary, drawing food enthusiasts from far and wide to savor the unique flavors only found at Jeff's.
      </div>

      <div class="indexText">
      As their children grew up, they too became integral parts of the business, learning the trade from their parents and carrying on the family legacy. Together, they continued to innovate and adapt, introducing new products and services to meet the evolving tastes of their customers while staying true to the traditions that had made Jeff's Butchery a household name.
      Today, Jeff's Butchery stands as a testament to the enduring spirit of family, hard work, and quality craftsmanship. With nearly 50 years of excellence behind them, Jeff and his family look forward to continuing their legacy for generations to come, serving up the finest meats with a side of warmth and hospitality that can only be found at Jeff's Butchery in Durbanville.
      </div>


      <h2 class="indexPara">Frequently asked questions</h2>

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