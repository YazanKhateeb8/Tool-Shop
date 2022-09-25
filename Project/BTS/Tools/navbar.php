<?php
    session_start() ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/project/BTS/Style_Stuff/css/navbar.css">
</head>
<body>
    <header class="header">
        <a href="http://localhost/Project/Main.php" class="logo"><img class="logo" src="http://localhost/project/BTS/Style_Stuff/images/RenTool.png" alt="logo"></a>
        <nav class="nav">
            <ul class="nav_links">
                <?php if (isset($_SESSION["username"]))
                    echo "<li><b>Welcome $_SESSION[username]</b></li>" ;
                    ?>
                <li><a href="http://localhost/Project/Main.php">Home</a></li>
                
                <?php 
                if (isset($_SESSION["username"]) && !isset($_SESSION["manager"])) {
                    echo "<li><a href='http://localhost/Project/BTS/Pages/Products.php'>Products</a></li>" ;
                    echo "<li><a href='http://localhost/Project/BTS/Pages/Cart.php'>Cart</a></li>" ;
                    echo "<li><a href='http://localhost/Project/BTS/Pages/Profile.php'>Profile</a></li>" ;
                    echo "<li><a href='http://localhost/Project/BTS/Action_Pages/logout.inc.php'>Log out</a></li>" ;
                    
                }
                if (isset($_SESSION["manager"])) {
                    echo "<li><a href='http://localhost/Project/BTS/Pages/Products.php'>Products</a></li>" ;
                    echo "<li><a href='http://localhost/Project/BTS/Pages/Add_product.php'>Add product</a></li>" ;
                    echo "<li><a href='http://localhost/Project/BTS/Pages/Profile.php'>Profile</a></li>" ;
                    echo "<li><a href='http://localhost/Project/BTS/Action_Pages/logout.inc.php'>Log out</a></li>" ;
                }
                else if (!isset($_SESSION["username"])) {
                    echo "<li><a href='http://localhost/Project/BTS/Pages/Products.php'>Products</a></li>" ;
                    echo "<li><a href='http://localhost/Project/BTS/Pages/Sign_up.php'>Signup</a></li>" ;
                    echo "<li><a href='http://localhost/Project/BTS/Pages/login.php'>Login</a></li>" ;
                }
                ?>  
            </ul>
        </nav>
    </header>
</body>
</html>