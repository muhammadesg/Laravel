<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Card;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/categories",
     *     tags={"Category"},
     *     summary="Get list of categories",
     *     @OA\Response(response="200", description="List of categories")
     * )
     */
    public function index() {
        try {
            $categories = Category::all();
            return response()->json($categories, 200);
        } catch (\Exception $e) {
            // Log the exception or handle it as needed
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

 /**
     * @OA\Post(
     *     path="/api/categories",
     *     tags={"Category"},
     *     summary="Create a new category",
     *     operationId="createCategory",
     *     @OA\RequestBody(
     *         required=true,
     *         description="Category data",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="name", type="string", example="Category Name"),
     *         )
     *     ),
     *     @OA\Response(response="201", description="Category created successfully"),
     *     @OA\Response(response="422", description="Validation error"),
     * )
     */
    public function store(StoreCategoryRequest $request)
    {
        try {
            $category = Category::create($request->all());
            return response()->json(['message' => 'Category created successfully'], 201);
        } catch (\Exception $e) {
            // Log the exception or handle it as needed
            return response()->json(['error' => 'Error creating category'], 500);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/categories/{id}",
     *     tags={"Category"},
     *     summary="Get a specific category",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Category ID",
     *     ),
     *     @OA\Response(response="200", description="Category details"),
     *     @OA\Response(response="404", description="Category not found"),
     * )
     */
    public function show($id)
    {
        try {
            $category = Category::findOrFail($id);
            $cards = Card::where('category_id', $category->id)->get();
            return response()->json(['category' => $category, 'cards' => $cards], 200);
        } catch (\Exception $e) {
            // Log the exception or handle it as needed
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    /**
     * @OA\Put(
     *     path="/api/categories/{id}",
     *     tags={"Category"},
     *     summary="Update a specific category",
     *     operationId="updateCategory",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Category ID",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         description="Category data",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="name", type="string", example="Category Name"),
     *         )
     *     ),
     *     @OA\Response(response="200", description="Category updated successfully"),
     *     @OA\Response(response="404", description="Category not found"),
     * )
     */
    public function update(UpdateCategoryRequest $request, Category $category) {
        try {
            $category->update($request->all());
            return response()->json(['message' => 'Category updated successfully'], 200);
        } catch (\Exception $e) {
            // Log the exception or handle it as needed
            return response()->json(['error' => 'Error updating category'], 500);
        }
    }



    /**
     * @OA\Delete(
     *     path="/api/categories/{id}",
     *     tags={"Category"},
     *     summary="Delete a specific category",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Category ID",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Response(response="200", description="Category deleted successfully"),
     *     @OA\Response(response="404", description="Category not found"),
     * )
     */
    public function destroy(Category $category) {
        try {
            $category->delete();
            Card::where('category_id', $category->id)->delete();
            return response()->json(['message' => 'Category deleted successfully'], 200);
        } catch (\Exception $e) {
            // Log the exception or handle it as needed
            return response()->json(['error' => 'Error deleting category'], 500);
        }
    }
}
