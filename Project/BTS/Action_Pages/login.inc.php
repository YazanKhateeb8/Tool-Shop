<?php
    session_start() ;
    if (isset($_SESSION["resetPass"])) {
        header("location: ../Pages/Update_password.php") ;
        exit() ;
    }

    if (isset($_POST["submit"])) {
        $username = $_POST["username"] ;
        $pass = $_POST["password"] ;
        $rem = $_POST["remember"] ;
        
        require_once 'db_handler.php' ;
        require_once 'functions.php' ;

        if (emptyInputlogin($username, $pass) !== false) {
            header ("location: ../Pages/login.php?error=emptyinput") ;
            exit () ;
        }

        loginUser($conn, $username, $pass, $rem) ;
    }

    else {
        header("location: ../Pages/login.php") ;
        exit() ;
    }
