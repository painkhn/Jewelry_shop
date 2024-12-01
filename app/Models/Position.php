<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $fillable = [
    'name',
    'category_id',
    'price',
    'photo',
    'metall',
    'inserts',
    'insert_weight',
    'weight'
    ];
    public function category() 
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function basket()
    {
        return $this->belongsTo(Basket::class);
    }
}
