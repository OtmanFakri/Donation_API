<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'description',
        'address',
        'availabilities',
        'booked',
        'score_cost'
    ];

    //relationship
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
