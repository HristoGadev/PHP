<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 4/18/2019
 * Time: 9:24 AM
 */

namespace App\Repository;


use App\Data\PictureDTO;
use App\Data\UserDTO;

interface UserRepositoryInterface
{
    public function createTable(): bool;

    public function insert(UserDTO $userDTO): bool;

    public function findOneByName(string $userName): ?UserDTO;

    public function findOneById(int $id): ?UserDTO;

    public function findUser(string $username): bool;

    public function updateUser(int $id, UserDTO $userDTO): void;

    public function insertPicture(PictureDTO $pictureDTO, int $id): bool;

    public function findAll(): \Generator;

    public function getAllPicturesPublic(string $visibility, int $id = null): \Generator;

    public function getAllPicturesProtected(string $visibility, int $id = null): \Generator;

    public function getAllPictures(int $id = null): \Generator;

    public function updatePicture(PictureDTO $pictureDTO, $visibility):void;
}