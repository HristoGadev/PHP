<?php


abstract class Food
{
    private $quantity;

    public function __construct($quantity)
    {
        $this->setQuantity($quantity) ;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

}