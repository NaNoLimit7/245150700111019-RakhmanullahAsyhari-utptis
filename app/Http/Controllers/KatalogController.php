<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KatalogController extends Controller
{
    private $products = [
        ['id' => 1, 'name' => 'Laptop rusak majapahit', 'price' => 200000, 'stock' => 8],
        ['id' => 2, 'name' => 'Mouse double click bobrok', 'price' => 150000, 'stock' => 6],
        ['id' => 3, 'name' => 'Monitor belah dua', 'price' => 300000, 'stock' => 2],

    ];

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
            'name' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 400);
        }

        $newProduct = $request->only(['id', 'name', 'price', 'stock']);
        $this->products[] = $newProduct;

        return response()->json([
            'status' => 'success',
            'message' => 'Produk berhasil ditambahkan',
            'data' => $newProduct
        ], 201);
    }

    public function index()
    {
        return response()->json([
            'status' => 'success',
            'data' => $this->products
        ], 200);
    }

    public function show($id)
    {
        $index = array_search($id, array_column($this->products, 'id'));

        if ($index === false) {
            return response()->json([
                'status' => 'error',
                'message' => "Produk dengan ID {$id} tidak Ditemukan"
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $this->products[$index]
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $index = array_search($id, array_column($this->products, 'id'));

        if ($index === false) {
            return response()->json(['message' => "Produk dengan ID {$id} tidak Ditemukan"], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $this->products[$index]['name'] = $request->name;
        $this->products[$index]['price'] = $request->price;
        $this->products[$index]['stock'] = $request->stock;

        return response()->json([
            'status' => 'success',
            'message' => 'Seluruh data produk berhasil diubah',
            'data' => $this->products[$index]
        ], 200);
    }

    public function modify(Request $request, $id)
    {
        $index = array_search($id, array_column($this->products, 'id'));

        if ($index === false) {
            return response()->json(['message' => "Produk dengan ID {$id} tidak Ditemukan"], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|string',
            'price' => 'sometimes|numeric',
            'stock' => 'sometimes|integer'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        if ($request->has('name')) $this->products[$index]['name'] = $request->name;
        if ($request->has('price')) $this->products[$index]['price'] = $request->price;
        if ($request->has('stock')) $this->products[$index]['stock'] = $request->stock;

        return response()->json([
            'status' => 'success',
            'message' => 'Sebagian data produk berhasil diubah',
            'data' => $this->products[$index]
        ], 200);
    }

    public function destroy($id)
    {
        $index = array_search($id, array_column($this->products, 'id'));

        if ($index === false) {
            return response()->json(['message' => "Produk dengan ID {$id} tidak Ditemukan"], 404);
        }

        unset($this->products[$index]);
        $this->products = array_values($this->products);

        return response()->json([
            'status' => 'success',
            'message' => "Item dengan ID {$id} berhasil dihapus"
        ], 200);
    }
}
