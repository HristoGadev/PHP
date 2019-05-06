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
            <img src="App/Templates/images/<?php echo $currentName ; ?>" width=555 height=555>

            <?php if (isset($_SESSION['id']) && $_SESSION['targetName'] == $_SERVER['PHP_AUTH_USER'])

                echo "<label><input type='radio' name='optradio' value='Private' >Private</label>
                <label><input type='radio' name='optradio' value='Public'>Public</label>
                <label><input type='radio' name='optradio' value='Protected'>Protected</label>
            <button type='submit' name='edit' value='$currentName'>Edit visibility</button>
        </li>"?>
        <?php $startIndex++;
    }
} ?>

<?php if (isset($_SESSION['id']) && $_SESSION['targetName'] === $_SERVER['PHP_AUTH_USER']) {
    echo '<div style="clear: both; margin-top: 20px;">
    <input type="button"   value="Save reorder" id="submit">
</div>';
} ?>
