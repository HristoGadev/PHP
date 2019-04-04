<?php


abstract class Animal
{
    private $animalName;
    private $animalType;
    private $animalWeight;
    private $foodEaten;

    abstract function makeSound();
    abstract function eat(Food $food);


    function __construct( $animalName,$animalType,  $animalWeight, $foodEaten)
    {
        $this->animalName($animalName);
        $this->animalType($animalType);
        $this->animalWeight($animalWeight);
        $this->foodEaten($foodEaten);

    }

    /**
     * @return mixed
     */
    public function getAnimalName()
    {
        return $this->animalName;
    }

    /**
     * @param mixed $animalName
     */
    public function setAnimalName($animalName)
    {
        $this->animalName = $animalName;
    }

    /**
     * @return mixed
     */
    public function getAnimalType()
    {
        return $this->animalType;
    }

    /**
     * @param mixed $animalType
     */
    public function setAnimalType($animalType)
    {
        $this->animalType = $animalType;
    }

    /**
     * @return mixed
     */
    public function getAnimalWeight()
    {
        return $this->animalWeight;
    }

    /**
     * @param mixed $animalWeight
     */
    public function setAnimalWeight($animalWeight)
    {
        $this->animalWeight = $animalWeight;
    }

    /**
     * @return mixed
     */
    public function getFoodEaten()
    {
        return $this->foodEaten;
    }

    /**
     * @param mixed $foodEaten
     */
    public function setFoodEaten($foodEaten)
    {
        $this->foodEaten += $foodEaten;
    }


}