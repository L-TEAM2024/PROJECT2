<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['order_number','totalPrice','user_id'];

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }
    public function User(){
        return $this->belongsTo(User::class);
    }
    
}
