<?php

namespace App\Http\Services;
use App\Http\Repositories\ProductRepository;

class ProductService
{
    protected $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->index();
    }

    public function createProduct(array $data)
    {
        return $this->repository->createProduct($data);
    }

    public function show($productId)
    {
        return $this->repository->show($productId);
    }
    

    public function update($productId, array $data)
    {
        return $this->repository->update($productId, $data);
    }

    public function deleteProduct($productId)
    {
        return $this->repository->deleteProduct($productId);
    }
}