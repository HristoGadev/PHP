<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 4/18/2019
 * Time: 9:27 AM
 */

namespace App\Service;


use App\Data\PictureDTO;
use App\Data\UserDTO;

interface UserServiceInterface
{
    public function register(UserDTO $userDTO): bool;

    public function login(string $username, string $password): ?UserDTO;

    public function currentUser(): ?UserDTO;

    public function forgottenPassword(string $username): ?UserDTO;

    public function editPassword(UserDTO $userDTO,string $password): void;

    public function addPicture(PictureDTO $pictureDTO): bool;

    public function getAll(): \Generator;

    public function getPictures(string $username):\Generator;

    public function editPicture(PictureDTO $pictureDTO,$visibility):bool;


}