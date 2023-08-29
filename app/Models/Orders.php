<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{

    protected $primaryKey = 'order_id';

    protected $fillable = [
        'customer_id',
        'seller_id',
        'order_date',
        'buyer_confirmation_status',
        'now ',
        'seller_confirmation_status'
    ];

    use HasFactory;


    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function buyerConfirmations()
    {
        return $this->hasMany(BuyerOrderConfirmation::class, 'order_id');
    }

    public function sellerConfirmations()
    {
        return $this->hasMany(SellerOrderConfirmation::class, 'order_id');
    }
}
