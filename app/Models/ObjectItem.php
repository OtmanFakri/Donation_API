<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjectItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'condition', 'category_id', 'item_id',
    ];



    //relationship
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
    public function category()
    {
        return $this->belongsTo(category::class);
    }
}
