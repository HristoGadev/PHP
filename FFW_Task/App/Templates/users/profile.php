<?php /** @var \App\Data\UserDTO $data */ ?>
<head>
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

</head>
<h1>USER PROFILE</h1>

<form method="POST" id="register">
    <div>
        <label>
            Username: <input type="text" value="<?= $data->getUsername() ?>" name="username">
        </label>
    </div>


</form>