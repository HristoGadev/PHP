<?php

class Book{
    private $title;
    private $author;
    private $price;


    /**
     * Book constructor.
     * @param $title
     * @param $author
     * @param $price
     */

    public function __construct($title, $author, $price)
    {
        $this->setTitle($title) ;
        $this->setAuthor($author) ;
        $this->setPrice($price) ;

    }


    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        if(strlen($title)<3){
            throw new Exception("Title is not valid!\n");
        }
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
       $authorSecondName=explode(' ',$author)[1];
        if(is_numeric(substr($authorSecondName,0,1))) {
            throw new Exception("Author is not valid!\n");
        }
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        if($price<=0){
            throw new Exception("Price is not valid!\n");
        }
        $this->price = $price;
    }

    function __toString()
    {
        return $this->getPrice();
    }
}