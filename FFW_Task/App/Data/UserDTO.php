<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 4/18/2019
 * Time: 8:53 AM
 */

namespace App\Data;


class UserDTO
{

    private $id;
    private $username;
    private $email;
    private $password;

    public static function create( $username,$email,$password,$id=null)
    {
        return (new UserDTO())

            ->setUsername($username)
            ->setEmail($email)
            ->setPassword($password)
            ->setId($id);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    public function setId($id):UserDTO
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }


    public function setUsername($username):UserDTO
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email):UserDTO
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password):UserDTO
    {
        $this->password = $password;
        return $this;
    }


}