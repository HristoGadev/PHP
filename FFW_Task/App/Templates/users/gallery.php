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
        <!-- List Images -->

        <ul id="sortable">
            <?php
            $counter = 0;
            foreach ($data as $image):

            ?>
                <li class="ui-sortable-handle" id="image_'<?php echo $image->getId(); ?>'">
                    <img src="App/Templates/images/<?php echo $image->getName(); ?>">

                    <?php if (isset($_SESSION['id']) && $_SESSION['targetName'] == $_SERVER['PHP_AUTH_USER'])

                        echo '<label><input type="radio" name="optradio" value="Private">Private</label>
                <label><input type="radio" name="optradio" value="Public">Public</label>
                <label><input type="radio" name="optradio" value="Protected">Protected</label>
                    <button type="submit" name="edit" value="<?php echo $image->getName(); ?>">Edit</button>
                </li>'?>

            <?php endforeach; ?>
        </ul>

    </div>


    <?php if (isset($_SESSION['id']) && $_SESSION['targetName'] === $_SERVER['PHP_AUTH_USER']) {
        echo '<div style="clear: both; margin-top: 20px;">
    <input type="button" value="Submit" id="submit">
</div>';
    } ?>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<div ng-app="Test">
    <div ng-controller="Main">
        <ul>
            <li ng-repeat="item in data">
                {{item}}
            </li>
        </ul>
        <button ng-hide="offset == 0" ng-click="previous()"><<</button>
        <span ng-repeat="i in navButtons">
            <span ng-class="$parent.offset == i * $parent.perPage && 'active'" class="button" ng-click="$parent.offset = (i * $parent.perPage)">{{i+1}}</span>
        </span>
        <button ng-hide="offset + perPage >= allData.length" ng-click="next()">>></button>

    </div>
</div>
<script>
    <?php include 'js/pagination.js'?>
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
<?php include 'js/reorderedImages.js'?>
</script>
