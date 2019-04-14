<?php /** @var \App\Data\ProductDTO [] $data */ ?>
<head>
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>

<h1>All Users</h1>

<table border="2">
    <thead>
    <tr>
        <td >Id</td>
        <td>Username</td>
        <td>FullName</td>
        <td>BornOn</td>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($data as $user): ?>
        <tr>
            <td><?= $user->getId() ?></td>
            <td><?= $user->getName() ?></td>
            <td><?= $user->getPrice()?></td>
            <td><?= $user->getDescription() ?></td>
        </tr>
    <?php endforeach; ?>

    </tbody>
</table>

Go back to your <a href="profile.php">profile</a>
