<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 4/19/2019
 * Time: 11:57 AM
 */

namespace App\Data;


class PictureDTO
{
    private $id;
    private $name;
    private $visibility;

    public static function create($name, $visibility, $id = null)
    {
        return (new PictureDTO())
            ->setName($name)
            ->setVisibility($visibility)
            ->setId($id);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    public function setId($id): PictureDTO
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


    public function setName($name): PictureDTO
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVisibility()
    {
        return $this->visibility;
    }

    public function setVisibility($visibility): PictureDTO
    {
        $this->visibility = $visibility;
        return $this;
    }
}