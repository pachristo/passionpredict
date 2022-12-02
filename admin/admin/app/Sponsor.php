<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
	protected $table='sponsors';
    protected $fillable = [
        'sponsorName',
        'sponsorUrl',
        'country',
        'description',
        
        'publishStatus',
        'other'
    ];
}
