<?php
    session_start() ;
    $_SESSION["loginCount"] = 0 ;
    if (isset($_POST["search"])) {
        $email = $_POST["email"] ;
    

        include_once 'db_handler.php' ;
        include_once 'functions.php' ;
    
        forgotPass($conn, $email) ;
    }

    else {
        header("location: ../Reset_password.php") ;
        exit() ;
    }