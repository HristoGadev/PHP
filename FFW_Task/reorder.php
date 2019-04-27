<?php

require_once "commonUser.php";
require_once "App/Templates/users/js/reorderedImages.js";
var_dump( $_POST['imageids']);
$userHttpHandler->reorderPictures($userService,$_POST);