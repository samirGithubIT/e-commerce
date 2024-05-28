<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    public static function categoryOption(){
        return self::pluck('name', 'id')->toArray();
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
