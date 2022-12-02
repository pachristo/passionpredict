<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adword extends Model
{
    protected $fillable = [
        'a250by250',
        'a200by200',
        'a468by60',
        'a728by90',
        'a300by250',
        'a320by100',
        'a336by280',
        'a120by600',
        'a160by600',
        'a160by600',
        'a970by90',
        'a320by50'
    ];
}
