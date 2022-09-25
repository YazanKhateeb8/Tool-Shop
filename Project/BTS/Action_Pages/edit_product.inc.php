<?php

    include_once 'db_handler.php' ;
    include_once 'functions.php' ;


    if (isset($_POST["edit"])) {
        $id = $_POST["proid"] ;
        $name = $_POST["name"] ;
        $price = $_POST["price"] ;
        $stock = $_POST["stock"] ;
        $img = $_POST["image"] ;

        // if (!preg_match("/^[1-9]$|^[1-9][0-9]$|^(100)$/", $stock)) {
        //     header("location: ../Pages/Edit_product.php?error=stockerror") ;
        //     exit() ;
        // }

        if (!empty($price)) {

            if (!preg_match("/^([1-9][0-9]{1,3}|10000)$/", $price)) {
                header("location: ../Pages/Edit_product.php?error=priceerror") ;
                exit() ;
            }
        }       

        editProduct($conn, $id, $name, $price, $stock, $img) ;
        
}

    if (isset($_POST["delete"])) {
        $id = $_POST["proid"] ;



        deleteProduct($conn, $id) ;
    
    }

    else {
        header("location: ../Pages/Edit_product.php") ;
        exit() ;
    }

  