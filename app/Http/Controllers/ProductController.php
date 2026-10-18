<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Menampilkan semua produk
    public function index()
    {
        return response()->json([
            'data' => Product::all()
        ]);
    }

    // Menambahkan produk
    public function store(Request $request)
    {
        $product = Product::create($request->all());

        return response()->json([
            'message' => 'Product created successfully',
            'data' => $product
        ], 201);
    }

    // Menampilkan satu produk
    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'message' => 'Product not found'
            ], 404);
        }

        return response()->json([
            'data' => $product
        ]);
    }

    // Mengubah produk
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'message' => 'Product not found'
            ], 404);
        }

        $product->update($request->all());

        return response()->json([
            'message' => 'Product updated successfully',
            'data' => $product
        ]);
    }

    // Menghapus produk
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'message' => 'Product not found'
            ], 404);
        }

        $product->delete();

        return response()->json([
            'message' => 'Product deleted successfully'
        ]);
    }
}
