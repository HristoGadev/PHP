<?php /** @var \App\Data\PictureDTO [] $data */?>
<link rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<style>
    .container {
        margin-top: 50px;
        padding: 10px;
    }

    ul, ol, li {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .reorder_link {
        color: #3675B4;
        border: solid 2px #3675B4;
        border-radius: 3px;
        text-transform: uppercase;
        background: #fff;
        font-size: 18px;
        padding: 10px 20px;
        margin: 15px 15px 15px 0px;
        font-weight: bold;
        text-decoration: none;
        transition: all 0.35s;
        -moz-transition: all 0.35s;
        -webkit-transition: all 0.35s;
        -o-transition: all 0.35s;
        white-space: nowrap;
    }

    .reorder_link:hover {
        color: #fff;
        border: solid 2px #3675B4;
        background: #3675B4;
        box-shadow: none;
    }

    #reorder-helper {
        margin: 18px 10px;
        padding: 10px;
    }

    .light_box {
        background: #efefef;
        padding: 20px;
        margin: 15px 0;
        text-align: center;
        font-size: 1.2em;
    }

    /* image gallery */
    .gallery {
        width: 100%;
        float: left;
        margin-top: 15px;
    }

    .gallery ul {
        margin: 0;
        padding: 0;
        list-style-type: none;
    }

    .gallery ul li {
        padding: 7px;
        border: 2px solid #ccc;
        float: left;
        margin: 10px 7px;
        background: none;
        width: auto;
        height: auto;
    }

    .gallery img {
        width: 250px;
    }

    /* notice box */
    .notice, .notice a {
        color: #fff !important;
    }

    .notice {
        z-index: 8888;
        padding: 10px;
        margin-top: 20px;
    }

    .notice a {
        font-weight: bold;
    }

    .notice_error {
        background: #E46360;
    }

    .notice_success {
        background: #657E3F;
    }

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

    .page {
        display: none;
    }

    .page-active {
        display: block;
    }

</style>
<nav>
    <div class="topnav">

        <a class="left" href="index.php">Users gallery</a>
        <a class="right" href="profile.php">My profile</a>
        <a class="right"><?php if (isset($_SESSION['id'])) {
                echo $_SESSION['name'];
            }
            ?></a>
    </div>
</nav>
<div class="container">
    <a href="javascript:void(0);" class="reorder_link" id="saveReorder">reorder photos</a>
    <div id="reorderHelper" class="light_box" style="display:none;">1. Drag photos to reorder.<br>2. Click 'Save
        Reordering' when finished.
    </div>

    <div class="gallery">
        <ul class="reorder_ul reorder-photos-list">

            <?php
            $page=0;
            if (isset($_POST['page'])) {

                $page = $_POST['page'];
                var_dump($page);
                $page = ($page * 5) - 5;//counting img per page;
            }
            $countImg = 0;

                foreach ($data as $image):
                    $countImg++;
                    $page = 0;

                    ?>
                    <div id="page">
                        <li id="image_li_<?php echo $image->getId(); ?>" class="ui-sortable-handle">
                            <a href="javascript:void(0);" style="float:none;" class="image_link">
                                <img src="App/Templates/images/<?php echo $image->getName(); ?>" alt="">
                            </a>
                        </li>
                    </div>

                <?php endforeach;

            $imgPerPage = $countImg / 5;
            $imgPerPage = ceil($imgPerPage);

            ?>
        </ul>
    </div>
</div>
<form>
    <?php
    for ($i = 1; $i <= $imgPerPage; $i++) {
        ?>
        <input type="submit" value="<?php echo $i; ?>" name="page">
        <?php
    }
    ?>
</form>

<script>

    $(document).ready(function () {
        $('.reorder_link').on('click', function () {
            $("ul.reorder-photos-list").sortable({tolerance: 'pointer'});
            $('.reorder_link').html('save reordering');
            $('.reorder_link').attr("id", "saveReorder");
            $('#reorderHelper').slideDown('slow');
            $('.image_link').attr("href", "javascript:void(0);");
            $('.image_link').css("cursor", "move");

            $("#saveReorder").click(function (e) {
                if (!$("#saveReorder i").length) {
                    $(this).html('').prepend('');
                    $("ul.reorder-photos-list").sortable('destroy');
                    $("#reorderHelper").html("Reordering Photos - This could take a moment. Please don't navigate away from this page.").removeClass('light_box').addClass('notice notice_error');

                    var h = [];
                    $("ul.reorder-photos-list li").each(function () {
                        h.push($(this).attr('id').substr(9));
                    });

                    $.ajax({
                        type: "POST",
                        url: "index.php",
                        data: {ids: " " + h + ""},
                        success: function () {
                            window.location.reload();
                        }
                    });
                    return false;
                }
                e.preventDefault();
            });
        });
    });

</script>
