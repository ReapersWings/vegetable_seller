<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    use HasFactory;
    protected $fillable=['id','name_location','user_id','addres_1','addres_2','city','state','post_code'];
}
