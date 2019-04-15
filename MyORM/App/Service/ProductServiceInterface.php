<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 4/13/2019
 * Time: 10:42 AM
 */

namespace App\Service;


use App\Data\ProductDTO;

interface ProductServiceInterface
{
        public function createProduct(ProductDTO $productDTO):bool;
        public function getAll():\Generator;
}