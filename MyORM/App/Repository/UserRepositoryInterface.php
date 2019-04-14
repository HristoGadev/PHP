<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 4/6/2019
 * Time: 4:20 PM
 */

namespace App\Repository;


use App\Data\UserDTO;

interface UserRepositoryInterface
{
    public function insert(UserDTO $userDTO):bool;
    public function findOneByName(string $username):?UserDTO;
    public function findOneById(int $id):?UserDTO;
    public function updateUser(int $id,UserDTO $userDTO):bool ;
    /** @var \Generator|UserDto[]*/
    public function findAll():\Generator;
}