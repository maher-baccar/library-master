<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'name',
        'caterogy',
        'price',
        'description',
        'user_id',
    ];

    //The relationship between tables
    public function carts()
    {
        return $this->hasMany('App\Models\Cart');
    }
    public function users(){
        return $this->belongsTo('App\Models\User');
    }

    public function getImageAttribute($value) {
        if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
            return $value;
        }
        return asset('storage/' . $value);
    }
}

