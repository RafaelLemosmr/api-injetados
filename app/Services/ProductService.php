<?php

namespace App\Services;

use App\Http\Requests\CreateProductRequest;
use App\Repositories\ProductRepository;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductService
{

    protected $productRepository;

    public function __construct(ProductRepository $productRepository) 
    {
        $this->productRepository = $productRepository;
    }

    public function getAllProducts()
    {
        return $this->productRepository->getAllProducts();
    }

    public function getProductById($id)
    {
        try {
            return $this->productRepository->getProductById($id);
        }catch(ModelNotFoundException $modelException){
            return response()->json([
                'status' => 'erro',
                'message' => $modelException->getMessage(),
                'code' => '404'
            ], 404);
        }
        catch(Exception $e) {
            return response()->json([
                'status' => 'erro',
                'message' => $e->getMessage(),
                'code' => '500'
            ], 500);
        }
    }

    public function createProduct($params)
    {
        try {  
            return $this->productRepository->createProduct($params);
        }catch(Exception $e) {
            return response()->json([
                'status' => 'erro',
                'message' => $e->getMessage(),
                'code' => '500'
            ], 500);
        }
    }

    public function updateProduct($id, $params) {
        try {   
            return $this->productRepository->updateProduct($id, $params);
        }catch(Exception $e) {
            return response()->json([
                'status' => 'erro',
                'message' => $e->getMessage(),
                'code' => '500'
            ], 500);
        }

    }
}

