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
    public function Object()
    {
        return $this->hasOne(ObjectItem::class, 'item_id');
    }
    public function ItemImages(){
        return $this->hasMany(ImageItem::class, 'item_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($item) {
            // Delete related images
            $item->ItemImages()->delete();

            // Delete related object
            $item->Object()->delete();
        });
    }

}
