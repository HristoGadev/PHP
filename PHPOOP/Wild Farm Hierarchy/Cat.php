<?php


class Cat extends Felime
{
   private $breed;

    /**
     * Cat constructor.
     * @param $breed
     */
  public function __construct($animalType, $animalName, $animalWeight, $livingRegion,$breed)
  {
      parent::__construct($animalType, $animalName, $animalWeight, $livingRegion);
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
        return 'Meowwww'.PHP_EOL;
    }

    function eat(Food $food)
    {
        $this->setFoodEaten($food->getQuantity());
    }
    public function __toString()
    {
        return sprintf("%s [%s, %s, %0.f, %s, %0.f]\n",
            $this->getAnimalType(),
            $this->getAnimalName(),
            $this->getBreed(),
            $this->getAnimalWeight(),
            $this->getLivingRegion(),
            $this->getFoodEaten());
    }
}
