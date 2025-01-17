@extends('layouts.app')

@section('content')
<head>
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container text-center mt-5">
        <h1>Bine ai venit la HepWood-Store!</h1>
        <a href="{{ route('products.index') }}" class="btn btn-primary mt-3">Vezi Produsele</a>
        @auth
            <a href="{{ route('sales.history') }}" class="btn btn-secondary mt-3">Istoricul Comenzilor</a>
        @endauth
    </div>
</body>
@endsection
