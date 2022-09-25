<?php 

    include_once 'db_handler.php' ;
    include_once 'functions.php' ;

    if (isset($_POST["editProduct"])) {
        $id = $_POST["name"] ;

        
        include_once '../Pages/Edit_product.php' ;
        
        $sql = "SELECT * FROM product WHERE id = '$id' ;" ;
        $query = mysqli_query($conn, $sql) ;

        $productArr = mysqli_fetch_assoc($query) ;

        if ($productArr !== false) {
            session_start() ;
            $_SESSION["productArr"] = $productArr ;
            $_SESSION["editproid"] = $productArr["id"] ;
            header("location: ../Pages/Edit_product.php") ;
            exit() ;
        }
        
        exit() ;
    }
    if (isset($_POST["addToCart"])) {
        session_start() ;
        if (!isset($_SESSION["username"])) {
            header("location: ../Pages/Products.php?error=cantadd") ;
            exit() ;
        }
        $id = $_POST["name"] ;
        addtoCart($conn, $id) ;

    }


    // if (isset($_POST["sort"])) {
    //     if (isset($_POST["blade_cat"])) {
    //         $blade_cat = $_POST["blade_cat"] ;
    //     }
    //     if (isset($_POST["chain_cat"])) {
    //         $chain_cat = $_POST["chain_cat"] ;
    //     }
    //     if (isset($_POST["drill_cat"])) {
    //         $drill_cat = $_POST["drill_cat"] ;
    //     }
    //     if (isset($_POST["san_cat"])) {
    //         $san_cat = $_POST["san_cat"] ;
    //     }
    //     if (isset($_POST["other_cat"])) {
    //         $other_cat = $_POST["other_cat"] ;
    //     }

    //     sortProducts($conn, $blade_cat, $chain_cat, $drill_cat, $san_cat, $other_cat) ;
    // }
    else {
        header("location: ../Pages/Products.php?error=somethingwrong") ;
        exit() ;
    }