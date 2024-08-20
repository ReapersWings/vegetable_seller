<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deliverys extends Model
{
    use HasFactory;
    public function d_checkout(){
        return $this->belongsTo(checkouts::class,'checkout_id');
    }
    public function d_addres(){
        return $this->belongsTo(address::class,'id');
    }
}
