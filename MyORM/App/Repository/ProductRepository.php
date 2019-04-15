<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 4/13/2019
 * Time: 10:48 AM
 */

namespace App\Repository;


use App\Data\ProductDTO;
use App\Data\UserDTO;
use Database\DatabaseInterface;

class ProductRepository implements ProductRepositoryInterface
{
    private $db;

    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    public function insert(ProductDTO $productDTO,int $userId): bool
    {
        $this->db->querry(
            "INSERT INTO
                          products (name, price, description,userId) 
                            VALUES (?,?,?,?)
                    ")
            ->execute(
                [
                    $productDTO->getName(),
                    $productDTO->getPrice(),
                    $productDTO->getDescription(),
                    $userId,

                ]
            );
        return true;
    }


    /** @var \Generator|ProductDTO[] */
    public function findAll(/**UserDTO $userDTO*/): \Generator
    {
        return $this->db->querry("SELECT products.name,products.price,products.description,
users.username
 FROM products
 JOIN users
 ON products.userId=users.id")
            ->execute()
            ->fetch(ProductDTO::class);

    }
}