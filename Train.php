<?php
$n=readline();
$arr=[];
$sum=0;

for($i=0; $i<3; $i++){
    $arr[$i]=readline();
    $sum+=$arr[$i];
}
echo (implode(" ",$arr)).PHP_EOL;
echo ($sum);