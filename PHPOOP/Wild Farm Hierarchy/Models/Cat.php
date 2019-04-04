<?php


class Cat extends Felime
{
   private $breed;

    /**
     * Cat constructor.
     * @param $breed
     */
   public function __construct($animalName, $animalType, $animalWeight, $foodEaten, $livingRegion,$breed)
   {
       parent::__construct($animalName, $animalType, $animalWeight, $foodEaten, $livingRegion);
       $this->setBreed($breed);
   }


    /**
     * @return mixed
     */
    public function getBreed()
    {
        return $this->breed;
    }

    /**
     * @param mixed $breed
     */
    public function setBreed($breed): void
    {
        $this->breed = $breed;
    }

    function makeSound()
    {
        return 'Meowwww';
    }

    function eat(Food $food)
    {
        // TODO: Implement eat() method.
    }
    function __toString()
    {
        return parent::makeSound();
    }
}
