<?php
spl_autoload_register();
$animal=readline();
$pet=new Cat('Persian');
var_dump($pet->makeSound());