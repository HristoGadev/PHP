<?php
/**
 * Created by PhpStorm.
 * User: hr_ga
 * Date: 4/13/2019
 * Time: 10:29 AM
 */

namespace App\Http;


use App\Data\ErrorDTO;
use App\Data\ProductDTO;
use App\Service\ProductServiceInterface;

class ProductHttpHandler extends HttpHandlerAbstract
{
    function allProducts(ProductServiceInterface $productService){

        $this->render('products/allProducts',$productService->getAll());
    }
    function addProduct(ProductServiceInterface $productService,$formData=[]){

        if(isset($formData['add'])){
            $this->handlerAddProduct($productService,$formData);
        }else{
           $this->render('products/addProducts');
        }
    }
    function handlerAddProduct( ProductServiceInterface $productService,$formData){

        $product = $this->dataBinder->bind($formData,ProductDTO::class);
        if ($productService->createProduct($product)) {

            $this->redirect('allProducts.php');
        }else{
            $this->render("app/error",new ErrorDTO("Pass mismatch or user already exist"));
        }
    }
}