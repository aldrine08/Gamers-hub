<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orderForm($deviceId)
    {
        // Fetch the device
        $device = Device::findOrFail($deviceId);
        // Return a view with a form for selecting the number of days
        return view('orders.order-form', compact('device'));
    }

    public function processOrder(Request $request, $deviceId)
    {
        // Validate the input
        $request->validate([
            'number_of_days' => 'required|integer|min:1'
        ]);

        // Fetch the device
        $device = Device::findOrFail($deviceId);

        // Calculate total price
        $days = $request->input('number_of_days');
        $totalPrice = $device->price_per_day * $days;

        // Return a billing/summary view
        return view('orders.billing', [
            'device' => $device,
            'days' => $days,
            'totalPrice' => $totalPrice
    ]);

    return view('orders.billing', compact('order', 'device'));
}

}
