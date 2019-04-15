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

interface ProductRepositoryInterface
{
    public function insert(ProductDTO $productDTO,int $id): ?bool;

    /** @var \Generator|ProductDTO[] */
    public function findAll(/**UserDTO $userDTO*/): \Generator;
}