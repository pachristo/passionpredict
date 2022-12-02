<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    public function getLeagues() {
        return $this->get();
    }
}
