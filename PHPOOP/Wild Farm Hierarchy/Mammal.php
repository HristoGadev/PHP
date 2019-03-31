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

}
