<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\CompletedOrder;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin.Order.index', compact('orders'));
    }

    public function edit(Order $order)
    {
        return view('admin.Order.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $order->update($request->all());

        $order->status = 'completed';

        if ($order->status == "completed") {
            $newData = new CompletedOrder();
            $newData->name = $order->name;
            $newData->telephone = $order->telephone;
            $newData->address = $order->address;
            $newData->total_price = $order->total_price;
            $newData->products = json_encode($order->products);
            $newData->status = $order->status;

            $newData->save();

            $order->delete();
        }

        return redirect()->route('orders.index')->with('success', __('OrdersDeletedSuccessfully'));
    }

    public function show(Order $order)
    {
        return view('admin.Order.show', compact('order'));
    }

    // public function destroy(Order $order)
    // {
    //     $order->delete();
    //     return redirect()->route('orders.index')->with('success', 'Order prepared successfully!');
    // }

}
