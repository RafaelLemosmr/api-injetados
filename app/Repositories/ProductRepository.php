<?php

namespace App\Repositories;

use App\Http\Requests\CreateProductRequest;
use App\Models\Product;

class ProductRepository 
{
    public function getAllProducts()
    {
        return Product::all();
    }

    public function getProductById($id)
    {
        return Product::findOrFail($id);
    }

    public function createProduct($params)
    {
        return Product::create($params);
    }

    public function updateProduct($id, $params)
    {
        $product = Product::findOrFail($id);
        $product->name = $params["name"];
        $product->description = $params["description"];
        $product->unitaryValue = $params["unitaryValue"];
        $product->minimumQuantity = $params["minimumQuantity"];
        $product->save();

        return $product;
    }
}