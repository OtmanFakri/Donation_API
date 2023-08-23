<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'expiration_date',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
