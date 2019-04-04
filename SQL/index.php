<?php
$page_title='Read products';

spl_autoload_register();

include_once './views/header.html';
include_once './config/Database.php';
include_once './model/Product.php';
include_once './model/Category.php';

$page = isset($_GET['page']) ? $_GET['page'] : 1;

// set number of records per page
$records_per_page = 5;

// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;



// instantiate database and model
$database = new Database();
$db = $database->getConnection();

$product = new Product($db);
$category = new Category($db);

// query products
$stmt = $product->readAll($from_record_num, $records_per_page);
$num = $stmt->rowCount();



echo "<div class='right-button-margin'>";
echo "<a href='controller/create_product.php' 
         class='btn btn-default pull-right'>Create Product</a>";
echo "</div>";

if($num>0){

    echo "<table class='table table-hover table-responsive table-bordered'>";
    echo "<tr>";
    echo "<th>Product</th>";
    echo "<th>Price</th>";
    echo "<th>Description</th>";
    echo "<th>Category</th>";
    echo "<th>Actions</th>";
    echo "</tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);

        echo "<tr>";
        echo "<td>{$name}</td>";
        echo "<td>{$price}</td>";
        echo "<td>{$description}</td>";
        echo "<td>";
        $category->id = $category_id;
        $category->readName();
        echo $category->name;
        echo "</td>";

        echo "<td>";
        // read product button
        echo "<a href='../views/read_one.php?id={$id}' class='btn btn-primary left-margin'>";
        echo "<span class='glyphicon glyphicon-list'></span> Read";
        echo "</a>";

// edit product button
        echo "<a href='controller/update_product.php?id={$id}' class='btn btn-info left-margin'>";
        echo "<span class='glyphicon glyphicon-edit'></span> Edit";
        echo "</a>";

// delete product button
        echo "<a href='controller/delete_product.php?id={$id}' class='btn btn-danger delete-object'>";
        echo "<span class='glyphicon glyphicon-remove'></span> Delete";
        echo "</a>";

        echo "</td>";

        echo "</tr>";

    }

    echo "</table>";

$page_url="index.php";
$total_rows=$product->countAll();

include "./views/paging.php";

// paging buttons will be here
}

// tell the user there are no products
else{
    echo "<div class='alert alert-info'>No products found.</div>";
}



include_once './views/footer.html';