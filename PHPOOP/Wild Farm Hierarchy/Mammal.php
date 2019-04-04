<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 3/22/2019
 * Time: 11:31 AM
 */

abstract class Mammal extends Animal
{
    private $livingRegion;

    public function __construct($animalType, $animalName, $animalWeight,$livingRegion)
    {
        parent::__construct($animalType, $animalName, $animalWeight);
        $this->setLivingRegion($livingRegion);
    }

    /**
     * @return mixed
     */
    public function getLivingRegion()
    {
        return $this->livingRegion;
    }

    /**
     * @param mixed $livingRegion
     */
    public function setLivingRegion($livingRegion)
    {
        $this->livingRegion = $livingRegion;
    }
    function __toString()
    {
        return sprintf("%s [%s, %0.f, %s, %0.f]\n",
            $this->getAnimalType(),
            $this->getAnimalName(),
            $this->getAnimalWeight(),
            $this->getLivingRegion(),
            $this->getFoodEaten());
    }
}
