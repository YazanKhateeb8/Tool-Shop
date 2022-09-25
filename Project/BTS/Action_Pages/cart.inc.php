<?php 

    if (isset($_POST["delete"])) {
        $productid = $_POST["productid"] ;
        $cartid = $_POST["cartid"] ;

        include_once 'db_handler.php' ;
        include_once 'functions.php' ;

        deleteFromCart($conn, $productid, $cartid) ;
    }
    else {
        header("location: ../Pages/Cart.php") ;
        exit() ;
    }