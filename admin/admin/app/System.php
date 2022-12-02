<?php

namespace App;

// use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class System extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = "systems";
    public function blogs()
    {
        return $this->hasMany('App\Blog', 'creator', 'id');
    }
}
