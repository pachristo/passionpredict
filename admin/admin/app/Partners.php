<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partners extends Model
{
    protected $fillable = [
      'name','link'
    ];
    
    protected $table="partners";
}
