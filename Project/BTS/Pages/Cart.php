<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style_Stuff/css/cart.css">
</head>
<body>
    <?php  
    if (isset($_GET["error"])) {
      if ($_GET["error"] == "payed") {
        echo "<script>alert('Congrats on your new product!')</script>" ;
      }
    }
      include_once '../Tools/navbar.php' ; ?>   

    <div class="container mt-5 mb-5">
        
    <?php 
        include_once '../Action_Pages/db_handler.php' ;

        $cart = "SELECT * FROM product_cart WHERE cart_id = $_SESSION[userCart] ;" ;
        $cartResult = mysqli_query($conn, $cart) ;
        $count = 0 ;
        $sum = 0 ;
        if (mysqli_num_rows($cartResult) > 0) {
            while ($cartRow = mysqli_fetch_assoc($cartResult)) {

                $product = "SELECT * FROM product ;" ;
                $productResult = mysqli_query($conn, $product) ;

                if (mysqli_num_rows($productResult) > 0) {
                    while ($productRow = mysqli_fetch_assoc($productResult)) {
                        
                        if ($productRow["id"] == $cartRow["product_id"]) {
                            $name = $productRow["name"] ;
                            $price = $productRow["price"] ;
                            $image = $productRow["image"] ;
                            $category = $productRow["category_name"] ;
                            $sum += $price ;
                            $count ++ ;
                        ?>
        <div class="d-flex justify-content-center row">
        
            <div class="col-md-10">
            <br><br>
                <div class="row p-2 bg-white border rounded">
                
                    <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" style="width: 200px !important; height: 200px !important;" src="<?php echo $image ;?>"></div>
                    <div class="col-md-6 mt-1">
                        <h5><?php echo $name ;?></h5>
                        <div class="d-flex flex-row">
                    </div>
                </div>
                <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                    <div class="d-flex flex-row align-items-center">
                        <h4 class="mr-1">₪<?php echo $price ;?></h4>
                    </div>
                    <h6 class="text-success"><?php echo $category ;?></h6>
                    <form method="post" action="../Action_Pages/cart.inc.php">
                    <div class="d-flex flex-column mt-4">
                     
                        <button type="submit" name="delete" class="btn btn-outline-primary btn-sm mt-2" type="button" style="background-color: red; color: white;">Delete</button>
                        <input type="hidden" name="productid" value="<?php echo $productRow["id"] ;?>">
                        <input type="hidden" name="cartid" value="<?php echo $_SESSION['userCart'] ;?>">
                        </form>
                    </div>
                </div>
                
            </div>
            
        </div>
        
    </div>
    <?php }}}}}?> 

    <br><br>
    <div class="cart_checkout-place" style="width: 86% !important ; transform: translateX(8%) ;">
<div class="card mb-3">
    <div class="card-body">

      <h5 class="mb-3">Order Summary </h5>

      <ul class="list-group list-group-flush">
        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
          Item(s)
          <span><?php echo $count ; ?></span>
        </li>

        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
          <div>
            <h5>Total (ILS)</h5>
          </div>
          <span><h5>₪<?php echo $sum ; ?></h5></span>
        </li>
      </ul>

      <a href="Checkout.php" class="bnga"> <button type="button" class="btn btn-primary btn-block waves-effect waves-light" style="background-color: #df6711 ;">Checkout</button></a>
    </div>
  </div>
</div>
</div>
</body>
</html>