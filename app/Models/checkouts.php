<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class checkouts extends Model
{
    use HasFactory;
    protected $fillable=['checkout_id','user_id','product_id','c_state','c_quantity','c_total_price'];
    public function co_pickups(){
        return $this->hasOne(pickups::class);
    }
    public function co_deliverys(){
        return $this->hasOne(deliverys::class);
    }
    public function co_user(){
        return $this->belongsTo(User::class,'id');
    }
    public function co_product(){
        return $this->belongsTo(products::class,'id');
    }
}
