<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/Project/BTS/Style_Stuff/css/edit_profile.css">
</head>
<body>
    <?php include_once '../Tools/navbar.php' ;?>

    <?php 
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "somewrong") {
                echo "<script>alert('Something went worng!')</script>" ;
            }
            else if ($_GET["error"] == "none") {
                echo "<script>alert('Your info has been updated successfully!')</script>" ;
            }
        }
    ?>
    <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="<?php echo $_SESSION['image'];?>">
            <br>
            <span class="font-weight-bold" style="font-size: 25px !important;"><?php echo $_SESSION['name'];?></span><br>
            <span class="text-black-50" style="color: black !important; font-size: 17px"><?php echo $_SESSION['email'];?></span>
            </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right"><b>Edit Profile</b></h4>
                </div>
                <div class="row mt-2">

                    <form method="POST" action="../Action_Pages/edit_profile.inc.php">

                <div class="col-md-12"><label class="labels">Full Name</label><input type="text" class="form-control" name="name" placeholder="<?php echo $_SESSION['name']?>"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Username</label><input type="text" class="form-control" name="username" placeholder="<?php echo $_SESSION['username']?>"></div>
                    <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" name="email" placeholder="<?php echo $_SESSION['email']?>"></div>
                    <div class="col-md-12"><label class="labels">Phone Number</label><input type="text" class="form-control" name="phone"></div>
                    <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" name="address"></div>
                    <div class="col-md-12"><label class="labels">Image</label><input type="text" class="form-control" name="image" placeholder="<?php echo $_SESSION['image']?>"></div>
                </div>
                <div class="mt-5 text-center"><button type="submit" name="save" class="btn btn-primary profile-button" type="button">Save Profile</button></div>

                </form>

            </div>
        </div>
       
    </div>
</div>
</div>
</div>
    
</body>
</html>