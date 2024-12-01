<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'positions_id',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
    public function positions()
    {
        return $this->hasMany(Position::class, 'id', 'positions_id');
    }
}
