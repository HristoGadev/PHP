<?php

$total_records = count($data);
$total_pages = ceil($total_records / $limit);
$pagLink = "<ul class='pagination'>";

for ($i = 1; $i <= $total_pages; $i++) {

    $pagLink .= "<li><a href='gallery.php?page=" . $i . "'>" . $i . "</a></li>";
};

echo $pagLink . "</ul>";

?>