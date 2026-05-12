<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
        return view('products.index', compact('products'));
    }


    //INSERT
    public function insert()
    {
        Product::create([
            'name' => 'Produk Baru',
            'category_id' => 1,
            'price' => 10000,
            'stock' => 10,
            'description' => 'Produk otomatis',
            'status' => 'tersedia'
        ]);

        return redirect('/products')->with('success', 'Data berhasil ditambahkan');
    }

    // //UPDATE
    // public function update($id)
    // {
    //     $product = Product::findOrFail($id);

    //     $product->update([
    //         'name' => 'Produk Update',
    //         'price' => 20000,
    //         'stock' => 5,
    //         'description' => 'Produk yang diupdate',
    //         'status' => 'habis'
    //     ]);

    //     return redirect('/products')->with('success', 'Data berhasil diupdate');
    // }

    public function update(Request $request, $id)
{
    $products = Product::findOrFail($id);

    $products->update([
        'category_id' => $request->category_id,
        'name' => $request->name,
        'price' => $request->price,
        'stock' => $request->stock,
        'description' => $request->description,
        'status' => $request->status
    ]);

    return redirect('/products')
        ->with('success', 'Data berhasil diupdate');
}

    //DELETE
    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/products')->with('success', 'Data berhasil dihapus');
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.update', compact('product', 'categories'));
    }

    public function store(Request $request)
    {
        Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect('/products')->with('success', 'Data berhasil ditambahkan');
    }
}