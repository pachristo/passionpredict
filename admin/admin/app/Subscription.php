<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{

    protected $table = 'subscriptions';
    protected $fillable=[
    	 'category', 'planName', 'accessTime', 'nairaPrice', 'keshPrice', 'dollarPrice', 'cedPrice', 'ugxPrice', 'tzsPrice', 'zarPrice', 'zmwPrice', 'planBenefits', 'status'

    ];

    public function getSub($id)
    {
        return Subscription::find($id);
    }
}
