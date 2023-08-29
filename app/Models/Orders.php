<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{

    protected $primaryKey = 'order_id';

    protected $fillable = [
        'customer_id',
        'owner_id',
        'item_id',
        'order_date',
        'customer_confirmation_status',
        'now ',
        'delivery_date',
        'owner_confirmation_status'
    ];

    use HasFactory;


    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function custumerConfirmations()
    {
        return $this->hasMany(CustomerOrderConfirmation::class, 'order_id');
    }

    public function ownerConfirmations()
    {
        return $this->hasMany(OwnerOrderConfirmation::class, 'order_id');
    }
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
