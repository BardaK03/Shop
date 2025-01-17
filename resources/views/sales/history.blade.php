@extends('layouts.app')

@section('content')
<div class="container mt-8 px-4">
    <h2 class="text-2xl font-semibold mb-6 text-gray-800">Istoricul Comenzilor</h2>

    @if ($sales->count() > 0)
        <table class="min-w-full bg-white shadow-lg rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Produs</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Cantitate</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Total</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Data</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $sale)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm text-gray-800">{{ $sale->product->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $sale->quantity }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $sale->total_price }} RON</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $sale->sale_date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-gray-600 mt-4">Nu ai făcut nicio comandă.</p>
    @endif
</div>
@endsection
