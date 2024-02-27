<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ProductRepository;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Services\ProductService;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected $service;
    protected $repository;

    public function __construct(ProductRepository $repository, ProductService $service)
    {
        $this->repository =  $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->service->index();
        return response()->json($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
       $product = $this->service->createProduct($request->validated());
       return response()->json($product);
    }

    /**
     * Display the specified resource.
     */
    public function show($productId)
    {
        $product = $this->service->show($productId);
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, $productId)
    {
        $product = $this->service->update($productId, $request->validated());
        return response()->json($product);
    }

    public function uploadFile(Request $request, Product $product)
    {
        if ($request->photo) {
            $product->photo = $request->photo->store('images/products', 'public');
            $product->save();
        }

        return response()->json($product);
    }

    public function getImage($product)
    {
        $product = Product::findOrFail($product);

        if (!$product->photo) {
            return response()->json(['message' => 'Produto não possui imagem.'], 404);
        }

        $imagePath = storage_path('app/public/' . $product->photo); 

        if (!file_exists($imagePath)) {
            return response()->json(['message' => 'Imagem do produto não encontrada.'], 404);
        }

        $imageContent = file_get_contents($imagePath);

        return response($imageContent)->header('Content-Type', "image/jpeg", "image/png", "image/jpg");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($productId)
    {
        $product = $this->service->deleteProduct($productId);
        return response()->json([
            'msg' => 'Product deleted successfull !!',
            'product' =>  $product
        ]);
    }

}
