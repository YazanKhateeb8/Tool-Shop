<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/Project/BTS/Style_Stuff/css/profile.css">
</head>
<body>
    <?php include_once '../Tools/navbar.php' ;?>
<div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
    <div class="card p-4">
        <div class=" image d-flex flex-column justify-content-center align-items-center">
             <button class="btn btn-secondary">
                  <img src="<?php echo $_SESSION['image'];?>" height="100" width="100" style="border-radius: 30%;"/>
                </button>
                 <span class="name mt-3"><?php echo $_SESSION['name'];?></span>
                  <span class="idd"><?php echo $_SESSION['email'];?></span>
                <form action="Edit_profile.php">
                    <div class=" d-flex mt-2"> <button class="btn1 btn-dark">Edit Profile</button> </div>
                </form>
        </div>
    </div>
</div>
</body>
</html>