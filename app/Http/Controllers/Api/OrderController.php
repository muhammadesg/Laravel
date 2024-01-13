<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

/**
 * @OA\Info(
 *     title="Название вашего API",
 *     version="1.0.0",
 *     description="Описание вашего API",
 *     @OA\Contact(
 *         name="Ваше имя",
 *         email="ваш.email@example.com"
 *     )
 * )
 */

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'telephone' => 'required',
            'address' => 'required',
            'total_price' => 'required|numeric',
            'products' => 'required|array',
            'products.*.name' => 'required|string',
            'products.*.price' => 'required|numeric',
            'products.*.quantity' => 'required|integer',
        ]);

        $order = Order::create([
            'name' => $validatedData['name'],
            'telephone' => $validatedData['telephone'],
            'address' => $validatedData['address'],
            'total_price' => $validatedData['total_price'],
            'products' => $validatedData['products'],
            'status' => 'pending',
        ]);

        return response()->json(['order_id' => $order->id], 201);
    }

    /**
     * @OA\Get(
     *     path="/api/orders",
     *     tags={"Orders"},
     *     summary="Get list of orders",
     *     @OA\Response(response="200", description="List of orders")
     * )
     */
    public function index()
    {
        $orders = Order::paginate(10);

        return response()->json(['orders' => $orders], 200);
    }

    /**
     * @OA\Get(
     *     path="/api/orders/{id}",
     *     tags={"Orders"},
     *     summary="Get a specific order",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Order ID",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Response(response="200", description="Order details"),
     *     @OA\Response(response="404", description="Order not found"),
     * )
     */
    public function show(Order $order) {
        try {
            return response()->json(['order' => $order], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

        /**
     * @OA\Put(
     *     path="/api/orders/{id}",
     *     tags={"Orders"},
     *     summary="Update a specific order",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Order ID",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="string"),
     *         )
     *     ),
     *     @OA\Response(response="200", description="Order updated successfully"),
     *     @OA\Response(response="404", description="Order not found"),
     *     @OA\Response(response="422", description="Validation error"),
     * )
     */
    public function update(Request $request, Order $order) {
        try {
            $request->validate([
                'status' => 'required',
            ]);

            $order->update($request->all());

            if($order->status == "completed") {
                $order->delete();
            }

            return response()->json(['message' => 'Order updated successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error updating order'], 500);
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/orders/{id}",
     *     tags={"Orders"},
     *     summary="Delete a specific order",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Order ID",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Response(response="200", description="Order deleted successfully"),
     *     @OA\Response(response="404", description="Order not found"),
     * )
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return response()->json(['message' => 'Order deleted successfully'], 200);
    }
}
