<?php

    if (isset($_POST["add"])) {
        $name = $_POST["name"] ;
        $price = $_POST["price"] ;
        $stock = $_POST["stock"] ;
        $image = $_POST["image"] ;
        $categoty = $_POST["category"] ;

        include_once 'db_handler.php' ;
        include_once 'functions.php' ;

        if (emptyInputAdd_Product($name, $price, $stock, $image, $categoty) !== false) {
            header("location: ../Pages/Add_product.php?error=emptyinput") ;
            exit() ;
        }

        if (!preg_match("/^[1-9]$|^[1-9][0-9]$|^(100)$/", $stock)) {
            header("location: ../Pages/Add_product.php?error=stockerror") ;
            exit() ;
        }

        if (!preg_match("/^([1-9][0-9]{1,3}|10000)$/", $price)) {
            header("location: ../Pages/Edit_product.php?error=priceerror") ;
            exit() ;
        }

        addProduct($conn, $name, $price, $stock, $image, $categoty) ;
    }
    else {
        header("location: ../Pages/Add_product.php") ;
        exit() ;
    }

    //^[1-9]$|^[1-9][0-9]$|^(100)$