<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Numele tabelului (dacă e diferit de pluralul modelului)
    protected $table = 'products';

    // Câmpurile care pot fi completate
    protected $fillable = [
        'name',
        'price',
        'stock',
        'description',
    ];

    // Eliminăm timestamps
    public $timestamps = false;
}
