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
            if ($_GET["error"] == "editerr") {
                echo "<script>alert('Something went while editing the Product. Try again!')</script>" ;
            }
            if ($_GET["error"] == "none") {
                echo "<script>alert('Your info has been updated successfully!')</script>" ;
            }
            if ($_GET["error"] == "cantdelete") {
                echo "<script>alert('Something went wrong, Couldn't delete product. Try again!')</script>" ;
            }
        }
        if (!isset($_SESSION["productArr"])) {
            header("refresh: 0") ;
        }
        $productArr = $_SESSION["productArr"] ;
    ?>
    <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="mt-5" width="200px" src="<?php echo $productArr['image'];?>">
            <br>
            <span class="font-weight-bold" style="font-size: 25px !important;"><?php echo $productArr['name'];?></span><br>
            <span class="text-black-50" style="color: black !important; font-size: 17px"><b style="font-size: 20px;">Category: <?php echo $productArr['category_name'];?></b></span>
            </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right"><b>Edit Product</b></h4>
                </div>
                <div class="row mt-2">

                    <form method="POST" action="../Action_Pages/edit_product.inc.php">

                <div class="col-md-12"><label class="labels">Product Name</label><input type="text" class="form-control" name="name" placeholder="<?php echo $productArr['name'] ;?>"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Price</label><input type="text" class="form-control" name="price" placeholder="₪<?php echo $productArr['price'] ;?>"></div>
                    <div class="col-md-12"><label class="labels">Stock</label><input type="text" class="form-control" name="stock" placeholder="<?php echo $productArr['stock'] ;?>"></div>
                    <div class="col-md-12"><label class="labels">Image</label><input type="text" class="form-control" name="image" placeholder="<?php echo $productArr['image'] ;?>"></div>
                    <input type="hidden" name="proid" value="<?php echo $productArr['id'] ;?>">
                </div>
                <div class="mt-5 text-center"><button type="submit" name="edit" class="btn btn-primary profile-button" type="button">Edit Product</button></div>
                <div class="mt-5 text-center"><button type="submit" name="delete" class="btn btn-primary profile-button" type="button" style="background-color: red;">Delete Product</button></div>

                </form>

            </div>
        </div>
       
    </div>
</div>
</div>
</div>
    
</body>
</html>