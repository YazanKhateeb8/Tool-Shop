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
            <h3><strong>Sign up</strong></h3>
            <p class="mb-4" style="color: black">You want to get Power tools for the best Prices?. Sign up to RenTools</p>


            <form action="../Action_Pages/signup.inc.php" method="POST">
			
			<div class="form-group first">
                <label for="name">Full name</label>
                <input type="text" class="form-control" name="name">
              </div>
			
              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username">
              </div>
			  
			  <div class="form-group first">
                <label for="email">E-mail</label>
                <input type="text" class="form-control" name="email">
              </div>
			  
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="pass">
              </div>
			  
			  <div class="form-group last mb-3">
                <label for="password">Confirm password</label>
                <input type="password" class="form-control" name="pwdRepeat">
              </div>

              <?php
            if (isset($_GET["error"])) {

              if ($_GET["error"] == "emptyinput")
                echo "<p class=error>* Fill in all fields!</p>" ;

              else if ($_GET["error"] == "invalidename")
                echo "<p class=error>* Name is not valid!</p>" ;

              else if ($_GET["error"] == "invalidusername")
                echo "<p class=error>* Username is not valid!</p>" ;

              else if ($_GET["error"] == "invalidemail")
                echo "<p class=error>* Entered Email is not valid!</p>" ;

              else if ($_GET["error"] == "passwordsdontmatch")
                echo "<p class=error>* Passwords don't match!</p>" ;

              else if ($_GET["error"] == "passwordisweak")
                echo "<p class=error>* Password is weak!</p>" ;

                else if ($_GET["error"] == "usernametaken")
                echo "<p class=error>* Email or username are already in use!</p>" ;

              else if ($_GET["error"] == "stmtfailed")
                echo "<p class=error>* Something went wrong!</p>" ;

                else if ($_GET["error"] == "none")
                echo "<script>alert('Signup successful');</script>" ;
            }
          ?>
              
              <div class="d-flex mb-5 align-items-center">
                <span class="ml-auto">Have an account?&nbsp;&nbsp;<a href="login.php" class="forgot-pass"> <b style="font-size: 20px; color: #0080ff;">  Log in</b></a></span> 
              </div>

              <input type="submit" value="Sign up" class="btn btn-block btn-primary" name="submit">

            </form>
            <br>
            
            <div class="skip"><b style="font-size: 20px;">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="../../Main.php">Skip</a></b></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </body>
</html>