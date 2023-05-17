<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{

    /**
     * Store a newly created Order in storage.     */
    public function store(Request $request)
    {
        $order = new Order;
        $order->product_id = $request->product_id;
        $order->save();
        $response = [
            'code' => '200',
            'message' => 'New Order created.',
        ];
        return response()->json($response);

    }

    /**
     * Display the specified Order.     */
    public function show(Order $order)
    {
        $product = Http::get('http://localhost:8080/items/' . $order->product_id)->json();
        $response =[[
            'id' => $order->id,
            'product' => [
                'id' => $order->product_id,
                'name' => $product[0]['name'],
                'price' => $product[0]['price'],
                'description' => $product[0]['description']
            ]
            ,
            'created_at' => $order->created_at,
            'updated_at' => $order->updated_at,
        ] ];
        return $response;
    }

}
