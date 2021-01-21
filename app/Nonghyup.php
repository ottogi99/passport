<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nonghyup extends Model
{
    // protected $fillable = [
    //     'code',
    //     'name',
    //     'address',
    //     'addr_part1',
    //     'addr_part2',
    //     'contact',
    //     'ceo',
    //     'active',
    //     'seq'
    // ];

    protected $guarded = [
        'id', 
        'code'
    ];
}
