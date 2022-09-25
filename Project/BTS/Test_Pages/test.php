<?php
session_start() ;

    // function editProfile($conn, $name, $username, $email, $phone, $address, $image) {
        
    //     $sql = "" ;
    //     if ($name != "") {
    //         $sql .= "UPDATE `customer` SET name = '$name' WHERE email = '$_SESSION[email]';" ;
    //     }
    //     if ($username != "") {
    //         $sql .= "UPDATE `customer` SET userName = '$username' WHERE email = '$_SESSION[email]';" ;
    //     }
    //     if ($email != "") {
    //         $sql .= "UPDATE `customer` SET email = '$email' WHERE email = '$_SESSION[email]';" ;
    //     }
    //     if ($phone != "") {
    //         $sql .= "UPDATE `customer` SET phoneNumber = '$phone' WHERE email = '$_SESSION[email]';" ;
    //     }
    //     if ($address != "") {
    //         $sql .= "UPDATE `customer` SET address = '$address' WHERE email = '$_SESSION[email]';" ;
    //     }
    //     if ($image != "") {
    //         $sql .= "UPDATE `customer` SET image = '$image' WHERE email = '$_SESSION[email]';" ;
    //     }

    //     $sql = mysqli_multi_query($conn, $sql) ;
    // } 

    // include_once '../Action_Pages/functions.php' ;

    // function resetPass($conn, $password, $repeatPass) {
    //     if (passCheck($password) !== false) {
    //         header("location: ../Pages/Update_password.php?error=weakpass") ;
    //         exit() ;
    //     }
    //     if (PassMatch($password, $repeatPass) !== false) {
    //         header("location: ../Pages/Update_password.php?error=passnomatch") ;
    //         exit() ;
    //     } 
    //     $sql = "UPDATE `customer` SET password = '$password' WHERE email = '$_SESSION[resetPassEmail]';" ;
    //     echo $sql ;

        // if ($query == true) {
        //     session_start() ;
        //     session_unset() ;
        //     session_destroy() ;

        //     header("location: ../Pages/login.php") ;
        //     exit() ;
        // }
        // else {
        //     header("location: ../Pages/Update_password.php?error=wentwrong") ;
        //     exit() ;
        // }

    }

