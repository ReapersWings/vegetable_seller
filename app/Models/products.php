<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $fillable=['image','p_name','p_total_quantity','p_price'];
    public function p_carts(){
        return $this->hasMany(carts::class);
    }
}
