<?php 

    include_once 'db_handler.php' ;
    include_once 'functions.php' ;

    if (isset($_POST["pay"])) {
        if (strlen($_POST["cardholder"]) < 3) {
            header("location: ../Pages/Checkout.php?error=namenovalid") ;
            exit() ;
        }
        if (strlen((string)$_POST["cardnum"]) != 16 && is_numeric($_POST["cardnum"]) != 1) {
            header("location: ../Pages/Checkout.php?error=numnovalid") ;
            exit() ;
        }
        if ($_POST["date"] < 22) {
            header("location: ../Pages/Checkout.php?error=wrongdate") ;
            exit() ;
        }
        if (strlen((string)$_POST["cvv"]) < 3) {
            header("location: ../Pages/Checkout.php?error=cvvwrong") ;
            exit() ;
        }

        buy($conn) ;

    }
    if (isset($_POST["back"])) {
        header("location: ../Pages/Cart.php") ;
        exit() ;
    }
    else {
        header("location: ../Pages/Checkout.php") ;
        exit() ;
    }