<?php

namespace App\Solos\Modules\Subscription\Model;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table='subscriptions';
    public function findSub($category , $plan )
    {
        return $this->where('category', $category)->where('planName', $plan)->first();
    }
}
