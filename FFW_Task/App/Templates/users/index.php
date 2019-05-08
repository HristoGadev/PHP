<?php /** @var \App\Data\UserDTO []$data */
?>
<head>
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>

</head>

<style>
    <?php include 'css/main.css'; ?>
</style>
<nav>

    <div class="topnav">
        <a class="left">Users Galeries</a>

        <a class="right"> <?php if (isset($_SESSION['id'])) {
               echo $_SERVER['PHP_AUTH_USER'];
            }
            ?></a>

    </div>


</nav>
<?php foreach ($data as $user):?>

    <form method="POST">
        <ul id="myUL">
            <li><a><?= $user->getUsername() ?></a></li>
        </ul>
        <button type="submit" name="gallery" value="<?= $user->getUsername() ?>">Go to gallery</button>
        <button type="submit" name="profile" value="<?= $user->getUsername() ?>">Go to profile</button>

    </form>

<?php endforeach; ?>


<div class="container signin"> <?php if (!isset($_SESSION['id'])) {
        echo ' <h4>Already have an account or you are not register? <a href="login.php">Registration</a>.</h4>';


    }
    ?>

</div>