<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pickups extends Model
{
    use HasFactory;
    protected $fillable=['id','checjouts_id','c_token_pick_up'];
    public function pu_checkout(){
        return $this->belongsTo(checkouts::class,'checkout_id');
    }
}
