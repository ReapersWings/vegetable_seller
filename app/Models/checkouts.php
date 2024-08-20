<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class checkouts extends Model
{
    use HasFactory;
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
