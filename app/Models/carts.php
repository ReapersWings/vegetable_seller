<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carts extends Model
{
    use HasFactory;
    protected $fillable =['carts_id','checkout_id','user_id','product_id','c_state','c_quantity','c_total_price'];

    public function c_user(){
        return $this->belongsTo(User::class,'id');
    }
    public function c_product(){
        return $this->belongsTo(products::class,'id');
    }
    public function c_pickups(){
        return $this->hasOne(pickups::class);
    }
    public function c_deliverys(){
        return $this->hasOne(deliverys::class);
    }
}
