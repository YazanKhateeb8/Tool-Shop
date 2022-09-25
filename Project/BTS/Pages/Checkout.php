<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style_Stuff/css/checkout.css">
    <style>
        .error {
            color: red;
            font-size: large;
            font-weight: 500;
        }
        </style>
</head>
<body>
<div class="container p-0">
    <div class="card px-4">
        <p class="h8 py-3">Payment Details</p>
        <div class="row gx-3">
            <div class="col-12">
                <form method="post" action="../Action_Pages/checkout.inc.php">
                <div class="d-flex flex-column">
                    <p class="text mb-1">Card Holder Name</p> <input name="cardholder" class="form-control mb-3" type="text">
                    <?php if (isset($_GET["error"])) {
                            if ($_GET["error"] == "namenovalid") {
                                echo "<p class=error>* Invalid Name!</p>" ;
                            }
                    }
                    ?>
                </div>
            </div>
            <div class="col-12">
                <div class="d-flex flex-column">
                    <p class="text mb-1">Card Number</p> <input name="cardnum" class="form-control mb-3" type="text">
                    <?php if (isset($_GET["error"])) {
                            if ($_GET["error"] == "numnovalid") {
                                echo "<p class=error>* Invalid Card Number!</p>" ;
                            }
                    }
                    ?>
                </div>
            </div>
            <div class="col-6">
                <div class="d-flex flex-column">
                    <p class="text mb-1">Expiry</p> <input name="date" class="form-control mb-3" type="text">
                    <?php if (isset($_GET["error"])) {
                            if ($_GET["error"] == "wrongdate") {
                                echo "<p class=error>* Invalid Date!</p>" ;
                            }
                    }
                    ?>
                </div>
            </div>
            <div class="col-6">
                <div class="d-flex flex-column">
                    <p class="text mb-1">CVV/CVC</p> <input name="cvv" class="form-control mb-3 pt-2 " type="password">
                    <?php if (isset($_GET["error"])) {
                            if ($_GET["error"] == "cvvwrong") {
                                echo "<p class=error>* Invalid CVV!</p>" ;
                            }
                    }
                    ?>
                </div>  
            </div>

            <?php
            include_once '../Action_Pages/db_handler.php' ;
                session_start() ;
                $cart = "SELECT * FROM product_cart WHERE cart_id = $_SESSION[userCart] ;" ;
                $cartResult = mysqli_query($conn, $cart) ;
                $sum = 0 ;

                if (mysqli_num_rows($cartResult) > 0) {
                    while ($cartRow = mysqli_fetch_assoc($cartResult)) {

                        $product = "SELECT * FROM product ;" ;
                        $productResult = mysqli_query($conn, $product) ;

                        if (mysqli_num_rows($productResult) > 0) {
                            while ($productRow = mysqli_fetch_assoc($productResult)) {
                                
                                if ($productRow["id"] == $cartRow["product_id"]) {
                                    $sum += $productRow["price"] ;
                                }}}}}
            ?>
            
            <div class="col-12">
                <button type="submit" name="pay" class="btn btn-primary mb-3"> <span class="ps-3">Amount to Pay ₪<?php echo $sum ?></span> </button>
            </div>
        </div>
    </div>
    <br><br>
    <button type="submit" name="back" class="btn btn-primary mb-3 gobtn"> <span class="ps-3">Go Back</span> </button>
    <form>
</div>
</body>
</html>