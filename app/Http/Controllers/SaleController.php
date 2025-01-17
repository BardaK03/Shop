<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SaleController extends Controller
{
    // Finalizează comanda
    public function checkout()
    {
        $cart = Session::get('cart', []);
        if (empty($cart)) {
            return back()->with('error', 'Coșul este gol!');
        }

        foreach ($cart as $productId => $item) {
            $product = Product::find($productId);

            if ($product->stock < $item['quantity']) {
                return back()->with('error', "Stoc insuficient pentru produsul {$product->name}!");
            }

            // Creează o vânzare
            Sale::create([
                'user_id' => Auth::id(),
                'product_id' => $productId,
                'quantity' => $item['quantity'],
                'total_price' => $item['quantity'] * $product->price,
                'sale_date' => now(),
            ]);

            // Actualizează stocul
            $product->stock -= $item['quantity'];
            $product->save();
        }

        // Golește coșul
        Session::forget('cart');

        return back()->with('success', 'Comanda a fost finalizată!');
    }

    // Istoricul comenzilor pentru utilizatorul curent
    public function history()
    {
        $sales = Sale::where('user_id', Auth::id())->with('product')->get();
        return view('sales.history', compact('sales'));
    }
}
