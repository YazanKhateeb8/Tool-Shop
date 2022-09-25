<?php
  session_start() ;
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
            <h3><strong>Forgot your password?</strong></h3>
            <p class="mb-4" style="color: black">You can reset your password here, enter the right info below.</p>
			
			
            <form action="../Action_Pages/send_mail.php" method="post">
			
			
              <div class="form-group first">
                <label for="username">E-mail</label>
                <input type="text" class="form-control" name="email">
              </div>


              <?php
                if (isset($_GET["error"])) {

                    if ($_GET["error"] == "nosuchemail")
                        echo "<p class=error>* Email does not exist!</p>" ;

                    if ($_GET["error"] == "mailfailed")
                        echo "<p class=error>* Something went wrong. Try again!</p>" ;
                }
              ?>
              
              <div class="d-flex mb-5 align-items-center">

                </label>
				          &nbsp;&nbsp;&nbsp;&nbsp;
                <span class="ml-auto">Return to&nbsp;&nbsp;<a href="login.php" class="forgot-pass"><b style="font-size: 20px; color: #0080ff">Login</b></a></span> 
              </div>

              <input type="submit" value="Search" class="btn btn-block btn-primary" name="search">

            </form>
          </div>
        </div>
		
      </div>
    </div>
  </div>
  </body>
</html>