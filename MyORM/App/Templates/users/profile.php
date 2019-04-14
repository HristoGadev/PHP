<?php /** @var \App\Data\UserDTO $data */ ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<link rel="stylesheet" href="../views/libs/style.css" />
</head>
<h1>USER PROFILE</h1>

<form method="POST" id="register">
    <div>
        <label>
            Username: <input type="text" value="<?= $data->getUsername() ?>" name="username">
        </label>
    </div>

    <div>
        <label>
            Password: <input type="text" name="password">
        </label>
    </div>

    <div>
        <label>
            First Name: <input type="text" value="<?= $data->getFirstName() ?>" name="firstName">
        </label>
    </div>

    <div>
        <label>
            Last Name: <input type="text" value="<?= $data->getLastName() ?>" name="lastName">
        </label>
    </div>

    <div>
        <label>
            Birthday: <input type="text" value="<?= $data->getBornOn() ?>" name="bornOn">
        </label>
    </div>

    <div>
        <input type="submit" name="edit" value="Edit Profile">
    </div>

</form>


You can <a href="addProducts.php">Add product</a> or see <a href="all.php">All Users</a>
