<?php
$a = readline();
$b = readline();
$c = readline();

if (($a > $b) && ($a > $c)) {
    if ($b > $c) {
        echo( "$a, $b, $c");
    } else {
        echo( "$a, $c, $b");
    }
} else if (($b > $a) && ($b > $c)) {
    if ($a > $c) {
        echo("$b, $a, $c");
    } else {
        echo("$b, $c, $a");
    }
} else if (($c > $a) && ($c > $b)) {
    if ($a > $b) {
        echo("$c, $a, $b");
    } else {
       echo("$c, $b, $a");
    }
}

