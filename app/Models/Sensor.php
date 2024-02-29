<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Sensor extends Model 
{

    protected $fillable = [
        'id', 'name','type','rol','values','date','user_id'
    ];

    protected $hidden = [
        
    ];
}
