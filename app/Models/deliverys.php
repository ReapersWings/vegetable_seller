<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deliverys extends Model
{
    use HasFactory;
    protected $fillable =['checkouts_id','addres_id','d_state'];
    public function d_cart(){
        return $this->belongsTo(carts::class,'checkout_id');
    }
    public function d_addres(){
        return $this->belongsTo(address::class,'id');
    }
}
