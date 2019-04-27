<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 4/18/2019
 * Time: 9:26 AM
 */

namespace App\Repository;


use App\Data\PictureDTO;
use App\Data\UserDTO;
use Database\DatabaseInterface;

class UserRepository implements UserRepositoryInterface
{

    private $db;

    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    public function insert(UserDTO $userDTO): bool
    {
        $this->db->query("INSERT INTO users (username,email,password)VALUES(?,?,?)")
            ->execute([
                $userDTO->getUsername(),
                $userDTO->getEmail(),
                $userDTO->getPassword()
            ]);
        return true;
    }

    public function createTable(): bool
    {
        // $this->db->query("CREATE TABLE IF NOT EXIST")
    }

    public function findOneByName(string $userName): ?UserDTO
    {
        return $this->db->query("
            SELECT  id, username, password,email 
            FROM users
            WHERE username = ?
        ")->execute([$userName])
            ->fetch(UserDTO::class)
            ->current();
    }

    public function findOneById(int $id): ?UserDTO
    {
        return $this->db->query("
            SELECT  id, username, password,email 
            FROM users
            WHERE id = ?
        ")->execute([$id])
            ->fetch(UserDTO::class)
            ->current();
    }

    public function findUser(string $username): bool
    {
        $this->db->query("
            SELECT username, email 
            FROM users
            WHERE username = ?
        ")->execute([$username]);
        return true;

    }

    public function updateUser(int $id, string $password): void
    {
        $this->db->query("
             UPDATE `ffw_task`.`users` 
          SET `password`=? 
          WHERE  `id`=?;
        ")->execute([
            $password,
            $id
        ]);

    }

    public function insertPicture(PictureDTO $pictureDTO, int $id): bool
    {


        $this->db->query("INSERT INTO images (name,visibility,userId)VALUES(?,?,?)")
            ->execute([
                $pictureDTO->getName(),
                $pictureDTO->getVisibility(),
                $id
            ]);
        return true;
    }

    public function findAll(): \Generator
    {
        return $this->db->query("
            SELECT   username
            FROM users
            
        ")->execute()
            ->fetch(UserDTO::class);
    }

    public function getAllPicturesPublic(string $visibility,int $id=null)
    {
        return $this->db->query("
            SELECT  id,name,visibility
            FROM images
            WHERE images.visibility=?  AND userId=?
            
            
        ")->execute([$visibility,$id])
            ->fetchPictures();
    }

    public function getAllPicturesProtected(string $visibility, int $id = null)
    {
        return $this->db->query("
            SELECT  id,name,visibility
            FROM images
            WHERE images.visibility!=?  AND userId=?
            
        ")->execute([$visibility,$id])
            ->fetchPictures();
    }

    public function getAllPictures(int $id = null)
    {
        return $this->db->query("
            SELECT  id,name,visibility
            FROM images
            WHERE  userId=?
            
        ")->execute([$id])
            ->fetchPictures();
    }

    public function updatePicture(PictureDTO $pictureDTO, $visibility):bool
    {
        $this->db->query("
          UPDATE `ffw_task`.`images` 
          SET `visibility`=? 
          WHERE  `name`=?;
        ")->execute([
            $visibility,
            $pictureDTO->getName(),

        ]);
        return true;
    }

    public function reorder($position, $id): bool
    {
        $this->db->query("
          UPDATE `ffw_task`.`images` 
          SET `sort`=? 
          WHERE  `id`=?;
        ")->execute([
            $position,
            $id
        ]);
        return true;
    }
}