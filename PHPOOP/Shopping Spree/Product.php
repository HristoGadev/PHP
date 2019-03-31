<?php


class Product{
    private $name;
    private $cost;

    /**
     * Product constructor.
     * @param $name
     * @param $cost
     */
    public function __construct($name, $cost)
    {
        $this->setName($name);
        $this->setCost($cost);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @param mixed $cost
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
    }

}