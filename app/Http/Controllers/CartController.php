<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    // Afișează produsele din coș
    public function index()
    {
        $cart = Session::get('cart', []); // Ia coșul din sesiune
        return view('cart.index', compact('cart'));
    }

    // Adaugă un produs în coș
    public function add(Product $product, Request $request)
    {
        $cart = Session::get('cart', []);

        // Verifică dacă produsul e deja în coș
        if (isset($cart[$product->id])) {
            if ($product->stock > $cart[$product->id]['quantity']) {
                $cart[$product->id]['quantity'] += 1;
            } else {
                return back()->with('error', 'Stoc insuficient!');
            }
        } else {
            if ($product->stock > 0) {
                $cart[$product->id] = [
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => 1,
                ];
            } else {
                return back()->with('error', 'Stoc insuficient!');
            }
        }

        Session::put('cart', $cart);
        return back()->with('success', 'Produs adăugat în coș!');
    }

    // Șterge un produs din coș
    public function remove(Product $product)
    {
        $cart = Session::get('cart', []);
        unset($cart[$product->id]);
        Session::put('cart', $cart);

        return back()->with('success', 'Produsul a fost șters din coș!');
    }
}
