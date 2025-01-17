<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    // Numele tabelului
    protected $table = 'sales';

    // Câmpurile care pot fi completate
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'total_price',
        'sale_date',
    ];

    // Eliminăm timestamps
    public $timestamps = false;

    // Relația cu utilizatorii
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relația cu produsele
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
