<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 3/22/2019
 * Time: 12:09 PM
 */

class Tiger extends Felime
{
public function __construct($animalName, $animalType, $animalWeight, $foodEaten, $livingRegion)
{
    parent::__construct($animalName, $animalType, $animalWeight, $foodEaten, $livingRegion);
}

    function makeSound()
    {
        return 'ROAAR!!!';
    }

    function eat(Food $food)
    {
        // TODO: Implement eat() method.
    }
}