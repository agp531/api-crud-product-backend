<?php

namespace App\Http\Repositories;
use App\Models\Product;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProductRepository
{

    public function index()
    {
        return Product::all();
    }

    public function createProduct(array $data)
    {
        return Product::create($data);
    }

    public function update($productId, $data)
    {
        $product = Product::findOrFail($productId);

        if ($data->photo) {

            if ($product->photo) {
                Storage::disk('public')->delete($product->photo);
            }

            $data['photo'] = $data->file('photo')->store('images/products', 'public');
        }

        $product->update($data);
        return $product;
    }

    public function show($productId)
    {
        return Product::findOrFail($productId);
    }
    

    public function deleteProduct($productId)
    {
        $product = Product::findOrFail($productId);

        if ($product->photo) {
            Storage::disk('public')->delete($product->photo);
        }

        $product->delete();

        return $product;
    }

}