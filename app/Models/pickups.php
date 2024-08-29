<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pickups extends Model
{
    use HasFactory;
    protected $fillable=['id','checkouts_id','c_token_pick_up','p_expire_date'];
    public function pu_cart(){
        return $this->belongsTo(carts::class,'checkout_id');
    }
}
