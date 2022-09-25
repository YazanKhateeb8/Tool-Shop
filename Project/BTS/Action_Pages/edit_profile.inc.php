<?php 

    if (isset($_POST["save"])) {
        $name = $_POST["name"] ;
        $username = $_POST["username"] ;
        $email = $_POST["email"] ;
        $phone = $_POST["phone"] ;
        $address = $_POST["address"] ;
        $image = $_POST["image"] ;


        require_once 'db_handler.php' ;
        require_once 'functions.php' ;   

        editProfile($conn, $name, $username, $email, $phone, $address, $image) ;
    }

    else {
        header("location: ../Action_Pages/Edit_profile.php") ;
        exit () ;
    }

    /*      $name = $_POST["name"] ;    
        $username = $_POST["username"] ;
        $email = $_POST["email"] ;
        $phone = $_POST["phone"] ;
        $address = $_POST["address"] ;
        $image = $_POST["image"] ; 
        
        $profileData = array($name, $username, $email, ,$phone ,$address, $image) ;

        for ($i = 0 ; $i < count($profileData) ; $i ++) {
        if (empty($profileData[$i])) {
            $profileData[$i] = "null" ;
            }
        }
        

        $profileData = array(
            $name => $_POST["name"],
            $username => $_POST["username"],
            $email => $_POST["email"],
            $phone => $_POST["phone"],
            $address => $_POST["address"],
            $image => $_POST["image"],
        ) ;
        

        for ($i = 0 ; $i < count($profileData) ; $i ++) {
            if ($profileData[$i] != "") {
                echo $profileData[$i] ;
            }
            else {
                echo "null\n" ;
            }

        }
        */ 