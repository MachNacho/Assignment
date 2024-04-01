

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jerry's meat shop-HOME</title>
    <link rel="stylesheet" type="text/css" href="css/UserStyle.css"> 
</head>

<body>
    <header class ="PageHeader">
        <h1 >Jerry's meat shop</h1>
        <nav class="UserNavBar">
            <a href = "#Home">Home</a>
            <a href = "#Home">Shop</a>
            <a href = "#Home">Account</a>
            <a href = "#Home">Cart</a>   
           </nav>
    </header>

    <h1 class = "WelcomeMessage">Welcome to Jerry's meat shop</h1>

    <form action="" method="post">
        <table class = "AccountForm">
            <th><h1>Login</h1></th>
            <tr>
                <td><label for="username">Username:</label></td>
                <td><input type="text" name="username" id="username"></td>
            </tr>
            <tr>
                <td><label for="password">Password:</label></td>
                <td><input type="password" name="password" id="password"></td>
            </tr>
            <tr>
                <td><button type="submit">Login</button></td>
            </tr>
            
        </table>
    </form>
    <a href="register.php">Register</a>
  

</body>
</html>