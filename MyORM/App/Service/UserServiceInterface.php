<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 4/6/2019
 * Time: 5:12 PM
 */

namespace App\Service;


use App\Data\UserDTO;

interface UserServiceInterface
{
    public function register(UserDTO $userDTO, string $confirmPassword): bool;

    public function login(string $username, string $password): ?UserDTO;

    public function currentUser(): ?UserDTO;

    public function editUser(UserDTO $userDTO): bool;

    /** @var \Generator|UserDto[]*/

    public function getAll():\Generator;
}