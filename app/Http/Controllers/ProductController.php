<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('supplier')->get();

        return view('product.index', compact('products'));
    }

    public function create()
    {
        $supplier = Supplier::all();

        return view('product.create', compact('supplier'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'barcode_number' => 'required|string|max:255',
            'product_name' => 'required|string|max:255',
            'buy_price' => 'required|integer|min:0',
            'sell_price' => 'required|integer|min:0',
            'supplier_id' => 'required|exists:suppliers,id',
        ]);

        Product::create($validated);

        return redirect('/product')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    public function show($id)
    {
        $product = Product::with('supplier')->findOrFail($id);

        return view('product.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $supplier = Supplier::all();

        return view('product.edit', compact('product', 'supplier'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'barcode_number' => 'required|string|max:255',
            'product_name' => 'required|string|max:255',
            'buy_price' => 'required|integer|min:0',
            'sell_price' => 'required|integer|min:0',
            'supplier_id' => 'required|exists:suppliers,id',
        ]);

        $product = Product::findOrFail($id);
        $product->update($validated);

        return redirect('/product')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/product')
            ->with('success', 'Produk berhasil dihapus.');
    }
}
