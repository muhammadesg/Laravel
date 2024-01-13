<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CompletedOrder;
use Illuminate\Http\Request;

class CompletedOrders extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/completedorders",
     *     tags={"CompletedOrders"},
     *     summary="Get list of completedorders",
     *     @OA\Response(response="200", description="List of completedorders")
     * )
     */
    public function index() {
        try {
            $completedorders = CompletedOrder::all();
            return response()->json(['completedorders' => $completedorders], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
}
