<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 4/13/2019
 * Time: 10:48 AM
 */

namespace App\Repository;


use App\Data\ProductDTO;
use Database\DatabaseInterface;

class ProductRepository implements ProductRepositoryInterface
{
    private $db;

    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    public function insert(ProductDTO $productDTO): bool
    {
        $this->db->querry(
            "INSERT INTO
                          products (name, price, description) 
                            VALUES (?,?,?)
                    ")
            ->execute(
                [
                    $productDTO->getName(),
                    $productDTO->getPrice(),
                    $productDTO->getDescription(),

                ]
            );
        return true;
    }


    /** @var \Generator|ProductDTO[] */
    public function findAll(): \Generator
    {
       return $this->db->querry("SELECT id,name,price,description
 FROM products")
            ->execute()
            ->fetch(ProductDTO::class);
    }
}