<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 3/22/2019
 * Time: 12:09 PM
 */

class Tiger extends Felime
{
    function __construct($animalType, $animalName, $animalWeight, $livingRegion)
    {
        parent::__construct($animalType, $animalName, $animalWeight, $livingRegion);
    }

    function makeSound()
    {
        return 'ROAAR!!!'.PHP_EOL;
    }

    function eat(Food $food)
    {
        $function=new \ReflectionClass($food);
        $className=new ReflectionClass($this);
        $name=$className->getName();
        if("Meat"== $function->getName()){
            $this->setFoodEaten($food->getQuantity());
        }else {
            throw new Exception($name . "s are not eating that type of food!");
        }

    }

    function __toString()
    {
        return parent::__toString();
    }
}