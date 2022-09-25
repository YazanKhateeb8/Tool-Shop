<?php

    function emptyInputSignup($name, $username, $email, $pass, $pwdRepeat) {
        $result;
        if (empty($name) || empty($username) || empty($email) || empty($pass) || empty($pwdRepeat) )
            $result = true ;
        
        else 
            $result = false ;

        return $result ;
    }

    function invalidName($name) {
        $result ;
        if (!preg_match("/^[a-zA-Z]*+[\s]+[a-zA-Z]+$/", $name)) 
            $result = true ;

        else 
            $result = false ;

        return $result ;
    }

    function invalidUsrname($username) {
        $result ;
        if (!preg_match("/^[a-zA-Z0-9]{6,64}$/", $username))
            $result = true ;

        else 
            $result = false ;

        return $result ;
    }

    function invalidEmail($email) {
        $result ;
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
            $result = true ;

        else 
            $result = false ;

        return $result ;    
    }

    function passCheck($pass) {
        $result ;
        if (!preg_match("/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9*]{8,15}/", $pass))
            $result = true ;

        else 
            $result = false ;

        return $result ;    
    }

    function PassMatch($pass, $pwdRepeat) {
        $result ;
        if ($pass != $pwdRepeat) 
            $result = true ;

        else 
            $result = false ;
        
        return $result ;
    }

    function userExists($conn, $username, $email) {
        $sql = "SELECT * FROM customer WHERE userName = ? OR email = ?;";
        $stmt = mysqli_stmt_init($conn) ;
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header ("location: ../Pages/Sign_up.php?error=usernametaken") ;
            exit () ;
        }

        mysqli_stmt_bind_param($stmt, 'ss', $username, $email) ;
        mysqli_stmt_execute($stmt) ;

        $resultData = mysqli_stmt_get_result($stmt) ;

        if ($row = mysqli_fetch_assoc($resultData)) {
            return $row ;
        }

        else {
            $result = false ;
            return $result ;
        }

        mysqli_stmt_close($stmt) ;
        
    }


    function createUser($conn, $name, $username, $email, $pass) {
        $id = rand(1000,9999);
        $sql = "INSERT INTO customer (id, name, userName, email, password) VALUES (?, ?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn) ;
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header ("location: ../Pages/Sign_up.php?error=stmtfailed") ;
            exit () ;
        }

        mysqli_stmt_bind_param($stmt, 'issss', $id, $name, $username, $email, $pass) ;
        mysqli_stmt_execute($stmt) ;

        mysqli_stmt_close($stmt) ;
        header ("location: ../Pages/login.php?error=signupsuc") ;
        $cartId = rand(10000,99999);
        $query = "INSERT INTO `cart` (id, customer_id) VALUES ($cartId, $id) ;" ; 
        $cartQ = mysqli_query($conn, $query) ;
        if ($cartQ !== true) {
            $cartQ = mysqli_query($conn, $query) ;
        }
        mysqli_close($conn);
        exit () ;
        
    }


 /*//////////////////////////////////////////////////////////////////////////////////////////////////////////*/
                /*LOGIN*/


    function emptyInputlogin($username, $pass) {
        $result;
        if (empty($username) || empty($pass))
            $result = true ;
        
        else 
            $result = false ;

        return $result ;
    }

    function loginUser($conn, $username, $pass, $rem) {
        $userExists = userExists($conn, $username, $username) ;

        if ($userExists === false) {
            header("location: ../Pages/login.php?error=wronglogin") ;
            exit() ;
        }

        $dbPass = $userExists["password"] ;

        if ($dbPass !== $pass) {
            header("location: ../Pages/login.php?error=wronglogin") ;
            exit() ;
        }
        else if ($dbPass === $pass) { 
            if ($userExists["isManager"] === 'T') {        
                session_start() ;
                $_SESSION["manager"] = true ;
                $_SESSION["username"] = $userExists["userName"] ;
                $_SESSION["name"] = $userExists["name"] ;
                $_SESSION["email"] = $userExists["email"] ;
                $_SESSION["image"] = $userExists["image"] ;
                $_SESSION["id"] = $userExists["id"] ;
                if (isset($rem)) {
                    if (!isset($_COOKIE['user_login'])) {
                        setcookie('user_login', $userExists["userName"], time() + 60*60, '/') ;
                        setcookie('user_pass', $userExists["password"], time() + 60*60, '/') ;
                        }
                }
                else {
                    setcookie('user_login',"", -30, '/') ;
                    setcookie('user_pass', "", -30, '/') ;
                }
                
                header("location: ../../Main.php") ;
                exit() ;
            }
            else {
                $sql = "SELECT id FROM cart where customer_id = '$userExists[id]' ;" ;
                $sql = mysqli_query($conn, $sql) ;

                if ($sql != true) {
                    header("location: ../Pages/login.php?error=wrong") ;
                    exit() ;
                }
                $row = mysqli_fetch_assoc($sql) ;
                session_start() ;
                $_SESSION["userCart"] = $row["id"] ;
                $_SESSION["username"] = $userExists["userName"] ;
                $_SESSION["name"] = $userExists["name"] ;
                $_SESSION["email"] = $userExists["email"] ;
                $_SESSION["image"] = $userExists["image"] ;
                $_SESSION["id"] = $userExists["id"] ;
                if (isset($rem)) {
                    if (!isset($_COOKIE['user_login'])) {
                        setcookie('user_login', $userExists["userName"], time() + 60*60, '/') ;
                        setcookie('user_pass', $userExists["password"], time() + 60*60, '/') ;
                    }
                }
                else {
                    setcookie('user_login',"", -30, '/') ;
                    setcookie('user_pass', "", -30, '/') ;
                }
                header("location: ../../Main.php") ;
                exit() ;
            }
        }
        mysqli_close($con);
    }   

