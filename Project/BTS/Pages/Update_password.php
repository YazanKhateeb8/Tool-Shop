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
            <h3><strong>Reset Password</strong></h3>
            <p class="mb-4" style="color: black">Fill the fields to reset your password</p>
			
			
            <form action="../Action_Pages/update_password.inc.php" method="post">
			
			
              <div class="form-group first">
                <label for="username">New Password</label>
                <input type="password" class="form-control"  name="password">
              </div>
              <div class="form-group last mb-3">
                <label for="password">Confirm Passowrd</label>
                <input type="password" class="form-control"  name="repeatPass">
              </div>

              <?php
                if (isset($_GET["error"])) {

                  if ($_GET["error"] == "weakpass")
                    echo "<p class=error>* Password is Weak!</p>" ;
    
                  else if ($_GET["error"] == "passnomatch")
                    echo "<p class=error>* Passwords don't match!</p>" ;
                }
              ?>
              
              <div class="d-flex mb-5 align-items-center">
				          &nbsp;&nbsp;&nbsp;&nbsp;
                <span class="ml-auto">Return to&nbsp;&nbsp;<a href="login.php" class="forgot-pass"><b style="font-size: 20px; color: #0080ff">Login</b></a></span> 
              </div>

              <input  name="Reset" type="submit" value="Reset" class="btn btn-block btn-primary">

            </form>
            <br>
          </div>
        </div>
		
      </div>
    </div>
  </div>
  </body>
</html>