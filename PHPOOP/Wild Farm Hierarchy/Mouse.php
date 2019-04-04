<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 3/22/2019
 * Time: 11:32 AM
 */

class Mouse extends  Mammal
{

   public function __construct($animalType, $animalName, $animalWeight, $livingRegion)
   {
       parent::__construct($animalType, $animalName, $animalWeight, $livingRegion);
   }

    function makeSound()
    {
      return "SQUEEEAAAK!".PHP_EOL;
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