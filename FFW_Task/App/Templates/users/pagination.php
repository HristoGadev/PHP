<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = "";
$dbname = 'ffw_task';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Connection failed: " . mysqli_connect_error());

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$limit = 3;
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
};
$start_from = ($page - 1) * $limit;

$sql = "SELECT * FROM images ORDER BY name ASC LIMIT $start_from, $limit";

$rs_result = mysqli_query($conn, $sql);
?>
<div class="container">

    <a href="javascript:void(0);" class="reorder_link" id="saveReorder">reorder photos</a>
    <div id="reorderHelper" class="light_box" style="display:none;">1. Drag photos to reorder.<br>2. Click 'Save Reordering' when finished.</div>
    <div class="gallery">
        <ul class="reorder_ul reorder-photos-list">

            <?php
            $counter=0;
            while ($row = mysqli_fetch_assoc($rs_result)) {
                $counter++;
                ?>
                <li id="image_li_<?php echo $row['id']; ?>" class="ui-sortable-handle">
                    <a href="javascript:void(0);" style="float:none;" class="image_link">
                        <img src="App/Templates/images/<?php echo $row['name']; ?>" alt="">
                    </a>
                </li>

                <?php
            };
            ?>
        </ul>
    </div>
</div>

<?php
$sql = "SELECT COUNT(id) FROM images";
$rs_result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($rs_result);
$total_records = $row[0];
$total_pages = ceil($total_records / $limit);
$pagLink = "<ul class=\"pagination\">";
for ($i = 1; $i <= $total_pages; $i++) {
    $pagLink .= "<li class='active'><a  href='gallery.php?page=" . $i . "'>" . $i . "</a></li>";
};
echo $pagLink . "</ul>";
?>


<?php
$counter++;
$limit = 2;
if($counter===2) {
if (isset($_GET["page"])) {
$page = $_GET["page"];
} else {
$page = 1;
};
$start_from = ($page - 1) * $limit;

$total_records = $counter;
$total_pages = ceil($total_records / $limit);
$pagLink = "<div class='pagination'>";
    for ($i = 1; $i <= $total_pages; $i++) {
    $pagLink .= "<a href='gallery.php?page=" . $i . "'>" . $i . "</a>";
    };
    echo $pagLink . "</div>";
}?>
