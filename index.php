<!-- Connect to databse -->
<?php 
include('components/DBconnect.php');

session_start();

if(isset($_SESSION['user_email'])){
   $user_id = $_SESSION['user_email'];
}else{
   $user_id = '';
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jerry's meat shop-Home</title>
    <link href="css/UserStyle.css?<?=filemtime("css/UserStyle.css")?>" rel="stylesheet" type="text/css"/>
</head>
<body>
<?php
    if(isset($_SESSION['user_email'])){
         echo $_SESSION['user_email'];
       echo"<a href = 'components/logout.php'>Logout</a>";
    }
    ?>
    <?php include('components/UserHeader.php')?>
    <h1 class = "WelcomeMessage">Welcome to Jerry's meat shop</h1>
    <!-- TODO add all index items in a div to better structure it -->
    <h2 class = "indexPara">Our history</h2>

    <div class = "indexPara">
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore reiciendis amet tempore vel ducimus ea eos, provident, enim perspiciatis quisquam alias voluptatum facere voluptatibus minima nam, sed culpa id. Incidunt. Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur laudantium nulla impedit quis? Eligendi doloremque expedita aliquid quidem facilis ullam, cupiditate deserunt illum mollitia provident, dolore id officiis vitae at?
    </div>
    <img class ="indexPIC" src ="assets/PlaceholderImages/Placeholder.jpg" alt="placeholder">
    <div class = "indexPara">
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore reiciendis amet tempore vel ducimus ea eos, provident, enim perspiciatis quisquam alias voluptatum facere voluptatibus minima nam, sed culpa id. Incidunt. Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur laudantium nulla impedit quis? Eligendi doloremque expedita aliquid quidem facilis ullam, cupiditate deserunt illum mollitia provident, dolore id officiis vitae at?
    </div>
    <div class = "indexPara">
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore reiciendis amet tempore vel ducimus ea eos, provident, enim perspiciatis quisquam alias voluptatum facere voluptatibus minima nam, sed culpa id. Incidunt. Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur laudantium nulla impedit quis? Eligendi doloremque expedita aliquid quidem facilis ullam, cupiditate deserunt illum mollitia provident, dolore id officiis vitae at?
    </div>
    <img class ="indexPIC" src ="assets/PlaceholderImages/Placeholder1.jpg" alt="placeholder">
    <img class ="indexPIC" src ="assets/PlaceholderImages/Placeholder2.jpg" alt="placeholder">
    <h2 class = "indexPara">Frequently asked questions</h2>
    <!-- TODO: FIX FAQ THING -->
    <button class="accordion">Section 1</button>
      <div class="panel">
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus dolorum officia quam consectetur. Fugit veritatis eligendi harum, qui et obcaecati dolorem, numquam exercitationem excepturi quam tempore ab nisi non impedit.</p>
      </div>
      <button class="accordion">Section 1</button>
      <div class="panel">
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus dolorum officia quam consectetur. Fugit veritatis eligendi harum, qui et obcaecati dolorem, numquam exercitationem excepturi quam tempore ab nisi non impedit.</p>
      </div>
      <button class="accordion">Section 1</button>
      <div class="panel">
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus dolorum officia quam consectetur. Fugit veritatis eligendi harum, qui et obcaecati dolorem, numquam exercitationem excepturi quam tempore ab nisi non impedit.</p>
      </div>
      <script src = "js/Indexscript.js"></script>
    <?php include('components/UserFooter.php')?>
</body>
</html>