<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OwnerOrderConfirmation extends Model
{
    use HasFactory;
    protected $primaryKey = 'confirmation_id';
    protected $fillable = ['order_id', 'confirmation_date', 'status'];
    public function order()
    {
        return $this->belongsTo(Orders::class, 'order_id');
    }
}
