<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the Product.
     *
     */
    public function index()
    {
        $products = Product::all();
        return response()->json($products);

    }

    /**
     * Store a newly created Product in storage.
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;

        $product->save();
        $response = [
            'code' => '200',
            'message' => 'New Product created.',
        ];
        return response()->json($response);

    }

    /**
     * Display the specified Product.
     */
    public function show(Product $product)
    {
        $product = Product::find($product);
        return response()->json($product);

    }

    /**
     * Update the specified Product in storage.
     */
    public function update(Request $request, Product $product)
    {

        $product->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'updated_at' => now()
        ]);
        $response = [
            'code' => '200',
            'message' => 'Product updated.',
        ];
        return response()->json($response);

    }

    /**
     * Remove the specified Product from storage.
     */
    public function destroy(Product $product)
    {
        $product = Product::where('id', $product->id)->delete();
        $response = [
            'code' => '200',
            'message' => 'product removed successfully.',
        ];
        return response()->json($response);

    }
}
