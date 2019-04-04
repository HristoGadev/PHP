<?php


abstract class Felime extends Mammal
{
  public function __construct($animalType, $animalName, $animalWeight, $livingRegion)
  {
      parent::__construct($animalType, $animalName, $animalWeight, $livingRegion);
  }

    public function __toString()
    {
        return parent::__toString();
    }
}