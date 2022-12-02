<?php

namespace App;

use Cartalyst\Sentinel\Activations\EloquentActivation;

class Activation extends EloquentActivation
{
    protected $fillable = [
        'user_id',
        'code',
        'completed',
        'completed_at',
    ];
}
