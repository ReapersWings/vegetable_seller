<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carts extends Model
{
    use HasFactory;
    protected $fillable =['user_id','product_id','c_state','c_quantity'];

    public function c_user(){
        return $this->belongsTo(User::class,'id');
    }
    public function c_product(){
        return $this->belongsTo(products::class,'id');
    }
}
