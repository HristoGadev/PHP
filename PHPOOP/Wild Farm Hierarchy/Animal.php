<?php


abstract class Animal
{
    private $animalName;
    private $animalType;
    private $animalWeight;
    private $foodEaten;

    abstract function makeSound();
    abstract function eat(Food $food);


    function __construct( $animalType,$animalName,$animalWeight)
    {
        $this->setAnimalName($animalName);
        $this->setAnimalType($animalType);
        $this->setAnimalWeight($animalWeight);


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