@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-10 px-4">
        <h2 class="text-3xl font-semibold mb-6 text-center">Adaugă un Produs Nou</h2>
        <form action="{{ route('products.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg max-w-lg mx-auto">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold mb-2">Numele Produsului</label>
                <input type="text" name="name" id="name" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="price" class="block text-gray-700 font-semibold mb-2">Preț</label>
                <input type="number" name="price" id="price" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500" required min="0">
            </div>
            <div class="mb-4">
                <label for="stock" class="block text-gray-700 font-semibold mb-2">Stoc</label>
                <input type="number" name="stock" id="stock" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500" required min="0">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold mb-2">Descriere</label>
                <textarea name="description" id="description" rows="3" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>
            <button type="submit" class="w-full bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600 transition duration-300">
                Adaugă Produs
            </button>
        </form>
    </div>
@endsection
