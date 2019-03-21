<?php
spl_autoload_register();

$n=readline();
$members = new Family();
for ($i=0; $i<$n; $i++) {

    $args = readline();
    $input = explode(' ', $args);
    $name = $input[0];
    $age = (int)$input[1];

    $person = new Person($name, $age);

    $members->addMember($person);


}
$oldest=$members->getOldestMember();
echo($oldest->getName().' '.$oldest->getAge());