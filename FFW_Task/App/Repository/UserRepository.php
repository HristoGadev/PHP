<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 4/18/2019
 * Time: 9:26 AM
 */

namespace App\Repository;


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

    public function updateUser(int $id, UserDTO $userDTO): void
    {
        $this->db->querry("
            UPDATE users
            SET 
               password = ?,
            WHERE id = ?
        ")->execute([
            $userDTO->getPassword(),
            $id
        ]);

    }
}