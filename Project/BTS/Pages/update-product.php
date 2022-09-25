<?php
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $category_name = $_POST['category_name'];
    $image = $_POST['image'];
    $db = mysqli_connect('localhost','root','','php_project');
    $sqlUpdate = "UPDATE product SET name = '$name', price = $price, stock = $stock,  category_name = '$category_name' WHERE id = $id";
    $sqlDelete ="DELETE FROM `product` WHERE `id` = $id"; 
    if($_POST['action'] == 'edit'){
        mysqli_query($db,$sqlUpdate);
    }
    else if($_POST['action'] == 'delete'){
        mysqli_query($db,$sqlDelete);
    }
    header('location: edit-products.php');
?>