<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 4/12/2019
 * Time: 2:23 PM
 */

namespace App\Data;


class ProductDTO
{
    private $id;
    private $name;
    private $price;
    private $description;
    private $userId;


    public static function createProduct($name, $price, $description, $userId, $id = null)
    {
        return (new ProductDTO())
            ->setName($name)
            ->setPrice($price)
            ->setDescription($description)
            ->setUserId($userId)
            ->setId($id);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    public function setId($id): ProductDTO
    {
        $this->id = $id;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }


    public function setName($name): ProductDTO
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }


    public function setPrice($price): ProductDTO
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }


    public function setDescription($description): ProductDTO
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }


    public function setUserId($userId): ProductDTO
    {
        $this->userId = $userId;
        return $this;
    }


}