<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrUpdateProductRequest;
use App\Services\ProductService;


class ProductController extends Controller
{
    
    protected $productService;

    public function __construct(ProductService $productService) 
    {
        $this->productService = $productService;
    }

    public function getAllProducts()
    {
        return $this->productService->getAllProducts();
    }

    public function getProductById($id)
    {
        return $this->productService->getProductById($id);
    }

    public function createProduct(CreateOrUpdateProductRequest $request)
    {
        $params = $request->validated();
        return $this->productService->createProduct($params);
    }

    public function updateProduct(CreateOrUpdateProductRequest $request, $id)
    {
        $params = $request->validated();
        return $this->productService->updateProduct($id, $params);
    }
}
