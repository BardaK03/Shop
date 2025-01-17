<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Afișează toate produsele în grid
    public function index()
    {
        $products = Product::all(); // Ia toate produsele din baza de date
        return view('products.index', compact('products'));
    }
    public function editStock($id)
    {   if (auth()->user()->usertype !== 'admin') {
        abort(403, 'Acces interzis');
    }
        $product = Product::findOrFail($id);
        return view('products.updateStock', compact('product'));
    }
    
    public function updateStock(Request $request, $id)
    {if (auth()->user()->usertype !== 'admin') {
        abort(403, 'Acces interzis');
    }
        $request->validate([
            'stock' => 'required|integer|min:0',
        ]);
    
        $product = Product::findOrFail($id);
        $product->stock = $request->stock;
        $product->save();
    
        return redirect()->route('products.index')->with('success', 'Stocul produsului a fost actualizat!');
    }
    
    // Arată formularul de creare a unui produs
    public function create()
    {if (auth()->user()->usertype !== 'admin') {
        abort(403, 'Acces interzis');
    }
        return view('products.create');
    }

    // Stochează un produs nou
    public function store(Request $request)
{
    if (auth()->user()->usertype !== 'admin') {
        abort(403, 'Acces interzis');
    }

    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'description' => 'nullable|string',
    ]);

    Product::create([
        'name' => $request->name,
        'price' => $request->price,
        'stock' => $request->stock,
        'description' => $request->description,
    ]);

    return redirect()->route('products.index')->with('success', 'Produsul a fost adăugat cu succes!');
}



    // Șterge un produs
    public function destroy(Product $product)
    {if (auth()->user()->usertype !== 'admin') {
        abort(403, 'Acces interzis');
    }
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produsul a fost șters!');
    }
}
