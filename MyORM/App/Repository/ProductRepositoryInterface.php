<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 4/13/2019
 * Time: 10:48 AM
 */

namespace App\Repository;


use App\Data\ProductDTO;

interface ProductRepositoryInterface
{
    public function insert(ProductDTO $productDTO): ?bool;

    /** @var \Generator|ProductDTO[] */
    public function findAll(): \Generator;
}