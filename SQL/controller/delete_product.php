<?php
include_once '../config/Database.php';
include_once '../model/Product.php';
include_once '../model/Category.php';

include_once '../views/header.html';
include_once "../views/footer.html";
// check if value was posted
if($_POST){


    // get database connection
    $database = new Database();
    $db = $database->getConnection();

    // prepare product object
    $product = new Product($db);

    // set product id to be deleted
    $product->id = $_POST['object_id'];

    // delete the product
    if($product->delete()){
        echo "Object was deleted.";
    }

    // if unable to delete the product
    else{
        echo "Unable to delete object.";
    }
}

?>
