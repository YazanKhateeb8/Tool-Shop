<?php

    if (isset($_POST["Reset"])) {
        $password = $_POST["password"] ;
        $repeatPass = $_POST["repeatPass"] ;

        require_once 'db_handler.php' ;
        require_once 'functions.php' ;
        //require_once '../Test_Pages/test.php' ;

        if (emptyInputlogin($password, $repeatPass) !== false) {
            header("location: ../Pages/Update_password.php?error=emptyinput") ;
            exit() ; 
        }

        resetPass($conn, $password, $repeatPass) ;
    }
    else {
        header("location: ../Pages/Update_password.php") ;
        exit() ;
    }