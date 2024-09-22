<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Requests\Product\{CreateProductRequest, GetProductRequest, UpdateProductRequest};
use App\Services\Product\{ProductReadService, ProductWriteService};
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

final class ProductController extends Controller
{
    public function __construct(
        protected readonly ProductReadService $readService,
        protected readonly ProductWriteService $writeService,
    ) {
    }

    public function index(GetProductRequest $request): JsonResponse
    {
        $getProductDTO = $request->toDto();
        $products = $this->readService->get($getProductDTO);

        return ResponseHelper::build($products->toArray());
    }

    public function show(int $id): JsonResponse
    {
        $productDto = $this->readService->getById($id);

        return ResponseHelper::build($productDto->toArray());
    }

    public function create(CreateProductRequest $request): JsonResponse
    {
        $createProductDTO = $request->toDto();
        $responseData = $this->writeService->create($createProductDTO);

        return ResponseHelper::build($responseData['data'], message: $responseData['message']);
    }

    public function update(UpdateProductRequest $request): JsonResponse
    {
        $updateProductDTO = $request->toDto();
        $responseData = $this->writeService->update($updateProductDTO);

        return ResponseHelper::build($responseData['data'], message: $responseData['message']);
    }

    public function delete(int $id): JsonResponse
    {
        if (!$this->readService->checkById($id)) {
            throw new ModelNotFoundException();
        }

        $responseData = $this->writeService->delete($id);

        return ResponseHelper::build($responseData['data'], message: $responseData['message']);
    }
}
