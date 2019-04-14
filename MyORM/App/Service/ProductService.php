<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 4/13/2019
 * Time: 10:42 AM
 */

namespace App\Service;


use App\Data\ProductDTO;
use App\Repository\ProductRepositoryInterface;

class ProductService implements ProductServiceInterface
{
    private $productRepository;

    /**
     * ProductService constructor.
     * @param $productRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function getAll():\Generator
    {

    }

    public function createProduct(ProductDTO $productDTO): bool
    {
        // TODO: check description for similar products maybe?

       return $this->productRepository->insert($productDTO);
    }
}