/*/////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
            /* Reset Password */


    function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array();
        $alphaLength = strlen($alphabet) - 1; 
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); 
    }


    function forgotPass($conn, $email) {
        $userExists = userExists($conn, $email, $email) ;

        if ($userExists === false) {
            header("location: ../Pages/Reset_password.php?error=nosuchemail") ;
            exit() ;
        }
        
        $new_pass = randomPassword() ;
        $sql = "UPDATE customer SET password = '$new_pass' WHERE email = '$email' ;" ;
        $query = mysqli_query($conn, $sql) ;

        if ($query == true) {
            session_start() ;
            $_SESSION["resetPassEmail"] = $email ;
            $to_email = $userExists["email"] ;
            $subject = "Reset password";
            $body = "Hi " .$userExists['name']. "\nThis is your new temporary password ==> { " .$new_pass. " }\nEnter this password in the login page to reset your password." ; 
            
            $header = "From:knaanebraa@gmail.com" ;
            $mail = mail($to_email, $subject, $body, $header) ;

            if ($mail === true) {
		        session_start() ;
                $_SESSION["resetPass"] = 1 ;
                header("location: ../Pages/login.php?mail=mailsent") ;
                exit() ;
            }
	        else {
                header("location: ../Pages/Reset_password.php?error=mailfailed") ;
                exit() ;
            }

        }
        mysqli_close($con);
    }


    function resetPass($conn, $password, $repeatPass) {
        if (passCheck($password) !== false) {
            header("location: ../Pages/Update_password.php?error=weakpass") ;
            exit() ;
        }
        if (PassMatch($password, $repeatPass) !== false) {
            header("location: ../Pages/Update_password.php?error=passnomatch") ;
            exit() ;
        } 
        session_start() ;
        $sql = "UPDATE customer SET `password` = '$password' WHERE email = '$_SESSION[resetPassEmail]';" ;
        $query = mysqli_query($conn, $sql) ;
        echo $_SESSION["resetPassEmail"] ;

        if ($query !== false) {
            session_start() ;
            session_unset() ;
            session_destroy() ;

            header("location: ../Pages/login.php?error=passwordreset") ;
            exit() ;
        }
        else {
            header("location: ../Pages/Update_password.php?error=wentwrong") ;
            exit() ;
        }
        mysqli_close($conn);
    }



