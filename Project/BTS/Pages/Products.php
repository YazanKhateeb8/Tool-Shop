<?php
    require_once '../Action_Pages/db_handler.php' ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style_Stuff/css/Products.css">
    <link rel="stylesheet" href="../Style_Stuff/fonts/Products_fonts.css">
    <link rel="stylesheet" href="../Style_Stuff/fonts/Pro_icons.css">
    <script src="https://kit.fontawesome.com/070ebb198d.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        include_once '../Tools/navbar.php' ;

        if (isset($_GET["error"])) {
            if ($_GET["error"] == "productadded") {
                echo "<script>alert('Product have been added!')</script>" ;
            }
            if ($_GET["error"] == "somethingwrong") {
                echo "<script>alert('Something went wrong. Try again!')</script>" ;
            }
            if ($_GET["error"] == "editsucc") {
                echo "<script>alert('Product have been Edited Successfully!')</script>" ;
            }
            if ($_GET["error"] == "cantadd") {
                echo "<script>alert('You cannot add to cart. You have to login!')</script>" ;
            }
            if ($_GET["error"] == "deleted") {
                echo "<script>alert('Product has been deleted!')</script>" ;
            }
            if ($_GET["error"] == "cantaddtocart") {
                echo "<script>alert('Something went wrong while adding the product to cart. Try again!')</script>" ;
            }
            if ($_GET["error"] == "productaddedtocart") {
                echo "<script>alert('Prodcuct has been added to Cart')</script>" ;
            }
            if ($_GET["error"] == "youhave") {
                echo "<script>alert('You have this product in your cart')</script>" ;
            }
            
        }
    ?>
    <div class="container-fluid mt-5 mb-5">
        <div class="row g-2">   
            <div class="col-md-3">
                <div class="t-products p-2">
                    <h6 class="text-uppercase">Tool Stock</h6>
                    <div class="p-lists">
                        <div class="d-flex justify-content-between mt-2"> <span>Blades</span> <span>23</span> </div>
                        <div class="d-flex justify-content-between mt-2"> <span>Chainsaw</span> <span>46</span> </div>
                        <div class="d-flex justify-content-between mt-2"> <span>Drills</span> <span>13</span> </div>
                        <div class="d-flex justify-content-between mt-2"> <span>Sanders</span> <span>33</span> </div>
                        <div class="d-flex justify-content-between mt-2"> <span>Other</span> <span>12</span> </div>
                </div>
            </div>
            <div class="processor p-2">
                <div class="heading d-flex justify-content-between align-items-center">
                    <h6 class="text-uppercase">Tools</h6> <span>--</span>
                </div>
                
                <div class="d-flex justify-content-between mt-2">
                    <div class="form-check"> <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="blade_cat"> <label class="form-check-label" for="flexCheckDefault"> Blades </label> </div>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <div class="form-check"> <input class="form-check-input" type="checkbox" id="flexCheckChecked" name="chain_cat"> <label class="form-check-label" for="flexCheckChecked"> Chainsaw </label> </div>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <div class="form-check"> <input class="form-check-input" type="checkbox" id="flexCheckChecked" name="drill_cat"> <label class="form-check-label" for="flexCheckChecked"> Drills </label> </div>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <div class="form-check"> <input class="form-check-input" type="checkbox" id="flexCheckChecked" name="san_cat"> <label class="form-check-label" for="flexCheckChecked"> Sanders </label> </div>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <div class="form-check"> <input class="form-check-input" type="checkbox" id="flexCheckChecked" name="other_cat"> <label class="form-check-label" for="flexCheckChecked"> Other </label> </div>
                </div>
            </div>

            <br>
            <input type='submit' name='sort' class='btn btn-primary text-uppercase' stytle="background-color: #fb771a !important;" value="Sort">


        </div>
        <div class="col-md-9">
            <div class="row g-2">  
                <?php
                    $sql = "SELECT * FROM product" ;
                    $result = mysqli_query($conn, $sql) ;         
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $img = "<img src=". $row['image']. " width=200 height=200>" ;
                            $name = $row["name"] ;
                            $price = $row["price"] ;
                ?>
                <div class="col-md-4">
                    <div class="product py-4"> 
                        <div class="text-center"> <?php echo $img?> </div>
                        <div class="about text-center">
                            <h5><?php echo $name?></h5> <span>₪<?php echo $price?></span>
                        </div>
                        <form method="post" action="../Action_Pages/product.inc.php">
                        <div class="cart-button mt-3 px-2 d-flex justify-content-between align-items-center">
                            <?php if (!isset($_SESSION["manager"])) {
                                echo "<button type='submit' name='addToCart' class='btn btn-primary text-uppercase'>Add to cart &nbsp</button>" ;
                            }
                            else {
                                echo "<button type='submit' name='editProduct' class='btn btn-primary text-uppercase'>Edit Product</button>" ;
                            }
                            ?>
                                
                        <input type="hidden" name="name" value="<?php echo $row['id']; ?>">
                        <div class="add">
                                </div>
                            </form>
                                
                        </div>
                    </div>
                </div>
                    <?php }}?>
            </div>
        </div>
        
    </div>
</div>
</body>
</html> 