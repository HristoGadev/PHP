<?php
class GoldenEditionBook extends Book {

    public function __construct($title, $author, $price){
       parent::__construct($title, $author, $price);

    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return parent::getPrice()*1.3;
    }
    function __toString()
    {
        return (string)$this->getPrice();
    }
}