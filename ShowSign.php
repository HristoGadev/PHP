<?php
$count=0;
for ($i=0; $i<3; $i++){
    $num1 = readline();
    if ($num1 < 0) {
        $count++;
    }
}
if ($count%2==0) {
    echo('+');
}
else{
    echo('-');
}