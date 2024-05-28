<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    public function orderDetails(){
        return $this->HasMany(OrderDetail::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
