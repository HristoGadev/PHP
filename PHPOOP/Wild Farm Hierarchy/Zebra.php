<?php

class Zebra extends Mammal
{

    public function __construct($animalType, $animalName, $animalWeight, $livingRegion)
    {
        parent::__construct($animalType, $animalName, $animalWeight, $livingRegion);
    }

    function makeSound()
    {
        return 'Zs' . PHP_EOL;
    }

    function eat(Food $food)
    {
        $this->setFoodEaten($food->getQuantity());
    }

    function __toString()
    {
        return parent::__toString();
    }
}