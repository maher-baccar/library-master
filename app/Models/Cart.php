<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'totalPrice',
        'user_id',
        'product_id',
    ];

    public function book()
    {
        return $this->belongsTo('App\Models\Book');
    }}
