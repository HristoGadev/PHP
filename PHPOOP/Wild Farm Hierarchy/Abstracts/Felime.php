<?php


abstract class Felime extends Mammal
{
   function __construct($animalName, $animalType, $animalWeight, $foodEaten, $livingRegion)
   {
       parent::__construct($animalName, $animalType, $animalWeight, $foodEaten, $livingRegion);
   }
}