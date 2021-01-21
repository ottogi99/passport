<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sigun extends Model
{
    protected $fillable = [
        'code', 
        'name', 
        'seq' 
    ];
}
