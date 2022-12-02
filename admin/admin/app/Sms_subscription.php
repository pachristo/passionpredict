<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sms_subscription extends Model
{

	protected $table='sms_subscriptions';

	protected $fillable=[
		'id', 'category', 'planName', 'accessTime', 'nairaPrice', 'keshPrice', 'dollarPrice', 'cedPrice', 'ugxPrice', 'tzsPrice', 'zarPrice','zmwPrice', 'planBenefits', 'status', 
	];
    //
}
