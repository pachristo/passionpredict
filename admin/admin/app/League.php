<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    protected $table="leagues";
    public function getLeagues() {
        return $this->get();
    }
}
