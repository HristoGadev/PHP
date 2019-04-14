<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 4/6/2019
 * Time: 4:56 PM
 */

namespace App\Repository;


use App\Data\UserDTO;
use Database\DatabaseInterface;

class UserRepository implements UserRepositoryInterface
{
    private $db;

    /**
     * UserRepository constructor.
     * @param $db
     */
    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    public function insert(UserDTO $userDTO): bool
    {
        $this->db->querry("INSERT INTO
 users (username, password, first_name, last_name, born_on) 
 VALUES (?,?,?,?,?)
 ")->execute(
            [
                $userDTO->getUsername(),
                $userDTO->getPassword(),
                $userDTO->getFirstName(),
                $userDTO->getLastName(),
                $userDTO->getBornOn()
            ]
        );
        return true;
    }

    public function findOneByName(string $username): ?UserDTO
    {
        return $this->db->querry("
            SELECT  id, username, password, first_name AS firstName, last_name AS lastName, born_on AS bornOn
            FROM users
            WHERE username = ?
        ")->execute([$username])
            ->fetch(UserDTO::class)
            ->current();
    }

    public function findOneById(int $id): ?UserDTO
    {
        return $this->db->querry("
            SELECT  id, username, password, first_name AS firstName, last_name AS lastName, born_on AS bornOn
            FROM users
            WHERE id = ?
        ")->execute([$id])
            ->fetch(UserDTO::class)
            ->current();
    }

    public function updateUser(int $id, UserDTO $userDTO): bool
    {
        $this->db->querry("
            UPDATE users
            SET 
              username = ?,
              password = ?,
              first_name = ?,
              last_name = ?,
              born_on = ?
            WHERE id = ?
        ")->execute([
            $userDTO->getUsername(),
            $userDTO->getPassword(),
            $userDTO->getFirstName(),
            $userDTO->getLastName(),
            $userDTO->getBornOn(),
            $id
        ]);

        return true;
    }

    /** @var \Generator|UserDto[] */
    public function findAll(): \Generator
    {
        return $this->db->querry("
            SELECT  id, username, password, first_name AS firstName, last_name AS lastName, born_on AS bornOn
            FROM users
            
        ")->execute()
            ->fetch(UserDTO::class);

    }

}