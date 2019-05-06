<?php /** @var \App\Data\PictureDTO [] $data */ ?>
<link rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<style>
    <?php include 'css/galerry.css'?>
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<nav>
    <div class="topnav">

        <a class="left" href="index.php">Users gallery</a>
        <a class="right"><?php if (isset($_SESSION['id'])) {echo $_SERVER['PHP_AUTH_USER'];
            } ?></a>
    </div>
</nav>

<form method="POST">
    <div style='float: left; width: 100%;'>
        <ul id="sortable">
          <?php include 'printPictures.php';?>
        </ul>
    </div>

</form>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<?php include 'pagination.php';?>


<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
       <?php include 'js/reorderedImages.js'?>
</script>
