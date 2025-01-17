@extends('layouts.app')

@section('content')
<div class="container mt-8 px-4">
    <h2 class="text-2xl font-semibold mb-6 text-gray-800">Coșul de Cumpărături</h2>

    @if (session('cart') && count(session('cart')) > 0)
        <table class="min-w-full bg-white shadow-lg rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Produs</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Preț</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Cantitate</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Total</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Acțiuni</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach (session('cart') as $id => $item)
                    @php $total += $item['price'] * $item['quantity']; @endphp
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm text-gray-800">{{ $item['name'] }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $item['price'] }} RON</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $item['quantity'] }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $item['price'] * $item['quantity'] }} RON</td>
                        <td class="px-6 py-4">
                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md text-sm hover:bg-red-600 transition">Șterge</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3" class="text-right px-6 py-4 text-lg font-semibold text-gray-800">Total:</td>
                    <td class="px-6 py-4 text-lg font-semibold text-gray-800">{{ $total }} RON</td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <div class="mt-6">
            <form action="{{ route('checkout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-green-500 text-white py-2 px-6 rounded-md text-lg hover:bg-green-600 transition">Finalizează Comanda</button>
            </form>
        </div>
    @else
        <p class="text-gray-600">Coșul este gol!</p>
    @endif
</div>
@endsection
