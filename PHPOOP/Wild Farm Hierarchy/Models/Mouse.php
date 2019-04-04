<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 3/22/2019
 * Time: 11:32 AM
 */

class Mouse extends  Mammal
{

    public function __construct($animalName, $animalType, $animalWeight, $foodEaten, $livingRegion)
    {
        parent::__construct($animalName, $animalType, $animalWeight, $foodEaten, $livingRegion);
    }

    function makeSound()
    {
      return "SQUEEEAAAK!";
    }

    function eat(Food $food)
    {
        // TODO: Implement eat() method.
    }
}