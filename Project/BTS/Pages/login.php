<?php
  session_start() ;
  if (isset($_SESSION["loginCount"])) {
    if ($_SESSION["loginCount"] < 3) {
        if (isset($_GET["error"])) {
          if ($_GET["error"] == "wronglogin") {
            $_SESSION["loginCount"] += 1 ;
        }
      }
    }
    else if ($_SESSION["loginCount"] >= 3) {
      header("location: Reset_password.php") ;
      exit() ;
    }
  }
  else if (!isset($_SESSION["loginCount"])) {
    $_SESSION["loginCount"] = 0 ;
  }

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Style_Stuff/fonts/icomoon/style.css">
    <link rel="stylesheet" href="../Style_Stuff/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../Style_Stuff/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Style_Stuff/css/style.css">
  </head>
  <body>
  

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('../Style_Stuff/images/bg_1.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
	  
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3><strong>Login</strong></h3>
            <p class="mb-4" style="color: black">Login to RenTool to start shopping</p>
            <?php 
              if (isset($_SESSION["resetPass"])) {
                echo "<p class='email'>We sent you an email with you temporary password</p>" ; 
                //unset($_SESSION["resetPass"]) ;
              }
            ?>
			
            <form action="../Action_Pages/login.inc.php" method="post">
			
			
              <div class="form-group first">
                <label for="username">E-mail/Username</label>
                <input type="text" class="form-control"  name="username" value="<?php if(isset($_COOKIE['user_login']))  echo $_COOKIE['user_login'];  ?>">
              </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control"  name="password" value="<?php if(isset($_COOKIE['user_pass'])) echo $_COOKIE['user_pass'];?>">
              </div>

              <?php
                if (isset($_GET["error"])) {

                  if ($_GET["error"] == "emptyinput")
                    echo "<p class=error>* Fill in all fields!</p>" ;
    
                  else if ($_GET["error"] == "wronglogin")
                    echo "<p class=error>* Invalid login info!</p>" ;
                    
                  else if ($_GET["error"] == "signupsuc")
                    echo "<script>alert('Sign up Successful')</script>";

                    else if ($_GET["error"] == "passwordreset")
                      echo "<script>alert('Password was reset Successfully');</script>" ;
                }
              ?>
              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" name="remember" <?php if (isset($_COOKIE['user_login']))  echo "checked" ; ?>/>
                  <div class="control__indicator"></div>
                </label>
				          &nbsp;&nbsp;&nbsp;&nbsp;
                <span class="ml-auto">Have an account?&nbsp;&nbsp;<a href="Sign_up.php" class="forgot-pass"><b style="font-size: 20px; color: #0080ff">Sign up</b></a></span> 
              </div>

              <input type="submit" value="Log In" class="btn btn-block btn-primary" name="submit">

            </form>
            <br>
              <div>
                <a  href="Reset_password.php" style="font-size: 17px;">Forgot password</a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <b style="font-size: 20px;"><a href="../../Main.php">Skip</a></b>
              </div>

          </div>
        </div>
		
      </div>
    </div>
  </div>
  </body>
</html>