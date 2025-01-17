@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-10 px-4">
        <h2 class="text-3xl font-semibold mb-6 text-center">Lista Produselor</h2>

        @auth
            @if (Auth::user()->usertype === 'admin')
                <div class="mb-6 text-right">
                    <a href="{{ route('products.create') }}" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-300">
                        Adaugă Produs Nou
                    </a>
                </div>
            @endif
        @endauth

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($products as $product)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="p-4">
                        <h5 class="text-xl font-semibold text-gray-800">{{ $product->name }}</h5>
                        <p class="text-gray-600 mt-2">{{ $product->description }}</p>
                        <p class="text-gray-800 font-semibold mt-4">Preț: {{ $product->price }} RON</p>
                        <p class="text-gray-500">Stoc: {{ $product->stock }}</p>
                    </div>

                    <div class="p-4 border-t border-gray-200">
                        @auth
                            @if (Auth::user()->usertype === 'admin')
                                <a href="{{ route('products.editStock', $product->id) }}" class="text-blue-500 hover:underline">Actualizează Stoc</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">Șterge</button>
                                </form>
                            @else
                                <form action="{{ route('cart.add', $product) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 disabled:opacity-50 transition duration-300" 
                                        {{ $product->stock <= 0 ? 'disabled' : '' }}>
                                        Adaugă în coș
                                    </button>
                                </form>
                            @endif
                        @else
                            <p class="text-red-500 text-center py-4">Trebuie să fii logat pentru a adăuga produse în coș.</p>
                        @endauth
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
