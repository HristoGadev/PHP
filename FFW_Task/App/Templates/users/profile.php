<?php /** @var \App\Data\UserDTO $data */ ?>
<head>
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>
<body>
<header>
    <div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">
        <div class="toast" style="position: absolute; top: 0; right: 0;">
            <div class="toast-header">
                <h3 class="mr-auto">User: <?= $data->getUsername()?></h3>
            </div>
            <div class="toast-body">
                Hello,<?= $data->getUsername()?>! Have a nice day!
            </div>
        </div>
    </div>
</header>
</body>
<form method="POST" id="register">
    <div>
        <label>
            Email: <input type="text" value="<?= $data->getEmail() ?>" >
        </label>
    </div>


</form>