/*///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
            /*Edit Profile*/

    
    function editProfile($conn, $name, $username, $email, $phone, $address, $image) { 
        session_start() ;
        $sql = "" ;
        if ($name != "") {
            $sql .= "UPDATE `customer` SET name = '$name' WHERE email = '$_SESSION[email]';" ;  
        }
        if ($username != "") {
            $sql .= "UPDATE `customer` SET userName = '$username' WHERE email = '$_SESSION[email]';" ;  
        }
        if ($email != "") {
            $sql .= "UPDATE `customer` SET email = '$email' WHERE email = '$_SESSION[email]';" ;
        }
        if ($phone != "") {
            $sql .= "UPDATE `customer` SET phoneNumber = '$phone' WHERE email = '$_SESSION[email]';" ;
        }
        if ($address != "") {
            $sql .= "UPDATE `customer` SET address = '$address' WHERE email = '$_SESSION[email]';" ;
        }
        if ($image != "") {
            $sql .= "UPDATE `customer` SET image = '$image' WHERE email = '$_SESSION[email]';" ;
        }

        //echo $sql ;

        $sql = mysqli_multi_query($conn, $sql) ;

        if ($sql == true) {
            header("location: ../Pages/Edit_profile.php?error=none") ;
            exit () ;
        }
        else {
            header("location: ../Pages/Edit_profile.php?error=somewrong") ;
            exit() ;
        }

        //$query = mysqli_multi_query($conn, $sql) ;

        //if ($query == true) {
            //header("location: ../Pages/Edit_profile.php?error=none") ;
           //exit() ;
        //}
        //else {
            //header("location: ../Pages/Edit_profile.php?error=somewrong") ;
            //exit() ;
        //}
        
        mysqli_close($conn);
    }






    /*////////////////////////////////////////////////////////////////////////////////////*/
            //Product Functions

        
    function emptyInputAdd_Product($name, $price, $stock, $image, $categoty) {
        $result;
        if (empty($name) || empty($price) || empty($stock) || empty($image) || empty($categoty) )
            $result = true ;
        
        else 
            $result = false ;

        return $result ;
    }


    function addProduct($conn, $name, $price, $stock, $image, $categoty) {
        $prod = "SELECT * FROM product ;" ;
        $result = mysqli_query($conn, $prod);

        if ($result !== false) {
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row["name"] == $name) {
                    $sql = "UPDATE prodcut SET stock = stock + $stock WHERE name = '$name' ;" ;
                    $query = mysqli_query($conn, $sql) ;

                    if ($query !== true) {
                        header("location: ../Pages/Add_product.php?error=addproductwrong") ;
                        exit() ;
                    }
                }
            }
        
           $id = rand(1000000,9999999) ;
           $sql = "INSERT INTO product VALUES ($id, '$name', $price, $stock, '$image', '$categoty') ;" ;
           $query = mysqli_query($conn, $sql) ;

           if ($query !== true) {
            header("location: ../Pages/Add_product.php?error=addproductwrong") ;
            exit() ;
           }

            header("location: ../Pages/Products.php?error=productadded") ;
            mysqli_close($conn);
        }
        else {
            header("location: ../Pages/Add_product.php?error=addproductwrong") ;
        }
    }
    


    function editProduct($conn, $id, $name, $price, $stock, $img) {
        
        $sql = "" ;
        if (!empty($name)) {
            $sql .= "UPDATE `product` SET name = '$name' WHERE id = $id ;" ;
        }
        if (!empty($price)) {
            $sql .= "UPDATE `product` SET price = $price WHERE id = $id ;" ;
        }
        if (!empty($stock)) {
            $sql .= "UPDATE `product` SET stock = $stock WHERE id = $id ;" ;
        }
        if (!empty($img)) {
            $sql .= "UPDATE `product` SET img = '$img' WHERE id = $id ;" ;
        }

        $query = mysqli_multi_query($conn, $sql) ;

        if ($query !== true) {
            header("location: ../Pages/Edit_product.php?error=editerr") ;
            exit() ;
        }
        
        header("location: ../Pages/Products.php?error=editsucc") ;
        mysqli_close($conn);
        exit() ;

    }


    function deleteProduct($conn, $id) {

        $sql = "DELETE FROM product WHERE id = $id ;" ;
        $query = mysqli_query($conn, $sql) ;

        if ($query !== true) {
            header("location: ../Pages/Edit_product?error=cantdelete") ;
            exit() ;
        }
        
        header("location: ../Pages/Products.php?error=deleted") ;
        mysqli_close($conn);
        exit() ;

    }

    // function sortProducts($conn, $blade_cat, $chain_cat, $drill_cat, $san_cat, $other_cat) {
    //     include_once 'db_handler.php' ;
    //     $sanders = "SELECT * FROM product WHERE category_name = 'Sanders' ;" ;
    // }



    /*///////////////////////////////////////////////////////////////////////////////////////////*/
            /*Cart Functions*/

    function addtoCart($conn, $id) {
        $exist = "SELECT * FROM product_cart WHERE cart_id = '$_SESSION[userCart]' ;" ;
        $exist = mysqli_query($conn, $exist) ;

        if (mysqli_num_rows($exist) > 0) {
            while ($productRow = mysqli_fetch_assoc($exist)) {
                if ($id == $productRow["product_id"]) {
                    header("location: ../Pages/Products.php?error=youhave") ;
                    exit() ;
                }
            }
        }

        $sql = "INSERT INTO product_cart VALUES ('$_SESSION[userCart]', '$id') ;" ;
        $sql = mysqli_query($conn, $sql) ;

        if ($sql != true) {
            header("location: ../Pages/Products.php?error=cantaddtocart") ;
            exit() ;
        }

        header("location: ../Pages/Products.php?error=productaddedtocart") ;
        mysqli_close($conn);
        exit() ;
    }


    function deleteFromCart($conn, $productid, $cartid) {
        $delete = "DELETE FROM product_cart WHERE cart_id = $cartid AND product_id = $productid ;" ;
        $delete = mysqli_query($conn, $delete) ;

        if ($delete != true) {
            header("location: ../Pages/Cart.php?error=cantdelete") ;
            exit() ;
        }

        header("location: ../Pages/Cart.php?error=deleted") ;
        mysqli_close($conn);
        exit() ;
    }

    

    function buy($conn) {
        session_start() ;
        $update_stock = "SELECT * FROM product_cart WHERE cart_id = $_SESSION[userCart] ;" ;
        $update_stock = mysqli_query($conn, $update_stock) ;
        $sum = 0 ;
        if (mysqli_num_rows($update_stock) > 0) {
            while ($cartRow = mysqli_fetch_assoc($update_stock)) {

                $product = "SELECT * FROM product ;" ;
                $productResult = mysqli_query($conn, $product) ;
                
                if (mysqli_num_rows($productResult) > 0) {
                    while ($productRow = mysqli_fetch_assoc($productResult)) {

                        if ($productRow["id"] == $cartRow["product_id"]) {
                            $sum += $productRow["price"] ;
                            $sql = "UPDATE product SET stock = stock - 1 WHERE id = $productRow[id] ;" ;
                            $sql = mysqli_query($conn, $sql) ;

                            $delete = "DELETE FROM product_cart WHERE cart_id = $_SESSION[userCart] AND product_id = $productRow[id] ;" ;
                            $delete = mysqli_query($conn, $delete) ;
                        }
                    }
                   
                }
            }
            $date = date("Y-m-d") ;
            $orderID = rand(100000,999999) ;
            $add = "INSERT INTO `order` VALUES ($orderID, $_SESSION[userCart], $_SESSION[id] ,$sum, '$date') ;" ;
            $add = mysqli_query($conn, $add) ;
        }
       
        
        header("location: ../Pages/Cart.php?error=payed") ;
        exit() ;


    }