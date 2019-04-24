<?php /** @var \App\Data\PictureDTO [] $data */ ?>
<link rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
<link href="bootstrap3.css" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<style>
    body {
        background-color: #A89465;
        font-family: 'Calibri';
    }

    main table {
        width: 100%;
        border: 1px solid #FEAE00;
        border-spacing: 0px;
    }

    main th, td {
        width: 25%;
        padding: 15px;
        text-align: left;
    }

    main td {
        vertical-align: bottom;
    }

    main th {
        background-color: #feae00;
        color: white;
    }

    main table img {
        width: 100px;
        height: auto;
    }

    main tr:nth-child(odd) {
        background-color: beige;
    }

    .topnav {
        background-color: #333;
        overflow: hidden;
    }

    .topnav a {
        float: left;
        display: block;
        color: #f2f2f2;
        text-align: center;
        padding: 14px;
        text-decoration: none;
        font-size: 17px;
    }

    .topnav a.logo {
        padding: 0px;
        padding-top: 4px;
    }

    .topnav a.right {
        float: right;
    }

    .topnav a:hover {
        background-color: #ddd;
        color: black;
    }

    .topnav a.active {
        background-color: #FEAE00;
        color: white;
    }

    #sortable {
        list-style-type: none;
        margin: 0;
        padding: 0;
        width: 90%;
    }

    #sortable li {
        margin: 3px 3px 3px 0;
        padding: 1px;
        float: left;
        border: 0;
        background: none;
    }

    #sortable li img {
        width: 180px;
        height: 140px;
    }
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
        <!-- List Images -->

        <ul id="sortable">
            <?php
            $counter = 0;
            foreach ($data as $image): $counter++; ?>

                <li class="ui-sortable-handle" id="image_'<?php echo $image->getId(); ?>'">
                    <img src="App/Templates/images/<?php echo $image->getName(); ?>">

                    <?php if (isset($_SESSION['id']) && $_SESSION['targetName'] == $_SERVER['PHP_AUTH_USER'])

                        echo '<label><input type="radio" name="optradio" value="Private">Private</label>
                <label><input type="radio" name="optradio" value="Public">Public</label>
                <label><input type="radio" name="optradio" value="Protected">Protected</label>' ?>
                    <button type="submit" name="edit" value="<?php echo $image->getName(); ?>">Edit</button>
                </li>

            <?php endforeach; ?>
        </ul>

    </div>


    <?php if (isset($_SESSION['id']) && $_SESSION['targetName'] === $_SERVER['PHP_AUTH_USER']) {
        echo '<div style="clear: both; margin-top: 20px;">
    <input type="submit" value="Submit" name="submit">
</div>';
    } ?>
</form>
</nav>
<?php
$limit = 5;
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
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
    $(document).ready(function () {

        // Initialize sortable
        $("#sortable").sortable();

        // Save order
        $('#submit').click(function () {
            var imageids_arr = [];
            // get image ids order
            $('#sortable li').each(function () {
                var id = $(this).attr('id');
                var split_id = id.split("_");
                imageids_arr.push(split_id[1]);
            });

            // AJAX request
            $.ajax({
                url: '/reorder.php',
                type: 'POST',
                data: {imageids: imageids_arr},
                success: function (response) {
                    alert('Save successfully.');
                }
            });
        });
    });

</script>
