<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class System extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;

    public function blogs()
    {
        return $this->hasMany('App\Blog', 'creator', 'id');
    }
}
