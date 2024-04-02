<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jerry's meat shop-Login</title>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link href="css/UserStyle.css?<?=filemtime("css/UserStyle.css")?>" rel="stylesheet" type="text/css"/>
    <link href="css/loginStyle.css?<?=filemtime("css/loginStyle.css")?>" rel="stylesheet" type="text/css"/>
</head>

<body>
<form action="" method="get">
  <div class = "login-container">
    <h3>Login</h3>
    <!-- Input wrappers -->
    <div class = "login-wrapper">
      <input type="email" name = "email" required placeholder="enter email">
      <box-icon name='envelope'></box-icon>
    </div>

    <div class = "login-wrapper">
    <input type="password" name = "password" required placeholder="enter password">
    <box-icon name='lock-alt' ></box-icon>
    </div>

    <!-- Button -->
    <input type = "submit" value = "Login" id="loginSubmit">

    <!--Forget button  -->
    <div class = "forgetWrapper" >
    <p>Forgot Password <a href = "">Click here</a></p>
    </div>
  </div>
</form>



<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>
</html>