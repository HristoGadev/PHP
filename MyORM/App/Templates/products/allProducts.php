<?php /** @var \App\Data\ProductDTO [] $data */ ?>
<head>
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>

<h1>All Products</h1>

<table border="2">
    <thead>
    <tr>
        <td >Id</td>
        <td>Name</td>
        <td>Price</td>
        <td>Description</td>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($data as $product): ?>
        <tr>
            <td><?= $product->getId() ?></td>
            <td><?= $product->getName() ?></td>
            <td><?= $product->getPrice()?></td>
            <td><?= $product->getDescription() ?></td>
        </tr>
    <?php endforeach; ?>

    </tbody>
</table>

Go back to your <a href="">profile</a>
