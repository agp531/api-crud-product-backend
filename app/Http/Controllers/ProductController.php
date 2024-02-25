<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ProductRepository;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Services\ProductService;

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
       $product = $this->service->createProduct($request->all());
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
        $product = $this->service->update($productId, $request->all());
        return response()->json($product);
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
