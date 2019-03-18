<?php
$n = readline();

for ($i = 1; $i <= $n; $i++) {

    for ($j = $i; $j < $n + $i; $j++) {
        echo($j);
    }
        echo ("\n");
}