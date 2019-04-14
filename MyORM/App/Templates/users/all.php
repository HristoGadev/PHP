<?php /** @var \App\Data\UserDTO [] $data */ ?>
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
            <td><?= $user->getUsername() ?></td>
            <td><?= $user->getFirstName() . " " . $user->getLastName() ?></td>
            <td><?= $user->getBornOn() ?></td>
        </tr>
        <?php endforeach; ?>

    </tbody>
</table>

Go back to your <a href="profile.php">profile</a>