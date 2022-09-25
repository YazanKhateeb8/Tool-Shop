<?php

if (isset ($_POST["submit"]) ) {
    
    $name = $_POST["name"] ;
    $username = $_POST["username"] ;
    $email = $_POST["email"] ;
    $pass = $_POST["pass"] ;
    $pwdRepeat = $_POST["pwdRepeat"] ;

    require_once 'db_handler.php' ;
    require_once 'functions.php' ;

    if (emptyInputSignup($name, $username, $email, $pass, $pwdRepeat) !== false) {
        header ("location: ../Pages/Sign_up.php?error=emptyinput") ;
        exit () ;
    }

    if (invalidName($name) !== false) {
        header ("location: ../Pages/Sign_up.php?error=invalidename") ;
        exit () ;
    }

    if (invalidUsrname($username) !== false) {
        header ("location: ../Pages/Sign_up.php?error=invalidusername") ;
        exit () ;
    }

    if (invalidEmail($email) !== false) {
        header ("location: ../Pages/Sign_up.php?error=invalidemail") ;
        exit () ;
    }

    if (PassMatch($pass, $pwdRepeat) !== false) {
        header ("location: ../Pages/Sign_up.php?error=passwordsdontmatch") ;
        exit () ;
    }

    if (passCheck($pass) !== false) {
        header ("location: ../Pages/Sign_up.php?error=passwordisweak") ;
        exit () ;
    }

    if (userExists($conn, $username, $email) !== false) {
        header ("location: ../Pages/Sign_up.php?error=usernametaken") ;
        exit () ;
    }

    createUser($conn, $name, $username, $email, $pass) ;

}

else {
    header ("location: ../Pages/Sign_up.php") ;
    exit () ;
}