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
            if ($_GET["error"] == "productadded") {
                echo "<script>alert('Product have been added!')</script>" ;
            }
            else if ($_GET["error"] == "addproductwrong") {
                echo "<script>alert('Something went wrong!')</script>" ;
            }
            else if ($_GET["error"] == "priceerror") {
                echo "<script>alert('price only between 10-10000!')</script>" ;
            }
            else if ($_GET["error"] == "addproductwrong") {
                echo "<script>alert('Something Went wrong while trying to add youur product. Try again!')</script>" ;
            }
        }
    ?>
    <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
            <br>
            <span class="font-weight-bold"></span><br>
            <span class="text-black-50"></span>
            </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right"><b>Add Product</b></h4>
                </div>
                <div class="row mt-2">

                    <form method="POST" action="../Action_Pages/add_product.inc.php">

                <div class="col-md-12"><label class="labels">Product Name</label><input type="text" class="form-control" name="name" required></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">price</label><input type="text" class="form-control" name="price" required></div>
                    <div class="col-md-12"><label class="labels">Stock</label><input type="text" class="form-control" name="stock" required placeholder="Numbers only between 1-100"></div>
                    <div class="col-md-12"><label class="labels">Image</label><input type="text" class="form-control" name="image" required placeholder="Image link"></div>
                    <div class="col-md-12"><label class="labels">Category</label><br>
                    <select name="category" style="width: 490px !important; line-height: 50px; height: 45px;" required>                       
                            <option value="Blades" selected>  Blades  </option>
                            <option value="Chainsaw">  Chainsaw  </option>                      
                          <option value="Drills">  Drills </option>
                          <option value="Grinders">  Grinders </option>
                        <option value="Sanders">   Sanders  </option>
                       <option value="Other"> Other </option> 
                </select>
                </div>
                </div>
                <div class="mt-5 text-center"><button type="submit" name="add" class="btn btn-primary profile-button" type="button">Save Profile</button></div>

                </form>

            </div>
        </div>
       
    </div>
</div>
</div>
</div>
    
</body>
</html>