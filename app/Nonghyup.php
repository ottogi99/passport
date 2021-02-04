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

    protected $with = ['sigun'];

    public function sigun()
    {
        // 두번째 인자 'sigun'은 Nonghyup의 외래키 명, 
        // 세번째 인자 'code'는 Sigun의 조인시킬 컬럼명
        return $this->belongsTo(Sigun::class, 'sigun', 'code');
    }
}
