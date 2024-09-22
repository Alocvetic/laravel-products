<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Requests\Category\{CreateCategoryRequest, GetCategoryRequest, UpdateCategoryRequest};
use App\Services\Category\{CategoryReadService, CategoryWriteService};
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

final class CategoryController extends Controller
{
    public function __construct(
        protected readonly CategoryReadService $readService,
        protected readonly CategoryWriteService $writeService,
    ) {
    }

    public function index(GetCategoryRequest $request): JsonResponse
    {
        $getCategoryDTO = $request->toDto();
        $categories = $this->readService->get($getCategoryDTO);

        return ResponseHelper::build($categories->toArray());
    }

    public function show(int $id): JsonResponse
    {
        $categoryDto = $this->readService->getById($id);

        return ResponseHelper::build($categoryDto->toArray());
    }

    public function create(CreateCategoryRequest $request): JsonResponse
    {
        $createCategoryDTO = $request->toDto();
        $responseData = $this->writeService->create($createCategoryDTO);

        return ResponseHelper::build($responseData['data'], message: $responseData['message']);
    }

    public function update(UpdateCategoryRequest $request): JsonResponse
    {
        $updateCategoryDTO = $request->toDto();
        $responseData = $this->writeService->update($updateCategoryDTO);

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
