<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Http\Requests\StoreCardRequest;
use App\Http\Requests\UpdateCardRequest;

class CardController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/cards",
     *     tags={"Cards"},
     *     summary="Get list of cards",
     *     @OA\Response(response="200", description="List of cards")
     * )
     */
    public function index()
    {
        $cards = Card::all();

        $cards->each(function ($card) {
            $card->img_url = asset('storage/' . $card->image);
        });

        return response()->json($cards);
    }

    /**
     * @OA\Post(
     *     path="/api/cards",
     *     tags={"Cards"},
     *     summary="Store a new card",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 required={"title", "text", "image"},
     *                 @OA\Property(property="title", type="string", example="Banner Title"),
     *                 @OA\Property(property="text", type="string", example="Banner Text"),
     *                 @OA\Property(property="category_id", type="integer"),
     *                 @OA\Property(property="image", type="string", format="binary"),
     *                 @OA\Property(property="price", type="number"),
     *                 @OA\Property(property="discount", type="number"),
     *             )
     *         )
     *     ),
     *     @OA\Response(response="201", description="Card created successfully"),
     *     @OA\Response(response="422", description="Validation error")
     * )
     */
    public function store(StoreCardRequest $request)
    {
        $path = null;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store("uploads", 'public');
        }

        $requestData = $request->validated();
        $requestData['image'] = $path;
        Card::create($requestData);

        return response()->json(['message' => 'Card created successfully'], 201);
    }

    /**
     * @OA\Get(
     *     path="/api/cards/{id}",
     *     tags={"Cards"},
     *     summary="Get details of a specific card",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the card",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="200", description="Card details"),
     *     @OA\Response(response="404", description="Card not found"),
     * )
     */
    public function show($id) {
        $card = Card::findOrFail($id);
        return response()->json($card, 201);
    }

    /**
     * @OA\Put(
     *     path="/api/cards/{id}",
     *     tags={"Cards"},
     *     summary="Update a specific card",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Card ID",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *                 @OA\Property(property="title", type="string"),
     *                 @OA\Property(property="text", type="string"),
     *                 @OA\Property(property="category_id", type="integer"),
     *                 @OA\Property(property="image", type="string", format="binary"),
     *                 @OA\Property(property="price", type="number"),
     *                 @OA\Property(property="discount", type="number"),
     *             )
     *         )
     *     ),
     *     @OA\Response(response="200", description="Card updated successfully"),
     *     @OA\Response(response="404", description="Card not found"),
     *     @OA\Response(response="422", description="Validation error"),
     * )
     */
    public function update(UpdateCardRequest $request, $id)
    {
        $card = Card::findOrFail($id);

        $requestData = $request->validated();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store("uploads", 'public');
            $requestData['image'] = $path;
        }

        $card->update($requestData);

        return response()->json(['message' => 'Card updated successfully'], 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/cards/{id}",
     *     tags={"Cards"},
     *     summary="Delete a specific card",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Card ID",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Response(response="200", description="Card deleted successfully"),
     *     @OA\Response(response="404", description="Card not found"),
     * )
     */
    public function destroy(Card $card) {
        try {
            $card->delete();
            return response()->json(['message' => 'Card deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error deleting card'], 500);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/categories/{category_id}/cards",
     *     tags={"Cards"},
     *     summary="Get cards for home page",
     *     @OA\Parameter(
     *         name="category_id",
     *         in="path",
     *         required=true,
     *         description="Category ID",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Response(response="200", description="Success"),
     * )
     */
    public function getCardsForHome($categoryId)
    {
        $cards = Card::where('category_id', $categoryId)->get();
        $cards->each(function ($card) {
            $card->img_url = asset('storage/' . $card->image);
        });
        return response()->json($cards);
    }
}
