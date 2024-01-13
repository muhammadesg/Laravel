<?php

namespace App\Http\Controllers;

use App\Models\CompletedOrder;
use Illuminate\Http\Request;

class CompletedOrderController extends Controller
{
    public function index()
    {
        $completedOrders = CompletedOrder::all();
        return view('admin.completedOrders.index', compact('completedOrders'));
    }

    public function show(CompletedOrder $completedOrder)
    {
        return view('admin.completedOrders.show', compact('completedOrder'));
    }

    public function destroy(CompletedOrder $completedOrder)
    {
        $completedOrder->delete();
        return redirect()->route('completedOrders.index')->with('danger', __('words.CompletedOrdersDeletedSuccessfully'));

    }
}
