<?php
include_once '../config/database.php';
include_once '../objects/product.php';
include_once '../objects/category.php';

$database=new Database();
$db=$database->getConnection();
$product=new Product($db);
$category=new Category($db);

include "header.html";

$create_product='Create product';
echo "<div class='right-button-margin'>";
echo "<a href='../php_crud/index.php' class='btn btn-default pull-right'>Read Products</a>";
echo "</div>";
include "footer.html";
?>
<form method="post">

    <table class='table table-hover table-responsive table-bordered'>

        <tr>
            <td>Name</td>
            <td><input type='text' name='name' class='form-control' required="required" /></td>
        </tr>

        <tr>
            <td>Price</td>
            <td><input type='text' name='price' class='form-control' required="required" /></td>
        </tr>

        <tr>
            <td>Description</td>
            <td><textarea name='description' class='form-control' required="required"></textarea></td>
        </tr>

        <tr>
            <td>Category</td>
            <td>
                <!-- categories from database will be here -->

                <?php
                // read the product categories from the database
                $stmt = $category->read();

                // put them in a select drop-down
                echo "<select class='form-control' name='category_id'>";

                while ($row_category = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row_category);
                    echo "<option value='{$id}'>{$name}</option>";
                }

                echo "</select>";
                ?>

            </td>
        </tr>

        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Create</button>
                <?php
                // if the form was submitted - PHP OOP CRUD Tutorial
                if($_POST){

                    // set product property values
                    $product->name = $_POST['name'];
                    $product->price = $_POST['price'];
                    $product->description = $_POST['description'];
                    $product->category_id = $_POST['category_id'];

                    // create the product
                    if($product->create()){
                        echo "<div class='alert alert-success'>Product was created.</div>";
                    }

                    // if unable to create the product, tell the user
                    else{
                        echo "<div class='alert alert-danger'>Unable to create product.</div>";
                    }
                }
                ?>
            </td>
        </tr>

    </table>
</form>


