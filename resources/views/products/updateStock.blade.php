@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 px-4">
    <h2 class="text-3xl font-semibold mb-6 text-center">Actualizare Stoc - {{ $product->name }}</h2>
    
    <form action="{{ route('products.updateStock', $product->id) }}" method="POST">
        @csrf
        @method('PATCH')
        
        <div class="mb-4">
            <label for="stock" class="block text-gray-700">Stoc Disponibil</label>
            <input 
                type="number" 
                name="stock" 
                id="stock" 
                value="{{ old('stock', $product->stock) }}" 
                class="border border-gray-300 p-2 rounded-lg w-full"
                min="0" 
            >
        </div>

        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-300">
            Salvează Modificările
        </button>
    </form>
</div>
@endsection
