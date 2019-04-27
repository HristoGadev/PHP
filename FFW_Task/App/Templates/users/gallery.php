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
        <a class="right"><?php if (isset($_SESSION['id'])) {
                echo $_SERVER['PHP_AUTH_USER'];
            }
            ?></a>
    </div>
</nav>
<?php

/**$limit = 3;

//$start_from = ($page - 1) * $limit;

$sql = "SELECT * FROM images ORDER BY name ASC LIMIT $start_from, $limit";

$rs_result = mysqli_query($conn, $sql);*/
?>
<form method="POST">
    <div style='float: left; width: 100%;'>
        <!-- List Images -->

        <ul id="sortable">
            <?php
                $limit=2;
            if (isset($_GET["page"])) {
                $page = $_GET["page"];
            } else {
                $page = 1;
            };
            $j = ($page - 1) * $limit;

            ?>
            <li class="ui-sortable-handle" id="image_'<?php $data[$j]['id']; ?>'">
                <img src="App/Templates/images/<?php echo $data[$j]['name']; ?>">

                <?php if (isset($_SESSION['id']) && $_SESSION['targetName'] == $_SERVER['PHP_AUTH_USER'])

                    echo '<label><input type="radio" name="optradio" value="Private">Private</label>
                <label><input type="radio" name="optradio" value="Public">Public</label>
                <label><input type="radio" name="optradio" value="Protected">Protected</label>
                    <button type="submit" name="edit" value="<?php echo $image->getName(); ?>">Edit</button>
                </li>' ?>
            <li class="ui-sortable-handle" id="image_'<?php $data[$j+1]['id']; ?>'">
                <img src="App/Templates/images/<?php echo $data[$j+1]['name']; ?>">

                <?php if (isset($_SESSION['id']) && $_SESSION['targetName'] == $_SERVER['PHP_AUTH_USER'])

                    echo '<label><input type="radio" name="optradio" value="Private">Private</label>
                <label><input type="radio" name="optradio" value="Public">Public</label>
                <label><input type="radio" name="optradio" value="Protected">Protected</label>
                    <button type="submit" name="edit" value="<?php echo $image->getName(); ?>">Edit</button>
                </li>' ?>

        </ul>

    </div>


    <?php if (isset($_SESSION['id']) && $_SESSION['targetName'] === $_SERVER['PHP_AUTH_USER']) {
        echo '<div style="clear: both; margin-top: 20px;">
    <input type="button" value="Submit" id="submit">
</div>';
    } ?>
</form>

<?php
$total_records = count($data);
$total_pages = ceil($total_records / $limit);
$pagLink = "<div class='pagination'>";
for ($i = 1; $i <= $total_pages; $i++) {
    $pagLink .= "<a href='gallery.php?page=" . $i . "'>" . $i . "</a>";
};
echo $pagLink . "</div>";
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
    <?php include 'js/reorderedImages.js'?>
</script>
