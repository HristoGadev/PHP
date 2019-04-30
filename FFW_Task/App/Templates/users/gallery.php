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

<form method="POST">
    <div style='float: left; width: 100%;'>
        <ul id="sortable">
            <?php
            $limit = 5;
            $currentId = 0;
            if (isset($_GET["page"])) {
                $page = $_GET["page"];
            } else {
                $page = 1;
            };
            $startIndex = ($page - 1) * $limit;
            for ($i = 0; $i < $limit; $i++){
            if ($startIndex < count($data)){

            $_SESSION['startIndex']=$startIndex;
            $currentId = $data[$startIndex]['id'];
            $currentName=$data[$startIndex]['name'];

            ?>
            <li class="ui-sortable-handle" id="image_<?php echo $currentId; ?>" >
                <img src="App/Templates/images/<?php echo $currentName ; ?>">

                <?php if (isset($_SESSION['id']) && $_SESSION['targetName'] == $_SERVER['PHP_AUTH_USER'])

                    echo '<label><input type="radio" name="optradio" value="Private" >Private</label>
                <label><input type="radio" name="optradio" value="Public">Public</label>
                <label><input type="radio" name="optradio" value="Protected">Protected</label>'?>
                   <button type="submit" name="edit" value="<?php echo $currentName; ?>">Edit</button>
                </li>
                <?php $startIndex++;
                }
                } ?>
        </ul>
    </div>

    <?php if (isset($_SESSION['id']) && $_SESSION['targetName'] === $_SERVER['PHP_AUTH_USER']) {
        echo '<div style="clear: both; margin-top: 20px;">
    <input type="button"   value="Submit" id="submit">
</div>';
    } ?>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<?php
$total_records = count($data);
$total_pages = ceil($total_records / $limit);
$pagLink = "<ul class='pagination'>";
for ($i = 1; $i <= $total_pages; $i++) {
    $pagLink .= "<li><a href='gallery.php?page=" . $i . "'>" . $i . "</a></li>";
};
echo $pagLink . "</ul>";
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
       <?php include 'js/reorderedImages.js'?>
</script>
