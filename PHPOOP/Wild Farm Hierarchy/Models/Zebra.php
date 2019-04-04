<?php

class Zebra extends Mammal
{

    public function __construct($animalName, $animalType, $animalWeight, $foodEaten, $livingRegion)
    {
        parent::__construct($animalName, $animalType, $animalWeight, $foodEaten, $livingRegion);
    }

    function makeSound()
    {
        return 'Zs';
    }

    function eat(Food $food)
    {

    }
}